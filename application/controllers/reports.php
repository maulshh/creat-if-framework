<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Reports extends EMIF_Controller {

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
        $this->_loaddata('report', 'access');
        $this->data['pages'] = 'Reports';
        $this->data['content'] = $this->load->view('reports', $this->data, true);
        $this->load->view('template', $this->data);
    }

    public function empty_func(){
        $this->_loaddata('empty_func', 'read');
        $this->load->view('empty_view', $this->data);
    }
}