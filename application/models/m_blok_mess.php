<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_blok_mess extends CI_Model{
    
    function __construct() {
        parent:: __construct();
    }
    
    public function BlokMess() {        
        $query = $this->db->get('tblMstBlokMess');
        return $query->result();
    }
    
    function simpan($data){        
        $this->db->trans_start();
        $this->db->insert('tblMstBlokMess',$data);
//        $hdrid = $this->db->insert_id();
        $this->db->trans_complete();
//        return $hdrid;
    }
    
    public function getBlok($id){
        $this->db->where('IDBlok', $id);
        $query = $this->db->get('tblMstBlokMess');
        return $query->result();
    }
    
    function update($id,$data){
        $this->db->where('IDBlok',$id);
        $this->db->update('tblMstBlokMess',$data);
    }
}