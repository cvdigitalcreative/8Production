<?php
class M_login extends CI_Model
{
    function cekuser($username,$password){
        $hasil=$this->db->query("SELECT * FROM user WHERE user_username='$username' AND user_password='$password' ");
        return $hasil;
    }

    function cekpegawai($username,$password){
        $hasil=$this->db->query("SELECT * FROM pegawai WHERE pegawai_username='$username' AND pegawai_username='$password' ");
        return $hasil;
    }

    function getuser($id){
        $hasil=$this->db->query("SELECT * FROM user WHERE user_id='$id' ");
        return $hasil;
    }

    function getpegawai($id){
        $hasil=$this->db->query("SELECT * FROM pegawai WHERE pegawai_id='$id' ");
        return $hasil;
    }
  
}?>
