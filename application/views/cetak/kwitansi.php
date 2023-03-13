  
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
                            <span class="caption-subject font-green-sharp bold uppercase">cetak kwitansi tagihan</span>
                        </div>                            
                    </div>

                    <div class="portlet-body">
                        <div class="table-toolbar">
                            <div class="row">
                                <?php
                                if ($this->input->get('msg') == 'success_edit') {
                                    echo "<div class='alert alert-success alert-dismissable'>
                                                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'></button> <b>Ubah</b> data berhasil..</div>";
                                } elseif ($this->input->get('msg') == 'failed_edit') {
                                    echo "<div class='alert alert-danger alert-dismissable'>
                                                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'></button> <b>Ubah</b> data tidak berhasil..</div>";
                                } elseif ($this->input->get('msg') == 'success') {
                                    echo "<div class='alert alert-success alert-dismissable'>
                                                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'></button> Data behasil <b>dihapus</b>..</div>";
                                } elseif ($this->input->get('msg') == 'failed') {
                                    echo "<div class='alert alert-danger alert-dismissable'>
                                                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'></button> Data gagal <b>dihapus</b>..</div>";
                                }?>
                                <form action="<?php echo site_url('cetak/lihatKwitansi'); ?>" id="form_kwitansi" method="post" role="form" class="form-horizontal">                                        
                                    <label class="col-md-2 uppercase">Periode kwitansi <span class="required">
                                                        * </span>
                                    </label>
                                    <div class="col-md-3">
                                        <div class="input-group input-big date date-picker" data-date-format="mm/yyyy" data-date-viewmode="years" data-date-minviewmode="months">
                                            <input type="text" class="form-control"  name="txtPeriode">
                                            <span class="input-group-btn">
                                            <button class="btn default" type="button"><i class="fa fa-calendar"></i></button>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="btn-group">
                                            <button type="submit" name="submit" class="btn btn-circle green-haze" >
                                                Proses
                                            </button>
                                        </div>
                                    </div>
                                </form>                                    
                            </div>
                        </div>
                        <div class="table-toolbar">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="alert alert-success">
                                        <h5 class="uppercase"><strong>Periode lihat kwitansi : <?php echo $lihatKwitansi; ?></strong></h5>                                    
                                    </div>
                                </div>
                            </div>
                        </div>

                        <table id="table_mess" cellspacing="0" cellpadding="0" class="table table-bordered table-striped table-condensed flip-content flip-scroll">
                            <thead class="flip-content">
                                <tr>
                                    <th>No</th>
                                    <th>Nama Blok</th>
                                    <th>Lihat Data</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 0; foreach ($alamatMess as $set) { ?>
                                    <tr>
                                        <td><?php echo ++$no; ?></td>
                                        <td><?php echo $set->NamaBlok; ?></td>
                                        <?php if ($this->session->userdata('lihatKwitansi') == NULL){ ?>
                                        <td class="uppercase"><strong>Silahkan Pilih Bulan Dahulu</strong></td>                                        
                                        <?php } else { ?>
                                        <td>
                                            <a href="<?php echo site_url('cetak/blokMess2')."?id=".$set->IDBlok; ?>" class="btn btn-circle blue">
                                                <i class="fa fa-edit"></i> Lihat Data</a>
                                        </td>
                                        <?php } ?>
<!--                                        <td>
                                            <a href="<?php echo site_url('cetak/blokMess')."?id=".$set->IDBlok; ?>" class="btn btn-circle blue">
                                                <i class="fa fa-edit"></i> Lihat Alamat</a>
                                        </td>-->
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>                    
            </div>
        </div>            
    </div>
</div>    

<script>
    $(document).ready(function() {
        $("#table_mess").dataTable();
    });
</script>