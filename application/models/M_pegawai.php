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
			date_default_timezone_set('Asia/Jakarta');
			$date = date("Y-m-d");	
			$hsl = $this->db->query("SELECT * FROM absensi WHERE absensi_tanggal= '$date' ");
	      	return $hsl;	
		}
		

		function saveAbsensi(){
			$hsl = $this->db->query("INSERT INTO pegawai(pegawai_nama, pegawai_spesialis, pegawai_nohp, pegawai_email, pegawai_alamat, pegawai_username, pegawai_password, pegawai_foto) VALUES ('$nama_pegawai', '$spesialis', '$nohp', '$email', '$alamat', '$username', '$password', '$foto')");
      		return $hsl;
		}	
	}
?>