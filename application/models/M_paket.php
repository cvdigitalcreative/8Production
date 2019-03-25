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
      $hsl = $this->db->query("SELECT a.paket_nama,a.paket_id,a.paket_harga,a.paket_keterangan,a.paket_tanggal,a.paket_gambar,b.kp_id, b.kp_nama FROM paket a, kategori_paket b WHERE a.kp_id = b.kp_id ORDER BY a.paket_id DESC");
      return $hsl;
    }

    function getPaketbyKategori($id){
      $hsl = $this->db->query("SELECT a.paket_nama,a.paket_id,a.paket_harga,a.paket_keterangan,a.paket_tanggal,a.paket_gambar,b.kp_id, b.kp_nama FROM paket a, kategori_paket b WHERE a.kp_id = '$id' AND a.kp_id = b.kp_id ");
      return $hsl;
    }

    function getPaketLimit($limit){
      $hsl = $this->db->query("SELECT a.paket_nama,a.paket_id,a.paket_harga,a.paket_keterangan,a.paket_tanggal,a.paket_gambar,b.kp_id, b.kp_nama FROM paket a, kategori_paket b WHERE  a.kp_id = b.kp_id LIMIT $limit");
      return $hsl;
    }

    function getPaketbyID($id){
      $hsl = $this->db->query("SELECT a.paket_nama,a.paket_id,a.paket_harga,a.paket_keterangan,a.paket_tanggal,a.paket_gambar,b.kp_id, b.kp_nama FROM paket a, kategori_paket b WHERE a.paket_id = '$id' AND a.kp_id = b.kp_id");
      return $hsl;
    }

    function savePaket($nama_paket,$harga_paket,$kategori,$deskripsi_paket,$gambar){
      $hsl = $this->db->query("INSERT INTO paket(paket_nama,paket_harga,kp_id,paket_keterangan,paket_gambar) VALUES ('$nama_paket','$harga_paket','$kategori','$deskripsi_paket','$gambar')");
      return $hsl;
    }

    function updatePaket($id,$nama_paket,$harga_paket,$kategori,$deskripsi_paket,$gambar){
      $hsl = $this->db->query("UPDATE paket SET paket_nama='$nama_paket', paket_harga = '$harga_paket', kp_id = '$kategori', paket_keterangan = '$deskripsi_paket', paket_gambar = '$gambar' WHERE paket_id='$id'");
      return $hsl;
    }

    function updatePaketNoGambar($id,$nama_paket,$harga_paket,$kategori,$deskripsi_paket){
      $hsl = $this->db->query("UPDATE paket SET paket_nama='$nama_paket', paket_harga = '$harga_paket', kp_id = '$kategori', paket_keterangan = '$deskripsi_paket' WHERE paket_id='$id'");
      return $hsl;
    }

    function hapusPaket($id){
      $hsl = $this->db->query("DELETE FROM paket WHERE paket_id='$id'");
      return $hsl;
    }
}

?>
