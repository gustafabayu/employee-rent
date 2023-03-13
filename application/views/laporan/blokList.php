<?php if (($this->session->userdata('groupid') == 1) or ($this->session->userdata('groupid') == 3)) {?>
<div class="page-head">
    <div class="container-fluid">            
        <div class="page-title">
            <h1>Laporan <small>Tagihan Listrik Mess</small></h1>
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
                            <span class="caption-subject font-green-sharp bold uppercase">Laporan Tagihan Listrik Mess</span>
                        </div>
                    </div>

                    <div class="portlet-body">                                                
                        <form action="<?php echo site_url('laporan/appList1'); ?>" method="post" role="form" class="form-horizontal" onsubmit="return confirm('Anda Yakin Approve Data? Silahkan Cek Kembali');">
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
                                            <i class="fa fa-check"></i> Approve</button>                                        
                                    </div>
                                    <div class="btn-group">
                                        <a id="table_flow_new" class="btn btn-circle btn-danger" href='<?php echo base_url("laporan/listrik"); ?>'>
                                            <i class="fa fa-undo"></i> Kembali 
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                                                        
                        <table id="table_ceklapkwh" class="table table-bordered table-striped table-hover flip-content flip-scroll">
                            <thead>
                                <tr>
<!--                                    <th class="table-checkbox"><input type="checkbox" id="KwhAll" onchange="check(this)"/></th>-->
                                    <th ><input type="checkbox" id="KwhAll" class="group-checkable" data-set="#table_ceklapkwh .checkboxes"/></th>
                                    <th>No</th>
                                    <th>Nama Mess</th>                                        
                                    <th>No Kwh Mtr</th>
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
                                <?php $no = 0; foreach ($alamatList as $set){ ?>
                                    <tr>
                                        <td ><input type="checkbox" class="checkboxes" name="chkID[]" value="<?php echo $set->ID; ?>"></td>
                                        <td><?php echo ++$no; ?><input type="hidden"  class="form-control" name="txtIDBlok"  value="<?php echo $set->IDBlok ?>" /></td>
                                        <td><strong><?php $this->load->model('m_laporan'); $a = $this->m_laporan->selectAlamat($set->IDMess);
                                            foreach ($a as $setM): echo $setM->Nama; endforeach; ?></strong></td>
                                        <td><strong><?php echo $set->Nomor; ?></strong></td>
                                        <td><strong><?php echo $set->Periode; ?></strong></td>
                                        <td><?php echo $set->KwhAwal; ?></td>
                                        <td><?php echo $set->Kwh; ?></td>
                                        <td <?php if ($set->Pemakaian <= 15) { echo "style=\"background-color:#fd6969\""; }?>><strong><?php echo $set->Pemakaian; ?></strong></td>
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
                                            <a href="<?php echo site_url('laporan/lapList') . "?id=" . $set->ID; ?>" class="btn btn-circle blue">
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
    var table = $('#table_ceklapkwh');
        
        table.dataTable({

            "language": {
                "aria": {
                    "sortAscending": ": activate to sort column ascending",
                    "sortDescending": ": activate to sort column descending"
                },
                "emptyTable": "No data available in table",
                "info": "Showing _START_ to _END_ of _TOTAL_ entries",
                "infoEmpty": "No entries found",
                "infoFiltered": "(filtered1 from _MAX_ total entries)",
                "lengthMenu": "Show _MENU_ entries",
                "search": "Search:",
                "zeroRecords": "No matching records found"
            },
                        
            "bStateSave": true, // save datatable state(pagination, sort, etc) in cookie.
            
            "lengthMenu": [
                [10, 25, 50, -1],
                [10, 25, 50, "All"] // change per page values here
            ],
            // set the initial value
            "pageLength": 10,
            "language": {
                "lengthMenu": " _MENU_ records"
            },
            "columnDefs": [{  // set default column settings
                'orderable': false,
                'targets': [0]
            }, {
                "searchable": false,
                "targets": [0]
            }],
            "order": [
                [1, "asc"]
            ] // set first column as a default sort by asc
        });

        var tableWrapper = jQuery('#table_ceklapkwh_wrapper');

        table.find('.group-checkable').change(function () {
            var set = jQuery(this).attr("data-set");
            var checked = jQuery(this).is(":checked");
            jQuery(set).each(function () {
                if (checked) {
                    $(this).attr("checked", true);
                } else {
                    $(this).attr("checked", false);
                }
            });
            jQuery.uniform.update(set);
        });

        tableWrapper.find('.dataTables_length select').select2(); // initialize select2 dropdown    
</script>

<?php } elseif (($this->session->userdata('groupid') == 7) or ($this->session->userdata('groupid') == 8)) { ?>
<div class="page-head">
    <div class="container-fluid">            
        <div class="page-title">
            <h1>Laporan <small>Tagihan Listrik Mess</small></h1>
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
                            <span class="caption-subject font-green-sharp bold uppercase">Laporan Tagihan Listrik Mess</span>
                        </div>
                    </div>

                    <div class="portlet-body">
                        <form action="<?php echo site_url('laporan/appList2'); ?>" method="post" role="form" class="form-horizontal" onsubmit="return confirm('Anda Yakin Approve Data? Silahkan Cek Kembali');">
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
                                } elseif ($this->input->get('msg') == 'success_tolak') {
                                    echo "<div class='alert alert-success alert-dismissable'>
                                            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'></button> Data behasil <b>ditolak</b>..</div>";
                                } elseif ($this->input->get('msg') == 'failed_tolak') {
                                    echo "<div class='alert alert-danger alert-dismissable'>
                                            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'></button> Data tidak behasil <b>ditolak</b>..</p>";
                                }
                                ?>
                                <div class="col-md-6">
                                    <div class="btn-group">
                                        <button type="submit" value="Approve" name="Submit" class="btn btn-circle green-haze" >
                                            <i class="fa fa-check"></i> Approve</button>
                                    </div>
                                    <div class="btn-group">
                                        <a id="table_flow_new" class="btn btn-circle btn-danger" href='<?php echo base_url("laporan/listrik"); ?>'>
                                            <i class="fa fa-undo"></i> Kembali 
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                            
                        <table id="table_applapkwh" class="table table-bordered table-striped table-hover flip-content flip-scroll">
                            <thead>
                                <tr>
<!--                                    <th class="table-checkbox"><input type="checkbox" id="KwhAll" onchange="check(this)"/></th>-->
                                    <th ><input type="checkbox" id="KwhAll" class="group-checkable" data-set="#table_applapkwh .checkboxes"/></th>
                                    <th>No</th>
                                    <th>Nama Mess</th>                                        
                                    <th>No Kwh Mtr</th>
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
                                <?php $no = 0; foreach ($alamatList2 as $setF){ ?>
                                    <tr>
                                        <td><input type="checkbox" class="checkboxes" name="chkID[]" value="<?php echo $setF->ID; ?>"></td>
                                        <td><?php echo ++$no; ?><input type="hidden"  class="form-control" name="txtIDBlok"  value="<?php echo $setF->IDBlok ?>" /></td>
                                        <td><strong><?php $this->load->model('m_laporan'); $a = $this->m_laporan->selectAlamat($setF->IDMess);
                                            foreach ($a as $setM): echo $setM->Nama; endforeach; ?></strong></td>
                                        <td><strong><?php echo $setF->Nomor; ?></strong></td>
                                        <td><strong><?php echo $setF->Periode; ?></strong></td>
                                        <td><?php echo $setF->KwhAwal; ?></td>
                                        <td><?php echo $setF->Kwh; ?></td>
                                        <td <?php if ($setF->Pemakaian <= 15) { echo "style=\"background-color:#fd6969\""; }?>><strong><?php echo $setF->Pemakaian; ?><strong></td>
                                        <td><?php echo $setF->CheckBy; ?> / <?php if($setF->CheckDate===NULL){echo "Belum Diperiksa"; }else{
                                                    echo date ('d-M-Y', strtotime($setF->CheckDate)); }?></td>
                                        <td><?php echo $setF->Ket; ?></td>
                                        <td><?php if($setF->ApproveStatus === 0){
                                                echo "<span class='label label-danger'>Belum Approve</span>";
                                            }else{
                                                echo "<span class='label label-success'>Approve</span>";
                                            } ?></td>
<!--                                        <td></?php echo date ('d-M-Y, H:i:s', strtotime($setF->CheckDate)); ?></td>-->
                                        <td>
                                            <a href="<?php echo site_url('laporan/lapList') . "?id=" . $setF->ID; ?>" class="btn btn-circle blue">
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
    var table = $('#table_applapkwh');

        table.dataTable({

            "language": {
                "aria": {
                    "sortAscending": ": activate to sort column ascending",
                    "sortDescending": ": activate to sort column descending"
                },
                "emptyTable": "No data available in table",
                "info": "Showing _START_ to _END_ of _TOTAL_ entries",
                "infoEmpty": "No entries found",
                "infoFiltered": "(filtered1 from _MAX_ total entries)",
                "lengthMenu": "Show _MENU_ entries",
                "search": "Search:",
                "zeroRecords": "No matching records found"
            },
                        
            "bStateSave": true, // save datatable state(pagination, sort, etc) in cookie.
            
            "lengthMenu": [
                [10, 25, 50, -1],
                [10, 25, 50, "All"] // change per page values here
            ],
            // set the initial value
            "pageLength": 10,
            "language": {
                "lengthMenu": " _MENU_ records"
            },
            "columnDefs": [{  // set default column settings
                'orderable': false,
                'targets': [0]
            }, {
                "searchable": false,
                "targets": [0]
            }],
            "order": [
                [1, "asc"]
            ] // set first column as a default sort by asc
        });

        var tableWrapper = jQuery('#table_applapkwh_wrapper');

        table.find('.group-checkable').change(function () {
            var set = jQuery(this).attr("data-set");
            var checked = jQuery(this).is(":checked");
            jQuery(set).each(function () {
                if (checked) {
                    $(this).attr("checked", true);
                } else {
                    $(this).attr("checked", false);
                }
            });
            jQuery.uniform.update(set);
        });

        tableWrapper.find('.dataTables_length select').select2(); // initialize select2 dropdown    
</script>
<?php }
