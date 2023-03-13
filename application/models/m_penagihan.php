<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_penagihan extends CI_Model{
    
    function __construct() {
        parent:: __construct();
    }
    
    public function selectAlamat($id) {
        $this->db->where('IDMess', $id);
        $query = $this->db->get('tblMstMess');
        return $query->result();
    }
    
    public function munculAlmtMess() {
        $query = $this->db->get('tblMstMess');
        return $query->result();
    }
    
    public function blokMess(){
        return $this->db->get('tblMstBlokMess')->result();
    }
    
    function penghuni_all(){
        $this->db->order_by('DetailID', 'asc');
        return $this->db->get('vwPenghuniBayar')->result();
    }
            
    function penghuni_search($param){
        $this->db->like('NIK', $param);        
        return $this->db->get('vwPenghuniBayar')->result();
    }
    
    function non_all(){
        $this->db->order_by('DetailID', 'asc');
        return $this->db->get('vwTraPenghuniDtl')->result();
    }
            
    function non_search($param){
        $this->db->like('Nama', $param);        
        return $this->db->get('vwTraPenghuniDtl')->result();
    }
    
    //Bagian Air
    //-----------------------//
    function blokAir($id, $blnaktif) {
        $this->db->where('IDBlok', $id);        
        $this->db->where('Periode', $blnaktif);
        $this->db->where('ApproveStatus', 'True');
        $this->db->order_by('IDMess', 'asc');
        $this->db->order_by('Periode', 'asc');
        $query = $this->db->get('vwFlowMtrPakai');
        return $query->result();
    }
    
    function blokAir2($id, $blnaktif) {
        $this->db->where('IDBlok', $id);        
        $this->db->where('Periode', $blnaktif);
        $this->db->where('ApproveStatus', 'True');
        $this->db->order_by('IDMess', 'asc');
        $this->db->order_by('Periode', 'asc');
        $query = $this->db->get('vwFlowMtrPakaiNon');
        return $query->result();
    }
    
    public function bebanTagAir($id){
        //$this->db->distinct();
        //$this->db->select('ID');
        $this->db->where('ID', $id);
        //$this->db->group_by('ID');
        $query = $this->db->get('vwPenagihanAirPakai');
        return $query->result();
    }
    
    public function bebanTagAir2($id){        
        $this->db->distinct();
        $this->db->select('ID');
        $this->db->select('IDMess');
        $this->db->select('Nama');
        $this->db->select('TKID');
        $this->db->select('NIK');
        $this->db->select('Dept');
        $this->db->select('CV');
        $this->db->select('Ket');
        $this->db->select('Tagihan');
        $this->db->select('Tunggakan');
        $this->db->select('Total');
        $this->db->where('ID', $id);
        $this->db->group_by('ID');
        $this->db->group_by('IDMess');
        $this->db->group_by('Nama');
        $this->db->group_by('TKID');
        $this->db->group_by('NIK');
        $this->db->group_by('Dept');
        $this->db->group_by('CV');
        $this->db->group_by('Ket');
        $this->db->group_by('Tagihan');
        $this->db->group_by('Tunggakan');
        $this->db->group_by('Total');
        $query = $this->db->get('vwPenghuniByrFM');
        return $query->result();
    }
    
    public function bebanTagAir3($id){
        $this->db->distinct();
        $this->db->select('HeaderID');
        $this->db->select('IDMess');
        $this->db->select('Nama');
        $this->db->select('TKID');
        $this->db->select('NIK');
        $this->db->select('Dept');
        $this->db->select('CV');
        $this->db->select('Ket');
        $this->db->select('Tagihan');
        $this->db->select('Tunggakan');
        $this->db->select('Total');
        $this->db->where('HeaderID', $id);
        $this->db->group_by('HeaderID');
        $this->db->group_by('Nama');
        $this->db->group_by('IDMess');
        $this->db->group_by('TKID');
        $this->db->group_by('NIK');
        $this->db->group_by('Dept');
        $this->db->group_by('CV');
        $this->db->group_by('Ket');
        $this->db->group_by('Tagihan');
        $this->db->group_by('Tunggakan');
        $this->db->group_by('Total');
        $query = $this->db->get('vwPenghuniByrFMnon');
        return $query->result();
    }
    
    public function dataTagAir($id) {
        $this->db->distinct();
        $this->db->select('HeaderID');
        $this->db->select('ID');
        $this->db->select('IDBlok');
        $this->db->select('Nomor');
        $this->db->select('Periode');
        $this->db->select('FlowAwal');
        $this->db->select('Flow');
        $this->db->select('Pemakaian');
        $this->db->select('TtlBiaya');
        $this->db->where('ID', $id);
        $this->db->group_by('HeaderID');
        $this->db->group_by('ID');
        $this->db->group_by('IDBlok');
        $this->db->group_by('Nomor');
        $this->db->group_by('Periode');
        $this->db->group_by('FlowAwal');
        $this->db->group_by('Flow');
        $this->db->group_by('Pemakaian');
        $this->db->group_by('TtlBiaya');
        $query = $this->db->get('vwFlowMtrPakai');
        return $query->result();
    }
    
    public function dataTagAir2($id) {
        $this->db->distinct();        
        $this->db->select('ID');
        $this->db->select('Nomor');
        $this->db->select('Periode');
        $this->db->select('FlowAwal');
        $this->db->select('Flow');
        $this->db->select('Pemakaian');
        $this->db->select('Biaya');
        $this->db->where('ID', $id);        
        $this->db->group_by('ID');
        $this->db->group_by('Nomor');
        $this->db->group_by('Periode');
        $this->db->group_by('FlowAwal');
        $this->db->group_by('Flow');
        $this->db->group_by('Pemakaian');
        $this->db->group_by('Biaya');
        $query = $this->db->get('tblPenghuniByrAirHdr');
        return $query->result();
    }
    
    public function dataTagAir3($id) {
        $this->db->distinct();
        $this->db->select('IDMess');
        $this->db->select('Periode');
        $this->db->select('Biaya');
        //$this->db->select('Denda');
        $this->db->where('HeaderID', $id);
        $this->db->group_by('IDMess');
        $this->db->group_by('Periode');
        $this->db->group_by('Biaya');
        //$this->db->group_by('Denda');
        $query = $this->db->get('tblPenghuniByrAirHdr');
        return $query->result();
    }
    
    public function dataTagAir4($id) {
        $this->db->distinct();
        $this->db->select('HeaderID');
        $this->db->select('IDBlok');
        $this->db->select('IDMess');
        $this->db->select('Periode');
        $this->db->select('Biaya');
        //$this->db->select('Denda');
        $this->db->where('HeaderID', $id);
        $this->db->group_by('HeaderID');
        $this->db->group_by('IDBlok');
        $this->db->group_by('IDMess');
        $this->db->group_by('Periode');
        $this->db->group_by('Biaya');
        //$this->db->group_by('Denda');
        $query = $this->db->get('vwFlowMtrPakaiNon');
        return $query->result();
    }
    
    public function cetakTagAir($id) {
        $this->db->where('ID', $id);
        $query = $this->db->get('vwPenghuniByrFM');
        return $query->result();
    }
    
    public function datafixFM($id){
        $this->db->distinct();
        $this->db->select('IDBlok');
        //$this->db->select('ID');
        $this->db->where('IDBlok', $id);
        $this->db->group_by('IDBlok');
        //$this->db->group_by('ID');
        //$this->db->order_by('Periode', 'desc');
        $query = $this->db->get('vwHslAkhirFM');
        return $query->result();
    }
    
    function simpanHdrAir($data) {
        $this->db->trans_start();
        $this->db->insert('tblPenghuniByrAirHdr', $data);
        $header_id = $this->db->insert_id();
        $this->db->trans_complete();
        return $header_id;
    }
    
    function simpanDtlAir($info) {
        $this->db->trans_start();
        $this->db->insert('tblPenghuniByrAirDtl', $info);
        //$id = $this->db->insert_id();
        $this->db->trans_complete();
        //return $id;
    }
    
    function delAir($id){
        $this->db->where('HeaderID', $id);
        $this->db->delete('tblPenghuniByrAirDtl');
    }
    
    function updateHdrAir($hdrid,$data){
        $this->db->where('HeaderID',$hdrid);
        $this->db->update('tblPenghuniByrAirHdr',$data);
    }
    
    //Bagian List
    //-----------------------//
    function blokList($id, $blnaktif) {
        $this->db->where('IDBlok', $id);        
        $this->db->where('Periode', $blnaktif);
        $this->db->where('ApproveStatus', 'True');
        $this->db->order_by('IDMess', 'asc');
        $this->db->order_by('Periode', 'asc');
        $query = $this->db->get('vwKwhMtrPakai');
        return $query->result();
    }
    
    function blokList2($id, $blnaktif) {
        $this->db->where('IDBlok', $id);        
        $this->db->where('Periode', $blnaktif);
        $this->db->where('ApproveStatus', 'True');
        $this->db->order_by('IDMess', 'asc');
        $this->db->order_by('Periode', 'asc');
        $query = $this->db->get('vwKwhMtrPakaiNon');
        return $query->result();
    }
    
    public function bebanTagList($id){
        $this->db->where('ID', $id);
        $query = $this->db->get('vwPenagihanListPakai');
        return $query->result();
    }
    
    public function bebanTagList2($id){
        $this->db->distinct();
        $this->db->select('ID');
        $this->db->select('IDMess');
        $this->db->select('Nama');
        $this->db->select('TKID');
        $this->db->select('NIK');
        $this->db->select('Dept');
        $this->db->select('CV');
        $this->db->select('Ket');
        $this->db->select('Tagihan');
        $this->db->select('Tunggakan');
        $this->db->select('Total');
        $this->db->where('ID', $id);
        $this->db->group_by('ID');
        $this->db->group_by('IDMess');
        $this->db->group_by('Nama');
        $this->db->group_by('TKID');
        $this->db->group_by('NIK');
        $this->db->group_by('Dept');
        $this->db->group_by('CV');
        $this->db->group_by('Ket');
        $this->db->group_by('Tagihan');
        $this->db->group_by('Tunggakan');
        $this->db->group_by('Total');
        $query = $this->db->get('vwPenghuniByrKM');
        return $query->result();
    }
    
    public function bebanTagList3($id){
        $this->db->distinct();
        $this->db->select('HeaderID');
        $this->db->select('IDMess');
        $this->db->select('Nama');
        $this->db->select('TKID');
        $this->db->select('NIK');
        $this->db->select('Dept');
        $this->db->select('CV');
        $this->db->select('Ket');
        $this->db->select('Tagihan');
        $this->db->select('Tunggakan');
        $this->db->select('Total');
        $this->db->where('HeaderID', $id);
        $this->db->group_by('HeaderID');
        $this->db->group_by('Nama');
        $this->db->group_by('IDMess');
        $this->db->group_by('TKID');
        $this->db->group_by('NIK');
        $this->db->group_by('Dept');
        $this->db->group_by('CV');
        $this->db->group_by('Ket');
        $this->db->group_by('Tagihan');
        $this->db->group_by('Tunggakan');
        $this->db->group_by('Total');
        $query = $this->db->get('vwPenghuniByrKMnon');
        return $query->result();
    }
    
    public function dataTagList($id) {
        $this->db->distinct();
        $this->db->select('HeaderID');
        $this->db->select('ID');
        $this->db->select('IDBlok');
        $this->db->select('Nomor');
        $this->db->select('Periode');
        $this->db->select('KwhAwal');
        $this->db->select('Kwh');
        $this->db->select('Pemakaian');
        $this->db->select('TtlBiaya');
        $this->db->select('Denda');
        $this->db->where('ID', $id);
        $this->db->group_by('HeaderID');
        $this->db->group_by('ID');
        $this->db->group_by('IDBlok');
        $this->db->group_by('Nomor');
        $this->db->group_by('Periode');
        $this->db->group_by('KwhAwal');
        $this->db->group_by('Kwh');
        $this->db->group_by('Pemakaian');
        $this->db->group_by('TtlBiaya');
        $this->db->group_by('Denda');
        $query = $this->db->get('vwKwhMtrPakai');
        return $query->result();
    }
    
    public function dataTagList2($id) {
        $this->db->distinct();
        $this->db->select('ID');
        $this->db->select('Nomor');
        $this->db->select('Periode');
        $this->db->select('KwhAwal');
        $this->db->select('Kwh');
        $this->db->select('Pemakaian');
        $this->db->select('Biaya');
        $this->db->select('Denda');
        $this->db->where('ID', $id);
        $this->db->group_by('ID');
        $this->db->group_by('Nomor');
        $this->db->group_by('Periode');
        $this->db->group_by('KwhAwal');
        $this->db->group_by('Kwh');
        $this->db->group_by('Pemakaian');
        $this->db->group_by('Biaya');
        $this->db->group_by('Denda');
        $query = $this->db->get('tblPenghuniByrListHdr');
        return $query->result();
    }
    
    public function dataTagList3($id) {
        $this->db->distinct();
        $this->db->select('IDMess');
        $this->db->select('Periode');
        $this->db->select('Biaya');
        $this->db->select('Denda');
        $this->db->where('HeaderID', $id);
        $this->db->group_by('IDMess');
        $this->db->group_by('Periode');
        $this->db->group_by('Biaya');
        $this->db->group_by('Denda');
        $query = $this->db->get('tblPenghuniByrListHdr');
        return $query->result();
    }
    
    public function dataTagList4($id) {
        $this->db->distinct();
        $this->db->select('HeaderID');
        $this->db->select('IDBlok');
        $this->db->select('IDMess');
        $this->db->select('Periode');
        $this->db->select('Biaya');
        $this->db->select('Denda');
        $this->db->where('HeaderID', $id);
        $this->db->group_by('HeaderID');
        $this->db->group_by('IDBlok');
        $this->db->group_by('IDMess');
        $this->db->group_by('Periode');
        $this->db->group_by('Biaya');
        $this->db->group_by('Denda');
        $query = $this->db->get('vwKwhMtrPakaiNon');
        return $query->result();
    }
    
    public function datafixKM($id){
        $this->db->distinct();
        $this->db->select('IDBlok');
        $this->db->where('IDBlok', $id);
        $this->db->group_by('IDBlok');
        //$this->db->order_by('Periode', 'desc');
        $query = $this->db->get('vwHslAkhirKM');
        return $query->result();
    }
    
    function simpanHdrList($data) {
        $this->db->trans_start();
        $this->db->insert('tblPenghuniByrListHdr', $data);
        $header_id = $this->db->insert_id();
        $this->db->trans_complete();
        return $header_id;
    }
    
    function simpanDtlList($info) {
        $this->db->trans_start();
        $this->db->insert('tblPenghuniByrListDtl', $info);
        //$id = $this->db->insert_id();
        $this->db->trans_complete();
        //return $id;
    }
    
    function delList($id){
        $this->db->where('HeaderID', $id);
        $this->db->delete('tblPenghuniByrListDtl');
    }
    
    function updateHdrList($hdrid,$data){
        $this->db->where('HeaderID',$hdrid);
        $this->db->update('tblPenghuniByrListHdr',$data);
    }
}