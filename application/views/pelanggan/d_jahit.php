        <div class="info-panel">
            <div class="container">
                <h2>Daftar Jahitan</h2>
                <hr>
                <div class="row mb-4">
                    <div class="col-sm-3">
                        <a href="<?= base_url();?>control_pelanggan/c_pelanggan/tambahjahit" class="btn btn-md btn-success">Tambah Pesanan</a>
                    </div>
                    <div class="col-sm-6"></div>
                    <div class="col-sm-3">
                        <input type="text" name="cari" class="keyword form-control" placeholder="Cari Kata Kunci..." autocomplate="false">
                    </div>
                </div>
                <div class="row justify-content-center mb-5">
                    <div class="col-sm-12">
                        <div class="table-responsive">
                            <table class="table">
                                <thead class="thead-light">
                                    <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Gambar Desain</th>
                                    <th scope="col">Tanggal Pesan</th>
                                    <th scope="col">Tanggal Batas</th>
                                    <th scope="col">Desain Tambahan</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <?php $no=1;foreach ($sql->result() as $row){?>
                                <tbody>
                                    <tr>
                                    <th scope="row"><?= $no ?></th>
                                    <td><img src="<?= base_url();?>assets/img/modelPelanggan/<?= $row->gambar_desain;?>" width="150px" height="150px"></td>
                                    <td><?= date('d-m-Y',strtotime($row->tgl_pesan));?></td>
                                    <td><?= date('d-m-Y',strtotime($row->tgl_penyelesaian));?></td>
                                    <td><?= $row->desain_tambahan;?></td>
                                    <td><?= $row->status;?></td>
                                    <td>
                                        <a href="javascript:if(confirm('Apakah anda yakin untuk manghapus data ini ??')){document.location='<?php echo base_url();?>control_pelanggan/c_pelanggan/hapusjahit/<?php echo $row->id_jahitan?>'}" class="btn btn-sm btn-danger">Hapus</a>
                                        <a href="<?= base_url()?>control_pelanggan/c_pelanggan/editjahit/<?= $row->id_jahitan?>" class="btn btn-sm btn-primary">Edit</a>
                                    </td>
                                    </tr>                                    
                                </tbody>
                                <?php $no++;};?>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>