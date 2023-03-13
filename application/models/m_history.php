<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_history extends CI_Model{
    
    function __construct() {
        parent:: __construct();
    }
    
    public function blokMess(){
        return $this->db->get('tblMstBlokMess')->result();
    }
    
}