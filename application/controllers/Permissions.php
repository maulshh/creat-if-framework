<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Permissions extends EMIF_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->_loadmodel(array('musers', 'mmenus', 'mpermissions'));
    }

    public function _loaddata($module, $permission, $bol = false)
    {
        if (!$this->mpermissions->get($this->session->userdata('role_id'), $module, $permission)) {
            if ($bol) return false;
            redirect(base_url('login?error=k'));
        }
        $this->data = NULL;
        $this->data['menus'] = $this->mmenus->get_menus('admin-page', $this->session->userdata('role_id'));
        $this->data['header_menus'] = $this->mmenus->get_menus('header-admin', $this->session->userdata('role_id'));

        return true;
    }

    public function index()
    {
        $this->_loaddata('permission', 'access-all');
        $this->data['pages'] = 'Permissions';
        $this->data['all'] = $this->mpermissions->get_all();
        $this->data['type'] = $this->mpermissions->get_many(false, false, false, 'roles.role_id', 'role_name, roles.role_id');
        $this->data['content'] = $this->load->view('permissions', $this->data, true);
        $this->load->view(ADMIN_TEMPLATE . '/template', $this->data);
    }

    public function get_permissions($target)
    {
        $data['permissions'] = $this->mpermissions->get_many(array('module_target' => $target));
        $this->load->view('permission_targetted', $data);
    }

    public function add()
    {
        $this->_loaddata('permission', 'access-all');
        $array = $this->input->post(NULL);
        $array['permission'] = '-' . $array['permission'] . '-';
        $this->mpermissions->add($array);
        redirect(base_url('permissions'));
    }

    public function delete($id)
    {
        $this->_loaddata('permission', 'access-all');
        $this->mpermissions->delete($id);
        redirect(base_url('permissions'));
    }
}