<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class History extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->model(array('m_history'));
        if(!$this->session->userdata('username')){
            redirect('login');
        }
    }
    
    //Bagian Air
    //-----------------------//
    function air() {        
        $blnAwal     = $this->session->userdata('blnAwal');        
        $blnAkhir    = $this->session->userdata('blnAkhir');
        $data['blnAwal'] = $blnAwal;
        $data['blnAkhir'] = $blnAkhir;
        $data['blokMess'] = $this->m_history->blokMess();
        $this->template->display('history/air',$data);
    }
    
    function cariBlnAir() {
        $blnAwal    = $this->input->post('txtBlnAwal');        
        $blnakhir   = $this->input->post('txtBlnAkhir');
        $this->session->set_userdata('blnAwal',$blnAwal);
        $this->session->set_userdata('blnAkhir',$blnakhir);
        redirect('history/air');
    }
    
    //Bagian List
    //-----------------------//
    function listrik() {        
        //$data['getMess'] = $this->m_mess->MessKaryawan();
        $this->template->display('history/listrik');
    }
}