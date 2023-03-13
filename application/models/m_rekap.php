<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_rekap extends CI_Model{
    
    function __construct() {
        parent:: __construct();
    }
    
    function blokMess() {
        return $this->db->get('tblMstBlokMess')->result();
    }
    
    function nmBlok($id ) {
        $this->db->where('IDBlok', $id);
        $query = $this->db->get('tblMstBlokMess');
        return $query->result();
    }
    
    function almtMess($id) {
        $this->db->where('IDMess', $id);
        $query = $this->db->get('tblMstMess');
        return $query->result();
    }
    
    function nmDept() {
        return $this->db->get('tblMstDept')->result();
    }
    
    //Bagian Air
    //-----------------------//
    function blokAir($id,$periodeaktif) {
        $this->db->distinct();
        $this->db->select('IDBlok');
        $this->db->select('IDMess');
        $this->db->select('Nomor');
        $this->db->select('Periode');
        $this->db->select('Pemakaian');
        $this->db->select('Biaya');
        $this->db->select('Nama');
        $this->db->select('NIK');
        $this->db->select('Dept');
        $this->db->select('CV');
        $this->db->select('Tagihan');
        $this->db->select('Tunggakan');
        $this->db->select('Total');
        $this->db->where('IDBlok', $id);
        $this->db->where('Periode', $periodeaktif);
        $this->db->group_by('IDBlok');
        $this->db->group_by('IDMess');
        $this->db->group_by('Nomor');
        $this->db->group_by('Periode');
        $this->db->group_by('Pemakaian');
        $this->db->group_by('Biaya');
        $this->db->group_by('Nama');
        $this->db->group_by('NIK');
        $this->db->group_by('Dept');
        $this->db->group_by('CV');
        $this->db->group_by('Tagihan');
        $this->db->group_by('Tunggakan');
        $this->db->group_by('Total');
        $this->db->order_by('IDMess', 'asc');
        $query = $this->db->get('vwTarikTagihAirAll');
        return $query->result();
    }
    
    function airPerDept($id,$periodeaktif){        
        $this->db->where('IDDept', $id);
        $this->db->where('Periode', $periodeaktif);
        $query = $this->db->get('vwTraAirPerDept');
        return $query->result();
    }
    
    function blokList($id,$periodeaktif) {
        $this->db->distinct();
        $this->db->select('IDBlok');
        $this->db->select('IDMess');
        $this->db->select('Nomor');
        $this->db->select('Periode');
        $this->db->select('Pemakaian');
        $this->db->select('Biaya');
        $this->db->select('Nama');
        $this->db->select('NIK');
        $this->db->select('Dept');
        $this->db->select('CV');
        $this->db->select('Tagihan');
        $this->db->select('Tunggakan');
        $this->db->select('Total');
        $this->db->where('IDBlok', $id);
        $this->db->where('Periode', $periodeaktif);
        $this->db->group_by('IDBlok');
        $this->db->group_by('IDMess');
        $this->db->group_by('Nomor');
        $this->db->group_by('Periode');
        $this->db->group_by('Pemakaian');
        $this->db->group_by('Biaya');
        $this->db->group_by('Nama');
        $this->db->group_by('NIK');
        $this->db->group_by('Dept');
        $this->db->group_by('CV');
        $this->db->group_by('Tagihan');
        $this->db->group_by('Tunggakan');
        $this->db->group_by('Total');
        $this->db->order_by('IDMess', 'asc');
        $query = $this->db->get('vwTarikTagihListAll');
        return $query->result();
    }
    
    function listPerDept($id,$periodeaktif){        
        $this->db->where('IDDept', $id);
        $this->db->where('Periode', $periodeaktif);
        $query = $this->db->get('vwTraListPerDept');
        return $query->result();
    }
}