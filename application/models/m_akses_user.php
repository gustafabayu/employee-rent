<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class M_akses_user extends CI_Model {

    function __construct() {
        parent:: __construct();
    }

//    public function LevelUser() {
//        $query = $this->db->get('tblMstLevelUser');
//        return $query->result();
//    }

    public function MenuUser() {
        $query = $this->db->get('tblMstMenu');
        return $query->result();
    }
    
    function get_menu(){
        $levelid = $this->input->post('levelid');

        $q = $this->subquery->start_union();
        $q->select('MenuID,MenuName,MenuParent,MenuParentName,MenuIcon,1 as Pilih')->from('vwMenuAkses')->where('LevelID',$levelid);

        $q1 = $this->subquery->start_union();
        $q1->select('MenuID,MenuName,MenuParent,MenuParentName,MenuIcon,0 as Pilih')->from('vwMenu');
            $q11=$this->subquery->start_subquery('where_in');
            $q11->select('MenuID')->from('vwMenuAkses')->where('LevelID',$levelid);		
            $this->subquery->end_subquery('MenuID',false);

        $this->subquery->end_union();
        $this->db->order_by('MenuID');

        $result = $this->db->get();
        return $result;
    }
    
    function hapus_menuakses($levelid) {
        $this->db->delete('tblMstMenuAkses', array('LevelID' => $levelid));
    }

    function simpan_menuakses($levelid, $menuid) {
        $info = array(
            'LevelID' => $levelid,
            'MenuID' => $menuid            
        );
        $berhasil = 0;

        $this->db->trans_start();
        $cek = $this->db->get_where('tblMstMenuAkses', $info);

        if ($cek->num_rows() == 0) {
            $this->db->insert('tblMstMenuAkses', $info);
        }
        $this->db->trans_complete();
        
        if ($this->db->trans_status() === TRUE){
            $berhasil = 1;
        }
        return $berhasil;
    }

}
