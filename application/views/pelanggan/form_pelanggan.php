<?php
foreach($sql->result() as $row){
    $id = $row->id_akun;
    $nik = $row->nik_akun;
    $nama = $row->nama_akun;
    $pass = $row->password;
    $alamat = $row->alamat;
    $username = $row->username;
    $foto = $row->foto_profil;
}
?>
<div class="info-panel">
    <?php echo validation_errors();?>
    <?php echo form_open_multipart('c_login/simpan');?>
    <input type="hidden" name="id_akun" value="<?= $id;?>">
    <input type="hidden" name="fotolama" value="<?= $foto;?>">
    <input type="hidden" name="password" value="<?= $pass;?>">
    <div class="container bg-light pt-5 pb-3">
        <h4 class="text-center">Informasi Akun</h4>
        <hr>
            <div class="row mt-4 justify-content-center">
                <div class="col-sm-3">
                    <label for="">Nik Akun</label>
                </div>
                <div class="col-sm-6"><input type="text" name="nik_akun" class="form-control" value="<?= $nik;?>" disabled="true"></div>
            </div> 


            <div class="row mt-3 justify-content-center">
                <div class="col-sm-3">
                    <label for="">Nama Akun</label>
                </div>
                <div class="col-sm-6"><input type="text" name="namaakun" class="form-control" placeholder="Nama Akun" value="<?= $nama;?>" required></div>
            </div>

            <div class="row mt-3 justify-content-center">
                <div class="col-sm-3">
                    <label for="">Alamat</label>
                </div>
                <div class="col-sm-6"><input type="text" name="alamat" class="form-control" placeholder="Alamat" value="<?= $alamat;?>" required></div>
            </div> 

            <div class="row mt-3 justify-content-center">
                <div class="col-sm-3">
                    <label for="">Username</label>
                </div>
                <div class="col-sm-6"><input type="text" name="username" class="form-control" placeholder="Username" value="<?= $username;?>" required></div>
            </div>

            <div class="row mt-3 justify-content-center">
                <div class="col-sm-3">
                    <label for="">Ganti Password</label>
                </div>
                <div class="col-sm-6">
                    <div class="row">
                        <div class="col-md-12">
                            <input type="text" name="passwordlama" class="form-control" placeholder="Password Lama">
                            <input type="text" name="passwordbaru" class="form-control mt-3" placeholder="Password Baru">
                            <input type="text" name="passwordbarulagi" class="form-control mt-3" placeholder="Ulangi Password Baru">
                            <small> <span style="color:red">*</span> Kosongkan jika tidak ingin mengubah password anda <span style="color:red">*</span> </small>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mt-3 justify-content-center">
                <div class="col-sm-3">
                    <label for="">Foto Profil</label>
                </div>
                <div class="col-sm-6">
                    <img src="<?= base_url();?>/assets/img/profilAkun/<?= $foto;?>" width="150px" height="150px" class="rounded-circle img-thumbnail pb-2">
                    <div class="custom-file">
                        <input type="file" name="fotoprofil" class="custom-file-input" id="customFile">
                        <label class="custom-file-label" for="customFile">Pilih File</label>
                    </div>
                </div>
            </div>

            <div class="row mt-3 mb-4 justify-content-center">
                <div class="col-sm-6"></div>
                <div class="col-sm-1">
                    <input type="submit" class="btn btn-success" value='Selesai'>
                </div>
                <div class="col-sm-1">
                    <input type="button" class="btn btn-danger" onclick=self.history.back() value="Batal">
                </div>
            </div>
    </div>
    <?php echo form_close();?>



    <?php echo form_open('control_pelanggan/c_pelanggan/komentar');?>
    <div class="container pt-4">
        <h4 class="text-center">Komentar</h4>
        <hr>
            <div class="row mt-3 justify-content-center">
                <div class="col-sm-3">
                    <label for="">Komentar</label>
                </div>
                <div class="col-sm-6">
                    <textarea name="komentar" id="" cols="30" rows="5" class="form-control" placeholder="Komentar dan saran terhadap pelayanan web kami" required></textarea>
                </div>
            </div>
            <div class="row mt-3 mb-4 justify-content-center">
                <div class="col-sm-8"></div>
                <div class="col-sm-1">
                    <input type="submit" class="btn btn-success" value='Kirim'>
                </div>
            </div>
    </div>
    <?php echo form_close();?>
</div>