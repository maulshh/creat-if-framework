<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends EMIF_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->_loadmodel(array('musers', 'mmenus', 'mpermissions', 'mposts'));
    }

    public function _loaddata($module, $permission, $bol = false)
    {
        if (!$this->mpermissions->get($this->session->userdata('role_id'), $module, $permission)) {
            if ($bol) return false;
            redirect(base_url('login?error=k'));
        }
        $this->data = NULL;
        $this->data['menus'] = $this->mmenus->get_menus('admin-page', $this->session->userdata('role_id'));

        return true;
    }

    public function index()
    {
        $this->_loaddata('admin-page', 'read');
        $this->data['pages'] = 'Dashboard';
        $this->data['content'] = $this->load->view('dashboard', $this->data, true);
        $this->load->view('template', $this->data);
    }

    public function upload_image($ajax = false)
    {
        $path = $this->input->post('path');
        if($path == ''){
            $path = 'assets/images/uploads';
        }
        $this->load->helpers('upload');
        $handle = new upload($_FILES['image_field']);
        if ($handle->uploaded) {
            if (($name = trim($this->input->post('name'))) == '') {
                $name = $handle->file_src_name_body;
            }
            if (!$ajax) echo "for image $name:";
            $sizes = array(150, 300, 768);
            foreach ($sizes as $size) {
                if ($size == 768) {
                    $handle->file_new_name_body = $name;
                } else {
                    $handle->file_new_name_body = $name . '-' . $size . 'x' . $size;
                }
                $handle->file_new_name_ext = 'jpg';
                $handle->file_force_extension = true;
                $handle->image_resize = true;
                $handle->image_x = $size;
                $handle->image_ratio_y = true;
                $handle->process(DOC_ROOT . $path);
                if ($handle->processed) {
                    if (!$ajax) echo '<br>image resized for ' . $size;
                } else {
                    echo 'error : ' . $handle->error;
                    break;
                }
            }
            $handle->clean();
        }
        if (!$ajax)
            redirect(base_url('dashboard'));
    }
}