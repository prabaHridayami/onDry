<?php
    class Admins extends CI_Controller{
        public function __construct(){ //function yang pertama kali dijalankan ketika controller dipanggil
            parent::__construct(); 
            $this->load->model('user'); 
            $this->load->model('admin');
            $this->load->model('model_global');
            $this->load->helper('url');
        }

        function fetch_member(){ //function search member pada halaman homeAdminMember
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

        function fetch_pegawai(){ //function search pegawai pada halaman homeAdminPegawai
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

        function index(){ //membuka homeAdmin dan memuat transaksi status Not Checked 
            if($this->session->userdata('usernameAdmin') ==""){
                redirect('loginAdmin');
            }else{
                $data['user'] = $this->session->userdata('usernameAdmin');
                $this->load->library('pagination');
                $config['base_url']=base_url().'admins/index';
                $config['uri_segment']=3;
                $config['per_page']= 5;
                $config['total_rows']= $this->admin->record_count('status','transaksi','Not Checked');
                $config["full_tag_open"] = '<ul class="pagination">';
                $config["full_tag_close"] = '</ul>';    
                $config["first_link"] = "&laquo;";
                $config["first_tag_open"] = "<li class='page-item'>";
                $config["first_tag_close"] = "</li>";
                $config["last_link"] = "&raquo;";
                $config["last_tag_open"] = "<li class='page-item'>";
                $config["last_tag_close"] = "</li>";
                $config['next_link'] = '&raquo;';
                $config['next_tag_open'] = "<li class='page-item'>";
                $config['next_tag_close'] = "</li>";
                $config['prev_link'] = '&laquo;';
                $config['prev_tag_open'] = "<li class='page-item'>";
                $config['prev_tag_close'] = '<li>';
                $config['cur_tag_open'] = '<li class="active"><a href="#">';
                $config['cur_tag_close'] = '</a></li>';
                $config['num_tag_open'] = '<li>';
                $config['num_tag_close'] = '</li>';
                
                $this->pagination->initialize($config);	
                $from = $this->uri->segment(3,0); 
                $data['pagination'] = $this->pagination->create_links();
                $data['trans']=$this->admin->view_trans($config['per_page'], $from,'Not Checked');		
                $this->load->view('pages/headerAdmin',$data);
                $this->load->view('pages/homeAdmin',$data);
            }
        }

        function driver(){ //membuka driverAction dan memuat transaksi status Diantar
            if($this->session->userdata('usernameAdmin') ==""){
                redirect('loginAdmin');
            }else{
                $data['user'] = $this->session->userdata('usernameAdmin');
                $id = $this->session->userdata('id');
                $this->load->library('pagination');
                $config['base_url']=base_url().'admins/driver';
                $config['uri_segment']=3;
                $config['per_page']= 5;
                $config['total_rows']= $this->admin->record_count('status','transaksi','Diantar');
                $config["full_tag_open"] = '<ul class="pagination">';
                $config["full_tag_close"] = '</ul>';    
                $config["first_link"] = "&laquo;";
                $config["first_tag_open"] = "<li class='page-item'>";
                $config["first_tag_close"] = "</li>";
                $config["last_link"] = "&raquo;";
                $config["last_tag_open"] = "<li class='page-item'>";
                $config["last_tag_close"] = "</li>";
                $config['next_link'] = '&raquo;';
                $config['next_tag_open'] = "<li class='page-item'>";
                $config['next_tag_close'] = "</li>";
                $config['prev_link'] = '&laquo;';
                $config['prev_tag_open'] = "<li class='page-item'>";
                $config['prev_tag_close'] = '<li>';
                $config['cur_tag_open'] = '<li class="active"><a href="#">';
                $config['cur_tag_close'] = '</a></li>';
                $config['num_tag_open'] = '<li>';
                $config['num_tag_close'] = '</li>';
                
                
                $this->pagination->initialize($config);	
                $from = $this->uri->segment(3,0); 
                $data['pagination'] = $this->pagination->create_links();
                $data['trans']=$this->admin->view_driver($config['per_page'], $from,$id);
                $this->load->view('pages/headerAdmin',$data);
                $this->load->view('pages/driverAction',$data);

            }
        }

        function proses(){ //membuka homeAdmin dan memuat transaksi status proses
            if($this->session->userdata('usernameAdmin') ==""){
                redirect('loginAdmin');
            }else{
                $data['user'] = $this->session->userdata('usernameAdmin');
                $this->load->library('pagination');
                $config['base_url']=base_url().'admins/proses';
                $config['uri_segment']=3;
                $config['per_page']= 5;
                $config['total_rows']= $this->admin->record_count('status','transaksi','Proses');
                $config["full_tag_open"] = '<ul class="pagination">';
                $config["full_tag_close"] = '</ul>';    
                $config["first_link"] = "&laquo;";
                $config["first_tag_open"] = "<li class='page-item'>";
                $config["first_tag_close"] = "</li>";
                $config["last_link"] = "&raquo;";
                $config["last_tag_open"] = "<li class='page-item'>";
                $config["last_tag_close"] = "</li>";
                $config['next_link'] = '&raquo;';
                $config['next_tag_open'] = "<li class='page-item'>";
                $config['next_tag_close'] = "</li>";
                $config['prev_link'] = '&laquo;';
                $config['prev_tag_open'] = "<li class='page-item'>";
                $config['prev_tag_close'] = '<li>';
                $config['cur_tag_open'] = '<li class="active"><a href="#">';
                $config['cur_tag_close'] = '</a></li>';
                $config['num_tag_open'] = '<li>';
                $config['num_tag_close'] = '</li>';
                
                $this->pagination->initialize($config);	
                $from = $this->uri->segment(3,0); 
                $data['pagination'] = $this->pagination->create_links();
                $data['trans']=$this->admin->view_trans($config['per_page'], $from,'Proses');		
                $this->load->view('pages/headerAdmin',$data);
                $this->load->view('pages/homeAdmin',$data);
            }
        }

        function selesai(){ //membuka homeAdmin dan memuat transaksi status selesai
            if($this->session->userdata('usernameAdmin') ==""){
                redirect('loginAdmin');
            }else{
                $data['user'] = $this->session->userdata('usernameAdmin');
                $this->load->library('pagination');
                $config['base_url']=base_url().'admins/index';
                $config['uri_segment']=3;
                $config['per_page']= 5;
                $config['total_rows']= $this->admin->record_count('status','transaksi','Selesai');
                $config["full_tag_open"] = '<ul class="pagination">';
                $config["full_tag_close"] = '</ul>';    
                $config["first_link"] = "&laquo;";
                $config["first_tag_open"] = "<li class='page-item'>";
                $config["first_tag_close"] = "</li>";
                $config["last_link"] = "&raquo;";
                $config["last_tag_open"] = "<li class='page-item'>";
                $config["last_tag_close"] = "</li>";
                $config['next_link'] = '&raquo;';
                $config['next_tag_open'] = "<li class='page-item'>";
                $config['next_tag_close'] = "</li>";
                $config['prev_link'] = '&laquo;';
                $config['prev_tag_open'] = "<li class='page-item'>";
                $config['prev_tag_close'] = '<li>';
                $config['cur_tag_open'] = '<li class="active"><a href="#">';
                $config['cur_tag_close'] = '</a></li>';
                $config['num_tag_open'] = '<li>';
                $config['num_tag_close'] = '</li>';
                
                $this->pagination->initialize($config);	
                $from = $this->uri->segment(3,0); 
                $data['pagination'] = $this->pagination->create_links();
                $data['trans']=$this->admin->view_trans($config['per_page'], $from,'Selesai');
                $data['pegawai']=$this->admin->selectDriver();		
                $this->load->view('pages/headerAdmin',$data);
                $this->load->view('pages/homeAdmin',$data);
            }
        }

        function diantar(){ //membuka homeAdmin dan memuat transaksi status diantar
            if($this->session->userdata('usernameAdmin') ==""){
                redirect('loginAdmin');
            }else{
                $data['user'] = $this->session->userdata('usernameAdmin');
                $this->load->library('pagination');
                $config['base_url']=base_url().'admins/index';
                $config['uri_segment']=3;
                $config['per_page']= 5;
                $config['total_rows']= $this->admin->record_count('status','transaksi','Diantar');
                $config["full_tag_open"] = '<ul class="pagination">';
                $config["full_tag_close"] = '</ul>';    
                $config["first_link"] = "&laquo;";
                $config["first_tag_open"] = "<li class='page-item'>";
                $config["first_tag_close"] = "</li>";
                $config["last_link"] = "&raquo;";
                $config["last_tag_open"] = "<li class='page-item'>";
                $config["last_tag_close"] = "</li>";
                $config['next_link'] = '&raquo;';
                $config['next_tag_open'] = "<li class='page-item'>";
                $config['next_tag_close'] = "</li>";
                $config['prev_link'] = '&laquo;';
                $config['prev_tag_open'] = "<li class='page-item'>";
                $config['prev_tag_close'] = '<li>';
                $config['cur_tag_open'] = '<li class="active"><a href="#">';
                $config['cur_tag_close'] = '</a></li>';
                $config['num_tag_open'] = '<li>';
                $config['num_tag_close'] = '</li>';
                
                $this->pagination->initialize($config);	
                $from = $this->uri->segment(3,0); 
                $data['pagination'] = $this->pagination->create_links();
                $data['trans']=$this->admin->view_trans($config['per_page'], $from,'Diantar');		
                $this->load->view('pages/headerAdmin',$data);
                $this->load->view('pages/homeAdmin',$data);
            }
        }

        function sampai(){ //membuka homeAdmin dan memuat transaksi status sampai
            if($this->session->userdata('usernameAdmin') ==""){
                redirect('loginAdmin');
            }else{
                $data['user'] = $this->session->userdata('usernameAdmin');
                $this->load->library('pagination');
                $config['base_url']=base_url().'admins/index';
                $config['uri_segment']=3;
                $config['per_page']= 5;
                $config['total_rows']= $this->admin->record_count('status','transaksi','Sampaigit ');
                $config["full_tag_open"] = '<ul class="pagination">';
                $config["full_tag_close"] = '</ul>';    
                $config["first_link"] = "&laquo;";
                $config["first_tag_open"] = "<li class='page-item'>";
                $config["first_tag_close"] = "</li>";
                $config["last_link"] = "&raquo;";
                $config["last_tag_open"] = "<li class='page-item'>";
                $config["last_tag_close"] = "</li>";
                $config['next_link'] = '&raquo;';
                $config['next_tag_open'] = "<li class='page-item'>";
                $config['next_tag_close'] = "</li>";
                $config['prev_link'] = '&laquo;';
                $config['prev_tag_open'] = "<li class='page-item'>";
                $config['prev_tag_close'] = '<li>';
                $config['cur_tag_open'] = '<li class="active"><a href="#">';
                $config['cur_tag_close'] = '</a></li>';
                $config['num_tag_open'] = '<li>';
                $config['num_tag_close'] = '</li>';
                
                $this->pagination->initialize($config);	
                $from = $this->uri->segment(3,0); 
                $data['pagination'] = $this->pagination->create_links();
                $data['trans']=$this->admin->view_trans($config['per_page'], $from,'Sampai');		
                $this->load->view('pages/headerAdmin',$data);
                $this->load->view('pages/homeAdmin',$data);
            }
        }

        public function detail(){ //memuat data detail transaksi id tertentu
            if($this->session->userdata('usernameAdmin') ==""){
                redirect(base_url());
            }else{
                $id=$_POST['id_det'];
                $data['det']=$this->admin->detail($id);
                $this->load->view('pages/headerAdmin',$data);
                $this->load->view('pages/detailAdmin',$data);
            }
        }

        function loadMember(){ //memuat data id member pada homeAdminMember
            if($this->session->userdata('user') ==""){
                redirect(base_url());
            }else{
                $data['user'] = $this->session->userdata('usernameAdmin');
                $this->load->view('pages/headerAdmin',$data);
                $this->load->view('pages/homeAdminMember',$data);
                $this->load->view('pages/footerAdmin',$data);
            }
        }

        function member(){ //memuat data member pada homeAdminMember
            if($this->session->userdata('usernameAdmin') ==""){
                redirect('loginAdmin');
            }else{
                $data['user'] = $this->session->userdata('usernameAdmin');
                $this->load->library('pagination');
                $config['base_url']=base_url().'admins/member';
                $config['uri_segment']=3;
                $config['per_page']= 10;
                $config['total_rows']= $this->admin->record('member');
                $config["full_tag_open"] = '<ul class="pagination">';
                $config["full_tag_close"] = '</ul>';    
                $config["first_link"] = "&laquo;";
                $config["first_tag_open"] = "<li class='page-item'>";
                $config["first_tag_close"] = "</li>";
                $config["last_link"] = "&raquo;";
                $config["last_tag_open"] = "<li class='page-item'>";
                $config["last_tag_close"] = "</li>";
                $config['next_link'] = '&raquo;';
                $config['next_tag_open'] = "<li class='page-item'>";
                $config['next_tag_close'] = "</li>";
                $config['prev_link'] = '&laquo;';
                $config['prev_tag_open'] = "<li class='page-item'>";
                $config['prev_tag_close'] = '<li>';
                $config['cur_tag_open'] = '<li class="active"><a href="#">';
                $config['cur_tag_close'] = '</a></li>';
                $config['num_tag_open'] = '<li>';
                $config['num_tag_close'] = '</li>';
                $this->pagination->initialize($config);	
                $from = $this->uri->segment(3,0); 
                $data['pagination'] = $this->pagination->create_links();
                $data['member'] = $this->admin->view_member($config['per_page'], $from);
                $this->load->view('pages/headerAdmin',$data);
                $this->load->view('pages/homeAdminMember',$data);
            }
        }

        function pegawai(){ //memuat data pegawai pada homeAdminPegawai
           if($this->session->userdata('usernameAdmin') ==""){
                redirect('loginAdmin');
            }else{
                $data['user'] = $this->session->userdata('usernameAdmin');
                $this->load->library('pagination');
                $config['base_url']=base_url().'admins/pegawai';
                $config['uri_segment']=3;
                $config['per_page']= 10;
                $config['total_rows']= $this->admin->record('pegawai');
                $config["full_tag_open"] = '<ul class="pagination">';
                $config["full_tag_close"] = '</ul>';    
                $config["first_link"] = "&laquo;";
                $config["first_tag_open"] = "<li class='page-item'>";
                $config["first_tag_close"] = "</li>";
                $config["last_link"] = "&raquo;";
                $config["last_tag_open"] = "<li class='page-item'>";
                $config["last_tag_close"] = "</li>";
                $config['next_link'] = '&raquo;';
                $config['next_tag_open'] = "<li class='page-item'>";
                $config['next_tag_close'] = "</li>";
                $config['prev_link'] = '&laquo;';
                $config['prev_tag_open'] = "<li class='page-item'>";
                $config['prev_tag_close'] = '<li>';
                $config['cur_tag_open'] = '<li class="active"><a href="#">';
                $config['cur_tag_close'] = '</a></li>';
                $config['num_tag_open'] = '<li>';
                $config['num_tag_close'] = '</li>';
                
                $this->pagination->initialize($config);	
                $from = $this->uri->segment(3,0); 
                $data['pagination'] = $this->pagination->create_links();
                $data['pegawai'] = $this->admin->select_admin($config['per_page'], $from);
                $this->load->view('pages/headerAdmin',$data);
                $this->load->view('pages/homeAdminPegawai',$data);
            }
        }

        public function action(){ //update status ketika ada tindakan
            $id = $_POST['id_trans'];
            $status['status'] = $_POST['status'];
            $driver = $_POST['id_driver'];
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
                    $this->admin->updateDriver($driver,$id);
                    $this->admin->update_action('Diantar','id',$id,'transaksi');
                    redirect(base_url().'admins/index?st=success');

                }else if($_POST['status']=='Diantar'){
                    $this->admin->update_action('Sampai','id',$id,'transaksi');
                    redirect(base_url().'admins/driver?st=success');
                }
            }
        }

        // public function bukti(){ 
        //     redirect(base_url().'image/'.$_POST['image']);
        // }
    }
?>