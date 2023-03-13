<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cetak extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->model(array('m_cetak'));
        if(!$this->session->userdata('username')){
            redirect('login');
        }
    }
    
    function index() {
        $data['alamatMess'] = $this->m_cetak->blokMess();
        $this->template->display('cetak/index',$data);
    }
    
    function blokMess() {
        $perKwitansi     = $this->session->userdata('perKwitansi');
        $data['perKwitansi'] = $perKwitansi;
        $id = $this->input->get('id');
        $data['getData'] = $this->m_cetak->blokMess2($id);
        $data['getMess'] = $this->m_cetak->MessKaryawan($id);
        //$data['almtMess'] = $this->m_mess->dataMess($id);
        $this->template->display('cetak/blokMess',$data);
    }
    
    function PeriKwitansi() {
        $idBlok = $this->input->post('txtIDBlok',TRUE);
        $perKwitansi   = $this->input->post('txtPeriode');
        $this->session->set_userdata('perKwitansi',$perKwitansi);
        redirect('cetak/blokMess'."?id=".$idBlok);
    }
    
    function inputKwitansi() {
        $perKwitansi     = $this->session->userdata('perKwitansi');
        $data['perKwitansi'] = $perKwitansi;
        $id = $this->input->get('id');
        $data['getHdr'] = $this->m_cetak->hdrMess($id);
        $data['cetakTagih'] = $this->m_cetak->tagihMess($id);
        $data['TagihList'] = $this->m_cetak->TagihList($id, $perKwitansi);
        $data['TagihAir'] = $this->m_cetak->TagihAir($id, $perKwitansi);
        $this->template->display('cetak/inputKwitansi',$data);
    }
    
    function simKwitansi() {
        $idBlok = $this->input->post('txtIDBlok',TRUE);
        $data = array(
            'IDMess'        => $this->input->post('txtIDMess',TRUE),
            'IDBlok'        => $this->input->post('txtIDBlok',TRUE),
            'Tanggal'       => $this->input->post('txtTanggal',TRUE),
            'Nomor'         => $this->input->post('txtNomor',TRUE),
            'BulanTgh'      => $this->input->post('txtBlnTagih',TRUE),
            'NomorFM'       => $this->input->post('txtNomorFM',TRUE),
            'FlowAwal'      => $this->input->post('txtFMAwal',TRUE),
            'FlowAkhir'     => $this->input->post('txtFMAkhir',TRUE),
            'PakaiAir'      => $this->input->post('txtPakaiFM',TRUE),
            'BiayaPerAir'   => $this->input->post('txtBiayaFM',TRUE),
            'TtlBiayaAir'   => $this->input->post('txtTotalFM',TRUE),
            'NomorKM'       => $this->input->post('txtNomorKM',TRUE),
            'KwhAwal'       => $this->input->post('txtKMAwal',TRUE),
            'KwhAkhir'      => $this->input->post('txtKMAkhir',TRUE),
            'PakaiList'     => $this->input->post('txtPakaiKM',TRUE),
            'BiayaPerList'  => $this->input->post('txtBiayaKM',TRUE),
            'TtlBiayaList'  => $this->input->post('txtTotalKM',TRUE),
            'Lain'          => $this->input->post('txtLain',TRUE),
            'Tunggakan'     => $this->input->post('txtTunggakan',TRUE),
            'JmlBayar'      => $this->input->post('txtJmlBayar',TRUE),
            'CreatedBy'     => strtoupper($this->session->userdata('nama')),
            'CreatedDate'   => date('Y-m-d H:i:s')           
        );
        $header_id = $this->m_cetak->kwitansiHdr($data);
        
        $hitung = count($this->input->post('txtNama'));
        $nama = $this->input->post('txtNama',TRUE);
        $almt = $this->input->post('txtAlamat',TRUE);
        $dept = $this->input->post('txtDept',TRUE);
        $cv = $this->input->post('txtCV',TRUE);
        $ket = $this->input->post('txtKet',TRUE);
//        $CreatedBy     =strtoupper($this->session->userdata('nama'));
//        $CreatedDate   =date('Y-m-d H:i:s');
        
        for ($i = 0; $i<$hitung; $i++){
            $info = array(
                'HeaderID'      => $header_id,
                'Nama'          => strtoupper($nama[$i]),
                'Alamat'        => $almt[$i],
                'Dept'          => strtoupper($dept[$i]),
                'CV'            => strtoupper($cv[$i]),
                'Ket'           => strtoupper($ket[$i]),
                'CreatedBy'     => strtoupper($this->session->userdata('nama')),
                'CreatedDate'   => date('Y-m-d H:i:s')
            );               
            $this->m_cetak->kwitansiDtl($info);
            
//            if ($this->cek_kwitansi($nama, $almt) === 1){
//            $pesan = pesan('Maaf kwitansi dengan nama '.$nama.' alamat '.$almt.' sudah tercetak','warning');
//            $this->session->set_flashdata('message',$pesan);
//            redirect('cetak/inputKwitansi'."?id=".$idBlok);
//            }
//
//            $this->db->trans_start();
//            $this->db->insert('tblCtkKwitansiDtl',array('HeaderID'=>$header_id,'Nama'=>strtoupper($nama[$i]),'Alamat'=>$almt[$i],'Dept'=>strtoupper($dept[$i]),'CV'=>strtoupper($cv[$i]),'Ket'=>strtoupper($ket[$i]),'CreatedBy'=>$CreatedBy,'CreatedDate'=>$CreatedDate));
//            $this->db->trans_complete();
        }
        
        if ($header_id) {            
            redirect('cetak/blokMess'."?id=".$idBlok);
        } else {
            redirect('cetak/index?msg=failed');
        }
    }
    
