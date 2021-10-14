<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_pelanggan extends CI_Controller {

    public function __construct(){

        parent:: __construct();

        $this->load->library('session');  
        $this->load->library('form_validation');
        $this->load->helper("url");
        $this->load->helper("form");   
        $this->load->model('M_transaksi');
        $this->load->model('M_user');
        $this->load->model('M_jahit');
        $hak = $this->session->userdata('hak');
        if($hak != 'pelanggan'){
            redirect('c_user');
        }
    }

    public function index()
    {
        $data['komen'] = $this->M_user->getkomen();
        $this->load->view("pelanggan/header");
        $this->load->view("user/home",$data);
        $this->load->view("pelanggan/footer");
    }

    public function d_jahit()
    {
        $nik = $this->session->userdata('nik');
        $data['sql'] = $this->M_jahit->daftarjahit($nik);
        $this->load->view("pelanggan/header");
        $this->load->view("pelanggan/d_jahit",$data);
        $this->load->view("pelanggan/footer");
    }

    public function d_transaksi()
    {
        $nik = $this->session->userdata('nik');
        $data['sql'] = $this->M_transaksi->daftartransaksi($nik);
        $this->load->view("pelanggan/header");
        $this->load->view("pelanggan/d_transaksi",$data);
        $this->load->view("pelanggan/footer");
    }

    // public function info_pelanggan()
    // {
    //     $this->load->view("pelanggan/header");
    //     $this->load->view("pelanggan/form_pelanggan");
    //     $this->load->view("pelanggan/footer");
    // }

    public function tambahjahit()
    {
        $data['op'] = 'tambah';
        $this->load->view("pelanggan/header");
        $this->load->view("pelanggan/form_jahit",$data);
        $this->load->view("pelanggan/footer");
    }

    public function editjahit($id)
    {
        $data['op'] = 'edit';
        $data['sql'] = $this->M_jahit->editjahit($id);
        $this->load->view("pelanggan/header");
        $this->load->view("pelanggan/form_jahit",$data);
        $this->load->view("pelanggan/footer");
    }

    public function hapusjahit($id)
    {
        $sql = $this->M_jahit->editjahit($id);
        foreach($sql->result() as $row){
            $desainbajulama = $row->gambar_desain;
        }
        $hapus= "./assets/img/modelPelanggan/"."$desainbajulama";
        unlink($hapus);
        $this->M_jahit->hapusjahit($id);
        redirect('control_pelanggan/c_pelanggan/d_jahit');
    }


    //proses beli
    public function beli()
    {
        $pilihan = "Beli";
        $id = $this->input->post('id_pakaian');
        $nik_akun = $this->input->post('nik_akun');
        $alamat = $this->input->post('alamat');
        $harga_pakaian = $this->input->post('harga_jual');
        $gambar_baju = $this->input->post('gambar_jual');

        $data=array(
            'pilihan' => $pilihan,
            'nik_akun' => $nik_akun,
            'alamat' => $alamat,
            'gambar_baju' => $gambar_baju,
            'harga_pakaian' => $harga_pakaian,
        );

        $data1 =array(
            'status_post' => 'terjual' );

        $this->M_transaksi->beli($data);
        $this->M_user->beli_koleksi($id,$data1);
        redirect('c_user/koleksi');
    }



    //proses pesan jahit
    public function simpanjahit()
    {
        //$pilihan = 'jahit';

        $this->form_validation->set_rules('lpundak','lpundak','required|numeric');
        $this->form_validation->set_rules('lkl','lkl','required|numeric');
        $this->form_validation->set_rules('lpt','lpt','required|numeric');
        $this->form_validation->set_rules('plengan','plengan','required|numeric');
        $this->form_validation->set_rules('lbd','lbd','required|numeric');
        $this->form_validation->set_rules('lpinggang','lpinggang','required|numeric');
        $this->form_validation->set_rules('lpinggul','lpinggul','required|numeric');
        $this->form_validation->set_rules('ppunggung','ppunggung','required|numeric');
        $this->form_validation->set_rules('ukurankain','ukurankain','required|numeric');
        $this->form_validation->set_rules('pbaju','pbaju','required|numeric');

        if($this->form_validation->run())
        {
            $op = $this->input->post('op');
            $idjahit = $this->input->post('idjahit');
            $nik_akun = $this->input->post('nik_akun');
            $l_pundak = htmlspecialchars($this->input->post('lpundak'));
            $l_kerung = htmlspecialchars($this->input->post('lkl'));
            $l_pergelangan = htmlspecialchars($this->input->post('lpt'));
            $p_lengan = htmlspecialchars($this->input->post('plengan'));
            $l_badan = htmlspecialchars($this->input->post('lbd'));
            $l_pinggang = htmlspecialchars($this->input->post('lpinggang'));
            $l_pinggul = htmlspecialchars($this->input->post('lpinggul'));
            $p_punggung = htmlspecialchars($this->input->post('ppunggung'));
            
            $jeniskain = htmlspecialchars($this->input->post('jeniskain'));
            $ukurankain = htmlspecialchars($this->input->post('ukurankain'));
            $p_baju = htmlspecialchars($this->input->post('pbaju'));
            $desaintambah = htmlspecialchars($this->input->post('desaintambah'));
            $tglpesan = htmlspecialchars($this->input->post('tglpesan'));
            $batastanggal = htmlspecialchars($this->input->post('batastanggal'));
            $desainbajulama = htmlspecialchars($this->input->post('desainbajulama'));
            $namegambar= 'desainbaju';

            if($_FILES['desainbaju']['error'] == 4){
                $desainbaju = $desainbajulama;
            }else{
                $desainbaju = $this->upload_foto($namegambar);
                if($desainbaju == false){
                    echo "<script>alert('Terjadi kesalahan pada upload gambar!!');document.location='".base_url()."control_pelanggan/c_pelanggan/tambahjahit/'</script>";
                    return false;
                }
                elseif($desainbajulama != $desainbaju){
                    $hapus= "./assets/img/modelPelanggan/"."$desainbajulama";
                    unlink($hapus);
                }            
            }

            $data = array(
                'nik_akun' => $nik_akun,
                'lebar_pundak' => $l_pundak,
                'kerung_lengan' => $l_kerung,
                'pergelangan_tangan' => $l_pergelangan,
                'panjang_lengan' => $p_lengan,
                'lingkar_badan' => $l_badan,
                'lingkar_pinggang' => $l_pinggang,
                'lingkar_pinggul' => $l_pinggul,
                'panjang_punggung' => $p_punggung,
                'panjang_baju' => $p_baju,
                'gambar_desain' => $desainbaju,
                'jenis_kain' => $jeniskain,
                'panjang_kain' => $ukurankain,
                'desain_tambahan' => $desaintambah,
                'tgl_pesan' => $tglpesan,
                'tgl_penyelesaian' => $batastanggal
            );
            
            if($op=='tambah'){
                $this->M_jahit->insertjahit($data);
                redirect('control_pelanggan/c_pelanggan/d_jahit/');
            }else{
                $this->M_jahit->updatejahit($idjahit,$data);
                redirect('control_pelanggan/c_pelanggan/d_jahit/');
            }
        }
        else{
            redirect('control_pelanggan/c_pelanggan/tambahjahit/');
        }
    }


    //buktibayar
    public function buktipembayaran()
    {
        $idtransaksi = $this->input->post('id_transaksi');
        $gambarlama = $this->input->post('gambarlama');
        #$opsi = $this->input->post('op');
        $tgl_transaksi = date('Y-m-d');
        $namegambar = 'gambarbukti';

        $gambarbukti = $this->upload_foto($namegambar);
        if($gambarbukti == false){
            echo "<script>alert('Terjadi kesalahan pada upload gambar!!');document.location='".base_url()."control_pelanggan/c_pelanggan/d_transaksi/'</script>";
            return false;
        }
        elseif($gambarlama != $gambarbukti){
            $hapus= "./assets/img/buktiBayar/"."$gambarlama";
            unlink($hapus);
        }

        $data = array(
            'gambar_bukti_transaksi' => $gambarbukti,
            'tgl_transaksi' => $tgl_transaksi
        );

        #if($opsi == 'uploadbukti'){
            $this->M_transaksi->uploadbukti($idtransaksi,$data);
            redirect('control_pelanggan/c_pelanggan/d_transaksi');
        // }else{
        //     $this->M_transaksi->gantibukti($idtransaksi,$data);
        // }
    }


    public function upload_foto($data){
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

        if($namegambar=='desainbaju'){
            move_uploaded_file($tmpName,'./assets/img/modelPelanggan/'.$namaFileBaru);
        }elseif($namegambar=='gambarbukti'){
            move_uploaded_file($tmpName,'./assets/img/buktiBayar/'.$namaFileBaru);
        }
        
        return $namaFileBaru;
    }

    public function komentar()
    {
        $nik = $this->session->userdata('nik');
        $komen = htmlspecialchars($this->input->post('komentar'));
        $data = array(
            'nik_akun' => $nik,
            'komentar' => $komen
        );
        $this->M_user->komentar($data);
        echo "<script>alert('Terima Kasih Atas Komentar atau Sarannya :D');document.location='".base_url()."c_user'</script>";
    }
}
?>