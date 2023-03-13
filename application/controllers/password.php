<?php
class Password extends CI_Controller{
    function __construct() {
        parent::__construct();             
            if(!$this->session->userdata('username')){
            redirect('login');
        }
    }
	
    function index(){
        $uid = $this->session->userdata('username');        
        $data['dataUser'] = $this->db->get_where('tblMstUser',array('Username'=>$uid))->result();		
        $data['message'] = $this->session->flashdata('message');

        $this->template->display('user/passUser',$data);
    }
	
    function update(){
        $uid = $this->input->post('txtUserID');
        $passlama = $this->input->post('txtPassLama');
        $passbaru = $this->input->post('txtPassBaru');
        $UpdatedBy = strtoupper($this->session->userdata('username'));
        $UpdatedDate = date('Y-m-d H:i:s');

        if ($this->cek_pass_lama($uid, $passlama) === 0){
            $pesan = pesan('Password lama anda tidak sesuai','warning');
            $this->session->set_flashdata('message',$pesan);
            redirect('password');
        }

        $this->db->trans_start();
        $this->db->where('Username', strtoupper($uid));
        $this->db->update('tblMstUser',array('Password'=>$passbaru, 'UpdatedBy'=>$UpdatedBy, 'UpdatedDate'=>$UpdatedDate));
        $this->db->trans_complete();

        $pesan = pesan('Ubah password berhasil.. silahkan login ulang, klik '.anchor('dashboard/do_logout','<b>disini</b>').'','success');
        $this->session->set_flashdata('message',$pesan);
        redirect('password');
    }
	
    function cek_pass_lama($uid, $passlama){
        $query = $this->db->get_where('tblMstUser',array('Username'=>$uid, 'Password'=>$passlama));
        return $query->num_rows();		
    }
}