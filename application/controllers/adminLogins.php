<?php
    class adminLogins extends CI_Controller{
        public function __construct(){
            parent::__construct(); 
            $this->load->model('login'); //memuat model login
            $this->load->library('Form_validation'); //memuat library form_validation (deklarasi pd auto load)
            $this->load->helper(array('Form', 'Cookie', 'String')); //memuat helper array
        }

        function loginAdmin(){ //untuk login admin & driver
            $username = $this->input->post('username');
            $password = $this->input->post('password');

            $row = $this->login->adminLogin($username, $password)->row();
            if($password=='driver'){
                $this->_daftarkan_session($row);
                 // 2. Redirect ke homeDriver
                 redirect('admins/driver');
            }
            else if($row && $password!='driver'){
                //true
                $this->_daftarkan_session($row);
                // 2. Redirect ke home
                redirect('admins/index');
            }else{
                // login gagal
                $this->session->set_flashdata('message','Login Gagal');
                redirect('loginAdmin');
            }
        }

        public function _daftarkan_session($row) { //mendaftarkan session login admin
            // 1. Daftarkan Session
            $sess = array(
                'logged' => TRUE,
                'admin' => TRUE,
                'id' => $row->id,
                'usernameAdmin' => $row->username
            );
            $this->session->set_userdata($sess,'admin');        
        }

        function logoutAdmin(){ //logout admin dan menghapus session login admin
            $this->session->sess_destroy();
            redirect('loginAdmin');
        }
    }
    
    
?>