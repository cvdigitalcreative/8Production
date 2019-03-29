<?php
	/**
	 * 
	 */
	class Pegawai extends CI_Controller
	{
		
		function __construct()
		{
	        parent:: __construct();
	        if($this->session->userdata('masuk') !=TRUE){
	            $url=base_url('Login');
	            redirect($url);
	        };
	        $this->load->library('upload');
	        $this->load->model('m_pegawai');
	        
    	}

    	function index(){
        if($this->session->userdata('akses') == 2 && $this->session->userdata('masuk') == true){
      		$y['title'] = 'Pegawai';
      		$x['pegawai'] = $this->m_pegawai->getAllPegawai();
    			$this->load->view('v_header',$y);
    			$this->load->view('admin/v_sidebar');
    			$this->load->view('admin/v_pegawai',$x);
        }
        else{
          redirect('Login');
        }
    	}

    	function save_pegawai(){
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

                        $foto=$gbr['file_name'];
                        $nama_pegawai = $this->input->post('nama_pegawai');
                        $spesialis = $this->input->post('spesialis');
                        $nohp = $this->input->post('nohp');
                        $email = $this->input->post('email');
                        $alamat = $this->input->post('alamat');
                        $username = $this->input->post('username');
                        $password = $this->input->post('password');

                        $this->m_pegawai->savePegawai($nama_pegawai, $spesialis, $nohp, $email, $alamat, $username, $password, $foto);
            						echo $this->session->set_flashdata('msg','success');
            						redirect('Admin/Pegawai');
                          
                      
                  }else{
                      echo $this->session->set_flashdata('msg','warning');
                      redirect('Admin/Pegawai');
                  }
              }
    	}

    	function update_pegawai(){
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

                          $foto=$gbr['file_name'];
                          $nama_pegawai = $this->input->post('nama_pegawai');
	                      $spesialis = $this->input->post('spesialis');
	                      $nohp = $this->input->post('nohp');
	                      $email = $this->input->post('email');
	                      $alamat = $this->input->post('alamat');
	                      $username = $this->input->post('username');
	                      $password = $this->input->post('password');
                          $images=$this->input->post('gambar');
                          $path='./assets/images/'.$images;
                          unlink($path);
                          $id = $this->input->post('id');

                          $this->m_pegawai->updatePegawai($id, $nama_pegawai, $spesialis, $nohp, $email, $alamat, $username, $password, $foto);
						  echo $this->session->set_flashdata('msg','success');
						  redirect('Admin/Pegawai');
                      
                  }else{
                      echo $this->session->set_flashdata('msg','warning');
                      redirect('Admin/Pegawai');
                  }
                  
              }else{
                $nama_pegawai = $this->input->post('nama_pegawai');
	            $spesialis = $this->input->post('spesialis');
	            $nohp = $this->input->post('nohp');
	            $email = $this->input->post('email');
	            $alamat = $this->input->post('alamat');
	            $username = $this->input->post('username');
	            $password = $this->input->post('password');
	            $id = $this->input->post('id');

                $this->m_pegawai->updatePegawaiNoFoto($id, $nama_pegawai, $spesialis, $nohp, $email, $alamat, $username, $password);
        				echo $this->session->set_flashdata('msg','success');
        				redirect('Admin/Pegawai');
              }
    	}

    	function hapus_pegawai(){
	      $id = $this->input->post('id');
	      $images=$this->input->post('gambar');
	      $path='./assets/images/'.$images;
	      unlink($path);

	      $this->m_pegawai->hapusPegawai($id);
	      echo $this->session->set_flashdata('msg','Hapus');
	      redirect('Admin/Pegawai');
    	}

      function absensi_pegawai(){
        if($this->session->userdata('akses') == 2 && $this->session->userdata('masuk') == true){
          $y['title'] = 'Absensi Pegawai';
          $x['absensi'] = $this->m_pegawai->getAllAbsensi();
          $x['pegawai'] = $this->m_pegawai->getAllPegawai();
          $get_db=$this->m_pegawai->getAllAbsensi();
          $q=$get_db->row_array();
          $x['a_id']=$q['absensi_id'];
          $this->load->view('v_header',$y);
          $this->load->view('admin/v_sidebar');
          $this->load->view('admin/v_absensi_pegawai',$x);
        }
        else{
          redirect('Login');
        }
      }

      function save_absensi(){
        $id = $this->input->post('id');
        $tanggal = $this->input->post('tanggal');
        $status = $this->input->post('status');
        $j_status = count($status);

        for($i = 0 ;$i<$j_status; $i++){
          $this->m_pegawai->saveAbsensi($tanggal,$status[$i],$id[$i]);  
        }
          echo $this->session->set_flashdata('msg','success');
          redirect('Admin/Pegawai/absensi_pegawai');
      }

      function update_absensi(){
         $absensi_id = $this->input->post('id');
         $status = $this->input->post('status');

         $this->m_pegawai->updateAbsensi($absensi_id, $absensi_status);
         echo $this->session->set_flashdata('msg','update');
          redirect('Admin/Pegawai/absensi_pegawai');
      }

      function hapus_absensi(){
        $absensi_id = $this->input->post('id');

        $this->m_pegawai->hapusAbsensi($absensi_id);
        echo $this->session->set_flashdata('msg','hapus');
        redirect('Admin/Pegawai/absensi_pegawai');
      }

      function hapusAbsensi_tanggal(){
        $tanggal = $this->input->post('tanggal');
        $data = $this->m_pegawai->getAllAbsensitanggal($tanggal)->num_rows();
        if ($data > 0 ) {
          $this->m_pegawai->hapusAbsensibyTanggal($tanggal);
          echo $this->session->set_flashdata('msg','hapus');
          redirect('Admin/Pegawai/absensi_pegawai');
        }else{
          echo $this->session->set_flashdata('msg','delete');
          redirect('Admin/Pegawai/absensi_pegawai');
        }
      }

      function hapusAllabsensi(){
        $this->m_pegawai->hapusAll();
        echo $this->session->set_flashdata('msg','hapus');
        redirect('Admin/Pegawai/absensi_pegawai');
      }

      function cetak_absensi(){
        $daritanggal = $this->input->post("daritgl");
        $ketanggal = $this->input->post("ketgl");
        $x['absensi'] = $this->m_pegawai->getcetakAbsensitanggal($daritanggal,$ketanggal);
        $this->load->view('admin/cetak_absensi',$x);
      }
	}
?>