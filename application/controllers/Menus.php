<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Menus extends EMIF_Controller
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
        $this->_loaddata('menu', 'access-all');
        $this->data['pages'] = 'Menus';
        $this->data['all'] = $this->mmenus->get_alltargets($this->session->userdata('role_id'));
        $this->data['menuss'] = '';
        if ($target = $this->input->get('target')) {
            $dato['menus'] = $this->mmenus->get_many(array('module_target' => $target));
            $this->data['menuss'] = $this->load->view('menu_targetted', $dato, true);
        }
        $this->data['content'] = $this->load->view('menus', $this->data, true);
        $this->load->view(ADMIN_TEMPLATE . '/template', $this->data);
    }

    public function get_menus($target)
    {
        $data['menus'] = $this->mmenus->get_many(array('module_target' => $target));
        $this->load->view('menu_targetted', $data);
    }

    public function add()
    {
        $this->_loaddata('menu', 'access-all');
        $array = array(
            'user_id' => $this->session->userdata('user_id'),
            'module' => 'menu',
            'note' => '',
            'status' => 1
        );
        $this->mmenus->add(array_merge($this->input->post(NULL), $array));
        redirect(base_url('menus?target=' . $this->input->post('module_target')));

    }

    public function edit($id)
    {
        $this->_loaddata('menu', 'access-all');
        $this->mmenus->set($id, $this->input->post(NULL));
        redirect(base_url('menus?target=' . $this->input->post('module_target')));
    }

    public function delete($id)
    {
        $res = $this->mmenus->get($id);
        $this->mmenus->delete($id);
        redirect(base_url('menus?target=' . $res->module_target));
    }
}