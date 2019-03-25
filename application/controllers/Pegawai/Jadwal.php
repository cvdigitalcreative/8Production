<?php 
	/**
	 * 
	 */
	class Jadwal extends CI_Controller
	{
		
		function __construct(){
	        parent:: __construct();
	        if($this->session->userdata('masuk') !=TRUE){
	            $url=base_url('Pegawai/Login_Pegawai');
	            redirect($url);
	        };

	        $this->load->library('MyPHPMailer');
	        $this->load->model("m_pemesanan");
    	}

    	function index(){

    		$y['title'] = 'Jadwal Pegawai';
    		$id = $this->session->userdata('id');
    		$x['jadwal'] = $this->m_pemesanan->getJadwalByUser($id);
    		$this->load->view('pegawai/v_header',$y);
    		$this->load->view('pegawai/v_sidebar');
    		$this->load->view('pegawai/v_lihat_jadwal',$x);
    	}

    	function Terima($konfirmasi_id){
    		$user_id = $this->session->userdata('id');
    		$user_email = $this->session->userdata('email');
    		$pemesanan_id = $this->uri->segment(5);
    		$spesialis_kw = $this->uri->segment(6);
    		$data = $this->m_pemesanan->getJadwalByUser($user_id);
    		$z = $data->row_array();
    		$nama_pemesanan = $z['pemesanan_nama'];
    		$user_nama= $this->session->userdata('nama');
    		$spesialis = str_replace("%20", " ", $spesialis_kw);

    		$fromEmail = "muhammadpuji63@gmail.com";
	        $isiEmail = "Hello Saya ".$user_nama." spesialis ".$spesialis." sudah menerima pekerjaan atas nama pemesan ".$nama_pemesanan;
	        $mail = new PHPMailer();
	        $mail->IsHTML(true);    // set email format to HTML
	        $mail->IsSMTP();   // we are going to use SMTP
	        $mail->SMTPAuth   = true; // enabled SMTP authentication
	        $mail->SMTPSecure = "ssl";  // prefix for secure protocol to connect to the server
	        $mail->Host       = "smtp.gmail.com";      // setting GMail as our SMTP server
	        $mail->Port       = 465;                   // SMTP port to connect to GMail
	        $mail->Username   = $fromEmail;  // alamat email kamu
	        $mail->Password   = "Puji1010101010";            // password GMail
	        $mail->SetFrom($user_email, $user_nama);  //Siapa yg mengirim email
	        $mail->Subject    = "Konfirmasi Pekerjaan Pegawai";
	        $mail->Body       = $isiEmail;
	        $toEmail = "muhammadpuji63@gmail.com"; // siapa yg menerima email ini
	        $mail->AddAddress($toEmail);
       
	        if(!$mail->Send()) {
	            echo "Eror: ".$mail->ErrorInfo;
	        } else {
	            $this->m_pemesanan->UpdateStatusKonfirmasi($konfirmasi_id, $pemesanan_id ,$user_id ,$spesialis);
	    		echo $this->session->set_flashdata('msg','success');
	            redirect('Pegawai/Jadwal');
	        }
    	}

    	function Tidak_Terima($konfirmasi_id){
    		$user_id = $this->session->userdata('id');
    		$user_email = $this->session->userdata('email');
    		$pemesanan_id = $this->uri->segment(5);
    		$user_spesialis = $this->session->userdata('spesialis');
    		$data = $this->m_pemesanan->getJadwalByUser($user_id);
    		$z = $data->row_array();
    		$nama_pemesanan = $z['pemesanan_nama'];
    		$user_nama= $this->session->userdata('nama');

    		$fromEmail = "muhammadpuji63@gmail.com";
	        $isiEmail = "Hello Saya ".$user_nama." spesialis ".$user_spesialis." tidak bisa menerima pekerjaan atas nama pemesan ".$nama_pemesanan;
	        $mail = new PHPMailer();
	        $mail->IsHTML(true);    // set email format to HTML
	        $mail->IsSMTP();   // we are going to use SMTP
	        $mail->SMTPAuth   = true; // enabled SMTP authentication
	        $mail->SMTPSecure = "ssl";  // prefix for secure protocol to connect to the server
	        $mail->Host       = "smtp.gmail.com";      // setting GMail as our SMTP server
	        $mail->Port       = 465;                   // SMTP port to connect to GMail
	        $mail->Username   = $fromEmail;  // alamat email kamu
	        $mail->Password   = "Puji1010101010";            // password GMail
	        $mail->SetFrom($user_email, $user_nama);  //Siapa yg mengirim email
	        $mail->Subject    = "Konfirmasi Pekerjaan Pegawai";
	        $mail->Body       = $isiEmail;
	        $toEmail = "muhammadpuji63@gmail.com"; // siapa yg menerima email ini
	        $mail->AddAddress($toEmail);
       
	        if(!$mail->Send()) {
	            echo "Eror: ".$mail->ErrorInfo;
	        } else {
	            $this->m_pemesanan->HapusPekerjaan($konfirmasi_id,$spesialis,$pemesanan_id);
	    		echo $this->session->set_flashdata('msg','warning');
	            redirect('Pegawai/Jadwal');
	        }
    	}
	}
?>