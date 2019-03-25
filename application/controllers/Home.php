<?php 
	
	/**
	 * 
	 */
	class Home extends CI_Controller
	{
		function __construct(){
			parent::__construct();
			
			$this->load->library('MyPHPMailer');
			$this->load->model('m_paket');
			$this->load->model('m_pemesanan');
		}
		
		public function index(){

			$y['title'] = '8Production Film';
			$x['wedding'] = $this->m_paket->getPaketbyKategori(1);
			$x['event'] = $this->m_paket->getPaketbyKategori(2);
			$x['film_pendek'] = $this->m_paket->getPaketbyKategori(3);
			$this->load->view('user/v_header.php',$y);
			$this->load->view('user/v_home.php',$x);
			$this->load->view('user/v_footer.php');
		}

		public function Detail($id){
			$y['title'] = 'Paket Detail';
			$x['paket'] = $this->m_paket->getPaketbyID($id);
			$this->load->view('user/v_header.php',$y);
			$this->load->view('user/v_paket_detail.php',$x);
			$this->load->view('user/v_footer.php');
		}

		public function order_complete(){
			$y['title'] = 'Pemesanan Selesai';
			$this->load->view('user/v_header.php',$y);
			$this->load->view('user/v_order_complete.php');
			$this->load->view('user/v_footer.php');
		}

		public function video(){
			$y['title'] = 'Video ';
			$this->load->view('user/v_header.php',$y);
			$this->load->view('user/v_video.php');
			$this->load->view('user/v_footer.php');
		}

		//Pemesanan
		public function pesan(){
			$nama = $this->input->post('nama');
			$nohp = $this->input->post('nohp');
			$emailpemesanan = $this->input->post('emailpemesanan');
			$alamat = $this->input->post('alamat');
			$tglawal = $this->input->post('tglawal');
			$tglakhir = $this->input->post('tglakhir');
			$paket_id = $this->input->post('paket_id');
			$status = 0;

	        $fromEmail = "muhammadpuji63@gmail.com";
	        $isiEmail = "Hello Saya ".$nama." ingin melakukan pemesanan, Segera hubungi saya ".$nohp. " dan alamat email saya " .$emailpemesanan;
	        $mail = new PHPMailer();
	        $mail->IsHTML(true);    // set email format to HTML
	        $mail->IsSMTP();   // we are going to use SMTP
	        $mail->SMTPAuth   = true; // enabled SMTP authentication
	        $mail->SMTPSecure = "ssl";  // prefix for secure protocol to connect to the server
	        $mail->Host       = "smtp.gmail.com";      // setting GMail as our SMTP server
	        $mail->Port       = 465;                   // SMTP port to connect to GMail
	        $mail->Username   = $fromEmail;  // alamat email kamu
	        $mail->Password   = "Puji1010101010";            // password GMail
	        $mail->SetFrom($emailpemesanan, $nama);  //Siapa yg mengirim email
	        $mail->Subject    = "pemesanan";
	        $mail->Body       = $isiEmail;
	        $toEmail = "muhammadpuji63@gmail.com"; // siapa yg menerima email ini
	        $mail->AddAddress($toEmail);
       
	        if(!$mail->Send()) {
	            echo "Eror: ".$mail->ErrorInfo;
	        } else {
	            $this->m_pemesanan->savePemesanan($nama, $nohp, $emailpemesanan, $alamat, $tglawal, $tglakhir, $paket_id, $status);
				redirect('Home/order_complete');
	        }

			
		}
	}
	
?>