<?php
$pilihkat = array(
    '' => 'Pilih Kategori',
    'Batik' => 'Batik',
    'Blouse' => 'Blouse',
    'Gamis' => 'Gamis',
    'Kebaya' => 'Kebaya'
    );

$pilihuk = array(
    '' => 'Pilih Ukuran',
    'S' => 'S',
    'M' => 'M',
    'L' => 'L',
    'XL' => 'XL'
    );


    if($op=='edit'){
        foreach($sql->result() as $sql){
            $id_pakaian =  $sql->id_pakaian;
            $nama =  $sql->nama_pakaian;
            $kategori =  $sql->kategori_pakaian;
            $ukuran =  $sql->ukuran_pakaian;
            $harga =  $sql->harga_jual;
            $gambar = $sql->gambar_jual;
            $tgl_upload = $sql->tgl_upload;
        }
    }else{
        $id_pakaian = '';
        $nama = '';
        $kategori = '';
        $ukuran = '';
        $harga = '';
        $gambar ='';
        $tgl_upload = date('Y-m-d');
    }
?>

<div class="info-admin">
    <div class="container pt-4">
        <h4 class='text-center'>Form Data Pakaian</h4>
        <hr>

        <?php echo form_open_multipart('control_admin/c_admin/simpan');?>
        <input type="hidden" name="op"  value="<?=$op?>">
        <input type="hidden" name="id_pakaian"  value="<?=$id_pakaian?>">
        <input type="hidden" name="tgl_upload"  value="<?=$tgl_upload?>">
        <input type="hidden" name="gmbrlama"  value="<?=$gambar?>">

        <div class="row justify-content-center mb-3">
            <div class="col-sm-3">
                <label for="nama_pakaian"><h6>Nama Pakaian</h6></label>
            </div>
            <div class="col-sm-6">
                <input type="text" name="nama_pakaian" id="nama_pakaian" class="form-control" value="<?=$nama?>" required>
            </div>
        </div>

        <div class="row justify-content-center mb-3">
            <div class="col-sm-3">
                <label for="kategori"><h6>Kategori Pakaian</h6></label>
            </div>
            <div class="col-sm-6">
                <select name="kategori_pakaian" id="kategori" class="form-control" required>
                    <?php
                        foreach ($pilihkat as $key => $value) {?>
                            <option value="<?= $key?>" <?php if($key==$kategori) echo 'selected' ?>><?= $value?></option>
                    <?php
                        }
                    ?>
                    <!-- <option value="">Pilih Kategori</option>
                    <option value="Batik">Batik</option>
                    <option value="Blouse">Blouse</option>
                    <option value="Gamis">Gamis</option>
                    <option value="Kebaya">Kebaya</option> -->
                </select>
            </div>
        </div>

        <div class="row justify-content-center mb-3">
            <div class="col-sm-3">
                <label for="ukuran"><h6>Ukuran Pakaian</h6></label>
            </div>
            <div class="col-sm-6">
                <select name="ukuran_pakaian" id="ukuran" class="form-control" required>
                    <?php
                        foreach ($pilihuk as $key => $value) {?>
                            <option value="<?= $key?>" <?php if($key==$ukuran) echo 'selected' ?>><?= $value?></option>
                    <?php
                        }
                    ?>
                    <!-- <option value="">Pilih Ukuran</option>
                    <option value="S">S</option>
                    <option value="M">M</option>
                    <option value="L">L</option>
                    <option value="XL">XL</option> -->
                </select>
            </div>
        </div>

        <div class="row justify-content-center mb-3">
            <div class="col-sm-3">
                <label for="harga"><h6>Harga Pakaian</h6></label>
            </div>
            <div class="col-sm-6">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <div class="input-group-text">Rp.</div>
                    </div>
                    <input type="text" name="harga_pakaian" id="harga" class="form-control" value="<?=$harga?>" required>
                </div>
            </div>
        </div>

        <div class="row justify-content-center mb-3">
            <div class="col-sm-3">
                <label for="gambar"><h6>Gambar Pakaian</h6></label>
            </div>
            <div class="col-sm-6">
                <?php if($gambar != null){ ?>
                    <img src='<?=base_url()?>./assets/img/daftarPakaian/<?=$gambar?>' width='200px'>
                <?php }?>
                <div class="custom-file">
                    <input type="file" name="gambar_pakaian" class="custom-file-input" id="customFile" <?php if($gambar==null) echo'required';?>>
                    <label class="custom-file-label" for="customFile">Pilih File</label>
                </div>
            </div>
        </div>

        <div class="row justify-content-center pr-2 mb-5">
            <div class="col-sm-7"></div>
            <div class="col-sm-1">
                <button class='btn btn-outline-success' type='submit'>Simpan</button>
            </div>
            <div class="col-sm-1">
                <button class='btn btn-outline-danger' type='reset' onclick=self.history.back()>Batal</button>
            </div>
        </div>
        <?php echo form_close() ?>
    </div>
</div>