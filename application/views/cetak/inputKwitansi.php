    
<div class="page-head">
    <div class="container-fluid">            
        <div class="page-title">
            <h1>Kwitansi <small>Input Kwitansi Mess</small></h1>
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
                            <span class="caption-subject font-green-sharp bold uppercase">Form Input Kwitansi</span>
                        </div>
                    </div>

                    <div class="portlet-body form"> 
                        <form action="<?php echo site_url('cetak/simKwitansi'); ?>" id="form_kwitansi" method="post" role="form" class="form-horizontal" onsubmit="return confirm('Anda Yakin Simpan Data? Silahkan Cek Kembali');">
                            <div class="form-body row">                                    
                                <div class="row">
                                    <?php foreach ($getHdr as $row): ?>
                                        <div class="col-md-12">
                                            <input type="hidden"  class="form-control" name="txtIDBlok"  value="<?php echo $row->IDBlok ?>" />
                                            <input type="hidden"  class="form-control" name="txtIDMess"  value="<?php echo $row->IDMess ?>" />
                                            <div class="form-group">                                        
                                                <label class="control-label col-md-3">Tanggal <span class="required">
                                                        * </span>
                                                </label>
                                                <div class="col-md-6">
                                                    <div class="input-group input-big date date-picker" data-date-format="dd-mm-yyyy" data-date-viewmode="years">
                                                        <input type="text" class="form-control" readonly  placeholder="dd-mm-yyyy" name="txtTanggal">
                                                        <span class="input-group-btn">
                                                            <button class="btn default" type="button"><i class="fa fa-calendar"></i></button>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--                                        <div class="form-group">                                        
                                                                                        <label class="control-label col-md-3">Nomor<span class="required">
                                                                                                * </span>
                                                                                        </label>
                                                                                        <div class="col-md-6">
                                                                                            <input type="text"  class="form-control" name="txtNomor" />
                                                                                        </div>
                                                                                    </div>-->
                                            <div class="form-group">                                        
                                                <label class="control-label col-md-3">Bulan Tagih
                                                </label>
                                                <div class="col-md-6">
                                                    <input type="text"  class="form-control" name="txtBlnTagih" value="<?php echo $perKwitansi ?>" readonly=""/>
                                                </div>
                                            </div>
<!--                                            <div class="form-group">                                        
                                                <label class="control-label col-md-3">Total Biaya
                                                </label>
                                                <div class="col-md-6">                                                    
                                                    <input type="text"  class="form-control" name="txtTtlBiaya" id="txtTtlBiaya"  onKeyUp="getValues()"/>
                                                </div>
                                            </div>
                                            <div class="form-group">                                        
                                                <label class="control-label col-md-3">Jumlah Orang
                                                </label>
                                                <div class="col-md-6">                                                    
                                                    <input type="text"  class="form-control" name="txtJumlah" id="txtJumlah"  onKeyUp="getValues()"/>                                                    
                                                </div>
                                            </div>-->
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>

<!--                            <div class="form-body row">-->
                                <div class="row"> 
                                    <div class="col-md-12">
                                        <h4 class="uppercase">Nama Penghuni Kena Tagih</h4>
                                        <div class="table-responsive">                                            
                                            <table class="table table-bordered table-striped table-condensed" >
                                                <thead>
                                                    <tr>
                                                        <th class="text-center">!</th>
<!--                                                        <th class="text-center">No</th>-->
                                                        <th class="text-center">Nama</th>
                                                        <th class="text-center">Alamat</th>
                                                        <th class="text-center">Departemen</th>
                                                        <th class="text-center">CV</th>
                                                        <th class="text-center">Keterangan</th>                                                            
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $no = 0;
                                                    foreach ($cetakTagih as $a) { ?>
                                                        <tr class="records">
                                                            <td><input type="button" class="btn default btn-sm red-stripe remove_item" value="Hapus"></td>
<!--                                                            <td class="text-center"><?php echo ++$no; ?></td>-->
                                                            <td><input type="text" class="form-control" name="txtNama[]" readonly value="<?php echo $a->Nama; ?>"><input type="hidden" name="txtTKID[]" value="<?php echo $a->TKID; ?>"></td>
                                                            <td><input type="text" class="form-control" name="txtAlamat[]" readonly value="<?php $this->load->model('m_cetak');
                                                                $b = $this->m_cetak->namaMess($a->IDMess); foreach ($b as $setB): echo $setB->Nama; endforeach;?>"></td>
                                                            <td><input type="text" class="form-control" name="txtDept[]" readonly value="<?php echo $a->NamaDept; ?>"></td>
                                                            <td><input type="text" class="form-control" name="txtCV[]" readonly value="<?php echo $a->NamaCV; ?>"></td>
                                                            <td><input type="text" class="form-control" name="txtKet[]" readonly value="<?php echo $a->Ket; ?>"></td>
                                                        </tr>                                                           
                                                    <?php } ?>                                                        
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
<!--                            </div>-->

