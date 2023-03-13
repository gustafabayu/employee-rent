 
<div class="page-head">
    <div class="container-fluid">            
        <div class="page-title">
            <h1>User <small>Daftar Lengkap User</small></h1>
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
                            <span class="caption-subject font-green-sharp bold uppercase">Daftar User</span>
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
                                } elseif ($this->input->get('msg') == 'success_delete') {
                                    echo "<div class='alert alert-success alert-dismissable'>
                                                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'></button> Data behasil <b>dihapus</b>..</div>";
                                } elseif ($this->input->get('msg') == 'failed_delete') {
                                    echo "<div class='alert alert-danger alert-dismissable'>
                                                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'></button> Data tidak behasil <b>dihapus</b>..</div>";
                                } elseif ($this->input->get('msg') == 'success') {
                                    echo "<div class='alert alert-success alert-dismissable'>
                                                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'></button> <b>Ubah</b> password berhasil..</div>";
                                } elseif ($this->input->get('msg') == 'failed') {
                                    echo "<div class='alert alert-danger alert-dismissable'>
                                                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'></button> <b>Ubah</b> password gagal..</div>";
                                }
                                ?>
                                <div class="col-md-6">
                                    <div class="btn-group">
                                        <a id="table_user_new" class="btn btn-circle green-haze" href='<?php echo base_url("user/addUser"); ?>'>
                                            Tambah Data <i class="fa fa-plus"></i>
                                        </a>
                                    </div>
                                </div>                                    
                            </div>
                        </div>

                        <table id="table_user" cellspacing="0" cellpadding="0" class="table table-bordered table-striped table-condensed flip-content flip-scroll">
                            <thead class="flip-content">
                                <tr>
                                    <th>No</th>
                                    <th>Username</th>
                                    <th>Nama Pengguna</th>
                                    <th>NIK</th>
                                    <th>Departemen</th>
                                    <th>Jabatan</th>                                        
                                    <th>Level User</th>
                                    <th>Status</th>
                                    <th>Dibuat Oleh</th>
                                    <th>Dibuat Tanggal</th>                                        
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 0; foreach ($getUser as $setUser) { ?>
                                    <tr>
                                        <td><?php echo ++$no; ?></td>
                                        <td><?php echo $setUser->Username; ?></td>
                                        <td><?php echo $setUser->Nama; ?></td>
                                        <td><?php echo $setUser->NIK; ?></td>
                                        <td><?php echo $setUser->Departemen; ?></td>
                                        <td><?php echo $setUser->Jabatan; ?></td>                                        
                                        <td><?php $this->load->model('m_user'); $GID = $this->m_user->selectLevelUser($setUser->LevelID);
                                            foreach ($GID as $setG): echo $setG->GroupName; endforeach; ?>
                                        </td>
                                        <td><?php
                                            if ($setUser->NotActive === 0) {
                                                echo "<span class='label label-primary'>Aktif</span>";
                                            } else {
                                                echo "<span class='label label-danger'>Tidak Aktif</span>";
                                            }
                                            ?>
                                        </td>
                                        <td><?php echo $setUser->CreatedBy; ?></td>
                                        <td><?php echo date('d-M-Y, H:i:s', strtotime($setUser->CreatedDate)); ?></td>
                                        <td>
                                            <a href="<?php echo site_url('user/editUser')."?id=".$setUser->UserID; ?>" class="btn btn-circle blue">
                                                <i class="fa fa-edit"></i> Ubah
                                            </a>
                                            <a href="<?php echo site_url('user/gantiPass')."?id=".$setUser->UserID; ?>" class="btn btn-circle yellow">
                                                <i class="fa fa-key"></i> Ganti Password
                                            </a>
<!--                                            <a href="</?php echo site_url ('user/delUser')."?id=".$setUser->UserID; ?>" class="btn btn-circle btn-xs red"
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
    $(document).ready(function() {
        $("#table_user").dataTable();
    });
</script>