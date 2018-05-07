<?php
    class Admins extends CI_Controller{
        public function __construct(){
            parent::__construct();
            $this->load->model('user');
            $this->load->model('admin');
            $this->load->helper('url');
        }

        function index(){
            if($this->session->userdata('admin') ==""){
                redirect('loginAdmin');
            }else{
                $data['user'] = $this->session->userdata('usernameAdmin');
                $this->load->view('pages/headerAdmin',$data);
                $this->load->view('pages/homeAdmin',$data);
                $this->load->view('pages/footerAdmin',$data);
            }
        }

        function loadMember(){
            if($this->session->userdata('user') ==""){
                redirect(base_url());
            }else{
                $data['user'] = $this->session->userdata('usernameAdmin');
                $this->load->view('pages/headerAdmin',$data);
                $this->load->view('pages/homeAdminMember',$data);
                $this->load->view('pages/footerAdmin',$data);
            }
        }

        function member(){
            $query = $this->user->select_user();
            $data['member'] = null;
            if($query){
                $data['member'] =  $query;
            }
            $this->load->view('pages/headerAdmin',$data);
            $this->load->view('pages/homeAdminMember',$data);
            $this->load->view('pages/footerAdmin',$data);
        }

        function pegawai(){
            $query = $this->admin->select_admin();
            $data['pegawai'] = null;
            if($query){
                $data['pegawai'] =  $query;
            }
            $this->load->view('pages/headerAdmin',$data);
            $this->load->view('pages/homeAdminPegawai',$data);
            $this->load->view('pages/footerAdmin',$data);
        }
    }
?>