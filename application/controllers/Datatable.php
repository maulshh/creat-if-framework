<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Datatable extends EMIF_Controller {

    public function __construct() {
        parent::__construct();
        $this->_loadmodel(array('mpermissions'));
    }

    public function _loaddata($module, $permission, $bol = false){
        if(!$this->mpermissions->get($this->session->userdata('role_id'), $module, $permission)){
            return false;
        }
        return true;
    }

	public function post(){
        $data['table'] = 'posts';
        $data['primaryKey'] = 'post_id';
        $data['columns'] = array(
            array( 'db' => "`n`.`title`",
                'dt' => 0, 'field' => 'title', 'as'=>'title'),
            array( 'db' => '`p`.`preview`',
                'dt' => 1, 'field' => 'preview'),
            array( 'db' => '`u`.`username`',
                'dt' => 2, 'field' => 'username'),
            array( 'db' => "GROUP_CONCAT(`t`.`tag` SEPARATOR ', ')",
                'dt' => 3, 'field' => 'tag', 'as'=>'tag'),
            array( 'db' => '`p`.`comment_count`',
                'dt' => 4, 'field' => 'comment_count'),
            array( 'db' => "CONCAT_WS(',',`n`.`modified`,`n`.`created`)",
                'dt' => 5, 'field' => 'date', 'as'=>'date'),
            array( 'db' => "`n`.`status`",
                'dt' => 6, 'field' => 'status'),
            array( 'db' => "`u`.`uri`",
                'dt' => 7, 'field' => 'uri'),
            array( 'db' => "`n`.`uri`",
                'dt' => 8, 'field' => 'link', 'as'=>'link'),
            array( 'db' => "`p`.`post_id`",
                'dt' => 9, 'field' => 'post_id'),
            array( 'db' => "`p`.`public`",
                'dt' => 10, 'field' => 'public'),
            array( 'db' => "`p`.`commentable`",
                'dt' => 11, 'field' => 'commentable'),
        );
        $data['joinQuery'] = 'FROM `posts` AS `p` JOIN `post_types` AS `pt` ON (`p`.`post_type_id` = `pt`.`post_type_id`) JOIN `nodes` AS `n` ON (`p`.`post_id` = `n`.`node_id`) JOIN `users` AS `u` ON (`u`.`user_id` = `n`.`user_id`) LEFT JOIN `tags` AS `t` ON (`p`.`post_id` = `t`.`post_id`)';
        if($this->_loaddata('post', 'access-all'))
            $data['extraWhere'] = "`n`.`module` = 'post' AND `pt`.`post_type_id` = '".$_GET['post']."' GROUP BY `p`.`post_id`";
        else
            $data['extraWhere'] = "`n`.`module` = 'post' AND `pt`.`post_type_id` = '".$_GET['post']."' GROUP BY `p`.`post_id` AND n.user_id = ".$this->session->userdata('user_id');
        $this->load->view('datatable/base', $data);
	}

    public function complaint(){
        $data['table'] = 'comments';
        $data['primaryKey'] = 'comment_id';
        $data['columns'] = array(
            array( 'db' => "`n`.`title`",
                'dt' => 0, 'field' => 'title', 'as'=>'title'),
            array( 'db' => '`n`.`content`',
                'dt' => 1, 'field' => 'content'),
            array( 'db' => '`u`.`username`',
                'dt' => 2, 'field' => 'username'),
            array( 'db' => "`np`.`title`",
                'dt' => 3, 'field' => 'post_title', 'as'=>'post_title'),
            array( 'db' => "CONCAT_WS(',',`n`.`modified`,`n`.`created`)",
                'dt' => 4, 'field' => 'date', 'as'=>'date'),
            array( 'db' => "`np`.`uri`",
                'dt' => 5, 'field' => 'post_uri', 'as'=>'post_uri'),
            array( 'db' => "`n`.`status`",
                'dt' => 6, 'field' => 'status'),
            array( 'db' => "`u`.`uri`",
                'dt' => 7, 'field' => 'uri'),
            array( 'db' => "`c`.`comment_id`",
                'dt' => 8, 'field' => 'comment_id'),
            array( 'db' => "`n`.`uri`",
                'dt' => 9, 'field' => 'comment_uri', 'as'=>'comment_uri'),
            array( 'db' => "`c`.`public`",
                'dt' => 10, 'field' => 'public')
        );
        $data['joinQuery'] = 'FROM `comments` AS `c` JOIN `nodes` AS `n` ON (`c`.`comment_id` = `n`.`node_id`) JOIN `nodes` AS `np` ON (`c`.`parent_id` = `np`.`node_id`) JOIN `users` AS `u` ON (`u`.`user_id` = `n`.`user_id`)';
        if($this->_loaddata('comment', 'update-all-delete-all'))
            $data['extraWhere'] = "`n`.`module` = 'comment' AND `c`.`parent_id` = '45'";
        else
            $data['extraWhere'] = "`n`.`module` = 'comment' AND `c`.`parent_id` = '45' AND n.user_id = ".$this->session->userdata('user_id');
        $this->load->view('datatable/base', $data);
    }

    public function comment(){
        $data['table'] = 'comments';
        $data['primaryKey'] = 'comment_id';
        $data['columns'] = array(
            array( 'db' => "`n`.`title`",
                'dt' => 0, 'field' => 'title', 'as'=>'title'),
            array( 'db' => '`n`.`content`',
                'dt' => 1, 'field' => 'content'),
            array( 'db' => '`u`.`username`',
                'dt' => 2, 'field' => 'username'),
            array( 'db' => "`np`.`title`",
                'dt' => 3, 'field' => 'post_title', 'as'=>'post_title'),
            array( 'db' => "CONCAT_WS(',',`n`.`modified`,`n`.`created`)",
                'dt' => 4, 'field' => 'date', 'as'=>'date'),
            array( 'db' => "`np`.`uri`",
                'dt' => 5, 'field' => 'post_uri', 'as'=>'post_uri'),
            array( 'db' => "`n`.`status`",
                'dt' => 6, 'field' => 'status'),
            array( 'db' => "`u`.`uri`",
                'dt' => 7, 'field' => 'uri'),
            array( 'db' => "`c`.`comment_id`",
                'dt' => 8, 'field' => 'comment_id'),
            array( 'db' => "`n`.`uri`",
                'dt' => 9, 'field' => 'comment_uri', 'as'=>'comment_uri'),
            array( 'db' => "`c`.`public`",
                'dt' => 10, 'field' => 'public')
        );
        $data['joinQuery'] = 'FROM `comments` AS `c` JOIN `nodes` AS `n` ON (`c`.`comment_id` = `n`.`node_id`) JOIN `nodes` AS `np` ON (`c`.`parent_id` = `np`.`node_id`) JOIN `users` AS `u` ON (`u`.`user_id` = `n`.`user_id`)';
        if($this->_loaddata('comment', 'update-all-delete-all'))
            $data['extraWhere'] = "`n`.`module` = 'comment'";
        else
            $data['extraWhere'] = "`n`.`module` = 'comment' AND n.user_id = ".$this->session->userdata('user_id');
        $this->load->view('datatable/base', $data);
    }
}