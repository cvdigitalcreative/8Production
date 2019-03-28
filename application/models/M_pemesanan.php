<?php

/**
 *
 */
class M_pemesanan extends CI_Model
{
	function savePemesanan($nama, $nohp, $email, $alamat, $tglawal, $tglakhir, $paket_id, $status){
        date_default_timezone_set("Asia/Jakarta");
        $cur_date = date("Y-m-d");
		$hsl = $this->db->query("INSERT INTO pemesanan(pemesanan_nama, pemesanan_nohp, pemesanan_email, pemesanan_alamat,pemesanan_tanggal, pemesanan_tglawal, pemesanan_tglakhir, paket_id, pemesanan_status) VALUES ('$nama', '$nohp', '$email', '$alamat', '$cur_date','$tglawal', '$tglakhir', '$paket_id', '$status')");
      	return $hsl;
	}

	function updatePemesanan($id, $nama, $nohp, $email, $alamat, $tanggalawal, $tanggalakhir){
		$hsl = $this->db->query("UPDATE pemesanan SET pemesanan_nama='$nama', pemesanan_nohp='$nohp', pemesanan_email='$email', pemesanan_alamat = '$alamat', pemesanan_tglawal = '$tanggalawal', pemesanan_tglakhir = '$tanggalakhir'  WHERE pemesanan_id='$id'");
      	return $hsl;
	}

	function hapusPemesanan($id){
		$hsl = $this->db->query("DELETE FROM pemesanan WHERE pemesanan_id='$id'");
     	return $hsl;
	}

	function ubahStatus($id){
		$hsl = $this->db->query("UPDATE pemesanan SET pemesanan_status = 1 WHERE pemesanan_id='$id'");
     	return $hsl;
	}

	function getAllPemesanan(){
		$hsl = $this->db->query("SELECT a.pemesanan_id, a.pemesanan_nama,a.pemesanan_email,a.pemesanan_alamat,a.pemesanan_nohp,DATE_FORMAT(a.pemesanan_tglawal,'%d/%m/%Y') AS tglawal,DATE_FORMAT(a.pemesanan_tglakhir,'%d/%m/%Y') AS tglakhir,a.pemesanan_status,a.s_videografer,a.s_fotografer,a.s_pilot_drone,a.s_backup_data,a.s_koordinator_tim,a.s_editing,b.paket_id,b.paket_nama FROM pemesanan a, paket b WHERE a.paket_id = b.paket_id");
      	return $hsl;
	}

	function getPemesananById($pemesanan_id){
		$hsl = $this->db->query("SELECT a.pemesanan_id, a.pemesanan_nama,a.pemesanan_email,a.pemesanan_alamat,a.pemesanan_nohp,DATE_FORMAT(a.pemesanan_tglawal,'%d/%m/%Y') AS tglawal,DATE_FORMAT(a.pemesanan_tglakhir,'%d/%m/%Y') AS tglakhir,a.pemesanan_status,a.s_videografer,a.s_fotografer,a.s_pilot_drone,a.s_backup_data,a.s_koordinator_tim,a.s_editing,b.paket_id,b.paket_nama FROM pemesanan a, paket b WHERE pemesanan_id = '$pemesanan_id' AND a.paket_id = b.paket_id");
      	return $hsl;
	}


	function savePegawaivideografer($pemesanan_id,$videografer){
		$this->db->trans_start();
			$this->db->query("INSERT INTO konfirmasi_pegawai(pemesanan_id, pegawai_id) VALUES ('$pemesanan_id', '$videografer')");
			$this->db->query("UPDATE pemesanan SET s_videografer = '$videografer' WHERE pemesanan_id = '$pemesanan_id' ");
      	$this->db->trans_complete();
        if($this->db->trans_status()==true)
        return true;
        else
        return false;
	}

	function savePegawaifotografer($pemesanan_id,$fotografer){
		$this->db->trans_start();
			$this->db->query("INSERT INTO konfirmasi_pegawai(pemesanan_id, pegawai_id) VALUES ('$pemesanan_id', '$fotografer')");
			$this->db->query("UPDATE pemesanan SET s_fotografer = '$fotografer' WHERE pemesanan_id = '$pemesanan_id'");
      	$this->db->trans_complete();
        if($this->db->trans_status()==true)
        return true;
        else
        return false;
	}


