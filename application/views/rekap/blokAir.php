<div class="page-head">
    <div class="container-fluid">            
        <div class="page-title">
            <h1>Rekap <small>Tagihan Air Mess</small></h1>
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
                            <span class="caption-subject font-green-sharp bold uppercase">Rekap Bulanan Tagihan Air</span>
                        </div>
                    </div>
                    
                    <div class="portlet-body">
                        <div class="table-toolbar">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="alert alert-success">
                                        <h5 class="uppercase"><strong>Periode Muncul : <?php echo $periodeaktif; ?></strong></h5>                                    
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
                                } ?>
                                <div class="col-md-4">

                                    <div class="btn-group">
                                        <a id="table_flow_new" class="btn btn-circle btn-danger" href='<?php echo base_url("rekap/air"); ?>'>
                                            <i class="fa fa-undo"></i> Kembali 
                                        </a>
                                    </div>
                                </div>                                
                            </div>
                        </div>

                        <table id="table_flowmtr" cellspacing="0" cellpadding="0" class="table table-bordered table-striped table-condensed flip-content flip-scroll">
                            <thead class="flip-content">
                                <tr>
                                    <th>No</th>
                                    <th>Alamat</th>
                                    <th>No Flow Mtr</th>
                                    <th>Periode</th>
                                    <th>Pemakaian</th>
                                    <th>Biaya</th>
                                    <th>Nama</th>
                                    <th>NIK</th>
                                    <th>Dept</th>
                                    <th>CV</th>
                                    <th>Tagihan</th>
                                    <th>Tunggakan</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 0; foreach ($alamatAir as $set){ ?>
                                    <tr>
                                        <td><strong><?php echo ++$no; ?></strong></td>
                                        <td><strong><?php $this->load->model('m_rekap'); $b = $this->m_rekap->almtMess($set->IDMess);
                                            foreach ($b as $setB): echo $setB->Nama; endforeach;?></strong></td>
                                        <td><strong><?php echo $set->Nomor; ?></strong></td>
                                        <td><strong><?php echo $set->Periode; ?></strong></td>
                                        <td><strong><?php echo $set->Pemakaian; ?></strong></td>
                                        <td><strong><?php echo $set->Biaya; ?></strong></td>
                                        <td><strong><?php echo $set->Nama; ?></strong></td>
                                        <td><strong><?php echo $set->NIK; ?></strong></td>
                                        <td><strong><?php echo $set->Dept; ?></strong></td>
                                        <td><strong><?php echo $set->CV; ?></strong></td>
                                        <td><strong><?php echo $set->Tagihan; ?></strong></td>
                                        <td><strong><?php echo $set->Tunggakan; ?></strong></td>
                                        <td><strong><?php echo $set->Total; ?></strong></td>
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
    var table = $('#table_flowmtr');

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

        var tableWrapper = $('#table_flowmtr_wrapper'); // datatable creates the table wrapper by adding with id {your_table_jd}_wrapper
        tableWrapper.find('.dataTables_length select').select2(); // initialize select2 dropdown
</script>
