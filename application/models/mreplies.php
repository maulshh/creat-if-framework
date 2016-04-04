<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mreplies extends EMIF_Model {

	public function __construct(){
        parent::__construct();
        $this->load->model('mnodes');
        $this->set_table('replies');
    }
    
    public function get($where){ //overrides parent method get
    	if($where && !is_array($where))
    		$where = array('node_id' => $where); // when where is not false and only a single id
    	$this->db->join('nodes', 'nodes.node_id = replies.reply_id');
    	return parent::get($where);
    }

    public function get_many($where){ //overrides parent method get_many
    	$this->db->join('nodes', 'nodes.node_id = replies.reply_id');
    	//$this->db->join('nodes', 'nodes.node_id = replies.reply_id');
    	return parent::get_many(array_merge(array('module' => 'reply'), $where));
    }
    
	public function get_all(){
    	return $this->get_many(NULL);
    }
    
    public function add($data){ //overrides parent method add
    	$data = array_merge($data, array('module' => 'reply'));
    	return parent::add($this->mnodes->add($data));
    }
    
    public function set($where, $data){ //overrides parent method set
    	if($where && !is_array($where))
    		$where = array('node_id' => $where);
    	if(isset($where['reply_id'])){
    		$where['node_id'] = $where['reply_id'];
    		unset($where['reply_id']);
    	}
    	
    	$data = $this->mnodes->set($where, $data);
    	if(isset($where['node_id'])){
    		$where['reply_id'] = $where['node_id'];
    		unset($where['node_id']);
    	}
    	//$this->db->join('nodes', 'nodes.node_id = replies.reply_id');
    	return parent::set($where, $data);
    }
}