<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mpermissions extends EMIF_Model {

	public function __construct(){
        parent::__construct();
        $this->set_table('role_permissions');
    }
    
    public function get($role, $module, $permission, $group = false, $select = false, $limit = false){ //overrides parent method get
        $where = array('role_id' => $role,
        				'module' => $module);
        $this->db->like('permission','-'.$permission.'-');
    	return parent::get($where);
    }

    public function get_many($where = false, $like = false, $order = false, $group = false, $select = false, $limit = false, $array = false){ //overrides parent method get_many
    	$this->db->join('roles', 'roles.role_id = role_permissions.role_id');    
        return parent::get_many($where, $like, $order, $group, $select, $limit, $array);
    }

    public function get_all(){
    	$this->db->order_by('module, roles.role_id');
        return $this->get_many();
    }

    public function delete($id){ //overrides parent method get
        $where = array('permission_id' => $id);
		return $this->db->delete($this->table, $where);
    }
}