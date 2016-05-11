<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Users extends EMIF_Controller
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
        $this->_loaddata('user', 'access-all');
        $this->data['pages'] = 'Users';
        $this->data['users'] = $this->musers->get_all();
        $this->data['content'] = $this->load->view('users', $this->data, true);
        $this->load->view(ADMIN_TEMPLATE . '/template', $this->data);
    }

    public function profile($username = false)
    {
        $this->_loaddata('admin-page', 'read');
        if ($username == $this->session->userdata('username')) {
            $username = false;
        }
        $this->data['pages'] = 'Profile' . ($username ? " $username" : "");
        $this->data['profile'] = $this->musers->get(array('username' => $username ? $username : $this->session->userdata('username')));
        $this->data['editable'] = !$username || $this->session->userdata('role_id') <= 2;
        $this->data['content'] = $this->load->view('profile', $this->data, true);
        $this->load->view(ADMIN_TEMPLATE . '/template', $this->data);
    }

    public function change_pict()
    {
        if ($this->_loaddata('user', 'access-all', true) || $this->input->post('user_id') == $this->session->userdata('user_id')) {
            $target = 'assets/images/users/';
            if (($_FILES['file']['name']) != null) {
                $this->load->library('imageupload');
                $this->imageupload->upload($_FILES['userfile']);
                if ($this->imageupload->uploaded) {
                    $size = $this->imageupload->getwidth() > $this->imageupload->getheight() ? $this->imageupload->getheight() : $this->imageupload->getwidth();
                    $this->imageupload->file_new_name_body = $this->input->post('user_id');
                    $this->imageupload->file_overwrite = true;
                    $this->imageupload->file_new_name_ext = 'jpg';
                    $this->imageupload->file_force_extension = true;
                    $this->imageupload->image_resize = true;
                    $this->imageupload->image_x = $size;
                    $this->imageupload->image_y = $size;
                    $this->imageupload->image_ratio_crop = true;
                    $this->imageupload->image_ratio_fill = true;
                    $this->imageupload->process(DOC_ROOT . $target);
                    if ($this->imageupload->processed) {
                        $this->musers->set(
                            array('user_id' => $this->input->post('user_id')),
                            array('pict' => $target . $this->input->post('user_id') . '.jpg')
                        );
                        echo "Profile picture berhasil diubah!";
                        echo "<script>
                            setTimeout(function(){
                                history.go(-1);
                            }, 3000)
                          </script>";
                    } else {
                        echo "<script type='text/javascript'>alert('gagal upload foto $this->imageupload->error] !');history.go(-1)</script>";
                    }
                    $this->imageupload->clean();
                }
            }
        }
    }

    public function change_pass()
    {
        if ($this->_loaddata('user', 'access-all', true) || $this->input->post('user_id') == $this->session->userdata('user_id')) {
            $user = $this->musers->get($this->input->post('user_id'));
            if (md5($this->input->post('old-pass')) == $user->pass) {
                if ($this->input->post('pass') == $this->input->post('re-pass')) {
                    $this->musers->set(
                        array('user_id' => $this->input->post('user_id')),
                        array('pass' => md5($this->input->post('pass')))
                    );
                    echo "Password berhasil diubah!";
                } else
                    echo "Retype password tidak cocok!";
            } else
                echo "Maaf, password yang anda masukkan salah!";
            echo "<script>
                setTimeout(function(){
                    history.go(-1);
                }, 3000)
              </script>";
        }
    }

    public function add()
    {
        $this->_loaddata('user', 'access-all');
        $array = $this->input->post(NULL);
        $send = false;
        if (isset($array['send'])) {
            $send = true;
            unset($array['send']);
        }
        $correct = true;
        if ($array['pass'] != $array['re-pass']) {
            $correct = false;
        } else if (!filter_var($array['email'], FILTER_VALIDATE_EMAIL)) {
            $correct = false;
        }
        unset($array['re-pass']);
        $array['pass'] = md5($array['pass']);
        if ($correct && $this->musers->add(array_merge($array,
                array(
                    'uri' => "users/profile/" . strtolower($array['username']),
                    'pict' => "assets/images/users/default.jpg",
                    'status' => "active"
                )))
        ) {
            echo "User baru telah dibuat!";
            if ($send) {
                $subject = "Terdaftar di " . SITE_NAME;
                $message = '
    Anda telah terdaftar pada web ' . SITE_NAME . " " . base_url() . '.

    Silahkan login pada dengan menggunakan akun:
    Username: ' . $array['username'] . '
    Password: ' . $array['pass'] . '

    Jika anda merasa bukanlah pihak yang dituju harap menghiraukan email ini.';
                $header = 'From:noreply@' . SITE_URL . '\r\n';
                if (mail($array['email'], $subject, $message, $header))
                    echo '<script>alert("Email telah dikirimkan ke ' . $array['email'] . '")</script>';
            }
        } else {
            echo 'Maaf, user gagal dibuat!';
        }
        echo "<script>
                setTimeout(function(){
                    window.location = '" . base_url('users') . "'
                }, 3000)
              </script>";
    }

    public function edit($id)
    {
        if ($id == $this->session->userdata('user_id') || $this->_loaddata('user', 'access-all', true)) {
            $data = $this->input->post(NULL);
            $data['uri'] = "users/profile/" . strtolower($data['username']);
            if ($this->musers->set($id, $data)) {
                if($id == $this->session->userdata('user_id'))
                    $this->session->set_userdata('username', $data['username']);
                if (isset($data['tanggal_masuk']))
                    redirect('users');
                redirect(base_url('users/profile/' . $data['username']));
            }
        }
        redirect(base_url('users/profile'));
    }

    public function delete($id)
    {
        $this->_loaddata('user', 'access-all');
        $this->musers->delete(array('user_id' => $id));
        redirect(base_url('users'));
    }
}