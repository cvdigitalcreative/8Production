<?php 
	/**
	 * 
	 */
	class Agenda extends CI_Controller
	{
		
		function __construct()
	  	{
		    parent:: __construct();
		    if($this->session->userdata('masuk') !=TRUE){
		      $url=base_url('Login');
		      redirect($url);
		    };

		    $this->load->model('m_agenda');
	  	}

	  	function index(){
	  		if($this->session->userdata('akses') == 2 && $this->session->userdata('masuk') == true){
		       $y['title'] = 'Agenda';
		       $x['agenda'] = $this->m_agenda->getAllAgenda();
		       $this->load->view('v_header',$y);
		       $this->load->view('admin/v_sidebar');
		       $this->load->view('admin/v_agenda',$x);
		    }
		    else{
		       redirect('Login');
		    }
	  	}

	  	function save_agenda(){
	  		$tanggal = $this->input->post('tanggal');
	  		$pembahasan = $this->input->post('pembahasan');

	  		$this->m_agenda->saveAgenda($tanggal,$pembahasan);
            echo $this->session->set_flashdata('msg','success');
            redirect('Admin/Agenda');
	  	}

	  	function update_agenda(){
	  		$id = $this->input->post('kode');
	  		$tanggal = $this->input->post('tanggal');
	  		$pembahasan = $this->input->post('pembahasan');

	  		$this->m_agenda->updateAgenda($id,$tanggal,$pembahasan);
            echo $this->session->set_flashdata('msg','warning');
            redirect('Admin/Agenda');
	  	}

	  	function hapus_agenda(){
	  		$id = $this->input->post('kode');

	  		$this->m_agenda->hapusAgenda($id);
            echo $this->session->set_flashdata('msg','hapus');
            redirect('Admin/Agenda');
	  	}
	}
?>