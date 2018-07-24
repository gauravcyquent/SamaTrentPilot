<?php $this->load->view('admin/header'); ?>

<!-- BEGIN BASE-->
<div id="base">

    <!-- BEGIN OFFCANVAS LEFT -->
    <div class="offcanvas">
    </div><!--end .offcanvas-->
    <!-- END OFFCANVAS LEFT -->

    <!-- BEGIN CONTENT-->
    <div id="content">
        <?php $this->load->view($main_content); ?>
        <?php $this->load->view('admin/footer_info'); ?>
    </div><!--end #content-->
    <!-- END CONTENT -->

    <!-- BEGIN MENUBAR-->
    <?php $this->load->view('admin/sidebar'); ?>
    <!-- END MENUBAR -->

    <!-- BEGIN OFFCANVAS RIGHT -->
    <div class="offcanvas">
        <!-- BEGIN OFFCANVAS SEARCH -->
        <?php $this->load->view('admin/chat'); ?>
        <!-- END OFFCANVAS SEARCH -->
    </div><!--end .offcanvas-->


</div><!--end #base-->
<!-- END BASE -->

<?php $this->load->view('admin/footer'); ?>
