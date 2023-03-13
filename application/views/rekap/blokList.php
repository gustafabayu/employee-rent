<div class="page-head">
    <div class="container-fluid">            
        <div class="page-title">
            <h1>Rekap <small>Tagihan Listrik Mess</small></h1>
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
                            <span class="caption-subject font-green-sharp bold uppercase">Rekap Bulanan Tagihan Listrik</span>
                        </div>
                    </div>

                    <div class="portlet-body">                        
                        <div class="table-toolbar">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="alert alert-success">
                                        <h5 class="uppercase"><strong>Periode Muncul : <?php echo $periodeaktif; ?></strong></h5>                                    
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
                                                                
                                <div class="col-md-3">
                                    <div class="btn-group">
                                        <a id="table_flow_new" class="btn btn-circle btn-danger" href='<?php echo base_url("rekap/listrik"); ?>'>
                                            <i class="fa fa-undo"></i> Kembali 
                                        </a>
                                    </div>
                                </div>
                                
                            </div>
                        </div>

                        <table id="table_kwhmtr" cellspacing="0" cellpadding="0" class="table table-bordered table-striped table-condensed flip-content flip-scroll">
                            <thead class="flip-content">
                                <tr>
                                    <th>No</th>
                                    <th>Alamat</th>
                                    <th>No Kwh Mtr</th>
                                    <th>Periode</th>
                                    <th>Pemakaian</th>
                                    <th>Biaya</th>
                                    <th>Nama</th>
                                    <th>NIK</th>
                                    <th>Dept</th>
                                    <th>CV</th>
                                    <th>Tagihan</th>
                                    <th>Tunggakan</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 0; foreach ($alamatList as $set){ ?>
                                    <tr>
                                        <td><strong><?php echo ++$no; ?></strong></td>
                                        <td><strong><?php $this->load->model('m_rekap'); $b = $this->m_rekap->almtMess($set->IDMess);
                                            foreach ($b as $setB): echo $setB->Nama; endforeach;?></strong></td>                                        
                                        <td><strong><?php echo $set->Nomor; ?></strong></td>
                                        <td><strong><?php echo $set->Periode; ?></strong></td>
                                        <td><strong><?php echo $set->Pemakaian; ?></strong></td>
                                        <td><strong><?php echo $set->Biaya; ?></strong></td>
                                        <td><strong><?php echo $set->Nama; ?></strong></td>
                                        <td><strong><?php echo $set->NIK; ?></strong></td>
                                        <td><strong><?php echo $set->Dept; ?></strong></td>
                                        <td><strong><?php echo $set->CV; ?></strong></td>
                                        <td><strong><?php echo $set->Tagihan; ?></strong></td>
                                        <td><strong><?php echo $set->Tunggakan; ?></strong></td>
                                        <td><strong><?php echo $set->Total; ?></strong></td>                                        
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
        $("#table_kwhmtr").dataTable();
    });
</script>