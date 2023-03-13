<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class M_mess extends CI_Model {

    private $primary = 'IDMess';
    private $table = 'tblMstMess';

    function __construct() {
        parent:: __construct();
    }
    
    public function blokMess(){
        return $this->db->get('tblMstBlokMess')->result();
    }

    function simpan($data) {
        $this->db->trans_start();
        $this->db->insert($this->table, $data);
        $hdrid = $this->db->insert_id();
        $this->db->trans_complete();
        return $hdrid;
    }
        
    function update($id,$data){
        $this->db->where($this->primary,$id);
        $this->db->update($this->table,$data);
    }

    function delete($id) {
        $this->db->where($this->primary, $id);
        $this->db->delete($this->table);
    }

    public function MessKaryawan($id) {
        $this->db->where('IDBlok', $id);
        $query = $this->db->get('vwMstMess');
        return $query->result();
    }
    
    function dataMess($id) {
        //$this->db->distinct();
        //$this->db->select('IDBlok');
        $this->db->where('IDBlok', $id);
        //$this->db->group_by('IDBlok');
        $query = $this->db->get('tblMstBlokMess');
        return $query->result();
    }

    public function getMess($id) {
        $this->db->where($this->primary, $id);
        $query = $this->db->get($this->table);
        return $query->result();
    }

    public function blokMess2($id) {
        $this->db->where('IDBlok', $id);
        $query = $this->db->get('tblMstBlokMess');
        return $query->result();
    }
    
    public function selectMess($id) {
        $this->db->where('IDTipe', $id);
        $query = $this->db->get('tblMstTipeMess');
        return $query->result();
    }
    
    public function selectKwh($id) {
        $this->db->where('IDKwh', $id);
        $query = $this->db->get('tblMstKwhMtr');
        return $query->result();
    }
    
    public function selectFlow($id) {
        $this->db->where('IDFlowMtr', $id);
        $query = $this->db->get('tblMstFlowMtr');
        return $query->result();
    }

    public function getBlokMess() {   
        $query = $this->db->get('tblMstBlokMess');
        return $query->result();
    }
    
    public function getKwhMess() {   
        $query = $this->db->get('tblMstKwhMtr');
        return $query->result();
    }

    public function getTipeMess() {        
        $query = $this->db->get('tblMstTipeMess');
        return $query->result();
    }

    public function getFlowMess() {   
        $query = $this->db->get('tblMstFlowMtr');
        return $query->result();
    }

}
