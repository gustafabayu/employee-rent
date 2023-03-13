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
                            <span class="caption-subject font-green-sharp bold uppercase">Form Penagihan Tagihan Listrik Mess</span>
                        </div>
                    </div>

                    <div class="portlet-body form">                        
                        <form action="<?php echo site_url('penagihan/simTagList'); ?>" id="form_tagList" method="post" role="form" class="form-horizontal" onsubmit="return confirm('Anda Yakin Approve Data? Silahkan Cek Kembali');">
                            <?php foreach ($getData as $row): ?>
                            <div class="form-body row">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="hidden" name="txtID"  class="form-control" value="<?php echo $row->ID; ?>" />
                                        <input type="hidden" name="txtIDBlok"  class="form-control" value="<?php echo $row->IDBlok; ?>" />                                           
<!--                                            <div class="form-group">                                        
                                            <label class="control-label col-md-3">Alamat Mess 
                                            </label>
                                            <div class="col-md-6">
                                                <input type="hidden"  class="form-control" name="txtAlmt"  value="<?php echo $row->IDMess ?>" readonly=""/>
                                                <input type="text"  class="form-control" name="txtAlamat" value="<?php $this->load->model('m_penagihan'); $a = $this->m_penagihan->selectAlamat($row->IDMess);
                                                foreach ($a as $setM): echo $setM->Nama; endforeach; ?>" readonly=""/>
                                            </div>
                                        </div>-->
                                        <div class="form-group"> 
                                            <label class="control-label col-md-3">Nomor Kwh Meter
                                            </label>
                                            <div class="col-md-6">
                                                <input type="text"  class="form-control" name="txtKwh"  value="<?php echo $row->Nomor ?>" readonly=""/>
                                            </div>
                                        </div>
                                        <div class="form-group">                                        
                                            <label class="control-label col-md-3">Periode Bulan Tagihan 
                                            </label>
                                            <div class="col-md-6">                                                
                                                <input type="text"  class="form-control" name="txtPeriode" value="<?php echo $row->Periode ?>"  readonly=""/>                                                
                                            </div>
                                        </div>
                                        <div class="form-group">                                        
                                            <label class="control-label col-md-3">Beban Awal (Kwh)
                                            </label>
                                            <div class="col-md-6">
                                                <input type="text"  class="form-control" name="txtBebanAwal" value="<?php echo $row->KwhAwal ?>"  readonly=""/>
                                            </div>
                                        </div>
                                        <div class="form-group">                                        
                                            <label class="control-label col-md-3">Beban Akhir (Kwh)
                                            </label>
                                            <div class="col-md-6">
                                                <input type="text"  class="form-control" name="txtBebanAkhir" value="<?php echo $row->Kwh ?>"  readonly=""/>
                                            </div>
                                        </div>
                                        <div class="form-group">                                        
                                            <label class="control-label col-md-3">Pemakaian (Kwh)
                                            </label>
                                            <div class="col-md-6">
                                                <input type="text"  class="form-control" name="txtTtlBeban" value="<?php echo $row->Pemakaian ?>"  readonly=""
                                                       <?php if ($row->Pemakaian <= 15) { echo"style=\"background-color:#fd6969\""; } ?>/>
                                            </div>
                                        </div>                                            
                                        <div class="form-group">                                        
                                            <label class="control-label col-md-3">Total Biaya
                                            </label>
                                            <div class="col-md-6">                                                    
                                                <input type="text"  class="form-control" name="txtTtlBiaya" id="txtTtlBiaya" value="<?php echo $row->TtlBiaya ?>" onKeyUp="getValues()"/>
                                            </div>
                                        </div>
                                        <div class="form-group">                                        
                                            <label class="control-label col-md-3">Denda<span class="required">
                                                    * </span>
                                            </label>
                                            <div class="col-md-6">                                                    
                                                <input type="text"  class="form-control" name="txtDenda" id="txtDenda" value="<?php echo $row->Denda ?>" onKeyUp="getValues()" />
                                            </div>
                                        </div>        
                                        <div class="form-group">                                        
                                            <label class="control-label col-md-3">Jumlah Orang
                                            </label>
                                            <div class="col-md-6">                                                    
                                                <input type="text"  class="form-control" name="txtJumlah" id="txtJumlah" value="<?php echo $hitung ?>"  onKeyUp="getValues()"/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach; ?>

                            <div class="row">                                    
                                <div class="col-md-12">
<!--                                    <div class="table-toolbar">
                                        <div class="row">
                                            <div class="col-md-6">                                                
                                                <div class="btn-group">
                                                    <a class="btn btn-circle yellow-casablanca" data-target="#modal_karyawan" data-toggle="modal">
                                                        <i class="fa fa-plus"></i>
                                                        Tambah Penagihan
                                                    </a>
                                                </div>
                                            </div>
                                        </div>										
                                    </div>-->

                                    <div class="table-responsive">
                                        <table class="table table-bordered table-striped table-condensed flip-content flip-scroll" cellspacing="0" cellpadding="0" id="tbl_penagihan">
                                            <thead>
                                                <tr>
                                                    <th class="text-center" style="width:25px">!</th>
