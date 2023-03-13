<div class="page-head">
    <div class="container-fluid">            
        <div class="page-title">
            <h1>Penagihan <small>Tagihan Air Mess</small></h1>
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
                            <span class="caption-subject font-green-sharp bold uppercase">Form Penagihan Tagihan Air Mess</span>
                        </div>
                    </div>

                    <div class="portlet-body form">
                        <form action="<?php echo site_url('penagihan/tambahAir'); ?>" id="form_tagAir" method="post" role="form" class="form-horizontal" onsubmit="return confirm('Anda Yakin Approve Data? Silahkan Cek Kembali');">
                            <?php foreach ($getData as $row): ?>
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="hidden" name="txtIDBlok"  class="form-control" value="<?php echo $row->IDBlok; ?>" />
                                        <div class="form-group">                                        
                                            <label class="control-label col-md-3">Alamat Mess <span class="required">
                                                    * </span>
                                            </label>
                                            <div class="col-md-6">                                                
                                                <select class="form-control select2me" name="txtAlamat" id="txtAlamat" data-placeholder="Pilih Nama Mess">
                                                    <option value=""></option>
                                                    <?php
                                                    foreach ($getMess as $set) {
                                                        echo '<option value="' . $set->IDMess . '">' . $set->Nama . '</option>';
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group">                                        
                                            <label class="control-label col-md-3">Periode Bulan Tagihan 
                                            </label>
                                            <div class="col-md-6">                                                
                                                <input type="text"  class="form-control" name="txtPeriode" value="<?php echo $blnaktif ?>"  readonly=""/>                                                
                                            </div>
                                        </div>                                            

                                        <div class="form-group">                                        
                                            <label class="control-label col-md-3">Total Biaya <span class="required">
                                                    * </span>
                                            </label>
                                            <div class="col-md-6">                                                    
                                                <input type="text"  class="form-control" name="txtTtlBiaya" onKeyUp="getValues()"/>
                                            </div>
                                        </div>
<!--                                            <div class="form-group">                                        
                                            <label class="control-label col-md-3">Denda<span class="required">
                                                    * </span>
                                            </label>
                                            <div class="col-md-6">                                                    
                                                <input type="text"  class="form-control" name="txtDenda" id="txtDenda" onKeyUp="getValues()" />
                                            </div>
                                        </div>-->
                                        <div class="form-group">                                        
                                            <label class="control-label col-md-3">Jumlah Orang <span class="required">
                                                    * </span>
                                            </label>
                                            <div class="col-md-6">                                                    
                                                <input type="text"  class="form-control" name="txtJumlah" id="txtJumlah" onKeyUp="getValues()"/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach; ?>


                            <div class="form-body row">                                
                                <div class="col-md-12">
                                    <div class="table-toolbar">
                                        <div class="row">
                                            <div class="col-md-6">                                                
                                                <div class="btn-group">
                                                    <a class="btn btn-circle purple-wisteria" data-target="#modal_karyawan" data-toggle="modal">
                                                        <i class="fa fa-plus"></i>
                                                        Tambahkan Penagihan
                                                    </a>
                                                </div>

                                            </div>
                                        </div>										
                                    </div>

                                    <div class="table-responsive" id="tbl_penghuni">
                                        <table class="table table-bordered table-condensed table-detail" id="tbl_penagihan">
                                            <thead >
                                                <tr>
                                                    <th class="text-center" style="width:25px">#</th>
                                                    <th class="text-center">Nama</th>
                                                    <th class="text-center" style="width:77px">NIK</th>
                                                    <th class="text-center" style="width:68px">Dept</th>
                                                    <th class="text-center">CV</th>
                                                    <th class="text-center">Keterangan</th>
                                                    <th class="text-center" style="width:83px">Tagihan</th>
                                                    <th class="text-center" style="width:83px">Tunggakan</th>
                                                    <th class="text-center" style="width:83px">Total</th>                                                    
                                                </tr>
                                            </thead>
                                            <tbody >

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <div class="form-actions">
                                <div class="row">
                                    <div class="col-md-offset-3 col-md-9">
                                        <button type="submit" class="btn btn-circle btn-primary" name="simpan" value="submit" ><i class="fa fa-floppy-o"></i> Simpan</button>
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
                            <table id="tbl_penagihan" class="table table-condensed table-hover table-fixed">
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
        var search = {search: $("#input_keluarga").val()};
        $.ajax({
            type: "POST",
            url: "<?php echo site_url('penagihan/cari_karyawan') ?>",
            data: search,
            success: function (msg) {
                $('#table_container').html(msg);
            }
        });
    });
</script>

<script type="text/javascript">    
    function removeRow(btn) {
        var row = btn.parentNode.parentNode;
        row.parentNode.removeChild(row);
    }
    
    function getValues() {
        var total = document.getElementById('txtTtlBiaya').value;
        var jum = document.getElementById('txtJumlah').value;
        var obj = document.getElementsByTagName("input");
        for (var i = 0; i < obj.length; i++) {
            if (obj[i].name === "txtTagihan[]") {
                if (total >= 0) {
                    obj[i].value = (eval(total) / eval(jum)).toFixed(0);
                }
                var biaya = obj[i].value;
                if (biaya < 10000) {
                    obj[i].value = 10000;
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

<script text="text/javascript">
    $(document).ready(function() {
        var form3 = $('#form_tagAir');
        var error3 = $('.alert-danger', form3);
        var success3 = $('.alert-success', form3);

        //IMPORTANT: update CKEDITOR textarea with actual content before submit
        form3.on('submit', function() {
            for (var instanceName in CKEDITOR.instances) {
                CKEDITOR.instances[instanceName].updateElement();
            }
        })

        form3.validate({
            errorElement: 'span', //default input error message container
            errorClass: 'help-block help-block-error', // default input error message class
            focusInvalid: false, // do not focus the last invalid input
            ignore: "", // validate all fields including form hidden input
            rules: {
                
                txtAlamat: {
                    required: true
                },
                txtTtlBiaya: {
                    required: true
                },
                txtJumlah: {
                    required: true
                }
            },
            messages: {// custom messages for radio buttons and checkboxes
                txtJumlah: {
                    required: "Silahkan isi jumlah orang kena tagih"
                },
                txtAlamat: {
                    required: "Silahkan pilih alamat mess"
                },
                txtTtlBiaya: {
                    required: "Silahkan total biaya nomor Flow Meter ini"
                },
                service: {
                    required: "Please select  at least 2 types of Service",
                    minlength: jQuery.validator.format("Please select  at least {0} types of Service")
                }
            },
            errorPlacement: function(error, element) { // render error placement for each input type
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
            invalidHandler: function(event, validator) { //display error alert on form submit   
                success3.hide();
                error3.show();
                Metronic.scrollTo(error3, -200);
            },
            highlight: function(element) { // hightlight error inputs
                $(element)
                        .closest('.form-group').addClass('has-error'); // set error class to the control group
            },
            unhighlight: function(element) { // revert the change done by hightlight
                $(element)
                        .closest('.form-group').removeClass('has-error'); // set error class to the control group
            },
            success: function(label) {
                label
                        .closest('.form-group').removeClass('has-error'); // set success class to the control group
            },
            submitHandler: function(form) {
                success3.show();
                error3.hide();
                form[0].submit(); // submit the form
            }

        });

        //apply validation on select2 dropdown value change, this only needed for chosen dropdown integration.
        $('.select2me', form3).change(function() {
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