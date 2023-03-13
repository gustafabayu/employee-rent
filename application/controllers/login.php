<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->model(array('m_login'));
        if ($this->session->userdata('username')) {
            redirect('dashboard');
        }
    }

    public function index() {
        $this->load->view('login');
    }
    
    function loginUser() {
        $username = $this->input->post('txtIdUser');
        $passwd = $this->input->post('txtPasswd');
        
        if ($username === '' && $passwd === '') {
            $pesan = pesan("Masukkan user dan password!", pesan_peringatan());
            $this->session->set_flashdata('message', $pesan);
            redirect('login');
        }

        $checkres = $this->cekUser($username, $passwd);
        switch ($checkres) {
            case 100 :
                redirect('dashboard');
                break;

            default:
                redirect('login');
                break;
        }
    }
    
    function cekUser($username, $passwd) {
        $cek_user = $this->m_login->cek_user($username);
        
        if ($cek_user->num_rows() > 0) {
            $row = $cek_user->row();
            if ($row->NotActive === 1) {
                $pesan = pesan("User Sudah Tidak Aktif Lagi.", pesan_aktif());
                $this->session->set_flashdata('message', $pesan);
                return 1;
            }

            if ($passwd === $row->Password) {
                $serverdate = $this->m_login->get_serverdate();
                $this->session->set_userdata('username', $username);
                $this->session->set_userdata('username', $row->Username);
                $this->session->set_userdata('nama', $row->Nama);
                $this->session->set_userdata('jabatan', $row->Jabatan);                
                $this->session->set_userdata('departemen', $row->Departemen);
                $this->session->set_userdata('groupid', $row->LevelID);
//                $this->session->set_userdata('groupname', $row->GroupName);
                $this->session->set_userdata('serverdate', $serverdate);

                $this->simpan_log();
                return 100;
            } else {
                $pesan = pesan("Password Anda Salah.", pesan_error());
                $this->session->set_flashdata('message', $pesan);
                return 2;
            }
        } else {
            $pesan = pesan("User $username Tidak Terdaftar.", pesan_info());
            $this->session->set_flashdata('message', $pesan);
            return 0;
        }        
    }      
    
    function simpan_log() {
        $this->load->library(array('user_agent', 'mobile_detect', 'misc'));

        $detect = new Mobile_Detect();

        $deviceType = ($detect->isMobile() ? ($detect->isTablet() ? '' : '') : 'PC');

        foreach ($detect->getRules() as $name => $regex):
            $check = $detect->{'is' . $name}();
            if ($check == 'true') {
                $deviceType .= $name . ' ';
            }
        endforeach;

        if ($this->agent->is_browser()) {
            $agent = $this->agent->browser() . ' ' . $this->agent->version();
        } elseif ($this->agent->is_robot()) {
            $agent = $this->agent->robot();
        } elseif ($this->agent->is_mobile()) {
            $agent = $this->agent->mobile();
        } else {
            $agent = 'Unidentified User Agent';
        }

        $hostname = gethostbyaddr($_SERVER['REMOTE_ADDR']);
        $ipaddr = ($_SERVER['REMOTE_ADDR'] == '::1') ? '127.0.0.1' : $_SERVER['REMOTE_ADDR'];

        $info = array(
            'UserID' => strtoupper($this->session->userdata('username')),
            'DateIn' => date('Y-m-d H:i:s'),
            'Hostname' => $hostname,
            'IPAddress' => $ipaddr,
            'Device' => $deviceType,
            'Browser' => $agent,
            'Platform' => $this->misc->platform(),
            'UserAgent' => $this->agent->agent_string()
        );

        $signid = $this->m_login->simpan_log($info);
        if ($signid === 0) {
            $this->session->set_userdata('signid', 0);
        } else {
            $this->session->set_userdata('signid', $signid);
        }
    }
}
