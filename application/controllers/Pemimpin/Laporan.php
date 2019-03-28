<?php
	
	/**
	 * 
	 */
	class Laporan extends CI_Controller
	{
		
		function __construct(){
	        parent:: __construct();

	        $this->load->model('m_pemesanan');
	        $this->load->model('m_agenda');
    	}

    	function index(){
    		if($this->session->userdata('akses') == 1 && $this->session->userdata('masuk') == true){
		       $y['title'] = 'Laporan Keuangan';
		       $x['keuangan'] = $this->m_pemesanan->getLaporanKeuangan();
    			$s = $this->m_pemesanan->sumUangLaporan()->row_array();
    			$x['jumlah'] = $s['jumlah'];
		       $this->load->view('v_header',$y);
		       $this->load->view('pemimpin/v_sidebar');
		       $this->load->view('pemimpin/v_laporan_keuangan',$x);
		    }
		    else{
		       redirect('Login');
		    }
    	}

    	function agenda(){
    		if($this->session->userdata('akses') == 1 && $this->session->userdata('masuk') == true){
		       $y['title'] = 'Laporan Keuangan';
		       $x['agenda'] = $this->m_pemesanan->getAllAgenda();
		       $this->load->view('v_header',$y);
		       $this->load->view('pemimpin/v_sidebar');
		       $this->load->view('pemimpin/v_laporan_keuangan',$x);
		    }
		    else{
		       redirect('Login');
		    }
    	}
	}
?>