<?php 
	
	/**
	 * 
	 */
	class Pemesanan extends CI_Controller
	{
		
		function __construct()
		{
	        parent:: __construct();
	        if($this->session->userdata('masuk') !=TRUE){
	            $url=base_url('Login');
	            redirect($url);
	        };
	        $this->load->library('MyPHPMailer');
	        $this->load->model('m_pemesanan');
	        $this->load->model('m_pegawai');
    	}

    	function index(){
    		if($this->session->userdata('akses') == 2 && $this->session->userdata('masuk') == true){
	    		$y['title'] = 'Pemesanan Paket';
	    		$x['pemesanan'] = $this->m_pemesanan->getAllPemesanan();
	    		$x['videografer'] = $this->m_pegawai->getPegawaiBySpesialis('Videografer');
	    		$x['fotografer'] = $this->m_pegawai->getPegawaiBySpesialis('Fotografer');
	    		$x['pilot_drone'] = $this->m_pegawai->getPegawaiBySpesialis('Pilot Drone');
	    		$x['backup_data'] = $this->m_pegawai->getPegawaiBySpesialis('Backup Data');
	    		$x['koordinator_tim'] = $this->m_pegawai->getPegawaiBySpesialis('Koordinator Tim');
	    		$x['editing'] = $this->m_pegawai->getPegawaiBySpesialis('Editing');
				$this->load->view('v_header',$y);
				$this->load->view('admin/v_sidebar');
				$this->load->view('admin/v_pemesanan',$x);
			}else{
				redirect('Login');
			}
    	}

    	function update_pemesanan(){
    		$pemesanan_id = $this->input->post('kode');
    		$nama = $this->input->post('nama');
			$nohp = $this->input->post('nohp');
			$emailpemesanan = $this->input->post('emailpemesanan');
			$alamat = $this->input->post('alamat');
			$tglawal = $this->input->post('tglawal');
			$tglakhir = $this->input->post('tglakhir');

			$this->m_pemesanan->updatePemesanan($pemesanan_id, $nama, $nohp, $emailpemesanan, $alamat, $tglawal, $tglakhir);
			echo $this->session->set_flashdata('msg','success');
			redirect('Admin/Pemesanan');
    	}

    	function hapus_pemesanan(){
    		$id = $this->input->post('kode');

		    $this->m_pemesanan->hapusPemesanan($id);
		    echo $this->session->set_flashdata('msg','hapus');
		    redirect('Admin/Pemesanan');
    	}

    	function Konfirmasi(){
    		$id = $this->input->post('kode');

    		$this->m_pemesanan->ubahStatus($id);
		    echo $this->session->set_flashdata('msg','info');
		    redirect('Admin/Pemesanan');
    	}

    	function pilih_pegawai(){
    		$pemesanan_id = $this->input->post('id');
    		//send to videograder
    		$videografer = $this->input->post('videografer');
    		$data1 = $this->m_pemesanan->getPemesananById($pemesanan_id);
    		$g = $data1->row_array();
    		$s_videografer = $g['s_videografer'];
    		$s_fotografer = $g['s_fotografer'];
    		$s_pilot_drone = $g['s_pilot_drone'];
    		$s_backup_data = $g['s_backup_data'];
    		$s_koordinator_tim = $g['s_koordinator_tim'];
    		$s_editing = $g['s_editing'];

    		$data = $this->m_pegawai->getPegawaiById($videografer);
    		$a = $data->row_array();
    		$email_videografer = $a['pegawai_email'];
    		if($videografer == 0 || !empty($s_videografer)){

    		}else{
    			$fromEmail = "muhammadpuji63@gmail.com";
		        $isiEmail = "Hello Saya admin anda sudah mendapatkan pekerjaan segera buka akun anda dan konfirmasi pekerjaan";
		        $mail = new PHPMailer();
		        $mail->IsHTML(true);    // set email format to HTML
		        $mail->IsSMTP();   // we are going to use SMTP
		        $mail->SMTPAuth   = true; // enabled SMTP authentication
		        $mail->SMTPSecure = "ssl";  // prefix for secure protocol to connect to the server
		        $mail->Host       = "smtp.gmail.com";      // setting GMail as our SMTP server
		        $mail->Port       = 465;                   // SMTP port to connect to GMail
		        $mail->Username   = $fromEmail;  // alamat email kamu
		        $mail->Password   = "Puji1010101010";            // password GMail
		        $mail->SetFrom($fromEmail, "Admin");  //Siapa yg mengirim email
		        $mail->Subject    = "Mendapatakan pekerjaan videografer";
		        $mail->Body       = $isiEmail;
		        $toEmail = $email_videografer; // siapa yg menerima email ini
		        $mail->AddAddress($toEmail);
	       		$mail->Send();
	       		$this->m_pemesanan->savePegawaivideografer($pemesanan_id,$videografer);
    		}


			$fotografer = $this->input->post('fotografer');
			$data = $this->m_pegawai->getPegawaiById($fotografer);
    		$b = $data->row_array();
    		$email_fotografer = $b['pegawai_email'];
    		if($fotografer == 0 || !empty($s_fotografer)){

    		}else{
    			$fromEmail = "muhammadpuji63@gmail.com";
		        $isiEmail = "Hello Saya admin anda sudah mendapatkan pekerjaan segera buka akun anda dan konfirmasi pekerjaan";
		        $mail = new PHPMailer();
		        $mail->IsHTML(true);    // set email format to HTML
		        $mail->IsSMTP();   // we are going to use SMTP
		        $mail->SMTPAuth   = true; // enabled SMTP authentication
		        $mail->SMTPSecure = "ssl";  // prefix for secure protocol to connect to the server
		        $mail->Host       = "smtp.gmail.com";      // setting GMail as our SMTP server
		        $mail->Port       = 465;                   // SMTP port to connect to GMail
		        $mail->Username   = $fromEmail;  // alamat email kamu
		        $mail->Password   = "Puji1010101010";            // password GMail
		        $mail->SetFrom($fromEmail, "Admin");  //Siapa yg mengirim email
		        $mail->Subject    = "Mendapatakan pekerjaan fotografer";
		        $mail->Body       = $isiEmail;
		        $toEmail = $email_fotografer; // siapa yg menerima email ini
		        $mail->AddAddress($toEmail);
	       		$mail->Send();
	       		$this->m_pemesanan->savePegawaifotografer($pemesanan_id,$fotografer);
    		}

			$pilot_drone = $this->input->post('pilot_drone');
			$data = $this->m_pegawai->getPegawaiById($pilot_drone);
    		$c = $data->row_array();
    		$email_pilot_drone = $c['pegawai_email'];
    		if($pilot_drone == 0 || !empty($s_pilot_drone)){

    		}else{
    			$fromEmail = "muhammadpuji63@gmail.com";
		        $isiEmail = "Hello Saya admin anda sudah mendapatkan pekerjaan segera buka akun anda dan konfirmasi pekerjaan";
		        $mail = new PHPMailer();
		        $mail->IsHTML(true);    // set email format to HTML
		        $mail->IsSMTP();   // we are going to use SMTP
		        $mail->SMTPAuth   = true; // enabled SMTP authentication
		        $mail->SMTPSecure = "ssl";  // prefix for secure protocol to connect to the server
		        $mail->Host       = "smtp.gmail.com";      // setting GMail as our SMTP server
		        $mail->Port       = 465;                   // SMTP port to connect to GMail
		        $mail->Username   = $fromEmail;  // alamat email kamu
		        $mail->Password   = "Puji1010101010";            // password GMail
		        $mail->SetFrom($fromEmail, "Admin");  //Siapa yg mengirim email
		        $mail->Subject    = "Mendapatakan pekerjaan pilot drone";
		        $mail->Body       = $isiEmail;
		        $toEmail = $email_pilot_drone; // siapa yg menerima email ini
		        $mail->AddAddress($toEmail);
	       		$mail->Send();
	       		$this->m_pemesanan->savePegawaipilot_drone($pemesanan_id,$pilot_drone);
    		}

			$backup_data = $this->input->post('backup_data');
			$data = $this->m_pegawai->getPegawaiById($backup_data);
    		$d = $data->row_array();
    		$email_backup_data = $d['pegawai_email'];
    		if($backup_data == 0 || !empty($s_backup_data)){

    		}else{
    			$fromEmail = "muhammadpuji63@gmail.com";
		        $isiEmail = "Hello Saya admin anda sudah mendapatkan pekerjaan segera buka akun anda dan konfirmasi pekerjaan";
		        $mail = new PHPMailer();
		        $mail->IsHTML(true);    // set email format to HTML
		        $mail->IsSMTP();   // we are going to use SMTP
		        $mail->SMTPAuth   = true; // enabled SMTP authentication
		        $mail->SMTPSecure = "ssl";  // prefix for secure protocol to connect to the server
		        $mail->Host       = "smtp.gmail.com";      // setting GMail as our SMTP server
		        $mail->Port       = 465;                   // SMTP port to connect to GMail
		        $mail->Username   = $fromEmail;  // alamat email kamu
		        $mail->Password   = "Puji1010101010";            // password GMail
		        $mail->SetFrom($fromEmail, "Admin");  //Siapa yg mengirim email
		        $mail->Subject    = "Mendapatakan pekerjaan backup data";
		        $mail->Body       = $isiEmail;
		        $toEmail = $email_backup_data; // siapa yg menerima email ini
		        $mail->AddAddress($toEmail);
	       		$mail->Send();
	       		$this->m_pemesanan->savePegawaibackup_data($pemesanan_id,$backup_data);
    		}

			$koordinator_tim = $this->input->post('koordinator_tim');
			$data = $this->m_pegawai->getPegawaiById($koordinator_tim);
    		$e = $data->row_array();
    		$email_koordinator_tim = $e['pegawai_email'];
    		if($koordinator_tim == 0 || !empty($s_koordinator_tim)){

    		}else{
    			$fromEmail = "muhammadpuji63@gmail.com";
		        $isiEmail = "Hello Saya admin anda sudah mendapatkan pekerjaan segera buka akun anda dan konfirmasi pekerjaan";
		        $mail = new PHPMailer();
		        $mail->IsHTML(true);    // set email format to HTML
		        $mail->IsSMTP();   // we are going to use SMTP
		        $mail->SMTPAuth   = true; // enabled SMTP authentication
		        $mail->SMTPSecure = "ssl";  // prefix for secure protocol to connect to the server
		        $mail->Host       = "smtp.gmail.com";      // setting GMail as our SMTP server
		        $mail->Port       = 465;                   // SMTP port to connect to GMail
		        $mail->Username   = $fromEmail;  // alamat email kamu
		        $mail->Password   = "Puji1010101010";            // password GMail
		        $mail->SetFrom($fromEmail, "Admin");  //Siapa yg mengirim email
		        $mail->Subject    = "Mendapatakan pekerjaan koordinator tim";
		        $mail->Body       = $isiEmail;
		        $toEmail = $email_koordinator_tim; // siapa yg menerima email ini
		        $mail->AddAddress($toEmail);
	       		$mail->Send();
	       		$this->m_pemesanan->savePegawaikoordinator_tim($pemesanan_id,$koordinator_tim);
    		}

			$editing = $this->input->post('editing');
			$data = $this->m_pegawai->getPegawaiById($editing);
    		$f = $data->row_array();
    		$email_editing = $f['pegawai_email'];
    		if($editing == 0 || !empty($s_editing)){

    		}else{
    			$fromEmail = "muhammadpuji63@gmail.com";
		        $isiEmail = "Hello Saya admin anda sudah mendapatkan pekerjaan segera buka akun anda dan konfirmasi pekerjaan";
		        $mail = new PHPMailer();
		        $mail->IsHTML(true);    // set email format to HTML
		        $mail->IsSMTP();   // we are going to use SMTP
		        $mail->SMTPAuth   = true; // enabled SMTP authentication
		        $mail->SMTPSecure = "ssl";  // prefix for secure protocol to connect to the server
		        $mail->Host       = "smtp.gmail.com";      // setting GMail as our SMTP server
		        $mail->Port       = 465;                   // SMTP port to connect to GMail
		        $mail->Username   = $fromEmail;  // alamat email kamu
		        $mail->Password   = "Puji1010101010";            // password GMail
		        $mail->SetFrom($fromEmail, "Admin");  //Siapa yg mengirim email
		        $mail->Subject    = "Mendapatakan pekerjaan editing";
		        $mail->Body       = $isiEmail;
		        $toEmail = $email_editing; // siapa yg menerima email ini
		        $mail->AddAddress($toEmail);
	       		$mail->Send();
	       		$this->m_pemesanan->savePegawaiediting($pemesanan_id,$editing);
    		}
    		
			echo $this->session->set_flashdata('msg','success');
			redirect('Admin/Pemesanan');
    	}

    	function transaksi($pemesanan_id){
    		if($this->session->userdata('akses') == 2 && $this->session->userdata('masuk') == true){
    			$y['title'] = "Transaksi";
    			$x['pemesanan_id'] = $pemesanan_id;
    			$x['transaksi'] = $this->m_pemesanan->getTransaksiByPemesanan($pemesanan_id);
    			$s = $this->m_pemesanan->sumUang($pemesanan_id)->row_array();
    			$x['jumlah'] = $s['jumlah'];
    			$this->load->view('v_header',$y);
				$this->load->view('admin/v_sidebar');
				$this->load->view('admin/v_transaksi',$x);
    		}else{
				redirect('Login');
			}
    	}

    	function save_transaksi(){
    		$id = $this->input->post('pemesanan_id');
    		$harga = $this->input->post('duit');
			$keterangan = $this->input->post('keterangan');

			$this->m_pemesanan->saveTransaksi($harga,$keterangan,$id);
			echo $this->session->set_flashdata('msg','success');
			redirect("Admin/Pemesanan/transaksi/$id");
    	}

    	function update_transaksi(){
    		$transaksi_id = $this->input->post('transaksi_id');
    		$pemesanan_id = $this->input->post('pemesanan_id');
    		$harga = $this->input->post('duit');
			$keterangan = $this->input->post('keterangan');

			$this->m_pemesanan->updateTransaksi($transaksi_id,$harga,$keterangan);
			echo $this->session->set_flashdata('msg','success');
			redirect("Admin/Pemesanan/transaksi/$pemesanan_id");
    	}

    	function hapus_transaksi(){
    		$transaksi_id = $this->input->post('kode');
    		$pemesanan_id = $this->input->post('pemesanan_id');

			$this->m_pemesanan->hapusTransaksi($transaksi_id);
			echo $this->session->set_flashdata('msg','hapus');
			redirect("Admin/Pemesanan/transaksi/$pemesanan_id");
    	}
	}
?>