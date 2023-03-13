 
<div class="page-head">
    <div class="container-fluid">            
        <div class="page-title">
            <h1>Group User <small>Daftar Group User</small></h1>
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
                            <span class="caption-subject font-green-sharp bold uppercase">Daftar Group User</span>
                        </div>                           
                    </div>

                    <div class="portlet-body">
                        <div class="table-toolbar">
                            <div class="row">
                                <?php
                                if($this->input->get('msg') == 'success_edit'){
                                    echo "<div class='alert alert-success alert-dismissable'>
                                            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'></button> <b>Ubah</b> data berhasil..</div>";
                                }elseif ($this->input->get('msg') == 'failed_edit') {
                                    echo "<div class='alert alert-danger alert-dismissable'>
                                            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'></button> <b>Ubah</b> data tidak berhasil..</div>";
                                }elseif ($this->input->get('msg') == 'success') {
                                    echo "<div class='alert alert-success alert-dismissable'>
                                                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'></button> Data behasil <b>ditambahkan</b>..</div>";
                                } elseif ($this->input->get('msg') == 'failed') {
                                    echo "<div class='alert alert-danger alert-dismissable'>
                                                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'></button> Data gagal <b>ditambahkan</b>..</div>";
                                }?>
                                <div class="col-md-6">
                                    <div class="btn-group">
                                        <a id="table_level_new" class="btn btn-circle green-haze" href='<?php echo base_url("lvl_user/addLevel");?>'>
                                            Tambah Data <i class="fa fa-plus"></i>
                                        </a>
                                    </div>
                                </div>                                    
                            </div>
                        </div>

                        <table id="table_group" cellspacing="0" cellpadding="0" class="table table-bordered table-striped table-condensed flip-content flip-scroll">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Group User</th>
                                    <th>Group Desc</th>
                                    <th>Dibuat Oleh</th>
                                    <th>Dibuat Tanggal</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no=0; foreach ($getLevelUser as $setL){ ?>
                                <tr>
                                    <td><?php echo ++$no;?></td>
                                    <td><?php echo $setL->GroupName;?></td>
                                    <td><?php echo $setL->GroupDesc;?></td>
                                    <td><?php echo $setL->CreatedBy;?></td>
                                    <td><?php echo date ('d-M-Y, H:i:s', strtotime($setL->CreatedDate)); ?></td>
                                    <td>
                                        <a href="<?php echo site_url ('lvl_user/editLevel')."?id=".$setL->LevelID; ?>" class="btn btn-circle blue">
                                            <i class="fa fa-edit"></i> Ubah
                                        </a>
<!--                                            <a href="<?php echo site_url ('lvl_user/delLevel')."?id=".$setL->LevelID; ?>" class="btn btn-circle btn-xs red"
                                           onclick="javascript: return confirm('Anda Yakin Hapus Data?')">
                                            <i class="fa fa-times"></i> Hapus
                                        </a>                                            -->
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
        $("#table_group").dataTable();
    });
</script>