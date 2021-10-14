<div class="container">
    <div class="daftar">
        <h4>Daftar Data Pakaian</h4>
        <a href="<?=base_url()?>control_admin/c_admin/form_tambah" class="btn btn-primary">Tambah Pakaian</a>
        <table class="table mt-3">
            <thead class="thead-light">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Gambar Pakaian</th>
                    <th scope="col">Nama Pakaian</th>
                    <th scope="col">Tanggal Upload</th>
                    <th scope="col">Status Post</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
            <?php $no=1;foreach ($koleksi->result() as $koleksi) {?>
                
                <tr>
                    <th scope="row"><?= $no?></th>
                    <td><img src='<?= base_url()?>./assets/img/daftarPakaian/<?=$koleksi->gambar_jual?>' width=100px></td>
                    <td><?=$koleksi->nama_pakaian?></td>
                    <td><?=$koleksi->tgl_upload?></td>
                    <td><?=$koleksi->status_post?></td>
                    <td>
                        <!-- <a href="#" class="btn btn-sm btn-success">Detail</a> -->
                        <a href="javascript:if(confirm('Apakah anda yakin untuk manghapus data ini ??')){document.location='<?= base_url();?>control_admin/c_admin/hapuspakaian/<?= $koleksi->id_pakaian?>'}" class="btn btn-sm btn-danger">Hapus</a>
                        <a href="<?=base_url()?>control_admin/c_admin/form_edit/<?=$koleksi->id_pakaian?>" class="btn btn-sm btn-primary <?php if($koleksi->status_post == 'terjual') echo 'disabled'?>">Edit</a>
                    </td>
                </tr>
            <?php $no++;}?>
            </tbody>
        </table>
    
    </div>
</div>