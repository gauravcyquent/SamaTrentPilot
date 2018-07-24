<div class="row border-bottom fixed-header">
    <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
        </div>
        <div class="navbar-logo">
            <img src="<?php echo base_url(); ?>/assets/img/logo.png" class="" alt="danamon">
        </div>
        <ul class="nav navbar-top-links navbar-right">
            <li>
                <?php
                $NameArray = array('1' => 'Head', '2' => 'RRO', '3' => 'Hunter Leader', '4' => 'Hunter','5'=>'RRO Leader');
                $NameID = @$this->session->userdata('role');
                $name = $NameArray[$NameID]
                ?>
                <span class="m-r-sm text-muted welcome-message">Welcome :<b> <?php echo $name; ?></b></span>
            </li>
            <?php
            $RoleArray = array('1' => 'head', '2' => 'rrm', '3' => 'home', '4' => 'hunter','5'=>'rroleader');
            $RoleID = @$this->session->userdata('role');
            $alias = $RoleArray[$RoleID]
            ?>
            <li class="home"><a href="<?php echo base_url($alias); ?>"><i class="fa fa-home" aria-hidden="true"></i></a></li>
            <!--<li class="dropdown">

                <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
                    <i class="fa fa-bell"></i>  <span class="label label-primary">8</span>
                </a>
                <ul class="dropdown-menu dropdown-alerts">
                    <li>
                        <a href="javascript:void(0);">
                            <div>
                                <i class="fa fa-envelope fa-fw"></i> You have 16 messages
                                <span class="pull-right text-muted small">4 minutes ago</span>
                            </div>
                        </a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="javascript:void(0);">
                            <div>
                                <i class="fa fa-twitter fa-fw"></i> 3 New Followers
                                <span class="pull-right text-muted small">12 minutes ago</span>
                            </div>
                        </a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="javascript:void(0);">
                            <div>
                                <i class="fa fa-upload fa-fw"></i> Server Rebooted
                                <span class="pull-right text-muted small">4 minutes ago</span>
                            </div>
                        </a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <div class="text-center link-block">
                            <a href="javascript:void(0);">
                                <strong>See All Alerts</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </div>
                    </li>
                </ul>
            </li>-->
            
            

        </ul>

    </nav>
</div>
<div class="conten-up">