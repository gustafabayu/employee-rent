<div class="page-head">
    <div class="container-fluid">            
        <div class="page-title">
            <h1>Laporan <small>Tagihan Air Mess</small></h1>
        </div>            
    </div>
</div>

<div class="page-content">
    <div class="container-fluid">
        
        <div class="row">
            <div class="col-md-12">                   
                <div class="portlet light">
                    <div class="portlet-title">
                        <div class="caption">                            
                            <span class="caption-subject font-green-sharp bold uppercase">Laporan Tagihan Air Mess</span>
                        </div>
                    </div>
                    <div class="portlet-body">
                        <div class="table-toolbar">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="alert alert-success">
                                        <h5 class="uppercase"><strong>Periode tagihan yang muncul : <?php echo $blnaktif; ?></strong></h5>                                    
                                    </div>
                                </div>
                                
                                <?php
                                if ($this->input->get('msg') == 'success_edit') {
                                    echo "<div class='alert alert-success alert-dismissable'>
                                            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'></button> <b>Ubah</b> data berhasil..</div>";
                                } elseif ($this->input->get('msg') == 'failed_edit') {
                                    echo "<div class='alert alert-danger alert-dismissable'>
                                            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'></button> <b>Ubah</b> data tidak berhasil..</div>";
                                } elseif ($this->input->get('msg') == 'success') {
                                    echo "<div class='alert alert-success alert-dismissable'>
                                            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'></button> Data behasil <b>ditambah</b>..</div>";
                                } elseif ($this->input->get('msg') == 'failed') {
                                    echo "<div class='alert alert-danger alert-dismissable'>
                                            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'></button> Data tidak behasil <b>ditambah</b>..</div>";
                                }
                                ?>
                                <div class="col-md-3">
<!--                                    <div class="btn-group">
                                        <?php  foreach ($almtAir as $set) : ?>
                                        <a id="table_kwh_new" class="btn btn-circle green-haze" href='<?php echo base_url("hsl_akhir/add_Air")."?id=".$set->ID; ?>'>
                                            <i class="fa fa-plus"></i> Tambah Tagihan
                                        </a>
                                        <?php endforeach; ?>
                                    </div>-->
                                    <div class="btn-group">
                                        <a id="table_flow_new" class="btn btn-circle btn-danger" href='<?php echo base_url("hsl_akhir/air"); ?>'>
                                            <i class="fa fa-undo"></i> Kembali 
                                        </a>
                                    </div>
                                </div>                                    
                            </div>
                        </div>
                        
                        <table id="table_hasilflow" cellspacing="0" cellpadding="0" class="table table-bordered table-striped table-condensed flip-content flip-scroll">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Mess</th>                                        
                                    <th>No Flow Mtr</th>
                                    <th>Periode</th>
                                    <th>Beban Lalu</th>                                        
                                    <th>Beban Sekarang</th>
                                    <th>Pemakaian</th>
                                    <th>Biaya</th>
                                    <th>Disetujui / Tanggal</th>
                                    <th>Cek Laporan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 0; foreach ($alamatAir as $setF){ ?>
                                    <tr>
                                        <td><?php echo ++$no; ?></td>
                                        <td><strong><?php $this->load->model('m_hsl_akhir'); $a = $this->m_hsl_akhir->selectAlamat($setF->IDMess);
                                            foreach ($a as $set): echo $set->Nama; endforeach; ?></strong></td>
                                        <td><?php echo $setF->Nomor; ?></td>
                                        <td><strong><?php echo $setF->Periode; ?></strong></td>
                                        <td><?php echo $setF->FlowAwal; ?></td>
                                        <td><?php echo $setF->Flow; ?></td>
                                        <td <?php if ($setF->Pemakaian <= 4) { echo "style=\"background-color:#fd6969\""; }?>><strong><?php echo $setF->Pemakaian; ?></strong></td>
                                        <td><strong><?php echo $setF->TtlBiaya; ?></strong></td>
                                        <td><?php echo $setF->ApproveBy; ?> / <?php echo date ('d-M-Y', strtotime($setF->ApproveDate)); ?></td>
                                        <td>
                                            <a href="<?php echo site_url('hsl_akhir/hsl_air') . "?id=" . $setF->ID; ?>" class="btn btn-circle blue">
                                                <i class="fa fa-pencil"></i> Periksa
                                            </a>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>                   
            </div>
        </div>            
    </div>
</div>    

<script>
    $(document).ready(function() {
        $("#table_hasilflow").dataTable();
    });
</script>