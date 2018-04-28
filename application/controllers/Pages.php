<?php
    class Pages extends CI_Controller{
        
        public function __construct(){
            parent::__construct();
            $this->load->model('user', 'regis_model',TRUE);
            $this->load->library(array('session'));
            $this->load->helper(array('url'));
            
        }

        public function view($page = 'dashbor'){
           if(!file_exists(APPPATH.'views/pages/'.$page.'.php')){
                show_404(); 
            }
            $data['kabupaten'] = $this->regis_model->getKabupaten();
            $this->load->view('pages/'.$page, $data);
        }
        
    }  
?>