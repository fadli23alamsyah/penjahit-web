<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_transaksi extends CI_Model {

    public function daftartransaksi($nik)
    {
        $this->db->where('nik_akun',$nik);
        $this->db->order_by('id_transaksi','DESC');
        $this->db->from('tb_transaksi');
        $sql = $this->db->get();
        return $sql;
    }

    public function beli($data)
    {
        $this->db->insert('tb_transaksi',$data);
    }

    public function uploadbukti($id,$data)
    {
        $this->db->where('id_transaksi',$id);
        $this->db->update('tb_transaksi',$data);
    }


    /// A
    /// D
    /// M
    /// I
    /// N

    public function selectadmin()
    {
        $row = $this->db->query('SELECT tb_transaksi.*,tb_akun.* FROM tb_transaksi,tb_akun WHERE tb_transaksi.nik_akun = tb_akun.nik_akun ORDER BY tb_transaksi.id_transaksi DESC');
        return $row;
    }


    public function liattransaksi()
    {
        $this->db->from('tb_transaksi');
        $liat_tr = $this->db->get();
        return $liat_tr;
    }

    public function hapus_tr($id)
    {
        $this->db->where('id_transaksi',$id);
        $this->db->delete('tb_transaksi');
    }
    
}