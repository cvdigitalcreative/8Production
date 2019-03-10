<?php
/**
 *
 */
class Paket extends CI_Controller
{

  function __construct()
  {
        parent:: __construct();
        if($this->session->userdata('masuk') !=TRUE){
            $url=base_url('Login');
            redirect($url);
        };

    }

    function Kategori(){
      $y['title'] = 'Kategori Paket';
      $this->load->view('v_header',$y);
      $this->load->view('admin/v_sidebar');
      $this->load->view('admin/v_kategori');
    }
}
?>
