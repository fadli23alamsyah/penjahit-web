<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_login extends CI_Controller {

    public function __construct(){
        parent::__construct();

        $this->load->model("M_login");
        $this->load->helper("url");
        $this->load->helper("form");
        $this->load->library("session");      
        $this->load->library("form_validation");      
    }

	public function index()
	{
        $this->session->sess_destroy();
        $this->load->view('user/header');
		$this->load->view('login');
        $this->load->view('user/footer');
    }

    function proses_login(){
        $user=$this->input->post('username');
        $pass=$this->input->post('password');

        $ceklogin = $this->M_login->login($user,$pass);

        if($ceklogin){
            foreach($ceklogin as $row);          
            $this->session->set_userdata('id_akun', $row->id_akun);
            $this->session->set_userdata('username', $row->username);
            $this->session->set_userdata('nama', $row->nama_akun);
            $this->session->set_userdata('nik', $row->nik_akun);
            $this->session->set_userdata('alamat', $row->alamat);
            $this->session->set_userdata('hak', $row->hak_akses);

            if($this->session->userdata('hak')==="@dm1n"){
                redirect('control_admin/c_admin/');
            }elseif($this->session->userdata('hak')=="pelanggan"){
                //$data['pesan']="Anda bukan admin";
                redirect('c_user/');
            }
        }else{
            $data['pesan']="Username atau Password tidak sesuai";
            $this->load->view('user/header');
            $this->load->view('login',$data);
            $this->load->view('user/footer');
        }
    }

    public function logout(){
        $this->session->sess_destroy();
        redirect('c_user/');
    }




    // belum dipakai
    public function edit(){
        if($this->session->userdata('hak')==="@dm1n"){
            $id = $this->session->userdata('id_akun');
            $data['sql']=$this->M_login->edit($id);
            $this->load->view('admin/head');
		    $this->load->view('edit_akun',$data);
            $this->load->view('admin/footer');
        }else{
            $id = $this->session->userdata('id_akun');
            $data['sql']=$this->M_login->edit($id);
            $this->load->view("pelanggan/header");
            $this->load->view("pelanggan/form_pelanggan",$data);
            $this->load->view("pelanggan/footer");
        }
    }

    public function simpan(){
        $id = $this->input->post('id_akun');
        $nama = htmlspecialchars($this->input->post('namaakun'));
        $alamat = htmlspecialchars($this->input->post('alamat'));
        $user = htmlspecialchars($this->input->post('username'));
        $pass = $this->input->post('password');
        $fotolama = htmlspecialchars($this->input->post('fotolama'));

        if($_FILES['fotoprofil']['error'] == 4){
            $fotoprofil = $fotolama;
        }else{
            $fotoprofil = $this->upload_foto();
            if($fotoprofil == false){
                echo "<script>alert('Terjadi kesalahan pada upload gambar!!');document.location='".base_url()."c_login/edit/'</script>";
                return false;
            }elseif($fotoprofil != $fotolama){
                $hapus = './assets/img/profilAkun/'.$fotolama;
                unlink($hapus);
            }
        }
        
        $passLama = md5(htmlspecialchars($this->input->post('passwordlama')));

        // $sql = $this->M_login->edit($id);
        // foreach ($sql->result() as $data) {
        //     $passx = $data->password;
        // }

        if($passLama == $pass){
            $this->form_validation->set_rules('passwordbaru','passwordbaru','required');
            $this->form_validation->set_rules('passwordbarulagi','passwordbarulagi','required|matches[passwordbaru]');
            if($this->form_validation->run()){
                $passBaru = md5(htmlspecialchars($this->input->post('passwordbaru')));
                //$passBaruLagi = md5(htmlspecialchars($this->input->post('passwordbarulagi')));
                $data = array(
                    'nama_akun' => $nama,
                    'alamat' => $alamat,
                    'username' => $user,
                    'password' => $passBaru,
                    'foto_profil' => $fotoprofil
                );
                $this->M_login->update($id,$data);
                echo "<script>alert('Data telah diubah!!');document.location='".base_url()."control_pelanggan/c_pelanggan/'</script>";
            }else{
                echo "<script>alert('Data gagal diubah. Coba periksa password baru anda!!');document.location='".base_url()."/c_login/edit'</script>";
            }
        }elseif($passLama == null){
            $data = array(
                'nama_akun' => $nama,
                'alamat' => $alamat,
                'username' => $user,
                'password' => $pass,
                'foto_profil' => $fotoprofil
            );
            $this->M_login->update($id,$data);
            echo "<script>alert('Data telah diubah!!');document.location='".base_url()."control_pelanggan/c_pelanggan/'</script>";
        }else{
            echo "<script>alert('Data gagal diubah dan password lama anda salah!!');document.location='".base_url()."c_login/edit'</script>";
        }
        

        // if($passLama != $passx){
        //     if($this->session->userdata('hak')==="@dm1n"){
        //         echo "<script>alert('Password Lama Tidak Sesuai. Gagal Mengubah Password!!');document.location='".base_url()."control_admin/c_admin/'</script>";
        //         return false;
        //     }else{
        //         echo "<script>alert('Password Lama Tidak Sesuai. Gagal Mengubah Password!!');document.location='".base_url()."control_user/c_user'</script>";
        //         return false;
        //     }
        // }
    }

    public function upload_foto(){
        $namaFile = $_FILES['fotoprofil']['name'];
        $ukuranFile = $_FILES['fotoprofil']['size'];
        $eror = $_FILES['fotoprofil']['error'];
        $tmpName = $_FILES['fotoprofil']['tmp_name'];

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

        move_uploaded_file($tmpName,'./assets/img/profilAkun/'.$namaFileBaru);
        return $namaFileBaru;
    }

}

