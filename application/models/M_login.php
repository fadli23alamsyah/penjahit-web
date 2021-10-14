<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_login extends CI_Model {
	
    function login($user,$pass){
        $passx = md5($pass);
        $this->db->select('id_akun');
        $this->db->select('nama_akun');
        $this->db->select('nik_akun');
        $this->db->select('alamat');
        $this->db->select('hak_akses');
        $this->db->from('tb_akun');
        $this->db->where('username',$user);
        $this->db->where('password',$passx);
        $this->db->limit(1);

        $query = $this->db->get();     
        
        if($query->num_rows()==1){
            return $query->result();
        }else{
            return false;
        }
    }

    public function edit($id){
        $this->db->where('id_akun',$id);
        $sql = $this->db->get('tb_akun');
        return $sql;
    }

    public function update($id,$data){
        $this->db->where('id_akun',$id);
        $this->db->update('tb_akun',$data);
    }
}