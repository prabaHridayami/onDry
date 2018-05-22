<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller { //controller default


	public function index() //function membuka halaman awal web
	{	
		$this->load->view('pages/dashbor');
	}
}
