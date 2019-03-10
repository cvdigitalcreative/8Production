<?php

/**
 *
 */
class M_paket extends CI_Model
{
    function saveKategori($nama_kategori){
      $hsl = $this->db->query("INSERT INTO kategori_paket(kp_nama) VALUES ('$nama_kategori')");
      return $hsl;
    }

    function updateKategori($id, $nama_kategori){
      $hsl = $this->db->query("UPDATE kategori_paket SET kp_nama='$nama_kategori' WHERE kp_id='$id'");
      return $hsl;
    }

    function hapusKategori($id){
      $hsl = $this->db->query("DELETE FROM kategori_paket WHERE kp_id='$id'");
      return $hsl;
    }

    function getKategori(){
      $hsl = $this->db->query("SELECT * FROM kategori_paket");
      return $hsl;
    }


    // paket
    function getPaket(){
      $hsl = $this->db->query("SELECT a.paket_nama,a.paket_id,a.paket_harga,a.paket_keterangan,a.paket_tanggal, b.kp_nama FROM paket a, kategori_paket b WHERE a.kp_id = b.kp_id");
      return $hsl;
    }

    function savePaket($nama_paket,$harga_paket,$kategori,$deskripsi_paket){
      $hsl = $this->db->query("INSERT INTO paket(paket_nama,paket_harga,kp_id,paket_keterangan) VALUES ('$nama_paket','$harga_paket','$kategori','$deskripsi_paket')");
      return $hsl;
    }
}

?>