<!--                                                    <th class="text-center">No</th>-->
                                                    <th class="text-center" style="width:240px">Nama</th>
                                                    <th class="text-center" style="width:53px">NIK</th>
                                                    <th class="text-center" style="width:45px">Dept</th>
                                                    <th class="text-center" style="width:200px">CV</th>
                                                    <th class="text-center" style="width:130px">Keterangan</th>
                                                    <th class="text-center">Tagihan</th>
                                                    <th class="text-center">Tunggakan</th>
                                                    <th class="text-center">Total</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $no = 0; foreach($beban_list as $l){                                                            
                                                    echo '<tr class="records">';
                                                    echo '<td><input type="button" class="btn default btn-sm red-stripe remove_item" value="Hapus"></td>';
                                                    //echo '<td class="text-center">'.++$no.'</td>';
                                                    echo '<td><input type="text" class="form-control" name="txtNama[]" readonly value="'.$l->Nama.'"><input type="hidden" name="txtIDMess[]" value="'.$l->IDMess.'"></td>';
                                                    echo '<td><input type="text" class="form-control" name="txtNIK[]" readonly value="'.$l->NIK.'"><input type="hidden" name="txtTKID[]" value="'.$l->TKID.'"></td>';
                                                    echo '<td><input type="text" class="form-control" name="txtDept[]" readonly value="'.$l->NamaDept.'"></td>';
                                                    echo '<td><input type="text" class="form-control" name="txtCV[]" readonly value="'.$l->NamaCV.'"></td>';
                                                    echo '<td><input type="text" class="form-control" name="txtKet[]" readonly ></td>';
                                                    echo '<td><input type="text" class="form-control" name="txtTagihan[]" ></td>';
                                                    echo '<td><input type="text" class="form-control" name="txtTunggakan[]" onKeyUp="getValues()"></td>';
                                                    echo '<td><input type="text" class="form-control" name="txtTotal[]" ></td>';
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
                                        <button type="submit" class="btn btn-circle btn-primary" name="simpan" value="submit" ><i class="fa fa-floppy-o"></i> Approve</button>                                            
                                        <input type="button" class="btn btn-circle btn-danger" value="Kembali" onclick="history.back(-1)" />
                                    </div>
                                </div>
                            </div>
                        </form>                        
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
                                <input id="input_keluarga" name="input_keluarga" class="form-control" type="text" placeholder="Ketikkan Nama Lengkap" >
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
                            <table id="tbl_penagihan" class="table table-condensed table-hover table-fixed">
                                <thead>
                                    <tr>
                                        <th >#</th>
                                        <th >Nama</th>
                                        <th>NIK</th>
                                        <th >Dept</th>
                                        <th >CV</th>
                                        <th>Keterangan</th>                                        
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
        var search = {search: $("#input_keluarga").val()};
        $.ajax({
            type: "POST",
            url: "<?php echo site_url('penagihan/non_karyawan') ?>",
            data: search,
            success: function (msg) {
                $('#table_container').html(msg);
            }
        });
    });
</script>
<script type="text/javascript">
    $(document).ready(function () {
        $(".remove_item").live('click', function (ev) {
            if (ev.type === 'click') {
                $(this).parents(".records").fadeOut();
                $(this).parents(".records").remove();
            }
        });
    });
</script>

<script type="text/javascript">    
    function getValues() {
        var total = document.getElementById('txtTtlBiaya').value;
        var denda = document.getElementById('txtDenda').value;
        var jum = document.getElementById('txtJumlah').value;
        var obj = document.getElementsByTagName("input");
        for (var i = 0; i < obj.length; i++) {
            if (obj[i].name === "txtTagihan[]") {
                if ((total >= 0)&&(denda >= 0)) {
                    obj[i].value = ((eval(total) + eval(denda)) / eval(jum)).toFixed(0);
                }
                var biaya = obj[i].value;
                if (biaya < 6075) {
                    obj[i].value = 6075;
                }
            }
            if (obj[i].name === "txtTagihan[]") {
                var tagih = obj[i].value;
            }
            if (obj[i].name === "txtTunggakan[]") {
                var tungg = obj[i].value;
            }
            if (obj[i].name === "txtTotal[]") {
                if (tungg >= 0) {
                    obj[i].value = (eval(tagih) + eval(tungg)).toFixed(0);
                }                
            }
        } 
    }
</script>

