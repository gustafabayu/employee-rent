<div class="page-head">
    <div class="container-fluid">            
        <div class="page-title">
            <h1>Penghuni <small>Daftar Penghuni Mess</small></h1>
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
                            <span class="caption-subject font-green-sharp bold uppercase">Ubah Penghuni Mess</span>
                        </div>
                    </div>

                    <div class="portlet-body form">
                        <?php foreach ($getPenghuni as $row): ?>
                            <form action="<?php echo site_url('penghuni/updateData'); ?>" id="form_penghuni" method="post" role="form" class="form-horizontal">
                                <div class="form-body row">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="alert alert-danger display-hide">
                                                <button class="close" data-close="alert"></button>
                                                Terdapat kesalahan pada penginputan. Periksa kembali data yang anda input!
                                            </div>
                                            <div class="alert alert-success display-hide">
                                                <button class="close" data-close="alert"></button>
                                                Data berhasil disimpan!
                                            </div>
                                            <input type="hidden" name="txtHeaderID"  class="form-control" value="<?php echo $row->HeaderID; ?>" required=""/>                                           
                                            <input type="hidden" name="txtIDBlok"  class="form-control" value="<?php echo $row->IDBlok; ?>" />                                            
                                            <div class="form-group">                                        
                                                <label class="control-label col-md-3">Pilih Mess <span class="required">
                                                        * </span>
                                                </label>
                                                <div class="col-md-6">
                                                    <select class="form-control select2me" name="txtAlamat" id="txtAlamat">
                                                        <?php foreach ($getMess as $set):
                                                            if ($set->IDMess == $row->IDMess) {
                                                                echo'<option value="' . $set->IDMess . '" selected>' . $set->Nama . '</option>';
                                                                ?>                                                                
                                                                <?php
                                                            } else {
                                                                echo '<option value="' . $set->IDMess . '">' . $set->Nama . '</option>';
                                                                ?>                                                                
                                                        <?php } endforeach; ?>
                                                    </select>
                                                </div>
                                            </div>
                                            
                                            <script type="text/javascript">
                                                $('#txtAlamat').change(function () {
                                                    var txtAlamat = {txtAlamat: $("#txtAlamat").val()};
                                                    $.ajax({
                                                        type: "POST",
                                                        url: "<?php echo site_url('penghuni/mess_get_detail') ?>",
                                                        data: txtAlamat,
                                                        success: function (msg) {
                                                            $('#div_mess').html(msg);
                                                        }
                                                    });
                                                });
                                            </script>
                                            
                                            <div id="div_mess">
                                                <div class="form-group">                                        
                                                    <label class="control-label col-md-3">Tipe Mess 
                                                    </label>
                                                    <div class="col-md-6">                                                    
                                                        <input type="text" class="form-control" id="txtTipe" name="txtTipe" readonly="readonly" value="<?php $this->load->model('m_mess'); $M = $this->m_mess->selectMess($row->IDTipe); foreach ($M as $set): echo $set->TipeMess; endforeach;?>"/>                                                    
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-md-3">Nomor Kwh Meter 
                                                    </label>
                                                    <div class="col-md-6">                                            
                                                        <input type="text" class="form-control" id="txtKwh" name="txtKwh" readonly="readonly" value="<?php $this->load->model('m_mess'); $K = $this->m_mess->selectKwh($row->IDKwh); foreach ($K as $set): echo $set->Nomor; endforeach; ?>"/>                                                                                                
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-md-3">Nomor Flow Meter 
                                                    </label>
                                                    <div class="col-md-6">                                            
                                                        <input type="text" class="form-control" id="txtFlow" name="txtFlow" readonly="readonly" value="<?php $this->load->model('m_mess'); $F = $this->m_mess->selectFlow($row->IDFlowMtr); foreach ($F as $set): echo $set->Nomor; endforeach; ?>"/>                                                                                                
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-md-3">Jumlah Kamar 
                                                    </label>
                                                    <div class="col-md-6">                                            
                                                        <input type="text" class="form-control" id="txtJumlah" name="txtJumlah" readonly="readonly" value="<?php echo $row->JmlKamar; ?>"/>                                                                                                
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="form-body row">                                
                                    <div class="col-md-12">
                                        <div class="table-toolbar">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="btn-group">
                                                        <a class="btn btn-circle purple-wisteria" data-target="#modal_karyawan" data-toggle="modal">
                                                            <i class="fa fa-plus"></i>
                                                            Karyawan
                                                        </a>
                                                    </div>
                                                    <div class="btn-group">
                                                        <a class="btn btn-circle grey-cascade" data-target="#modal_borongan" data-toggle="modal">
                                                            <i class="fa fa-plus"></i>
                                                            Borongan
                                                        </a>
                                                    </div>
                                                    <div class="btn-group">
                                                        <a id="add_row" class="btn btn-circle yellow-casablanca" >
                                                            <i class="fa fa-plus"></i>
                                                            Tidak
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>										
                                        </div>
                                        
                                        <div class="table-responsive">
                                            <table class="table table-bordered table-striped table-condensed flip-content flip-scroll" cellspacing="0" cellpadding="0" id="tbl_keluarga">
                                                <thead >
                                                    <tr>
                                                        <th scope="col" class="text-center" style="width:40px">!</th>
                                                        <th scope="col" class="text-center" style="width:50px">No Kamar</th>
                                                        <th scope="col" class="text-center hide">RegNo</th>
                                                        <th scope="col" class="text-center hide">FixNo</th>
                                                        <th scope="col" class="text-center" style="width:250px">Nama</th>
                                                        <th scope="col" class="text-center" style="width:53px">NIK</th>
                                                        <th scope="col" class="text-center" style="width:47px">Dept</th>
                                                        <th scope="col" class="text-center" style="width:220px">CV</th>
                                                        <th scope="col" class="text-center">Keterangan</th>
