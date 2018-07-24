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
                        <img alt="image" class="img-circle" src="<?php echo base_url(); ?>/assets/img/1.jpg"<?php echo $userInfo->user_pic;?>" height="44" width="44" />
                    </span>
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold"><?php echo $userInfo->first_name;?></strong>
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
            
            <li class="<?php echo RroleaderPipelineNavigationClass(); ?>"><a href="<?php echo base_url('Rroleader/pipeline'); ?>"><i class="fa fa-align-center"></i> <span class="nav-label">Account Pipeline</span></a></li>
            <li class="<?php echo RrmNavigationClass('Activity', 'index'); ?>"><a href="<?php echo base_url('activity'); ?>"><i class="fa fa-table"></i> <span class="nav-label">Task Pipeline</span></a></li>
            
            
            <li class="<?php echo RroLeaderDashboardNavigationClass(); ?>">
                <a href="<?php echo base_url('rroleader'); ?>"><i class="fa fa-dashboard"></i><span class="nav-label">RRO Performance Dashboard</span><span class="fa arrow"></span></a>
                
               
                 <ul class="nav nav-second-level">
                  <li class="<?php echo RrmNavigationClass('Rroleader', 'performance'); ?>"><a href="<?php echo base_url('rroleader/performance'); ?>" class="">Team Performance Overview</a></li>
                    <li class="<?php echo RrmNavigationClass('Rroleader', 'index'); ?>">
                        <a href="<?php echo base_url('rroleader'); ?>">Financial and Risk Management KPIs</a>
                    </li>
                    <li class="<?php echo RrmNavigationClass('Rroleader', 'process'); ?>">
                        <a href="<?php echo base_url('rroleader/process'); ?>">Process Indicators</a>
                    </li>
                </ul>
                
            </li>
                <li class="<?php echo RroleaderProfileNavigationClass(); ?>"><a href="<?php echo base_url('Rroleader/profile'); ?>">
                    <i class="fa fa-newspaper-o"></i> <span class="nav-label">Client Profile</span></a></li>
            
            <li class="<?php echo RrmNavigationClass('Rroleader', 'summary'); ?>">
                <a href="<?php echo base_url('rroleader/summary'); ?>"><i class="fa fa-list-alt"></i> <span class="nav-label">Portfolio Summary</span></a>
            </li>
            
            
            <li class="<?php echo RroLeaderSalesNavigationClass(); ?>">
                <a href="<?php echo base_url('sales/bundle'); ?>"><i class="fa fa-database"></i> <span class="nav-label">Sale Toolkit</span></a>
            </li>
            
            <li class="<?php echo RrmNavigationClass('Rroleader', 'refferals'); ?>">
                <a href="<?php echo base_url('rroleader/refferals'); ?>"><i class="fa fa-indent"></i> <span class="nav-label">Internal Referrals</span></a>
            </li>
             <li class="<?php echo RrmNavigationClass('Referrals', 'tracking'); ?>">
                <a href="<?php echo base_url('referrals/tracking'); ?>"><i class="fa fa-indent"></i><span class="nav-label">Referral Tracking</span></a>
            </li>
            
            <?php /*<li class="<?php echo RrmOtherNavigationClass('Rroleader'); ?>">
                <a href="#"><i class="fa fa-bar-chart-o"></i> <span class="nav-label">Others</span><span class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse">
                    
                    <li><a href="<?php echo base_url('referrals/tracking'); ?>">Referral Tracking</a></li>
                    <li><a href="<?php echo base_url('activity/report'); ?>">Activity report</a></li>
                </ul>
            </li> */?>
            <li>
                <a href="<?php echo base_url('users/logout'); ?>">
                    <i class="fa fa-sign-out"></i> <span class="nav-label">Logout</span>
                </a>
            </li>

        </ul>

    </div>
</nav>