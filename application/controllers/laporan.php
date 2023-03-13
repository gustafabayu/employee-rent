<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Laporan extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->model(array('m_laporan'));
        if(!$this->session->userdata('username')){
            redirect('login');
        }
    }
    
    //Bagian Air
    //-----------------------//
    function air() {        
        $blnAwal     = $this->session->userdata('blnAwal');        
        $blnAkhir    = $this->session->userdata('blnAkhir');
        $data['blnAwal'] = $blnAwal;
        $data['blnAkhir'] = $blnAkhir;
        $data['blokMess'] = $this->m_laporan->blokMess();
        $this->template->display('laporan/air',$data);
    }
    
    function cariBlnAir() {
        $blnAwal    = $this->input->post('txtBlnAwal');        
        $blnakhir   = $this->input->post('txtBlnAkhir');
        $this->session->set_userdata('blnAwal',$blnAwal);
        $this->session->set_userdata('blnAkhir',$blnakhir);
        redirect('laporan/air');
    }
    
    function blokAir() {
        $id = $this->input->get('id');
        $blnAwal     = $this->session->userdata('blnAwal');        
        $blnAkhir    = $this->session->userdata('blnAkhir');
        $data['blnAwal'] = $blnAwal;
        $data['blnAkhir'] = $blnAkhir;
        $data['alamatAir'] = $this->m_laporan->blokAir($id, $blnAwal, $blnAkhir);
	$data['alamatAir2'] = $this->m_laporan->blokAir2($id, $blnAwal, $blnAkhir);
        $this->template->display('laporan/blokAir',$data);
    }
    
    function lapAir() {
        $id = $this->input->get('id');
        $data['getData1'] = $this->m_laporan->datacekFM($id);
        $data['getData2'] = $this->m_laporan->dataappFM($id);
        $this->template->display('laporan/lapAir',$data);       
    }
    
    function appAir1() {
        if($this->input->post('Submit') == 'Approve'){
            $idBlok = $this->input->post('txtIDBlok',TRUE);
            $id = $this->input->post('chkID',TRUE);
            $jmlh  = count($id);
            for($i=0; $i<$jmlh; $i++){
                $data   = array(
                    'CheckBy'       =>strtoupper($this->session->userdata('nama')),
                    'CheckDate'     =>date('Y-m-d H:i:s'),
                    'CheckStatus'   =>1
                ); 
                $this->m_laporan->updtCekAir($id[$i],$data);
            }
        }
        redirect('laporan/blokAir'."?id=".$idBlok);
    }
    
    function appAir2() {
        if($this->input->post('Submit') == 'Approve'){
            $idBlok = $this->input->post('txtIDBlok',TRUE);
            $id = $this->input->post('chkID',TRUE);
            $jmlh  = count($id);
            for($i=0; $i<$jmlh; $i++){
                $data   = array(
                    'ApproveBy'       =>strtoupper($this->session->userdata('nama')),
                    'ApproveDate'     =>date('Y-m-d H:i:s'),
                    'ApproveStatus'   =>1,
                    'CreatedStatus'   =>0
                ); 
                $this->m_laporan->updtAppAir($id[$i],$data);
            }
        }
        redirect('laporan/blokAir'."?id=".$idBlok);
    }
            
    function checkAir() {
        $idBlok = $this->input->post('txtIDBlok',TRUE);
        $id= $this->input->post('txtID',TRUE);
        $dataAir= array(
            'Periode'       =>$this->input->post('txtPeriode',TRUE),
            'Nomor'         =>$this->input->post('txtFlow',TRUE),
            'Flow'          =>$this->input->post('txtBlnIni',TRUE),
            'FlowAwal'      =>$this->input->post('txtBlnLalu',TRUE),
            'Pemakaian'     =>$this->input->post('txtTtlBeban',TRUE),
            'PerMeter'      =>$this->input->post('txtBiayaPer',TRUE),
            'TtlBiaya'      =>$this->input->post('txtTtlBiaya',TRUE),
            'Ket'           =>$this->input->post('txtKet',TRUE),
            'CheckBy'       =>strtoupper($this->session->userdata('nama')),
            'CheckDate'     =>date('Y-m-d H:i:s'),
            'CheckStatus'   =>1
        );        
        $result = $this->m_laporan->updateCekAir($id,$dataAir);

        if(!$result){
            redirect('laporan/blokAir'."?id=".$idBlok);
        }else{
            redirect('laporan/air?msg=failed_edit');
        }
    }
    
    function approveAir() {
        if($this->input->post('Submit') == 'Simpan'){
            $idBlok = $this->input->post('txtIDBlok',TRUE);
            $id2= $this->input->post('txtID',TRUE);
            $dataAir2= array(                
                'Ket'             =>$this->input->post('txtKet',TRUE),
                'ApproveBy'       =>strtoupper($this->session->userdata('nama')),
                'ApproveDate'     =>date('Y-m-d H:i:s'),
                'ApproveStatus'   =>1,
                'CreatedStatus'   =>0
            );        
            $result=$this->m_laporan->updateAppAir($id2,$dataAir2);
            
            if(!$result){
                redirect('laporan/blokAir'."?id=".$idBlok);
            }else{
                redirect('laporan/air?msg=failed_edit');
            }
        }elseif($this->input->post('Submit') == 'Tolak'){
            $idBlok = $this->input->post('txtIDBlok',TRUE);
            $id2= $this->input->post('txtID',TRUE);
            $dataAir2= array(                
                'Ket'           =>$this->input->post('txtKet',TRUE),
                'CheckStatus'   =>0
            );        
            $result=$this->m_laporan->updateAppAir($id2,$dataAir2);
            
            if(!$result){
                redirect('laporan/blokAir'."?id=".$idBlok);
            }else{
                redirect('laporan/air?msg=failed_tolak');
            }
        }        
    }       
    
    //Bagian Listrik
    //-----------------------//
    function listrik() {        
        $blnAwal     = $this->session->userdata('blnAwal');        
        $blnAkhir    = $this->session->userdata('blnAkhir');
        $data['blnAwal'] = $blnAwal;
        $data['blnAkhir'] = $blnAkhir;
        $data['blokMess'] = $this->m_laporan->blokMess();
        $this->template->display('laporan/listrik',$data);
    }
    
    function cariBlnList() {
        $blnAwal    = $this->input->post('txtBlnAwal');        
        $blnakhir   = $this->input->post('txtBlnAkhir');
        $this->session->set_userdata('blnAwal',$blnAwal);
        $this->session->set_userdata('blnAkhir',$blnakhir);
        redirect('laporan/listrik');
    }
    
    function blokList() {
        $id = $this->input->get('id');
        $blnAwal     = $this->session->userdata('blnAwal');        
        $blnAkhir    = $this->session->userdata('blnAkhir');
        $data['blnAwal'] = $blnAwal;
        $data['blnAkhir'] = $blnAkhir;
        $data['alamatList'] = $this->m_laporan->blokList($id, $blnAwal, $blnAkhir);
	$data['alamatList2'] = $this->m_laporan->blokList2($id, $blnAwal, $blnAkhir);
        $this->template->display('laporan/blokList',$data);
    }
    
    function lapList() {
        $id = $this->input->get('id');
        $data['getData1'] = $this->m_laporan->datacekKM($id);
        $data['getData2'] = $this->m_laporan->dataappKM($id);
        $this->template->display('laporan/lapList',$data);       
    }
    
    function appList1() {
        if($this->input->post('Submit') == 'Approve'){
            $idBlok = $this->input->post('txtIDBlok',TRUE);
            $id = $this->input->post('chkID',TRUE);
            $jmlh  = count($id);
            for($i=0; $i<$jmlh; $i++){
                $data   = array(
                    'CheckBy'       =>strtoupper($this->session->userdata('nama')),
                    'CheckDate'     =>date('Y-m-d H:i:s'),
                    'CheckStatus'   =>1
                ); 
                $this->m_laporan->updtCekList($id[$i],$data);
            }
        }
        redirect('laporan/blokList'."?id=".$idBlok);
    }
    
    function appList2() {
        if($this->input->post('Submit') == 'Approve'){
            $idBlok = $this->input->post('txtIDBlok',TRUE);
            $id = $this->input->post('chkID',TRUE);
            $jmlh  = count($id);
            for($i=0; $i<$jmlh; $i++){
                $data   = array(
                    'ApproveBy'       =>strtoupper($this->session->userdata('nama')),
                    'ApproveDate'     =>date('Y-m-d H:i:s'),
                    'ApproveStatus'   =>1,
                    'CreatedStatus'   =>0
                ); 
                $this->m_laporan->updtAppList($id[$i],$data);
            }
        }
        redirect('laporan/blokList'."?id=".$idBlok);
    }
    
    function checkList() {
        $idBlok = $this->input->post('txtIDBlok',TRUE);
        $id= $this->input->post('txtID',TRUE);
        $dataList= array(
            'Periode'       =>$this->input->post('txtPeriode',TRUE),
            'Nomor'         =>$this->input->post('txtKwh',TRUE),
            'Kwh'           =>$this->input->post('txtBlnIni',TRUE),
            'KwhAwal'       =>$this->input->post('txtBlnLalu',TRUE),
            'Pemakaian'     =>$this->input->post('txtTtlBeban',TRUE),
            'PerMeter'      =>$this->input->post('txtBiayaPer',TRUE),
            'TtlBiaya'      =>$this->input->post('txtTtlBiaya',TRUE),
            'Denda'         =>$this->input->post('txtDenda',TRUE),
            'Ket'           =>$this->input->post('txtKet',TRUE),
            'CheckBy'       =>strtoupper($this->session->userdata('nama')),
            'CheckDate'     =>date('Y-m-d H:i:s'),
            'CheckStatus'   =>1
        );        
        $result = $this->m_laporan->updateCekList($id,$dataList);

        if(!$result){
            redirect('laporan/blokList'."?id=".$idBlok);
        }else{
            redirect('laporan/listrik?msg=failed_edit');
        }
    }      
    
    function approveList() {
        if($this->input->post('Submit') == 'Simpan'){
            $idBlok = $this->input->post('txtIDBlok',TRUE);
            $id2= $this->input->post('txtID',TRUE);
            $dataList2= array(                
                'Ket'             =>$this->input->post('txtKet',TRUE),
                'ApproveBy'       =>strtoupper($this->session->userdata('nama')),
                'ApproveDate'     =>date('Y-m-d H:i:s'),
                'ApproveStatus'   =>1,
                'CreatedStatus'   =>0
            );        
            $result=$this->m_laporan->updateAppList($id2,$dataList2);
            
            if(!$result){
                redirect('laporan/blokList'."?id=".$idBlok);
            }else{
                redirect('laporan/listrik?msg=failed_edit');
            }
        }elseif($this->input->post('Submit') == 'Tolak'){
            $idBlok = $this->input->post('txtIDBlok',TRUE);
            $id2= $this->input->post('txtID',TRUE);
            $dataList2= array(                
                'Ket'           =>$this->input->post('txtKet'),
                'CheckStatus'   =>0
            );        
            $result=$this->m_laporan->updateAppList($id2,$dataList2);
            
            if(!$result){
                redirect('laporan/blokList'."?id=".$idBlok);
            }else{
                redirect('laporan/listrik?msg=failed_tolak');
            }
        }        
    }
}