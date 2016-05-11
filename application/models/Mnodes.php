<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mnodes extends EMIF_Model {

	public function __construct(){
        parent::__construct();
        $this->set_table('nodes');
    }
    
    public function get($where = false, $like = false, $order = false, $group = false, $select = false, $limit = false, $array = false){ //overrides parent method get
    	if($where && !is_array($where))
    		$where = array('node_id' => $where); // when where is not false and only a single id
    	return parent::get($where);
    }

	public function add($data){ //overrides parent method add
		$array = array(
			'user_id' => $data['user_id'],
			'module' => $data['module'],
			'uri' => isset($data['uri'])?$data['uri']:'',
			'title' => $data['title'],
			'content' => $data['content'],
			'note' => isset($data['note'])?$data['note']:'',
			'status' => $data['status']
		);
		$data[$array['module'].'_id'] = parent::add($array);
		return array_diff_assoc($data, $array); // return array difference which haven't been updated yet
	}

    public function set($where, $data){ //overrides parent method set
    	if($where && !is_array($where))
    		$where = array('node_id' => $where); // when where is not false and only a single id
		$array = array(
			'node_id' => '',
			'user_id' => '',
			'module' => '',
			'created' => '',
			'uri' => '',
			'title' => '',
			'content' => '',
			'note' => '',
			'status' => ''
		);
		$array = array_intersect_key($data, $array);
		$array['modified'] = date('Y-m-d H:i:s');
		parent::set($where, $array);
		return array_diff_assoc($data, $array); // return array difference which haven't been updated yet
    }
}