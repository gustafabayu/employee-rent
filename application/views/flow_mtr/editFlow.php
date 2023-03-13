
<div class="page-head">
    <div class="container-fluid">            
        <div class="page-title">
            <h1>Flow Meter <small>Daftar Flow Meter Mess</small></h1>
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
                            
                            <span class="caption-subject font-green-sharp bold uppercase">Ubah Data Flow Meter Mess</span>
                        </div>
                    </div>
                    
                    <div class="portlet-body form">                                                       
                        <?php foreach ($getID as $row): ?>
                            <form action="<?php echo site_url('flow_mtr/editFlow'); ?>" id="form_flow" method="post" role="form" class="form-horizontal">
                                <div class="form-body">
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
                                            <input type="hidden" name="txtIDFlow"  class="form-control" value="<?php echo $row->IDFlowMtr; ?>" required=""/>
                                            <input type="hidden" name="txtIDBlok"  class="form-control" value="<?php echo $row->IDBlok; ?>" />
                                            <div class="form-group">                                        
                                                <label class="control-label col-md-3">Alamat Mess <span class="required">
                                                        * </span>
                                                </label>
                                                <div class="col-md-6">
                                                    <select class="form-control select2me" id="txtAlamat" name="txtAlamat" >
                                                        <?php
                                                        foreach ($getMess as $set):
                                                            if ($set->IDMess == $row->IDMess) {
                                                                echo'<option value="' . $set->IDMess . '" selected>' . $set->Nama . '</option>';
                                                                ?>                                                    
                                                                <?php
                                                            } else {
                                                                echo'<option value="' . $set->IDMess . '">' . $set->Nama . '</option>';
                                                                ?>                                                    
                                                            <?php } endforeach; ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">                                        
                                                <label class="control-label col-md-3">Nomor Flow Meter <span class="required">
                                                        * </span>
                                                </label>
                                                <div class="col-md-6">                                                    
                                                    <input type="text" value="<?php echo $row->Nomor; ?>" data-required="1" class="form-control" name="txtNomor" />
                                                </div>
                                            </div>
                                            <div class="form-group">                                        
                                                <label class="control-label col-md-3">Merk 
                                                </label>
                                                <div class="col-md-6">                                                
                                                    <input type="text" value="<?php echo $row->Merk; ?>"  class="form-control" name="txtMerk" />
                                                </div>
                                            </div>
                                            <div class="form-group">                                        
                                                <label class="control-label col-md-3">Spesifikasi 
                                                </label>
                                                <div class="col-md-6">
                                                    <input type="text" value="<?php echo $row->Spesifikasi; ?>"  class="form-control" name="txtSpesifikasi" />
                                                </div>
                                            </div>
                                            <div class="form-group">                                        
                                                <label class="control-label col-md-3">Tanggal Pasang 
                                                </label>
                                                <div class="col-md-6">
                                                    <div class="input-group input-big date date-picker" data-date-format="dd-mm-yyyy" data-date-viewmode="years">
                                                        <input type="text" class="form-control" readonly  value="<?php echo $row->TglPasang; ?>" name="txtTglPasang">
                                                        <span class="input-group-btn">
                                                            <button class="btn default" type="button"><i class="fa fa-calendar"></i></button>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">                                        
                                                <label class="control-label col-md-3">Tipe Pemakai <span class="required">
                                                        * </span>
                                                </label>
                                                <div class="col-md-6">
                                                    <select class="form-control select2me" id="txtPemakai" name="txtPemakai" >                                                        
                                                        <?php
                                                        foreach ($PakaiAir as $set):
                                                            if ($set->ID == $row->TipePakai) {
                                                                echo'<option value="' . $set->ID . '" selected>' . $set->Tipe . '</option>';                                                                
                                                                ?>                                                    
                                                                <?php
                                                            } else {
                                                                echo'<option value="' . $set->ID . '">' . $set->Tipe . '</option>';
                                                                ?>                                                    
                                                            <?php } endforeach; ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">                                        
                                                <label class="control-label col-md-3">Keterangan 
                                                </label>
                                                <div class="col-md-6">
                                                    <textarea class="form-control" name="txtKet" rows="3"><?php echo $row->Ket; ?></textarea>
                                                </div>
                                            </div>
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

<script text="text/javascript">
    $(document).ready(function(){
        var form3 = $('#form_flow');
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
                txtNomor: {
                    minlength: 2,
                    required: true
                },
                txtMerk: {
                    minlength: 2,
                    required: true
                },
                txtSpesifikasi: {
                    minlength: 2,
                    required: true
                },
                email: {
                    required: true,
                    email: true
                },  
                options1: {
                    required: true
                },
                txtAlamat: {
                    required: true
                },
                select2tags: {
                    required: true
                },
//                txtTglPasang: {
//                    required: true
//                },
                occupation: {
                    minlength: 5,
                },
                txtStatus: {
                    required: true
                },
                service: {
                    required: true,
                    minlength: 2
                },
                markdown: {
                    required: true
                },
                editor1: {
                    required: true
                },
                editor2: {
                    required: true
                }
            },

            messages: { // custom messages for radio buttons and checkboxes
                txtStatus: {
                    required: "Silahkan pilih status Flow Meter"
                },
                txtNomor: {
                    required: "Silahkan isi nomor Flow Meter"
                },
                txtMerk: {
                    required: "Silahkan isi merk Flow Meter"
                },
                txtSpesifikasi: {
                    required: "Silahkan isi spesifikasi Flow Meter"
                },
//                txtTglPasang: {
//                    required: "Silahkan pilih tanggal pasang Flow Meter"
//                },
                txtAlamat: {
                    required: "Silahkan pilih alamat mess"
                },
                service: {
                    required: "Please select  at least 2 types of Service",
                    minlength: jQuery.validator.format("Please select  at least {0} types of Service")
                }
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