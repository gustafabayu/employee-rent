    <div class="page-head">
        <div class="container-fluid">            
            <div class="page-title">
                <h1>Monitoring <small>Tagihan Listrik Mess</small></h1>
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
                                <span class="caption-subject font-green-sharp bold uppercase">Monitoring Tagihan Listrik Mess</span>
                            </div>
                        </div>
                        <div class="portlet-body">
                            <div class="table-toolbar">
                                <div class="row">
<!--                                    <div class="col-md-12">
                                        <div class="alert alert-success">
                                            <h5 class="uppercase"><strong>Periode tagihan yang muncul : <?php echo $blnaktif; ?></strong></h5>                                    
                                        </div>
                                    </div>-->
                                    
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
<!--                                        <div class="btn-group">
                                            <?php  foreach ($almtList as $set) : ?>
                                            <a id="table_kwh_new" class="btn btn-circle green-haze" href='<?php echo base_url("hsl_akhir/add_List")."?id=".$set->ID; ?>'>
                                                <i class="fa fa-plus"></i> Tambah Tagihan
                                            </a>
                                            <?php endforeach; ?>
                                        </div>-->
                                        <div class="btn-group">
                                            <a id="table_flow_new" class="btn btn-circle btn-danger" href='<?php echo base_url("hsl_akhir/listrik"); ?>'>
                                                <i class="fa fa-undo"></i> Kembali 
                                            </a>
                                        </div>
                                    </div>                                    
                                </div>
                            </div>
                            
                            <table id="table_hasilkwh" cellspacing="0" cellpadding="0" class="table table-bordered table-striped table-condensed flip-content flip-scroll">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Mess</th>
                                        <th>Nomor Kwh Meter</th>
<!--                                        <th>Periode</th>
                                        <th>Beban Lalu</th>                                        
                                        <th>Beban Sekarang</th>
                                        <th>Pemakaian</th>
                                        <th>Biaya</th>
                                        <th>Disetujui / Tanggal</th>-->
                                        <th>Cek Periode Yang Sudah Input</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 0; foreach ($alamatList as $setK) { ?>
                                        <tr>
                                            <td><?php echo ++$no; ?></td>
                                            <td><strong><?php $this->load->model('m_hsl_akhir'); $a = $this->m_hsl_akhir->selectAlamat($setK->IDMess);
                                                foreach ($a as $set): echo $set->Nama; endforeach; ?></strong></td>
                                            <td><?php echo $setK->Nomor; ?></td>
<!--                                            <td><strong><?php echo $setK->Periode; ?></strong></td>
                                            <td><?php echo $setK->KwhAwal; ?></td>
                                            <td><?php echo $setK->Kwh; ?></td>
                                            <td <?php if ($setK->Pemakaian <= 15) { echo "style=\"background-color:#fd6969\""; }?>><strong><?php echo $setK->Pemakaian; ?></strong></td>
                                            <td><strong><?php echo $setK->TtlBiaya; ?></strong></td>
                                            <td><?php echo $setK->ApproveBy; ?> / <?php echo date ('d-M-Y', strtotime($setK->ApproveDate)); ?></td>-->
                                            <td>
                                                <a href="<?php echo site_url('hsl_akhir/hsl_listrik')."?id=".$setK->IDMess; ?>" class="btn btn-circle blue">
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
        $("#table_hasilkwh").dataTable();
    });
</script>