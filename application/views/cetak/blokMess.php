  
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
                                <form action="<?php echo site_url('cetak/PeriKwitansi'); ?>" id="form_kwitansi" method="post" role="form" class="form-horizontal">                                        
                                    <label class="col-md-3 uppercase">Periode Cetak kwitansi <span class="required">
                                                        * </span>
                                    </label>
                                    <?php foreach ($getData as $row): ?>
                                    <input type="hidden"  class="form-control" name="txtIDBlok"  value="<?php echo $row->IDBlok ?>" readonly=""/>
                                    <?php endforeach; ?>
                                    <div class="col-md-3">
                                        <div class="input-group input-big date date-picker" data-date-format="mm/yyyy" data-date-viewmode="years" data-date-minviewmode="months">
                                            <input type="text" class="form-control"  name="txtPeriode">
                                            <span class="input-group-btn">
                                            <button class="btn default" type="button"><i class="fa fa-calendar"></i></button>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="btn-group">
                                            <button type="submit" name="submit" class="btn btn-circle green-haze" >
                                                Proses
                                            </button>
                                        </div>
                                        <div class="btn-group">
                                            <a id="table_flow_new" class="btn btn-circle btn-danger" href='<?php echo base_url("cetak/index"); ?>'>
                                                <i class="fa fa-undo"></i> Kembali 
                                            </a>
                                        </div>
                                    </div>
                                </form>                                                                    
                            </div>
<!--                            <div class="row">
                                <div class="col-md-6">                                    
                                    <div class="btn-group">
                                        <a id="table_flow_new" class="btn btn-circle btn-danger" href='<?php echo base_url("cetak/index"); ?>'>
                                            <i class="fa fa-undo"></i> Kembali 
                                        </a>
                                    </div>
                                </div>
                            </div>-->
                        </div>
                        <div class="table-toolbar">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="alert alert-success">
                                        <h5 class="uppercase"><strong>Periode cetak kwitansi : <?php echo $perKwitansi; ?></strong></h5>                                    
                                    </div>
                                </div>
                            </div>
                        </div>

                        <table id="table_mess" cellspacing="0" cellpadding="0" class="table table-bordered table-striped table-condensed flip-content flip-scroll">
                            <thead class="flip-content">
                                <tr>
                                    <th>No</th>
                                    <th>Nama Mess</th>
                                    <th>Nomor Kwh Meter</th>
                                    <th>Nomor Flow Meter</th>                                                                                                                       
                                    <th>Proses Kwitansi</th>
<!--                                    <th>Cetak Kwitansi</th>-->
                                </tr>
                            </thead>
                            <tbody>
                                <?php $n = 0; foreach ($getMess as $setM) { ?>
                                    <tr >
                                        <td><?php echo ++$n; ?></td>
                                        <td><strong><?php echo $setM->Nama; ?></strong></td>
                                        <td><strong><?php $this->load->model('m_cetak'); $K = $this->m_cetak->selectKwh($setM->IDKwh);
                                            foreach ($K as $set): echo $set->Nomor; endforeach; ?></strong></td>                                        
                                        <td><strong><?php $this->load->model('m_cetak'); $F = $this->m_cetak->selectFlow($setM->IDFlowMtr);
                                            foreach ($F as $set): echo $set->Nomor; endforeach; ?></strong></td>
                                        <?php if ($this->session->userdata('perKwitansi') == NULL){ ?>
                                        <td class="uppercase"><strong>Silahkan Pilih Bulan Dahulu</strong></td>                                        
                                        <?php } else { ?>
                                        <td>
                                            <a href="<?php echo site_url('cetak/inputKwitansi')."?id=".$setM->IDMess; ?>" class="btn btn-circle blue">
                                                <i class="fa fa-edit"></i> Proses</a>
                                        </td>
                                        <?php } ?>
<!--                                        <td>
                                            <a href="<?php echo site_url('cetak/printKwitansi')."?id=".$setM->IDMess; ?>" class="btn btn-circle blue">
                                                <i class="fa fa-edit"></i> cetak</a>
                                        </td>-->
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
    var table = $('#table_mess');

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