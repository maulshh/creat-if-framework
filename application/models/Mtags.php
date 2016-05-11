<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mtags extends EMIF_Model{

    public function __construct(){
        parent::__construct();
        $this->set_table('tags');
    }

    public function add($id, $tags){
        $tags = str_replace(' ', '', strtolower($tags));
        foreach(explode(',', $tags) as $tag){
            $tag = mysql_real_escape_string($tag);
            parent::add(array('post_id'=>$id, 'tag'=>$tag));
        }
    }

    public function delete($id, $tag){
        return parent::delete(array('post_id'=>$id, 'tag'=>$tag));
    }
}
