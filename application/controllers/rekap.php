<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Rekap extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->model(array('m_rekap'));
        if(!$this->session->userdata('username')){
            redirect('login');
        }
    }
    
    //Bagian Air
    //-----------------------//
    function air() {       
        $periodeaktif = $this->session->userdata('periode');
        $data['periodeaktif'] = $periodeaktif;
        $data['blokMess'] = $this->m_rekap->blokMess();
        $this->template->display('rekap/air',$data);
    }
    
    function PeriAir() {
        $periodeaktif = $this->input->post('txtPeriode');
        $this->session->set_userdata('periode',$periodeaktif);
        redirect('rekap/air');
    }
    
    function blokAir() {
        $id = $this->input->get('id');
        $periodeaktif = $this->session->userdata('periode');
        $data['periodeaktif'] = $periodeaktif;
        $data['alamatAir'] = $this->m_rekap->blokAir($id,$periodeaktif);
	$data['message'] = $this->session->flashdata('message');	
        $this->template->display('rekap/blokAir',$data);
    }
    
    //Per Dept Tag Air
    //-----------------------//
    function perDeptAir() {
        $periodeDept = $this->session->userdata('periodeDept');
        $data['periodeDept'] = $periodeDept;
        $data['nmDept'] = $this->m_rekap->nmDept();
        $this->template->display('rekap/perDeptAir',$data);
    }
    
    function deptPeriAir() {
        $periodeDept = $this->input->post('txtPeriode');
        $this->session->set_userdata('periodeDept',$periodeDept);
        redirect('rekap/perDeptAir');
    }
    
    function lihatOrgAir(){
        $id = $this->input->get('id');
        $periodeaktif = $this->session->userdata('periodeDept');
        $data['periodeaktif'] = $periodeaktif;
        $data['alamatAir'] = $this->m_rekap->airPerDept($id,$periodeaktif);
	$this->template->display('rekap/lihatOrgAir',$data);
    }
    
    //Bagian List
    //-----------------------//
    function listrik() {       
        $periodeaktif = $this->session->userdata('periode');
        $data['periodeaktif'] = $periodeaktif;
        $data['blokMess'] = $this->m_rekap->blokMess();
        $this->template->display('rekap/listrik',$data);
    }
    
    function PeriList() {
        $periode = $this->input->post('txtPeriode');
        $this->session->set_userdata('periode',$periode);
        redirect('rekap/listrik');
    }
    
    function blokList() {
        $id = $this->input->get('id');
        $periodeaktif = $this->session->userdata('periode');
        $data['periodeaktif'] = $periodeaktif;
        $data['alamatList'] = $this->m_rekap->blokList($id,$periodeaktif);
	$data['message'] = $this->session->flashdata('message');	
        $this->template->display('rekap/blokList',$data);
    }
    
    //Per Dept Tag List
    //-----------------------//
    function perDeptList() {
        $periodeDept = $this->session->userdata('periodeDept');
        $data['periodeDept'] = $periodeDept;
        $data['nmDept'] = $this->m_rekap->nmDept();
        $this->template->display('rekap/perDeptList',$data);
    }
    
    function deptPeriList() {
        $periodeDept = $this->input->post('txtPeriode');
        $this->session->set_userdata('periodeDept',$periodeDept);
        redirect('rekap/perDeptList');
    }
    
    function lihatOrgList(){
        $id = $this->input->get('id');
        $periodeaktif = $this->session->userdata('periodeDept');
        $data['periodeaktif'] = $periodeaktif;
        $data['alamatList'] = $this->m_rekap->listPerDept($id,$periodeaktif);
	$this->template->display('rekap/lihatOrgList',$data);
    }
}