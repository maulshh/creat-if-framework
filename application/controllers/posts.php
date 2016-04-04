<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Posts extends EMIF_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->_loadmodel(array('musers', 'mmenus', 'mpermissions', 'mposts', 'mtags'));
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

    public function _loaddata_user($module, $permission)
    {
        if (!$this->mpermissions->get($this->session->userdata('role_id'), $module, $permission))
            redirect(base_url('no_permission'));

        $data['site_menus'] = $this->mmenus->get_menus('site-menu', $this->session->userdata('role_id'));
        $this->data['menus'] = $this->mmenus->get_menus('front-end', $this->session->userdata('role_id'));
        $this->data['header'] = $this->load->view(TEMPLATE.'/header', $this->data, true);
        $this->data['footer'] = $this->load->view(TEMPLATE.'/footer', $data, true);
    }

//    -----------------------------------------------------------------------------------------------

    public function index()
    {
        $this->_loaddata_user('front-end', 'read');
        $this->data['pages'] = 'Posts';
        $this->data['all'] = $this->mposts->get_many(array('public' => 1), false, "nodes.created desc", false, false);
        $this->data['content'] = $this->load->view(TEMPLATE.'/posts', $this->data, true);
        $this->load->view(TEMPLATE.'/template', $this->data);
    }

    public function view($id)
    {
        $this->data['post'] = $this->mposts->get($id);
        $this->data['pages'] = $this->data['post']->title;
        $this->_loaddata_user('front-end', 'read');
        $this->data['featured'] = $this->mposts->get_many(
            array(
                'featured' => 1,
                'nodes.status' => 'published',
                'public' => 1
            ), false, "nodes.created desc", false, false, 5
        );
        if (!$this->data['post'])
            redirect(base_url('not_found'));
        if ((!$this->data['post']->public || $this->data['post']->status != 'published') && $this->data['post']->user_id != $this->session->userdata('user_id'))
            redirect(base_url('no_permission'));
        $this->data['editable'] = $this->data['post']->user_id == $this->session->userdata('user_id') ||
            $this->mpermissions->get($this->session->userdata('role_id'), 'post', 'update-all-delete-all');
        $this->mposts->visited($id);
        $this->data['loginmodal'] = $this->load->view('modal/login', '', true);
        $this->data['content'] = $this->load->view(TEMPLATE.'/'.$this->data['post']->view, $this->data, true);
        $this->load->view(TEMPLATE.'/template', $this->data);
    }

    public function permalink($id)
    {
        $this->data['post'] = $this->mposts->get(array('permalink' => $id));
        $this->data['pages'] = $this->data['post']->title;
        $this->_loaddata_user('front-end', 'read');
        $this->data['featured'] = $this->mposts->get_many(
            array(
                'featured' => 1,
                'nodes.status' => 'published',
                'public' => 1
            ), false, "nodes.created desc", false, false, 5
        );
        if (!$this->data['post'])
            redirect(base_url('not_found'));
        if ((!$this->data['post']->public || $this->data['post']->status != 'published') && $this->data['post']->user_id != $this->session->userdata('user_id'))
            redirect(base_url('no_permission'));
        $this->data['editable'] = $this->data['post']->user_id == $this->session->userdata('user_id') ||
            $this->mpermissions->get($this->session->userdata('role_id'), 'post', 'update-all-delete-all');
        $this->mposts->visited($this->data['post']->post_id);
        $this->data['loginmodal'] = $this->load->view('modal/login', '', true);
        $this->data['content'] = $this->load->view(TEMPLATE.'/'.$this->data['post']->view, $this->data, true);
        $this->load->view(TEMPLATE.'/template', $this->data);
    }

    public function author($id)
    {
        //@todo menampilkan post milik satu user..
        $this->_loaddata_user('front-end', 'read');
        $this->data['user'] = $this->musers->get($id);
        $this->data['posts'] = $this->mposts->get_many(array('user_id' => $id, 'posts.status' => 'published'), false, "nodes.created desc", false, false);
        $this->data['pages'] = 'Post by ' . $this->data['user']->name;
        $this->data['content'] = $this->load->view(TEMPLATE.'/list_post', $this->data, true);
        $this->load->view(TEMPLATE.'/template', $this->data);
    }

    public function tags($id)
    {
        //@todo menampilkan post dari tag tertentu..
    }

