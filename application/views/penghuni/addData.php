<style type="text/css">
    .hide{
        display: none;
    }
</style>    
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
                            <span class="caption-subject font-green-sharp bold uppercase">Form Penghuni Mess</span>
                        </div>
                    </div>

                    <div class="portlet-body form"> 
                        <form action="<?php echo site_url('penghuni/tambah'); ?>" id="form_penghuni" method="post" role="form" class="form-horizontal">
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
                                        <?php echo $pesan; ?>
                                        <?php foreach ($getData as $row){ ?>
                                        <input type="hidden" name="txtIDBlok"  class="form-control" value="<?php echo $row->IDBlok; ?>" />
                                        <?php }?>
                                        <div class="form-group required">
                                            <label class="control-label col-md-3">Pilih Mess <span class="required">
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
                                                <label class="control-label col-md-3">Tipe Mess <span class="required">
                                                        * </span>
                                                </label>
                                                <div class="col-md-6">                                            
                                                    <input type="text" class="form-control" id="txtTipe" name="txtTipe" readonly="readonly" value="<?php echo $txtTipe; ?>"/>                                                                                                
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Nomor Kwh Meter <span class="required">
                                                        * </span>
                                                </label>
                                                <div class="col-md-6">                                            
                                                    <input type="text" class="form-control" id="txtKwh" name="txtKwh" readonly="readonly" value="<?php echo $txtKwh; ?>"/>                                                                                                
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Nomor Flow Meter <span class="required">
                                                        * </span>
                                                </label>
                                                <div class="col-md-6">                                            
                                                    <input type="text" class="form-control" id="txtFlow" name="txtFlow" readonly="readonly" value="<?php echo $txtFlow; ?>"/>                                                                                                
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Jumlah Kamar <span class="required">
                                                        * </span>
                                                </label>
                                                <div class="col-md-6">                                            
                                                    <input type="text" class="form-control" id="txtJumlah" name="txtJumlah" readonly="readonly" value="<?php echo $txtJumlah; ?>"/>                                                                                                
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
                                        <table class="table table-bordered table-condensed table-detail" id="tbl_keluarga">
                                            <thead >
                                                <tr>
                                                    <th scope="col" class="text-center" style="width:50px !important">#</th>
                                                    <th scope="col" class="text-center" style="width:90px">No Kamar</th>
                                                    <th scope="col" class="text-center hide">RegNo</th>
                                                    <th scope="col" class="text-center hide">FixNo</th>
                                                    <th scope="col" class="text-center">Nama</th>
                                                    <th scope="col" class="text-center" style="width:80px">NIK</th>
                                                    <th scope="col" class="text-center" style="width:90px">Departemen</th>
                                                    <th scope="col" class="text-center">CV</th>
                                                    <th scope="col" class="text-center">Keterangan</th>
<!--                                                    <th scope="col" class="text-center">Jabatan</th>-->
                                                    <th scope="col" class="text-center" style="width:130px">Hubungan</th>                                                    
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
                                        <button type="submit" class="btn btn-circle btn-primary" id="submit" name="simpan" value="submit"><i class="fa fa-floppy-o"></i> Simpan</button>
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
        var search = {search: $("#input_keluarga").val()};
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
        //var i = </?php echo $count_dtl ?>;
        $("#add_row").click(function () {
            //i += 1;
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