//    function cek_kwitansi($nama, $almt){
//        $hitung = count($this->input->post('txtNama'));
//        for ($i = 0; $i<$hitung; $i++){
//        $query = $this->db->get_where('tblCtkKwitansiDtl',array('Nama'=>$nama[$i],'Alamat'=>$almt[$i]));
//        return $query->num_rows();
//        }
//    }
    
    //bagian print kwitansi
    function kwitansi() {
        $lihatKwitansi     = $this->session->userdata('lihatKwitansi');
        $data['lihatKwitansi'] = $lihatKwitansi;
        $data['alamatMess'] = $this->m_cetak->blokMess();
        $this->template->display('cetak/kwitansi',$data);
    }
    
    function lihatKwitansi() {
        //$idBlok = $this->input->post('txtIDBlok',TRUE);
        $lihatKwitansi   = $this->input->post('txtPeriode');
        $this->session->set_userdata('lihatKwitansi',$lihatKwitansi);
        redirect('cetak/kwitansi');
    }
    
    function blokMess2() {
        $lihatKwitansi     = $this->session->userdata('lihatKwitansi');
        $data['lihatKwitansi'] = $lihatKwitansi;
        $id = $this->input->get('id');
        $data['getData'] = $this->m_cetak->blokMess2($id);
        $data['getMess'] = $this->m_cetak->kwitansiMess($id,$lihatKwitansi);
        //$data['almtMess'] = $this->m_mess->dataMess($id);
        $this->template->display('cetak/blokMess2',$data);
    }
    
    function printKwitansi() {
        $id = $this->input->get('id');
        $data['getData'] = $this->m_cetak->dataKwitansi($id);
        //$data['tghnList'] = $this->m_cetak->dataList($id);
        $this->template->display('cetak/printKwitansi',$data);
    }
    
    function delKwitansi(){
        //$idBlok = $this->input->post('txtIDBlok',TRUE);
        $id = $this->input->get('id');        
        $result = $this->m_cetak->delKwitansiHdr($id);
        $hasil = $this->m_cetak->delKwitansiDtl($id);
        if((!$result)&&(!$hasil)){
            //redirect('cetak/blokMess'."?id=".$idBlok);
            redirect('cetak/kwitansi?msg=success');
        }else{
            redirect('cetak/kwitansi?msg=failed');
        }
    }
    
//    public function downloadExcel(){
//        //load librarynya terlebih dahulu
//        //jika digunakan terus menerus lebih baik load ini ditaruh di auto load
//        $this->load->library("Excel/Classes/PHPExcel");
//
//        //membuat objek PHPExcel
//        $objPHPExcel = new PHPExcel();
//
//        //set Sheet yang akan diolah 
//        $objPHPExcel->setActiveSheetIndex(0)
//                //mengisikan value pada tiap-tiap cell, A1 itu alamat cellnya 
//                //Hello merupakan isinya
//                                    ->setCellValue('A1', 'Hello')
//                                    ->setCellValue('B2', 'Ini')
//                                    ->setCellValue('C1', 'Excel')
//                                    ->setCellValue('D2', 'Pertamaku');
//        //set title pada sheet (me rename nama sheet)
//        $objPHPExcel->getActiveSheet()->setTitle('Excel Pertama');
//
//        //mulai menyimpan excel format xlsx, kalau ingin xls ganti Excel2007 menjadi Excel5          
//        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
//
//        //sesuaikan headernya 
//        header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
//        header("Cache-Control: no-store, no-cache, must-revalidate");
//        header("Cache-Control: post-check=0, pre-check=0", false);
//        header("Pragma: no-cache");
//        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
//        //ubah nama file saat diunduh
//        header('Content-Disposition: attachment;filename="kwitansiExcel.xlsx"');
//        //unduh file
//        $objWriter->save("php://output");
//
//        //Mulai dari create object PHPExcel itu ada dokumentasi lengkapnya di PHPExcel, 
//        // Folder Documentation dan Example
//        // untuk belajar lebih jauh mengenai PHPExcel silakan buka disitu
//
//    }
}