<script type="text/javascript">
    $(document).ready(function () {
        //var i = </?php echo $count_dtl ?>;
        $("#add_row").click(function () {
            //i += 1;
            $('#tbl_penagihan > tbody:last-child').append(
                    '<tr class="records">'
                    + '<td><input type="button" class="btn default btn-sm red-stripe remove_item" value="Hapus"><input name="rows[]"  type="hidden"></td>'
                    + '<td><input name="txtNama[]" type="text" placeholder="Nama Penghuni" class="form-control "/><input type="hidden" class="form-control " name="txtTKID[]" ></td>'
                    + '<td><input name="txtNIK[]" type="text" placeholder="NIK" class="form-control "/></td>'
                    + '<td><input name="txtDept[]" type="text" placeholder="Departemen" class="form-control "/></td>'
                    + '<td><input name="txtCV[]" type="text" placeholder="CV" class="form-control "/></td>'
                    + '<td><input name="txtKet[]" type="text" placeholder="Keterangan" class="form-control "/></td>'
                    + '<td><input name="txtTagihan[]" type="text" placeholder="Tagihan Penghuni" class="form-control "/></td>'
                    + '<td><input name="txtTunggakan[]" type="text" placeholder="Tunggakan Penghuni" class="form-control "/></td>'
                    + '<td><input name="txtTotal[]" type="text" placeholder="Beban Total" class="form-control "/></td>'
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
    var table = $('#tbl_penagihan');

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
            
//            "tableTools": {
//                "sSwfPath": "<?php echo base_url();?>assets/global/plugins/datatables/extensions/TableTools/swf/copy_csv_xls_pdf.swf",
//                "aButtons": [{
//                    "sExtends": "pdf",
//                    "sButtonText": "PDF"
//                }, {
//                    "sExtends": "csv",
//                    "sButtonText": "CSV"
//                }, {
//                    "sExtends": "xls",
//                    "sButtonText": "Excel"
//                }, {
//                    "sExtends": "print",
//                    "sButtonText": "Print",
//                    "sInfo": 'Silahkan tekan "CTRL+P" untuk print atau "ESC" untuk keluar',
//                    "sMessage": "Generated by DataTables"
//                }, {
//                    "sExtends": "copy",
//                    "sButtonText": "Copy"
//                }]
//            }
        });

        var tableWrapper = $('#tbl_penagihan_wrapper'); // datatable creates the table wrapper by adding with id {your_table_jd}_wrapper
        tableWrapper.find('.dataTables_length select').select2(); // initialize select2 dropdown
</script>

<script text="text/javascript">
    $(document).ready(function(){
        var form3 = $('#form_tagList');
        var error3 = $('.alert-danger', form3);
        var success3 = $('.alert-success', form3);

        //IMPORTANT: update CKEDITOR textarea with actual content before submit
        form3.on('submit', function() {
            for(var instanceName in CKEDITOR.instances) {
                CKEDITOR.instances[instanceName].updateElement();
            }
        })

        form3.validate({
            errorElement: 'span', //default input error message container
            errorClass: 'help-block help-block-error', // default input error message class
            focusInvalid: false, // do not focus the last invalid input
            ignore: "", // validate all fields including form hidden input
            rules: {
                
                txtDenda: {
                    required: true
                }
            },

            messages: { // custom messages for radio buttons and checkboxes
                
                txtDenda: {
                    required: "Silahkan isi angka 0 jika tidak ada denda"
                },
                
            },

            errorPlacement: function (error, element) { // render error placement for each input type
                if (element.parent(".input-group").size() > 0) {
                    error.insertAfter(element.parent(".input-group"));
                } else if (element.attr("data-error-container")) { 
                    error.appendTo(element.attr("data-error-container"));
                } else if (element.parents('.radio-list').size() > 0) { 
                    error.appendTo(element.parents('.radio-list').attr("data-error-container"));
                } else if (element.parents('.radio-inline').size() > 0) { 
                    error.appendTo(element.parents('.radio-inline').attr("data-error-container"));
                } else if (element.parents('.checkbox-list').size() > 0) {
                    error.appendTo(element.parents('.checkbox-list').attr("data-error-container"));
                } else if (element.parents('.checkbox-inline').size() > 0) { 
                    error.appendTo(element.parents('.checkbox-inline').attr("data-error-container"));
                } else {
                    error.insertAfter(element); // for other inputs, just perform default behavior
                }
            },

            invalidHandler: function (event, validator) { //display error alert on form submit   
                success3.hide();
                error3.show();
                Metronic.scrollTo(error3, -200);
            },

            highlight: function (element) { // hightlight error inputs
               $(element)
                    .closest('.form-group').addClass('has-error'); // set error class to the control group
            },

            unhighlight: function (element) { // revert the change done by hightlight
                $(element)
                    .closest('.form-group').removeClass('has-error'); // set error class to the control group
            },

            success: function (label) {
                label
                    .closest('.form-group').removeClass('has-error'); // set success class to the control group
            },

            submitHandler: function (form) {
                success3.show();
                error3.hide();
                form[0].submit(); // submit the form
            }

        });

         //apply validation on select2 dropdown value change, this only needed for chosen dropdown integration.
        $('.select2me', form3).change(function () {
            form3.validate().element($(this)); //revalidate the chosen dropdown value and show error or success message for the input
        });

        // initialize select2 tags
        $("#select2_tags").change(function() {
            form3.validate().element($(this)); //revalidate the chosen dropdown value and show error or success message for the input 
        }).select2({
            tags: ["red", "green", "blue", "yellow", "pink"]
        });

        //initialize datepicker
        $('.date-picker').txtTglPasang({
            rtl: Metronic.isRTL(),
            autoclose: true
        });
        $('.date-picker .form-control').change(function() {
            form3.validate().element($(this)); //revalidate the chosen dropdown value and show error or success message for the input 
        });
    });
</script>