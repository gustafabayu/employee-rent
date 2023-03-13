<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Transaksi extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->model(array('m_transaksi','m_mess'));
        if(!$this->session->userdata('username')){
            redirect('login');
        }
    }
    
    //Bagian Air
    //-----------------------//
    function air() {       
        $periodeaktif = $this->session->userdata('periode');
        $data['periodeaktif'] = $periodeaktif;
        $data['blokMess'] = $this->m_transaksi->blokMess();
        $this->template->display('transaksi/air',$data);
    }
    
    function PeriAir() {
        $periode = $this->input->post('txtPeriode');
        $tgl = date('01/'.$periode);
        $tglawal = add_date_ind(tgl_eng($tgl), -1);
        $periodesebelum = strval(periode($tglawal));
		
        $this->session->set_userdata('periode',$periode);
        $this->session->set_userdata('periodesebelum',$periodesebelum);
        redirect('transaksi/air');
    }
    
    function blokAir() {
        $id = $this->input->get('id');
        $periodesebelum = $this->session->userdata('periodesebelum');
        $data['periodesebelum'] = $periodesebelum;
        $periodeaktif = $this->session->userdata('periode');
        $data['periodeaktif'] = $periodeaktif;
        $data['almtAir'] = $this->m_transaksi->blokAir2($id);
        $data['alamatAir'] = $this->m_transaksi->blokAir($id,$periodesebelum);
	$data['message'] = $this->session->flashdata('message');	
        $this->template->display('transaksi/blokAir',$data);
    }
    
    function add_Air(){
        $id = $this->input->get('id');
        $periodeaktif = $this->session->userdata('periode');
        $data['periodeaktif'] = $periodeaktif;
        $data['getData'] = $this->m_transaksi->blokAir2($id);
        //$data['getBiaya'] = $this->m_transaksi->biayaAir();
        //$data['getMess'] = $this->m_transaksi->dftrMess();
        $data['getFM'] = $this->m_transaksi->dftrFMmess();
        $data['message'] = $this->session->flashdata('message');
        $this->template->display('transaksi/add_Air',$data);
    }
    
