<?php
$NameArray = array('1' => 'Head', '2' => 'RRO', '3' => 'Hunter Leader', '4' => 'Hunter', '5' => 'RRO Leader');
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
                        <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold"><?php echo $userInfo->first_name;?></strong>
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
            <?php
            $roleArray = array('1' => 'head', '2' => 'rrm', '3' => 'home', '4' => 'hunter');
            $roleID = @$this->session->userdata('role');
            //print_r($this->session->userdata('role'));
            ?>
            <?php //HunterLeaderNavigationClass();?>
            <li class="<?php echo HunterLeaderNavigationClass(); ?>">
                <a href="#"><i class="fa fa-th-large"></i><span class="nav-label">Lead Management</span> <span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <?php if ($roleID != '4') { ?>
                        <li class="<?php echo HunterNavigationClass('Leads', 'allocation'); ?>">
                            <a href="<?php echo base_url('leads/allocation'); ?>">Lead Allocator</a>
                        </li>
                    <?php } else { ?>
                        <li class="<?php echo HunterNavigationClass('Hunter', 'index'); ?>">
                            <a href="<?php echo base_url('hunter'); ?>">Daily Hunter Dashboard</a>
                        </li>
                    <?php } ?>
                    <li class="<?php echo HunterLeaderDirectoryNavigationClass(); ?>"><a href="<?php echo base_url('leads'); ?>">Lead Directory</a></li>
                    <li class="<?php echo HunterNavigationClass('Leads', 'add'); ?>"><a href="<?php echo base_url('leads/addlead'); ?>">Create</a></li>
                    <li class="<?php echo HunterNavigationClass('Activity', 'index'); ?>"><a href="<?php echo base_url('activity'); ?>">Activity Planner</a></li>
                    <li class="<?php echo HunterNavigationClass('Referrals', 'tracking'); ?>"><a href="<?php echo base_url('referrals/tracking'); ?>">Referral Tracking</a></li>
                    <?php if ($roleID == '3') { ?>
                        <li class="<?php echo HunterNavigationClass('Home', 'area_allocator'); ?>">
                            <a href="<?php echo base_url('home/area_allocator'); ?>">Canvas Area Allocator</a>
                        </li>
                    <?php } ?>
                </ul>
            </li>
            <li class="<?php echo HunterLeaderSalesNavigationClass(); ?>">
                <a href="<?php echo base_url('sales/bundle'); ?>"><i class="fa fa-database"></i> <span class="nav-label">Sale Toolkit</span></a>
            </li>

            <li class="<?php echo HunterLeaderPerformanceNavigationClass(); ?>">
                <a href="#"><i class="fa fa-bar-chart-o"></i> <span class="nav-label">Performance Management</span><span class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse">
                    <li class="<?php echo HunterNavigationClass(ucfirst($roleArray[$roleID]), 'performance'); ?>"><a href="<?php echo base_url($roleArray[$roleID] . '/performance'); ?>" class="<?php echo HunterMainNavigationClass('Home', 'performance'); ?>">Performance Dashboard</a></li>
                   <li class="<?php echo HunterNavigationClass(ucfirst($roleArray[$roleID]), 'summary'); ?>"><a href="<?php echo base_url($roleArray[$roleID] . '/summary'); ?>" class="<?php echo HunterMainNavigationClass('Home', 'summary'); ?>">Pipeline Summary</a></li>
                   <?php if ($roleID != '4') { ?>
                    <li class="<?php echo HunterNavigationClass(ucfirst($roleArray[$roleID]), 'overview'); ?>"><a href="<?php echo base_url($roleArray[$roleID]); ?>" class="<?php echo HunterMainNavigationClass('Home', 'overview'); ?>">Team Performance Overview</a></li>
                <?php } ?>
                </ul>
            </li>
            <?php /* <li class="<?php echo HunterLeaderOthersNavigationClass(); ?>">
              <a href="#"><i class="fa fa-bar-chart-o"></i> <span class="nav-label">Others</span><span class="fa arrow"></span></a>
              <ul class="nav nav-second-level collapse">
              <?php /* <li class="<?php echo HunterNavigationClass('Home', 'area_allocator'); ?>"><a href="<?php echo base_url('home/area_allocator'); ?>">Area Allocator</a></li>
              <li class="<?php echo HunterNavigationClass('Activity', 'report'); ?>"><a href="<?php echo base_url('activity/report'); ?>">Activity Report</a></li>
              </ul>
              </li> */ ?>
          <!--   <li class="<?php// echo HunterLeaderReferalsNavigationClass(); ?>">
                <a href="<?php //echo base_url('referrals'); ?>"><i class="fa fa-indent"></i><span class="nav-label">Internal Referrals</span></a>
            </li>-->
            <li>
                <a href="<?php echo base_url('users/logout'); ?>">
                    <i class="fa fa-sign-out"></i> <span class="nav-label">Logout</span>
                </a>
            </li>
        </ul>

    </div>
</nav>