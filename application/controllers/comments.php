<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Comments extends EMIF_Controller {

    public function __construct() {
        parent::__construct();
        $this->_loadmodel(array('musers', 'mmenus', 'mpermissions', 'mcomments', 'mposts', 'mpages'));
    }

    public function _loaddata($module, $permission, $bol=false){
        if(!$this->mpermissions->get($this->session->userdata('role_id'), $module, $permission)){
            if($bol) return false;
            redirect(base_url('login?error=k'));
        }
        $this->data = NULL;
        $this->data['menus'] = $this->mmenus->get_menus('admin-page', $this->session->userdata('role_id'));
        return true;
    }

    public function index(){
        if(!$this->_loaddata('admin-page', 'read'))
            redirect(base_url('login?error=k'));
        $this->data['pages'] = 'Comments';
        $this->data['content'] = $this->load->view('comments', $this->data, true);
        $this->load->view('template', $this->data);
    }

    public function add($id, $post = true){
        if(!$this->_loaddata('comment', 'create', true)){
            echo "harap login terlebih dahulu";
            return;
        }
        if($post)
            $obj = $this->mposts->get($id);
        else
            $obj = $this->mpages->get($id);
        if(!$obj || !$obj->commentable){
            echo "maaf, post ini tidak menerima komentar!";
            return;
        }
        $data = $this->input->post(NULL);
        if($comment_id = $this->mcomments->add(array_merge($data,
            array(
                'user_id' => $this->session->userdata('user_id')
            )
        ))){
            $this->mcomments->set($comment_id, array('uri' => $obj->uri."#comment-".$comment_id));
            if($data['parent_id'] == $id){
                if($post)
                    $this->mposts->commented($data['parent_id']);
                else{
                    $this->mpages->commented($data['parent_id']);
                }
            } else
                $this->mcomments->commented($data['parent_id']);
        }
        echo "Reply sukses";
    }

    public function edit($comment_id){
        if(!$this->_loaddata('comment', 'update')){
            echo "Anda tidak punya hak akses, harap login terlebih dahulu";
            return;
        }
        $data['comment'] = $this->mcomments->get($comment_id);
        if($this->mpermissions->get($this->session->userdata('role_id'), 'comment', 'update-all') || $this->session->userdata('user_id') == $data['comment']->user_id){
            $data = $this->input->post(NULL);
            $this->mcomments->set($comment_id, $data);
            echo "Edit sukses";
        } else
            echo "You don't have the permission TO";
    }

    public function empty_func(){
        $this->_loaddata('empty_func', 'read');
        $this->load->view('empty_view', $this->data);
    }

    public function get_ajax($parent_id){
        $data['comments'] = $this->mcomments->get_many(array('parent_id' => $parent_id, 'nodes.status' => 'published', 'public' => 1));
        $data['post_id'] = $this->input->post('post_id');
        $data['depth'] = $this->input->post('depth');
        $this->load->view(TEMPLATE.'/ajax/comments', $data);
    }

    public function reply_ajax(){
        $data['parent_id'] = $this->input->post('parent_id');
        $data['post_id'] = $this->input->post('post_id');
        $data['user'] = $this->musers->get($this->session->userdata('user_id')?$this->session->userdata('user_id'):-1);
        $this->load->view(TEMPLATE.'/ajax/reply_comments', $data);
    }

    public function edit_ajax(){
        if(!$this->_loaddata('comment', 'update')){
            echo "Anda tidak punya hak akses, harap login terlebih dahulu";
            return;
        }
        $data['comment'] = $this->mcomments->get($this->input->post('comment_id'));
        if($this->mpermissions->get($this->session->userdata('role_id'), 'comment', 'update-all') || $this->session->userdata('user_id') == $data['comment']->user_id)
            $this->load->view(TEMPLATE.'/ajax/edit_comments', $data);
        else{
            echo "You don't have the permission TO";
        }
    }

    public function delete_ajax($post_id){
        if(!$this->_loaddata('comment', 'delete')){
            echo "harap login terlebih dahulu";
            return;
        }
        $data['comment'] = $this->mcomments->get($this->input->post('comment_id'));
        if($this->mpermissions->get($this->session->userdata('role_id'), 'comment', 'delete-all') || $this->session->userdata('user_id') == $data['comment']->user_id){
            $this->mcomments->delete(array('comment_id' => $data['comment']->comment_id));
            if($data['comment']->parent_id == $post_id)
                $this->mposts->commented($data['comment']->parent_id, true);
            else
                $this->mcomments->commented($data['comment']->parent_id, true);
            echo "Comment deleted!";
        } else {
            echo "You don't have the permission TO";
        }
    }
}