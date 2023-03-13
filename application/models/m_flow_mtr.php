<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_flow_mtr extends CI_Model{
    
    private $primary = 'IDFlowMtr';
    private $table = 'tblMstFlowMtr';
    
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
    
    public function FlowMtrMess($id){
        $this->db->where('IDBlok', $id);
        $query = $this->db->get('vwFMmess');
        return $query->result();
    }
    
    function dataFMmess($id) {
        //$this->db->distinct();
        //$this->db->select('IDBlok');
        $this->db->where('IDBlok', $id);
        //$this->db->group_by('IDBlok');
        $query = $this->db->get('tblMstBlokMess');
        return $query->result();
    }
    
    public function getFlowMess($id){
        $this->db->where('IDFlowMtr', $id);
        $query = $this->db->get('vwFMmess');
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
    
    public function PakaiAir() {
        $query = $this->db->get('tblMstHargaAir');
        return $query->result();
    }
    
    public function getAir($id) {
        $this->db->where('ID', $id);
        $query = $this->db->get('tblMstHargaAir');
        return $query->result();
    }
}