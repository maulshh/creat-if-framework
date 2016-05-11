<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mpages extends EMIF_Model {

    public function __construct(){
        parent::__construct();
        $this->load->model('mnodes');
        $this->set_table('pages');
    }

    public function get($where = false, $like = false, $order = false, $group = false, $select = false, $limit = false){ //overrides parent method get
        if($where && !is_array($where))
            $where = array('nodes.node_id' => $where); // when where is not false and only a single id
        $this->db->join('nodes', 'nodes.node_id = pages.page_id');
        $this->db->join('users', 'users.user_id = nodes.user_id');
        return parent::get(array_merge(array('module' => 'page'), $where), $like, $order, $group, $select?$select:'users.*, nodes.* ,pages.*', $limit);
    }

    public function get_many($where = false, $like = false, $order = false, $group = false, $select = false, $limit = false, $array = false){ //overrides parent method get_many
        $this->db->join('nodes', 'nodes.node_id = pages.page_id');
        $this->db->join('users', 'users.user_id = nodes.user_id');
        return parent::get_many(array_merge(array('module' => 'page'), $where), $like, $order, $group, $select?$select:'users.*, nodes.* ,pages.*', $limit, $array);
    }

    public function get_all(){
        return $this->get_many(array());
    }

    public function add($data){ //overrides parent method add
        $data = array_merge($data, array('module' => 'page'));
        $data = $this->mnodes->add($data);
        parent::add($data);
        $this->set(array('page_id'=>$data['page_id'], 'uri'=>''), array('uri'=>'pages/view/'.$data['page_id']));
        return $data['page_id'];
    }

    public function set($where, $data)
    { //overrides parent method set
        if ($where && !is_array($where))
            $where = array('node_id' => $where);
        if (isset($where['page_id'])) {
            $where['node_id'] = $where['page_id'];
            unset($where['page_id']);
        }
        $data = $this->mnodes->set($where, $data);

        if ($data != array()) {
            if (isset($where['node_id'])) {
                $where['page_id'] = $where['node_id'];
                unset($where['node_id']);
            }
            $this->db->join('nodes', 'nodes.node_id = pages.page_id');
            return parent::set($where, $data);
        }
        return true;
    }

    public function commented($id){
        $this->db->set('comment_count', 'comment_count+1', false);
        return parent::set(array('page_id' => $id), array());
    }

    public function delete($where)
    {
        if ($where && !is_array($where))
            $where = array('nodes.node_id' => $where); // when where is not false and only a single id
        if($this->mnodes->delete(array_merge(array('module' => 'page'), $where)))
            return true;
        return false;
    }
}

