<?php

class M_dashboard extends CI_Model {

    function log_history() {
        $username = $this->session->userdata('username');
        $groupid = $this->session->userdata('groupid');

        switch ($groupid) {
            case 1: //PROGRAMMER
                //$this->db->select('top 100 * ');
				$this->db->limit(100);
                break;

//            case 7: //PIMPINAN MPD
//                $this->db->select('top 100 * ');
//                break;

            default:
                //$this->db->select('top 30 * ');
				$this->db->limit(30);
                $this->db->where(array('UserID' => $username));
                break;
        }

        $this->db->order_by('DateIn', 'DESC');
        return $this->db->get('tblLogUser');
    }

}