<!--                            <div class="form-body row">-->
                                <div class="row">
                                    <div class="col-md-12">
                                        <h4 class="uppercase">Tagihan Listrik</h4>
                                        <div class="row">
                                            <div class="col-md-6">                                                
                                                <div class="btn-group">
                                                    <a id="add_list" class="btn btn-circle yellow-casablanca" >
                                                        <i class="fa fa-plus"></i>
                                                        Tambah Tagihan
                                                    </a>
                                                </div>
                                            </div>
                                        </div><br/>
                                        <div class="table-responsive">
                                            <table class="table table-bordered table-striped table-condensed" id="tbl_list">
                                                <thead>
                                                    <tr>
                                                        <th class="text-center">!</th>
                                                        <th class="text-center">Kwh Awal</th>
                                                        <th class="text-center">Kwh Akhir</th>
                                                        <th class="text-center">Pemakaian</th>
                                                        <th class="text-center">Rp/Kwh</th>
                                                        <th class="text-center">Sub Total</th>                                                                                                                    
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php foreach ($TagihList as $a) { ?>
                                                        <tr class="records">
                                                            <td><input type="button" class="btn default btn-sm red-stripe remove_item" value="Hapus"></td>
                                                            <td><input type="text" class="form-control" name="txtKMAwal"  value="<?php echo $a->KwhAwal; ?>"><input type="hidden" class="form-control" name="txtNomorKM" readonly value="<?php echo $a->Nomor; ?>"></td>
                                                            <td><input type="text" class="form-control" name="txtKMAkhir"  value="<?php echo $a->Kwh; ?>"></td>
                                                            <td><input type="text" class="form-control" name="txtPakaiKM"  value="<?php echo $a->Pemakaian; ?>"></td>
                                                            <td><input type="text" class="form-control" name="txtBiayaKM"  value="<?php echo $a->PerMeter; ?>"></td>
                                                            <td><input type="text" class="form-control" name="txtTotalKM" id="txtTotalKM" value="<?php echo $a->TtlBiaya; ?>" onKeyUp="getValues()"></td>
                                                        </tr>                                                           
                                                    <?php } ?>                                                        
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
<!--                            </div>-->

<!--                            <div class="form-body row">-->
                                <div class="row">
                                    <div class="col-md-12">
                                        <h4 class="uppercase">Tagihan air</h4>
                                        <div class="row">
                                            <div class="col-md-6">                                                
                                                <div class="btn-group">
                                                    <a id="add_air" class="btn btn-circle yellow-casablanca" >
                                                        <i class="fa fa-plus"></i>
                                                        Tambah Tagihan
                                                    </a>
                                                </div>
                                            </div>
                                        </div><br/>
                                        <div class="table-responsive">
                                            <table class="table table-bordered table-striped table-condensed" id="tbl_air">
                                                <thead>
                                                    <tr>
                                                        <th class="text-center">!</th>
                                                        <th class="text-center">M<sup>3</sup> Awal</th>
                                                        <th class="text-center">M<sup>3</sup> Akhir</th>
                                                        <th class="text-center">Pemakaian</th>
                                                        <th class="text-center">Rp/M<sup>3</sup></th>
                                                        <th class="text-center">Sub Total</th>                                                                                                                    
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php foreach ($TagihAir as $a) { ?>
                                                        <tr class="records">
                                                            <td><input type="button" class="btn default btn-sm red-stripe remove_item" value="Hapus"></td>
                                                            <td><input type="text" class="form-control" name="txtFMAwal"  value="<?php echo $a->FlowAwal; ?>"><input type="hidden" class="form-control" name="txtNomorFM" readonly value="<?php echo $a->Nomor; ?>"></td>
                                                            <td><input type="text" class="form-control" name="txtFMAkhir"  value="<?php echo $a->Flow; ?>"></td>
                                                            <td><input type="text" class="form-control" name="txtPakaiFM"  value="<?php echo $a->Pemakaian; ?>"></td>
                                                            <td><input type="text" class="form-control" name="txtBiayaFM"  value="<?php echo $a->PerMeter; ?>"></td>
                                                            <td><input type="text" class="form-control" name="txtTotalFM" id="txtTotalFM"  value="<?php echo $a->TtlBiaya; ?>" onKeyUp="getValues()"></td>
                                                        </tr>                                                           
                                                    <?php } ?>                                                        
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
<!--                            </div>-->

                            <div class="form-body row">                                    
                                <div class="row">                                    
                                    <div class="col-md-12">
                                        <div class="form-group">                                        
                                            <label class="control-label col-md-3">Lain-lain<span class="required">
                                                    * </span>
                                            </label>
                                            <div class="col-md-6">
                                                <input type="text" class="form-control" name="txtLain" id="txtLain" onKeyUp="getValues()"/>
                                            </div>
                                        </div>
                                        <div class="form-group">                                        
                                            <label class="control-label col-md-3">Tunggakan<span class="required">
                                                    * </span>
                                            </label>
                                            <div class="col-md-6">
                                                <input type="text" class="form-control" name="txtTunggakan" id="txtTunggakan" onKeyUp="getValues()"/>
                                            </div>
                                        </div>
                                        <div class="form-group">                                        
                                            <label class="control-label col-md-3">Jumlah Harus Bayar<span class="required">
                                                    * </span>
                                            </label>
                                            <div class="col-md-6">
                                                <input type="text"  class="form-control" name="txtJmlBayar" id="txtJmlBayar" />
                                            </div>
                                        </div>                                        
                                    </div>                                   
                                </div>
                            </div>

                            <div class="form-actions">
                                <div class="row">
                                    <div class="col-md-offset-3 col-md-9">
                                        <button type="submit" class="btn btn-circle btn-primary" name="simpan" value="submit"><i class="fa fa-floppy-o"></i> Simpan</button>
