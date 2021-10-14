<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_admin extends CI_Model {

    public function koleksidash()
    {
        $this->db->where('status_post','aktif');
        $koleksi = $this->db->get('tb_daftar_pakaian');
        return $koleksi;
    }

    public function jualdash()
    {
        $this->db->where('status_post','terjual');
        $jual = $this->db->get('tb_daftar_pakaian');
        return $jual;
    }

    public function daftarkoleksi()
    {
        $this->db->where('status_post','aktif');
        $this->db->order_by('tgl_upload','DESC');
        $koleksi = $this->db->get('tb_daftar_pakaian');
        return $koleksi;
    }

    public function edit($id)
    {
        $this->db->where('id_pakaian',$id);
        $sql = $this->db->get('tb_daftar_pakaian');
        return $sql;
    }

    public function tambahdaftar($data)
    {
        $this->db->insert('tb_daftar_pakaian',$data);
    }

    public function updatedaftar($id,$data)
    {
        $this->db->where('id_pakaian',$id);
        $this->db->update('tb_daftar_pakaian',$data);
    }

    public function hapusdata($id)
    {
        $this->db->where('id_pakaian',$id);
        $this->db->delete('tb_daftar_pakaian');
    }
}
?>