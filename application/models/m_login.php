<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class M_login extends CI_Model {
   
    function __construct() {
        parent::__construct();
    }

    function cek_user($username) {
        return $this->db->get_where('vwMstUser', array('Username' => $username));
    }

//    function cek_pass($userid, $passwd) {
//        $this->db->where('Username', $userid);
//        $this->db->where('Password', $passwd);
//        $query = $this->db->get('tblMstUser');
//        if ($query->num_rows() > 0) {
//            return true;
//        } else {
//            return false;
//        }
//    }

    function get_serverdate() {
        $query = $this->db->query('select getdate() as serverdate');
        if ($query->num_rows() > 0) {
            $r = $query->row();
            $serverdate = $r->serverdate;
        }
        return tgl_ind($serverdate);
    }

    function simpan_log($info) {
        $this->db->trans_start();
        $this->db->insert('tblLogUser', $info);
        $signid = $this->db->insert_id();
        $this->db->trans_complete();
        return $signid;
    }

    function simpan_log_out($signid) {
		$this->db->set('DateOut','GETDATE()',false);
		$this->db->where('LogID',$signid);
		$this->db->update('tblLogUser');
        //$this->db->trans_start();
        //$this->db->query('Update tblLogUser Set DateOut=GetDate() Where LogID='. $signid);
        //$this->db->trans_complete();
//        $this->db->where('ID',$id);
//        $this->db->update('tblLogUser',$data);
    }

}
