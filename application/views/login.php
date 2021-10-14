<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Web Pajai'</title>
    <link rel="icon" type="image/png" href="<?php echo base_url(); ?>assets/img/iconpajai.png">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url(); ?>assets/plugins/bootstrap/css/bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/plugins/bootstrap/css/bootstrap.min.css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/log.css">
    <script src="<?php echo base_url(); ?>assets/js/jquery-3.3.1.min.js"></script>    
</head>
<body>    
<section class="py-5">    
    <div class="container">
        <div class="row justify-content-center">
                <div class="box">
                    <div class="hd"><h1>~ WEB PAJAI' ~</h1></div>
                    <?php echo form_open('c_login/proses_login'); ?>
                    <h2>Login</h2>
                        <div class="inputbox">
                            <input type="text" name="username" required>
                            <label for="">Username</label>
                        </div>
                        <div class="inputbox">
                            <input type="password" name="password" required>
                            <label for="">Password</label>
                        </div>
                        <center><h4 style="color:white;">
                        <?php if(isset($pesan)){
                            echo $pesan;
                        }
                        ?></h4></center><br>
                        <input class="btn btn-success" type="submit" value="Masuk">                        
                    <?php echo form_close(); ?>
                </div>      
        </div>
    </div>
</section>
</body>