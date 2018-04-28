<?php
    class Admins extends CI_Controller{
        public function __construct(){
            parent::__construct();
            $this->load->model('user');
            $this->load->helper('url');
        }

        function member(){
            $query = $this->user->select_user();
            $data['member'] = null;
            if($query){
                $data['member'] =  $query;
            }
            $this->load->view('pages/homeAdminMember',$data);
        }


    }
?>