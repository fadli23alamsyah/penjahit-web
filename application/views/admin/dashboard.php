        <!-- isi content -->
        <div class="container">
        
        <div class="dashboard"><h4>Dashboard</h4></div>
        <?php $no=0;foreach($koleksi->result() as $koleksi){
            $no++;
        }?>
            <div class="row">
                <div class="col-md-4">
                    <div class="col-admin">
                        <div class="row">
                            <div class="col-md-8">
                                <p>Koleksi <br> Pakaian</p>
                            </div>
                            <div class="col-md-4">
                                <span><?=$no?></span>
                            </div>
                        </div>
                    </div>
                </div>
        <?php $no1=0;foreach($jual->result() as $jual){
            $no1++;
        }?>
                <div class="col-md-4">
                    <div class="col-admin">
                        <div class="row">
                            <div class="col-md-8">
                                <p>Pakaian Terjual</p>
                            </div>
                            <div class="col-md-4">
                                <span><?=$no1?></span>
                            </div>
                        </div>
                    </div>
                </div>

        <?php $no2=0;foreach($pesanjahit->result() as $pesan){
            $no2++;
        }?>
                <div class="col-md-4">
                    <div class="col-admin">
                        <div class="row">
                            <div class="col-md-8">
                                <p>Pesanan <br> Jahitan</p>
                            </div>
                            <div class="col-md-4">
                                <span><?=$no2?></span>
                            </div>
                        </div>
                    </div>
                </div>

        <?php $no3=0;foreach($jahitini->result() as $pesanini){
            $no3++;
        }?>
                <div class="col-md-4">
                    <div class="col-admin">
                        <div class="row">
                            <div class="col-md-8">
                                <p style='font-size:28px'>Pesanan Jahit Hari ini</p>
                            </div>
                            <div class="col-md-4">
                                <span><?=$no3?></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- akhir isi content -->   
    
    </div>
    <!-- Akhir page content -->
