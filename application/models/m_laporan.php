<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_laporan extends CI_Model{
    
    function __construct() {
        parent:: __construct();
    }
    
    public function blokMess(){
        return $this->db->get('tblMstBlokMess')->result();
    }
            
    public function selectAlamat($id) {
        $this->db->where('IDMess', $id);
        $query = $this->db->get('tblMstMess');
        return $query->result();
    }
    
    //Bagian Air
    //-----------------------//
    function blokAir($id, $blnawal, $blnakhir) {
        $this->db->where('IDBlok', $id);        
        $this->db->where('Periode <=', $blnakhir);
        $this->db->where('Periode >=', $blnawal);
        $this->db->where('CheckStatus', 'False');
        $this->db->order_by('IDMess', 'asc');
        $this->db->order_by('Periode', 'asc');
        $query = $this->db->get('vwFlowMtrPakai');
        return $query->result();
    }           
    
    function blokAir2($id, $blnawal, $blnakhir) {
        $this->db->where('IDBlok', $id);        
        $this->db->where('Periode <=', $blnakhir);
        $this->db->where('Periode >=', $blnawal);
        $this->db->where('CheckStatus', 'True');
        $this->db->where('ApproveStatus', 'False');
        $this->db->order_by('IDMess', 'asc');
        $this->db->order_by('Periode', 'asc');
        $query = $this->db->get('vwFlowMtrPakai');
        return $query->result();
    }
    
    public function datacekFM($id){
        $this->db->distinct();
        $this->db->select('ID');
        $this->db->select('Nomor');
        $this->db->select('Periode');
        $this->db->select('FlowAwal');
        $this->db->select('Flow');
        $this->db->select('Pemakaian');
        $this->db->select('PerMeter');
        $this->db->select('TtlBiaya');
        $this->db->select('Ket');
        $this->db->where('ID', $id);
        $this->db->group_by('ID');
        $this->db->group_by('Nomor');
        $this->db->group_by('Periode');
        $this->db->group_by('FlowAwal');
        $this->db->group_by('Flow');
        $this->db->group_by('Pemakaian');
        $this->db->group_by('PerMeter');
        $this->db->group_by('TtlBiaya');
        $this->db->group_by('Ket');
        $query = $this->db->get('vwFlowMtrPakai');
        return $query->result();
    }
    
    public function dataappFM($id){
        $this->db->distinct();
        $this->db->select('ID');
        $this->db->select('Nomor');
        $this->db->select('Periode');
        $this->db->select('FlowAwal');
        $this->db->select('Flow');
        $this->db->select('Pemakaian');
        $this->db->select('PerMeter');
        $this->db->select('TtlBiaya');
        $this->db->select('Ket');
        $this->db->where('ID', $id);
        $this->db->group_by('ID');
        $this->db->group_by('Nomor');
        $this->db->group_by('Periode');
        $this->db->group_by('FlowAwal');
        $this->db->group_by('Flow');
        $this->db->group_by('Pemakaian');
        $this->db->group_by('PerMeter');
        $this->db->group_by('TtlBiaya');
        $this->db->group_by('Ket');
        $query = $this->db->get('vwFlowMtrPakai');
        return $query->result();
    }
    
    function updtCekAir($id,$data){
        $this->db->where('ID',$id);
        $this->db->update('tblTagihanAir',$data);
    }
    
    function updtAppAir($id,$data){
        $this->db->where('ID',$id);
        $this->db->update('tblTagihanAir',$data);
    }
    
    function updateCekAir($id,$dataAir){
        $this->db->where('ID',$id);
        $this->db->update('tblTagihanAir',$dataAir);
    }
    
    function updateAppAir($id2,$dataAir2){
        $this->db->where('ID',$id2);
        $this->db->update('tblTagihanAir',$dataAir2);
    }
            
    //Bagian Listrik
    //-----------------------//
    function blokList($id, $blnawal, $blnakhir) {
        $this->db->where('IDBlok', $id);        
        $this->db->where('Periode <=', $blnakhir);
        $this->db->where('Periode >=', $blnawal);
        $this->db->where('CheckStatus', 'False');
        $this->db->order_by('IDMess', 'asc');
        $this->db->order_by('Periode', 'asc');
        $query = $this->db->get('vwKwhMtrPakai');
        return $query->result();
    }           
    
    function blokList2($id, $blnawal, $blnakhir) {
        $this->db->where('IDBlok', $id);        
        $this->db->where('Periode <=', $blnakhir);
        $this->db->where('Periode >=', $blnawal);
        $this->db->where('CheckStatus', 'True');
        $this->db->where('ApproveStatus', 'False');
        $this->db->order_by('IDMess', 'asc');
        $this->db->order_by('Periode', 'asc');
        $query = $this->db->get('vwKwhMtrPakai');
        return $query->result();
    }
    
    public function datacekKM($id){
        $this->db->distinct();
        $this->db->select('ID');
        $this->db->select('Nomor');
        $this->db->select('Periode');
        $this->db->select('KwhAwal');
        $this->db->select('Kwh');
        $this->db->select('Pemakaian');
        $this->db->select('PerMeter');
        $this->db->select('TtlBiaya');
        $this->db->select('Denda');
        $this->db->select('Ket');
        $this->db->where('ID', $id);
        $this->db->group_by('ID');
        $this->db->group_by('Nomor');
        $this->db->group_by('Periode');
        $this->db->group_by('KwhAwal');
        $this->db->group_by('Kwh');
        $this->db->group_by('Pemakaian');
        $this->db->group_by('PerMeter');
        $this->db->group_by('TtlBiaya');
        $this->db->group_by('Denda');
        $this->db->group_by('Ket');
        $query = $this->db->get('vwKwhMtrPakai');
        return $query->result();
    }
        
    public function dataappKM($id){
        $this->db->distinct();
        $this->db->select('ID');
        $this->db->select('Nomor');
        $this->db->select('Periode');
        $this->db->select('KwhAwal');
        $this->db->select('Kwh');
        $this->db->select('Pemakaian');
        $this->db->select('PerMeter');
        $this->db->select('TtlBiaya');
        $this->db->select('Denda');
        $this->db->select('Ket');
        $this->db->where('ID', $id);
        $this->db->group_by('ID');
        $this->db->group_by('Nomor');
        $this->db->group_by('Periode');
        $this->db->group_by('KwhAwal');
        $this->db->group_by('Kwh');
        $this->db->group_by('Pemakaian');
        $this->db->group_by('PerMeter');
        $this->db->group_by('TtlBiaya');
        $this->db->group_by('Denda');
        $this->db->group_by('Ket');
        $query = $this->db->get('vwKwhMtrPakai');
        return $query->result();
    }
                  
    function updtCekList($id,$data){
        $this->db->where('ID',$id);
        $this->db->update('tblTagihanList',$data);
    }
    
    function updtAppList($id,$data){
        $this->db->where('ID',$id);
        $this->db->update('tblTagihanList',$data);
    }
    
    function updateCekList($id,$dataList){
        $this->db->where('ID',$id);
        $this->db->update('tblTagihanList',$dataList);
    }
    
    function updateAppList($id2,$dataList2){
        $this->db->where('ID',$id2);
        $this->db->update('tblTagihanList',$dataList2);
    }
}