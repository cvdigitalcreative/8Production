<?php 
	
	/**
	 * 
	 */
	class Home extends CI_Controller
	{
		function __construct(){
			parent::__construct();
			
		}
		
		public function index(){

			$y['title'] = '8Production Film';
			$this->load->view('user/v_header.php',$y);
			$this->load->view('user/v_home.php');
			$this->load->view('user/v_footer.php');
		}
	}
	
?>