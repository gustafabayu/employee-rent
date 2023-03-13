<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_cetak extends CI_Model{
    
    function __construct() {
        parent:: __construct();
    }
    
    function blokMess(){
        return $this->db->get('tblMstBlokMess')->result();
    }
    
    public function selectAlmt($id) {
        $this->db->where('IDMess', $id);
        $query = $this->db->get('tblMstMess');
        return $query->result();
    }
    
    function namaMess($id){
        $this->db->where('IDMess', $id);
        return $this->db->get('tblMstMess')->result();
    }
    
    function blokMess2($id){
        $this->db->where('IDBlok', $id);
        return $this->db->get('tblMstBlokMess')->result();
    }
    
    public function MessKaryawan($id) {
        $this->db->where('IDBlok', $id);
        $query = $this->db->get('tblMstMess');
        return $query->result();
    }
    
    public function kwitansiMess($id,$lihatKwitansi) {
        $this->db->where('IDBlok', $id);
        $this->db->where('BulanTgh', $lihatKwitansi);
        $query = $this->db->get('vwCetakKwitansi');
        return $query->result();
    }
    
    public function hdrMess($id) {
        $this->db->where('IDMess', $id);
        $query = $this->db->get('vwMstMess');
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
    
    public function tagihMess($id) {
        $this->db->where('IDMess', $id);
        $query = $this->db->get('vwCtkTagihKwitansi');
        return $query->result();
    }
    
    public function TagihAir($id, $periode) {
        $this->db->where('IDMess', $id);
        $this->db->where('Periode', $periode);
        $query = $this->db->get('vwFlowMtrPakai');
        return $query->result();
    }
    
    public function TagihList($id, $periode) {
        $this->db->where('IDMess', $id);
        $this->db->where('Periode', $periode);
        $query = $this->db->get('vwKwhMtrPakai');
        return $query->result();
    }
    
    function kwitansiHdr($data) {
        $this->db->trans_start();
        $this->db->insert('tblCtkKwitansiHdr', $data);
        $header_id = $this->db->insert_id();
        $this->db->trans_complete();
        return $header_id;
    }
    
    function kwitansiDtl($info) {
        $this->db->trans_start();
        $this->db->insert('tblCtkKwitansiDtl', $info);
        //$id = $this->db->insert_id();
        $this->db->trans_complete();
        //return $id;
    }
    
    function dataKwitansi($id) {
        $this->db->where('DetailID', $id);
        $query = $this->db->get('vwCetakKwitansi');
        return $query->result();
    }
            
    function delKwitansiHdr($id){
        $this->db->where('HeaderID',$id);
        //$this->db->delete('tblCtkKwitansiDtl');
        $this->db->delete('tblCtkKwitansiHdr');
    }
    
    function delKwitansiDtl($id){
        $this->db->where('HeaderID',$id);
        $this->db->delete('tblCtkKwitansiDtl');
        //$this->db->delete('tblCtkKwitansiHdr');
    }
}