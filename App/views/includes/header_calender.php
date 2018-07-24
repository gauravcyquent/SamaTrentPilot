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

    <link href="<?php echo base_url();?>assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/font-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="<?php echo base_url();?>assets/css/plugins/iCheck/custom.css" rel="stylesheet">

    <link href="<?php echo base_url();?>assets/css/plugins/fullcalendar/fullcalendar.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/css/plugins/fullcalendar/fullcalendar.print.css" rel='stylesheet' media='print'>

    <link href="<?php echo base_url();?>assets/css/animate.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/css/style.css" rel="stylesheet">
    <!-- Start PAGE LEVEL  STYLES -->
        <link href="<?php echo base_url(); ?>/assets/css/ipad.css" rel="stylesheet">

</head>

<body>

<div id="wrapper">