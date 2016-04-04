<?php 
class EMIF_Model extends CI_Model {
 
    public function __construct() {
        parent::__construct();
        date_default_timezone_set("Asia/Jakarta"); 
    }

	public function set_table($t){
		$this->table = $t;
	}
	
	public function add($data) {
		//do insert data into database
		if($this->db->insert($this->table, $data)){
			if($id = $this->db->insert_id())
				return $id;
			return true;
		}
		return false;
	}

    public function get($where = false, $like = false, $order = false, $group = false, $select = false, $limit = false) {
        //do get data into database
        if($where)
            $this->db->where($where);
        if($like)
            $this->db->like($like);
        if($order)
            $this->db->order_by($order);
        if($group)
            $this->db->group_by($group);
        if($limit)
            if(is_array($limit))
                $this->db->limit($limit[0], $limit[1]);
            else
                $this->db->limit($limit);
        if($select)
            if(is_array($select))
                $this->db->select($select[0], $select[1]);
            else
                $this->db->select($select);
        $query = $this->db->get($this->table);
        if($query)
            return $query->row();
        else
            return false;
    }

    public function get_many($where = false, $like = false, $order = false, $group = false, $select = false, $limit = false, $array = false) {
		//do get data into database
        if($where)
            $this->db->where($where);
        if($like)
            $this->db->like($like);
        if($order)
            $this->db->order_by($order);
        if($group)
            $this->db->group_by($group);
        if($limit)
            if(is_array($limit))
                $this->db->limit($limit[0], $limit[1]);
            else
                $this->db->limit($limit);
        if($select)
            if(is_array($select))
                $this->db->select($select[0], $select[1]);
            else
                $this->db->select($select);
		$query = $this->db->get($this->table);
		if($query){
            if($array)
                return $query->result_array();
            else
                return $query->result();
        } else
			return false;
	}

    public function get_many_pure($where = false, $like = false, $order = false, $group = false, $select = false, $limit = false, $array = false) {
        //do get data into database
        if($where)
            $this->db->where($where);
        if($like)
            $this->db->like($like);
        if($order)
            $this->db->order_by($order);
        if($group)
            $this->db->group_by($group);
        if($limit)
            if(is_array($limit))
                $this->db->limit($limit[0], $limit[1]);
            else
                $this->db->limit($limit);
        if($select)
            if(is_array($select))
                $this->db->select($select[0], $select[1]);
            else
                $this->db->select($select);
        $query = $this->db->get($this->table);
        if($query){
            if($array)
                return $query->result_array();
            else
                return $query->result();
        } else
            return false;
    }

    public function set($where, $data) {
		//do update data into database
        if ($where) {
            $this->db->where($where);
            return $this->db->update($this->table, $data);
        }
	}
 
	public function delete($where) {
		//do delete data from database
		return $this->db->delete($this->table, $where);
	}

    public function count($select = false, $where = false, $like = false, $group = false, $order = false){
        if($select)
            $this->db->select($select);
        if($where)
            $this->db->where($where);
        if($like)
            $this->db->like($like);
        if($order)
            $this->db->order_by($order);
        if($group)
            $this->db->group_by($group, false);
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    public function sum($select, $where = false, $like = false, $group = false, $order = false){
        if($where)
            $this->db->where($where);
        if($like)
            $this->db->like($like);
        if($order)
            $this->db->order_by($order);
        if($group)
            $this->db->group_by($group);
        if(is_array($select))
            $this->db->select_sum($select[0], $select[1]);
        else $this->db->select_sum($select);
        return $this->db->get($this->table)->row();
    }

    public function max($select, $where = false, $like = false, $group = false, $order = false){
        if($where)
            $this->db->where($where);
        if($like)
            $this->db->like($like);
        if($order)
            $this->db->order_by($order);
        if($group)
            $this->db->group_by($group);
        if(is_array($select))
            $this->db->select_max($select[0], $select[1]);
        else $this->db->select_max($select);
        return $this->db->get($this->table)->row();
    }

    public function min($select, $where = false, $like = false, $group = false, $order = false){
        if($where)
            $this->db->where($where);
        if($like)
            $this->db->like($like);
        if($order)
            $this->db->order_by($order);
        if($group)
            $this->db->group_by($group);
        if(is_array($select))
            $this->db->select_min($select[0], $select[1]);
        else $this->db->select_min($select);
        return $this->db->get($this->table)->row();
    }

    public function query($query){
        return $this->db->query($query);
    }
}