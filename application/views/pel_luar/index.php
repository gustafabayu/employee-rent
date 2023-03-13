  
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
                            
                            <span class="caption-subject font-green-sharp bold uppercase">Daftar Mess Karyawan</span>
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
                                                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'></button> Data behasil <b>ditambahkan</b>..</div>";
                                } elseif ($this->input->get('msg') == 'failed') {
                                    echo "<div class='alert alert-danger alert-dismissable'>
                                                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'></button> Data gagal <b>ditambahkan</b>..</div>";
                                }?>
                                <div class="col-md-6">
                                    <div class="btn-group">
                                        <a id="table_mess_new" class="btn btn-circle green-haze" href='<?php echo base_url("mess/addMess"); ?>'>
                                            Tambah Data <i class="fa fa-plus"></i>
                                        </a>
                                    </div>
                                </div>                                    
                            </div>
                        </div>

                        <table id="table_mess" cellspacing="0" cellpadding="0" class="table table-bordered table-striped table-condensed flip-content flip-scroll">
                            <thead class="flip-content">
                                <tr>
                                    <th>No</th>
                                    <th>Nama Mess</th>
<!--                                    <th>Alias</th>-->
                                    <th>Tipe</th>
                                    <th>Alamat</th>
                                    <th>Blok</th>
                                    <th>Kopel</th>
                                    <th>Pintu</th>                                        
                                    <th>Jumlah Kamar</th>
                                    <th>Nomor Kwh Meter</th>
                                    <th>Nomor Flow Meter</th>                                                                                                                       
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $n = 0; foreach ($getMess as $setM) { ?>
                                    <tr >
                                        <td><?php echo ++$n; ?></td>
                                        <td><?php echo $setM->Nama; ?></td>
<!--                                        <td><?php echo $setM->Alias; ?></td>-->
                                        <td><?php $this->load->model('m_mess'); $M = $this->m_mess->selectMess($setM->IDTipe);
                                            foreach ($M as $set): echo $set->TipeMess; endforeach;?>
                                        </td>                                        
                                        <td><?php echo $setM->Alamat; ?></td>
                                        <td><?php echo $setM->Blok; ?></td>
                                        <td><?php echo $setM->Kopel; ?></td>
                                        <td><?php echo $setM->Pintu; ?></td>                                        
                                        <td><?php echo $setM->JmlKamar; ?></td>                                        
                                        <td><?php $this->load->model('m_mess'); $K = $this->m_mess->selectKwh($setM->IDKwh);
                                            foreach ($K as $set): echo $set->Nomor; endforeach; ?>
                                        </td>                                        
                                        <td><?php $this->load->model('m_mess'); $F = $this->m_mess->selectFlow($setM->IDFlowMtr);
                                            foreach ($F as $set): echo $set->Nomor; endforeach; ?>
                                        </td>
                                        <td>
                                            <a href="<?php echo site_url('mess/editMess') . "?id=" . $setM->IDMess; ?>" class="btn btn-circle btn-xs blue">
                                                <i class="fa fa-edit"></i> Ubah
                                            </a>
    <!--                                            <a href="<?php echo site_url('mess/delMess') . "?id=" . $setM->IDMess; ?>" class="btn btn-circle btn-xs red" 
                                               onclick="javascript: return confirm('Anda Yakin Hapus Data?')">
                                                <i class="fa fa-times"></i> Hapus
                                            </a>-->
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
        $("#table_mess").dataTable();
    });
</script>