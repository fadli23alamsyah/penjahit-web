        <!-- isi content -->
        <div class="jumbotron jumbotron-fluid">
            <div class="container">
                <!-- <img src="<?= base_url()?>assets/img/pajai2.png" alt=""> -->
                <h1 class="display-4">Selamat Datang di <br> <span>Website Pajai'</span></h1>
            </div>
        </div>

        <div class="info-panel clear">
            <div class="container">
                <h2>Layanan Usaha Pajai'</h2>
                <hr>
                <div class="row justify-content-center">
                    <div class="col-sm-5 col-panel">
                        <img src="<?= base_url()?>assets/img/jahit.jpg" alt="" width="150" class="rounded-circle img-thumbnail">   
                        <h4>Menerima Jasa Jahit Online <br> Pakaian Wanita </h4>
                    </div>
                    <!-- <div class="col-sm-5 col-panel">
                        <img src="<?= base_url()?>assets/img/jahit.jpg" alt="" width="150" class="rounded-circle img-thumbnail">  
                        <h4>Menerima Penyewaan Pakaian <br> Online</h4>
                    </div> -->
                    <div class="col-sm-5 col-panel">
                        <img src="<?= base_url()?>assets/img/jual.png" alt="" width="150" class="rounded-circle img-thumbnail">
                        <h4>Belanja Online</h4>
                    </div>
                </div>
            </div>
        </div>

        <div class="info-panel bg-light">
            <div class="container">
                <h2 class="h-panel">Tagline Usaha Pajai'</h2>
                <hr>
                <h1>``Yang Kami Lakukan Ke Kamu itu <span>JAHIT!</span>``</h1>
                <p class="text-right">Kutipan Pajai'</p>
            </div>
        </div>

        <div class="info-panel">
            <div class="container">
                <h2 class="h-panel">Jangkauan Usaha Pajai'</h2>
                <hr>
                <h1>Wilayah Planet Sudiang <br> dan sekitarnya </h1>
            </div>
        </div>

        <div class="info-panel bg-light komen">
            <div class="container">
                <h2 class="h-panel">Komentar Pelanggan Usaha Pajai'</h2>
                <hr>
                <!-- awal carousel -->
                <section class="komentar">
                    <section class="section-title">
                        <div class="container text-center">
                            <h3>Kata Mereka</h3>
                        </div>
                    </section>
                    <div class="container">
                        <div id="carouselTestimoni" class="carousel slide hero-slide" data-ride="carousel">
                            <div class="carousel-inner">
                            <?php foreach($komen->result() as $komen){
                                echo '
                                <div class="carousel-item active">
                                    <blockquote>
                                        <img src="'.base_url().'assets/img/profilAkun/'.$komen->foto_profil.'" alt="" width="100px"  height="100px" class="rounded-circle border">
                                        <p class="name">'.$komen->nama_akun.'</p>
                                        <p class="isi-komentar">``'.$komen->komentar.'``</p>
                                    </blockquote>
                                </div>
                                ';
                            }?>
                                <!-- <div class="carousel-item active">
                                    <blockquote>
                                        <img src="'.base_url().'assets/img/profilAkun/'.$komen->foto_profil.'" alt="" width="100px"  height="100px" class="rounded-circle img-thumbnail">
                                        <p class="name">'.$komen->nama_akun.'</p>
                                        <p class="isi-komentar">``'.$komen->komentar.'``</p>
                                    </blockquote>
                                </div> -->
                            </div>
                            <a class="carousel-control-prev" href="#carouselTestimoni" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carouselTestimoni" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                            </a>
                        </div>
                    </div>
                </section>
                <!-- Akhir carousel -->
            </div>
        </div>

        <div class="info-panel">
            <div class="container">
                <h2 class="h-panel">Join Pelanggan Usaha Pajai'</h2>
                <hr>
                <h4 class="h4-panel">Bagi Anda yang ingin menggunakan layanan Web Pajai' <br> Silahkan Bergabung</h4>
                <a href="<?= base_url();?>c_login" class="btn btn-lg btn-primary rounded-circle join">Gabung Pelanggan</a>
            </div>
        </div>
        
        <!-- akhir isi content -->   
    
