<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function index()
	{	
		if (isset($this->session->userdata['logged'])) {
            redirect('member');
		}else{
			$this->load->view('pages/dashbor.php');
		}	
	}
}
