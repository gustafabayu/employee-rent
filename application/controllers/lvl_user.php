<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Lvl_user extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->model(array('m_lvl_user'));
        if(!$this->session->userdata('username')){
            redirect('login');
        }
    }
    
    public function index() {        
        $data['getLevelUser'] = $this->m_lvl_user->LevelUser();
        $this->template->display('lvl_user/index',$data);
    }
    
    function addLevel() {
        $d['pesan']="";
        $this->template->display('lvl_user/addLevel',$d);
    }
    
    function tambah(){        
        $data= array(
            'GroupName'     =>strtoupper($this->input->post('txtLevel',TRUE)),
            'GroupDesc'     =>strtoupper($this->input->post('txtKet',TRUE)),
            'CreatedBy'     =>strtoupper($this->session->userdata('username')),
            'CreatedDate'   =>date('Y-m-d H:i:s')
        );        
        $result = $this->m_lvl_user->simpan($data);

        if($result){
            redirect('lvl_user/index?msg=success');
        }else{
            redirect('lvl_user/index?msg=failed');
        }
    }
    
    function editLevel(){        
        $id = $this->input->get('id');
        $data['getID'] = $this->m_lvl_user->getLevel($id);
        $this->template->display('lvl_user/editLevel',$data);

        if($this->input->post('simpan')){
            $id= $this->input->post('txtIDTipe');
            $data= array(
                'GroupName'     =>strtoupper($this->input->post('txtLevel',TRUE)),
                'GroupDesc'     =>strtoupper($this->input->post('txtKet',TRUE)),
                'UpdatedBy'     =>strtoupper($this->session->userdata('username')),
                'UpdatedDate'   =>date('Y-m-d H:i:s')
            );

            $result = $this->m_lvl_user->update($id,$data);
            if(!$result){
                redirect('lvl_user/index?msg=success_edit');
            }else{
                redirect('lvl_user/index?msg=failed_edit');
            }
        }
    }
    
    function delLevel(){
        $id = $this->input->get('id');
        $result = $this->m_lvl_user->delete($id);

        if(!$result){
            redirect('lvl_user/index?msg=success_delete');
        }else{
            redirect('lvl_user/index?msg=failed_delete');
        }
    }
}