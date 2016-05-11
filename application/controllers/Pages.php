<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Pages extends EMIF_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->_loadmodel(array('musers', 'mmenus', 'mpermissions', 'mpages', 'mpost_types', 'mposts'));
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

    public function _loaddata_user($module, $permission)
    {
        if (!$this->mpermissions->get($this->session->userdata('role_id'), $module, $permission))
            redirect(base_url('no_permission'));

        $data['site_menus'] = $this->mmenus->get_menus('site-menu', $this->session->userdata('role_id'));
        $this->data['menus'] = $this->mmenus->get_menus('front-end', $this->session->userdata('role_id'));
        $this->data['header'] = $this->load->view(TEMPLATE . '/header', $this->data, true);
        $this->data['footer'] = $this->load->view(TEMPLATE . '/footer', $data, true);
    }

    public function index()
    {
        $this->_loaddata('page', 'read-all');
        $this->data['pages'] = 'Pages';
        $this->data['all'] = $this->mpages->get_all();
        $this->data['post_types'] = $this->mpost_types->get_all();
        $this->data['content'] = $this->load->view('pages', $this->data, true);
        $this->load->view(ADMIN_TEMPLATE . '/template', $this->data);
    }

    public function view($id)
    {
        $this->data['page'] = $this->mpages->get(array('nodes.uri' => $id));
        $this->data['pages'] = $this->data['page']->note;
        $this->_loaddata_user('front-end', 'read');
        if (!$this->data['page'])
            redirect(base_url('not_found'));
        if ($this->data['page']->status != 'published' && $this->data['page']->user_id != $this->session->userdata('user_id'))
            redirect(base_url('no_permission'));
        if ($this->data['page']->post_category != NULL) {
            $this->data['posts'] = $this->mposts->get_many(
                array(
                    'posts.post_type_id' => $this->data['page']->post_category,
                    'nodes.status' => 'published',
                    'public' => 1
                ), false, "nodes.created desc", false, false
            );
            $this->data['featured'] = $this->mposts->get_many(
                array(
                    'featured' => 1,
                    'nodes.status' => 'published',
                    'public' => 1
                ), false, "nodes.created desc", false, false, 5
            );
        }
        $this->data['loginmodal'] = $this->load->view('modal/login', '', true);
        $this->data['content'] = $this->load->view(TEMPLATE . '/' . $this->data['page']->view, $this->data, true);
        $this->data['header'] = $this->load->view(TEMPLATE . '/header', $this->data, true);
        $this->load->view(TEMPLATE . '/template', $this->data);
    }

    public function add()
    {
        //@todo hampir selalu page punya menu..
        // (auto generate menu dan tambah kolom menu pada db page)
        $this->_loaddata('page', 'create');
        $array = $this->input->post(NULL);
        $stat = $this->input->post('status') == 'Publish' ? 'published' : 'draft';
        $this->mpages->add(array_merge($array,
            array(
                'commentable' => $array['commentable'],
                'user_id' => $this->session->userdata('user_id'),
                'status' => $stat
            )
        ));
        redirect(base_url('pages'));
    }

    public function edit($id)
    {
        $this->_loaddata('page', 'update');
        $data = $this->input->post(NULL);
        $stat = $this->input->post('status') == 'Publish' ? 'published' : 'draft';
        $this->mpages->set($id, array_merge($data, array(
            'commentable' => $data['commentable'],
            'status' => $stat
        )));
        redirect(base_url('pages'));
    }

    public function delete($id)
    {
        $this->_loaddata('page', 'delete');
        $this->mpages->delete($id);
        redirect(base_url('pages'));
    }

    public function get_ajax($id)
    {
        echo json_encode($this->mpages->get($id, false, false, false, array("title, nodes.uri as uri, content, commentable, view, nodes.status as status, cover, post_category", false)));
    }
}