	function savePegawaipilot_drone($pemesanan_id,$pilot_drone){
		$this->db->trans_start();
			$this->db->query("INSERT INTO konfirmasi_pegawai(pemesanan_id, pegawai_id) VALUES ('$pemesanan_id', '$pilot_drone')");
			$this->db->query("UPDATE pemesanan SET s_pilot_drone = '$pilot_drone' WHERE pemesanan_id = '$pemesanan_id'");
      	$this->db->trans_complete();
        if($this->db->trans_status()==true)
        return true;
        else
        return false;
	}

	function savePegawaibackup_data($pemesanan_id,$backup_data){
		$this->db->trans_start();
			$this->db->query("INSERT INTO konfirmasi_pegawai(pemesanan_id, pegawai_id) VALUES ('$pemesanan_id', '$backup_data')");
			$this->db->query("UPDATE pemesanan SET s_backup_data = '$backup_data' WHERE pemesanan_id = '$pemesanan_id'");
      	$this->db->trans_complete();
        if($this->db->trans_status()==true)
        return true;
        else
        return false;
	}

	function savePegawaikoordinator_tim($pemesanan_id,$koordinator_tim){
		$this->db->trans_start();
			$this->db->query("INSERT INTO konfirmasi_pegawai(pemesanan_id, pegawai_id) VALUES ('$pemesanan_id', '$koordinator_tim')");
			$this->db->query("UPDATE pemesanan SET s_koordinator_tim = '$koordinator_tim' WHERE pemesanan_id = '$pemesanan_id'");
      	$this->db->trans_complete();
        if($this->db->trans_status()==true)
        return true;
        else
        return false;
	}

	function savePegawaiediting($pemesanan_id,$editing){
		$this->db->trans_start();
		$hsl = $this->db->query("INSERT INTO konfirmasi_pegawai(pemesanan_id, pegawai_id) VALUES ('$pemesanan_id', '$editing')");
		$this->db->query("UPDATE pemesanan SET s_editing = '$editing' WHERE pemesanan_id = '$pemesanan_id'");
      	$this->db->trans_complete();
        if($this->db->trans_status()==true)
        return true;
        else
        return false;
	}

	function getJadwalByUser($user_id){
		$hsl = $this->db->query("SELECT a.pemesanan_id, a.pemesanan_nama,a.pemesanan_email,a.pemesanan_alamat,a.pemesanan_nohp,DATE_FORMAT(a.pemesanan_tglawal,'%d/%m/%Y') AS tglawal,DATE_FORMAT(a.pemesanan_tglakhir,'%d/%m/%Y') AS tglakhir, c.pegawai_id, c.pegawai_spesialis, c.pegawai_nama,b.konfirmasi_status,b.konfirmasi_id FROM pemesanan a, konfirmasi_pegawai b, pegawai c WHERE c.pegawai_id = '$user_id' AND a.pemesanan_id = b.pemesanan_id AND b.pegawai_id  = c.pegawai_id");
      	return $hsl;
	}

	function UpdateStatusKonfirmasi($konfirmasi_id, $pemesanan_id ,$user_id ,$jabatan){
		$this->db->trans_start();
            $this->db->query("UPDATE konfirmasi_pegawai SET konfirmasi_status = 1 WHERE konfirmasi_id = '$konfirmasi_id'");
            if($jabatan == 'Videografer'):
            	$this->db->query("UPDATE pemesanan SET s_videografer = '$user_id' WHERE pemesanan_id = '$pemesanan_id' ");
            elseif($jabatan == 'Fotografer'):
            	$this->db->query("UPDATE pemesanan SET s_fotografer = '$user_id' WHERE pemesanan_id = '$pemesanan_id'");
            elseif($jabatan == 'Pilot Drone'):
            	$this->db->query("UPDATE pemesanan SET s_pilot_drone = '$user_id' WHERE pemesanan_id = '$pemesanan_id'");
            elseif($jabatan == 'Backup Data'):
            	$this->db->query("UPDATE pemesanan SET s_backup_data = '$user_id' WHERE pemesanan_id = '$pemesanan_id'");
            elseif($jabatan == 'Koordinator Tim'):
            	$this->db->query("UPDATE pemesanan SET s_koordinator_tim = '$user_id' WHERE pemesanan_id = '$pemesanan_id'");
            elseif($jabatan == 'Editing'):
            	$this->db->query("UPDATE pemesanan SET s_editing = '$user_id' WHERE pemesanan_id = '$pemesanan_id'");
            endif;
        $this->db->trans_complete();
        if($this->db->trans_status()==true)
        return true;
        else
        return false;
	}

