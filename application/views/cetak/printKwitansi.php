<?php
if (isset($_GET['xls'])) {
    header("Cache-Control: no-cache, no-store, must-revalidate");
    header("Content-Type: application/vnd.ms-excel");
    header("Content-Disposition: attachment; filename=Kwitansi.xls");
}
?>
<html>
    <head>
        <title></title>
        <script language="Javascript1.2">
            <!--
          function printpage() {
                window.print();
              //  window.close();
            }
            //-->
        </script>
        <style type="text/css">
            #cetak {
/*                width: 29.7cm;*/
                width: 28.7cm;
                height: 18cm;
/*                width: 39.3cm;
                height: 20.6cm;*/
                padding: 1px;
                margin-right: auto;
                margin-left: auto;
/*                margin-top: 1.5px;
                margin-bottom: 1.5px;*/

            }
            td {
                font-family: Tahoma;
                padding: 1px;
                font-size: 13px;
                background-color: #FFF;
                font-weight: normal;
                border: 1px solid #000;
            }
            th {
                font-family: Tahoma;
                font-weight: bold;
                font-size: 13px;
                background-color: #FFF;
                padding: 1px;
                border: 1px solid #000;
            }
            table {
                background-color: #FFF;
                border-collapse:collapse;
            }
            h1{
                font-family: Tahoma;
                font-weight: bold;
                font-size: 15px;
                padding: 1px;
            }
            h2{
                font-family: Tahoma;
                font-weight: bold;
                font-size: 13px;
                padding: 1px;
            }
            h3{
                font-family: Tahoma;
                font-weight: normal;
                font-size: 12px;
                padding: 1px;
            }
            sym{
                font-family:Arial, Helvetica, sans-serif;
                font-weight: normal;
                font-size: 12px;
                padding: 1px;
            }
            .table-detail {
                clear: both;
                text-align: center;
                border-collapse: collapse;
                margin: 10px 0px 10px 0px;
                background:#fff;
                width:98%;
                alignment-adjust:central;
                font-family:Tahoma;
            }

            .table-detail tr { 
                border-bottom: 1px solid #000; 
                border-top: 1px solid #000;
                height:20px;

            }

            .table-detail td {
                color: #333;
                font-size:13px;
                border-color: #000;
                border-collapse: collapse;
                vertical-align: center;
                padding: 3px 5px;
                border-bottom:0px #CCCCCC solid;

            }
            .table-detail th.top{
                background-color:#CCC;
            }
            .table-approve {
                color: #333; font-size: 9px; 
                font-weight: 700; 
                margin: 2px 2px 2px 2px; 
                padding: 5px 5px; 
                border-bottom: 1px solid #000; 
                border-top: 1px solid #000;
                background-color:#FFF;
                height:20px;
            }

            .table-approve tr { 
                border-bottom: 1px solid #000; 
                border-top: 1px solid #000;
                height:20px;

            }
            .table-approve tr.sign { 
                border-bottom: 1px solid #000; 
                border-top: 1px solid #000;
                height:60px;

            }
            .table-approve td {
                color: #333;
                font-size:8px;
                vertical-align: center;
                padding: 3px 5px;
            }
            .sign{
                height:60px;
            }
            .table-hide{
                border:none;
                border-top:none;
            }
            .table-hide tr{
                border:none;
            }
            .table-hide td.center{
                border:none;
            }
        </style>
    </head>
    <body onLoad="printpage()">
        <?php foreach ($getData as $data): ?>
        <div id="cetak">
            <table width="100%">                
                <tr>
                    <td rowspan="3" width="8%" align="center"><img src="<?php echo base_url(); ?>assets/admin/layout3/img/PSG.png" width="50" height="40"></td>
                    <td rowspan="3" width="70%" align="center"><h1>PT. PULAU SAMBU GUNTUNG</h1>
                        <h2>KWITANSI MESS KARYAWAN</h2></td>
                    <td width="22%">
                        <table class="table-hide" width="100%">
                            <tr>
                                <td width="40%" class="table-hide"><strong>Tanggal</strong></td>
                                <td width="5%" class="table-hide"><strong>:</strong></td>
                                <td width="55%" class="table-hide">&nbsp;&nbsp;<strong><?php echo $data->Tanggal ?></strong></td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>                    
                    <td>
                        <table class="table-hide" width="100%">
                            <tr>
                                <td width="40%" class="table-hide"><strong>Nomor</strong></td>
                                <td width="5%" class="table-hide"><strong>:</strong></td>
                                <td width="55%" class="table-hide">&nbsp;&nbsp;<strong><?php echo $data->Nomor ?></strong></td>
                            </tr>                            
                        </table>
                    </td>
                </tr>
                <tr>
                    <td>
                        <table class="table-hide" width="100%">
                            <tr>
                                <td width="40%" class="table-hide"><strong>Bulan Tagih</strong></td>
                                <td width="5%" class="table-hide"><strong>:</strong></td>
                                <td width="55%" class="table-hide">&nbsp;&nbsp;<strong><?php echo $data->BulanTgh ?></strong></td>
                            </tr>
                        </table>
                    </td>
                </tr>
                
                <tr>
                    <td colspan="3" align="center">
                        <br/>
                        <table width="95%" border="0" >
                            <tr>
                                <td width="48%" class="table-hide">
                                    <table width="100%">
                                        <tr>
                                            <td width="40%" class="table-hide"><strong>Nama</strong></td>
                                            <td width="5%" class="table-hide"><strong>:</strong></td>
                                            <td width="55%" class="table-hide">&nbsp;&nbsp;<strong><?php echo $data->Nama ?></strong></td>
                                        </tr>
                                    </table>
                                </td>
                                <td width="47%" class="table-hide">
                                    <table width="100%">
                                        <tr>
                                            <td width="40%" class="table-hide"><strong>CV</strong></td>
                                            <td width="5%" class="table-hide"><strong>:</strong></td>
                                            <td width="55%" class="table-hide">&nbsp;&nbsp;<strong><?php echo $data->CV ?></strong></td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td width="48%" class="table-hide">
                                    <table width="100%">
                                        <tr>
                                            <td width="40%" class="table-hide"><strong>Alamat</strong></td>
                                            <td width="5%" class="table-hide"><strong>:</strong></td>
                                            <td width="55%" class="table-hide">&nbsp;&nbsp;<strong><?php $this->load->model('m_cetak'); $K = $this->m_cetak->selectAlmt($data->IDMess);
                                            foreach ($K as $set): echo $set->Nama; endforeach; ?></strong></td>
                                        </tr>
                                    </table>
                                </td>
                                <td width="47%" class="table-hide">
                                    <table width="100%">
                                        <tr>
                                            <td width="40%" class="table-hide"><strong>Keterangan</strong></td>
                                            <td width="5%" class="table-hide"><strong>:</strong></td>
                                            <td width="55%" class="table-hide">&nbsp;&nbsp;<strong><?php echo $data->Ket ?></strong></td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td width="48%" class="table-hide">
                                    <table width="100%">
                                        <tr>
                                            <td width="40%" class="table-hide"><strong>Departemen</strong></td>
                                            <td width="5%" class="table-hide"><strong>:</strong></td>
                                            <td width="55%" class="table-hide">&nbsp;&nbsp;<strong><?php echo $data->Dept ?></strong></td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                        
                        <table class="table-detail" width="95%" >
                            <thead>
                                <tr>
                                    <th class="text-center" colspan="2">Pencatatan Listrik</th>
                                    <th class="text-center" rowspan="2">Pakai Listrik</th>
                                    <th class="text-center" rowspan="2">Rp/Kwh</th>
                                    <th class="text-center" rowspan="2">Sub Total (Rp)</th>                                    
                                </tr>
                                <tr>
                                    <th class="text-center">Awal</th>
                                    <th class="text-center">Akhir</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($getData as $data){ ?>
                                    <tr>
                                        <td><?php echo $data->KwhAwal ?></td>
                                        <td><?php echo $data->KwhAkhir ?></td>
                                        <td><?php echo $data->PakaiList ?></td>
                                        <td><?php echo $data->BiayaPerList ?></td>
                                        <td><?php echo $data->TtlBiayaList ?></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                        
                        <table class="table-detail" width="95%" >
                            <thead>
                                <tr>
                                    <th class="text-center" colspan="2">Pencatatan Air</th>
                                    <th class="text-center" rowspan="2">Pakai Air</th>
                                    <th class="text-center" rowspan="2">Rp/M<sup>3</sup></th>
                                    <th class="text-center" rowspan="2">Sub Total (Rp)</th>                                    
                                </tr>
                                <tr>
                                    <th class="text-center">Awal</th>
                                    <th class="text-center">Akhir</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($getData as $data){ ?>
                                    <tr>
                                        <td><?php echo $data->FlowAwal ?></td>
                                        <td><?php echo $data->FlowAkhir ?></td>
                                        <td><?php echo $data->PakaiAir ?></td>
                                        <td><?php echo $data->BiayaPerAir ?></td>
                                        <td><?php echo $data->TtlBiayaAir ?></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                        
                        <table width="95%" border="0" >
                            <tr>
                                <td width="48%" class="table-hide">
                                    <table width="100%">
                                        <tr>
                                            <td width="20%" class="table-hide"><strong>Lain-lain</strong></td>
                                            <td width="3%" class="table-hide"><strong>:</strong></td>
                                            <td width="75%" class="table-hide">&nbsp;&nbsp;<strong><?php echo $data->Lain ?></strong></td>
                                        </tr>
                                    </table>
                                </td>
                                
                            </tr>
                            <tr>
                                <td width="48%" class="table-hide">
                                    <table width="100%">
                                        <tr>
                                            <td width="20%" class="table-hide"><strong>Tunggakan</strong></td>
                                            <td width="3%" class="table-hide"><strong>:</strong></td>
                                            <td width="75%" class="table-hide">&nbsp;&nbsp;<strong><?php echo $data->Tunggakan ?></strong></td>
                                        </tr>
                                    </table>
                                </td>
                                
                            </tr>
                            <tr>
                                <td width="48%" class="table-hide">
                                    <table width="100%">
                                        <tr>
                                            <td width="20%" class="table-hide"><strong>Total Harus Bayar (Rp)</strong></td>
                                            <td width="3%" class="table-hide"><strong>:</strong></td>
                                            <td width="75%" class="table-hide">&nbsp;&nbsp;<strong><?php echo $data->JmlBayar ?></strong></td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                        <br />
                    </td>    
                </tr>
            </table>            
        </div>
        <?php endforeach; ?>
    </body>
</html>
