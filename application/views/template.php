<!DOCTYPE html>
<html lang="en" class="no-js">    
    <!-- BEGIN HEAD -->
    <head>
        <meta charset="utf-8">
        <title>PSG | ERW </title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport">
        <meta content="" name="description">
        <meta content="" name="author">

        <?php echo $_style; ?>
        <?php echo $_script; ?>
    </head>
    <!-- END HEAD -->

    <body class="page-header-menu-fixed">
        <!-- BEGIN HEADER -->
        <div class="page-header">
            <!-- BEGIN HEADER TOP -->
            <div class="page-header-top">
                <div class="container-fluid">
                    <!-- BEGIN LOGO -->
                    <div class="page-logo">
                        <a href="#">
                            <img src="<?php echo base_url(); ?>assets/admin/layout3/img/logopsg.png" alt="logo"  height="75" width="190">
                            <!--<h1 class="font-blue-dark">PULAU SAMBU</h1>-->
                        </a>
                    </div>
                    <!-- END LOGO -->
                    <!-- BEGIN RESPONSIVE MENU TOGGLER -->
                    <a href="javascript:;" class="menu-toggler"></a>
                    <!-- END RESPONSIVE MENU TOGGLER -->

                    <?php echo $_navigation; ?>
                </div>
            </div>
            <!-- END HEADER TOP -->

            <?php echo $_menu; ?>
        </div>
        <!-- END HEADER -->

        <!-- BEGIN PAGE CONTAINER -->
        <div class="page-container">

<!--             BEGIN PAGE HEAD 
            <div class="page-head">
                <div class="container-fluid">
                     BEGIN PAGE TITLE 
                    <div class="page-title">
                        </?php echo $_title; ?>
                    </div>
                     END PAGE TITLE 					
                </div>
            </div>
             END PAGE HEAD -->

            <?php echo $_content; ?>

        </div>
        <!-- END PAGE CONTAINER -->

        <?php echo $_footer; ?>
    </body>
    <!-- END BODY -->
</html>
