<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_jahit extends CI_Model
{
    public function daftarjahit($nik)
    {
        $this->db->where('nik_akun',$nik);
        $this->db->order_by('tgl_pesan','desc');
        $this->db->from('tb_jahitan');
        $sql = $this->db->get();
        return $sql;
    }

    public function insertjahit($data)
    {
        $this->db->insert('tb_jahitan',$data);
    }

    public function editjahit($id)
    {
        $this->db->where('id_jahitan',$id);
        $sql = $this->db->get('tb_jahitan');
        return $sql; 
    }

    public function updatejahit($id,$data)
    {
        $this->db->where('id_jahitan',$id);
        $this->db->update('tb_jahitan',$data);
    }

    public function hapusjahit($id)
    {
        $this->db->where('id_jahitan',$id);
        $this->db->delete('tb_jahitan');
    }




    //untuk admin
    //untuk admin
    //untuk admin
    //untuk admin
    //untuk admin
    public function pesanjahit()
    {
        $pesanjahit = $this->db->get('tb_jahitan');
        return $pesanjahit;
    }

    public function jahitini()
    {
        $tgl = date('Y-m-d');
        $this->db->where('tgl_pesan',$tgl);
        $jahitini = $this->db->get('tb_jahitan');
        return $jahitini;
    }

    public function selectjahitan()
    {
        // $this->db->select('tb_jahitan.*');
        // $this->db->select('tb_akun.nama_akun');
        // $this->db->where('tb_jahitan.nik_akun','tb_akun.nik_akun');
        // $this->db->from('tb_jahitan');
        // $this->db->from('tb_akun');
        // $pesan = $this->db->get();
        $pesan = $this->db->query('SELECT tb_jahitan.*,tb_akun.nama_akun FROM tb_jahitan,tb_akun WHERE tb_akun.nik_akun = tb_jahitan.nik_akun ORDER BY tb_jahitan.tgl_pesan DESC');
        //$pesan = $this->db->query('SELECT tb_jahitan.*,tb_akun.nama_akun FROM tb_jahitan,tb_akun WHERE tb_akun.nik_akun = tb_jahitan.nik_akun && tb_jahitan.status !="Selesai" ORDER BY tb_jahitan.tgl_pesan DESC');
        return $pesan;
    }


}
?>