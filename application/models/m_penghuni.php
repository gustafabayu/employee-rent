<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_penghuni extends CI_Model{
    
    private $primary = 'HeaderID';
    private $table = 'tblTraPenghuniHdr';
    //private $karyawan_id = 'RegNo';
    private $borongan_view = 'PSGBorongan.dbo.vwMstTenagaKerja';
    private $karyawan_view = 'MyPSGPayroll.dbo.vwMstPayrollKaryawan';
        
    public function __construct() {
        parent:: __construct();
        $this->load->database();
    }
    
    public function blokMess(){
        return $this->db->get('tblMstBlokMess')->result();
    }
    
    function borongan_get_all(){
        $this->db->order_by('FixNo', 'asc');
        return $this->db->get($this->borongan_view)->result();
    }
            
    function borongan_search($param){
        $this->db->like('Nik', $param);        
        return $this->db->get($this->borongan_view)->result();
    }
    
    function karyawan_get_all(){
        $this->db->order_by('RegNo', 'asc');
        return $this->db->get($this->karyawan_view)->result();
    }
            
    function karyawan_search($param){
        $this->db->like('NIK', $param);        
        return $this->db->get($this->karyawan_view)->result();
    }
    
    function simpanHdr($data) {
        $this->db->trans_start();
        $this->db->insert($this->table, $data);
        $header_id = $this->db->insert_id();
        $this->db->trans_complete();
        return $header_id;
    }
    
    function simpanDtl($info) {
        $this->db->trans_start();
        $this->db->insert('tblTraPenghuniDtl', $info);
        //$id = $this->db->insert_id();
        $this->db->trans_complete();
        //return $id;
    }
            
    function updateHdr($hdrid,$data){
        $this->db->where('HeaderID',$hdrid);
        $this->db->update('tblTraPenghuniHdr',$data);
    }
    
    function updateDtl($id,$info){
        $this->db->where('DetailID',$id);
        $this->db->update('tblTraPenghuniDtl',$info);
    }
    
    public function htngDtl($id){
        $this->db->where('HeaderID', $id);
        return $this->db->get('tblTraPenghuniDtl')->num_rows();
    }
    
    function isi_del($id){
        $this->db->where('HeaderID', $id);
        $this->db->delete('tblTraPenghuniDtl');
    }
    
    function delHdr($id) {
        $this->db->where('HeaderID', $id);
        $this->db->delete($this->table);
    }
    
    function delDtl($id) {
        $this->db->where('HeaderID', $id);
        $this->db->delete('tblTraPenghuniDtl');
    }
    
    function mess_get_all(){
        $this->db->order_by('IDMess', 'ASC');
        return $this->db->get('tblMstMess')->result();
    }
    
    function mess_get_by_id($id){
        $this->db->where('IDMess', $id);
        return $this->db->get('vwMstMess')->row();
    }
        
    public function PenghuniMess($id) {
        $this->db->where('IDBlok', $id);
        $query = $this->db->get('vwTraPenghuniHdr');
        return $query->result();
    }
    
    function dataMess($id) {
        $this->db->distinct();
        $this->db->select('IDBlok');
        $this->db->where('IDBlok', $id);
        $this->db->group_by('IDBlok');
        $query = $this->db->get('vwMstMess');
        return $query->result();
    }
    
    public function selectAlamat($id) {
        $this->db->where('IDMess', $id);
        $query = $this->db->get('tblMstMess');
        return $query->result();
    }
               
    public function getPenghuni($id){
        $this->db->where($this->primary, $id);
        $query = $this->db->get('vwTraPenghuniHdr');
        return $query->result();
    }
    
    public function getIsiMess($id){
//        $this->db->where('HeaderID', $id)->get($this->table2);
        $this->db->where('HeaderID', $id);
        $this->db->order_by('NoKmr', 'ASC');
        $query = $this->db->get('vwTraPenghuniDtl');
        return $query->result();
    }
    
    public function getKel($id){
        $this->db->where($this->primary, $id);
        $query = $this->db->get($this->table);
        return $query->result();
    }
    
    public function getMess() {
        $query = $this->db->get('tblMstMess');
        return $query->result();
    }
    
//    function get_nama1() {        
//        return $this->db->query('SELECT * FROM MyPSGPayroll.dbo.tblMstKaryawan');
//    }
//    
//    function get_nama2() {
//        return $this->db->query('SELECT * FROM PSGBorongan.dbo.tblMstTenagaKerja');
//    }
//    
//    function get_dept() {
//        return $this->db->query('SELECT * FROM MyPSGPayroll.dbo.tblMstDept');
//    }
//    
//    function deptKaryawan2() {
//        return $this->db->query('SELECT * FROM PSGBorongan.dbo.tblMstDepartemen');
//    }       
}