<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tipe_mess extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->model(array('m_tipe_mess'));
        if(!$this->session->userdata('username')){
            redirect('login');
        }
    }
    
    public function index() {        
        $data['getTipeMess'] = $this->m_tipe_mess->TipeMessKaryawan();
        $this->template->display('tipe_mess/index',$data);
    }
    
    function addTipe() {
        $d['pesan']="";
        $this->template->display('tipe_mess/addTipe',$d);
    }
    
    function tambah(){        
        $data= array(
            'TipeMess'      =>strtoupper($this->input->post('txtTipe',TRUE)),
            'CreatedBy'     =>strtoupper($this->session->userdata('username')),
            'CreatedDate'   =>date('Y-m-d H:i:s')
        );
        
        $result = $this->m_tipe_mess->simpan($data);

        if($result){
            redirect('tipe_mess/index?msg=success');
        }else{
            redirect('tipe_mess/index?msg=failed');
        }
    }
    
    function editTipe(){        
        $id = $this->input->get('id');
        $data['getID'] = $this->m_tipe_mess->getTipeMess($id);
        $this->template->display('tipe_mess/editTipe',$data);

        if($this->input->post('simpan')){
            $id= $this->input->post('txtIDTipe');
            $data= array(
                'TipeMess'      =>strtoupper($this->input->post('txtTipe',TRUE)),
                'UpdatedBy'     =>strtoupper($this->session->userdata('username')),
                'UpdatedDate'   =>date('Y-m-d H:i:s')
            );

            $result = $this->m_tipe_mess->update($id,$data);
            if(!$result){
                redirect('tipe_mess/index?msg=success_edit');
            }else{
                redirect('tipe_mess/index?msg=failed_edit');
            }
        }
    }
    
    function delTipe(){
        $id = $this->input->get('id');
        $result = $this->m_tipe_mess->delete($id);

        if(!$result){
            redirect('tipe_mess/index?msg=success_delete');
        }else{
            redirect('tipe_mess/index?msg=failed_delete');
        }
    }
}