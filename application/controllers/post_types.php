<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Post_types extends EMIF_Controller {

    public function __construct() {
        parent::__construct();
        $this->_loadmodel(array('musers', 'mmenus', 'mpermissions', 'mposts', 'mpost_types'));
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
		$this->_loaddata('post_type', 'access-all');
		$this->data['all'] = $this->mpost_types->get_all();
		$this->data['pages'] = 'Post Types';
		$this->data['content'] = $this->load->view('post_types', $this->data, true);
		$this->load->view('template', $this->data);
	}
    
    public function add(){
        //@todo tiap post_type memiliki page untu menampilkan post terbarunya..
        //(auto generate page ketika membuat post_type baru)
		$this->_loaddata('post_type', 'access-all');
        $data = $this->input->post(NULL);
		$this->mpost_types->add($data);
        $alias = strtolower(str_replace(' ', '-', $data['post_type']));
        $last = end(explode('-', $this->mmenus->get_last_position('3-')))+1;
        $array = array(
            'content'=>$this->input->post('post_type'),
            'uri'=>'posts/manage/'.$alias,
            'title'=>$this->input->post('post_type').' posts',
            'role_id'=>'-1-2-',
            'module_target'=>'admin-page',
            'position'=>'3-'.$last,
            'user_id' => $this->session->userdata('user_id'),
            'module' => 'menu',
            'note' => $this->input->post('post_type'),
            'status' => 1
        );
        $this->mmenus->add($array);
        redirect(base_url('post_types'));
	}
    
    public function edit($id){
		$this->_loaddata('post_type', 'access-all');
        $data = $this->input->post(NULL);
        $data = array_merge($data,
            array(
                'commentable'=>$data['commentable'],
                'taggable'=>$data['taggable'],
                'rateable'=>$data['rateable'],
            )
        );
        $last = strtolower(str_replace(' ', '-', $data['post_lama']));
        unset($data['post_lama']);
		$this->mpost_types->set($id, $data);
        $alias = strtolower(str_replace(' ', '-', $data['post_type']));
        $array = array(
            'content'=>$this->input->post('post_type'),
            'uri'=>'posts/manage/'.$alias,
            'title'=>$this->input->post('post_type').' posts'
        );
        $this->mmenus->set(array('uri'=>'posts/manage/'.$last),$array);
        redirect(base_url('post_types'));
	}
    
    public function delete($id){
		$this->_loaddata('post_type', 'access-all');
        $data = $this->mpost_types->get($id);
		$this->mpost_types->delete(array('post_type_id'=>$id));
        $alias = strtolower(str_replace(' ', '-', $data->post_type));
        $this->mmenus->delete(array('uri'=>'posts/manage/'.$alias));
        redirect(base_url('post_types'));
	}
}