	function HapusPekerjaan($id,$jabatan,$pemesanan_id){
		$this->db->trans_start();
			$this->db->query("DELETE FROM konfirmasi_pegawai WHERE konfirmasi_id='$id'");
			if($jabatan == 'Videografer'):
            	$this->db->query("UPDATE pemesanan SET s_videografer = 0 WHERE pemesanan_id = '$pemesanan_id' ");
            elseif($jabatan == 'Fotografer'):
            	$this->db->query("UPDATE pemesanan SET s_fotografer = 0 WHERE pemesanan_id = '$pemesanan_id'");
            elseif($jabatan == 'Pilot Drone'):
            	$this->db->query("UPDATE pemesanan SET s_pilot_drone = 0 WHERE pemesanan_id = '$pemesanan_id'");
            elseif($jabatan == 'Backup Data'):
            	$this->db->query("UPDATE pemesanan SET s_backup_data = 0 WHERE pemesanan_id = '$pemesanan_id'");
            elseif($jabatan == 'Koordinator Tim'):
            	$this->db->query("UPDATE pemesanan SET s_koordinator_tim = 0 WHERE pemesanan_id = '$pemesanan_id'");
            elseif($jabatan == 'Editing'):
            	$this->db->query("UPDATE pemesanan SET s_editing = 0 WHERE pemesanan_id = '$pemesanan_id'");
            endif;
     	 $this->db->trans_complete();
        if($this->db->trans_status()==true)
        return true;
        else
        return false;
	}

    function getTransaksiByPemesanan($pemesanan_id){
        $hsl = $this->db->query("SELECT a.pemesanan_id, a.pemesanan_nama,a.pemesanan_email,a.pemesanan_alamat,a.pemesanan_nohp,b.transaksi_id,b.transaksi_keterangan, b.transaksi_harga,DATE_FORMAT(b.transaksi_tanggal,'%d/%m/%Y %h:%m') AS transaksi_tanggal FROM pemesanan a, transaksi b WHERE b.pemesanan_id = '$pemesanan_id' AND a.pemesanan_id = b.pemesanan_id ");
        return $hsl;
    }

    function sumUang($pemesanan_id){
        $hsl = $this->db->query("SELECT SUM(b.transaksi_harga) AS jumlah FROM pemesanan a, transaksi b WHERE b.pemesanan_id = '$pemesanan_id' AND a.pemesanan_id = b.pemesanan_id ");
        return $hsl;
    }

    function saveTransaksi($harga,$keterangan,$pemesanan_id){
        $hsl = $this->db->query("INSERT INTO transaksi(transaksi_harga,transaksi_keterangan,pemesanan_id) VALUES ('$harga','$keterangan','$pemesanan_id')");
        return $hsl;
    }

    function updateTransaksi($transaksi_id,$harga,$keterangan){
        $hsl = $this->db->query("UPDATE transaksi SET transaksi_harga='$harga', transaksi_keterangan='$keterangan' WHERE transaksi_id='$transaksi_id'");
        return $hsl;
    }

    function hapusTransaksi($transaksi_id){
        $hsl = $this->db->query("DELETE FROM transaksi WHERE transaksi_id='$transaksi_id'");
        return $hsl;
    }

    function getLaporanKeuangan(){
            $hsl = $this->db->query("SELECT a.pemesanan_id, a.pemesanan_nama, DATE_FORMAT(a.pemesanan_tanggal,'%d/%m/%Y') AS tanggal, a.pemesanan_status, b.paket_id,b.paket_nama,b.paket_harga FROM pemesanan a, paket b WHERE a.pemesanan_status = '1' AND a.paket_id = b.paket_id");
            return $hsl;
    }

    function sumUangLaporan(){
        $hsl = $this->db->query("SELECT SUM(b.paket_harga) AS jumlah FROM pemesanan a, paket b WHERE a.pemesanan_status = '1' AND a.paket_id = b.paket_id");
        return $hsl;
    }
}

?>