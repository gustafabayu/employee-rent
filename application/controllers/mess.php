<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mess extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->model(array('m_mess'));
        if(!$this->session->userdata('username')){
            redirect('login');
        }
    }
    
    public function index() {        
        $data['alamatMess'] = $this->m_mess->blokMess();
        $this->template->display('mess/index',$data);
    }
    
    public function blokMess() {
        $id = $this->input->get('id');
        $data['getMess'] = $this->m_mess->MessKaryawan($id);
        $data['almtMess'] = $this->m_mess->dataMess($id);
        $this->template->display('mess/blokMess',$data);
    }
    
    function addMess() {
        $id = $this->input->get('id');
        $d['getData'] = $this->m_mess->dataMess($id);
        $d['getBlokMess'] = $this->m_mess->getBlokMess();
        $d['getTipeMess'] = $this->m_mess->getTipeMess();
        $d['getKwhMess'] = $this->m_mess->getKwhMess();
        $d['getFlowMess'] = $this->m_mess->getFlowMess();
        $this->template->display('mess/addMess',$d);
    }
    
    function tambah(){
        $idBlok = $this->input->post('txtIDBlok');
        $data= array(
            'Nama'          =>strtoupper($this->input->post('txtNama',TRUE)),
            'IDTipe'        =>$this->input->post('txtTipe',TRUE),
            'IDBlok'        =>$this->input->post('txtIDBlok',TRUE),
            'Alamat'        =>strtoupper($this->input->post('txtAlamat',TRUE)),
            'Blok'          =>strtoupper($this->input->post('txtBlok',TRUE)),
            'Kopel'         =>strtoupper($this->input->post('txtKopel',TRUE)),
            'Pintu'         =>strtoupper($this->input->post('txtPintu',TRUE)),            
            'JmlKamar'      =>$this->input->post('txtJumlah',TRUE),
            'Status'        =>$this->input->post('txtStatus',TRUE),
            'CreatedBy'     =>strtoupper($this->session->userdata('username')),
            'CreatedDate'   =>date('Y-m-d H:i:s')
        );        
        $result = $this->m_mess->simpan($data);

        if($result){
            redirect('mess/blokMess'."?id=".$idBlok);
        }else{
            redirect('mess/index?msg=failed');
        }
    }
            
    function editMess(){       
        $id = $this->input->get('id');        
        $data['getID'] = $this->m_mess->getMess($id);
        $data['getBlokMess'] = $this->m_mess->getBlokMess();
        $data['getTipeMess'] = $this->m_mess->getTipeMess();
        $data['getKwhMess'] = $this->m_mess->getKwhMess();
        $data['getFlowMess'] = $this->m_mess->getFlowMess();
        $this->template->display('mess/editMess',$data);

        $idBlok = $this->input->post('txtIDBlok');
        if($this->input->post('simpan')){
            $id= $this->input->post('txtIDMess');
            $data= array(
                'Nama'          =>strtoupper($this->input->post('txtNama',TRUE)),
                'IDTipe'        =>$this->input->post('txtTipe',TRUE),
                'Alamat'        =>strtoupper($this->input->post('txtAlamat',TRUE)),
                'Blok'          =>strtoupper($this->input->post('txtBlok',TRUE)),
                'Kopel'         =>strtoupper($this->input->post('txtKopel',TRUE)),
                'Pintu'         =>strtoupper($this->input->post('txtPintu',TRUE)),            
                'JmlKamar'      =>$this->input->post('txtJumlah',TRUE),
                'Status'        =>$this->input->post('txtStatus',TRUE),
                'UpdatedBy'     =>strtoupper($this->session->userdata('username')),
                'UpdatedDate'   =>date('Y-m-d H:i:s')
            );
            $result = $this->m_mess->update($id,$data);
            
            if(!$result){
                redirect('mess/blokMess'."?id=".$idBlok);
            }else{
                redirect('mess/index?msg=failed_edit');
            }
        }
    }
            
    function delMess(){
        $id = $this->input->get('id');
        $result = $this->m_mess->delete($id);

        if(!$result){
            redirect('mess/index?msg=success_delete');
        }else{
            redirect('mess/index?msg=failed_delete');
        }
    }
}