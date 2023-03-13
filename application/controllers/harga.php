<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Harga extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->model(array('m_harga','m_mess'));
        if(!$this->session->userdata('username')){
            redirect('login');
        }
    }
    
    function air() {       
        $data['hargaFM'] = $this->m_harga->hargaFM();
        $this->template->display('harga/air',$data);
    }
    
    function addFM() {
        $this->template->display('harga/addFM');
    }
    
    function tambahFM(){        
        $data= array(
            'Tipe'          =>strtoupper($this->input->post('txtTipe',TRUE)),
            'Harga'         =>strtoupper($this->input->post('txtHarga',TRUE)),                        
            'Ket'           =>strtoupper($this->input->post('txtKet',TRUE)),            
            'CreatedBy'     =>strtoupper($this->session->userdata('username')),
            'CreatedDate'   =>date('Y-m-d H:i:s')
        );        
        $result = $this->m_harga->simpanAir($data);

        if(!$result){
            redirect('harga/air?msg=success');
        }else{
            redirect('harga/air?msg=failed');
        }
    }
    
    function editFM(){       
        $id = $this->input->get('id');
        $data['getData'] = $this->m_harga->hargaAir($id);
        $this->template->display('harga/editFM',$data);

        if($this->input->post('simpan')){
            $id= $this->input->post('txtID');
            $data= array(
                'Tipe'          =>strtoupper($this->input->post('txtTipe',TRUE)),
                'Harga'         =>strtoupper($this->input->post('txtHarga',TRUE)),                        
                'Ket'           =>strtoupper($this->input->post('txtKet',TRUE)),
                'UpdatedBy'     =>strtoupper($this->session->userdata('username')),
                'UpdatedDate'   =>date('Y-m-d H:i:s')
            );

            $result = $this->m_harga->updateAir($id,$data);
            if(!$result){
                redirect('harga/air?msg=success_edit');
            }else{
                redirect('harga/air?msg=failed_edit');
            }
        }
    }
    
    function listrik() {       
        $data['hargaKM'] = $this->m_harga->hargaKM();
        $this->template->display('harga/listrik',$data);
    }
    
    function addKM() {
        $this->template->display('harga/addKM');
    }
    
    function tambahKM(){        
        $data= array(
            'TipeMCB'       =>strtoupper($this->input->post('txtMCB',TRUE)),
            'Harga'         =>strtoupper($this->input->post('txtHarga',TRUE)),                        
            'Ket'           =>strtoupper($this->input->post('txtKet',TRUE)),            
            'CreatedBy'     =>strtoupper($this->session->userdata('username')),
            'CreatedDate'   =>date('Y-m-d H:i:s')
        );        
        $result = $this->m_harga->simpanList($data);

        if(!$result){
            redirect('harga/listrik?msg=success');
        }else{
            redirect('harga/listrik?msg=failed');
        }
    }
    
    function editKM(){       
        $id = $this->input->get('id');
        $data['getData'] = $this->m_harga->hargaList($id);
        $this->template->display('harga/editKM',$data);

        if($this->input->post('simpan')){
            $id= $this->input->post('txtID');
            $data= array(
                'TipeMCB'       =>strtoupper($this->input->post('txtMCB',TRUE)),
                'Harga'         =>strtoupper($this->input->post('txtHarga',TRUE)),                        
                'Ket'           =>strtoupper($this->input->post('txtKet',TRUE)),
                'UpdatedBy'     =>strtoupper($this->session->userdata('username')),
                'UpdatedDate'   =>date('Y-m-d H:i:s')
            );

            $result = $this->m_harga->updateList($id,$data);
            if(!$result){
                redirect('harga/listrik?msg=success_edit');
            }else{
                redirect('harga/listrik?msg=failed_edit');
            }
        }
    }
}