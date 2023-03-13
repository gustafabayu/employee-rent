<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Penagihan extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->model(array('m_penagihan'));
        if(!$this->session->userdata('username')){
            redirect('login');
        }
    }
    
    function cari_karyawan() {        
        $param = $this->input->post('search');
        if ($param){
            $data['kar'] = $this->m_penagihan->penghuni_search($param);
        } else {
            $data['kar'] = $this->m_penagihan->penghuni_all();
        }
        $this->load->view('penagihan/add_karyawan', $data);
    }
    
    function non_karyawan() {        
        $param = $this->input->post('search');
        if ($param){
            $data['non'] = $this->m_penagihan->non_search($param);
        } else {
            $data['non'] = $this->m_penagihan->non_all();
        }
        $this->load->view('penagihan/non_karyawan', $data);
    }
    
    //Bagian Air
    //-----------------------//
    function air() {
        $blnaktif     = $this->session->userdata('blnaktif');
        $data['blnaktif'] = $blnaktif;
        $data['blokMess'] = $this->m_penagihan->blokMess();
        $this->template->display('penagihan/air',$data);
    }
    
    function periAir() {
        $blnaktif   = $this->input->post('txtPeriode');
        $this->session->set_userdata('blnaktif',$blnaktif);
        redirect('penagihan/air');
    }
    
    function blokAir() {
        $id = $this->input->get('id');
        $blnaktif     = $this->session->userdata('blnaktif');
        $data['blnaktif'] = $blnaktif;
        $data['alamatAir'] = $this->m_penagihan->blokAir($id, $blnaktif);
        $data['alamatAir2'] = $this->m_penagihan->blokAir2($id, $blnaktif);
        $data['almtAir'] = $this->m_penagihan->datafixFM($id);
        $this->template->display('penagihan/blokAir',$data);
    }
    
    function add_Air() {
        $id = $this->input->get('id');
        $blnaktif     = $this->session->userdata('blnaktif');
        $data['blnaktif'] = $blnaktif;
        $data['getData'] = $this->m_penagihan->datafixFM($id);
        $data['getMess'] = $this->m_penagihan->munculAlmtMess();
        $this->template->display('penagihan/add_Air',$data);
    }
            
    function tambahAir() {
        $idBlok = $this->input->post('txtIDBlok',TRUE);
        $data = array(
            //'ID'        => $this->input->post('txtID',TRUE),
            'IDMess'          => $this->input->post('txtAlamat',TRUE),
            //'Nomor'        => $this->input->post('txtFlow',TRUE),
            'Periode'         => $this->input->post('txtPeriode',TRUE),
            //'Pemakaian'     => $this->input->post('txtTtlBeban',TRUE),
            'Biaya'           => $this->input->post('txtTtlBiaya',TRUE),            
            'CreatedBy'       => strtoupper($this->session->userdata('nama')),
            'CreatedDate'     => date('Y-m-d H:i:s'),
            'ApproveStatus'   => 1
        );
        $header_id = $this->m_penagihan->simpanHdrAir($data);
        
        $hitung = count($this->input->post('txtNama'));
        $nama = $this->input->post('txtNama',TRUE);
        $tkid = $this->input->post('txtTKID',TRUE);
        $idmess = $this->input->post('txtIDMess',TRUE);
        $nik = $this->input->post('txtNIK',TRUE);
        $dept = $this->input->post('txtDept',TRUE);
        $cv = $this->input->post('txtCV',TRUE);
        $ket = $this->input->post('txtKet',TRUE);
        $tag = $this->input->post('txtTagihan',TRUE);
        $tung = $this->input->post('txtTunggakan',TRUE);
        $ttl = $this->input->post('txtTotal',TRUE);
        
        for ($i = 0; $i<$hitung; $i++){
            $info = array(
                'HeaderID'      => $header_id,
                'TKID'          => $tkid[$i],
                'IDMess'        => $idmess[$i],
                'Nama'          => strtoupper($nama[$i]),
                'NIK'           => $nik[$i],
                'Dept'          => strtoupper($dept[$i]),
                'CV'            => strtoupper($cv[$i]),
                'Ket'           => strtoupper($ket[$i]),
                'Tagihan'       => strtoupper($tag[$i]),
                'Tunggakan'     => strtoupper($tung[$i]),
                'Total'         => strtoupper($ttl[$i]),
                'CreatedBy'     => strtoupper($this->session->userdata('nama')),
                'CreatedDate'   => date('Y-m-d H:i:s')
            );               
            $this->m_penagihan->simpanDtlAir($info);
        }
        
        if ($header_id) {            
            redirect('penagihan/blokAir'."?id=".$idBlok);
        } else {
            redirect('penagihan/air?msg=failed');
        }
    }
    
    function tagihAir() {
        $id = $this->input->get('id');
        $data['beban_air'] = $this->m_penagihan->bebanTagAir($id);
        $data['hitung'] = count($this->m_penagihan->bebanTagAir($id));
        $data['getData'] = $this->m_penagihan->dataTagAir($id);
        $this->template->display('penagihan/tagihAir',$data);
    }
        
    function simTagAir() {
        $idBlok = $this->input->post('txtIDBlok',TRUE);
        $data = array(
            'ID'              => $this->input->post('txtID',TRUE),
            //'IDMess'        => $this->input->post('txtAlmt',TRUE),
            'Nomor'           => $this->input->post('txtFlow',TRUE),
            'Periode'         => $this->input->post('txtPeriode',TRUE),
            'Pemakaian'       => $this->input->post('txtTtlBeban',TRUE),
            'FlowAwal'        => $this->input->post('txtBebanAwal',TRUE),
            'Flow'            => $this->input->post('txtBebanAkhir',TRUE),
            'Biaya'           => $this->input->post('txtTtlBiaya',TRUE),
            'CreatedBy'       => strtoupper($this->session->userdata('nama')),
            'CreatedDate'     => date('Y-m-d H:i:s'),
            'ApproveStatus'   => 1
        );
        $header_id = $this->m_penagihan->simpanHdrAir($data);
        
        $hitung = count($this->input->post('txtNama'));
        $nama = $this->input->post('txtNama',TRUE);
        $idmess = $this->input->post('txtIDMess',TRUE);
        $tkid = $this->input->post('txtTKID',TRUE);
        $nik = $this->input->post('txtNIK',TRUE);
        $dept = $this->input->post('txtDept',TRUE);
        $cv = $this->input->post('txtCV',TRUE);
        $tag = $this->input->post('txtTagihan',TRUE);
        $tung = $this->input->post('txtTunggakan',TRUE);
        $ttl = $this->input->post('txtTotal',TRUE);
        
        for ($i = 0; $i<$hitung; $i++){
            $info = array(
                'HeaderID'      => $header_id,
                'TKID'          => $tkid[$i],
                'IDMess'        => $idmess[$i],
                'Nama'          => strtoupper($nama[$i]),
                'NIK'           => $nik[$i],
                'Dept'          => strtoupper($dept[$i]),
                'CV'            => strtoupper($cv[$i]),
                'Tagihan'       => strtoupper($tag[$i]),
                'Tunggakan'     => strtoupper($tung[$i]),
                'Total'         => strtoupper($ttl[$i]),
                'CreatedBy'     => strtoupper($this->session->userdata('nama')),
                'CreatedDate'   => date('Y-m-d H:i:s')
            );               
            $this->m_penagihan->simpanDtlAir($info);
        }
        
        if ($header_id) {            
            redirect('penagihan/blokAir'."?id=".$idBlok);
        } else {
            redirect('penagihan/air?msg=failed');
        }
    }
    
    function UpdTagAir() {
        $id = $this->input->get('id');
        $data['beban_air'] = $this->m_penagihan->bebanTagAir2($id);
        $data['hitung'] = count($this->m_penagihan->bebanTagAir2($id));
        $data['getData'] = $this->m_penagihan->dataTagAir($id);
        $this->template->display('penagihan/UpdTagAir',$data);
    }
    
    function updateTagAir() {
        $idBlok = $this->input->post('txtIDBlok',TRUE);
        $data = array(
            //'ID'              => $this->input->post('txtID',TRUE),
            //'IDMess'        => $this->input->post('txtAlmt',TRUE),
            //'Nomor'           => $this->input->post('txtFlow',TRUE),
            //'Periode'         => $this->input->post('txtPeriode',TRUE),
            //'Pemakaian'       => $this->input->post('txtTtlBeban',TRUE),
            'FlowAwal'        => $this->input->post('txtBebanAwal',TRUE),
            'Flow'            => $this->input->post('txtBebanAkhir',TRUE),
            'Biaya'           => $this->input->post('txtTtlBiaya',TRUE),            
            'UpdatedBy'       => strtoupper($this->session->userdata('nama')),
            'UpdatedDate'     => date('Y-m-d H:i:s'),
            //'ApproveStatus'   => 1
        );
        $this->m_penagihan->delAir($this->input->post('txtHeaderID', TRUE));
        //$header_id = $this->m_penagihan->updtHdrAir($data);
        
        $hitung = count($this->input->post('txtNama'));
        $nama = $this->input->post('txtNama',TRUE);
        $tkid = $this->input->post('txtTKID',TRUE);
        $idmess = $this->input->post('txtIDMess',TRUE);
        $nik = $this->input->post('txtNIK',TRUE);
        $dept = $this->input->post('txtDept',TRUE);
        $cv = $this->input->post('txtCV',TRUE);
        $tag = $this->input->post('txtTagihan',TRUE);
        $tung = $this->input->post('txtTunggakan',TRUE);
        $ttl = $this->input->post('txtTotal',TRUE);
        
        for ($i = 0; $i<$hitung; $i++){
            $info = array(
                'HeaderID'      => $this->input->post('txtHeaderID',TRUE),
                'TKID'          => $tkid[$i],
                'IDMess'        => $idmess[$i],
                'Nama'          => strtoupper($nama[$i]),
                'NIK'           => $nik[$i],
                'Dept'          => strtoupper($dept[$i]),
                'CV'            => strtoupper($cv[$i]),
                'Tagihan'       => strtoupper($tag[$i]),
                'Tunggakan'     => strtoupper($tung[$i]),
                'Total'         => strtoupper($ttl[$i]),
                'UpdatedBy'     => strtoupper($this->session->userdata('nama')),
                'UpdatedDate'   => date('Y-m-d H:i:s')
            );               
            $this->m_penagihan->simpanDtlAir($info);
        }
        $hdrid = $this->input->post('txtHeaderID',TRUE);
        $result = $this->m_penagihan->updateHdrAir($hdrid, $data);
        if (!$result) {            
            redirect('penagihan/blokAir'."?id=".$idBlok);
        } else {
            redirect('penagihan/air?msg=failed');
        }
    }
    
    function UpdTagAirNon() {
        $id = $this->input->get('id');
        $data['beban_air'] = $this->m_penagihan->bebanTagAir3($id);
        $data['hitung'] = count($this->m_penagihan->bebanTagAir3($id));
        $data['getData'] = $this->m_penagihan->dataTagAir4($id);
        $this->template->display('penagihan/UpdTagAirNon',$data);
    }
    
    function updateTagAirNon() {
        $idBlok = $this->input->post('txtIDBlok',TRUE);
        $data = array(
            //'ID'              => $this->input->post('txtID',TRUE),
            //'IDMess'        => $this->input->post('txtAlmt',TRUE),
            //'Nomor'           => $this->input->post('txtFlow',TRUE),
            //'Periode'         => $this->input->post('txtPeriode',TRUE),
            //'Pemakaian'       => $this->input->post('txtTtlBeban',TRUE),
            'Biaya'           => $this->input->post('txtTtlBiaya',TRUE),            
            'UpdatedBy'       => strtoupper($this->session->userdata('nama')),
            'UpdatedDate'     => date('Y-m-d H:i:s'),
            //'ApproveStatus'   => 1
        );
        $this->m_penagihan->delAir($this->input->post('txtHeaderID', TRUE));
        //$header_id = $this->m_penagihan->updtHdrAir($data);
        
        $hitung = count($this->input->post('txtNama'));
        $nama = $this->input->post('txtNama',TRUE);
        $tkid = $this->input->post('txtTKID',TRUE);
        $idmess = $this->input->post('txtIDMess',TRUE);
        $nik = $this->input->post('txtNIK',TRUE);
        $dept = $this->input->post('txtDept',TRUE);
        $cv = $this->input->post('txtCV',TRUE);
        $tag = $this->input->post('txtTagihan',TRUE);
        $tung = $this->input->post('txtTunggakan',TRUE);
        $ttl = $this->input->post('txtTotal',TRUE);
        
        for ($i = 0; $i<$hitung; $i++){
            $info = array(
                'HeaderID'      => $this->input->post('txtHeaderID',TRUE),
                'TKID'          => $tkid[$i],
                'IDMess'        => $idmess[$i],
                'Nama'          => strtoupper($nama[$i]),
                'NIK'           => $nik[$i],
                'Dept'          => strtoupper($dept[$i]),
                'CV'            => strtoupper($cv[$i]),
                'Tagihan'       => strtoupper($tag[$i]),
                'Tunggakan'     => strtoupper($tung[$i]),
                'Total'         => strtoupper($ttl[$i]),
                'UpdatedBy'     => strtoupper($this->session->userdata('nama')),
                'UpdatedDate'   => date('Y-m-d H:i:s')
            );               
            $this->m_penagihan->simpanDtlAir($info);
        }
        $hdrid = $this->input->post('txtHeaderID',TRUE);
        $result = $this->m_penagihan->updateHdrAir($hdrid, $data);
        if (!$result) {            
            redirect('penagihan/blokAir'."?id=".$idBlok);
        } else {
            redirect('penagihan/air?msg=failed');
        }
    }
    
    function cekTagAir() {
        $id = $this->input->get('id');
        
        $data['beban_air'] = $this->m_penagihan->bebanTagAir2($id);
        $data['hitung'] = count($this->m_penagihan->bebanTagAir2($id));
        $data['getData'] = $this->m_penagihan->dataTagAir2($id);
        $this->template->display('penagihan/cekTagAir',$data);
    }
    
    function cekTagAirNon() {
        $id = $this->input->get('id');
        
        $data['beban_air'] = $this->m_penagihan->bebanTagAir3($id);
        $data['hitung'] = count($this->m_penagihan->bebanTagAir3($id));
        $data['getData'] = $this->m_penagihan->dataTagAir3($id);
        $this->template->display('penagihan/cekTagAirNon',$data);
    }
    
        
    //Bagian Listrik
    //-----------------------//
    function listrik() {
        $blnaktif     = $this->session->userdata('blnaktif');
        $data['blnaktif'] = $blnaktif;
        $data['blokMess'] = $this->m_penagihan->blokMess();
        $this->template->display('penagihan/listrik',$data);
    }
    
    function periList() {
        $blnaktif   = $this->input->post('txtPeriode');
        $this->session->set_userdata('blnaktif',$blnaktif);
        redirect('penagihan/listrik');
    }
    
    function blokList() {
        $id = $this->input->get('id');
        $blnaktif     = $this->session->userdata('blnaktif');
        $data['blnaktif'] = $blnaktif;
        $data['alamatList'] = $this->m_penagihan->blokList($id, $blnaktif);
        $data['alamatList2'] = $this->m_penagihan->blokList2($id, $blnaktif);
        $data['almtList'] = $this->m_penagihan->datafixKM($id);
        $this->template->display('penagihan/blokList',$data);
    }
    
    function add_List() {
        $id = $this->input->get('id');
        $blnaktif     = $this->session->userdata('blnaktif');
        $data['blnaktif'] = $blnaktif;
        $data['getData'] = $this->m_penagihan->datafixKM($id);
        $data['getMess'] = $this->m_penagihan->munculAlmtMess();
        $this->template->display('penagihan/add_List',$data);
    }    
            
    function tambahList() {
        $idBlok = $this->input->post('txtIDBlok',TRUE);
        $data = array(
            //'ID'        => $this->input->post('txtID',TRUE),
            'IDMess'          => $this->input->post('txtAlamat',TRUE),
            //'Nomor'        => $this->input->post('txtFlow',TRUE),
            'Periode'         => $this->input->post('txtPeriode',TRUE),
            //'Pemakaian'     => $this->input->post('txtTtlBeban',TRUE),
            'Biaya'           => $this->input->post('txtTtlBiaya',TRUE),
            'Denda'           => $this->input->post('txtDenda',TRUE),
            'CreatedBy'       => strtoupper($this->session->userdata('nama')),
            'CreatedDate'     => date('Y-m-d H:i:s'),
            'ApproveStatus'   => 1
        );
        $header_id = $this->m_penagihan->simpanHdrList($data);
        
        $hitung = count($this->input->post('txtNama'));
        $nama = $this->input->post('txtNama',TRUE);
        $tkid = $this->input->post('txtTKID',TRUE);
        $idmess = $this->input->post('txtIDMess',TRUE);
        $nik = $this->input->post('txtNIK',TRUE);
        $dept = $this->input->post('txtDept',TRUE);
        $cv = $this->input->post('txtCV',TRUE);
        $ket = $this->input->post('txtKet',TRUE);
        $tag = $this->input->post('txtTagihan',TRUE);
        $tung = $this->input->post('txtTunggakan',TRUE);
        $ttl = $this->input->post('txtTotal',TRUE);
        
        for ($i = 0; $i<$hitung; $i++){
            $info = array(
                'HeaderID'      => $header_id,
                'TKID'          => $tkid[$i],
                'IDMess'        => $idmess[$i],
                'Nama'          => strtoupper($nama[$i]),
                'NIK'           => $nik[$i],
                'Dept'          => strtoupper($dept[$i]),
                'CV'            => strtoupper($cv[$i]),
                'Ket'           => strtoupper($ket[$i]),
                'Tagihan'       => strtoupper($tag[$i]),
                'Tunggakan'     => strtoupper($tung[$i]),
                'Total'         => strtoupper($ttl[$i]),
                'CreatedBy'     => strtoupper($this->session->userdata('nama')),
                'CreatedDate'   => date('Y-m-d H:i:s')
            );               
            $this->m_penagihan->simpanDtlList($info);
        }
        
        if ($header_id) {            
            redirect('penagihan/blokList'."?id=".$idBlok);
        } else {
            redirect('penagihan/listrik?msg=failed');
        }
    }
    
    function tagihList() {
        $id = $this->input->get('id');
        
        $data['beban_list'] = $this->m_penagihan->bebanTagList($id);
        $data['hitung'] = count($this->m_penagihan->bebanTagList($id));
        $data['getData'] = $this->m_penagihan->dataTagList($id);
        $this->template->display('penagihan/tagihList',$data);
    }
    
    function simTagList() {
        $idBlok = $this->input->post('txtIDBlok',TRUE);
        $data = array(
            'ID'            => $this->input->post('txtID',TRUE),
            //'IDMess'        => $this->input->post('txtAlmt',TRUE),
            'Nomor'         => $this->input->post('txtKwh',TRUE),
            'Periode'       => $this->input->post('txtPeriode',TRUE),
            'Pemakaian'     => $this->input->post('txtTtlBeban',TRUE),
            'KwhAwal'       => $this->input->post('txtBebanAwal',TRUE),
            'Kwh'           => $this->input->post('txtBebanAkhir',TRUE),
            'Biaya'         => $this->input->post('txtTtlBiaya',TRUE),
            'Denda'         => $this->input->post('txtDenda',TRUE),
            'CreatedBy'     => strtoupper($this->session->userdata('nama')),
            'CreatedDate'   => date('Y-m-d H:i:s'),
            'ApproveStatus' => 1
        );
        $header_id = $this->m_penagihan->simpanHdrList($data);
        
        $hitung = count($this->input->post('txtNama'));
        $nama = $this->input->post('txtNama',TRUE);
        $tkid = $this->input->post('txtTKID',TRUE);
        $idmess = $this->input->post('txtIDMess',TRUE);
        $nik = $this->input->post('txtNIK',TRUE);
        $dept = $this->input->post('txtDept',TRUE);
        $cv = $this->input->post('txtCV',TRUE);
        $tag = $this->input->post('txtTagihan',TRUE);
        $tung = $this->input->post('txtTunggakan',TRUE);
        $ttl = $this->input->post('txtTotal',TRUE);
        
        for ($i = 0; $i<$hitung; $i++){
            $info = array(
                'HeaderID'      => $header_id,
                'TKID'          => $tkid[$i],
                'IDMess'        => $idmess[$i],
                'Nama'          => strtoupper($nama[$i]),
                'NIK'           => $nik[$i],
                'Dept'          => strtoupper($dept[$i]),
                'CV'            => strtoupper($cv[$i]),
                'Tagihan'       => strtoupper($tag[$i]),
                'Tunggakan'     => strtoupper($tung[$i]),
                'Total'         => strtoupper($ttl[$i]),
                'CreatedBy'     => strtoupper($this->session->userdata('nama')),
                'CreatedDate'   => date('Y-m-d H:i:s')
            );               
            $this->m_penagihan->simpanDtlList($info);
        }
        
        if ($header_id) {            
            redirect('penagihan/blokList'."?id=".$idBlok);
        } else {
            redirect('penagihan/listrik?msg=failed');
        }
    }
    
    function UpdTagList() {
        $id = $this->input->get('id');
        $data['beban_list'] = $this->m_penagihan->bebanTagList2($id);
        $data['hitung'] = count($this->m_penagihan->bebanTagList2($id));
        $data['getData'] = $this->m_penagihan->dataTagList($id);
        $this->template->display('penagihan/UpdTagList',$data);
    }
    
    function updateTagList() {
        $idBlok = $this->input->post('txtIDBlok',TRUE);
        $data = array(
            //'ID'              => $this->input->post('txtID',TRUE),
            //'IDMess'        => $this->input->post('txtAlmt',TRUE),
            //'Nomor'           => $this->input->post('txtFlow',TRUE),
            //'Periode'         => $this->input->post('txtPeriode',TRUE),
            //'Pemakaian'       => $this->input->post('txtTtlBeban',TRUE),
            'KwhAwal'       => $this->input->post('txtBebanAwal',TRUE),
            'Kwh'           => $this->input->post('txtBebanAkhir',TRUE),
            'Biaya'           => $this->input->post('txtTtlBiaya',TRUE),
            'Denda'           => $this->input->post('txtDenda',TRUE),
            'UpdatedBy'       => strtoupper($this->session->userdata('nama')),
            'UpdatedDate'     => date('Y-m-d H:i:s'),
            //'ApproveStatus'   => 1
        );
        $this->m_penagihan->delList($this->input->post('txtHeaderID', TRUE));
        //$header_id = $this->m_penagihan->updtHdrAir($data);
        
        $hitung = count($this->input->post('txtNama'));
        $nama = $this->input->post('txtNama',TRUE);
        $tkid = $this->input->post('txtTKID',TRUE);
        $idmess = $this->input->post('txtIDMess',TRUE);
        $nik = $this->input->post('txtNIK',TRUE);
        $dept = $this->input->post('txtDept',TRUE);
        $cv = $this->input->post('txtCV',TRUE);
        $tag = $this->input->post('txtTagihan',TRUE);
        $tung = $this->input->post('txtTunggakan',TRUE);
        $ttl = $this->input->post('txtTotal',TRUE);
        
        for ($i = 0; $i<$hitung; $i++){
            $info = array(
                'HeaderID'      => $this->input->post('txtHeaderID',TRUE),
                'TKID'          => $tkid[$i],
                'IDMess'        => $idmess[$i],
                'Nama'          => strtoupper($nama[$i]),
                'NIK'           => $nik[$i],
                'Dept'          => strtoupper($dept[$i]),
                'CV'            => strtoupper($cv[$i]),
                'Tagihan'       => strtoupper($tag[$i]),
                'Tunggakan'     => strtoupper($tung[$i]),
                'Total'         => strtoupper($ttl[$i]),
                'UpdatedBy'     => strtoupper($this->session->userdata('nama')),
                'UpdatedDate'   => date('Y-m-d H:i:s')
            );               
            $this->m_penagihan->simpanDtlList($info);
        }
        $hdrid = $this->input->post('txtHeaderID',TRUE);
        $result = $this->m_penagihan->updateHdrList($hdrid, $data);
        if (!$result) {            
            redirect('penagihan/blokList'."?id=".$idBlok);
        } else {
            redirect('penagihan/air?msg=failed');
        }
    }
    
    function UpdTagListNon() {
        $id = $this->input->get('id');
        $data['beban_list'] = $this->m_penagihan->bebanTagList3($id);
        $data['hitung'] = count($this->m_penagihan->bebanTagList3($id));
        $data['getData'] = $this->m_penagihan->dataTagList4($id);
        $this->template->display('penagihan/UpdTagListNon',$data);
    }
    
    function updateTagListNon() {
        $idBlok = $this->input->post('txtIDBlok',TRUE);
        $data = array(
            //'ID'              => $this->input->post('txtID',TRUE),
            //'IDMess'        => $this->input->post('txtAlmt',TRUE),
            //'Nomor'           => $this->input->post('txtFlow',TRUE),
            //'Periode'         => $this->input->post('txtPeriode',TRUE),
            //'Pemakaian'       => $this->input->post('txtTtlBeban',TRUE),
            'Biaya'           => $this->input->post('txtTtlBiaya',TRUE),
            'Denda'           => $this->input->post('txtDenda',TRUE),
            'UpdatedBy'       => strtoupper($this->session->userdata('nama')),
            'UpdatedDate'     => date('Y-m-d H:i:s'),
            //'ApproveStatus'   => 1
        );
        $this->m_penagihan->delList($this->input->post('txtHeaderID', TRUE));
        //$header_id = $this->m_penagihan->updtHdrAir($data);
        
        $hitung = count($this->input->post('txtNama'));
        $nama = $this->input->post('txtNama',TRUE);
        $idmess = $this->input->post('txtIDMess',TRUE);
        $tkid = $this->input->post('txtTKID',TRUE);
        $nik = $this->input->post('txtNIK',TRUE);
        $dept = $this->input->post('txtDept',TRUE);
        $cv = $this->input->post('txtCV',TRUE);
        $tag = $this->input->post('txtTagihan',TRUE);
        $tung = $this->input->post('txtTunggakan',TRUE);
        $ttl = $this->input->post('txtTotal',TRUE);
        
        for ($i = 0; $i<$hitung; $i++){
            $info = array(
                'HeaderID'      => $this->input->post('txtHeaderID',TRUE),
                'TKID'          => $tkid[$i],
                'IDMess'        => $idmess[$i],
                'Nama'          => strtoupper($nama[$i]),
                'NIK'           => $nik[$i],
                'Dept'          => strtoupper($dept[$i]),
                'CV'            => strtoupper($cv[$i]),
                'Tagihan'       => strtoupper($tag[$i]),
                'Tunggakan'     => strtoupper($tung[$i]),
                'Total'         => strtoupper($ttl[$i]),
                'UpdatedBy'     => strtoupper($this->session->userdata('nama')),
                'UpdatedDate'   => date('Y-m-d H:i:s')
            );               
            $this->m_penagihan->simpanDtlList($info);
        }
        $hdrid = $this->input->post('txtHeaderID',TRUE);
        $result = $this->m_penagihan->updateHdrList($hdrid, $data);
        if (!$result) {            
            redirect('penagihan/blokList'."?id=".$idBlok);
        } else {
            redirect('penagihan/air?msg=failed');
        }
    }
    
    function cekTagList() {
        $id = $this->input->get('id');
        
        $data['beban_list'] = $this->m_penagihan->bebanTagList2($id);
        $data['hitung'] = count($this->m_penagihan->bebanTagList2($id));
        $data['getData'] = $this->m_penagihan->dataTagList2($id);
        $this->template->display('penagihan/cekTagList',$data);
    }
    
    function cekTagListNon() {
        $id = $this->input->get('id');
        
        $data['beban_list'] = $this->m_penagihan->bebanTagList3($id);
        $data['hitung'] = count($this->m_penagihan->bebanTagList3($id));
        $data['getData'] = $this->m_penagihan->dataTagList3($id);
        $this->template->display('penagihan/cekTagListNon',$data);
    }
}