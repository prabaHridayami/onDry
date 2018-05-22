<?php
    class Admins extends CI_Controller{
        public function __construct(){
            parent::__construct();
            $this->load->model('user');
            $this->load->model('admin');
            $this->load->model('model_global');
            $this->load->helper('url');
        }

        function fetch_member(){
            $query = $this->input->post('search');
            if(isset($query) && !empty($query)){
                $data['member']=$this->admin->fetch_data_member($query);
                $data['pagination']='';
                $this->load->view('pages/headerAdmin',$data);
                $this->load->view('pages/homeAdminMember',$data);
            }else{
                redirect(base_url().'admins/member?st=failed');
            }
        }

        function fetch_pegawai(){
            $query = $this->input->post('search');
            if(isset($query) && !empty($query)){
                $data['pegawai']=$this->admin->fetch_data_pegawai($query);
                $data['pagination']='';
                $this->load->view('pages/headerAdmin',$data);
                $this->load->view('pages/homeAdminPegawai',$data);
            }else{
                redirect(base_url().'admins/pegawai?st=failed');
            }
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

        function driver(){
            if($this->session->userdata('usernameAdmin') ==""){
                redirect('loginAdmin');
            }else{
                $data['user'] = $this->session->userdata('usernameAdmin');
                $this->load->library('pagination');
                $config['base_url']=base_url().'admins/driver';
                $config['uri_segment']=3;
                $config['per_page']= 5;
                $config['total_rows']= $this->admin->record_count('status','transaksi','Diantar');
                
                $this->pagination->initialize($config);	
                $from = $this->uri->segment(3,0); 
                $data['pagination'] = $this->pagination->create_links();
                $data['trans']=$this->admin->view_trans($config['per_page'], $from,'Diantar');
                $this->load->view('pages/headerAdmin',$data);
                $this->load->view('pages/driverAction',$data);

            }
        }

        function proses(){
            if($this->session->userdata('usernameAdmin') ==""){
                redirect('loginAdmin');
            }else{
                $data['user'] = $this->session->userdata('usernameAdmin');
                $this->load->library('pagination');
                $config['base_url']=base_url().'admins/proses';
                $config['uri_segment']=3;
                $config['per_page']= 5;
                $config['total_rows']= $this->admin->record_count('status','transaksi','Proses');
                
                $this->pagination->initialize($config);	
                $from = $this->uri->segment(3,0); 
                $data['pagination'] = $this->pagination->create_links();
                $data['trans']=$this->admin->view_trans($config['per_page'], $from,'Proses');		
                $this->load->view('pages/headerAdmin',$data);
                $this->load->view('pages/homeAdmin',$data);
            }
        }

        function selesai(){
            if($this->session->userdata('usernameAdmin') ==""){
                redirect('loginAdmin');
            }else{
                $data['user'] = $this->session->userdata('usernameAdmin');
                $this->load->library('pagination');
                $config['base_url']=base_url().'admins/index';
                $config['uri_segment']=3;
                $config['per_page']= 5;
                $config['total_rows']= $this->admin->record_count('status','transaksi','Selesai');
                
                $this->pagination->initialize($config);	
                $from = $this->uri->segment(3,0); 
                $data['pagination'] = $this->pagination->create_links();
                $data['trans']=$this->admin->view_trans($config['per_page'], $from,'Selesai');		
                $this->load->view('pages/headerAdmin',$data);
                $this->load->view('pages/homeAdmin',$data);
            }
        }

        function diantar(){
            if($this->session->userdata('usernameAdmin') ==""){
                redirect('loginAdmin');
            }else{
                $data['user'] = $this->session->userdata('usernameAdmin');
                $this->load->library('pagination');
                $config['base_url']=base_url().'admins/index';
                $config['uri_segment']=3;
                $config['per_page']= 5;
                $config['total_rows']= $this->admin->record_count('status','transaksi','Diantar');
                
                $this->pagination->initialize($config);	
                $from = $this->uri->segment(3,0); 
                $data['pagination'] = $this->pagination->create_links();
                $data['trans']=$this->admin->view_trans($config['per_page'], $from,'Diantar');		
                $this->load->view('pages/headerAdmin',$data);
                $this->load->view('pages/homeAdmin',$data);
            }
        }

        function sampai(){
            if($this->session->userdata('usernameAdmin') ==""){
                redirect('loginAdmin');
            }else{
                $data['user'] = $this->session->userdata('usernameAdmin');
                $this->load->library('pagination');
                $config['base_url']=base_url().'admins/index';
                $config['uri_segment']=3;
                $config['per_page']= 5;
                $config['total_rows']= $this->admin->record_count('status','transaksi','Sampai');
                
                $this->pagination->initialize($config);	
                $from = $this->uri->segment(3,0); 
                $data['pagination'] = $this->pagination->create_links();
                $data['trans']=$this->admin->view_trans($config['per_page'], $from,'Sampai');		
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

        public function action(){
            $id = $_POST['id_trans'];
            $status['status'] = $_POST['status'];
            if($this->session->userdata('usernameAdmin')==""){
                redirect(base_url().'admins/index');
            }else{
                if($_POST['status']=='Not Checked'){
                    $this->admin->update_action('Proses','id',$id,'transaksi');
                    $this->admin->update_sp('Lunas','id',$id,'transaksi');
                    redirect(base_url().'admins/index?st=success');
                }
                else if($_POST['status']=='Proses'){
                    $this->admin->update_action('Selesai','id',$id,'transaksi');
                    redirect(base_url().'admins/index?st=success');
                }
                else if($_POST['status']=='Selesai'){
                    $this->admin->update_action('Diantar','id',$id,'transaksi');
                    redirect(base_url().'admins/index?st=success');

                }else if($_POST['status']=='Diantar'){
                    $this->admin->update_action('Sampai','id',$id,'transaksi');
                    redirect(base_url().'admins/driver?st=success');
                }
            }
        }

        public function bukti(){
            redirect(base_url().'image/'.$_POST['image']);
        }
    }
?>