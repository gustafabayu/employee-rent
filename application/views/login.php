<!DOCTYPE html>
<html lang="en">   
    <head>
        <meta charset="utf-8"/>
        <title>PSG | ERW</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
        <meta http-equiv="Content-type" content="text/html; charset=utf-8">
        <meta content="" name="description"/>
        <meta content="" name="author"/>
        
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url(); ?>assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url(); ?>assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url(); ?>assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url(); ?>assets/global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css"/>
        
        <link href="<?php echo base_url(); ?>assets/admin/pages/css/login.css" rel="stylesheet" type="text/css"/>
       
        <link href="<?php echo base_url(); ?>assets/global/css/components-rounded.css" id="style_components" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url(); ?>assets/global/css/plugins.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url(); ?>assets/admin/layout/css/layout.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url(); ?>assets/admin/layout/css/themes/default.css" rel="stylesheet" type="text/css" id="style_color"/>
        <link href="<?php echo base_url(); ?>assets/admin/layout/css/custom.css" rel="stylesheet" type="text/css"/>
        
        <link rel="shortcut icon" href="favicon.ico"/>
    </head>
    
    <body class="login">       
        <div class="menu-toggler sidebar-toggler">
        </div>        
        <div class="logo">
            <a href="#">
                <img src="<?php echo base_url(); ?>assets/admin/layout3/img/logopsg.png" alt="logo"  height="147" width="400"/>
            </a>
        </div>
        
        <div class="content">           
            <form class="login-form" action="<?php echo site_url('login/loginUser'); ?>" method="post">
                <h3 class="form-title"><?php echo $this->config->item('title'); ?></h3>
                <?php
                if ($this->session->flashdata('message')) :
                    echo $this->session->flashdata('message');
                endif;
                ?>               
                <div class="form-group">                   
                    <label class="control-label visible-ie8 visible-ie9">Username</label>
                    <input class="form-control form-control-solid placeholder-no-fix" type="text" autocomplete="off" placeholder="Username" name="txtIdUser" autofocus/>
                </div>
                <div class="form-group">
                    <label class="control-label visible-ie8 visible-ie9">Password</label>
                    <input class="form-control form-control-solid placeholder-no-fix" type="password" autocomplete="off" placeholder="Password" name="txtPasswd"/>
                </div>
                <div class="form-actions">
                    <button type="submit" class="btn btn-success uppercase">Login</button>
                    
                </div>
                <div class="form-actions" >
                    <h5><center>Halaman dimunculkan ini dalam <strong>{elapsed_time}</strong> detik</center></h5>
                </div>
                
                <div class="create-account">
                    <p>
                        <a href="javascript:;" id="register-btn" class="uppercase">Tentang Program</a>
                    </p>
                </div>
            </form>
                                    
            <form class="register-form" action="index.html" method="post">
                <h3>Tentang Program ERW</h3>
                <p class="hint">

                </p>
                <div class="form-group">
                    <p >Program <b>ERW (Electricity, Residence, Water)</b> adalah program untuk menginvertaris jumlah mess, kWh meter, & Flow meter.</p>
                    <p >Program ini digunakan untuk menghitung jumlah tagihan beban dari kWh meter & Flow meter yang hasilnya akan digunakan untuk pemotongan gaji karyawan serta borongan.</p>
                </div>                

                <div class="form-actions">
                    <button type="button" id="register-back-btn" class="btn btn-success">Kembali</button>
                    
                </div>
            </form>
            
        </div>
        <div class="copyright">
            2016 © PT. Pulau Sambu.
        </div>
        
        <script src="<?php echo base_url(); ?>assets/global/plugins/jquery.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/global/plugins/jquery-migrate.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/global/plugins/jquery-ui/jquery-ui.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/global/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/global/plugins/jquery.cokie.min.js" type="text/javascript"></script>
        
        <script src="<?php echo base_url(); ?>assets/global/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
<!--        <script src="<?php echo base_url(); ?>assets/global/plugins/jquery.pulsate.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/global/plugins/jquery-bootpag/jquery.bootpag.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/global/plugins/holder.js" type="text/javascript"></script>-->
        
        <script src="<?php echo base_url(); ?>assets/global/scripts/metronic.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/admin/layout/scripts/layout.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/admin/layout/scripts/demo.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/admin/pages/scripts/login.js" type="text/javascript"></script>
<!--        <script src="<?php echo base_url(); ?>assets/admin/pages/scripts/ui-general.js" type="text/javascript"></script>-->
       
        <script>
            jQuery(document).ready(function() {
                Metronic.init(); // init metronic core components
                Layout.init(); // init current layout
                Login.init();
                Demo.init();
                //UIGeneral.init();
            });
        </script>       
    </body>    
</html>