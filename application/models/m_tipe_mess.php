<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_tipe_mess extends CI_Model{
    
    private $primary = 'IDTipe';
    private $table = 'tblMstTipeMess';
    
    function __construct(){
        parent:: __construct();
    }
    
    function simpan($data){
        $this->db->insert($this->table,$data);
        $hdrid = $this->db->insert_id();
        return $hdrid;
    }
    
    function update($id,$data){
        $this->db->where($this->primary,$id);
        $this->db->update($this->table,$data);
    }
    
    function delete($id){
        $this->db->where($this->primary,$id);
        $this->db->delete($this->table);
    }
    
    public function TipeMessKaryawan(){
        $query = $this->db->get($this->table);
        return $query->result();
    }
    
    public function getTipeMess($id){
        $this->db->where($this->primary, $id);
        $query = $this->db->get($this->table);
        return $query->result();
    }
}