<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

abstract class EMIF_Controller extends CI_Controller{

    public function __construct() {
        parent::__construct();
        $this->load->library('Datatables');
//        $this->load->library('table');
        $this->load->database();
        $role = $this->session->userdata('role_id');
        if(empty($role)){
        	$this->session->set_userdata(array('role_id' => '4'));
        }
        date_default_timezone_set("Asia/Jakarta");
        $this->_loadmodel(array('msites'));
        $this->_define_constant();
    }

    public function _define_constant(){
        $settings = $this->msites->get();
        foreach($settings as $index => $value){
            define(strtoupper($index), $value);
        }
    }

    public function _formatdate($val){
        if(is_int($val)){
            return date(DATE_FORMAT, $val);
        } else{
            if(substr(DATE_FORMAT, 0, 1) == 'm'){
                return mktime(23,59,59, substr($val, 0, 2), substr($val, 3, 2), substr($val, 6, 4));
            } else {
                return mktime(23,59,59, substr($val, 3, 2), substr($val, 0, 2), substr($val, 6, 4));
            }
        }
    }

    public function datatable($from, $select = false, $where = false, $join = false, $like = false, $group = false) {
        if($where)
            $this->datatables->where($where);
        if($like)
            $this->datatables->like($like);
        if($join){
            foreach($join as $j){
                if(count($j) == 2){
                    $this->datatables->join($j[0], $j[1]);
                } else {
                    $this->datatables->join($j[0], $j[1], $j[2]);
                }
            }
        }
        if($group)
            $this->datatables->group_by($group);
        if($select)
            $this->datatables->select($select, false);
        $this->datatables->from($from);
        echo $this->datatables->generate();
    }

    public function ajax(){
        $this->_loaddata('admin-page', 'ajax');
        $array = $this->msites->query("select ".$this->input->post('query'))->result();
        echo json_encode($array);
    }

	public function _loadmodel($models){
		foreach($models as $model)
			$this->load->model($model);	
	}

    public abstract function _loaddata($module, $permission, $bol);
}