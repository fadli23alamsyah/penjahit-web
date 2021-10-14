<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_admin extends CI_Controller {

    public function __construct(){

        parent:: __construct();

        $this->load->library('session');
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->model('M_admin');
        $this->load->model('M_jahit');
        $this->load->model('M_transaksi');
        $hak = $this->session->userdata('hak');
        if($hak != '@dm1n' ){
            redirect('c_login');
        }
    }

    public function index()
    {
        $data['koleksi'] = $this->M_admin->koleksidash();
        $data['jual'] = $this->M_admin->jualdash();
        $data['pesanjahit'] = $this->M_jahit->pesanjahit();
        $data['jahitini'] = $this->M_jahit->jahitini();
        $this->load->view("admin/header");
        $this->load->view("admin/dashboard",$data);
        $this->load->view("admin/footer");
    }

    public function data()
    {
        $data['koleksi'] =$this->M_admin->daftarkoleksi();
        $this->load->view("admin/header");
        $this->load->view("admin/v_daftar",$data);
        $this->load->view("admin/footer");
    }

    public function jahitan()
    {
        $data['pesan'] = $this->M_jahit->selectjahitan();
        $data['liat_tr'] = $this->M_transaksi->liattransaksi();
        $this->load->view("admin/header");
        $this->load->view("admin/v_jahit",$data);
        $this->load->view("admin/footer");
    }

    public function transaksi()
    {
        $data['row'] = $this->M_transaksi->selectadmin();
        $data['row1'] = $this->M_transaksi->selectadmin();
        $this->load->view("admin/header");
        $this->load->view("admin/v_transaksi",$data);
        $this->load->view("admin/footer");
    }

    public function form_tambah()
    {
        $data['op'] = 'tambah';
        $this->load->view("admin/header");
        $this->load->view("admin/form_tambah",$data);
        $this->load->view("admin/footer");
    }

    public function form_edit($id)
    {
        $data['op'] = 'edit';
        $data['sql'] = $this->M_admin->edit($id);
        $this->load->view("admin/header");
        $this->load->view("admin/form_tambah",$data);
        $this->load->view("admin/footer");
    }

    public function hapuspakaian($id)
    {
        $sql = $this->M_admin->edit($id);
        foreach ($sql->result() as $key) {
            $gambar = $key->gambar_jual;
        }
        $hapus = './assets/img/daftarPakaian/'.$gambar;
        unlink($hapus);
        $this->M_admin->hapusdata($id);
        redirect('control_admin/c_admin/data');
    }

    public function hapusjahitan($id)
    {
        $sql = $this->M_jahit->editjahit($id);
        foreach ($sql->result() as $row){
            $gambardesain = $row->gambardesain;
        }
        $hapus = './assets/img/modelPelanggan'.$gambardesain;
        unlink($hapus);
        $this->M_jahit->hapusjahit($id);
        redirect('control_admin/c_admin/jahitan');
    }


    public function tr_admin()
    {
        $id_tr = $this->input->post('id_tr');
        $data = array('konfirmasi_transaksi'=>'Dikonfirmasi');
        $this->M_transaksi->uploadbukti($id_tr,$data);
        redirect('control_admin/c_admin/transaksi');
    }

    public function hapustransaksi($id)
    {
        $this->M_transaksi->hapus_tr($id);
        redirect('control_admin/c_admin/transaksi');
    }


    public function simpan()
    {
        $op = $this->input->post('op');
        $id = $this->input->post('id_pakaian');
        $tgl_up = $this->input->post('tgl_upload');
        $nama = htmlspecialchars($this->input->post('nama_pakaian'));
        $kategori = htmlspecialchars($this->input->post('kategori_pakaian'));
        $ukuran = htmlspecialchars($this->input->post('ukuran_pakaian'));
        $harga = htmlspecialchars($this->input->post('harga_pakaian'));
        $gambarlama = $this->input->post('gmbrlama');
        $namadata = 'gambar_pakaian';

        if($_FILES['gambar_pakaian']['error'] == 4){
            $uploadbaru = $gambarlama;
        }else{
            $uploadbaru = $this->upload($namadata);
            if($uploadbaru == false){
                echo "<script>alert('Terjadi kesalahan pada upload gambar!!');document.location='".base_url()."control_admin/c_admin/data/'</script>";
                return false;
            }
            elseif($uploadbaru != $gambarlama){
                $hapus= "./assets/img/daftarPakaian/"."$gambarlama";
                unlink($hapus);
            }
        }

        $data = array(
            'tgl_upload' => $tgl_up,
            'nama_pakaian' => $nama,
            'kategori_pakaian' => $kategori,
            'ukuran_pakaian' => $ukuran,
            'harga_jual' => $harga,
            'gambar_jual' => $uploadbaru,
            'status_post' => 'aktif'
        );
        
        if($op=='edit'){
            $this->M_admin->updatedaftar($id,$data);
        }else{
            $this->M_admin->tambahdaftar($data);
        }
        redirect('control_admin/c_admin/data');
    }





    public function adminjahit()
    {
        $id = $this->input->post('id_jahitan');
        $id_tr = $this->input->post('id_tr');
        $nik = $this->input->post('nik_pelanggan');
        $harga = $this->input->post('harga_pakaian');
        $status = $this->input->post('status');
        $gambarlama = $this->input->post('gambar_lama');
        if($status == 'Dikerjakan'){
            $data = array('status' => $status);
            $this->M_jahit->updatejahit($id,$data);
            redirect('control_admin/c_admin/jahitan');
        }else{
            $namadata = 'baju_pelanggan';
            if($_FILES[$namadata]['error']){
                $uploadbaru = $gambarlama;
            }else{
                $uploadbaru = $this->upload($namadata);
                if($uploadbaru == false){
                    echo "<script>alert('Terjadi kesalahan pada upload gambar!!');document.location='".base_url()."control_admin/c_admin/jahitan/'</script>";
                    return false;
                }
                elseif($uploadbaru != $gambarlama){
                    $hapus= "./assets/img/bajuPelanggan/"."$gambarlama";
                    unlink($hapus);
                }
            }

            $data1 = array('status' => $status);
            $data2 = array(
                'nik_akun' => $nik,
                'gambar_baju' => $uploadbaru,
                'pilihan' => 'Jahit',
                'harga_pakaian' => $harga,
                'id_jahitan' => $id
            );

            $this->M_jahit->updatejahit($id,$data1);
            if($id_tr == null){
                $this->M_transaksi->beli($data2);
            }else{
                $this->M_transaksi->uploadbukti($id_tr,$data2);
            }
            redirect('control_admin/c_admin/jahitan');
        }
    }

    


    public function upload($data)
    {
        $namegambar = $data;
        $namaFile = $_FILES[$namegambar]['name'];
        $ukuranFile = $_FILES[$namegambar]['size'];
        $eror = $_FILES[$namegambar]['error'];
        $tmpName = $_FILES[$namegambar]['tmp_name'];

        $ekstensiGambarValid = ['jpg','jpeg','png'];
        $ekstensiGambar = explode('.',$namaFile);
        $ekstensiGambar = strtolower(end($ekstensiGambar)); 

        if( !in_array($ekstensiGambar,$ekstensiGambarValid) ){
            return false;
        }

        if( $ukuranFile > 2000000){
            return false;
        }

        //namabaru
        $namaFileBaru = uniqid();
        $namaFileBaru .= '.';
        $namaFileBaru .= $ekstensiGambar;

        if($namegambar=='gambar_pakaian'){
            move_uploaded_file($tmpName,'./assets/img/daftarPakaian/'.$namaFileBaru);
        }elseif($namegambar=='baju_pelanggan'){
            move_uploaded_file($tmpName,'./assets/img/bajuPelanggan/'.$namaFileBaru);
        }
        
        return $namaFileBaru;
    }
}