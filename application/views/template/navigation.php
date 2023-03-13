<!-- BEGIN TOP NAVIGATION MENU -->
<div class="top-menu">
    <ul class="nav navbar-nav pull-right">

        <!-- BEGIN USER LOGIN DROPDOWN -->
        <li class="dropdown dropdown-user dropdown-dark">
            <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                <img alt="" class="img-circle" src="<?php echo base_url(); ?>assets/admin/layout3/img/avatar.png">
                <span class="username username-hide-mobile"><?php echo $this->session->userdata('username'); ?> (<?php echo $this->session->userdata('jabatan'); ?> <?php echo $this->session->userdata('departemen'); ?>)</span>
            </a>
            <ul class="dropdown-menu dropdown-menu-default">
<!--                <li>
                    <a href="extra_profile.html">
                        <i class="icon-user"></i> My Profile </a>
                </li>
                <li>
                    <a href="page_calendar.html">
                        <i class="icon-calendar"></i> My Calendar </a>
                </li>
                <li>
                    <a href="inbox.html">
                        <i class="icon-envelope-open"></i> My Inbox <span class="badge badge-danger">
                            3 </span>
                    </a>
                </li>
                <li>
                    <a href="javascript:;">
                        <i class="icon-rocket"></i> My Tasks <span class="badge badge-success">
                            7 </span>
                    </a>
                </li>
                <li class="divider">
                </li>
                <li>
                    <a href="extra_lock.html">
                        <i class="icon-lock"></i> Lock Screen </a>
                </li>-->
                <li>
                    <a href="<?php echo base_url('password'); ?>">
                        <i class="icon-lock"></i> Ganti Password </a>
                </li>
                <li>
                    <a href="<?php echo base_url('dashboard/do_logout'); ?>">
                        <i class="icon-key"></i> Keluar </a>
                </li>
            </ul>
        </li>
        <!-- END USER LOGIN DROPDOWN -->
        <!-- BEGIN USER LOGIN DROPDOWN -->
        <!--                    <li class="dropdown dropdown-extended quick-sidebar-toggler">
                                <span class="sr-only">Toggle Quick Sidebar</span>
                                <i class="icon-logout"></i>
                            </li>-->
        <!-- END USER LOGIN DROPDOWN -->
    </ul>
</div>
<!-- END TOP NAVIGATION MENU -->