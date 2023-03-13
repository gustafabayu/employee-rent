<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Blok_mess extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->model(array('m_blok_mess'));
        if(!$this->session->userdata('username')){
            redirect('login');
        }
    }
    
    public function index() {
        $data['getBlok'] = $this->m_blok_mess->BlokMess();
        $this->template->display('blok_mess/index',$data);
    }
    
    function addData() {
        $this->template->display('blok_mess/addData');
    }
    
    function tambah() {
        $data= array(
            'NamaBlok'      =>strtoupper($this->input->post('txtBlok',TRUE)),
            'Ket'           =>strtoupper($this->input->post('txtKet',TRUE)),
            'CreatedBy'     =>strtoupper($this->session->userdata('username')),
            'CreatedDate'   =>date('Y-m-d H:i:s')
        );        
        $result = $this->m_blok_mess->simpan($data);
        
        if(!$result){
            redirect('blok_mess/index?msg=success');
        } else {
            redirect('blok_mess/index?msg=failed');
        }
    }
    
    function editData(){        
        $id = $this->input->get('id');
        $data['getID'] = $this->m_blok_mess->getBlok($id);
        $this->template->display('blok_mess/editData',$data);

        if($this->input->post('simpan')){
            $id= $this->input->post('txtIDBlok');
            $data= array(
                'NamaBlok'      =>strtoupper($this->input->post('txtBlok',TRUE)),
                'Ket'           =>strtoupper($this->input->post('txtKet',TRUE)),
                'UpdatedBy'     =>strtoupper($this->session->userdata('username')),
                'UpdatedDate'   =>date('Y-m-d H:i:s')
            );

            $result = $this->m_blok_mess->update($id,$data);
            if(!$result){
                redirect('blok_mess/index?msg=success_edit');
            }else{
                redirect('blok_mess/index?msg=failed_edit');
            }
        }
    }
}