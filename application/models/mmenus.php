<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Mmenus extends EMIF_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('mnodes');
        $this->set_table('menus');
    }

    public function get($where = array(), $like = false, $order = false, $group = false, $select = false, $limit = false)
    { //overrides parent method get
        if ($where && !is_array($where))
            $where = array('node_id' => $where); // when where is not false and only a single id
        $this->db->join('nodes', 'nodes.node_id = menus.menu_id');
        return parent::get(array_merge(array('module' => 'menu'), $where), $like, $order, $group, $select, $limit);
    }

    public function get_last_position($hint)
    {
        $select = 'position';
        $like = array('position' => $hint);
        $order = "position DESC";
        $res = $this->get(array(), $like, $order, false, $select);
        //print_r($res);
        return $res ? $res->position : $res;
    }

    public function get_many($where = array(), $like = false, $order = false, $group = false, $select = false, $limit = false, $array = false)
    { //overrides parent method get_many
        $this->db->join('nodes', 'nodes.node_id = menus.menu_id');
        return parent::get_many(array_merge(array('module' => 'menu'), $where), $like, 'position, module_target', false, $select, $limit, $array);
    }

    public function get_all()
    {
        return $this->get_many();
    }

    public function get_menus($target, $role)
    {
        return $this->get_many(array('module_target' => $target),
            array('role_id' => "-$role-"));
    }

    public function get_alltargets($level)
    {
        $this->db->distinct();
        $this->db->select('module_target');
        return $this->get_many(array(), array('role_id' => "-$level-"));
    }

    public function add($data)
    { //overrides parent method add
        $data = array_merge($data, array('module' => 'menu'));
        parent::add($id = $this->mnodes->add($data));
        return $id['menu_id'];
    }

    public function set($where, $data)
    { //overrides parent method set
        if ($where && !is_array($where))
            $where = array('node_id' => $where);
        if (isset($where['menu_id'])) {
            $where['node_id'] = $where['menu_id'];
            unset($where['menu_id']);
        }
        $data = $this->mnodes->set($where, $data);

        if (isset($where['node_id'])) {
            $where['menu_id'] = $where['node_id'];
            unset($where['node_id']);
        }
        if ($data != array())
            return parent::set($where, $data);
        else return $data;
    }
    
    public function delete($where)
    {
        if ($where && !is_array($where))
            $where = array('nodes.node_id' => $where); // when where is not false and only a single id
        if($this->mnodes->delete(array_merge(array('module' => 'menu'), $where)))
            return true;
        return false;
    }
}