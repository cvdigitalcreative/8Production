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
	        $this->load->model('m_login');
    	}

    	function index(){
    		$y['title'] = 'Pemesanan Paket';
			$this->load->view('v_header',$y);
			$this->load->view('admin/v_sidebar');
			$this->load->view('admin/v_pemesanan');
    	}
	}
?>