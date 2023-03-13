<div class="page-head">
    <div class="container-fluid">            
        <div class="page-title">
            <h1>Monitoring <small>Tagihan Listrik Mess</small></h1>
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
                            <span class="caption-subject font-green-sharp bold uppercase">Monitoring Tagihan Listrik Mess</span>
                        </div>
                    </div>

                    <div class="portlet-body form"> 
                        <?php foreach ($getData as $row): ?>
                            <form action="<?php echo site_url('hsl_akhir/'); ?>" id="form_tagListrik" method="post" role="form" class="form-horizontal">
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-md-12">                                            
                                            <div class="form-group">                                        
                                                <label class="control-label col-md-3">Alamat Mess 
                                                </label>
                                                <div class="col-md-6">                                                
                                                    <input type="text"  class="form-control"  value="<?php $this->load->model('m_hsl_akhir'); $a = $this->m_hsl_akhir->selectAlamat($row->IDMess);
                                                        foreach ($a as $setM): echo $setM->Nama; endforeach; ?>" />
                                                </div>
                                            </div>
                                            <div class="form-group"> 
                                                <label class="control-label col-md-3">Nomor Kwh Meter
                                                </label>
                                                <div class="col-md-6">
                                                    <input type="text"  class="form-control" name="txtKwh"  value="<?php echo $row->Nomor ?>" />
                                                </div>
                                            </div>

                                            <table class="table table-bordered table-striped table-condensed flip-content flip-scroll" id="monitoringKM" >
                                                <thead>
                                                    <tr>
                                                        <th class="text-center" style="width:2px">No</th>
                                                        <th class="text-center" style="width:77px">Periode</th>
                                                        <th class="text-center" style="width:37px">Beban Awal (kWh)</th>
                                                        <th class="text-center" style="width:37px">Beban Akhir (kWh)</th>
                                                        <th class="text-center" style="width:25px">Pemakaian</th>
                                                        <th class="text-center" style="width:65px">Biaya</th>
                                                        <th class="text-center" style="width:190px">Dilaporkan Oleh / Tanggal</th>
                                                        <th class="text-center" style="width:190px">Dicek Oleh / Tanggal</th>
                                                        <th class="text-center" style="width:190px">Disetujui Oleh / Tanggal</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $no = 0; foreach($monitoring_list as $a){
                                                        echo '<tr>';
                                                        echo '<td class="text-center">'.++$no.'</td>';
                                                        echo '<td><input type="text" class="form-control" name="txtNama[]" value="'.$a->Periode.'"></td>';
                                                        echo '<td><input type="text" class="form-control" name="txtNIK[]" value="'.$a->KwhAwal.'"></td>';
                                                        echo '<td><input type="text" class="form-control" name="txtDept[]" value="'.$a->Kwh.'"></td>';
                                                        echo '<td><input type="text" class="form-control" name="txtCV[]" value="'.$a->Pemakaian.'" ></td>';
                                                        echo '<td><input type="text" class="form-control" name="txtTagihan[]" value="'.$a->TtlBiaya.'" ></td>';
                                                        echo '<td><input type="text" class="form-control" name="txtTagihan[]" value="'.$a->CreatedBy.' / '.date ('d-M-Y', strtotime($a->CreatedDate)).'" ></td>';
                                                        echo '<td><input type="text" class="form-control" name="txtTagihan[]" value="'.$a->CheckBy.' / '.date ('d-M-Y', strtotime($a->CheckDate)).'" ></td>';
                                                        echo '<td><input type="text" class="form-control" name="txtTagihan[]" value="'.$a->ApproveBy.' / '.date ('d-M-Y', strtotime($a->ApproveDate)).'" ></td>';
                                                        echo '</tr>';                                                            
                                                    } ?>                                                        
                                                </tbody>
                                            </table>               
                                        </div>
                                    </div>
                                </div>

                                <div class="form-actions">
                                    <div class="row">
                                        <div class="col-md-offset-3 col-md-9">
<!--                                            <button type="submit" class="btn btn-circle btn-primary" name="simpan" value="submit"><i class="fa fa-floppy-o"></i> Approve</button>-->
                                            <input type="button" class="btn btn-circle btn-danger" value="Kembali" onclick="history.back(-1)" />
                                        </div>
                                    </div>
                                </div>
                           </form> 
                        <?php endforeach; ?>
                    </div>
                </div>                    
            </div>
        </div>            
    </div>
</div>

<script>
    var table = $('#monitoringKM');

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
                "emptyTable": "Tidak Ada Data Yang Ditampilkan",
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

        var tableWrapper = $('#monitoringKM_wrapper'); // datatable creates the table wrapper by adding with id {your_table_jd}_wrapper
        tableWrapper.find('.dataTables_length select').select2(); // initialize select2 dropdown
</script>