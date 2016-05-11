<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mpost_types extends EMIF_Model {

	public function __construct(){
        parent::__construct();
        $this->set_table('post_types');
    }
    
    public function get($where = false, $like = false, $order = false, $group = false, $select = false, $limit = false){ //overrides parent method get
    	if($where && !is_array($where))
    		$where = array('post_type_id' => $where); // when where is not false and only a single id
    	return parent::get($where, $like, $order, $group, $select, $limit);
    }

    public function get_all(){
        return $this->get_many(array());
    }

    public function set($where, $data){ //overrides parent method set
    	if($where && !is_array($where))
    		$where = array('post_type_id' => $where);
    	return parent::set($where, $data);
    }
    
    public function commentable($id){
    	$this->db->select('commentable');
    	return $this->get($id)->commentable;
    }

    public function taggable($id){
    	$this->db->select('taggable');
    	return $this->get($id)->taggable;
    }

    public function rateable($id){
    	$this->db->select('rateable');
    	return $this->get($id)->rateable;
    }
}