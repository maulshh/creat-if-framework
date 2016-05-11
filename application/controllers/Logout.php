<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
/**
 *
 */
class Logout extends EMIF_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function _loaddata($module, $permission, $bol=false){
        if(!$this->mpermissions->get($this->session->userdata('role_id'), $module, $permission)){
            if($bol) return false;
            redirect(base_url('login?error=k'));
        }
        $this->data = NULL;
        return true;
    }

    public function index(){
        $this->session->sess_destroy();
        redirect(base_url());
    }
}