<!--                                                        <th scope="col" class="text-center">Jabatan</th>-->
                                                        <th scope="col" class="text-center" style="width:110px">Hubungan</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="addr">
                                                    <?php                                                         
                                                        foreach($isi_mess as $m){                                                            
                                                            echo '<tr class="records">';
                                                            echo '<td><input type="button" class="btn default btn-sm red-stripe remove_item" onclick="removeRow(this)" value="Hapus"><input name="rows[]" type="hidden"></td>';
                                                            echo '<td><input name="txtNo[]" type="text" class="form-control "  value="'.$m->NoKmr.'"/></td>';
                                                            echo '<td class="hide"><input name="txtRegNo[]" type="text" class="form-control "  value="'.$m->RegNo.'"/></td>';
                                                            echo '<td class="hide"><input name="txtFixNo[]" type="text" class="form-control "  value="'.$m->FixNo.'"/></td>';
                                                            echo '<td><input name="txtNama[]" type="text" class="form-control " value="'.$m->Nama.'"/><input type="hidden" class="form-control " name="txtTKID[]" value="'.$m->TKID.'"></td>';
                                                            echo '<td><input name="txtNIK[]" type="text" class="form-control "  value="'.$m->NIK.'"/></td>';
                                                            echo '<td><input name="txtDept[]" type="text" class="form-control " value="'.$m->NamaDept.'"/></td>';
                                                            echo '<td><input name="txtCV[]" type="text" class="form-control "  value="'.$m->NamaCV.'"/></td>';
                                                            echo '<td><input name="txtKet[]" type="text" class="form-control "  value="'.$m->Ket.'"/></td>';
                                                            echo '<td><select class="form-control " name="txtHub[]" ><option value="'.$m->Hub.'">'.$m->Hub.'</option><option value="">*Pilih</option><option value="Suami">Suami</option><option value="Istri">Istri</option><option value="Anak">Anak</option><option value="Mertua">Mertua</option><option value="Orang Tua">Orang Tua</option><option value="Ipar">Ipar</option><option value="Sepupu">Sepupu</option><option value="Adik">Adik</option><option value="Kakak">Kakak</option><option value="Cucu">Cucu</option><option value="Ponakan">Ponakan</option><option value="Janda">Janda</option></select></td>';
                                                            echo '</tr>';
                                                        }                                                        
                                                    ?>
                                                </tbody>
                                            </table>                                            
                                        </div>
                                    </div>
                                </div>

                                <div class="form-actions">
                                    <div class="row">
                                        <div class="col-md-offset-3 col-md-9">
                                            <button type="submit" class="btn btn-circle btn-primary" name="simpan" value="submit"><i class="fa fa-floppy-o"></i> Simpan</button>
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

<div id="add_karyawan">
    <div id="modal_karyawan" class="modal fade bs-modal-lg" role="dialog" tabindex="-1" data-backdrop="static" data-keyboard="false" aria-hidden="true" data-width="75%">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <div class="row">
                        <div class="col-md-5">
                            <div class="input-group">					
                                <input id="input_keluarga" name="input_keluarga" class="form-control" type="text" placeholder="Ketikkan NIK" >
                                <span class="input-group-btn">
                                    <button type="button" id="cari_keluarga" class="btn blue" style="border-width: 1px;">
                                        <i class="icon-magnifier"></i>
                                    </button>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-body padding-5">
                    <div id="table_container">
                        <div class="v-scroll">
                            <table id="tbl_karyawan" class="table table-condensed table-hover table-fixed">
                                <thead>
                                    <tr>
                                        <th >#</th>
                                        <th >Nama</th>
                                        <th>NIK</th>
                                        <th >Departemen</th>
                                        <th class="hide">Bagian</th>
                                        <th class="hide">Jabatan</th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">        
                    <button type="button" data-dismiss="modal" class="btn btn-default">Cancel</button>
                    <!--<button type="button" data-dismiss="modal" class="btn blue">Select</button>-->
                </div>
            </div> 
        </div>    
    </div>
