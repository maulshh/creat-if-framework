<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Starter extends EMIF_Controller {

    public function __construct() {
        parent::__construct();
        $this->_loadmodel(array('musers', 'mmenus', 'mpermissions'));
    }

	public function _loaddata($module, $permission, $bol=false){
		if(!$this->mpermissions->get($this->session->userdata('role_id'), $module, $permission)){
			if($bol) return false;
			redirect(base_url('login?error=k'));
		}
		$this->data = NULL;
        $this->data['menus'] = $this->mmenus->get_menus('admin-page', $this->session->userdata('role_id'));

		return true;
	}
	
	public function index(){
//		$this->_loaddata('admin-page', 'read');
		$this->data['pages'] = 'Starter';
//		$this->data['content'] = $this->load->view('starter', $this->data, true);
		$this->load->view('starter', $this->data);
	}
}