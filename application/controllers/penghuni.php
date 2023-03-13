<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Penghuni extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->model(array('m_penghuni', 'm_mess'));
        if (!$this->session->userdata('username')) {
            redirect('login');
        }
    }

    public function index() {
        $data['alamatMess'] = $this->m_penghuni->blokMess();
        $this->template->display('penghuni/index', $data);
    }
    
    public function blokPenghuni() {
        $id = $this->input->get('id');
        $data['getPenghuni'] = $this->m_penghuni->PenghuniMess($id);
        $data['almtMess'] = $this->m_penghuni->dataMess($id);
        $this->template->display('penghuni/blokPenghuni', $data);
    }
    
    public function addData() {
        $id = $this->input->get('id');
        $getData = $this->m_penghuni->dataMess($id);
        $getMess = $this->m_penghuni->mess_get_all();
        
        $d = array(                                
            'pesan'             => $this->session->flashdata('pesan'),            
            'getData'		=> $getData,
            'getMess'		=> $getMess,
            'txtAlamat'		=> set_value('txtAlamat', '', true),
            'txtTipe'		=> set_value('txtTipe', '', true),
            'txtKwh'            => set_value('txtKwh', '', true),
            'txtFlow'           => set_value('txtFlow', '', true),
            'txtJumlah'         => set_value('txtJumlah', '', true),            
        );
        $this->template->display('penghuni/addData', $d);  
    }
        
    function mess_get_detail(){
        if('IS_AJAX') {
            $txtAlamat = $this->input->post('txtAlamat');
            $datamess = $this->m_penghuni->mess_get_by_id($txtAlamat);
            $getMess = $this->m_penghuni->mess_get_all();

            $data = array(
                'getMess'           => $getMess,
                'txtAlamat'         => set_value('txtAlamat', isset($datamess->IDMess) ? $datamess->IDMess : '', true),
                'txtTipe'           => set_value('txtTipe', isset($datamess->IDTipe) ? $datamess->IDTipe : '', true),
                'txtKwh'            => set_value('txtKwh', isset($datamess->IDKwh) ? $datamess->IDKwh : '', true),
                'txtFlow'           => set_value('txtFlow', isset($datamess->IDFlowMtr) ? $datamess->IDFlowMtr : '', true),
                'txtJumlah'         => set_value('txtJumlah', isset($datamess->JmlKamar) ? $datamess->JmlKamar : '', true),
            );
            $this->load->view('penghuni/mess_output', $data);
        }
    }
        
    function tambah() {
        $idBlok = $this->input->post('txtIDBlok');
        $data = array(
            'IDMess'        => $this->input->post('txtAlamat',TRUE),                        
            'CreatedBy'     => strtoupper($this->session->userdata('username')),
            'CreatedDate'   => date('Y-m-d H:i:s')
        );
        $header_id = $this->m_penghuni->simpanHdr($data);
        
        $row_count = count($this->input->post('rows'));
        $no = $this->input->post('txtNo',TRUE);
        $tkid = $this->input->post('txtTKID',TRUE);
        $regno = $this->input->post('txtRegNo',TRUE);
        $fixno = $this->input->post('txtFixNo',TRUE);
        $nama = $this->input->post('txtNama',TRUE);
        $nik = $this->input->post('txtNIK',TRUE);
        $dept = $this->input->post('txtDept',TRUE);
        $cv = $this->input->post('txtCV',TRUE);
        $ket = $this->input->post('txtKet',TRUE);
        $hub = $this->input->post('txtHub',TRUE);

        for ($i = 0; $i<$row_count; $i++){
            $info = array(
                'HeaderID'      => $header_id,
                'NoKmr'         => $no[$i],
                'TKID'          => $tkid[$i],
                'RegNo'         => $regno[$i],
                'FixNo'         => $fixno[$i],
                'Nama'          => strtoupper($nama[$i]),
                'NIK'           => $nik[$i],
                'Dept'          => strtoupper($dept[$i]),
                'CV'            => strtoupper($cv[$i]),
                'Ket'           => strtoupper($ket[$i]),
                'Hub'           => strtoupper($hub[$i]),
                'CreatedBy'     => strtoupper($this->session->userdata('nama')),
                'CreatedDate'   => date('Y-m-d H:i:s')
            );               
            $this->m_penghuni->simpanDtl($info);
        }
        
        if ($header_id) {            
            redirect('penghuni/blokPenghuni'."?id=".$idBlok);
        } else {
            redirect('penghuni/index?msg=failed');
        }
    }
    
    function cari_karyawan() {        
        $param = $this->input->post('search');
        if ($param){
            $data['kar'] = $this->m_penghuni->karyawan_search($param);
        } else {
            $data['kar'] = $this->m_penghuni->karyawan_get_all();
        }
        $this->load->view('penghuni/add_karyawan', $data);
    }
    
    function cari_borongan() {        
        $cari = $this->input->post('cari');
        if ($cari){
            $data['boro'] = $this->m_penghuni->borongan_search($cari);
        } else {
            $data['boro'] = $this->m_penghuni->borongan_get_all();
        }
        $this->load->view('penghuni/add_borongan', $data);
    }
    
    function editData() {
        $id             = $this->input->get('id');
        $getData        = $this->m_penghuni->dataMess($id);
        $getPenghuni    = $this->m_penghuni->getPenghuni($id);
        $getMess        = $this->m_penghuni->mess_get_all();
        $isi_mess       = $this->m_penghuni->getIsiMess($id);
        $count_dtl      = $this->m_penghuni->htngDtl($id);
        $data = array(                                
            'getPenghuni'	=> $getPenghuni,
            'getData'		=> $getData,
            'getMess'           => $getMess,
            'isi_mess'          => $isi_mess,
            'count_dtl'         => $count_dtl,
            'txtAlamat'		=> set_value('txtAlamat', '', true),
            'txtTipe'		=> set_value('txtTipe', '', true),
            'txtKwh'            => set_value('txtKwh', '', true),
            'txtFlow'           => set_value('txtFlow', '', true),
            'txtJumlah'         => set_value('txtJumlah', '', true),            
        );
        $this->template->display('penghuni/editData', $data);  
    }
    
    function updateData() {        
        $idBlok = $this->input->post('txtIDBlok');
        $data= array(
            'IDMess'        => $this->input->post('txtAlamat',TRUE),
//            'IDTipe'        => strtoupper($this->input->post('txtTipe',TRUE)),
//            'IDKwh'         => $this->input->post('txtKwh',TRUE),
//            'IDFlowMtr'     => $this->input->post('txtFlow',TRUE),
//            'JmlKamar'      => $this->input->post('txtJumlah',TRUE),
            'UpdatedBy'     => strtoupper($this->session->userdata('nama')),
            'UpdatedDate'   => date('Y-m-d H:i:s')
        );
        $this->m_penghuni->isi_del($this->input->post('txtHeaderID', TRUE));

        $row_count = count($this->input->post('rows'));
        $no = $this->input->post('txtNo',TRUE);
        $tkid = $this->input->post('txtTKID',TRUE);
        $regno = $this->input->post('txtRegNo',TRUE);
        $fixno = $this->input->post('txtFixNo',TRUE);
        $nama = $this->input->post('txtNama',TRUE);
        $nik = $this->input->post('txtNIK',TRUE);
        $dept = $this->input->post('txtDept',TRUE);
        $cv = $this->input->post('txtCV',TRUE);
        $ket = $this->input->post('txtKet',TRUE);
        $hub = $this->input->post('txtHub',TRUE);

        for ($i = 0; $i<$row_count; $i++){
            $info = array(
                'HeaderID'      => $this->input->post('txtHeaderID',TRUE),
                'NoKmr'         => $no[$i],
                'TKID'          => $tkid[$i],
                'RegNo'         => $regno[$i],
                'FixNo'         => $fixno[$i],
                'Nama'          => strtoupper($nama[$i]),
                'NIK'           => $nik[$i],
                'Dept'          => strtoupper($dept[$i]),
                'CV'            => strtoupper($cv[$i]),
                'Ket'           => strtoupper($ket[$i]),
                'Hub'           => strtoupper($hub[$i]),
                'UpdatedBy'     => strtoupper($this->session->userdata('nama')),
                'UpdatedDate'   => date('Y-m-d H:i:s')
            );               
            $this->m_penghuni->simpanDtl($info);
        }
           
        $hdrid = $this->input->post('txtHeaderID',TRUE);
            
        $result = $this->m_penghuni->updateHdr($hdrid, $data);
        if (!$result) {
            redirect('penghuni/blokPenghuni'."?id=".$idBlok);
        } else {
            redirect('penghuni/index?msg=failed_edit');
        }        
    }

    function delData(){
        $id = $this->input->get('id');
        $result = $this->m_penghuni->delHdr($id);
        $hasil = $this->m_penghuni->delDtl($id);

        if(!$result && !$hasil){
            redirect('penghuni/index?msg=success_delete');
        }else{
            redirect('penghuni/index?msg=failed_delete');
        }
    }
    
}    