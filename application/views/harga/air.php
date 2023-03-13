
<div class="page-head">
    <div class="container-fluid">            
        <div class="page-title">
            <h1>Flow Meter <small>Daftar Harga Air</small></h1>
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
                            <span class="caption-subject font-green-sharp bold uppercase">Daftar Harga Air</span>
                        </div>
                    </div>

                    <div class="portlet-body">
                        <div class="table-toolbar">
                            <div class="row">
                                <?php
                                if ($this->input->get('msg') == 'success_edit') {
                                    echo "<div class='alert alert-success alert-dismissable'>
                                            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'></button> <b>Ubah</b> data berhasil..</div>";
                                } elseif ($this->input->get('msg') == 'failed_edit') {
                                    echo "<div class='alert alert-danger alert-dismissable'>
                                            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'></button> <b>Ubah</b> data tidak berhasil..</div>";
                                } elseif ($this->input->get('msg') == 'success') {
                                    echo "<div class='alert alert-success alert-dismissable'>
                                            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'></button> Data behasil <b>ditambahkan</b>..</div>";
                                } elseif ($this->input->get('msg') == 'failed') {
                                    echo "<div class='alert alert-danger alert-dismissable'>
                                            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'></button> Data gagal <b>ditambahkan</b>..</div>";
                                }?>
                                <div class="col-md-6">
                                    <div class="btn-group">
                                        <a id="table_flow_new" class="btn btn-circle green-haze" href='<?php echo base_url("harga/addFM"); ?>'>
                                            Tambah Data <i class="fa fa-plus"></i>
                                        </a>
                                    </div>
                                </div>                                    
                            </div>
                        </div>

                        <table id="table_hrgAir" cellspacing="0" cellpadding="0" class="table table-bordered table-striped table-condensed flip-content flip-scroll">
                            <thead class="flip-content">
                                <tr>
                                    <th>No</th>
                                    <th>Tipe Pemakai</th>
                                    <th>Harga</th>                                                                            
                                    <th>Keterangan</th>                                                                                                                                                              
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 0; foreach ($hargaFM as $setF){?>
                                    <tr>
                                        <td><?php echo ++$no; ?></td>
                                        <td><?php echo $setF->Tipe; ?></td>
                                        <td><?php echo $setF->Harga; ?></td>                                                                               
                                        <td><?php echo $setF->Ket; ?></td>
                                        <td>
                                            <a href="<?php echo site_url('harga/editFM')."?id=".$setF->ID; ?>" class="btn btn-circle blue">
                                                <i class="fa fa-edit"></i> Ubah
                                            </a>
<!--                                            <a href="<?php echo site_url('flow_mtr/delFlow') . "?id=" . $setF->IDFlowMtr; ?>" class="btn btn-circle btn-xs red"
                                               onclick="javascript: return confirm('Anda Yakin Hapus Data?')">
                                                <i class="fa fa-times"></i> Hapus
                                            </a>-->
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
    $(document).ready(function () {
        $("#table_hrgAir").dataTable();
    });
</script>