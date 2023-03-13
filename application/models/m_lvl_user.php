<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_lvl_user extends CI_Model{
    
    private $primary = 'LevelID';
    private $table = 'tblMstLevelUser';
//    private $table_GrupUser = 'tblMstLevelUser';
    
    function __construct(){
        parent:: __construct();
    }
    
    function simpan($data){        
        $this->db->trans_start();
        $this->db->insert($this->table,$data);
        $hdrid = $this->db->insert_id();
        $this->db->trans_complete();
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
    
    public function LevelUser(){
        $query = $this->db->get($this->table);
        return $query->result();
    }
    
    public function getLevel($id){
        $this->db->where($this->primary, $id);
        $query = $this->db->get($this->table);
        return $query->result();
    }
}