<?php if (($this->session->userdata('groupid') == 1) or($this->session->userdata('groupid') == 3)) {?> 
<div class="page-head">
    <div class="container-fluid">            
        <div class="page-title">
            <h1>Transaksi <small>Tagihan Listrik Mess</small></h1>
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
                            <span class="caption-subject font-green-sharp bold uppercase">Form Tagihan Listrik</span>
                        </div>
                    </div>

                    <div class="portlet-body form">  
                        <?php foreach ($getData1 as $row): ?>
                        <form action="<?php echo site_url('laporan/checkList'); ?>" id="form_tagList" method="post" role="form" class="form-horizontal" onsubmit="return confirm('Anda Yakin Approve Data? Silahkan Cek Kembali');">
                            <div class="form-body">                                    
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="hidden" name="txtID"  class="form-control" value="<?php echo $row->ID; ?>" required=""/>                                        
<!--                                        <div class="form-group">                                        
                                            <label class="control-label col-md-3">Alamat Mess 
                                            </label>
                                            <div class="col-md-6">                                                
                                                <input type="text"  class="form-control"  value="<?php $this->load->model('m_laporan'); $a = $this->m_laporan->selectAlamat($row->IDMess);
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
                                                <input type="text"  class="form-control" name="txtPeriode"  value="<?php echo $row->Periode ?>" readonly=""/>
                                            </div>
                                        </div>  
                                        <div class="form-group">                                        
                                            <label class="control-label col-md-3">Beban Awal (kWh)<span class="required">
                                                    * </span>
                                            </label>
                                            <div class="col-md-6">
                                                <input type="text" class="form-control" name="txtBlnLalu" value="<?php echo $row->KwhAwal ?>" onKeyUp="getValues()" />
                                            </div>
                                        </div>                                        
                                        <div class="form-group" > 
                                            <label class="control-label col-md-3">Beban Bulan Ini (kWh)<span class="required">
                                                    * </span>
                                            </label>
                                            <div class="col-md-6">
                                                <input type="text" class="form-control" name="txtBlnIni" value="<?php echo $row->Kwh ?>" onKeyUp="getValues()"/>
                                            </div>
                                        </div>                                        
                                        <div class="form-group">                                        
                                            <label class="control-label col-md-3">Pemakaian (kWh)
                                            </label>
                                            <div class="col-md-6">
                                                <input type="text"  class="form-control" name="txtTtlBeban" value="<?php echo $row->Pemakaian ?>" onKeyUp="getValues()" readonly="" 
                                                    <?php if ($row->Pemakaian <= 15) { echo"style=\"background-color:#fd6969\""; } ?>/>
                                            </div>
                                        </div>
                                        <div class="form-group">                                        
                                            <label class="control-label col-md-3">Biaya Per (kWh)
                                            </label>
                                            <div class="col-md-6">
                                                <input type="text"  class="form-control" name="txtBiayaPer" value="<?php echo $row->PerMeter ?>" onKeyUp="getValues()" />                                                
                                            </div>
                                        </div>
                                        <div class="form-group">                                        
                                            <label class="control-label col-md-3">Total Biaya
                                            </label>
                                            <div class="col-md-6">                                                    
                                                <input type="text"  class="form-control" name="txtTtlBiaya" id="txtTtlBiaya" value="<?php echo $row->TtlBiaya ?>" readonly=""/>
                                            </div>
                                        </div>
                                        <div class="form-group">                                        
                                            <label class="control-label col-md-3">Denda<span class="required">
                                                    * </span>
                                            </label>
                                            <div class="col-md-6">                                                    
                                                <input type="text"  class="form-control" name="txtDenda" id="txtDenda" onKeyUp="getValues()" />
                                            </div>
                                        </div>            
                                        <div class="form-group">                                        
                                            <label class="control-label col-md-3">Keterangan
                                            </label>
                                            <div class="col-md-6">                                                    
                                                <input type="text"  class="form-control" name="txtKet" value="<?php echo $row->Ket ?>" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-actions">
                                <div class="row">
                                    <div class="col-md-offset-3 col-md-9">
                                        <button type="submit" class="btn btn-circle btn-primary" name="Submit" value="Simpan" ><i class="fa fa-floppy-o"></i> Approve</button>
<!--                                        <a type="button" href="<?php echo site_url('laporan/listrik'); ?>" class="btn btn-circle btn-danger"><i class="fa fa-undo"></i> Kembali</a>-->
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

<?php } elseif (($this->session->userdata('groupid') == 7) or ($this->session->userdata('groupid') == 8)) { ?>
<div class="page-head">
    <div class="container-fluid">            
        <div class="page-title">
            <h1>Transaksi <small>Tagihan Listrik Mess</small></h1>
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
                            <span class="caption-subject font-green-sharp bold uppercase">Form Tagihan Listrik</span>
                        </div>
                    </div>

                    <div class="portlet-body form">  
                        <?php foreach ($getData2 as $set): ?>
                        <form action="<?php echo site_url('laporan/approveList'); ?>" id="form_tagList" method="post" role="form" class="form-horizontal" onsubmit="return confirm('Anda Yakin Approve Data? Silahkan Cek Kembali');">
                            <div class="form-body">                                    
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="hidden" name="txtID" class="form-control" value="<?php echo $set->ID; ?>" required=""/>                                        
<!--                                        <div class="form-group">                                        
                                            <label class="control-label col-md-3">Alamat Mess 
                                            </label>
                                            <div class="col-md-6">                                                
                                                <input type="text"  class="form-control"  value="<?php $this->load->model('m_laporan'); $a = $this->m_laporan->selectAlamat($set->IDMess);
                                                    foreach ($a as $setM): echo $setM->Nama; endforeach; ?>" readonly=""/>
                                            </div>
                                        </div>-->
                                        <div class="form-group">                                        
                                            <label class="control-label col-md-3">Nomor Kwh Meter 
                                            </label>
                                            <div class="col-md-6">                                                
                                                <input type="text"  class="form-control" name="txtKwh"  value="<?php echo $set->Nomor ?>" readonly=""/>
                                            </div>
                                        </div>                                        
                                        <div class="form-group">                                        
                                            <label class="control-label col-md-3">Periode Bulan Tagihan 
                                            </label>
                                            <div class="col-md-6">
                                                <input type="text"  class="form-control" name="txtPeriode"  value="<?php echo $set->Periode ?>" readonly=""/>
                                            </div>
                                        </div>  
                                        <div class="form-group">                                        
                                            <label class="control-label col-md-3">Beban Awal (kWh)
                                            </label>
                                            <div class="col-md-6">
                                                <input type="text"  class="form-control" name="txtBlnLalu" value="<?php echo $set->KwhAwal ?>" onKeyUp="getValues()" readonly=""/>
                                            </div>
                                        </div>                                        
                                        <div class="form-group" > 
                                            <label class="control-label col-md-3">Beban Bulan Ini (kWh)
                                            </label>
                                            <div class="col-md-6">
                                                <input type="text" class="form-control" name="txtBlnIni" value="<?php echo $set->Kwh ?>" onKeyUp="getValues()" readonly=""/>
                                            </div>
                                        </div>                                        
                                        <div class="form-group">                                        
                                            <label class="control-label col-md-3">Pemakaian (kWh)
                                            </label>
                                            <div class="col-md-6">
                                                <input type="text"  class="form-control" name="txtTtlBeban" value="<?php echo $set->Pemakaian ?>" onKeyUp="getValues()" readonly="" 
                                                    <?php if ($set->Pemakaian <= 15) { echo"style=\"background-color:#fd6969\""; } ?>/>
                                            </div>
                                        </div>
                                        <div class="form-group">                                        
                                            <label class="control-label col-md-3">Biaya Per (kWh)
                                            </label>
                                            <div class="col-md-6">
                                                <input type="text"  class="form-control" name="txtBiayaPer" value="<?php echo $set->PerMeter ?>" onKeyUp="getValues()" readonly=""/>                                                
                                            </div>
                                        </div>
                                        <div class="form-group">                                        
                                            <label class="control-label col-md-3">Total Biaya
                                            </label>
                                            <div class="col-md-6">                                                    
                                                <input type="text"  class="form-control" name="txtTtlBiaya" value="<?php echo $set->TtlBiaya ?>"  readonly=""/>
                                            </div>
                                        </div>
                                        <div class="form-group">                                        
                                            <label class="control-label col-md-3">Denda
                                            </label>
                                            <div class="col-md-6">                                                    
                                                <input type="text"  class="form-control" name="txtDenda" value="<?php echo $set->Denda ?>" />
                                            </div>
                                        </div>            
                                        <div class="form-group">                                        
                                            <label class="control-label col-md-3">Keterangan
                                            </label>
                                            <div class="col-md-6">                                                    
                                                <input type="text"  class="form-control" name="txtKet" value="<?php echo $set->Ket ?>" />
                                            </div>
                                        </div>                                        
                                    </div>
                                </div>
                            </div>

                            <div class="form-actions">
                                <div class="row">
                                    <div class="col-md-offset-3 col-md-9">
                                        <button type="submit" class="btn btn-circle btn-primary" name="Submit" value="Simpan" ><i class="fa fa-floppy-o"></i> Approve</button>
<!--                                        <a type="button" href="<?php echo site_url('laporan/listrik'); ?>" class="btn btn-circle btn-danger"><i class="fa fa-undo"></i> Kembali</a>-->
                                        <input type="button" class="btn btn-circle btn-danger" value="Kembali" onclick="history.back(-1)" />
                                        <button type="submit" class="btn btn-circle yellow-gold" name="Submit" value="Tolak"><i class="fa fa-ban"></i> Tolak Laporan</button>
<!--                                        <a type="submit" class="btn btn-circle yellow-gold" name="Submit" value="Tolak" onclick="javascript: return confirm('Anda Yakin Tolak Data?')"><i class="fa fa-ban"></i> Tolak Laporan</a>-->
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
<?php } ?>

