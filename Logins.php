<?php
    class Logins extends CI_Controller{
        function login_validation(){
            $this->load->library('form_validation');
            $this->form_validation->set_rules('username', 'Username', 'required');
            $this->form_validation->set_rules('password', 'Password', 'required');
    
            if($this->form_validation->run()){
                //true
                $username = $this->input->post('username');
                $password = $this->input->post('password');

                $this->load->model('login');
                if($this->login->can_login($username, $password)){
                    $session_data = array(
                        'username' => $username
                    );
                    $this->session->set_userdata($session_data);
                    redirect(base_url().'logins/enter');
                }else{
                    $this->session->set_flashdata('error','Invalid Username and Password');
                    redirect(base_url().'dashbor');
                }

            }else{
                
            }
        }

        function enter(){
            if($this->session->userdata('username') !=" "){
                redirect(base_url().'mydashbor');
            }else{
                redirect(base_url().'dashbor');
            }
        }

        function logout(){
            $this->session->unset_userdata('username');
            redirect(base_url().'dashbor');
        }
    }
    
    
?>