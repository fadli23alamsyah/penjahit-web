<div class="container">
    <div class="daftar">
        <h4>Daftar Pemesanan Jahit</h4>
        <table class="table">
            <thead class="thead-light">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama Pemesan</th>
                    <th scope="col">Desain Baju</th>
                    <th scope="col">Tanggal Pesan</th>
                    <th scope="col">Batas Pengerjaan</th>
                    <th scope="col">Status</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $no=1;foreach($pesan->result() as $pesan){
                    //untuk modal

                    $id = $pesan->id_jahitan;
                    $nama = $pesan->nama_akun;
                    $model = $pesan->gambar_desain;
                    $lbr_pundak = $pesan->lebar_pundak;
                    $krg_lengang = $pesan->kerung_lengan;
                    $pglng_tangan = $pesan->pergelangan_tangan;
                    $pjg_lengan = $pesan->panjang_lengan;
                    $lkr_badan = $pesan->lingkar_badan;
                    $lkr_pinggang = $pesan->lingkar_pinggang;
                    $lkr_pinggul = $pesan->lingkar_pinggul;
                    $pjg_punggung = $pesan->panjang_punggung;
                    $pjg_baju = $pesan->panjang_baju;
                    $jns_kain = $pesan->jenis_kain;
                    $pjg_kain = $pesan->panjang_kain;
                    $desain_tmb = $pesan->desain_tambahan;
                    $status = $pesan->status;
                    $nik = $pesan->nik_akun;


                    //selesai

                    $sekarang = new DateTime();
                    $selesai = new DateTime($pesan->tgl_penyelesaian);
                    $sisa = $sekarang->diff($selesai);
                ?>
                <tr>
                    <th scope="row"><?=$no?></th>
                    <td><?=$pesan->nama_akun?></td>
                    <td><img src='<?= base_url()?>./assets/img/modelPelanggan/<?=$pesan->gambar_desain?>' width='90px'></td>
                    <td><?=date('d/m/Y',strtotime($pesan->tgl_pesan))?></td>
                    <td><?=date('d/m/y',strtotime($pesan->tgl_penyelesaian)).'. '.$sisa->d.' Hari lagi'?></td>
                    <td><?=$pesan->status?></td>
                    <td>
                        <a href="#" class="btn btn-sm btn-success" data-toggle="modal" data-target="#exampleModalLong<?= $id;?>">Detail</a>
                        <a href="javascript:if(confirm('Apakah anda yakin ingin membatalkan orderan ini??')){document.location='<?=base_url()?>/control_admin/c_admin/hapusjahitan/<?=$id?>'}" class="btn btn-sm btn-danger">Hapus</a>
                        <!-- <a href="#" class="btn btn-sm btn-primary">Edit</a> -->
                    </td>
                </tr>


<!-- Modal -->
<?= form_open_multipart('control_admin/c_admin/adminjahit');?>
<input type="hidden" value="<?=$id;?>" name='id_jahitan'>
<input type="hidden" value="<?=$nik;?>" name='nik_pelanggan'>

<div class="modal fade" id="exampleModalLong<?= $id;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
<div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title m-0" id="exampleModalLongTitle">Nama Pemesan : <?=$nama?></h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-5 border rounded-top rounded-bottom">
                        <img src="<?= base_url()?>assets/img/modelPelanggan/<?=$model?>" class='mt-1' width='285px' height='450px' alt="">
                        <h4 class='text-center'>Gambar Desain</h4>
                    </div>
                    <div class="col-md-7">
                        <h4 class='text-center m-0'>Informasi</h4>
                        <hr>
                        <div class="row justify-content-center">
                            <div class="col-sm-6 border-right">
                                <h6><small>Lebar Pundak :</small> <?=$lbr_pundak?>cm</h6>
                                <h6><small>Kerung Lengan :</small> <?=$krg_lengang?>cm</h6>
                                <h6><small>Pergelangan Tangan :</small> <?=$pglng_tangan?>cm</h6>
                                <h6><small>Panjang Lengan :</small> <?=$pjg_lengan?>cm</h6>
                            </div>
                            <div class="col-sm-6">
                                <h6><small>Lingkar Badan/Dada :</small> <?=$lkr_badan?>cm</h6>
                                <h6><small>Lingkar Pinggang :</small> <?=$lkr_pinggang?>cm</h6>
                                <h6><small>Lingkar Pinggul :</small> <?=$lkr_pinggul?>cm</h6>
                                <h6><small>Panjang Punggung :</small> <?=$pjg_punggung?>cm</h6>
                            </div>
                        </div>
                        <hr>
                        
                        <div class="row">
                            <div class="col-sm-12"><h6>Panjang Baju : <?=$pjg_baju?>cm</h6></div>
                            <div class="col-sm-12"><h6>Jenis Kain : <?=$jns_kain?></h6></div>
                            <div class="col-sm-12"><h6>Panjang Kain Kain : <?=$pjg_kain?>cm</h6></div>
                        </div>

                        <hr>
                        <div class="row">
                            <div class="col-sm-12">
                                <h4 class='text-center m-0'><small>Desain Tambahan</small></h4>
                                <p><?= $desain_tmb ?></p>
                            </div>
                        </div>
                        <hr class='mt-3'>
                        <div class="row">
                            <?php
                            foreach($liat_tr->result() as $sql){
                                $id_tr = $sql->id_transaksi;
                                $id_jahit = $sql->id_jahitan;
                                $harga_tr = $sql->harga_pakaian;
                                $gambar = $sql->gambar_baju;
                            }

                                if($status != null){
                                    if($id_jahit == $id){?>
                                    <div class="col-sm-4 mt-3 border-right">
                                        <img src='<?=base_url()?>./assets/img/bajuPelanggan/<?=$gambar?>' width='100px' height='150px'>
                                    </div>
                                    <div class="col-sm-8">
                                        <h5><small>Ganti Gambar Baju Pelanggan</small></h5>
                                        <input type='hidden' name='id_tr' value='<?=$id_tr?>'>
                                        <input type='hidden' name='gambar_lama' value='<?=$gambar?>'>
                                        <input type="file" name='baju_pelanggan' class='form-control-file form-control'>
                                        <div class="input-group mt-3">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">Rp.</div>
                                            </div>
                                            <input type="text" name="harga_pakaian" class="form-control" placeholder="Harga Pakaian" value="<?php if($id==$id_jahit) echo $harga_tr ?>" required>
                                        </div>
                                    </div>
                            <?php
                                    }else{?>
                                    <div class="col-sm-12">
                                        <h5><small>Gambar Baju Pelanggan</small></h5>
                                        <input type="file" name='baju_pelanggan' class='form-control-file form-control' required>
                                        <div class="input-group mt-3">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">Rp.</div>
                                            </div>
                                            <input type="text" name="harga_pakaian" class="form-control" placeholder="Harga Pakaian" required>
                                        </div>
                                    </div>
                            <?php
                                    }
                                }
                            ?>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <a href="#" class="btn btn-outline-danger" data-dismiss="modal">Back</a>
            <?php
                if($status == null){?>
                    <input type="hidden" value="Dikerjakan" name='status'>
                    <button class="btn btn-outline-primary" type="submit">Konfirmasi</button>
            <?php
                }else{?>
                    <input type="hidden" value="Selesai" name='status'>
                    <button class="btn btn-outline-primary" type="submit">Selesai</button>
            <?php
                }
            ?>
        </div>
    </div>
</div>
</div>
<?= form_close();?>





                <?php $no++;}?>
            </tbody>
        </table>    
    </div>
</div>