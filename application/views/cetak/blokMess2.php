<div class="page-head">
    <div class="container-fluid">           
        <div class="page-title">
            <h1>Mess Karyawan <small>Daftar Lengkap Mess Karyawan</small></h1>
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
                            <span class="caption-subject font-green-sharp bold uppercase">Daftar Mess Karyawan</span>
                        </div>                            
                    </div>

                    <div class="portlet-body">
                        <div class="table-toolbar">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="alert alert-success">
                                        <h5 class="uppercase"><strong>Periode aktif kwitansi : <?php echo $lihatKwitansi; ?></strong></h5>                                    
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
                                                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'></button> Data behasil <b>ditambahkan</b>..</div>";
                                } elseif ($this->input->get('msg') == 'failed') {
                                    echo "<div class='alert alert-danger alert-dismissable'>
                                                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'></button> Data gagal <b>ditambahkan</b>..</div>";
                                }?>                                                                                                    
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <?php foreach ($getData as $row): ?>
                                    <input type="hidden"  class="form-control" name="txtIDBlok"  value="<?php echo $row->IDBlok ?>" readonly=""/>
                                    <?php endforeach; ?>
                                    <div class="btn-group">
                                        <a id="table_flow_new" class="btn btn-circle btn-danger" href='<?php echo base_url("cetak/kwitansi"); ?>'>
                                            <i class="fa fa-undo"></i> Kembali 
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>                        

                        <table id="table_mess" cellspacing="0" cellpadding="0" class="table table-bordered table-striped table-condensed flip-content flip-scroll">
                            <thead class="flip-content">
                                <tr>
                                    <th>No Kwitansi</th>
                                    <th>Nama Mess</th>
                                    <th>Nomor Kwh Meter</th>
                                    <th>Nomor Flow Meter</th>
                                    <th>Bulan Tagih</th>
                                    <th>Nama Kena Tagihan</th>
                                    <th>Cetak Kwitansi</th>
                                    <th>Export Kwitansi</th>
                                    <th>Hapus Kwitansi</th>                                    
                                </tr>
                            </thead>
                            <tbody>
                                <?php $n = 0; foreach ($getMess as $setM) { ?>
                                    <tr >
                                        <td><?php echo $setM->HeaderID; ?></td>
                                        <td><strong><?php $this->load->model('m_cetak'); $K = $this->m_cetak->selectAlmt($setM->IDMess);
                                            foreach ($K as $set): echo $set->Nama; endforeach; ?></strong></td>
                                        <td><strong><?php echo $setM->NomorKM; ?></strong></td>                                        
                                        <td><strong><?php echo $setM->NomorFM; ?></strong></td>
                                        <td><strong><?php echo $setM->BulanTgh; ?></strong></td>
                                        <td><strong><?php echo $setM->Nama; ?></strong></td>
                                        <td>
                                            <a href="<?php echo site_url('cetak/printKwitansi')."?id=".$setM->DetailID; ?>" class="btn btn-circle blue" target="_blank">
                                                <i class="fa fa-print"></i> Cetak</a>
                                        </td>
                                        <td>
                                            <a href="<?php echo site_url('cetak/printKwitansi')."?id=".$setM->DetailID."&xls=1"; ?>" class="btn btn-circle green-seagreen" target="_blank">
                                                <i class="fa fa-file-excel-o"></i> Export To Excel</a>
                                        </td>
                                        <td>
<!--                                            <a href="<?php echo site_url('cetak/delKwitansi')."?id=".$setM->DetailID; ?>" class="btn btn-circle red">
                                                <i class="fa fa-trash"></i> Hapus</a>-->
                                            <a onclick="javascript:deleteConfirm('<?php echo site_url('cetak/delKwitansi')."?id=".$setM->HeaderID;?>');" deleteConfirm class="btn btn-circle red">
                                                <i class="fa fa-trash"></i> Hapus</a>
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

<script type="text/javascript"> 
function deleteConfirm(url)
 {
    if(confirm('Apakah Anda Yakin Ingin Hapus Data Ini?'))
    {
        window.location.href=url;
    }
 }
</script>
<script>
    var table = $('#table_mess');

        /* Table tools samples: https://www.datatables.net/release-datatables/extras/TableTools/ */

        /* Set tabletools buttons and button container */

        $.extend(true, $.fn.DataTable.TableTools.classes, {
            "container": "btn-group tabletools-btn-group pull-right",
            "buttons": {
                "normal": "btn btn-sm default",
                "disabled": "btn btn-sm default disabled"
            }
        });

        var oTable = table.dataTable({

            // Internationalisation. For more info refer to http://datatables.net/manual/i18n
            "language": {
                "aria": {
                    "sortAscending": ": activate to sort column ascending",
                    "sortDescending": ": activate to sort column descending"
                },
                "emptyTable": "Tidak ada data yang ditampilkan",
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

            // Uncomment below line("dom" parameter) to fix the dropdown overflow issue in the datatable cells. The default datatable layout
            // setup uses scrollable div(table-scrollable) with overflow:auto to enable vertical scroll(see: assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js). 
            // So when dropdowns used the scrollable div should be removed. 
            //"dom": "<'row' <'col-md-12'T>><'row'<'col-md-6 col-sm-12'l><'col-md-6 col-sm-12'f>r>t<'row'<'col-md-5 col-sm-12'i><'col-md-7 col-sm-12'p>>",

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

        var tableWrapper = $('#table_mess_wrapper'); // datatable creates the table wrapper by adding with id {your_table_jd}_wrapper
        tableWrapper.find('.dataTables_length select').select2(); // initialize select2 dropdown
</script>