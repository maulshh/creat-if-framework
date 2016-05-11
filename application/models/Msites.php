<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Msites extends EMIF_Model {

    public function __construct(){
        parent::__construct();
        $this->set_table('sites');
    }

    public function get($where = false, $like = false, $order = false, $group = false, $select = false, $limit = false){ //overrides parent method get
        if(!$where)
            return parent::get(array('primary'=>1), $like);
        if(!is_array($where))
            return parent::get(array('primary'=>$where), $like);
        return parent::get($where, $like);
    }

    public function set($data, $where = array('primary' => '1')){
        return parent::set($where, $data);
    }

    public function import($file, $table){
        $this->db->query("SET foreign_key_checks = 0;");
        $res = $this->db->query("
        LOAD DATA LOCAL INFILE '$file' INTO TABLE $table
        FIELDS TERMINATED BY ',' OPTIONALLY ENCLOSED BY '/'
        LINES TERMINATED BY '\n';");
        echo "
        LOAD DATA LOCAL INFILE '$file' INTO TABLE $table
        FIELDS TERMINATED BY ',' OPTIONALLY ENCLOSED BY '/'
        LINES TERMINATED BY '\n';";
        $this->db->query("SET foreign_key_checks = 1;");
        return $res;
    }

    public function export($table){
        $name = DOC_ROOT."db/export/$table".time().".txt";
        if($this->db->query("SELECT * INTO OUTFILE '$name'
            FIELDS TERMINATED BY ',' OPTIONALLY ENCLOSED BY '/'
            LINES TERMINATED BY '\n'
            FROM $table"))
            return $name;
        return false;
    }
}