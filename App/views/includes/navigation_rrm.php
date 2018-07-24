<?php
$NameArray = array('1' => 'Head', '2' => 'RRO', '3' => 'Team Leader', '4' => 'Hunter', '5' => 'RRO Leader');
$NameID = @$this->session->userdata('role');

$name = $NameArray[$NameID];


$userInfo = getUserInfo(@$this->session->userdata('userid'));
?>
<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav metismenu" id="side-menu">
            <li class="nav-header">
                <div class="dropdown profile-element"> <span>
                        <img alt="image" class="img-circle" src="<?php echo base_url(); ?>/assets/img/<?php echo $userInfo->user_pic; ?>" height="44" width="44" />
                    </span>
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold"><?php echo $userInfo->first_name; ?></strong>
                            </span> <span class="text-muted text-xs block"><?php echo $name; ?> <b class="caret"></b></span> </span> </a>
                    <ul class="dropdown-menu animated fadeInRight m-t-xs">
                        <li><a href="javascript:void(0);">Profile</a></li>
                        <li><a href="javascript:void(0);">Contacts</a></li>
                        <li><a href="javascript:void(0);">Mailbox</a></li>
                        <li class="divider"></li>
                        <li><a href="<?php echo base_url('users/logout'); ?>">Logout</a></li>
                    </ul>
                </div>
                <div class="logo-element">
                    DB
                </div>
            </li>

            <li class="<?php echo RroAccountNavigationClass(); ?>">
                <a href="<?php echo base_url('rrm/pipeline'); ?>"><i class="fa fa-align-center"></i> <span class="nav-label">Account Pipeline</span></a>
            </li>
            <li class="<?php echo RrmNavigationClass('Activity', 'index'); ?>"><a href="<?php echo base_url('activity'); ?>"><i class="fa fa-table"></i> <span class="nav-label">Task pipeline</span></a></li>


            <?php /*<li class="<?php echo RrmNavigationClass('Rrm', 'index'); ?>">
                <a href="<?php echo base_url('rrm'); ?>"><i class="fa fa-dashboard"></i><span class="nav-label">RRO Performance Dashboard</span></a>
            </li>*/?>
            <li class="<?php echo RroperformanceNavigationClass(); ?>">
                <a href="<?php echo base_url('rrm'); ?>"><i class="fa fa-dashboard"></i><span class="nav-label">Performance Dashboard</span> <span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li class="<?php echo HunterNavigationClass('Rrm', 'index'); ?>">
                        <a href="<?php echo base_url('rrm'); ?>">Financial and Risk Management KPIs</a>
                    </li>
                    <li class="<?php echo HunterNavigationClass('Rrm', 'process'); ?>">
                        <a href="<?php echo base_url('rrm/process'); ?>">Process Indicators</a>
                    </li>
                </ul>
            </li>
            <li class="<?php echo RroProfileNavigationClass(); ?>"><a href="<?php echo base_url('rrm/profile'); ?>">
                    <i class="fa fa-newspaper-o"></i> <span class="nav-label">Customer Profile</span></a></li>

            <li class="<?php echo RrmNavigationClass('Rrm', 'summary'); ?>">
                <a href="<?php echo base_url('rrm/summary'); ?>"><i class="fa fa-list-alt"></i> <span class="nav-label">Portfolio Summary</span></a>
            </li>


            <li class="<?php echo RroLeaderSalesNavigationClass(); ?>">
                <a href="<?php echo base_url('sales/bundle'); ?>"><i class="fa fa-database"></i> <span class="nav-label">Sale Toolkit</span></a>
            </li>

            <li class="<?php echo RrmNavigationClass('Referrals', 'index'); ?>">
                <a href="<?php echo base_url('referrals'); ?>"><i class="fa fa-indent"></i><span class="nav-label">Internal Referrals</span></a>
            </li>
            <li class="<?php echo RrmNavigationClass('Referrals', 'tracking'); ?>">
                <a href="<?php echo base_url('referrals/tracking'); ?>"><i class="fa fa-indent"></i><span class="nav-label">Referral Tracking</span></a>
            </li>

            <?php /* <li class="<?php echo RrmOtherNavigationClass('Rrm'); ?>">
              <a href="#"><i class="fa fa-bar-chart-o"></i> <span class="nav-label">Others</span><span class="fa arrow"></span></a>
              <ul class="nav nav-second-level collapse">

              <li><a href="<?php echo base_url('referrals/tracking'); ?>">Referral Tracking</a></li>
              <li><a href="<?php echo base_url('activity/report'); ?>">Activity report</a></li>
              </ul>
              </li> */ ?>
            <li>
                <a href="<?php echo base_url('users/logout'); ?>">
                    <i class="fa fa-sign-out"></i> <span class="nav-label">Logout</span>
                </a>
            </li>


        </ul>

    </div>
</nav>