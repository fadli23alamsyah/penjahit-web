<div class="container">
    <div class="daftar">
        <h4>Daftar Transaksi</h4>
        <table class="table">
            <thead class="thead-light">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama Pemesan</th>
                    <th scope="col">Gambar Baju</th>
                    <th scope="col">Harga</th>
                    <th scope="col">Tanggal Transaksi</th>
                    <th scope="col">Pilihan</th>
                    <th scope="col">Status</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                <?php 
                $no=1;foreach($row->result() as $row){
                    $id_tr = $row->id_transaksi;
                    $nik = $row->nik_akun;
                    $nama = $row->nama_akun;
                    $pilih = $row->pilihan;
                    $gambar = $row->gambar_baju;
                    $harga = $row->harga_pakaian;
                    $konf_tr = $row->konfirmasi_transaksi;
                    $tgl_tr = $row->tgl_transaksi;


                    ?>
                    <th scope="row"><?=$no?></th>
                    <td><?=$nama?></td>
                    <td>
                        <?php if($pilih == 'Beli'){?>
                            <img src='<?= base_url()?>./assets/img/daftarPakaian/<?=$gambar?>' width='90px'>
                        <?php }else{?>
                            <img src='<?= base_url()?>./assets/img/bajuPelanggan/<?=$gambar?>' width='90px'>
                        <?php }?>
                    </td>
                    <td><?=$harga?></td>
                    <td>
                        <?php if($tgl_tr == '0000-00-00'){?>
                            <p>-</p>
                        <?php }else{?>
                            <?= date('d/m/Y',strtotime($tgl_tr))?>
                        <?php }?>
                    </td>
                    <td><?=$pilih?></td>
                    <td><?=$konf_tr?></td>
                    <td>
                        <a href="#" class="btn btn-sm btn-success" data-toggle="modal" data-target="#exampleModalLong<?=$id_tr?>">Detail</a>
                        <a href="javascript:if(confirm('Apakah anda yakin ingin mengahpus data ini?')){document.location='<?=base_url()?>/control_admin/c_admin/hapustransaksi/<?=$id_tr?>'}" class="btn btn-sm btn-danger">Hapus</a>
                        <!-- <a href="#" class="btn btn-sm btn-primary">Edit</a> -->
                    </td>
                </tr>




                <?php $no++;}?>
            </tbody>
        </table>    



<?php 
    foreach($row1->result() as $baris){
        $id_tr = $baris->id_transaksi;
        $nik = $baris->nik_akun;
        $alamat = $baris->alamat;
        $foto = $baris->foto_profil;
        $nama = $baris->nama_akun;
        $pilih = $baris->pilihan;
        $gambar = $baris->gambar_baju;
        $harga = $baris->harga_pakaian;
        $tgl_tr = $baris->tgl_transaksi;
        $gambar_bukti = $baris->gambar_bukti_transaksi;
        $konf_tr = $baris->konfirmasi_transaksi;
?>
<!-- Modal -->
<?= form_open('control_admin/c_admin/tr_admin');?>
<input type="hidden" value="<?=$id_tr?>" name='id_tr'>

<div class="modal fade" id="exampleModalLong<?=$id_tr?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
<div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title m-0" id="exampleModalLongTitle">Nama Pelanggan : <?=$nama?></h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-5 border rounded-top rounded-bottom">
                        <?php
                            if($pilih == 'Beli'){?>
                                <img src="<?= base_url()?>assets/img/daftarPakaian/<?=$gambar?>" class='mt-1' width='285px' height='450px' alt="">
                            <?php }else{?>
                                <img src="<?= base_url()?>assets/img/bajuPelanggan/<?=$gambar?>" class='mt-1' width='285px' height='450px' alt="">
                            <?php }?>
                        <h4 class='text-center'>Gambar Baju</h4>
                    </div>
                    <div class="col-md-7">
                        <h4 class='text-center m-0'>Informasi Akun</h4>
                        <hr>
                        <div class="row justify-content-center">
                            <div class="col-sm-10">
                            <table>
                                <tr>
                                    <th>Nik Pelanggan</th>
                                    <td>:</td>
                                    <td> </td>
                                    <th class='float-right'><?=$nik?></th>
                                </tr>
                                <tr>
                                    <th>Alamat Pelanggan</th>
                                    <td>:</td>
                                    <td> </td>
                                    <th class='float-right'><?=$alamat?></th>
                                </tr>
                                <tr>
                                    <th>Foto Pelanggan</th>
                                    <td>:</td>
                                    <td> </td>
                                    <td></td>
                                </tr>
                                    <td> </td>
                                    <td> </td>
                                    <td> </td>
                                    <td class='float-right'>
                                        <img src='<?=base_url()?>./assets/img/profilAkun/<?=$foto?>' width='100px' height='100px' class='rounded-circle border'>
                                    </td>
                                <tr>
                                </tr>
                            </table>
                            </div>
                        </div>

                    <hr>
                    <h4 class='text-center'>Bukti Pembayaran</h4>
                    <div class="row justify-content-center">
                        <?php if($tgl_tr == '0000-00-00'){?>
                            <div class="col-sm-10">
                                <h5 class='text-center'>Belum melakukan transaksi</h5>
                            </div>
                        <?php }else{?>
                            <div class="col-sm-4"></div>
                            <div class="col-sm-4">
                                <img class='align-center' src='<?=base_url()?>./assets/img/buktiBayar/<?=$gambar_bukti?>' width='120px'>
                            </div>
                            <div class="col-sm-4"></div>
                        <?php } ?>
                    </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <a href="#" class="btn btn-outline-danger" data-dismiss="modal">Back</a>
            <button class="btn btn-outline-primary" type="submit" <?php if($tgl_tr == '0000-00-00' || $konf_tr != null) echo 'disabled'?>>Konfirmasi</button>
        </div>
    </div>
</div>
</div>
<?= form_close();?>

<?php }?>

    </div>
</div>