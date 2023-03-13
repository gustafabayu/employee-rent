<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->model(array('m_user'));
        if(!$this->session->userdata('username')){
            redirect('login');
        }
    }
    
    public function index() {       
        $data['getUser'] = $this->m_user->selectUser();
        $this->template->display('user/index',$data);
    }
    
    function addUser() {        
        $data['pesan']="";
        $data['getLvlUser'] = $this->m_user->getLvlUser();
        $data['getJab'] = $this->m_user->jabKaryawan()->result();
        $this->template->display('user/addUser',$data);
    }
    
    function tambah(){        
        $data= array(
            'Username'      =>strtoupper($this->input->post('txtUsername',TRUE)),            
            'Password'      =>$this->input->post('txtPassword',TRUE),
            'Nama'          =>strtoupper($this->input->post('txtNama',TRUE)),
            'NIK'           =>$this->input->post('txtNIK',TRUE),
            'Jabatan'       =>strtoupper($this->input->post('txtJabatan',TRUE)),
            'Departemen'    =>strtoupper($this->input->post('txtDepartemen',TRUE)),
            'LevelID'       =>$this->input->post('txtLevelID',TRUE),
            'NotActive'     =>$this->input->post('txtStatus',TRUE),
            'CreatedBy'     =>strtoupper($this->session->userdata('username')),
            'CreatedDate'   =>date('Y-m-d H:i:s')
        );       
        $result = $this->m_user->simpan($data);

        if($result){            
            $data['pesan']="<p class='alert alert-info'>Tambah data berhasil.. Lihat data lengkap, klik ".anchor('user/index','<b>disini</b>')."</p>";
            $this->template->display('user/addUser',$data);
        }else{
            $data['pesan']="<p class='alert alert-danger'>Gagal Tambah User.. </p>";
            $this->template->display('user/addUser',$data);
        }
    }
        
    function editUser(){       
        $id = $this->input->get('id');        
        $data['getID'] = $this->m_user->getUser($id);
        $data['getLvlUser'] = $this->m_user->getLvlUser($id);
        $data['getJab'] = $this->m_user->jabKaryawan()->result();
        $this->template->display('user/editUser',$data);

        if($this->input->post('simpan')){
            $id= $this->input->post('txtUserID');
            $data= array(
                'Username'      =>strtoupper($this->input->post('txtUsername',TRUE)),
                'Nama'          =>strtoupper($this->input->post('txtNama',TRUE)),
                'NIK'           =>$this->input->post('txtNIK',TRUE),
                'Jabatan'       =>strtoupper($this->input->post('txtJabatan',TRUE)),
                'Departemen'    =>strtoupper($this->input->post('txtDepartemen',TRUE)),
                'LevelID'       =>$this->input->post('txtLevelID',TRUE),
                'NotActive'     =>$this->input->post('txtStatus',TRUE),
                'UpdatedBy'     =>strtoupper($this->session->userdata('username')),
                'UpdatedDate'   =>date('Y-m-d H:i:s')
            );

            $result = $this->m_user->update($id,$data);
            if(!$result){
                redirect('user/index?msg=success_edit');
            }else{
                redirect('user/index?msg=failed_edit');
            }
        }
    }
            
    function delUser(){
        $id = $this->input->get('id');
        $result = $this->m_user->delete($id);

        if(!$result){
            redirect('user/index?msg=success_delete');
        }else{
            redirect('user/index?msg=failed_delete');
        }
    }
    
    function gantiPass(){       
        $id = $this->input->get('id');
       
        $data['getUser'] = $this->m_user->getUser($id);                
        $this->template->display('user/gantiPass',$data);
    }
    
    function updatePass(){        
        $id = $this->input->post('txtUserID');
        $data['getUser'] = $this->m_user->getUser($id);

        foreach ($this->m_user->getUser($id) as $row):
            if($this->input->post('simpan')){
                $oldPass = $this->input->post('txtPassLama');
                if($oldPass === $row->Password){
                    $userID = $this->input->post('txtUserID');
                    $data = array('Password'=> $this->input->post('txtPassBaru'),
                            'UpdatedBy'     =>strtoupper($this->session->userdata('username')),
                            'UpdatedDate'   =>date('Y-m-d H:i:s')
                        );
                    $this->m_user->updatePass($userID,$data);
                    
                    redirect('user/index?msg=success');
                }else{
                    redirect('user/index?msg=failed');
                }
            }
        endforeach;        
    }
}