<script text="text/javascript">
    function getValues() {
        var total = document.getElementById('txtTtlBiaya').value;
        var denda = document.getElementById('txtDenda').value;
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
                if (ttlbeban <= 15) {
                    obj[i].style.backgroundColor = "#fd6969";
                    obj[i].value = 15;
                    //alert("Total Pemakaian Tidak Wajar. Mohon Cek Kembali Kwh Meter");
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
            if (obj[i].name === "txtTtlBiaya") {
                if (denda > 0) {
                    obj[i].value = eval(total) * 0;
                }
            }
        }
        
    }
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
                txtAlamat: {
                    minlength: 2,
                    required: true
                },                                
                email: {
                    required: true,
                    email: true
                },  
                txtPeriode: {
                    required: true
                },
                txtFlow: {
                    required: true
                },
                txtBlnIni: {
                    required: true
                },                
                txtBlnLalu: {
                    required: true
                },
                txtStatus: {
                    required: true
                },
                service: {
                    required: true,
                    minlength: 2
                },
                txtDenda: {
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
                txtPeriode: {
                    required: "Silahkan pilih periode bulan tagihan"
                },
                txtBlnIni: {
                    required: "Silahkan isi beban flow meter bulan ini"
                },                
                txtFlow: {
                    required: "Silahkan pilih nomor Flow Meter"
                },
                txtBlnLalu: {
                    required: "Silahkan isi beban flow meter bulan lalu"
                },
                txtDenda: {
                    required: "Silahkan isi angka 0 jika tidak ada denda"
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