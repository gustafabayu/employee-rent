<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_hsl_akhir extends CI_Model{
    
    function __construct() {
        parent:: __construct();
    }
    
    public function selectAlamat($id) {
        $this->db->where('IDMess', $id);
        $query = $this->db->get('tblMstMess');
        return $query->result();
    }
    
    public function blokMess(){
        return $this->db->get('tblMstBlokMess')->result();
    }
    
    //Bagian Air
    //-----------------------//
    function blokAir($id) {
        $this->db->distinct();
        $this->db->select('IDMess');
        $this->db->select('Nomor');
        $this->db->where('IDBlok', $id);
        $this->db->group_by('IDMess');
        $this->db->group_by('Nomor');
        //$this->db->where('Periode', $blnaktif);
        //$this->db->where('ApproveStatus', 'True');
        $this->db->order_by('IDMess', 'asc');
        //$this->db->order_by('Periode', 'asc');
        $query = $this->db->get('vwHslAkhirFM');
        return $query->result();
    }
   
    public function datafixFM($id){
        $this->db->distinct();
        $this->db->select('IDMess');
        $this->db->select('Nomor');
        $this->db->where('IDMess', $id);
        $this->db->group_by('IDMess');
        $this->db->group_by('Nomor');
        $query = $this->db->get('vwFlowMtrPakai');
        return $query->result();
    }
    
    public function monitoringFM($id){
        $this->db->where('IDMess', $id);
        $this->db->order_by('Periode', 'desc');
        $query = $this->db->get('vwHslAkhirFM');
        return $query->result();
    }
    
    public function nomorFM() {
        $query = $this->db->get('tblMstFlowMtr');
        return $query->result();
    }
    
    function simpantagAir($data){        
        $this->db->trans_start();
        $this->db->insert('tblTagihanAir',$data);
//        $hdrid = $this->db->insert_id();
        $this->db->trans_complete();
//        return $hdrid;
    }
    
    //Bagian Listrik
    //-----------------------//
    function blokList($id) {
        $this->db->distinct();
        $this->db->select('IDMess');
        $this->db->select('Nomor');
        $this->db->where('IDBlok', $id);
        $this->db->group_by('IDMess');
        $this->db->group_by('Nomor');
//        $this->db->where('Periode', $blnaktif);
//        $this->db->where('ApproveStatus', 'True');
        $this->db->order_by('IDMess', 'asc');
//        $this->db->order_by('Periode', 'asc');
        $query = $this->db->get('vwHslAkhirKM');
        return $query->result();
    }
    
    public function datafixKM($id){
        $this->db->distinct();
        $this->db->select('IDMess');
        $this->db->select('Nomor');
        $this->db->where('IDMess', $id);
        $this->db->group_by('IDMess');
        $this->db->group_by('Nomor');
        $query = $this->db->get('vwKwhMtrPakai');
        return $query->result();
    }
    
    public function monitoringKM($id){
        $this->db->where('IDMess', $id);
        $this->db->order_by('Periode', 'desc');
        $query = $this->db->get('vwHslAkhirKM');
        return $query->result();
    }
    
    public function nomorKM() {
        $query = $this->db->get('tblMstKwhMtr');
        return $query->result();
    }
    
    function simpantagList($data){        
        $this->db->trans_start();
        $this->db->insert('tblTagihanList',$data);
//        $hdrid = $this->db->insert_id();
        $this->db->trans_complete();
//        return $hdrid;
    }
    
    
}