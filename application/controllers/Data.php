<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Data extends EMIF_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->_loadmodel(array('musers', 'mmenus', 'mpermissions'));
        $this->load->helper('download');
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
        $this->_loaddata('admin-page', 'read');
        $this->data['pages'] = 'Data';
        $this->data['content'] = $this->load->view('data', $this->data, true);
        $this->load->view(ADMIN_TEMPLATE . '/template', $this->data);
    }

    public function import($table)
    {
        $target = DOC_ROOT . "db/import/";
        $target_dir = $target . $table . ".txt";
        if (($_FILES["file"]["name"] != '')
            && ($_FILES["file"]["size"] < 600000)
            && move_uploaded_file($_FILES["file"]["tmp_name"], $target_dir)
            && $this->msites->import($target_dir, $table)
        ) {
            redirect(base_url("$table?import=1"));
        } else {
            redirect(base_url("$table?import=0"));
        }
    }

    public function export($table)
    {
        if ($name = $this->msites->export($table)) {
            $type = $this->input->post('type') ? $this->input->post('type') : "csv";
            $content = file_get_contents($name); // Read the file's contents
            $name = "$table." . $type;
            force_download($name, $content);
            redirect(base_url("$table?export=1"));
        } else
            redirect(base_url("$table?export=0"));
    }
}