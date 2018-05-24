<?php
    class Logins extends CI_Controller{
        public function __construct(){
            parent::__construct();
            $this->load->model('login');
            $this->load->library('Form_validation');
            $this->load->helper(array('Form', 'Cookie', 'String'));
        }

        public function cookies(){ //membuat cookie pada web
            // ambil cookie
            $cookie = get_cookie('querty');
            
            // cek session
            if ($this->session->userdata('usernameUser'==TRUE)) {
                redirect('member');
            } else if($cookie <> '') {
                // cek cookie
                $row = $this->login->get_by_cookie($cookie)->row();
                if ($row) {
                    $this->_daftarkan_session($row);
                } else {
                    $data = array(
                        'username' => set_value('username'),
                        'password' => set_value('password'),
                        'remember' => set_value('remember'),
                        'message' => $this->session->flashdata('message')
                    );
                    $this->load->view('pages/dashbor', $data);    
                }
            } else {
                $data = array(
                    'username' => set_value('username'),
                    'password' => set_value('password'),
                    'remember' => set_value('remember'),
                    'message' => $this->session->flashdata('message'),
                );
                $this->load->view('pages/dashbor', $data);            
            }
        }

        // function cek(){
        //     echo ($this->login->cek_status('dekjen'));
        //     return;
        // }

        function login(){ //login member
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $remember = $this->input->post('remember');
            
            $cek['pegawai'] = $this->login->cek_status($username);
            // foreach ($pegawai as $pegawai){
                // if(($pegawai->status_login) =='true'){
                //     echo "<script type='text/javascript'>alert('Already Login, Logout First!');</script>";
                // }else{
                    $row = $this->login->login($username, $password)->row();

                    if($row){
                        //true
                        if ($remember=='TRUE') {
                            $key = random_string('alnum', 64);
                            set_cookie('querty', $key, 3600*24); // set expired 30 hari kedepan
                            
                            // simpan key di database
                            $update_key = array(
                                'cookie' => $key
                            );
                            $this->login->update($update_key, $row->id);
                        }
                        $this->login->status_login($username,'true');
                        $this->_daftarkan_session($row);
                    }else{
                        // login gagal
                        $this->session->set_flashdata('message','Login Gagal');
                        redirect(base_url().'dashbor'); 
                        $this->cookies();
                    }
                
            
        }

        public function _daftarkan_session($row) { // daftarkan session member
            // 1. Daftarkan Session
            $sess = array(
                'logged' => TRUE,
                'user' => TRUE,
                'id' => $row->id,
                'usernameUser' => $row->username

            );
            $this->session->set_userdata($sess,'user');            
            // 2. Redirect ke home
            redirect(base_url().'dashbor?st=success');       
        }

        function logout(){ //logout member dan hapus session
           // delete cookie dan session
            delete_cookie('querty');
            $this->login->status_login($_POST['logoutuser'],'false');
            $this->session->sess_destroy();
            redirect(base_url());

        }
    }
    
    
?>