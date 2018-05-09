<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mydashbor extends CI_Controller {
	function __construct() {
        parent::__construct(); 
		$this->load->model('model_global', 'model_global');
    }
	public function index()
	{
		if($this->session->userdata('user') ==""){
			redirect(base_url());
		}else{
			$data['user'] = $this->model_global->get_data(array('data' => 'row','table' => 'member', 'where' => array('username' => $this->session->userdata('usernameUser'))));
			$this->load->view('pages/header',$data);
			$this->load->view('pages/mydashbor',$data);
		}
	}
	public function order()
	{
		if($this->session->userdata('usernameUser') ==""){
			redirect(base_url());
		}else{
			$data['user'] = $this->model_global->get_data(array('data' => 'row','table' => 'member', 'where' => array('username' => $this->session->userdata('username'))));
			$data['paket'] = $this->model_global->get_data(array('select' => '*', 'table' => 'paket','order_by' => 'id_paket asc'));
			// $data['kategori'] = $this->model_global->get_data(array('select' => '*', 'table' => 'kategori','order_by' => 'nama_kategori asc'));
			$data['jenis_pakaian'] = $this->model_global->get_data(array('select' => '*', 'table' => 'jenis_pakaian','order_by' => 'id_jenis_pakaian asc'));
			// $data['antar'] = $this->model_global->get_data(array('select' => '*', 'table' => 'antar','order_by' => 'nama asc'));
			$this->load->view('pages/header',$data);
			$this->load->view('pages/order',$data);
		}
	}	
	public function editprofile()
	{
		if($this->session->userdata('username') ==""){
			redirect(base_url());
		}else{
			$data['user'] = $this->model_global->get_data(array('data' => 'row','table' => 'member', 'where' => array('username' => $this->session->userdata('username'))));
			$this->load->view('pages/header',$data);
			$this->load->view('pages/editprofile',$data);
		}
	}	
	public function orderproses(){
		if($_POST['berdasarkan']=="jp"){
			if(isset($_POST['jenis'])){
				if(count($_POST['jenis'])>0){
					$status = "true";
					$jp = "true";
				}else{
					echo "<script>alert('Pilih jenis pakaian');</script>";
					$status = "false";
				}
			}else{
				$status = "false";
				echo "<script>alert('Pilih jenis pakaian');</script>";
				redirect(base_url().'mydashbor/order?st=failed');
			}
		}else{
			$jp = "false";
			$status = "true";
		}
		if($status=="true"){
			$data['id_pegawai'] = '1';
			$data['id_member'] = $_POST['id_member'];
			$data['id_paket'] = $_POST['id_paket'];
			$data['id_kategori'] = $_POST['id_kategori'];
			$data['id_antar'] = $_POST['id_antar'];
			$data['tgl_transaksi'] = $_POST['tgl_transaksi'];
			$data['status'] = $_POST['status'];
			$data['berat_pakaian'] = $_POST['berat_pakaian'];
			$data['status_pembayaran'] = $_POST['status_pembayaran'];
			$insert_id = $this->model_global->insert($data, 'transaksi');
			$idt = $this->db->insert_id();
			if($jp=="true"){
				foreach($_POST['jenis'] as $value){
					$datadetil['id_transaksi'] = $idt;
					$datadetil['id_jenis'] = $value;
					$this->model_global->insert($datadetil, 'detail_transaksi');
				}
			}
			redirect(base_url().'mydashbor/order?st=success');
		}
	}
}
