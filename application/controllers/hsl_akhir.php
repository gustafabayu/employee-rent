<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Hsl_akhir extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->model(array('m_hsl_akhir'));
        if(!$this->session->userdata('username')){
            redirect('login');
        }
    }
    
    //Bagian Air
    //-----------------------//
    function air() {
//        $blnaktif     = $this->session->userdata('blnaktif');
//        $data['blnaktif'] = $blnaktif;
        $data['blokMess'] = $this->m_hsl_akhir->blokMess();
        $this->template->display('hsl_akhir/air',$data);
    }
    
//    function lihatPerAir() {
//        $blnaktif   = $this->input->post('txtPeriode');
//        $this->session->set_userdata('blnaktif',$blnaktif);
//        redirect('hsl_akhir/air');
//    }
    
    function blokAir() {
        $id = $this->input->get('id');
//        $blnaktif     = $this->session->userdata('blnaktif');
//        $data['blnaktif'] = $blnaktif;
        $data['alamatAir'] = $this->m_hsl_akhir->blokAir($id);
        //$data['almtAir'] = $this->m_hsl_akhir->datafixFM($id);
        $this->template->display('hsl_akhir/blokAir',$data);
    }
    
    function hsl_air() {
        $id = $this->input->get('id');
//        $blnaktif     = $this->session->userdata('blnaktif');
//        $data['blnaktif'] = $blnaktif;
        $data['getData'] = $this->m_hsl_akhir->datafixFM($id);
        $data['monitoring_air'] = $this->m_hsl_akhir->monitoringFM($id);
        $this->template->display('hsl_akhir/hsl_air',$data);
    }
    
//    function add_Air() {
//        $id = $this->input->get('id');
//        $blnaktif     = $this->session->userdata('blnaktif');
//        $data['blnaktif'] = $blnaktif;
//        $data['getNoFM'] = $this->m_hsl_akhir->nomorFM();
//        $data['getData'] = $this->m_hsl_akhir->datafixFM($id);
//        $this->template->display('hsl_akhir/add_Air',$data);
//    }
    
    function tagAir() {
        $idBlok = $this->input->post('txtIDBlok');
        $data= array(
            'Nomor'         =>$this->input->post('txtFlow',TRUE),            
            'Periode'       =>$this->input->post('txtPeriode',TRUE),
            'TtlBiaya'      =>$this->input->post('txtTtlBiaya',TRUE),
            'ApproveBy'     =>strtoupper($this->session->userdata('nama')),
            'ApproveDate'   =>date('Y-m-d H:i:s'),
            'ApproveStatus' =>1
        );        
        $result = $this->m_hsl_akhir->simpantagAir($data);

        if($result){
            redirect('hsl_akhir/blokAir'."?id=".$idBlok);
        }else{
            redirect('hsl_akhir/air?msg=failed');
        }
    }
    
    //Bagian Listrik
    //-----------------------//
    function listrik() {
//        $blnaktif     = $this->session->userdata('blnaktif');
//        $data['blnaktif'] = $blnaktif;
        $data['blokMess'] = $this->m_hsl_akhir->blokMess();
        $this->template->display('hsl_akhir/listrik',$data);
    }
    
//    function lihatPerList() {
//        $blnaktif   = $this->input->post('txtPeriode');
//        $this->session->set_userdata('blnaktif',$blnaktif);
//        redirect('hsl_akhir/listrik');
//    }
    
    function blokList() {
        $id = $this->input->get('id');
//        $blnaktif     = $this->session->userdata('blnaktif');
//        $data['blnaktif'] = $blnaktif;
        $data['alamatList'] = $this->m_hsl_akhir->blokList($id);
//        $data['almtList'] = $this->m_hsl_akhir->datafixKM($id);
        $this->template->display('hsl_akhir/blokList',$data);
    }
    
    function hsl_listrik() {
        $id = $this->input->get('id');
//        $blnaktif     = $this->session->userdata('blnaktif');
//        $data['blnaktif'] = $blnaktif;
        $data['getData'] = $this->m_hsl_akhir->datafixKM($id);
        $data['monitoring_list'] = $this->m_hsl_akhir->monitoringKM($id);
        $this->template->display('hsl_akhir/hsl_listrik',$data);
    }
    
//    function add_List() {
//        $id = $this->input->get('id');
//        $blnaktif     = $this->session->userdata('blnaktif');
//        $data['blnaktif'] = $blnaktif;
//        $data['getNoKM'] = $this->m_hsl_akhir->nomorKM();
//        $data['getData'] = $this->m_hsl_akhir->datafixKM($id);
//        $this->template->display('hsl_akhir/add_List',$data);
//    }
    
    function tagListrik() {
        $idBlok = $this->input->post('txtIDBlok');
        $data= array(
            'Nomor'         =>$this->input->post('txtKwh'),            
            'Periode'       =>$this->input->post('txtPeriode'),
            'TtlBiaya'      =>$this->input->post('txtTtlBiaya'),
            'ApproveBy'     =>strtoupper($this->session->userdata('nama')),
            'ApproveDate'   =>date('Y-m-d H:i:s'),
            'ApproveStatus' =>1
        );        
        $result = $this->m_hsl_akhir->simpantagList($data);

        if($result){
            redirect('hsl_akhir/blokList'."?id=".$idBlok);
        }else{
            redirect('hsl_akhir/listrik?msg=failed');
        }
    }
}