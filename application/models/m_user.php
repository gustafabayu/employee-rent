<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_user extends CI_Model{
    
    private $primary = 'UserID';
    private $table = 'tblMstUser';
//    private $table_GrupUser = 'tblMstLevelUser';
    
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
    
    function updatePass($userID, $data) {
        $this->db->where('UserID',$userID);
        $this->db->update($this->table, $data);
    }

    function delete($id) {
        $this->db->where($this->primary, $id);
        $this->db->delete($this->table);
    }
    
    public function selectUser(){
        $query = $this->db->get($this->table);
        return $query->result();
    }
            
    public function selectLevelUser($id){
        $this->db->where('LevelID',$id);
        $query = $this->db->get('tblMstLevelUser');
        return $query->result();
    }
    
    public function getLvlUser(){
        $query = $this->db->get('tblMstLevelUser');
        return $query->result();
    }
    
    public function getUser($id){
        $this->db->where($this->primary, $id);
        $query = $this->db->get($this->table);
        return $query->result();
    }
    
    function jabKaryawan() {
        return $this->db->query('SELECT * FROM MyPSGPayroll.dbo.tblMstJabatan');
    }
}