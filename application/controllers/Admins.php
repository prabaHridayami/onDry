<?php
    class Admins extends CI_Controller{
        public function __construct(){
            parent::__construct();
            $this->load->model('user');
            $this->load->model('admin');
            $this->load->model('model_global');
            $this->load->helper('url');
        }

        function index(){
            if($this->session->userdata('usernameAdmin') ==""){
                redirect('loginAdmin');
            }else{
                $data['user'] = $this->session->userdata('usernameAdmin');
                $this->load->library('pagination');
                $config['base_url']=base_url().'admins/index';
                $config['uri_segment']=3;
                $config['per_page']= 5;
                $config['total_rows']= $this->admin->record_count('status','transaksi','Not Checked');
                
                $this->pagination->initialize($config);	
                $from = $this->uri->segment(3,0); 
                $data['pagination'] = $this->pagination->create_links();
                $data['trans']=$this->admin->view_trans($config['per_page'], $from,'Not Checked');		
                $this->load->view('pages/headerAdmin',$data);
                $this->load->view('pages/homeAdmin',$data);
            }
        }

        public function detail(){
            if($this->session->userdata('usernameAdmin') ==""){
                redirect(base_url());
            }else{
                $id=$_POST['id_det'];
                $data['det']=$this->admin->detail($id);
                $this->load->view('pages/headerAdmin',$data);
                $this->load->view('pages/detailAdmin',$data);
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
            if($this->session->userdata('usernameAdmin') ==""){
                redirect('loginAdmin');
            }else{
                $data['user'] = $this->session->userdata('usernameAdmin');
                $this->load->library('pagination');
                $config['base_url']=base_url().'admins/member';
                $config['uri_segment']=3;
                $config['per_page']= 10;
                $config['total_rows']= $this->admin->record('member');
                
                $this->pagination->initialize($config);	
                $from = $this->uri->segment(3,0); 
                $data['pagination'] = $this->pagination->create_links();
                $data['member'] = $this->admin->view_member($config['per_page'], $from);
                $this->load->view('pages/headerAdmin',$data);
                $this->load->view('pages/homeAdminMember',$data);
            }
        }

        function pegawai(){
           if($this->session->userdata('usernameAdmin') ==""){
                redirect('loginAdmin');
            }else{
                $data['user'] = $this->session->userdata('usernameAdmin');
                $this->load->library('pagination');
                $config['base_url']=base_url().'admins/pegawai';
                $config['uri_segment']=3;
                $config['per_page']= 10;
                $config['total_rows']= $this->admin->record('pegawai');
                
                $this->pagination->initialize($config);	
                $from = $this->uri->segment(3,0); 
                $data['pagination'] = $this->pagination->create_links();
                $data['pegawai'] = $this->admin->select_admin($config['per_page'], $from);
                $this->load->view('pages/headerAdmin',$data);
                $this->load->view('pages/homeAdminPegawai',$data);
            }
        }
    }
?>