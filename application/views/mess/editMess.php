    
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
                            <span class="caption-subject font-green-sharp bold uppercase">Ubah Data Mess Karyawan</span>
                        </div>
                    </div>
                    
                    <div class="portlet-body form">                                                   
                        <?php foreach ($getID as $row): ?>
                            <form action="<?php echo site_url('mess/editMess'); ?>" id="form_mess" method="post" role="form" class="form-horizontal">
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
                                            <input type="hidden" name="txtIDMess"  class="form-control" value="<?php echo $row->IDMess; ?>" required=""/>
                                            <input type="hidden" name="txtIDBlok"  class="form-control" value="<?php echo $row->IDBlok; ?>" />
                                            <div class="form-group">                                        
                                                <label class="control-label col-md-3">Nama Mess <span class="required">
                                                        * </span>
                                                </label>
                                                <div class="col-md-6">                                                    
                                                    <input type="text" value="<?php echo $row->Nama; ?>" data-required="1" class="form-control" name="txtNama" />
                                                </div>
                                            </div>
                                            <div class="form-group">                                        
                                                <label class="control-label col-md-3">Alamat Mess <span class="required">
                                                        * </span>
                                                </label>
                                                <div class="col-md-6">
                                                    <input type="text" value="<?php echo $row->Alamat; ?>" data-required="1" class="form-control" name="txtAlamat" />
                                                </div>
                                            </div>
<!--                                            <div class="form-group">                                        
                                                <label class="control-label col-md-3">Nama Blok <span class="required">
                                                        * </span>
                                                </label>
                                                <div class="col-md-6">
                                                    <select class="form-control select2me" name="txtBlok" id="txtBlok" >
                                                        <?php foreach ($getBlokMess as $setTm):
                                                            if ($setTm->IDBlok == $row->IDBlok) {
                                                                echo'<option value="' . $setTm->IDBlok . '" selected>' . $setTm->NamaBlok . '</option>';
                                                                ?>                                                                
                                                                <?php
                                                            } else {
                                                                echo'<option value="' . $setTm->IDBlok . '">' . $setTm->NamaBlok . '</option>';
                                                                ?>                                                                
                                                        <?php } endforeach; ?>
                                                    </select>
                                                </div>
                                            </div>-->
                                            <div class="form-group">                                        
                                                <label class="control-label col-md-3">Tipe Mess <span class="required">
                                                        * </span>
                                                </label>
                                                <div class="col-md-6">
                                                    <select class="form-control select2me" name="txtTipe" id="txtTipe" >
                                                        <?php foreach ($getTipeMess as $setTm):
                                                            if ($setTm->IDTipe == $row->IDTipe) {
                                                                echo'<option value="' . $setTm->IDTipe . '" selected>' . $setTm->TipeMess . '</option>';
                                                                ?>                                                                
                                                                <?php
                                                            } else {
                                                                echo'<option value="' . $setTm->IDTipe . '">' . $setTm->TipeMess . '</option>';
                                                                ?>                                                                
                                                        <?php } endforeach; ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">                                        
                                                <label class="control-label col-md-3">Blok 
                                                </label>
                                                <div class="col-md-6">
                                                    <input type="text" value="<?php echo $row->Blok; ?>" class="form-control" name="txtBlok" />
                                                </div>
                                            </div>
                                            <div class="form-group">                                        
                                                <label class="control-label col-md-3">Kopel 
                                                </label>
                                                <div class="col-md-6">
                                                    <select class="form-control select2me" name="txtKopel" >
                                                        <option value="<?php echo $row->Kopel; ?>"><?php echo $row->Kopel; ?></option>
                                                        <option value=""></option>
                                                        <?php for ($j = 1; $j <= 13; $j++) {
                                                            echo"<option value='$j'> $j </option>";
                                                        }?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">                                        
                                                <label class="control-label col-md-3">Pintu 
                                                </label>
                                                <div class="col-md-6">
                                                    <input type="text" value="<?php echo $row->Pintu; ?>" class="form-control" name="txtPintu" />
                                                </div>
                                            </div>                                    
                                            <div class="form-group">                                        
                                                <label class="control-label col-md-3">Jumlah Kamar 
                                                </label>
                                                <div class="col-md-6">
                                                    <input type="text" value="<?php echo $row->JmlKamar; ?>" class="form-control" name="txtJumlah" />
                                                </div>
                                            </div>
                                            <div class="form-group">                                        
                                                <label class="control-label col-md-3">Status <span class="required">
                                                        * </span>
                                                </label>
                                                <?php if ($row->Status === 0) {
                                                    $A = "checked";
                                                    $B = "";
                                                } elseif ($row->Status === 1) {
                                                    $A = "";
                                                    $B = "checked";
                                                }?>
                                                <div class="col-md-6">
                                                    <div class="radio-list" data-error-container="#form_2_membership_error">
                                                        <label><input type="radio" name="txtStatus" value="0" <?php echo $A; ?>/> Berpenghuni </label>
                                                        <label><input type="radio" name="txtStatus" value="1" <?php echo $B; ?>/> Kosong </label>
                                                    </div>
                                                </div>
                                                <div id="form_2_membership_error"></div>
                                            </div>
