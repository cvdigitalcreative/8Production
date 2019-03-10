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

    $this->load->model('m_paket');
  }
// Paket
    function index(){
      if($this->session->userdata('akses') == 2 && $this->session->userdata('masuk') == true){
        $y['title'] = 'Paket';
        $x['paket'] = $this->m_paket->getPaket();
        $x['kategori'] = $this->m_paket->getKategori();
        $this->load->view('v_header',$y);
        $this->load->view('admin/v_sidebar');
        $this->load->view('admin/v_paket',$x);
      }
      else{
        redirect('Login');
      }
    }

    function save_paket(){
      $nama_paket = $this->input->post('nama_paket');
      $harga_paket = $this->input->post('harga_paket');
      $kategori = $this->input->post('kategori');
      $deskripsi_paket = $this->input->post('deskripsi_paket');

      $this->m_paket->savePaket($nama_paket,$harga_paket,$kategori,$deskripsi_paket);
      echo $this->session->set_flashdata('msg','success');
      redirect('Admin/Paket');
    }


// Kategori Paket Controller
    function Kategori(){
      if($this->session->userdata('akses') == 2 && $this->session->userdata('masuk') == true){
        $y['title'] = 'Kategori Paket';
        $x['Kategori'] = $this->m_paket->getKategori();
        $this->load->view('v_header',$y);
        $this->load->view('admin/v_sidebar');
        $this->load->view('admin/v_kategori',$x);
      }
      else{
        redirect('Login');
      }
    }

    function save_kategori(){
      $nama_kategori = $this->input->post('kategori');

      $this->m_paket->saveKategori($nama_kategori);
      echo $this->session->set_flashdata('msg','success');
      redirect('Admin/Paket/Kategori');
    }

    function update_kategori(){
      $id = $this->input->post('id');
      $nama_kategori = $this->input->post('kategori');

      $this->m_paket->updateKategori($id,$nama_kategori);
      echo $this->session->set_flashdata('msg','Hapus');
      redirect('Admin/Paket/Kategori');
    }

    function hapus_kategori(){
      $id = $this->input->post('id');

      $this->m_paket->hapusKategori($id);
      echo $this->session->set_flashdata('msg','Hapus');
      redirect('Admin/Paket/Kategori');
    }
}
?>
