<?php
defined('BASEPATH') OR exit('No direct script access allowed');

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>Login</title>

    <!-- Fontfaces CSS-->
    <link href="<?php echo base_url($css_dir. '/font-face.css'); ?>" rel="stylesheet" media="all">
    <link href="<?php echo base_url($css_dir. '/font-awesome.min.css'); ?>" rel="stylesheet" media="all">
    <link href="<?php echo base_url($css_dir. '/fontawesome-all.min.css'); ?>" rel="stylesheet" media="all">
    <link href="<?php echo base_url($css_dir. '/material-design-iconic-font.min.css'); ?>" rel="stylesheet" media="all">
    

    <!-- Bootstrap CSS-->
    <link href="<?php echo base_url($css_dir. '/bootstrap.min.css'); ?>" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="<?php echo base_url($css_dir. '/animsition.min.css'); ?>" rel="stylesheet" media="all">
    <link href="<?php echo base_url($css_dir. '/bootstrap-progressbar-3.3.4.min.css'); ?>" rel="stylesheet" media="all">
    <link href="<?php echo base_url($css_dir. '/animate.css'); ?>" rel="stylesheet" media="all">
    <link href="<?php echo base_url($css_dir. '/hamburgers.min.css'); ?>" rel="stylesheet" media="all">
    <link href="<?php echo base_url($css_dir. '/slick.css'); ?>" rel="stylesheet" media="all">
    <link href="<?php echo base_url($css_dir. '/select2.min.css'); ?>" rel="stylesheet" media="all">
    <link href="<?php echo base_url($css_dir. '/perfect-scrollbar.css'); ?>" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="<?php echo base_url($css_dir. '/theme.css'); ?>" rel="stylesheet" media="all">
    
    
    <script src="<?php echo base_url($js_dir . '/jquery-3.2.1.min.js'); ?>"></script>
    <!-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4-4.1.1/jq-3.3.1/dt-1.10.18/fc-3.2.5/fh-3.1.4/r-2.2.2/datatables.min.css"/>
 
<script type="text/javascript" src="https://cdn.datatables.net/v/bs4-4.1.1/jq-3.3.1/dt-1.10.18/fc-3.2.5/fh-3.1.4/r-2.2.2/datatables.min.js"></script> -->
 

    

</head>
<body class="animsition">
    <div class="page-wrapper">

        <!-- <header class="header-mobile d-block d-lg-none">
            <div class="header-mobile__bar">
                <div class="container-fluid">
                    <div class="header-mobile-inner">
                        <a class="logo" href="index.html">
                            <img src="<?php echo base_url($images_dir. '/logo.png'); ?>" alt="CoolAdmin" />
                        </a>
                        <button class="hamburger hamburger--slider" type="button">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <nav class="navbar-mobile">
                <div class="container-fluid">
                    <ul class="navbar-mobile__list list-unstyled">
                    <li class="<?=active_link_controller('dashboard');?> has-sub">
                    <a class="js-arrow" href="<?=site_url('admin/dashboard');?>">
                        <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                    
                </li>
                <li class="<?=active_link_controller('groups');?> has-sub">
                    <a class="js-arrow" href="<?=site_url('admin/groups');?>">
                        <i class="fas fa-tachometer-alt"></i>Group</a>
                    
                </li>
                    </ul>
                </div>
            </nav>
        </header> -->