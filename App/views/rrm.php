<?php 
$class= $this->router->fetch_class();
$method=$this->router->fetch_method();
?>
<?php if(ucfirst($class)=='Rrm' && $method=='activity') { ?>
<?php $this->load->view('includes/header_calender'); ?>
<?php } else{ ?>
<?php $this->load->view('includes/header'); ?>
<?php } ?>
<?php //$this->load->view('includes/header'); ?>
<?php $this->load->view('includes/navigation_rrm'); ?>
<div id="page-wrapper" class="gray-bg dashbard-1">
    <?php $this->load->view('includes/header_panel'); ?>
    <?php $this->load->view($main_content); ?>
</div>

<div id="right-sidebar">
    <?php $this->load->view('includes/right_sidebar'); ?>
</div>
<?php $this->load->view('includes/footer'); ?>