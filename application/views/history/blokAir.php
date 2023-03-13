<?php if (($this->session->userdata('groupid') == 1) or ($this->session->userdata('groupid') == 4)) {?>
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
                        <form action="<?php echo site_url('laporan/appAir1'); ?>" method="post" role="form" class="form-horizontal">
                        <div class="table-toolbar">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="alert alert-success">
                                        <h5 class="uppercase"><strong>Periode Yang tampil dari: <?php echo $blnAwal; ?> sampai <?php echo $blnAkhir; ?></strong></h5>                                    
                                    </div>
                                </div>
                            </div>
                            
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
                                    echo "<p class='alert alert-danger'><button type='button' class='close' data-dismiss='alert'>
                                            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'></button> Data tidak behasil <b>dihapus</b>..</p>";
                                }
                                ?>
                                <div class="col-md-3">
                                    <div class="btn-group">
                                        <button type="submit" value="Approve" name="Submit" class="btn btn-circle green-haze" >
                                            <i class="fa fa-check"></i> Approve
                                        </button>                                        
                                    </div>
                                    <div class="btn-group">
                                        <a id="table_flow_new" class="btn btn-circle btn-danger" href='<?php echo base_url("laporan/air"); ?>'>
                                            <i class="fa fa-undo"></i> Kembali 
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <table id="table_ceklapflow" cellspacing="0" cellpadding="0" class="table table-bordered table-striped table-condensed flip-content flip-scroll">
                            <thead>
                                <tr>
                                    <th class="table-checkbox"><input type="checkbox" onchange="check(this)"/></th>
                                    <th>No</th>
                                    <th>Nama Mess</th>                                        
                                    <th>No Flow Mtr</th>
                                    <th>Periode</th>
                                    <th>Beban Lalu</th>                                        
                                    <th>Beban Sekarang</th>
                                    <th>Pemakaian</th>
                                    <th>Dilaporkan / Tanggal</th>
                                    <th>Keterangan</th>
                                    <th>Status</th>
                                    <th>Cek Laporan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 0; foreach ($alamatAir as $set){ ?>
                                    <tr>
                                        <td><input type="checkbox" name="chkID[]" value="<?php echo $set->ID; ?>"></td>
                                        <td><?php echo ++$no; ?><input type="hidden"  class="form-control" name="txtIDBlok"  value="<?php echo $set->IDBlok ?>" /></td>
                                        <td><strong><?php $this->load->model('m_laporan'); $a = $this->m_laporan->selectAlamat($set->IDMess);
                                            foreach ($a as $setM): echo $setM->Nama; endforeach; ?></strong></td>
                                        <td><?php echo $set->Nomor; ?></td>
                                        <td><strong><?php echo $set->Periode; ?></strong></td>
                                        <td><?php echo $set->FlowAwal; ?></td>
                                        <td><?php echo $set->Flow; ?></td>
                                        <td <?php if ($set->Pemakaian <= 4) { echo "style=\"background-color:#fd6969\""; }?>><strong><?php echo $set->Pemakaian; ?></strong></td>
                                        <td><?php echo $set->CreatedBy; ?> / <?php if($set->CreatedDate===NULL){echo "Belum Dilaporkan"; }else{
                                                    echo date ('d-M-Y', strtotime($set->CreatedDate)); }?></td>
                                        <td><?php echo $set->Ket; ?></td>
                                        <td><?php if($set->CheckStatus === 0){
                                                echo "<span class='label label-danger'>Belum Approve</span>";
                                            }else{
                                                echo "<span class='label label-success'>Approve</span>";
                                            } ?></td>
<!--                                        <td></?php echo date ('d-M-Y, H:i:s', strtotime($set->CreatedDate)); ?></td>-->
                                        <td>
                                            <a href="<?php echo site_url('laporan/lapAir') . "?id=" . $set->ID; ?>" class="btn btn-circle blue">
                                                <i class="fa fa-pencil"></i> Periksa
                                            </a>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                        </form>
                    </div>
                </div>                   
            </div>
        </div>        
    </div>
</div>    

<script>
    $(document).ready(function() {
        $("#table_ceklapflow").dataTable();
        
        var active_class = 'active';
        $('#table_ceklapflow > thead > tr > th input[type=checkbox]').eq(0).on('click', function(){
            var th_checked = this.checked;//checkbox inside "TH" table header
            $(this).closest('table').find('tbody > tr').each(function(){
                var row = this;
                if(th_checked) $(row).addClass(active_class).find('input[type=checkbox]').eq(0).prop('checked', true);
                else $(row).removeClass(active_class).find('input[type=checkbox]').eq(0).prop('checked', false);
            });
        });
    });
</script>

<?php } elseif (($this->session->userdata('groupid') == 5) or ($this->session->userdata('groupid') == 12)) { ?>
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
                        <form action="<?php echo site_url('laporan/appAir2'); ?>" method="post" role="form" class="form-horizontal">
                        <div class="table-toolbar">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="alert alert-success">
                                        <h5 class="uppercase"><strong>Periode Yang tampil dari: <?php echo $blnAwal; ?> sampai <?php echo $blnAkhir; ?></strong></h5>                                    
                                    </div>
                                </div>
                            </div>
                            
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
                                    echo "<p class='alert alert-danger'><button type='button' class='close' data-dismiss='alert'>
                                            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'></button> Data tidak behasil <b>dihapus</b>..</p>";
                                }
                                ?>
                                <div class="col-md-3">
                                    <div class="btn-group">
                                        <button type="submit" value="Approve" name="Submit" class="btn btn-circle green-haze" >
                                            <i class="fa fa-check"></i> Approve
                                        </button>                                        
                                    </div>
                                    <div class="btn-group">
                                        <a id="table_flow_new" class="btn btn-circle btn-danger" href='<?php echo base_url("laporan/air"); ?>'>
                                            <i class="fa fa-undo"></i> Kembali 
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <table id="table_applapflow" cellspacing="0" cellpadding="0" class="table table-bordered table-striped table-condensed flip-content flip-scroll">
                            <thead>
                                <tr>
                                    <th class="table-checkbox"><input type="checkbox" onchange="check(this)"/></th>
                                    <th>No</th>
                                    <th>Nama Mess</th>                                        
                                    <th>No Flow Mtr</th>
                                    <th>Periode</th>
                                    <th>Beban Lalu</th>                                        
                                    <th>Beban Sekarang</th>
                                    <th>Pemakaian</th>
                                    <th>Dicek / Tanggal</th>
                                    <th>Keterangan</th>
                                    <th>Status</th>
                                    <th>Cek Laporan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 0; foreach ($alamatAir2 as $setF){ ?>
                                    <tr>
                                        <td><input type="checkbox" name="chkID[]" value="<?php echo $setF->ID; ?>"></td>
                                        <td><?php echo ++$no; ?></td>
                                        <td><strong><?php $this->load->model('m_laporan'); $a = $this->m_laporan->selectAlamat($setF->IDMess);
                                            foreach ($a as $setM): echo $setM->Nama; endforeach; ?></strong></td>
                                        <td><?php echo $setF->Nomor; ?></td>
                                        <td><strong><?php echo $setF->Periode; ?></strong></td>
                                        <td><?php echo $setF->FlowAwal; ?></td>
                                        <td><?php echo $setF->Flow; ?></td>
                                        <td <?php if ($setF->Pemakaian <= 4) { echo "style=\"background-color:#fd6969\""; }?>><strong><?php echo $setF->Pemakaian; ?></strong></td>
                                        <td><?php echo $setF->CheckBy; ?> / <?php if($setF->CreatedDate===NULL){echo "Belum Diperiksa"; }else{
                                                    echo date ('d-M-Y', strtotime($setF->CreatedDate)); }?></td>
                                        <td><?php echo $setF->Ket; ?></td>
                                        <td><?php if($setF->ApproveStatus === 0){
                                                echo "<span class='label label-danger'>Belum Approve</span>";
                                            }else{
                                                echo "<span class='label label-success'>Approve</span>";
                                            } ?></td>
<!--                                        <td></?php echo date ('d-M-Y, H:i:s', strtotime($setF->CheckDate)); ?></td>-->
                                        <td>
                                            <a href="<?php echo site_url('laporan/lapAir') . "?id=" . $setF->ID; ?>" class="btn btn-circle blue">
                                                <i class="fa fa-pencil"></i> Periksa
                                            </a>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                        </form>
                    </div>
                </div>                   
            </div>
        </div>
    </div>        
</div>

<script>
    $(document).ready(function() {
        $("#table_applapflow").dataTable();
        
        var active_class = 'active';
        $('#table_applapflow > thead > tr > th input[type=checkbox]').eq(0).on('click', function(){
            var th_checked = this.checked;//checkbox inside "TH" table header
            $(this).closest('table').find('tbody > tr').each(function(){
                var row = this;
                if(th_checked) $(row).addClass(active_class).find('input[type=checkbox]').eq(0).prop('checked', true);
                else $(row).removeClass(active_class).find('input[type=checkbox]').eq(0).prop('checked', false);
            });
        });
    });
</script>
<?php } ?>
