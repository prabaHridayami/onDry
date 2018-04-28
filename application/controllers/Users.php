<?php
    class Users extends CI_Controller{
        public function __construct() {
		
            parent::__construct();
            $this->load->library(array('session'));
            $this->load->helper(array('url'));
            $this->load->model('user', 'regis_model',TRUE);
        }

        public function getKabupaten(){
            $data['kabupaten'] = $this->regis_model->getKabupaten();
        }

        public function register(){
            //create data object
            $data = new stdClass();

            //load form helper and validation library
            $this->load->helper('form');
            $this->load->library('form_validation');
            $this->load->model('user');

            //set validation rules
            $this->form_validation->set_rules('nama','Nama','required');
            $this->form_validation->set_rules('no_telp','No_Telepon','required');
            $this->form_validation->set_rules('email','Email','required|valid_email|is_unique[member.email]');
            $this->form_validation->set_rules('username','Username','required|is_unique[member.username]');
            $this->form_validation->set_rules('password','Password','required');
            $this->form_validation->set_rules('alamat','Alamat','required|min_length[10]');

            if($this->form_validation->run()==false){
                //validation is not okay, send error to the view
                $this->load->view('pages/signupform',$data);
            }
            else{
                //set variable from the form
                $nama = $this->input->post('nama');
                $no_telp = $this->input->post('no_telp');
                $email = $this->input->post('email');
                $username = $this->input->post('username');
                $password = md5($this->input->post('password'));
                $tgl_lahir = $this->input->post('tgl_lahir');
                $alamat = $this->input->post('alamat');
                $jk = $this->input->post('jenis_kelamin');
                $kabupaten = $this->input->post('kabupaten');
                $status = $this->input->post('status_member');

                if($this->user->create_user($nama, $no_telp, $email, $username, $password, $tgl_lahir, $alamat, $jk, $kabupaten, $status)){
                    $this->session->set_flashdata('Successfully','Register is success');
                    echo "<script type='text/javascript'>alert('Registration success');</script>";
                    redirect(base_url());
                }
                else{
                    $this->session->set_flashdata('Failed','Register is failed');
                    echo "<script type='text/javascript'>alert('Registration is failed');</script>";
                    redirect(base_url());
                }
            }
        }
    }

?>