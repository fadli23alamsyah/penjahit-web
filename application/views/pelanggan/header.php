<!DOCTYPE html>
<head>
    <title>PAJAI'</title>
    <link rel="icon" type="image/png" href="<?php echo base_url()?>assets/img/iconpajai.png">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/plugins/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/plugins/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/style.css">

    
</head>
<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <div class="container-fluid">
            <nav class="navbar navbar-expand-lg navbar-light">
                <div class="list-group list-group-flush">
                    <a class="navbar-brand" href="#"><img src="<?php echo base_url();?>assets/img/pajai2.png"></a>
                    <ul class="main-menu">
                        <div class="menu"><h4>Main Menu Pelanggan</h4></div>
                        <li class="link"><a href="<?php echo base_url();?>c_user">Home</a></li>
                        <li class="link"><a href="<?php echo base_url();?>c_login/edit">Info Pelanggan</a></li>
                        <li class="link"><a href="<?php echo base_url();?>control_pelanggan/c_pelanggan/d_jahit">Daftar Jahitan</a></li>
                        <li class="link"><a href="<?php echo base_url();?>control_pelanggan/c_pelanggan/d_transaksi">Daftar Transaksi</a></li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>
    <!-- Akhir sidebar -->

    
    <!-- Page Content -->
    <div class="sisi_kanan">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container-fluid">
                <button class="btn toggle" id="menu-toggle"><img src="<?php echo base_url();?>assets/img/iconpajai.png" alt=""></button>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Hi, <?php echo $this->session->userdata("nama");?>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="<?= base_url();?>control_pelanggan/c_pelanggan">Informasi</a>
                                <!-- <a class="dropdown-item" href="<?= base_url();?>control_pelanggan/c_pelanggan">Info Layanan</a> -->
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="<?php echo base_url();?>c_login/logout">Logout</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- akhir navbar -->