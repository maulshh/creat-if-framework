<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Musers extends EMIF_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->set_table('users');
    }

    public function get_full($where = false, $like = false, $order = false, $group = false)
    { //overrides parent method get
        if ($where && !is_array($where))
            $where = array('users.user_id' => $where); // when where is not false and only a single id
        $this->db->select('roles.*, users.*, COUNT(nodes.node_id) AS posts');
        $this->db->join('nodes', 'users.user_id = nodes.user_id');
        $this->db->join('roles', 'roles.role_id = users.role_id');
        $this->db->group_by('users.user_id');
        return parent::get(array_merge($where, array('nodes.module' => 'post')), $like, $order, $group);
    }

    public function get($where = false, $like = false, $order = false, $group = false)
    { //overrides parent method get
        if ($where && !is_array($where))
            $where = array('user_id' => $where); // when where is not false and only a single id
        $this->db->join('roles', 'roles.role_id = users.role_id');
        return parent::get($where, $like, $order, $group);
    }

    public function get_many($where = false, $like = false, $order = false, $group = false, $limit = false)
    { //overrides parent method get_many
        $this->db->select('roles.*, users.*');
        $this->db->join('roles', 'roles.role_id = users.role_id');
        $this->db->group_by('users.user_id');
        return parent::get_many($where, $like, $order, $group, $limit);
    }

    public function get_all()
    {
        return $this->get_many(array('users.role_id >=' => $this->session->userdata('role_id')));
    }

    public function set($where, $data)
    { //overrides parent method set
        if ($where && !is_array($where))
            $where = array('user_id' => $where);
        $this->db->join('roles', 'roles.role_id = users.role_id');
        return parent::set($where, $data);
    }

    public function user_auth($email, $pass)
    {
        $this->db->join('roles', "roles.role_id = users.role_id");
        $this->db->where(array('pass' => md5($pass), 'status' => 'active', 'username' => $email));
        $this->db->or_where(array('email' => $email));
        return parent::get(array('pass' => md5($pass), 'status' => 'active'));
    }
}