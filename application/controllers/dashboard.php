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
        $this->data['header_menus'] = $this->mmenus->get_menus('header-admin', $this->session->userdata('role_id'));

        return true;
    }

    public function index()
    {
        $this->_loaddata('admin-page', 'read');
        $this->data['pages'] = 'Dashboard';
        $this->data['content'] = $this->load->view('dashboard', $this->data, true);
        $this->load->view('template', $this->data);
    }

    public function upload_image($ajax = false, $overwrite = true)
    {
        $path = $this->input->post('path');
        if ($path == '') {
            $path = 'assets/images/uploads';
        }
        $this->load->library('Imageupload');
        $this->imageupload->upload($_FILES['userfile']);

        $string = '';
        if ($this->imageupload->uploaded) {
            if (($name = trim($this->input->post('name'))) == '') {
                $name = $this->imageupload->file_src_name_body;
            }
            if (!$ajax) $string .= "for image $name:";
            if ($this->input->post('size') == '')
                $sizes = array(768);
            else
                $sizes = explode(",", $this->input->post('size'));
            foreach ($sizes as $size) {
                if ($size == end($sizes)) {
                    $this->imageupload->file_new_name_body = $name;
                } else {
                    $this->imageupload->file_new_name_body = $name . '-' . $size . 'x' . $size;
                }
                $this->imageupload->file_new_name_ext = 'jpg';
                $this->imageupload->file_force_extension = true;
                $this->imageupload->file_overwrite = $overwrite;
                $this->imageupload->image_resize = true;
                $this->imageupload->image_x = $size;
                $this->imageupload->image_ratio_y = true;
                $this->imageupload->process(DOC_ROOT . $path);
                if ($this->imageupload->processed) {
                    if (!$ajax) $string .= '<br>image resized for ' . $size;
                    $string .= "Image uploaded in <br>" . base_url($path . "/" . $this->imageupload->file_dst_name);
                } else {
                    echo 'error : ' . $this->imageupload->error;
                    break;
                }
            }
            $this->imageupload->clean();
            echo "upload sukses!<br><br>" . $string;
        } else {
            echo "Image gagal diupload!";
        }
        if (!$ajax)
            redirect(base_url('dashboard'));
    }
}