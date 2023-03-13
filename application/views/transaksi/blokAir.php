    
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
                            <span class="caption-subject font-green-sharp bold uppercase">Form Tagihan Air</span>
                        </div>
                    </div>

                    <div class="portlet-body">
                        <div class="table-toolbar">
                            <div class="row">
                                <?php echo $message; ?>
                                <br/>
                                <div class="col-md-12">
                                    <div class="alert alert-success">
                                        <h5 class="uppercase"><strong>Periode Aktif Penagihan : <?php echo $periodeaktif; ?></strong></h5>                                    
                                    </div>
                                </div>
                                
                                <?php
                                if ($this->input->get('msg') == 'success_edit') {
                                    echo "<div class='alert alert-success alert-dismissable'>
                                            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'></button> <b>Ubah</b> data berhasil..</div>";
                                } elseif ($this->input->get('msg') == 'failed_edit') {
                                    echo "<div class='alert alert-danger alert-dismissable'>
                                            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'></button> <b>Ubah</b> data tidak berhasil..</div>";
                                } elseif ($this->input->get('msg') == 'success') {
                                    echo "<div class='alert alert-success alert-dismissable'>
                                            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'></button> Data behasil <b>ditambah</b>..</div>";
                                } elseif ($this->input->get('msg') == 'failed') {
                                    echo "<div class='alert alert-danger alert-dismissable'>
                                            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'></button> Data tidak behasil <b>ditambah</b>..</div>";
                                } ?>
                                <div class="col-md-4">
                                    <div class="btn-group">
                                        <?php  foreach ($almtAir as $set) : ?>
                                        <a id="table_kwh_new" class="btn btn-circle green-haze" href='<?php echo base_url("transaksi/add_Air")."?id=".$set->IDBlok; ?>'>
                                            <i class="fa fa-plus"></i> Tambah Tagihan
                                        </a>
                                        <?php endforeach; ?>
                                    </div>
                                    <div class="btn-group">
                                        <a id="table_flow_new" class="btn btn-circle btn-danger" href='<?php echo base_url("transaksi/air"); ?>'>
                                            <i class="fa fa-undo"></i> Kembali 
                                        </a>
                                    </div>
                                </div>                                
                            </div>
                        </div>

                        <table id="table_flowmtr" cellspacing="0" cellpadding="0" class="table table-bordered table-striped table-condensed flip-content flip-scroll">
                            <thead class="flip-content">
                                <tr>
                                    <th>No</th>
                                    <th>Nama Mess</th>                                        
                                    <th>No Flow Mtr</th>
                                    <th>Periode</th>
                                    <th>Beban Lalu</th>                                        
                                    <th>Beban Sekarang</th>
                                    <th>Pemakaian</th>
                                    <th>Entri</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 0; foreach ($alamatAir as $set){ ?>
                                    <tr>
                                        <td><?php echo ++$no; ?></td>
                                        <td><strong><?php $this->load->model('m_transaksi'); $a = $this->m_transaksi->selectAlamat($set->IDMess);
                                            foreach ($a as $setM): echo $setM->Nama; endforeach; ?></strong></td>                                                                                                                            
                                        <td><strong><?php echo $set->Nomor; ?></strong></td>
                                        <td><strong><?php echo $set->Periode; ?></strong></td>
                                        <td><?php echo $set->FlowAwal; ?></td>
                                        <td><?php echo $set->Flow; ?></td>
                                        <td <?php if ($set->Pemakaian <= 4) { echo "style=\"background-color:#fd6969\""; }?>><strong><?php echo $set->Pemakaian; ?></strong></td>
                                        <td>
                                            <a href="<?php echo site_url('transaksi/bebanAir')."?id=".$set->ID; ?>" class="btn btn-circle blue">
                                                <i class="fa fa-plus"></i> Masukkan Tagihan</a>
                                        </td>                                        
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
        $("#table_flowmtr").dataTable();
    });
</script>