<!--                                            <div class="form-group">                                        
                                                <label class="control-label col-md-3">Nomor Kwh Meter 
                                                </label>
                                                <div class="col-md-6">                                                
                                                    <select class="form-control select2me" id="txtKwh" name="txtKwh">                                                        
                                                        <?php foreach ($getKwhMess as $setKw):
                                                            if ($setKw->IDKwh == $row->IDKwh) {
                                                                echo'<option value="' . $setKw->IDKwh . '" selected>' . $setKw->Nomor . '</option>';
                                                                ?>                                                                
                                                                <?php
                                                            } else {                                                                
                                                                echo'<option value="' . $setKw->IDKwh . '">' . $setKw->Nomor . '</option>';
                                                                ?>                                                                
                                                        <?php } endforeach; ?>
                                                        
                                                    </select>                                                    
                                                </div>
                                            </div>
                                            <div class="form-group">                                        
                                                <label class="control-label col-md-3">Nomor Flow Meter 
                                                </label>                                            
                                                <div class="col-md-6">
                                                    <select class="form-control select2me" id="txtFlow" name="txtFlow" >
                                                        <?php foreach ($getFlowMess as $setF):
                                                            if ($setF->IDFlowMtr == $row->IDFlowMtr) {
                                                                echo'<option value="' . $setF->IDFlowMtr . '" selected>' . $setF->Nomor . '</option>';
                                                                ?>                                                                
                                                                <?php
                                                            } else {                                                                
                                                                echo'<option value="' . $setF->IDFlowMtr . '">' . $setF->Nomor . '</option>';
                                                                ?>                                                                
                                                        <?php } endforeach; ?>
                                                        
                                                    </select>                                                    
                                                </div>
                                            </div>-->
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
        var form3 = $('#form_mess');
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
                txtNama: {                   
                    required: true
                },
                txtAlamat: {
                    minlength: 2,
                    required: true
                },
                email: {
                    required: true,
                    email: true
                },  
//                txtFlow: {
//                    required: true
//                },
                txtTipe: {
                    required: true
                },
//                txtKwh: {
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
                txtTipe: {
                    required: "Silahkan pilih tipe Mess"
                },
                txtNama: {
                    required: "Silahkan isi Nama Lengkap Mess"
                },
                txtAlamat: {
                    required: "Silahkan isi alamat Mess"
                },                
//                txtKwh: {
//                    required: "Silahkan pilih nomor Kwh Meter"
//                },
//                txtFlow: {
//                    required: "Silahkan pilih nomor Flow Meter"
//                },
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