<!--                                        <a type="button" href="<?php echo site_url('transaksi/listrik'); ?>" class="btn btn-circle btn-danger"><i class="fa fa-undo"></i> Batal</a>-->
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

<script type="text/javascript">
    $(document).ready(function () {
        $("#add_list").click(function () {
            $('#tbl_list > tbody:last-child').append(
                    '<tr class="records">'
                    + '<td><input type="button" class="btn default btn-sm red-stripe remove_item" value="Hapus"></td>'
                    + '<td><input type="text" class="form-control" name="txtKMAwal"></td>'
                    + '<td><input type="text" class="form-control" name="txtKMAkhir"></td>'
                    + '<td><input type="text" class="form-control" name="txtPakaiKM"></td>'
                    + '<td><input type="text" class="form-control" name="txtBiayaKM"></td>'
                    + '<td><input type="text" class="form-control" name="txtTotalKM" id="txtTotalKM" onKeyUp="getValues()"></td>'
                    + '</tr>'
                    );
        });
        
        $("#add_air").click(function () {
            $('#tbl_air > tbody:last-child').append(
                    '<tr class="records">'
                    + '<td><input type="button" class="btn default btn-sm red-stripe remove_item" value="Hapus"></td>'
                    + '<td><input type="text" class="form-control" name="txtFMAwal"></td>'
                    + '<td><input type="text" class="form-control" name="txtFMAkhir"></td>'
                    + '<td><input type="text" class="form-control" name="txtPakaiFM"></td>'
                    + '<td><input type="text" class="form-control" name="txtBiayaFM"></td>'
                    + '<td><input type="text" class="form-control" name="txtTotalFM" id="txtTotalFM" onKeyUp="getValues()"></td>'
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

<script text="text/javascript">
    function getValues() {
        var ttlKM = document.getElementById('txtTotalKM').value;
        var ttlFM = document.getElementById('txtTotalFM').value;
        var lain = document.getElementById('txtLain').value;
        var tung = document.getElementById('txtTunggakan').value;

        if (ttlKM >= 0 || ttlFM >= 0) {
            document.getElementById('txtJmlBayar').value = (eval(ttlKM) + eval(ttlFM) + eval(lain) + eval(tung)) || 0;
        }

    }
</script>

<script text="text/javascript">
    $(document).ready(function () {
        var form3 = $('#form_kwitansi');
        var error3 = $('.alert-danger', form3);
        var success3 = $('.alert-success', form3);

        //IMPORTANT: update CKEDITOR textarea with actual content before submit
        form3.on('submit', function () {
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
//                    required: true
                },
                email: {
                    required: true,
                    email: true
                },
                txtTanggal: {
                    required: true
                },
//                txtNomor: {
//                    required: true
//                },
                txtLain: {
                    required: true
                },
                occupation: {
                    minlength: 5,
                },
                txtTunggakan: {
                    required: true
                },
                service: {
                    required: true,
                    minlength: 2
                },
                txtJmlBayar: {
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
                txtTanggal: {
                    required: "Silahkan pilih tanggal kwitansi"
                },
//                txtNomor: {
//                    required: "Silahkan isi nomor kwitansi"
//                },
                txtLain: {
                    required: "Silahkan isi biaya lain (bisa diisi angka 0)"
                },
                txtTunggakan: {
                    required: "Silahkan isi biaya tunggakan (bisa diisi angka 0)"
                },
                txtJmlBayar: {
                    required: "Silahkan isi jumlah yang harus dibayarkan"
                },
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
        $("#select2_tags").change(function () {
            form3.validate().element($(this)); //revalidate the chosen dropdown value and show error or success message for the input 
        }).select2({
            tags: ["red", "green", "blue", "yellow", "pink"]
        });

        //initialize datepicker
        $('.date-picker').txtTglPasang({
            rtl: Metronic.isRTL(),
            autoclose: true
        });
        $('.date-picker .form-control').change(function () {
            form3.validate().element($(this)); //revalidate the chosen dropdown value and show error or success message for the input 
        });
    });
</script>