//    function add_Air(){
//        $id = $this->input->get('id');
//        $periodeaktif = $this->session->userdata('periode');
//        
//        $getData = $this->m_transaksi->blokAir2($id);        
//        $getMess = $this->m_transaksi->dftrMess();
//                
//        $data = array(                                
//            'message'           => $this->session->flashdata('message'),            
//            'periodeaktif'	=> $periodeaktif,
//            'getData'		=> $getData,
//            'getMess'		=> $getMess,            
//            'txtFlow'           => set_value('txtFlow', '', true),                        
//        );
//        $this->template->display('transaksi/add_Air',$data);
//    }
//    
//    function noFMmess(){
//        if('IS_AJAX') {
//            $txtAlamat = $this->input->post('txtAlamat');
//            $datamess = $this->m_transaksi->dataMess($txtAlamat);
//            $getMess = $this->m_transaksi->dftrMess();
//
//            $data = array(
//                'getMess'           => $getMess,
//                'txtAlamat'         => set_value('txtAlamat', isset($datamess->IDMess) ? $datamess->IDMess : '', true),
//                'txtFlow'           => set_value('txtFlow', isset($datamess->IDFlowMtr) ? $datamess->IDFlowMtr : '', true),
//            );
//            $this->load->view('transaksi/noFMmess', $data);
//        }
//    }
    
    function bebanAir() {
        $id = $this->input->get('id');
        $periodeaktif = $this->session->userdata('periode');
        $data['periodeaktif'] = $periodeaktif;
        $periodesebelum = $this->session->userdata('periodesebelum');
        $data['getData'] = $this->m_transaksi->getinfoFM($id, $periodesebelum);
        $data['message'] = $this->session->flashdata('message');
        $this->template->display('transaksi/bebanAir',$data);       
    }
    
    function tagAir() {
        $id = $this->input->post('txtID',TRUE);
        $idBlok        = $this->input->post('txtIDBlok',TRUE);
        
        $Periode       =$this->input->post('txtPeriode',TRUE);
        $Nomor         =$this->input->post('txtFlow',TRUE);
        $Flow          =$this->input->post('txtBlnIni',TRUE);
        $FlowAwal      =$this->input->post('txtBlnLalu',TRUE);
        $Pemakaian     =$this->input->post('txtTtlBeban',TRUE);
        $PerMeter      =$this->input->post('txtBiayaPer',TRUE);
        $TtlBiaya      =$this->input->post('txtTtlBiaya',TRUE);
        $CreatedBy     =strtoupper($this->session->userdata('nama'));
        $CreatedDate   =date('Y-m-d H:i:s');
        $CreatedStatus =1;
        
        if ($this->cek_tagihanAir($Nomor, $Periode) === 1){
            $pesan = pesan('Maaf Data nomor Flow Meter '.$Nomor.' Periode '.$Periode.' sudah disimpan','warning');
            $this->session->set_flashdata('message',$pesan);
            redirect('transaksi/bebanAir'."?id=".$idBlok);
        }
        
        $this->db->trans_start();
        $this->db->insert('tblTagihanAir',array('Periode'=>$Periode,'Nomor'=>$Nomor,'Flow'=>$Flow,'FlowAwal'=>$FlowAwal,'Pemakaian'=>$Pemakaian,
            'PerMeter'=>$PerMeter,'TtlBiaya'=>$TtlBiaya,'CreatedBy'=>$CreatedBy,'CreatedDate'=>$CreatedDate,'CreatedStatus'=>$CreatedStatus));
        $this->db->trans_complete();  
        
        $this->db->trans_start();
        $this->db->where('ID', strtoupper($id));
        $this->db->update('tblTagihanAir',array('CreatedStatus'=>$CreatedStatus));
        $this->db->trans_complete();
       
        $pesan = pesan('Data berhasil disimpan','success');
        $this->session->set_flashdata('message',$pesan);
        redirect('transaksi/blokAir'."?id=".$idBlok);
        
//        $dataAir= array(
//            'Periode'       =>$this->input->post('txtPeriode',TRUE),
//            'Nomor'         =>$this->input->post('txtFlow',TRUE),
//            'Flow'          =>$this->input->post('txtBlnIni',TRUE),
//            'FlowAwal'      =>$this->input->post('txtBlnLalu',TRUE),
//            'Pemakaian'     =>$this->input->post('txtTtlBeban',TRUE),
//            'PerMeter'      =>$this->input->post('txtBiayaPer',TRUE),
//            'TtlBiaya'      =>$this->input->post('txtTtlBiaya',TRUE),
//            'CreatedBy'     =>strtoupper($this->session->userdata('nama')),
//            'CreatedDate'   =>date('Y-m-d H:i:s'),
//            'CreatedStatus' =>1
//        );        
//        $result = $this->m_transaksi->simpanAir($dataAir);
//        
//        $hdrid = $this->input->post('txtID',TRUE);
//        $info = array('CreatedStatus' =>1);
//        $hasil = $this->m_transaksi->updateAir($hdrid, $info);
//
//        if((!$result)&&(!$hasil)){
//            redirect('transaksi/blokAir'."?id=".$idBlok);
//        }else{
//            redirect('transaksi/air?msg=failed');
//        }
    }
    
    function tagAir2() {
        $idBlok        = $this->input->post('txtIDBlok',TRUE);
        
        $Periode       =$this->input->post('txtPeriode',TRUE);
        $Nomor         =$this->input->post('txtFlow',TRUE);
        $Flow          =$this->input->post('txtBlnIni',TRUE);
        $FlowAwal      =$this->input->post('txtBlnLalu',TRUE);
        $Pemakaian     =$this->input->post('txtTtlBeban',TRUE);
        $PerMeter      =$this->input->post('txtBiayaPer',TRUE);
        $TtlBiaya      =$this->input->post('txtTtlBiaya',TRUE);
        $CreatedBy     =strtoupper($this->session->userdata('nama'));
        $CreatedDate   =date('Y-m-d H:i:s');
        $CreatedStatus =1;
        
        if ($this->cek_tagihanAir($Nomor, $Periode) === 1){
            $pesan = pesan('Maaf Data nomor Flow Meter '.$Nomor.' Periode '.$Periode.' sudah disimpan','warning');
            $this->session->set_flashdata('message',$pesan);
            redirect('transaksi/add_Air'."?id=".$idBlok);
        }
        
        $this->db->trans_start();
        $this->db->insert('tblTagihanAir',array('Periode'=>$Periode,'Nomor'=>$Nomor,'Flow'=>$Flow,'FlowAwal'=>$FlowAwal,'Pemakaian'=>$Pemakaian,
            'PerMeter'=>$PerMeter,'TtlBiaya'=>$TtlBiaya,'CreatedBy'=>$CreatedBy,'CreatedDate'=>$CreatedDate,'CreatedStatus'=>$CreatedStatus));
        $this->db->trans_complete();       
       
        $pesan = pesan('Data berhasil disimpan','success');
        $this->session->set_flashdata('message',$pesan);
        redirect('transaksi/blokAir'."?id=".$idBlok);
        
//        $dataAir= array(
//            'Periode'       =>$this->input->post('txtPeriode',TRUE),
//            'Nomor'         =>$this->input->post('txtFlow',TRUE),
//            'Flow'          =>$this->input->post('txtBlnIni',TRUE),
//            'FlowAwal'      =>$this->input->post('txtBlnLalu',TRUE),
//            'Pemakaian'     =>$this->input->post('txtTtlBeban',TRUE),
//            'PerMeter'      =>$this->input->post('txtBiayaPer',TRUE),
//            'TtlBiaya'      =>$this->input->post('txtTtlBiaya',TRUE),
//            'CreatedBy'     =>strtoupper($this->session->userdata('nama')),
//            'CreatedDate'   =>date('Y-m-d H:i:s'),
//            'CreatedStatus' =>1
//        );        
//        $result = $this->m_transaksi->simpanAir($dataAir);
//                
//        if(!$result){
//            redirect('transaksi/blokAir'."?id=".$idBlok);
//        }else{
//            redirect('transaksi/air?msg=failed');
//        }
    }
    
    function cek_tagihanAir($Nomor, $Periode){
        $query = $this->db->get_where('tblTagihanAir',array('Nomor'=>$Nomor, 'Periode'=>$Periode));
        return $query->num_rows();		
    }
     
    //Bagian Listrik
    //-----------------------//
    function listrik() {     
        $periodeaktif = $this->session->userdata('periode');
        $data['periodeaktif'] = $periodeaktif;
        $data['blokMess'] = $this->m_transaksi->blokMess();
        $this->template->display('transaksi/listrik',$data);                
    }
    
    function PeriList() {
        $periode = $this->input->post('txtPeriode');
        $tgl = date('01/'.$periode);
        $tglawal = add_date_ind(tgl_eng($tgl), -1);
        $periodesebelum = strval(periode($tglawal));
		
        $this->session->set_userdata('periode',$periode);
        $this->session->set_userdata('periodesebelum',$periodesebelum);
        redirect('transaksi/listrik');
    }
    
    function blokList() {
        $id = $this->input->get('id');
        $periodesebelum = $this->session->userdata('periodesebelum');        
        $periodeaktif = $this->session->userdata('periode');
        $data['periodesebelum'] = $periodesebelum;
        $data['periodeaktif'] = $periodeaktif;
        $data['alamatList'] = $this->m_transaksi->blokList($id,$periodesebelum);
	$data['almtList'] = $this->m_transaksi->blokList2($id);
        $data['message'] = $this->session->flashdata('message');
        $this->template->display('transaksi/blokList',$data);
    }
    
    function add_List(){
        $id = $this->input->get('id');
        $periodeaktif = $this->session->userdata('periode');
        $data['periodeaktif'] = $periodeaktif;
        $data['getData'] = $this->m_transaksi->blokList2($id);
//        $data['getBiaya'] = $this->m_transaksi->biayaList();
        //$data['getMess'] = $this->m_transaksi->dftrMess();
        $data['getKM'] = $this->m_transaksi->dftrKMmess();
        $data['message'] = $this->session->flashdata('message');
        $this->template->display('transaksi/add_List',$data);
    }
    
