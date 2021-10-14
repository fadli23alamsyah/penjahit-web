        <div class="info-panel">
            <div class="container">
                <h2>Daftar Pembelian</h2>
                <hr>
                <div class="row justify-content-center mb-3">
                    <div class="col-sm-7"></div>
                    <div class="col-sm-3">
                        <input type="text" name="cari" class="keyword form-control" placeholder="Cari Kata Kunci..." autocomplate="false">
                    </div>
                </div>
                <div class="row justify-content-center mb-5">
                    <div class="col-sm-10">
                        <div class="table-responsive">
                            <table class="table">
                                <thead class="thead-light">
                                    <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Gambar Baju</th>
                                    <th scope="col">Pilihan</th>
                                    <th scope="col">Harga</th>
                                    <th scope="col">Tanggal Transaksi</th>
                                    <th scope="col">Konfirmasi Bukti</th>
                                    <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <?php $no=1;foreach($sql->result() as $row){
                                    $gambarbukti= $row->gambar_bukti_transaksi;
                                ?>
                                <tbody>
                                    <tr>
                                    <th scope="row"><?= $no?></th>
                                    <td>
                                        <?php 
                                            if($row->pilihan=='Beli'){
                                                echo '<img src="'.base_url().'assets/img/daftarPakaian/'.$row->gambar_baju.'" width="120px" height="120px">';
                                            }else{
                                                echo '<img src="'.base_url().'assets/img/bajuPelanggan/'.$row->gambar_baju.'" width="120px" height="120px">';
                                            }
                                        ?>
                                    </td>
                                    <td><?= $row->pilihan;?></td>
                                    <td><?= $row->harga_pakaian;?></td>
                                    <td>
                                        <?php
                                            if($row->tgl_transaksi == '0000-00-00')
                                                echo '-';
                                            else
                                                echo date('d-m-Y',strtotime($row->tgl_transaksi));
                                        ?>
                                    </td>
                                    <td><?=$row->konfirmasi_transaksi?></td>
                                    <td>                                        
                                        <!-- <a href="<?= base_url()?>control_pelanggan/c_pelanggan/buktipembayaran/" class="btn btn-sm btn-primary">Upload Bukti</a> -->
                                        <a href="#" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#exampleModalLong<?= $row->id_transaksi;?>">Upload Bukti</a>
                                    </td>
                                    </tr>
                                </tbody>



<!-- Modal -->
<?= form_open_multipart('control_pelanggan/c_pelanggan/buktipembayaran');?>
<input type="hidden" name="id_transaksi" value="<?= $row->id_transaksi;?>">
<input type="hidden" name="gambarlama" value="<?= $gambarbukti;?>">

<div class="modal fade" id="exampleModalLong<?= $row->id_transaksi;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
<div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Upload Bukti Pembayaran</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-6">
                    <?php
                        if($gambarbukti == null){
                            #echo '<input type="hidden" name="op" value="uploadbukti">';
                            echo '<h2 style="text-align:center;">Silahkan upload bukti pembayaran anda</h2>';
                            echo '
                                <div class="custom-file">
                                <input type="file" name="gambarbukti" class="custom-file-input" id="customFile" required>
                                <label class="custom-file-label" for="customFile">Pilih File</label>
                                </div>';
                        }else{
                            #echo '<input type="hidden" name="op" value="gantibukti">';
                            echo '<img src="'.base_url().'assets/img/buktiBayar/'.$gambarbukti.'" width="360px">';
                            echo '
                                <div class="custom-file">
                                <input type="file" name="gambarbukti" class="custom-file-input" id="customFile" required>
                                <label class="custom-file-label" for="customFile">Pilih File</label>
                                </div>';
                        }
                    ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <!-- <a href="#" class="btn btn-outline-danger" data-dismiss="modal">Back</a> -->
            <?php
                if($gambarbukti == null){
                    echo '<button class="btn btn-outline-primary" type="submit">Upload</button>';
                }else{
                    echo '<button class="btn btn-outline-primary" type="submit">Ganti Gambar</button>';
                }
            ?>
        </div>
    </div>
</div>
</div>
<?= form_close();?>


                                <?php $no++;}?>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>