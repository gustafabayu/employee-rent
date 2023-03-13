<div class="page-head">
    <div class="container-fluid">            
        <div class="page-title">
            <h1>Penagihan <small>Tagihan Listrik Mess</small></h1>
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
                            <span class="caption-subject font-green-sharp bold uppercase">Penagihan Tagihan Listrik Mess</span>
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
                                        <?php  foreach ($almtList as $set) : ?>
                                        <a id="table_kwh_new" class="btn btn-circle green-haze" href='<?php echo base_url("penagihan/add_List")."?id=".$set->IDBlok; ?>'>
                                            <i class="fa fa-plus"></i> Tambah Tagihan
                                        </a>
                                        <?php endforeach; ?>
                                    </div>-->
                                    <div class="btn-group">
                                        <a id="table_flow_new" class="btn btn-circle btn-danger" href='<?php echo base_url("penagihan/listrik"); ?>'>
                                            <i class="fa fa-undo"></i> Kembali 
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <table id="table_hitTagList" cellspacing="0" cellpadding="0" class="table table-bordered table-striped table-condensed flip-content flip-scroll">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Mess</th>                                        
                                    <th>No Kwh Mtr</th>
                                    <th>Periode</th>                                    
<!--                                    <th>Pemakaian</th>-->
                                    <th>Biaya</th>
                                    <th>Denda</th>
                                    <th>Status</th>
                                    <th>Input Tagihan</th>
                                    <th>Update Tagihan</th>
                                    <th>Periksa Laporan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 0; foreach ($alamatList as $setF){ ?>
                                    <tr>
                                        <td><?php echo ++$no; ?></td>
                                        <td><strong><?php $this->load->model('m_penagihan'); $a = $this->m_penagihan->selectAlamat($setF->IDMess);
                                            foreach ($a as $set): echo $set->Nama; endforeach; ?></strong></td>
                                        <td><strong><?php echo $setF->Nomor; ?></strong></td>
                                        <td><strong><?php echo $setF->Periode; ?></strong></td>                                        
<!--                                        <td <?php if ($setF->Pemakaian <= 15) { echo "style=\"background-color:#fd6969\""; }?>><strong><?php echo $setF->Pemakaian; ?></strong></td>-->
                                        <td><strong><?php echo $setF->TtlBiaya; ?></strong></td>
                                        <td><strong><?php echo $setF->Denda; ?></strong></td>
                                        <td><?php if(($setF->AppTagihan === 0)||($setF->AppTagihan === NULL)){
                                                echo "<span class='label label-danger'>Belum Approve</span>";
                                            }else{
                                                echo "<span class='label label-success'>Approve</span>";
                                            } ?></td>
                                        <td><?php if(($setF->AppTagihan === 0)||($setF->AppTagihan === NULL)){ ?>
                                            <a href="<?php echo site_url('penagihan/tagihList')."?id=".$setF->ID; ?>" class="btn btn-circle blue">
                                                <i class="fa fa-edit"></i> Input Tagihan
                                            </a>
                                            <?php } else { ?>
                                            <?php } ?>
                                        </td>
                                        <td><?php if($setF->AppTagihan === 1){ ?>
                                            <a href="<?php echo site_url('penagihan/UpdTagList')."?id=".$setF->ID; ?>" class="btn btn-circle yellow-gold"><i class="fa fa-pencil"></i> Update</a>
                                            <?php } else { ?>
                                            <?php } ?>
                                        </td>
                                        <td><?php if($setF->AppTagihan === 1){ ?>
                                            <a href="<?php echo site_url('penagihan/cekTagList')."?id=".$setF->ID; ?>" class="btn btn-circle red">                                              
                                                <i class="fa fa-book"></i> Periksa </a>
                                            <?php } else { ?>
                                            <?php } ?>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>                   
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-12">                   
                <div class="portlet light">
                    <div class="portlet-title">
                        <div class="caption">                            
                            <span class="caption-subject font-green-sharp bold uppercase">Penagihan Listrik Mess Non Kwh</span>
                        </div>
                    </div>
                    
                    <div class="portlet-body">
                        <div class="table-toolbar">
                            <div class="row">
                                
                                <div class="col-md-3">
                                    <div class="btn-group">
                                        <?php  foreach ($almtList as $set) : ?>
                                        <a id="table_kwh_new" class="btn btn-circle green-haze" href='<?php echo base_url("penagihan/add_List")."?id=".$set->IDBlok; ?>'>
                                            <i class="fa fa-plus"></i> Tambah Tagihan
                                        </a>
                                        <?php endforeach; ?>
                                    </div>
                                    <div class="btn-group">
                                        <a id="table_flow_new" class="btn btn-circle btn-danger" href='<?php echo base_url("penagihan/listrik"); ?>'>
                                            <i class="fa fa-undo"></i> Kembali 
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <table id="table_hitTagListNon" cellspacing="0" cellpadding="0" class="table table-bordered table-striped table-condensed flip-content flip-scroll">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Mess</th>                                        
<!--                                    <th>No Kwh Mtr</th>-->
                                    <th>Periode</th>                                    
<!--                                    <th>Pemakaian</th>-->
                                    <th>Biaya</th>
                                    <th>Denda</th>
                                    <th>Status</th>
<!--                                    <th>Input Tagihan</th>-->
                                    <th>Update Tagihan</th>
                                    <th>Periksa Laporan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no2 = 0; foreach ($alamatList2 as $setF){ ?>
                                    <tr>
                                        <td><?php echo ++$no2; ?></td>
                                        <td><strong><?php $this->load->model('m_penagihan'); $a = $this->m_penagihan->selectAlamat($setF->IDMess);
                                            foreach ($a as $set): echo $set->Nama; endforeach; ?></strong></td>
<!--                                        <td><strong><?php echo $setF->Nomor; ?></strong></td>-->
                                        <td><strong><?php echo $setF->Periode; ?></strong></td>                                        
<!--                                        <td <?php if ($setF->Pemakaian <= 15) { echo "style=\"background-color:#fd6969\""; }?>><strong><?php echo $setF->Pemakaian; ?></strong></td>-->
                                        <td><strong><?php echo $setF->Biaya; ?></strong></td>
                                        <td><strong><?php echo $setF->Denda; ?></strong></td>
                                        <td><?php if(($setF->ApproveStatus === 0)||($setF->ApproveStatus === NULL)){
                                                echo "<span class='label label-danger'>Belum Approve</span>";
                                            }else{
                                                echo "<span class='label label-success'>Approve</span>";
                                            } ?></td>
<!--                                        <td><?php if(($setF->ApproveStatus === 0)||($setF->ApproveStatus === NULL)){ ?>
                                            <a href="<?php echo site_url('penagihan/tagihList')."?id=".$setF->ID; ?>" class="btn btn-circle blue">
                                                <i class="fa fa-edit"></i> Input Tagihan
                                            </a>
                                            <?php } else { ?>
                                            <?php } ?>
                                        </td>-->
                                        <td><?php if($setF->ApproveStatus === 1){ ?>
                                            <a href="<?php echo site_url('penagihan/UpdTagListNon')."?id=".$setF->HeaderID; ?>" class="btn btn-circle yellow-gold"><i class="fa fa-pencil"></i> Update</a>
                                            <?php } else { ?>
                                            <?php } ?>
                                        </td>
                                        <td><?php if($setF->ApproveStatus === 1){ ?>
                                            <a href="<?php echo site_url('penagihan/cekTagListNon')."?id=".$setF->HeaderID; ?>" class="btn btn-circle red">                                              
                                                <i class="fa fa-book"></i> Periksa</a>
                                            <?php } else { ?>
                                            <?php } ?>
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
    var table = $('#table_hitTagList');

        $.extend(true, $.fn.DataTable.TableTools.classes, {
            "container": "btn-group tabletools-btn-group pull-right",
            "buttons": {
                "normal": "btn btn-sm default",
                "disabled": "btn btn-sm default disabled"
            }
        });

        var oTable = table.dataTable({

            "language": {
                "aria": {
                    "sortAscending": ": activate to sort column ascending",
                    "sortDescending": ": activate to sort column descending"
                },
                "emptyTable": "No data available in table",
                "info": "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
                "infoEmpty": "Tidak Ada Data",
                "infoFiltered": "(filter 1 dari _MAX_ total data)",
                "lengthMenu": "Tampilkan _MENU_ data",
                "search": "Cari Data:",
                "zeroRecords": "Data Tidak Ditemukan"
            },

            "order": [
                [0, 'asc']
            ],
            "lengthMenu": [
                [10, 25, 50, -1],
                [10, 25, 50, "All"] // change per page values here
            ],

            // set the initial value
            "pageLength": 10,
            "dom": "<'row' <'col-md-12'T>><'row'<'col-md-6 col-sm-12'l><'col-md-6 col-sm-12'f>r><'table-scrollable't><'row'<'col-md-5 col-sm-12'i><'col-md-7 col-sm-12'p>>", // horizobtal scrollable datatable
            
            "tableTools": {
                "sSwfPath": "<?php echo base_url();?>assets/global/plugins/datatables/extensions/TableTools/swf/copy_csv_xls_pdf.swf",
                "aButtons": [{
                    "sExtends": "pdf",
                    "sButtonText": "PDF"
                }, {
                    "sExtends": "csv",
                    "sButtonText": "CSV"
                }, {
                    "sExtends": "xls",
                    "sButtonText": "Excel"
                }, {
                    "sExtends": "print",
                    "sButtonText": "Print",
                    "sInfo": 'Silahkan tekan "CTRL+P" untuk print atau "ESC" untuk keluar',
                    "sMessage": "Generated by DataTables"
                }, {
                    "sExtends": "copy",
                    "sButtonText": "Copy"
                }]
            }
        });

        var tableWrapper = $('#table_hitTagList_wrapper'); // datatable creates the table wrapper by adding with id {your_table_jd}_wrapper
        tableWrapper.find('.dataTables_length select').select2(); // initialize select2 dropdown
</script>
<script>
    var table = $('#table_hitTagListNon');

        $.extend(true, $.fn.DataTable.TableTools.classes, {
            "container": "btn-group tabletools-btn-group pull-right",
            "buttons": {
                "normal": "btn btn-sm default",
                "disabled": "btn btn-sm default disabled"
            }
        });

        var oTable = table.dataTable({

            "language": {
                "aria": {
                    "sortAscending": ": activate to sort column ascending",
                    "sortDescending": ": activate to sort column descending"
                },
                "emptyTable": "No data available in table",
                "info": "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
                "infoEmpty": "Tidak Ada Data",
                "infoFiltered": "(filter 1 dari _MAX_ total data)",
                "lengthMenu": "Tampilkan _MENU_ data",
                "search": "Cari Data:",
                "zeroRecords": "Data Tidak Ditemukan"
            },

            "order": [
                [0, 'asc']
            ],
            "lengthMenu": [
                [10, 25, 50, -1],
                [10, 25, 50, "All"] // change per page values here
            ],

            // set the initial value
            "pageLength": 10,
            "dom": "<'row' <'col-md-12'T>><'row'<'col-md-6 col-sm-12'l><'col-md-6 col-sm-12'f>r><'table-scrollable't><'row'<'col-md-5 col-sm-12'i><'col-md-7 col-sm-12'p>>", // horizobtal scrollable datatable
            
            "tableTools": {
                "sSwfPath": "<?php echo base_url();?>assets/global/plugins/datatables/extensions/TableTools/swf/copy_csv_xls_pdf.swf",
                "aButtons": [{
                    "sExtends": "pdf",
                    "sButtonText": "PDF"
                }, {
                    "sExtends": "csv",
                    "sButtonText": "CSV"
                }, {
                    "sExtends": "xls",
                    "sButtonText": "Excel"
                }, {
                    "sExtends": "print",
                    "sButtonText": "Print",
                    "sInfo": 'Silahkan tekan "CTRL+P" untuk print atau "ESC" untuk keluar',
                    "sMessage": "Generated by DataTables"
                }, {
                    "sExtends": "copy",
                    "sButtonText": "Copy"
                }]
            }
        });

        var tableWrapper = $('#table_hitTagListNon_wrapper'); // datatable creates the table wrapper by adding with id {your_table_jd}_wrapper
        tableWrapper.find('.dataTables_length select').select2(); // initialize select2 dropdown
</script>