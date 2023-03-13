<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_menu extends CI_Model{
    
//    private $menu = 'tblMstMenu';
    
    function __construct(){
        parent:: __construct();
    }

//    public function selectMenu(){
//        $query = $this->db->get($this->menu);
//        return $query->result();
//    }
    
    function get_menu($levelid){		
        return $this->db->get_where('vwMenuAkses',array('LevelID' => $levelid));
    }
}