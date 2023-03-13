<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Akses_user extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model(array('m_akses_user', 'm_lvl_user'));
        if (!$this->session->userdata('username')) {
            redirect('login');
        }
    }
    
    function akses($aksi = null) {
        switch ($aksi) {
            case 'simpan':
                $this->akses_simpan();
                break;

            default:
                $this->akses_list();
                break;
        }
    }

    function akses_list() {
        $data['pesan'] = $this->session->flashdata('pesan');
        $data['getLevelUser'] = $this->m_lvl_user->LevelUser();
        //$data['getMenu'] = $this->m_akses_user->MenuUser();
        $this->template->display('akses_user/akseslist', $data);
    }
    
    function akses_listmenu() {
        if ('IS_AJAX') {
            $data['menulist'] = $this->m_akses_user->get_menu()->result();
            $this->load->view('akses_user/listmenu', $data);
        }
    }
        
    function akses_simpan() {
        $levelid = $this->input->post('txtLevelID');
        $chkid = $this->input->post('chk');
        $jummenu = count($this->input->post('menu'));
        
        $this->m_akses_user->hapus_menuakses($levelid);

        if (!empty($chkid)) {
            for ($i = 0; $i < $jummenu; $i++) {
                if (isset($chkid[$i])) {
                    $menuid = $chkid[$i];
                    $menuhead = substr($menuid, 0, 1) . '00';
                    $this->m_akses_user->simpan_menuakses($levelid, $menuhead);
                    $this->m_akses_user->simpan_menuakses($levelid, $menuid);
                }
            }
        }
//        if (!empty($chkid)) {
//            $this->m_akses_user->hapus_menuakses($levelid);
//            for ($i = 0; $i < $jummenu; $i++) {
//                if (isset($chkid[$i])) {
//                    $menuid = $chkid[$i];
//                    $this->m_akses_user->simpan_menuakses($levelid, $menuid);
//                }
//            }
//        }
//        redirect('akses_user/index?msg=success');
        $pesan = pesan('Simpan akses menu berhasil!', 'success');
        $this->session->set_flashdata("pesan", $pesan);
        redirect('akses_user/akses');
    }
        
}
