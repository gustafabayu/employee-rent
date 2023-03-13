<div class="page-head">
    <div class="container-fluid">            
        <div class="page-title">
            <h1>Transaksi <small>Tagihan Air Mess</small></h1>
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
                            <span class="caption-subject font-green-sharp bold uppercase">Form Tagihan Air Mess</span>
                        </div>
                    </div>

                    <div class="portlet-body form"> 
                        <?php foreach ($getData as $row): ?>
                            <form action="<?php echo site_url('hsl_akhir/tagAir'); ?>" id="form_tagAir" method="post" role="form" class="form-horizontal">
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <input type="hidden" name="txtIDBlok"  class="form-control" value="<?php echo $row->IDBlok; ?>" />
                                            <div class="form-group"> 
                                                <label class="control-label col-md-3">Nomor Flow Meter <span class="required">
                                                        * </span>
                                                </label>
                                                <div class="col-md-6">
                                                    <select class="form-control select2me" data-placeholder="Pilih Nomor Flow Meter.." name="txtFlow" >
                                                        <option value=""></option>
                                                        <?php
                                                        foreach ($getNoFM as $set) {
                                                            echo'<option value="' . $set->Nomor . '">' . $set->Nomor . '</option>';
                                                        }?>
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
<!--                                            <div class="form-group"> 
                                                <label class="control-label col-md-3">Beban Awal (M<sup>3</sup>)
                                                </label>
                                                <div class="col-md-4">
                                                    <input type="text"  class="form-control" name="txtBlnLalu" value="<?php echo $row->Flow ?>" onKeyUp="getValues()" readonly=""/>
                                                </div>
                                            </div>                                        
                                            <div class="form-group" > 
                                                <label class="control-label col-md-3">Beban Bulan Ini (M<sup>3</sup>)<span class="required">
                                                        * </span>
                                                </label>
                                                <div class="col-md-4">
                                                    <input type="text" placeholder="Masukkan beban" class="form-control" name="txtBlnIni" onKeyUp="getValues()"/>
                                                </div>
                                            </div>
                                            <div class="form-group">                                        
                                                <label class="control-label col-md-3">Pemakaian (M<sup>3</sup>)
                                                </label>
                                                <div class="col-md-4">
                                                    <input type="text"  class="form-control" name="txtTtlBeban" onKeyUp="getValues()" readonly=""/>
                                                </div>
                                            </div>
                                            <div class="form-group">                                        
                                                <label class="control-label col-md-3">Biaya Per (M<sup>3</sup>)
                                                </label>
                                                <div class="col-md-4">
                                                    <input type="text"  class="form-control" name="txtBiayaPer" value="</?php $this->load->model('m_transaksi'); $K = $this->m_transaksi->HargaAir($row->TipePakai);
                                                        foreach ($K as $set): echo $set->Harga; endforeach; ?>" onKeyUp="getValues()" readonly=""/>                                                    
                                                </div>
                                            </div> -->
                                            <div class="form-group">                                        
                                                <label class="control-label col-md-3">Total Biaya <span class="required">
                                                        * </span>
                                                </label>
                                                <div class="col-md-6">                                                    
                                                    <input type="text"  class="form-control" name="txtTtlBiaya" />
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
    function getValues() {
        var obj = document.getElementsByTagName("input");
        for (var i = 0; i < obj.length; i++) {
            if (obj[i].name === "txtBlnIni") {
                var blnini = obj[i].value;
            }
            if (obj[i].name === "txtBlnLalu") {
                var blnlalu = obj[i].value;
            }
            if (obj[i].name === "txtTtlBeban") {
                if (blnini > 0 && blnlalu > 0) {
                    obj[i].value = (eval(blnini) - eval(blnlalu));
                }
                var ttlbeban = obj[i].value;
                if (ttlbeban < 4) {
                    obj[i].style.backgroundColor = "#fd6969";
                    obj[i].value = 4;
                    //alert("Total Pemakaian Tidak Wajar. Mohon Cek Kembali Flow Meter");
                } else {
                    obj[i].style.backgroundColor = "white";
                }
            }
            if (obj[i].name === "txtTtlBeban") {
                var ttlbeban = obj[i].value;
            }
            if (obj[i].name === "txtBiayaPer") {
                var biayaper = obj[i].value;
            }
            if (obj[i].name === "txtTtlBiaya") {
                if (ttlbeban > 0 && biayaper > 0) {
                    obj[i].value = (eval(ttlbeban) * eval(biayaper));
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
                    minlength: 2,
                    required: true
                },
                email: {
                    required: true,
                    email: true
                },
//                txtPeriode: {
//                    required: true
//                },
                txtKwh: {
                    required: true
                },
                txtTtlBiaya: {
                    required: true
                },
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
            messages: {// custom messages for radio buttons and checkboxes
//                txtPeriode: {
//                    required: "Silahkan pilih periode bulan tagihan"
//                },
                txtKwh: {
                    required: "Silahkan pilih nomor flow meter bulan"
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