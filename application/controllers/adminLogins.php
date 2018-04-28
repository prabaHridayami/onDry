<?php
    class adminLogins extends CI_Controller{
        public function __construct(){
            parent::__construct();
            $this->load->model('login');
            $this->load->library('Form_validation');
            $this->load->helper(array('Form', 'Cookie', 'String'));
        }

        function loginAdmin(){
            $username = $this->input->post('username');
            $password = $this->input->post('password');

            $row = $this->login->adminLogin($username, $password)->row();

            if($row){
                //true
                $this->_daftarkan_session($row);
            }else{
                // login gagal
                $this->session->set_flashdata('message','Login Gagal');
                redirect('loginAdmin');
            }
        }

        public function _daftarkan_session($row) {
            // 1. Daftarkan Session
            $sess = array(
                'logged' => TRUE,
                'admin' => TRUE,
                'id' => $row->id,
                'username' => $row->username

            );
            $this->session->set_userdata($sess,'admin');
                
            // 2. Redirect ke home
            redirect('homeAdmin');        
        }

        function logoutAdmin(){
            $this->session->sess_destroy();
            redirect('loginAdmin');
        }
    }
    
    
?>