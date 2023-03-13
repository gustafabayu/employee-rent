<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Flow_mtr extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->model(array('m_flow_mtr', 'm_mess'));
        if(!$this->session->userdata('username')){
            redirect('login');
        }
    }
    
    public function index() {        
        $data['flowMess'] = $this->m_flow_mtr->blokMess();
        $this->template->display('flow_mtr/index',$data);
    }
    
    public function flowMess() { 
        $id = $this->input->get('id');
        $data['getFlow'] = $this->m_flow_mtr->FlowMtrMess($id);
        $data['almtAir'] = $this->m_flow_mtr->dataFMmess($id);
        $this->template->display('flow_mtr/flowMess',$data);
    }
    
    function addFlow() {
        $id = $this->input->get('id');
        $d['getData'] = $this->m_flow_mtr->dataFMmess($id);
        $d['getMess'] = $this->m_flow_mtr->getMess();
        $d['PakaiAir'] = $this->m_flow_mtr->PakaiAir();
        $this->template->display('flow_mtr/addFlow',$d);
    }
    
    function tambah(){        
        $idBlok = $this->input->post('txtIDBlok');
        $data= array(
            'Nomor'         =>$this->input->post('txtNomor',TRUE),
            'Merk'          =>strtoupper($this->input->post('txtMerk',TRUE)),
            'Spesifikasi'   =>strtoupper($this->input->post('txtSpesifikasi',TRUE)),
            'TglPasang'     =>$this->input->post('txtTglPasang',TRUE),            
            'Ket'           =>strtoupper($this->input->post('txtKet',TRUE)),
            'TipePakai'     =>$this->input->post('txtPemakai',TRUE),
            'IDMess'        =>$this->input->post('txtAlamat',TRUE),
            'CreatedBy'     =>strtoupper($this->session->userdata('username')),
            'CreatedDate'   =>date('Y-m-d H:i:s')
        );        
        $result = $this->m_flow_mtr->simpan($data);

        if($result){            
            redirect('flow_mtr/flowMess'."?id=".$idBlok);
        }else{
            redirect('flow_mtr/index?msg=failed');
        }
    }
    
    function editFlow(){       
        $id = $this->input->get('id');
        $data['getID'] = $this->m_flow_mtr->getFlowMess($id);
        $data['getMess'] = $this->m_flow_mtr->getMess();
        $data['PakaiAir'] = $this->m_flow_mtr->PakaiAir();
        $this->template->display('flow_mtr/editFlow',$data);

        $idBlok = $this->input->post('txtIDBlok');
        if($this->input->post('simpan')){
            $id= $this->input->post('txtIDFlow');
            $data= array(
                'Nomor'         =>$this->input->post('txtNomor',TRUE),
                'Merk'          =>strtoupper($this->input->post('txtMerk',TRUE)),
                'Spesifikasi'   =>strtoupper($this->input->post('txtSpesifikasi',TRUE)),
                'TglPasang'     =>$this->input->post('txtTglPasang',TRUE),            
                'Ket'           =>strtoupper($this->input->post('txtKet',TRUE)),
                'TipePakai'     =>$this->input->post('txtPemakai',TRUE),
                'IDMess'        =>$this->input->post('txtAlamat',TRUE),
                'UpdatedBy'     =>strtoupper($this->session->userdata('username')),
                'UpdatedDate'   =>date('Y-m-d H:i:s')
            );

            $result = $this->m_flow_mtr->update($id,$data);
            if(!$result){
                redirect('flow_mtr/flowMess'."?id=".$idBlok);
            }else{
                redirect('flow_mtr/index?msg=failed_edit');
            }
        }
    }
    
    function delFlow(){
        $id = $this->input->get('id');        
        $result = $this->m_flow_mtr->delete($id);
        if(!$result){
            redirect('flow_mtr/index?msg=success_delete');
        }else{
            redirect('flow_mtr/index?msg=failed_delete');
        }
    }
}