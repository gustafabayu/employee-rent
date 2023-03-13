<div class="page-head">
    <div class="container-fluid">            
        <div class="page-title">
            <h1>kWh Meter <small>Daftar kWh Meter Mess</small></h1>
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
                            <span class="caption-subject font-green-sharp bold uppercase">Daftar KWH Meter Mess</span>
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
                                            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'></button> Data behasil <b>ditambah</b>..</div>";
                                } elseif ($this->input->get('msg') == 'failed') {
                                    echo "<div class='alert alert-danger alert-dismissable'>
                                            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'></button> Data tidak behasil <b>ditambah</b>..</div>";
                                } elseif ($this->input->get('msg') == 'success_delete') {
                                    echo "<div class='alert alert-success alert-dismissable'>
                                                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'></button> Data behasil <b>dihapus</b>..</div>";
                                } elseif ($this->input->get('msg') == 'failed_delete') {
                                    echo "<div class='alert alert-danger alert-dismissable'>
                                                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'></button> Data tidak behasil <b>dihapus</b>..</div>";
                                }?>
                                <div class="col-md-6">
                                    <div class="btn-group">
                                        <?php  foreach ($almtList as $set) : ?>
                                            <a id="table_kwh_new" class="btn btn-circle green-haze" href='<?php echo base_url("kwh_mtr/addKwh")."?id=".$set->IDBlok; ?>'>
                                                <i class="fa fa-plus"></i> Tambah Data
                                            </a>
                                        <?php endforeach; ?>
                                    </div>
                                    <div class="btn-group">
                                        <a id="table_flow_new" class="btn btn-circle btn-danger" href='<?php echo base_url("kwh_mtr/index"); ?>'>
                                            <i class="fa fa-undo"></i> Kembali 
                                        </a>
                                    </div>
                                </div>                                
                            </div>
                        </div>

                        <table id="table_kwh" cellspacing="0" cellpadding="0" class="table table-bordered table-striped table-condensed flip-content flip-scroll">
                            <thead class="flip-content">
                                <tr>
                                    <th>No</th>
                                    <th>Alamat</th>
                                    <th>Nomor Kwh Meter</th>
                                    <th>Merk</th>
                                    <th>Spesifikasi</th>
                                    <th>Tanggal Pasang</th>
                                    <th>Tipe Pemakai</th>
                                    <th>Keterangan</th>                                                                                                                                                              
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 0; foreach ($getKwh as $setK) { ?>
                                    <tr>
                                        <td><?php echo ++$no; ?></td>
                                        <td><strong><?php $this->load->model('m_kwh_mtr'); $a = $this->m_kwh_mtr->selectAlamat($setK->IDMess);
                                            foreach ($a as $set): echo $set->Nama; endforeach; ?></strong></td>
                                        <td><strong><?php echo $setK->Nomor; ?></strong></td>
                                        <td><?php echo $setK->Merk; ?></td>
                                        <td><?php echo $setK->Spesifikasi; ?></td>
                                        <td><?php echo $setK->TglPasang; ?></td>
                                        <td><strong><?php $this->load->model('m_kwh_mtr'); $b = $this->m_kwh_mtr->getList($setK->TipePakai);
                                            foreach ($b as $setA): echo $setA->TipeMCB; endforeach; ?></strong></td>
                                        <td><?php echo $setK->Ket; ?></td>
                                        <td>
                                            <a href="<?php echo site_url('kwh_mtr/editKwh') . "?id=" . $setK->IDKwh; ?>" class="btn btn-circle blue">
                                                <i class="fa fa-edit"></i> Ubah
                                            </a>
    <!--                                                <a href="<?php echo site_url('kwh_mtr/delKwh') . "?id=" . $setK->IDKwh; ?>" class="btn btn-circle btn-xs red"
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
    var table = $('#table_kwh');

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

        var tableWrapper = $('#table_kwh_wrapper'); // datatable creates the table wrapper by adding with id {your_table_jd}_wrapper
        tableWrapper.find('.dataTables_length select').select2(); // initialize select2 dropdown
</script>