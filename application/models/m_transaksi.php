<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_transaksi extends CI_Model{
      
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
    
    public function dftrKMmess(){
        return $this->db->get('tblMstKwhMtr')->result();
    }
    
    public function dftrFMmess(){
        return $this->db->get('tblMstFlowMtr')->result();
    }
    
    function dftrMess(){
        $this->db->order_by('IDMess', 'ASC');
        return $this->db->get('tblMstMess')->result();
    }
    
    function dataMess($id){
        $this->db->where('IDMess', $id);
        return $this->db->get('vwMstMess')->row();
    }
    
    //Bagian Air
    //-----------------------//
    public function PakaiFlow(){
        $this->db->order_by('Nomor', 'asc');
        $this->db->order_by('ID', 'asc');
        return $this->db->get('vwFlowMtrPakai')->result();
    }
            
    function blokAir($id,$periodesebelum) {
        $this->db->where('IDBlok', $id);
        $this->db->where('Periode', $periodesebelum);
        //$this->db->where('Periode >=', $periodesebelum);
        //$this->db->where('Periode <=', $periodeaktif);
        $this->db->where('Status', 'False');
        $this->db->where('CreatedStatus', 'False');
        $this->db->order_by('IDMess', 'asc');
        $query = $this->db->get('vwFlowMtrPakai');
        return $query->result();
    }
    
    function blokAir2($id) {
        //$this->db->distinct();
        //$this->db->select('IDBlok');
        //$this->db->select('ID');
        $this->db->where('IDBlok', $id);
        //$this->db->group_by('IDBlok');
        //$this->db->group_by('ID');
        $query = $this->db->get('tblMstBlokMess');
        return $query->result();
    }
    
    public function getinfoFM($id){
        $this->db->distinct();
        $this->db->select('ID');
        $this->db->select('IDBlok');
        $this->db->select('Nomor');
        $this->db->select('Flow');
        $this->db->select('TipePakai');
        $this->db->where('ID', $id);
        $this->db->group_by('ID');
        $this->db->group_by('IDBlok');
        $this->db->group_by('Nomor');
        $this->db->group_by('Flow');
        $this->db->group_by('TipePakai');
        $query = $this->db->get('vwFlowMtrPakai');
        return $query->result();
    }
    
    public function biayaAir(){
        return $this->db->get('tblMstHargaAir')->result();
    }
    
    public function HargaAir($id) {
        $this->db->where('ID', $id);
        $query = $this->db->get('tblMstHargaAir');
        return $query->result();
    }
    
    function noFMmess($id){
        $this->db->where('IDMess', $id);
        return $this->db->get('vwMstMess')->row();
    }
        
    function updateAir($hdrid,$info){
        $this->db->where('ID',$hdrid);
        $this->db->update('tblTagihanAir',$info);
    }
    
    function simpanAir($dataAir) {
        $this->db->trans_start();
        $this->db->insert('tblTagihanAir', $dataAir);
        //$hdrid = $this->db->insert_id();
        $this->db->trans_complete();
        //return $hdrid;
    }
            
    //Bagian List
    //-----------------------//    
    function blokList($id,$periodesebelum) {
        $this->db->where('IDBlok', $id);
        $this->db->where('Periode', $periodesebelum);
//        $this->db->where('Periode >=', $periodesebelum);        
//        $this->db->where('Periode <=', $periodeaktif);
        $this->db->where('Status', 'False');
        $this->db->where('CreatedStatus', 'False');
        $this->db->order_by('IDMess', 'asc');
        $query = $this->db->get('vwKwhMtrPakai');
        return $query->result();
    }
    
    function blokList2($id) {
        //$this->db->distinct();
        //$this->db->select('IDBlok');
        $this->db->where('IDBlok', $id);
        //$this->db->group_by('IDBlok');
        $query = $this->db->get('tblMstBlokMess');
        return $query->result();
    }
    
    public function PakaiKwh(){
        $this->db->order_by('Nomor', 'asc');
        $this->db->order_by('ID', 'asc');
        return $this->db->get('vwKwhMtrPakai')->result();
    }
    
    function simpanList($data) {
        $this->db->trans_start();
        $this->db->insert('tblTagihanList', $data);
//        $hdrid = $this->db->insert_id();
        $this->db->trans_complete();
//        return $hdrid;
    }
            
    public function getinfoKM($id){
        $this->db->distinct();
        $this->db->select('ID');
        $this->db->select('IDBlok');
        $this->db->select('Nomor');
        $this->db->select('Kwh');
        $this->db->select('TipePakai');
        $this->db->where('ID', $id);
        $this->db->group_by('ID');
        $this->db->group_by('IDBlok');
        $this->db->group_by('Nomor');
        $this->db->group_by('Kwh');
        $this->db->group_by('TipePakai');
        $query = $this->db->get('vwKwhMtrPakai');
        return $query->result();
    }
    
    public function biayaList(){
        return $this->db->get('tblMstHargaList')->result();
    }
    
    public function HargaList($id) {
        $this->db->where('ID', $id);
        $query = $this->db->get('tblMstHargaList');
        return $query->result();
    }
    
    function noKMmess($id){
        $this->db->where('IDMess', $id);
        return $this->db->get('vwMstMess')->row();
    }
        
    function updateList($hdrid,$info){
        $this->db->where('ID',$hdrid);
        $this->db->update('tblTagihanList',$info);
    }

}