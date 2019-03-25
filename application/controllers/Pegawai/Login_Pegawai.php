<?php
class Login_Pegawai extends CI_Controller{
    function __construct(){
        parent:: __construct();
        $this->load->model('m_login');
    }
    function index(){
        $this->load->view('v_login_pegawai');
    }

    function authadmin(){
        $username=strip_tags(str_replace("'", "", $this->input->post('username')));
        $password=strip_tags(str_replace("'", "", $this->input->post('password')));
        $u=$username;
        $p=$password;
        $cadmin=$this->m_login->cekpegawai($u,$p);
        if($cadmin->num_rows() > 0){
            $this->session->set_userdata('masuk',true);
            $this->session->set_userdata('user',$u);
            $xcadmin=$cadmin->row_array();
            $this->session->set_userdata('akses','3');
            $id=$xcadmin['pegawai_id'];
            $user_nama=$xcadmin['pegawai_nama'];
            $email = $xcadmin['pegawai_email'];
            $spesialis = $xcadmin['pegawai_spesialis'];
            $this->session->set_userdata('spesialis',$spesialis);
            $this->session->set_userdata('email',$email);
            $this->session->set_userdata('id',$id);
            $this->session->set_userdata('nama',$user_nama);
            redirect('Pegawai/Jadwal');
        }
        else{
            redirect('Pegawai/Login_Pegawai/gagallogin');
        }
    }

    
        function gagallogin(){
            $url=base_url('Pegawai/Login_Pegawai');
            echo $this->session->set_flashdata('msg','<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button> Username Atau Password Salah</div>');
            redirect($url);
        }
        function logout(){
            $this->session->sess_destroy();
            $url=base_url('Pegawai/Login_Pegawai');
            redirect($url);
        }
}