</div>
<div id="add_borongan">
    <div id="modal_borongan" class="modal fade bs-modal-lg" role="dialog" tabindex="-1" data-backdrop="static" data-keyboard="false" aria-hidden="true" data-width="75%">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <div class="row">
                        <div class="col-md-5">
                            <div class="input-group">					
                                <input id="input_borongan" name="input_borongan" class="form-control" type="text" placeholder="Ketikkan NIK" >
                                <span class="input-group-btn">
                                    <button type="button" id="cari_borongan" class="btn blue" style="border-width: 1px;">
                                        <i class="icon-magnifier"></i>
                                    </button>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-body padding-5">
                    <div id="table_borongan">
                        <div class="v-scroll">
                            <table id="tbl_borongan" class="table table-condensed table-hover table-fixed">
                                <thead>
                                    <tr>
                                        <th >#</th>
                                        <th >Nama</th>
                                        <th>NIK</th>
                                        <th >Departemen</th>                                        
                                        <th >CV</th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">        
                    <button type="button" data-dismiss="modal" class="btn btn-default">Cancel</button>
                    <!--<button type="button" data-dismiss="modal" class="btn blue">Select</button>-->
                </div>
            </div> 
        </div>    
    </div>
</div>

<script type="text/javascript">
    $('#cari_keluarga').click(function () {
        var search = {search:$("#input_keluarga").val()};
        $.ajax({
            type: "POST",
            url: "<?php echo site_url('penghuni/cari_karyawan') ?>",
            data: search,
            success: function (msg) {
                $('#table_container').html(msg);
            }
        });
    });
</script>
<script type="text/javascript">
    $('#cari_borongan').click(function () {
        var cari = {cari: $("#input_borongan").val()};
        $.ajax({
            type: "POST",
            url: "<?php echo site_url('penghuni/cari_borongan') ?>",
            data: cari,
            success: function (msg) {
                $('#table_borongan').html(msg);
            }
        });
    });
</script>

<script type="text/javascript">
    function removeRow(btn) {
            var row = btn.parentNode.parentNode;
            row.parentNode.removeChild(row);
    }
</script>

<script type="text/javascript">
    $(document).ready(function () {
        var i = <?php echo $count_dtl ?>;
        $("#add_row").click(function () {
            i += 1;
            $('#tbl_keluarga > tbody:last-child').append(
                '<tr class="records">'
                + '<td><input type="button" class="btn default btn-sm red-stripe remove_item" value="Hapus"><input name="rows[]" type="hidden"></td>'
                + '<td><input name="txtNo[]" type="text" placeholder="Kamar" class="form-control "/></td>'
                + '<td class="hide"><input name="txtRegNo[]" type="text"  class="form-control "/></td>'
                + '<td class="hide"><input name="txtFixNo[]"" type="text" class="form-control "/></td>'
                + '<td><input name="txtNama[]" type="text" placeholder="Nama Penghuni" class="form-control "/><input type="hidden" class="form-control " name="txtTKID[]" ></td>'
                + '<td><input name="txtNIK[]" type="text"  class="form-control "/></td>'
                + '<td><input name="txtDept[]" type="text"  class="form-control "/></td>'
                + '<td><input name="txtCV[]" type="text"  class="form-control "/></td>'
                + '<td><input name="txtKet[]" type="text"  class="form-control "/></td>'
                + '<td><select class="form-control " name="txtHub[]" ><option value="">*Pilih</option><option value="Suami">Suami</option><option value="Istri">Istri</option><option value="Anak">Anak</option><option value="Mertua">Mertua</option><option value="Orang Tua">Orang Tua</option><option value="Ipar">Ipar</option><option value="Sepupu">Sepupu</option><option value="Adik">Adik</option><option value="Kakak">Kakak</option><option value="Cucu">Cucu</option><option value="Ponakan">Ponakan</option><option value="Janda">Janda</option></select></td>'
                + '</tr>'
            );
        });

        $(".remove_item").live('click', function (ev) {
            if (ev.type === 'click') {
                $(this).parents(".records").fadeOut();
                $(this).parents(".records").remove();
            }
        });
    });
</script>
<script>
    var table = $('#tbl_keluarga');

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

        var tableWrapper = $('#tbl_keluarga_wrapper'); // datatable creates the table wrapper by adding with id {your_table_jd}_wrapper
        tableWrapper.find('.dataTables_length select').select2(); // initialize select2 dropdown
</script>