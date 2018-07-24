<?php 
$class= $this->router->fetch_class();
$method=$this->router->fetch_method();
?>
<?php if($class=='Activity' && $method=='index') { ?>
<?php $this->load->view('includes/header_calender'); ?>
<?php } else{ ?>
<?php $this->load->view('includes/header'); ?>
<?php } ?>
<?php
$roleArrayNav = array('1' => '_head', '2' => '_rrm', '3' => '', '4' => '','5'=>'_rrm_leader');
$roleIDNav = @$this->session->userdata('role');
?>
<?php $this->load->view('includes/navigation' . $roleArrayNav[$roleIDNav]); ?>
<div id="page-wrapper" class="gray-bg dashbard-1">
    <?php $this->load->view('includes/header_panel'); ?>
    <?php $this->load->view($main_content); ?>
</div>
<?php //$this->load->view('includes/chat'); ?>
<div id="right-sidebar">
    <?php //$this->load->view('includes/right_sidebar'); ?>
</div>
<?php $this->load->view('includes/footer'); ?>