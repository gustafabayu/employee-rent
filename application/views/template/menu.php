<div class="page-header-menu">
    <div class="container-fluid">

        <div class="hor-menu ">
            <ul class="nav navbar-nav">
                <li class="">
                    <a href="<?php echo site_url('dashboard'); ?>"><i class="fa fa-dashboard"></i> Dashboard</a>
                </li>

                <!--</?php foreach ($_getMenu as $row0): ?>
                    </?php if ($row0->MenuLevel == 0) { ?>
                        <li class="menu-dropdown mega-menu-dropdown ">
                            <a data-hover="megamenu-dropdown" data-close-others="true" data-toggle="dropdown" href="javascript:;" class="dropdown-toggle">
                                </?php
                                echo "<i class='" . $row0->MenuIcon . "'></i> ";
                                echo $row0->MenuLabel;
                                ?> <i class="fa fa-angle-double-down"></i>
                            </a>
                            <ul class="dropdown-menu" style="min-width: 210px">
                                </?php
                                foreach ($_getMenu as $row1):
                                    if ($row1->MenuLevel == 1 && substr($row1->MenuID, 0, 1) == substr($row0->MenuID, 0, 1)) {
                                        echo "<li><a href='" . site_url($row1->MenuLink) . "'><i class='" . $row1->MenuIcon . "'></i> " . $row1->MenuLabel . "</a></li>";
                                    }
                                endforeach;
                                ?>
                            </ul>
                        </li>
                    </?php } ?>
                </?php endforeach; ?>-->
                
                <?php
                $levelid = $this->session->userdata('groupid');
                $this->db->order_by('MenuID');
                $main = $this->db->get_where('vwMenuAkses', array('MenuParent' => 0, 'LevelID' => $levelid));
                foreach ($main->result() as $m) {
                    // chek ada submenu atau tidak
                    $sub = $this->db->get_where('vwMenuAkses', array('MenuParent' => $m->MenuID, 'LevelID' => $levelid));
                    if ($sub->num_rows() > 0) {

                        // buat menu
                        echo '<li class="menu-dropdown mega-menu-dropdown">';
                        echo '<a data-hover="megamenu-dropdown" data-close-others="true" data-toggle="dropdown" href="javascript:;" class="dropdown-toggle">
                               <i class="' . $m->MenuIcon . '"></i> ' . $m->MenuName . '<i class="fa fa-angle-double-down"></i></a>' ;
                        echo "<ul class='dropdown-menu' style='min-width: 210px'>";

                        //buat sub menu
                        foreach ($sub->result() as $s) {
                            echo '<li>' . anchor(site_url($s->MenuLink), '<i class="' . $s->MenuIcon . '"></i> ' . $s->MenuName) . '</li>';
                        }
                        echo "</ul>";
                        echo '</li>';
                    } else {
                        // single menu
                        echo '<li>' . anchor(site_url($m->MenuLink), '<i class="' . $m->MenuIcon . '">
                            </i>  ' . $m->MenuName . '') . '</li>';
                    }
                }
                ?>        
            </ul>
        </div>
        
    </div>
</div>
