<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_harga extends CI_Model{
    
    function __construct() {
        parent:: __construct();
    }
    
    function hargaFM(){
        //$this->db->order_by('Periode', 'DESC');        
        return $this->db->get('tblMstHargaAir')->result();
    }
    
    function simpanAir($data){        
        $this->db->trans_start();
        $this->db->insert('tblMstHargaAir',$data);
//        $hdrid = $this->db->insert_id();
        $this->db->trans_complete();
//        return $hdrid;
    }
    
    function hargaAir($id){
        $this->db->where('ID', $id);
        $query = $this->db->get('tblMstHargaAir');
        return $query->result();
    }
    
    function updateAir($id,$data){
        $this->db->where('ID',$id);
        $this->db->update('tblMstHargaAir',$data);
    }
    
    function hargaKM(){
        //$this->db->order_by('Periode', 'DESC');        
        return $this->db->get('tblMstHargaList')->result();
    }
    
    function simpanList($data){        
        $this->db->trans_start();
        $this->db->insert('tblMstHargaList',$data);
//        $hdrid = $this->db->insert_id();
        $this->db->trans_complete();
//        return $hdrid;
    }
    
    function hargaList($id){
        $this->db->where('ID', $id);
        $query = $this->db->get('tblMstHargaList');
        return $query->result();
    }
    
    function updateList($id,$data){
        $this->db->where('ID',$id);
        $this->db->update('tblMstHargaList',$data);
    }
}