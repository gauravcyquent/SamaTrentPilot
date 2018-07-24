<!DOCTYPE html>
<html>

    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title><?php
            if (isset($meta_title)) {
                echo $meta_title;
            } else {
                echo site_title();
            }
            ?></title>
        <meta name="description" content="<?php
        if (isset($meta_description)) {
            echo $meta_description;
        }
        ?>">
        <meta name="keywords" content="<?php
        if (isset($meta_keyword)) {
            echo $meta_keyword;
        }
        ?>">

        <link href="<?php echo base_url(); ?>/assets/css/bootstrap.min.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>/assets/font-awesome/css/font-awesome.css" rel="stylesheet">

        <!-- Toastr style -->
        <link href="<?php echo base_url(); ?>/assets/css/plugins/toastr/toastr.min.css" rel="stylesheet">

        <!-- Gritter -->
        <link href="<?php echo base_url(); ?>/assets/js/plugins/gritter/jquery.gritter.css" rel="stylesheet">



        <!-- PAGE LEVEL STYLES -->
        <?php if (isset($includes_for_layout_css['css']) AND count($includes_for_layout_css['css']) > 0): ?>
            <?php foreach ($includes_for_layout_css['css'] as $css): ?>
                <link rel="stylesheet" type="text/css" href="<?php echo $css['file']; ?>"<?php echo ($css['options'] === NULL ? '' : ''); ?>>
            <?php endforeach; ?>
        <?php endif; ?>
        <!-- END PAGE LEVEL  STYLES -->
        <link href="<?php echo base_url(); ?>/assets/css/animate.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>/assets/css/style.css" rel="stylesheet">

        <!-- Select-Box-STYLES -->
        <link href="<?php echo base_url(); ?>/assets/css/custom-select/bootstrap-select.css" rel="stylesheet">
        <!-- Select-Box-STYLES -->
        <!-- Start Scroll-Bar  STYLES -->
        <link href="<?php echo base_url(); ?>/assets/css/plugins/scrollbar/jquery.mCustomScrollbar.min.css" rel="stylesheet">
        <!-- END Scroll-Bar  STYLES -->

        <!-- Start PAGE LEVEL  STYLES -->
        <link href="<?php echo base_url(); ?>/assets/css/ipad.css" rel="stylesheet">
        <!-- END PAGE LEVEL  STYLES -->
        <style>

            .wizard > .content > .body { position: relative; }

        </style>


        <!-- PAGE LEVEL  Header Javascript -->
        <?php if (isset($includes_for_layout_js['js']) AND count($includes_for_layout_js['js']) > 0): ?>
            <?php foreach ($includes_for_layout_js['js'] as $js): ?>
                <?php if ($js['options'] !== NULL AND $js['options'] == 'header'): ?>
                    <script type="text/javascript" src="<?php echo $js['file']; ?>"></script>
                <?php endif; ?>
            <?php endforeach; ?>
        <?php endif; ?>
        <!-- END PAGE LEVEL  Header Javascript -->
        <script>
            var base_url="<?php echo base_url(); ?>";
        </script>
    </head>

    <body>
        <div id="wrapper">