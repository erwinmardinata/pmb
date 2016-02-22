<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>PMB - Universitas Teknologi Sumbawa</title>
    <link href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>" rel="stylesheet" />
    <link href="<?php echo base_url('assets/css/font-awesome.css'); ?>" rel="stylesheet" />
    <link href="<?php echo base_url('assets/css/style.css'); ?>" rel="stylesheet" />
	<link href="<?php echo base_url('assets/css/responsiveslides.css'); ?>" rel="stylesheet">

    <script src="<?php echo base_url('assets/js/jquery-1.11.2.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script>
	<script src="<?php echo base_url('assets/js/responsiveslides.min.js'); ?>"></script>
</head>
<body>
    <!-- HEADER END-->
    <div class="navbar navbar-inverse set-radius-zero" style="padding-bottom: 30px; padding-top: 20px;">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo site_url(); ?>">

                    <img src="<?php echo base_url('assets/img/logo-pmb.png'); ?>" />
                </a>

            </div>

            <div class="left-div">
                <div class="user-settings-wrapper">
                    <ul class="nav user-right">
                        <li class="dropdown">
							<span style="font-size: 27px; font-weight: bold; font-style: italic; color: #fff;">"PENERIMAAN MAHASISWA BARU 2016/2017"</span>
							<?php if(empty($this->session->userdata('ada'))) {} else { ?>
                            <div class="dropdown-menu dropdown-settings">
								<div class="media">
                                    <div class="media-body">
                                        <h4 class="media-heading"><?php echo $this->session->userdata('nama'); ?></h4>
                                    </div>
                                </div>
                                <hr />
                                <a href="<?php echo site_url('registration/setting'); ?>" class="btn btn-info btn-sm">Setting</a>&nbsp; <a href="<?php echo site_url('registration/logout'); ?>" class="btn btn-danger btn-sm">Logout</a>

                            </div>
							<?php } ?>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- LOGO HEADER END-->