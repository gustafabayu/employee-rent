<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_kwh_mtr extends CI_Model{
    
    private $primary = 'IDKwh';
    private $table = 'tblMstKwhMtr';
    
    function __construct(){
        parent:: __construct();
    }
    
    public function blokMess(){
        return $this->db->get('tblMstBlokMess')->result();
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
    
    public function KwhMtrMess($id){
        $this->db->where('IDBlok', $id);
        $query = $this->db->get('vwKMmess');
        return $query->result();
    }
    
//    public function datafixKM($id){
//        $this->db->where('ID', $id);
//        $query = $this->db->get('vwKwhMtrPakai');
//        return $query->result();
//    }
    
    function dataKMmess($id) {
        //$this->db->distinct();
        //$this->db->select('IDBlok');
        $this->db->where('IDBlok', $id);
        //$this->db->group_by('IDBlok');
        $query = $this->db->get('tblMstBlokMess');
        return $query->result();
    }
    
    public function getKwhMess($id){
        $this->db->where('IDKwh', $id);
        $query = $this->db->get('vwKMmess');
        return $query->result();
    }
    
    public function getMess() {
        $query = $this->db->get('tblMstMess');
        return $query->result();
    }
    
    public function selectAlamat($id) {
        $this->db->where('IDMess', $id);
        $query = $this->db->get('tblMstMess');
        return $query->result();
    }
    
    public function PakaiList() {
        $query = $this->db->get('tblMstHargaList');
        return $query->result();
    }
    
    public function getList($id) {
        $this->db->where('ID', $id);
        $query = $this->db->get('tblMstHargaList');
        return $query->result();
    }
}