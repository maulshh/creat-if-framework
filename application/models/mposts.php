<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mposts extends EMIF_Model {

	public function __construct(){
        parent::__construct();
        $this->load->model('mnodes');
        $this->set_table('posts');
    }

    public function get($where = false, $like = false, $order = false, $group = false, $select = false, $limit = false){ //overrides parent method get
        if($where && !is_array($where))
    		$where = array('nodes.node_id' => $where); // when where is not false and only a single id
    	$this->db->join('nodes', 'nodes.node_id = posts.post_id');
        $this->db->join('users', 'users.user_id = nodes.user_id');
        $this->db->join('post_types', 'post_types.post_type_id = posts.post_type_id');
        return parent::get($where, $like, $order, $group, $select?$select:"users.*, post_types.*, posts.*, nodes.*", $limit);
    }

    public function get_post_type($where){
        if($where && !is_array($where))
            $where = array('post_type_id' => $where); // when where is not false and only a single id
        if($where)
            $this->db->where($where);
        $query = $this->db->get('post_types');
        if($query)
            return $query->row();
        else
            return false;
    }

    public function get_many($where = array(), $like = false, $order = false, $group = false, $select = false, $limit = false, $array = false){ //overrides parent method get_many
        $this->db->join('nodes', 'nodes.node_id = posts.post_id');
        $this->db->join('users', 'users.user_id = nodes.user_id');
    	$this->db->join('post_types', 'post_types.post_type_id = posts.post_type_id');
//        $this->db->order_by('posts.post_type_id, post_id');
        return parent::get_many(array_merge(array('module' => 'post'), $where), $like, $order, $group, $select?$select:"users.*, post_types.*, posts.*, nodes.*", $limit, $array);
    }

    public function get_all(){
        return $this->get_many(array());
    }

    public function add($data){ //overrides parent method add
    	$data = array_merge($data, array('module' => 'post'));
        $data = $this->mnodes->add($data);
    	parent::add($data);
        $this->set(array('post_id'=>$data['post_id'], 'uri'=>''), array('uri'=>'posts/view/'.$data['post_id']));
        return $data['post_id'];
    }
    
    public function set($where, $data)
    { //overrides parent method set
        if ($where && !is_array($where))
            $where = array('node_id' => $where);
        if (isset($where['post_id'])) {
            $where['node_id'] = $where['post_id'];
            unset($where['post_id']);
        }
        $data = $this->mnodes->set($where, $data);

        if ($data != array()) {
            if (isset($where['node_id'])) {
                $where['post_id'] = $where['node_id'];
                unset($where['node_id']);
            }
            $this->db->join('nodes', 'nodes.node_id = posts.post_id');
            return parent::set($where, $data);
        }
        return true;
    }
    
    public function visited($id){
    	$this->db->set('visited_count', 'visited_count+1', false);
    	return parent::set(array('post_id' => $id), array('visited_last' => date('Y-m-d H:i:s')));
    }

    public function commented($id, $minus=false)
    {
        if($minus)
            $this->db->set('comment_count', 'comment_count-1', false);
        else
            $this->db->set('comment_count', 'comment_count+1', false);
        return parent::set(array('post_id' => $id), array());
    }

    public function rateup($id, $minus=false)
    {
        if($minus)
            $this->db->set('rateup', 'rateup-1', false);
        else
            $this->db->set('rateup', 'rateup+1', false);
        return parent::set(array('post_id' => $id), array());
    }

    public function delete($where)
    {
        if ($where && !is_array($where))
            $where = array('nodes.node_id' => $where); // when where is not false and only a single id
        if($this->mnodes->delete(array_merge(array('module' => 'post'), $where)))
            return true;
        return false;
    }
}