//    -----------------------------------------------------------------------------------------------

    public function manage($type)
    {
        $this->_loaddata('post', 'access-all');
        $type = str_replace('-', ' ', $type);
        if ($this->mpermissions->get($this->session->userdata('role_id'), 'post', 'read-all'))
            $this->data['all'] = $this->mposts->get_many(array('post_type' => $type), false, "nodes.created desc", false, false);
        else
            $this->data['all'] = $this->mposts->get_many(array('post_type' => $type, 'user_id' => $this->session->userdata('user_id')), false, "nodes.created desc", false, false);
        $this->data['post_type'] = $this->mposts->get_post_type(array('post_type' => $type));
        $this->data['pages'] = isset($this->data['all'][0]->post_type) ? $this->data['all'][0]->post_type : $type;
        $this->data['upload'] = $this->load->view('modal/upload', array('types' => 'gif|jpg|jpeg|png', 'path' => 'assets/images/posts'), true);
        $this->data['content'] = $this->load->view('posts', $this->data, true);
        $this->load->view('template', $this->data);
    }

    public function add()
    {
        $this->_loaddata('post', 'create');
        $array = $this->input->post(NULL);
        $tags = $array['tags'];
        unset($array['tags']);
        if ($array['permalink'] != '')
            $array['uri'] = 'permalink/' . $array['permalink'];
        else
            unset($array['permalink']);
        $stat = $this->input->post('status') == 'Publish' ? 'published' : 'draft';
        $id = $this->mposts->add(array_merge($array,
            array(
                'cover' => create_uri($array['cover']),
                'thumbnail' => create_uri($array['thumbnail']),
                'commentable' => $array['commentable'],
                'user_id' => $this->session->userdata['user_id'],
                'status' => $stat,
            )
        ));
        if ($tags != '')
            $this->mtags->add($id, $tags);
        redirect(base_url($array['uri']));
    }

    public function add_tags()
    {
        if ($this->input->post('tags') != '')
            $this->mtags->add($this->input->post('id'), $this->input->post('tags'));
        echo json_encode($this->mtags->get(array('post_id' => $this->input->post('id')), false, false, 'post_id',
            array("GROUP_CONCAT(`tags`.`tag` SEPARATOR ', ') as tags", false)));
    }

    public function del_tag()
    {
        $this->mtags->delete($this->input->post('id'), $this->input->post('tag'));
        echo json_encode($this->mtags->get(array('post_id' => $this->input->post('id')), false, false, 'post_id',
            array("GROUP_CONCAT(`tags`.`tag` SEPARATOR ', ') as tags", false)));
    }

    public function edit($id)
    {
        $this->_loaddata('post', 'update');
        $data = $this->input->post(NULL);
        $post = $this->mposts->get($id);
        if ($this->mpermissions->get($this->session->userdata('role_id'), 'post', 'update-all')
            || $post->user_id == $this->session->userdata('user_id')
        ) {
            $tags = $data['tags'];
            unset($data['tags']);
            if ($data['permalink'] != '')
                $data['uri'] = 'permalink/' . $data['permalink'];
            else {
                unset($data['permalink']);
                $data['uri'] = 'posts/view/' . $id;
            }
            $data['status'] = $this->input->post('status') == 'Publish' ? 'published' : 'draft';
            $this->mposts->set($id, array_merge($data,
                array(
                    'commentable' => $this->input->post('commentable'),
                    'cover' => create_uri($data['cover']),
                    'thumbnail' => create_uri($data['thumbnail'])
                )));
            if ($tags != '')
                $this->mtags->add($id, $tags);
            redirect(base_url($data['uri']));
        } else {
            echo "You don't have enough permission to do that!";
        }
    }

    public function delete($id)
    {
        $this->_loaddata('post', 'delete');
        $post = $this->mposts->get($id);
        if ($this->mpermissions->get($this->session->userdata('role_id'), 'post', 'delete-all')
            || $post->user_id == $this->session->userdata('user_id')
        ) {
            $this->mposts->delete(array('post_id' => $id));
            $type = str_replace('-', ' ', $post->post_type);
            redirect(base_url('posts/manage/' . $type));
        } else {
            echo "You don't have enough permission to do that!";
        }
    }

    public function get_ajax($id)
    {
        $this->db->join('tags', 'tags.post_id = posts.post_id', 'left');
        echo json_encode($this->mposts->get($id, false, false, 'posts.post_id',
            array("title, permalink, content, preview, posts.commentable, public, nodes.status,
            GROUP_CONCAT(`tags`.`tag` SEPARATOR ', ') as tags, thumbnail, cover, featured, note", false)));
    }
}