<?php
	/**
	 * 
	 */
	class M_pegawai extends CI_Model
	{
		function getAllPegawai(){
			$hsl = $this->db->query("SELECT * FROM pegawai");
      		return $hsl;
		}

		function getPegawaiById($id){
			$hsl = $this->db->query("SELECT * FROM pegawai WHERE pegawai_id = '$id'");
      		return $hsl;
		}

		function getPegawaiBySpesialis($spesialis){
			$hsl = $this->db->query("SELECT * FROM pegawai WHERE pegawai_spesialis = '$spesialis'");
			return $hsl;
		}
		
		function getPegawaiByNama(){
			$hsl = $this->db->query("SELECT * FROM pegawai WHERE pegawai_spesialis = '$spesialis'");
			return $hsl;	
		}

		function savePegawai($nama_pegawai, $spesialis, $nohp, $email, $alamat, $username, $password, $foto){
			$hsl = $this->db->query("INSERT INTO pegawai(pegawai_nama, pegawai_spesialis, pegawai_nohp, pegawai_email, pegawai_alamat, pegawai_username, pegawai_password, pegawai_foto) VALUES ('$nama_pegawai', '$spesialis', '$nohp', '$email', '$alamat', '$username', '$password', '$foto')");
      		return $hsl;
		}

		function updatePegawai($id, $nama_pegawai, $spesialis, $nohp, $email, $alamat, $username, $password, $foto){
			$hsl = $this->db->query("UPDATE pegawai SET pegawai_nama='$nama_pegawai', pegawai_spesialis='$spesialis', pegawai_nohp='$nohp', pegawai_email = '$email', pegawai_alamat = '$alamat', pegawai_username = '$username', pegawai_password = '$password', pegawai_foto='$foto' WHERE pegawai_id='$id'");
      		return $hsl;
		}

		function updatePegawaiNoFoto($id, $nama_pegawai, $spesialis, $nohp, $email, $alamat, $username, $password){
			$hsl = $this->db->query("UPDATE pegawai SET pegawai_nama='$nama_pegawai', pegawai_spesialis='$spesialis', pegawai_nohp='$nohp', pegawai_email = '$email', pegawai_alamat = '$alamat', pegawai_username = '$username', pegawai_password = '$password' WHERE pegawai_id='$id'");
      		return $hsl;
		}

		function hapusPegawai($id){
			$hsl = $this->db->query("DELETE FROM pegawai WHERE pegawai_id='$id'");
     	 	return $hsl;
		}

		//absensi
		function getAllAbsensi(){
			$hsl = $this->db->query("SELECT a.absensi_id, DATE_FORMAT(a.absensi_tanggal,'%d/%m/%Y') AS absensi_tanggal, a.absensi_status, b.pegawai_id, b.pegawai_nama FROM absensi a, pegawai b WHERE a.pegawai_id = b.pegawai_id");
	      	return $hsl;	
		}

		function getAllAbsensitanggal($tanggal){
			$hsl = $this->db->query("SELECT a.absensi_id, DATE_FORMAT(a.absensi_tanggal,'%d/%m/%Y') AS absensi_tanggal, a.absensi_status, b.pegawai_id, b.pegawai_nama FROM absensi a, pegawai b WHERE a.absensi_tanggal = '$tanggal' AND a.pegawai_id = b.pegawai_id");
	      	return $hsl;	
		}
		
		function saveAbsensi($tanggal,$status,$pegawai_id){
			$hsl = $this->db->query("INSERT INTO absensi(absensi_tanggal, absensi_status, pegawai_id) VALUES ('$tanggal', '$status', '$pegawai_id')");
      		return $hsl;
		}

		function updateAbsensi($absensi_id, $absensi_status){
			$hsl = $this->db->query("UPDATE absensi SET absensi_status = '$absensi_status' WHERE absensi_id='$absensi_id'");
      		return $hsl;
		}

		function hapusAbsensi($id){
			$hsl = $this->db->query("DELETE FROM absensi WHERE absensi_id='$id'");
     	 	return $hsl;
		}

		function hapusAbsensibyTanggal($tanggal){
			$hsl = $this->db->query("DELETE FROM absensi WHERE absensi_tanggal='$tanggal'");
     	 	return $hsl;
		}

		function hapusAll(){
			$hsl = $this->db->query("DELETE FROM absensi");
     	 	return $hsl;
		}
	}
?>