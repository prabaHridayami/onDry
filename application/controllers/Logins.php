<?php
    class Logins extends CI_Controller{
        public function __construct(){
            parent::__construct();
            $this->load->model('login');
            $this->load->library('Form_validation');
            $this->load->helper(array('Form', 'Cookie', 'String'));
        }

        public function cookies(){
            // ambil cookie
            $cookie = get_cookie('querty');
            
            // cek session
            if ($this->session->userdata('logged')) {
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

        function login(){
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $remember = $this->input->post('remember');

            $row = $this->login->login($username, $password)->row();

            if($row){
                //true
                if ($remember=='TRUE') {
                    $key = random_string('alnum', 64);
                    set_cookie('querty', $key, 3600*24*30); // set expired 30 hari kedepan
                    
                    // simpan key di database
                    $update_key = array(
                        'cookie' => $key
                    );
                    $this->login->update($update_key, $row->id);
                }

                $this->_daftarkan_session($row);
            }else{
                // login gagal
                $this->session->set_flashdata('message','Login Gagal');
                $this->cookies();
            }
        }

        public function _daftarkan_session($row) {
            // 1. Daftarkan Session
            $sess = array(
                'logged' => TRUE,
                'user' => TRUE,
                'id' => $row->id,
                'username' => $row->username

            );
            $this->session->set_userdata($sess,'user');
                
            // 2. Redirect ke home
            redirect('member');        
        }

        function logout(){
           // delete cookie dan session
            delete_cookie('querty');
            $this->session->sess_destroy();
            redirect(base_url());
        }
    }
    
    
?>