<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Sites extends EMIF_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->_loadmodel(array('mmenus', 'mpermissions'));
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
        $this->_loaddata('site', 'edit');
        $this->data['pages'] = 'Site Options';
        $this->data['success_message'] = 0;
        $this->data['message'] = 0;
        if ($this->input->get('success') == 'true')
            $this->data['success_message'] = 'Settings Successfully Updated';
        else if ($this->input->get('success') == 'false')
            $this->data['message'] = 'Update Settings Failed';
        $this->data['content'] = $this->load->view('sites', $this->data, true);
        $this->load->view(ADMIN_TEMPLATE . '/template', $this->data);
    }

    public function edit()
    {
        $this->_loaddata('site', 'edit');
        if ($this->msites->set($this->input->post(NULL)))
            redirect(base_url('sites?success=true'));
        redirect(base_url('sites?success=false'));
    }

    public function upload()
    {
        echo $target = create_uri($this->input->post('path'));
        if (($_FILES['file']['name']) != null) {
            $config['upload_path'] = DOC_ROOT . $target;
            $config['file_name'] = $this->input->post('name');
            $config['allowed_types'] = $this->input->post('allowed_types');
            $config['overwrite'] = TRUE;
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload("file")) {
                $error = array('error' => $this->upload->display_errors());
                echo "<script type='text/javascript'>alert('gagal upload foto $error[error] !');history.go(-1)</script>";
            } else {
                echo "Profile picture berhasil diubah!";
                echo "<script>
                setTimeout(function(){
                    history.go(-1);
                }, 2000)
              </script>";
            }
        }
    }
}