<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mempty_model extends EMIF_Model {

	public function __construct(){
        parent::__construct();
        $this->set_table('empty');
    }
    
    public function get($where, $like){ //overrides parent method get
    	if($where && !is_array($where))
    		$where = array('empty_id' => $where); // when where is not false and only a single id
    	return parent::get($where, $like);
    }

    public function get_all(){
        return $this->get_many();
    }

    public function set($where, $data){ //overrides parent method set
    	if($where && !is_array($where))
    		$where = array('empty_id' => $where);
    	return parent::set($where, $data);
    }
}