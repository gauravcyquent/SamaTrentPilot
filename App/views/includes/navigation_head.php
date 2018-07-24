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
                        <img alt="image" class="img-circle" src="<?php echo base_url(); ?>uploads/users/profile/<?php echo $userInfo->user_pic;?>" height="44" width="44"  />
                    </span>
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold">David Williams</strong>
                            </span> <span class="text-muted text-xs block"><?php echo $name; ?><b class="caret"></b></span> </span> </a>
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
          
            <li class="<?php echo HeadNavigationClass('Head', 'index'); ?>">
                <a href="<?php echo base_url('head'); ?>"><i class="fa fa-dashboard"></i><span class="nav-label">Home</span></a>
            </li>
            <li class="<?php echo HeadNavigationClass('Head', 'rrm_performance'); ?>">
                <a href="<?php echo base_url('head/rrm_performance'); ?>"><i class="fa fa-list-alt"></i> <span class="nav-label">RRM Performance</span></a>
            </li>
            <li class="<?php echo HeadNavigationClass('Head', 'performance'); ?>">
                <a href="<?php echo base_url('head/performance'); ?>">
                    <i class="fa fa-newspaper-o"></i> <span class="nav-label">Hunter Performance</span></a></li>
            <li class="<?php echo HeadNavigationClass('Head', 'notification'); ?>">
                <a href="<?php echo base_url('head/notification'); ?>"><i class="fa fa-table"></i> <span class="nav-label">Notifications</span></a>
            </li>
            <!--<li class="<?php echo RrmOtherNavigationClass('Head'); ?>">
                <a href="#"><i class="fa fa-bar-chart-o"></i> <span class="nav-label">Others</span><span class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse">
                    <li><a href="<?php echo base_url('referrals'); ?>">Internal Referrals</a></li>
                    <li><a href="<?php echo base_url('referrals/tracking'); ?>">Referral Tracking</a></li>
                </ul>
            </li>-->
            <li>
                <a href="<?php echo base_url('users/logout'); ?>">
                    <i class="fa fa-sign-out"></i> <span class="nav-label">Logout</span>
                </a>
            </li>

        </ul>

    </div>
</nav>