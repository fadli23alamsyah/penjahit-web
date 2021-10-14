<?php
    if($op=='edit'){
        foreach($sql->result() as $row){
            $op = 'edit';
            $id = $row->id_jahitan;
            $lpundak = $row->lebar_pundak;
            $lkl = $row->kerung_lengan;
            $lpt = $row->pergelangan_tangan;
            $plengan = $row->panjang_lengan;
            $lbd = $row->lingkar_badan;
            $lpinggang = $row->lingkar_pinggang;
            $lpinggul = $row->lingkar_pinggul;
            $ppunggung = $row->panjang_punggung;
            $desainbaju = $row->gambar_desain;
            $jeniskain = $row->jenis_kain;
            $ukurankain = $row->panjang_kain;
            $pbaju = $row->panjang_baju;
            $desaintambah = $row->desain_tambahan;
            $tglpesan = $row->tgl_pesan;
            $batastanggal = $row->tgl_penyelesaian;
        }
    }else{
        $op = 'tambah';
        $id = '';
        $lpundak = '';
        $lkl = '';
        $lpt = '';
        $plengan = '';
        $lbd = '';
        $lpinggang = '';
        $lpinggul = '';
        $ppunggung = '';
        $desainbaju = '';
        $jeniskain = '';
        $ukurankain = '';
        $pbaju = '';
        $desaintambah = '';
        $batastanggal = '';
        $tglpesan = date('Y-m-d');
    }
?>

<div class="info-panel">
<?php echo validation_errors();?>
<?php echo form_open_multipart('control_pelanggan/c_pelanggan/simpanjahit');?>
<input type="hidden" name="nik_akun" value="<?= $this->session->userdata('nik');?>">
<input type="hidden" name="idjahit" value="<?= $id;?>">
<input type="hidden" name="op" value="<?= $op;?>">
<input type="hidden" name="desainbajulama" value="<?= $desainbaju;?>">
<input type="hidden" name="tglpesan" value="<?= $tglpesan;?>">
    <div class="container pb-3">
        <h4 class="text-center mt-5">Ukuran Badan</h4>
        <hr>

            <div class="row mt-3 justify-content-center">
                <div class="form-group col-sm-4">
                    <label for="">Lebar Pundak</label>
                    <div class="input-group">
                        <input type="text" name="lpundak" class="form-control" placeholder="Isi Disini" value="<?= $lpundak;?>" required>
                        <div class="input-group-prepend">
                            <div class="input-group-text">cm</div>
                        </div>
                    </div>
                </div>

                <div class="form-group col-sm-4">
                    <label for="">Lingkar Kerung Lengan</label>
                    <div class="input-group">
                        <input type="text" name="lkl" class="form-control" placeholder="Isi Disini" value="<?= $lkl;?>" required>
                        <div class="input-group-prepend">
                            <div class="input-group-text">cm</div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row  justify-content-center">
                <div class="form-group col-sm-4">
                    <label for="">Lingkar Pergelangan Tangan</label>
                    <div class="input-group">
                        <input type="text" name="lpt" class="form-control" placeholder="Isi Disini" value="<?= $lpt;?>" required>
                        <div class="input-group-prepend">
                            <div class="input-group-text">cm</div>
                        </div>
                    </div>
                </div>

                <div class="form-group col-sm-4">
                    <label for="">Panjang Lengan</label>
                    <div class="input-group">
                        <input type="text" name="plengan" class="form-control" placeholder="Isi Disini" value="<?= $plengan;?>" required>
                        <div class="input-group-prepend">
                            <div class="input-group-text">cm</div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="form-group col-sm-4">
                    <label for="">Lingkar Badan / Dada</label>
                    <div class="input-group">
                        <input type="text" name="lbd" class="form-control" placeholder="Isi Disini" value="<?= $lbd;?>" required>
                        <div class="input-group-prepend">
                            <div class="input-group-text">cm</div>
                        </div>
                    </div>
                </div>

                <div class="form-group col-sm-4">
                    <label for="">Lingkar Pinggang</label>
                    <div class="input-group">
                        <input type="text" name="lpinggang" class="form-control" placeholder="Isi Disini" value="<?= $lpinggang;?>" required>
                        <div class="input-group-prepend">
                            <div class="input-group-text">cm</div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row  justify-content-center">
                <div class="form-group col-sm-4">
                    <label for="">Lingkar Pinggul</label>
                    <div class="input-group">
                        <input type="text" name="lpinggul" class="form-control" placeholder="Isi Disini" value="<?= $lpinggul;?>" required>
                        <div class="input-group-prepend">
                            <div class="input-group-text">cm</div>
                        </div>
                    </div>
                </div>

                <div class="form-group col-sm-4">
                    <label for="">Panjang Punggung</label>
                    <div class="input-group">
                        <input type="text" name="ppunggung" class="form-control" placeholder="Isi Disini" value="<?= $ppunggung;?>" required>
                        <div class="input-group-prepend">
                            <div class="input-group-text">cm</div>
                        </div>
                    </div>
                </div>
            </div>
    </div>


    <div class="container bg-light pt-3 pb-3">
        <h4 class="text-center">Input Data Pelayanan Jahit Online</h4>
        <hr>

            <div class="row mt-4 justify-content-center">
                <div class="col-sm-3">
                    <label for="">Input Desain Pakaian</label>
                </div>
                <div class="col-sm-6">
                    <div class="custom-file">
                        <input type="file" name="desainbaju" class="custom-file-input" id="customFile" <?php if($desainbaju==null) echo 'required' ?>>
                        <label class="custom-file-label" for="customFile">Pilih File</label>
                    </div>
                    <?php 
                        if($op == 'edit') {
                            echo '<img src="'.base_url().'/assets/img/modelPelanggan/'.$desainbaju.'" width="150px" height="150px">';
                        }
                    ?>
                </div>
            </div>

            <div class="row mt-3 justify-content-center">
                <div class="col-sm-3">
                    <label for="">Info Kain</label>
                </div>
                <div class="col-sm-3"><input type="text" name="jeniskain" class="form-control" placeholder="Jenis Kain" value="<?= $jeniskain;?>" required></div>
                <div class="col-sm-3">
                    <div class="input-group">
                        <input type="text" name="ukurankain" class="form-control" placeholder="Ukuran kain" value="<?= $ukurankain;?>" required>
                        <div class="input-group-prepend">
                            <div class="input-group-text">cm</div>
                        </div>
                    </div>
                </div>
            </div>    

            <div class="row mt-3 justify-content-center">
                <div class="col-sm-3">
                    <label for="">Panjang Baju</label>
                </div>
                <div class="col-sm-6">
                    <div class="input-group">
                        <input type="text" name="pbaju" class="form-control" placeholder="Panjang Baju" value="<?= $pbaju;?>" required>
                        <div class="input-group-prepend">
                            <div class="input-group-text">cm</div>
                        </div>
                    </div>
                </div>
            </div>    

            <div class="row mt-3 justify-content-center">
                <div class="col-sm-3">
                    <label for="">Desain Tambahan</label>
                </div>
                <div class="col-sm-6">
                    <textarea name="desaintambah" id="" cols="30" rows="5" class="form-control" placeholder="Tambahkan deskripsi jika ingin memodifikasi model desain pakaian" ><?= $desaintambah;?></textarea>
                </div>
            </div>

            <div class="row mt-3 justify-content-center">
                <div class="col-sm-3">
                    <label for="">Tanggal Penyelesaian</label>
                </div>
                <div class="col-sm-6"><input name="batastanggal" type="date" class="form-control" value=<?= $batastanggal?> required></div>
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
</div>