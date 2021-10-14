<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_user extends CI_Model {

    public function koleksi(){
        $this->db->select('*');
        $this->db->where('status_post','aktif');
        $this->db->order_by('tgl_upload','DESC');
        $this->db->from('tb_daftar_pakaian');
        $sql = $this->db->get();

        return $sql;
    }

    public function beli_koleksi($id,$data)
    {
        $this->db->where('id_pakaian',$id);
        $this->db->update('tb_daftar_pakaian',$data);
    }

    public function searchAjax($keyword){
        if($keyword != 'semua'){
            $this->db->like('kategori_pakaian',$keyword);
            $this->db->order_by('tgl_upload','DESC');
            $this->db->from('tb_daftar_pakaian');
            $sql = $this->db->get();
    
            return $sql;
        }else{
            $this->koleksi();
        }
    }



    //tb_komentar
    public function komentar($data)
    {
        $this->db->insert('tb_komentar',$data);
    }

    public function getkomen()
    {
        // $this->db->select('tb_komentar.komentar');
        // $this->db->select('tb_akun.nama_akun');
        // $this->db->select('tb_akun.foto_profil');
        // $this->db->where('tb_akun.nik_akun == tb_komentar.nik_akun');
        // $this->db->order_by('tb_komentar.id_komentar','DESC');
        // $this->db->limit('3');
        // $komen = $this->db->get();
        $komen = $this->db->query('SELECT tb_akun.nama_akun, tb_akun.foto_profil, tb_komentar.komentar FROM tb_akun,tb_komentar WHERE tb_akun.nik_akun = tb_komentar.nik_akun ORDER BY tb_komentar.id_komentar DESC LIMIT 3');
        // $this->db->select('nik_akun');
        // $this->db->select('komentar');
        // $this->db->from('tb_komentar');
        // $komen = $this->db->get();
        return $komen;
    }
}
