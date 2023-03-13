<style>
  .blink {
  animation: blink 1s steps(5, start) infinite;
  -webkit-animation: blink 1s steps(5, start) infinite;
  color:#000000;
}
@keyframes blink {
  to { visibility: hidden; }
}
@-webkit-keyframes blink {
  to { visibility: hidden; }
</style>
<div class="page-head">
    <div class="container-fluid">            
        <div class="page-title">
            <h1>Dashboard <small>Halaman Utama</small></h1>
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
                            <span class="uppercase font-green"><h4>SELAMAT DATANG <strong><?php echo $this->session->userdata('nama'); ?></strong></h4></span>
                        </div>
                    </div>

                    <div class="portlet-body form">
                        <div class="well well-lg">
                            <h2 class="block">PAPAN PENGUMUMAN ERW</h2>
                            <p><h3><span class="blink">Kepada Departemen ELC & WTD Diharapkan Untuk Memasukkan Data Tagihan Serta Meng-approve Selambat-Lambatnya Tanggal 20 Setiap Bulannya</span></h3></p>
                        </div>
                    </div>                        
                </div>
            </div>
        </div>
        
        <?php if ($this->session->userdata('groupid') == 1) {?>
        <div class="row">
            <div class="col-md-12">                    
                <div class="portlet light">
                    <!--<div class="portlet-title">
                        <div class="caption">
                            <span class="uppercase font-green"><h4>SELAMAT DATANG <strong><?php echo $this->session->userdata('nama'); ?></strong></h4></span>
                        </div>
                    </div>-->

                    <div class="portlet-body">
                        <div class="table-toolbar">
                            <div class="row">                                    
                                <div class="col-md-12">
                                    <div class="alert alert-success">
                                        <i class="fa fa-calendar"></i> &nbsp;Sejarah login sampai tanggal<strong> <?php echo $this->session->userdata('serverdate'); ?></strong>
                                    </div>
                                </div>
                            </div>

                            <table id="table_loginhistory" cellspacing="0" cellpadding="0" class="table table-bordered table-striped table-condensed flip-content flip-scroll">
                                <thead class="flip-content">
                                    <tr>
                                        <th class="center middle">No</th>
                                        <th class="center middle">User ID</th>
                                        <th class="center middle">Masuk</th>
                                        <th class="center middle">Keluar</th>
                                        <th class="center middle">Hostname</th>
                                        <th class="center middle">Device</th>
                                        <th class="center middle">Browser</th>
                                        <th class="center middle">Platform</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $a = 0; foreach ($logUser as $l) {                                            
                                        echo "<tr>
                                            <td class='center'>" . ++$a . "</td>
                                                <td class='left'>" . $l->UserID . "</td>
                                                <td class='center'>" . datetime_ind($l->DateIn) . "</td>
                                                <td class='center'>" . datetime_ind($l->DateOut) . "</td>
                                                <td class='center'>" . $l->Hostname . "</td>
                                                <td class='center'>" . $l->Device . "</td>
                                                <td class='center'>" . $l->Browser . "</td>
                                                <td class='center'>" . $l->Platform . "</td>
                                            </tr>";
                                    }?>   
                                </tbody>
                            </table>
                        </div>
                    </div>                        
                </div>
            </div>
        </div>
        <?php } else { ?>
        <?php } ?>
    </div>        
</div>

<script>
    $(document).ready(function() {
        $("#table_loginhistory").dataTable();
    });
</script>