//    function add_List(){
//        $id = $this->input->get('id');
//        $periodeaktif = $this->session->userdata('periode');
        
//        $getData = $this->m_transaksi->blokList2($id);
//        $getMess = $this->m_transaksi->dftrMess();
        
//        $data = array(                                
//            'message'           => $this->session->flashdata('message'),            
//            'periodeaktif'	=> $periodeaktif,
//            'getData'		=> $getData,
//            'getMess'		=> $getMess,            
//            'txtKwh'            => set_value('txtKwh', '', true),                        
//        );
//        $this->template->display('transaksi/add_List',$data);
//    }
    
//    function noKMmess(){
//        if('IS_AJAX') {
//            $txtAlamat = $this->input->post('txtAlamat');
//            $datamess = $this->m_transaksi->dataMess($txtAlamat);
//            $getMess = $this->m_transaksi->dftrMess();
//
//            $data = array(
//                'getMess'           => $getMess,
//                'txtAlamat'         => set_value('txtAlamat', isset($datamess->IDMess) ? $datamess->IDMess : '', true),
//                'txtKwh'            => set_value('txtKwh', isset($datamess->IDKwh) ? $datamess->IDKwh : '', true),
//            );
//            $this->load->view('transaksi/noKMmess', $data);
//        }
//    }
    
    function bebanList() {
        $id = $this->input->get('id');
        $periodeaktif = $this->session->userdata('periode');
        $data['periodeaktif'] = $periodeaktif;
        $periodesebelum = $this->session->userdata('periodesebelum');
        $data['getData'] = $this->m_transaksi->getinfoKM($id,$periodesebelum);
        $data['message'] = $this->session->flashdata('message');
        $this->template->display('transaksi/bebanList',$data);       
    }
    
    function tagList() {        
        $id = $this->input->post('txtID',TRUE);
        $idBlok = $this->input->post('txtIDBlok',TRUE);
        
        $Periode       =$this->input->post('txtPeriode',TRUE);
        $Nomor         =$this->input->post('txtKwh',TRUE);
        $Kwh           =$this->input->post('txtBlnIni',TRUE);
        $KwhAwal       =$this->input->post('txtBlnLalu',TRUE);
        $Pemakaian     =$this->input->post('txtTtlBeban',TRUE);
        $PerMeter      =$this->input->post('txtBiayaPer',TRUE);
        $TtlBiaya      =$this->input->post('txtTtlBiaya',TRUE);
        $CreatedBy     =strtoupper($this->session->userdata('nama'));
        $CreatedDate   =date('Y-m-d H:i:s');
        $CreatedStatus =1;
                
        if ($this->cek_tagihanList($Nomor, $Periode) === 1){
            $pesan = pesan('Maaf Data nomor Kwh Meter '.$Nomor.' Periode '.$Periode.' sudah disimpan','warning');
            $this->session->set_flashdata('message',$pesan);
            redirect('transaksi/bebanList'."?id=".$idBlok);
        }
        
        $this->db->trans_start();
        $this->db->insert('tblTagihanList',array('Periode'=>$Periode,'Nomor'=>$Nomor,'Kwh'=>$Kwh,'KwhAwal'=>$KwhAwal,'Pemakaian'=>$Pemakaian,
            'PerMeter'=>$PerMeter,'TtlBiaya'=>$TtlBiaya,'CreatedBy'=>$CreatedBy,'CreatedDate'=>$CreatedDate,'CreatedStatus'=>$CreatedStatus));
        $this->db->trans_complete();
        
        $this->db->trans_start();
        $this->db->where('ID', strtoupper($id));
        $this->db->update('tblTagihanList',array('CreatedStatus'=>$CreatedStatus));
        $this->db->trans_complete();
       
        $pesan = pesan('Data berhasil disimpan','success');
        $this->session->set_flashdata('message',$pesan);
        redirect('transaksi/blokList'."?id=".$idBlok);
//        $data= array(
//            'Periode'       =>$this->input->post('txtPeriode',TRUE),
//            'Nomor'         =>$this->input->post('txtKwh',TRUE),
//            'Kwh'           =>$this->input->post('txtBlnIni',TRUE),
//            'KwhAwal'       =>$this->input->post('txtBlnLalu',TRUE),
//            'Pemakaian'     =>$this->input->post('txtTtlBeban',TRUE),
//            'PerMeter'      =>$this->input->post('txtBiayaPer',TRUE),
//            'TtlBiaya'      =>$this->input->post('txtTtlBiaya',TRUE),
//            'CreatedBy'     =>strtoupper($this->session->userdata('nama')),
//            'CreatedDate'   =>date('Y-m-d H:i:s'),
//            'CreatedStatus' =>1
//        );        
//        $result = $this->m_transaksi->simpanList($data);
//        
//        $hdrid = $this->input->post('txtID',TRUE);
//        $info = array('CreatedStatus' =>1);
//        $hasil = $this->m_transaksi->updateList($hdrid, $info);
//
//        if((!$result)&&(!$hasil)){
//            redirect('transaksi/blokList'."?id=".$idBlok);
//        }else{
//            redirect('transaksi/blokList?msg=failed');
//        }
    }
    
    function tagList2() {        
        $idBlok = $this->input->post('txtIDBlok',TRUE);
        
        $Periode       =$this->input->post('txtPeriode',TRUE);
        $Nomor         =$this->input->post('txtKwh',TRUE);
        $Kwh           =$this->input->post('txtBlnIni',TRUE);
        $KwhAwal       =$this->input->post('txtBlnLalu',TRUE);
        $Pemakaian     =$this->input->post('txtTtlBeban',TRUE);
        $PerMeter      =$this->input->post('txtBiayaPer',TRUE);
        $TtlBiaya      =$this->input->post('txtTtlBiaya',TRUE);
        $CreatedBy     =strtoupper($this->session->userdata('nama'));
        $CreatedDate   =date('Y-m-d H:i:s');
        $CreatedStatus =1;
        
        if ($this->cek_tagihanList($Nomor, $Periode) === 1){
            $pesan = pesan('Maaf Data nomor Kwh Meter '.$Nomor.' Periode '.$Periode.' sudah disimpan','warning');
            $this->session->set_flashdata('message',$pesan);
            redirect('transaksi/add_List'."?id=".$idBlok);
        }
        
        $this->db->trans_start();
        $this->db->insert('tblTagihanList',array('Periode'=>$Periode,'Nomor'=>$Nomor,'Kwh'=>$Kwh,'KwhAwal'=>$KwhAwal,'Pemakaian'=>$Pemakaian,
            'PerMeter'=>$PerMeter,'TtlBiaya'=>$TtlBiaya,'CreatedBy'=>$CreatedBy,'CreatedDate'=>$CreatedDate,'CreatedStatus'=>$CreatedStatus));
        $this->db->trans_complete();       
                
        $pesan = pesan('Data berhasil disimpan','success');
        $this->session->set_flashdata('message',$pesan);
        redirect('transaksi/blokList'."?id=".$idBlok);
//        $data= array(
//            'Periode'       =>$this->input->post('txtPeriode',TRUE),
//            'Nomor'         =>$this->input->post('txtKwh',TRUE),
//            'Kwh'           =>$this->input->post('txtBlnIni',TRUE),
//            'KwhAwal'       =>$this->input->post('txtBlnLalu',TRUE),
//            'Pemakaian'     =>$this->input->post('txtTtlBeban',TRUE),
//            'PerMeter'      =>$this->input->post('txtBiayaPer',TRUE),
//            'TtlBiaya'      =>$this->input->post('txtTtlBiaya',TRUE),
//            'CreatedBy'     =>strtoupper($this->session->userdata('nama')),
//            'CreatedDate'   =>date('Y-m-d H:i:s'),
//            'CreatedStatus' =>1
//        );        
//        $result = $this->m_transaksi->simpanList($data);
//
//        if(!$result){
//            redirect('transaksi/blokList'."?id=".$idBlok);
//        }else{
//            redirect('transaksi/blokList?msg=failed');
//        }
    }
    
    function cek_tagihanList($Nomor, $Periode){
        $query = $this->db->get_where('tblTagihanList',array('Nomor'=>$Nomor, 'Periode'=>$Periode));
        return $query->num_rows();		
    }
    
}