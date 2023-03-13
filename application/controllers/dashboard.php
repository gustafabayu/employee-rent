<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->model(array('m_dashboard', 'm_login'));
        if(!$this->session->userdata('username')){
            redirect('login');
        }
    }
    
    public function index() {
        $data['userid'] = ucfirst($this->session->userdata('userid'));
        $data['logUser'] = $this->m_dashboard->log_history()->result();
        $this->template->display('dashboard', $data);
    }
    
    function do_logout() {
        $signid = $this->session->userdata('signid');
        $this->m_login->simpan_log_out($signid);

        $this->unset_only();
//        $this->session->unset_userdata('userid');
//        $this->session->unset_userdata('username');
//        $this->session->unset_userdata('nama');
//        $this->session->unset_userdata('jabatan');
//        $this->session->unset_userdata('groupuser');
//        $this->session->unset_userdata('departemen');
        //$this->session->unset_userdata('groupuser');
        
        redirect('login');
    }
    
    function unset_only() {
        $user_data = $this->session->all_userdata();

        foreach ($user_data as $key => $value) {
            if ($key != 'session_id' && $key != 'ip_address' && $key != 'user_agent' && $key != 'last_activity') {
                $this->session->unset_userdata($key);
            }
        }
    }
}