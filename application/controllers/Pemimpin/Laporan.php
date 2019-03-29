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
		       $y['title'] = 'Laporan Agenda';
		       $x['agenda'] = $this->m_agenda->getAllAgenda();
		       $this->load->view('v_header',$y);
		       $this->load->view('pemimpin/v_sidebar');
		       $this->load->view('pemimpin/v_laporan_agenda',$x);
		    }
		    else{
		       redirect('Login');
		    }
    	}

		function cetak_keuangan(){
			$daritanggal = $this->input->post("daritgl");
			$ketanggal = $this->input->post("ketgl");
			$x['keuangan'] = $this->m_pemesanan->getKeuanganTanggal($daritanggal,$ketanggal);
			$s = $this->m_pemesanan->sumKeuangantanggal($daritanggal,$ketanggal)->row_array();
    		$x['jumlah'] = $s['jumlah'];
			$this->load->view('pemimpin/cetak_laporan_keuangan',$x);
		}

		function cetak_agenda(){
			$daritanggal = $this->input->post("daritgl");
			$ketanggal = $this->input->post("ketgl");
			$x['agenda'] = $this->m_agenda->getAgendaTanggal($daritanggal,$ketanggal);
			$this->load->view('pemimpin/cetak_laporan_agenda',$x);
		}
	}
?>
