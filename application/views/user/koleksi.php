        <!-- isi content -->
        <!-- awal carousel -->
        <div class="bd-example">
            <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
                    <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="<?=base_url()?>./assets/img/mesinjahit.png" class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                        <h5>Melayani Jahit Online</h5>
                        <p>Menerima jahit baju atau busana wanita</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="<?=base_url()?>./assets/img/jual.png" class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                        <h5>Melayani Pembelian Online</h5>
                        <p>Pelanggan dapat membeli baju atau busana wanita yang terdapat pada koleksi kami</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="<?=base_url()?>./assets/img/pajai2.png" class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                        <h5>Terima Kasih</h5>
                        <p>Silahkan nikmati layanan yang kami tawarkan kepada Anda</p>
                        </div>
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
        <!-- Akhir carousel -->

        
        <!-- Filter -->
        <div class="container">
            <div class="row mt-4">
                <div class="col">
                    <h4 class="judul">Koleksi Pakaian</h4>
                    <hr>
                </div>
            </div>
            <div class="filter">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-4">
                            <h4>Filter</h4>
                            <img src="<?= base_url();?>assets/img/loading1.gif" alt="" width="100" class="loading">
                        </div>
                        <div class="col-sm-8">
                            <?= form_open();?>
                            <p>Kategori</p>
                            <select name="kategori" id="kategori" class="form-control">
                                <option value="Semua">Semua</option>
                                <option value="Batik">Batik</option>
                                <option value="Blues">Blouse</option>
                                <option value="Gamis">Gamis</option>
                                <option value="Kebaya">Kebaya</option>
                            </select>
                        </div>
                        <!-- <div class="col-sm-4">
                            <p>Status</p>
                            <select name="status" id="status" class="form-control">
                                <option value="Semua">Semua</option>
                                <option value="Disewakan">Disewakan</option>
                                <option value="Dijual">Dijaul</option>
                            </select>
                        </div> -->
                        <?= form_close();?>
                    </div>
                </div>
            </div>

            
            <!-- awal card -->
            <div class="row" id="container">
            <?php 
                $no=1;
                foreach ($sql->result() as $daftar){
                    $id_pakaian = $daftar->id_pakaian;
                    $nama_pakaian = $daftar->nama_pakaian;
                    $kategori_pakaian = $daftar->kategori_pakaian;
                    $harga_jual = $daftar->harga_jual;
                    $ukuran_pakaian = $daftar->ukuran_pakaian;
                    $tgl_upload = $daftar->tgl_upload;
                    $gambar_jual = $daftar->gambar_jual;

            ?>

                <div class="col-md-4 ortu">
                    <!-- <div class="sewa"><img src="<?= base_url()?>assets/img/ribbonjual.png" alt=""></div> -->
                    
                    <div class="card mb-4">
                        <img src="<?= base_url()?>assets/img/daftarPakaian/<?= $gambar_jual;?>" class="card-img-top" alt="">
                        <div class="card-body">
                            <h5 class="card-title"><?= $nama_pakaian;?></h5>
                            <p class="card-text"><?= $tgl_upload;?></p>
                            
                            <!-- Button trigger modal -->
                            <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong<?= $id_pakaian;?>">Detail</a>

                            <!-- Modal -->
                            <?= form_open('control_pelanggan/c_pelanggan/beli');?>
                            <input type="hidden" name="nik_akun" value="<?= $this->session->userdata('nik');?>">
                            <input type="hidden" name="alamat" value="<?= $this->session->userdata('alamat');?>">
                            <input type="hidden" name="id_pakaian" value="<?= $id_pakaian;?>">
                            <input type="hidden" name="gambar_jual" value="<?= $gambar_jual;?>">
                            <input type="hidden" name="harga_jual" value="<?= $harga_jual;?>">
                            
                            <div class="modal fade" id="exampleModalLong<?= $id_pakaian;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLongTitle"><?= $nama_pakaian;?></h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="container">
                                            <div class="row justify-content-center">
                                                <div class="col-md-6">
                                                    <img src="<?= base_url()?>assets/img/daftarPakaian/<?= $gambar_jual;?>" alt="">
                                                </div>
                                                <div class="col-md-6">
                                                    <h4 class="mt-3 bg-light">Kategori Baju</h4>
                                                        <h5 class="ml-5 mb-3 isik"><?= $kategori_pakaian;?></h5>
                                                    <h4 class="mt-5 bg-light">Ukuran Baju</h4>
                                                        <h5 class="ml-5 mb-3 isik"><?= $ukuran_pakaian;?></h5>
                                                    <h4 class="mt-5 bg-light">Harga Baju</h4>
                                                        <h5 class="ml-5 mb-3 isik">Rp. <?= $harga_jual;?></h5>
                                                    <h4 class="mt-5 bg-light">Tanggal Upload</h4>
                                                        <h5 class="ml-5 mb-3 isik"><?= $tgl_upload;?></h5>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <a href="#" class="btn btn-outline-danger" data-dismiss="modal">Back</a>
                                        <button class="btn btn-outline-primary" type="submit" <?php if($this->session->userdata('nik')==null) echo "disabled"; ?>>Pesan</button>
                                    </div>
                                </div>
                            </div>
                            </div>
                            <?= form_close();?>

                        </div>
                    </div>
                </div>    
            

            <?php
                $no++;
                }
            ?>

            </div>
        </div>
        <!-- akhir card -->

        <!-- akhir isi content -->   