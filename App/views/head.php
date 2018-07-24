<?php $this->load->view('includes/header'); ?>
<?php $this->load->view('includes/navigation_head'); ?>
<div id="page-wrapper" class="gray-bg dashbard-1">
    <?php $this->load->view('includes/header_panel'); ?>
    <?php $this->load->view($main_content); ?>
</div>
<?php $this->load->view('includes/chat'); ?>
<div id="right-sidebar">
    <?php $this->load->view('includes/right_sidebar'); ?>
</div>
<?php $this->load->view('includes/footer'); ?>