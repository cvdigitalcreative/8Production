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
    $this->load->library('upload');
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
      $config['upload_path'] = './assets/images/'; //path folder
              $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp';
              $config['max_size']             = 0; //type yang dapat diakses bisa anda sesuaikan
              // $config['encrypt_name'] = TRUE; //nama yang terupload nantinya

              $this->upload->initialize($config);
              if(!empty($_FILES['filefoto']['name']))
              {
                  if ($this->upload->do_upload('filefoto'))
                  {
                          $gbr = $this->upload->data();
                          //Compress Image
                          $config['image_library']='gd2';
                          $config['source_image']='./assets/images/'.$gbr['file_name'];
                          $config['create_thumb']= FALSE;
                          $config['maintain_ratio']= FALSE;
                          $config['quality']= '100%';
                          // $config['width']= 917;
                          // $config['height']= 719;
                          $config['new_image']= './arssets/images/'.$gbr['file_name'];
                          $this->load->library('image_lib', $config);
                          $this->image_lib->resize();

                          $gambar=$gbr['file_name'];
                          $nama_paket = $this->input->post('nama_paket');
                          $harga = $this->input->post('harga_paket');
                          $harga_paket=str_replace(".", "", $harga);
                          $kategori = $this->input->post('kategori');
                          $deskripsi_paket = $this->input->post('deskripsi_paket');

                          $this->m_paket->savePaket($nama_paket,$harga_paket,$kategori,$deskripsi_paket,$gambar);
                          echo $this->session->set_flashdata('msg','success');
                          redirect('Admin/Paket');
                          
                      
                  }else{
                      echo $this->session->set_flashdata('msg','warning');
                      redirect('Admin/Paket');
                  }
              }

    }

    function vUpdate_Paket($id){
      if($this->session->userdata('akses') == 2 && $this->session->userdata('masuk') == true){
        $y['title'] = 'Update Paket';
        $x['id'] = $id;
        $x['paket'] = $this->m_paket->getPaketbyID($id);
        $x['kategori'] = $this->m_paket->getKategori();
        $this->load->view('v_header',$y);
        $this->load->view('admin/v_sidebar');
        $this->load->view('admin/v_update_paket',$x);
      }
      else{
        redirect('Login');
      }
    }

    function update_paket(){

              $config['upload_path'] = './assets/images/'; //path folder
              $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp';
              $config['max_size']             = 0; //type yang dapat diakses bisa anda sesuaikan
              // $config['encrypt_name'] = TRUE; //nama yang terupload nantinya

              $this->upload->initialize($config);
              if(!empty($_FILES['filefoto']['name']))
              {
                  if ($this->upload->do_upload('filefoto'))
                  {
                          $gbr = $this->upload->data();
                          //Compress Image
                          $config['image_library']='gd2';
                          $config['source_image']='./assets/images/'.$gbr['file_name'];
                          $config['create_thumb']= FALSE;
                          $config['maintain_ratio']= FALSE;
                          $config['quality']= '100%';
                          // $config['width']= 917;
                          // $config['height']= 719;
                          $config['new_image']= './assets/images/'.$gbr['file_name'];
                          $this->load->library('image_lib', $config);
                          $this->image_lib->resize();

                          $gambar=$gbr['file_name'];
                          $nama_paket = $this->input->post('nama_paket');
                          $harga = $this->input->post('harga_paket');
                          $harga_paket=str_replace(".", "", $harga);
                          $kategori = $this->input->post('kategori');
                          $images=$this->input->post('gambar');
                          $path='./assets/images/'.$images;
                          unlink($path);
                          $deskripsi_paket = $this->input->post('deskripsi_paket');
                          $id = $this->input->post('id');

                          $this->m_paket->updatePaket($id,$nama_paket,$harga_paket,$kategori,$deskripsi_paket,$gambar);
                          echo $this->session->set_flashdata('msg','success');
                          redirect('Admin/Paket');
                      
                  }else{
                      echo $this->session->set_flashdata('msg','warning');
                      redirect('Admin/Paket');
                  }
                  
              }else{
                $nama_paket = $this->input->post('nama_paket');
                $harga = $this->input->post('harga_paket');
                $harga_paket=str_replace(".", "", $harga);
                $kategori = $this->input->post('kategori');
                $deskripsi_paket = $this->input->post('deskripsi_paket');
                $id = $this->input->post('id');

                $this->m_paket->updatePaketNoGambar($id,$nama_paket,$harga_paket,$kategori,$deskripsi_paket);
                echo $this->session->set_flashdata('msg','success');
                redirect('Admin/Paket');
              } 
      
    }

    function hapus_paket(){
      $id = $this->input->post('id');
      $images=$this->input->post('gambar');
      $path='./assets/images/'.$images;
      unlink($path);

      $this->m_paket->hapusPaket($id);
      echo $this->session->set_flashdata('msg','Hapus');
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
