<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Kwh_mtr extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->model(array('m_kwh_mtr', 'm_mess'));
        if(!$this->session->userdata('username')){
            redirect('login');
        }
    }
    
    public function index() {
        $data['KwhMess'] = $this->m_kwh_mtr->blokMess();
        $this->template->display('kwh_mtr/index',$data);
    }
    
    function kwhMess() {
        $id = $this->input->get('id');
        $data['getKwh'] = $this->m_kwh_mtr->KwhMtrMess($id);
        $data['almtList'] = $this->m_kwh_mtr->dataKMmess($id);
        $this->template->display('kwh_mtr/kwhMess',$data);
    }
    
    function addKwh() {
        $id = $this->input->get('id');
        $d['getData'] = $this->m_kwh_mtr->dataKMmess($id);
        $d['getMess'] = $this->m_kwh_mtr->getMess();
        $d['PakaiList'] = $this->m_kwh_mtr->PakaiList();
        $this->template->display('kwh_mtr/addKwh',$d);
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
        $result = $this->m_kwh_mtr->simpan($data);

        if($result){            
            redirect('kwh_mtr/kwhMess'."?id=".$idBlok);
        }else{
            redirect('kwh_mtr/index?msg=failed');            
        }
    }
    
    function editKwh(){       
        $id = $this->input->get('id');
        $data['getID'] = $this->m_kwh_mtr->getKwhMess($id);
        $data['getMess'] = $this->m_kwh_mtr->getMess();
        $data['PakaiList'] = $this->m_kwh_mtr->PakaiList();
        $this->template->display('kwh_mtr/editKwh',$data);
        
        $idBlok = $this->input->post('txtIDBlok');
        if($this->input->post('simpan')){
            $id= $this->input->post('txtIDKwh');
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

            $result = $this->m_kwh_mtr->update($id,$data);
            if(!$result){
                redirect('kwh_mtr/kwhMess'."?id=".$idBlok);
            }else{
                redirect('kwh_mtr/index?msg=failed_edit');
            }
        }
    }
    
    function delKwh(){
        $id = $this->input->get('id');       
        $result = $this->m_kwh_mtr->delete($id);
        if(!$result){
            redirect('kwh_mtr/index?msg=success_delete');
        }else{
            redirect('kwh_mtr/index?msg=failed_delete');
        }
    }
}