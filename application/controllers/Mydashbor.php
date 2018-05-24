<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mydashbor extends CI_Controller {
	function __construct() {
		parent::__construct(); 
		$this->load->model('model_global', 'model_global');
		$this->load->model('user', 'regis_model',TRUE);
		$this->load->database();
		$this->load->helper(array('url'));
		$this->load->library('email');
    }
	public function index()
	{
		if($this->session->userdata('usernameUser') ==""){
			redirect(base_url());
		}else{
			$this->load->library('pagination');
			$config['base_url']=base_url().'mydashbor/index';
			$config['uri_segment']=3;
			$config['per_page']= 5;
			$config['total_rows']= $this->model_global->record_count('id','transaksi',$this->session->userdata('id'));
			
			$config["full_tag_open"] = '<ul class="pagination">';
			$config["full_tag_close"] = '</ul>';    
			$config["first_link"] = "&laquo;";
			$config["first_tag_open"] = "<li class='page-item'>";
			$config["first_tag_close"] = "</li>";
			$config["last_link"] = "&raquo;";
			$config["last_tag_open"] = "<li class='page-item'>";
			$config["last_tag_close"] = "</li>";
			$config['next_link'] = '&raquo;';
			$config['next_tag_open'] = "<li class='page-item'>";
			$config['next_tag_close'] = "</li>";
			$config['prev_link'] = '&laquo;';
			$config['prev_tag_open'] = "<li class='page-item'>";
			$config['prev_tag_close'] = '<li>';
			$config['cur_tag_open'] = '<li class="active"><a href="#">';
			$config['cur_tag_close'] = '</a></li>';
			$config['num_tag_open'] = '<li>';
			$config['num_tag_close'] = '</li>';
			$this->pagination->initialize($config);	
			$from = $this->uri->segment(3,0); 
			$data['pagination'] = $this->pagination->create_links();
			$data['trans']=$this->model_global->view_trans($config['per_page'], $from,($this->session->userdata('id')));		
			$this->load->view('pages/header',$data);
			$this->load->view('pages/mydashbor',$data);
		}
	}

	public function detail(){
		if($this->session->userdata('usernameUser') ==""){
			redirect(base_url());
		}else{
			$id=$_POST['id_det'];
			$data['det']=$this->model_global->detail($id);
			$this->load->view('pages/header',$data);
			$this->load->view('pages/detail',$data);
		}
	}

	public function uploadIndex(){
		if($this->session->userdata('usernameUser') ==""){
			redirect(base_url());
		}else{
			// echo $_POST['id_det'];
			$id['id']=$_POST['id_det'];
			$this->load->view('pages/header',$id);
			$this->load->view('pages/upload',$id);
		}

	}

	public function upload(){
		$config['upload_path'] = './image/';
		$config['allowed_types'] = 'jpg|jpeg|png|gif';
		$config_image['max_size']	= '1024';
		$config['file_name'] = $_POST['id_det'];
		$config['overwrite']=true;

		$this->load->library('upload',$config);
		if(!$this->upload->do_upload('bukti')){
			// $error = array('error' => $this->upload->display_errors());
			// 	$msg['success']=false;
	        //     echo json_encode($error);
			redirect(base_url().'mydashbor/index?st=failed','refresh');
		}else{
			$data = array('upload_data' =>$this->upload->data());
			$this->model_global->upload('image',$data['upload_data']['file_name'],'id',$_POST['id_det'],'transaksi');
			redirect(base_url().'mydashbor/index?st=success');
			
		}
	}

	public function order()
	{
		if($this->session->userdata('usernameUser') ==""){
			redirect(base_url().'?st=failed');
		}else{
			$data['user'] = $this->model_global->get_data(array('data' => 'row','table' => 'member', 'where' => array('username' => $this->session->userdata('username'))));
			$data['paket'] = $this->model_global->get_data(array('select' => '*', 'table' => 'paket','order_by' => 'id_paket asc'));
			$data['jenis_pakaian'] = $this->model_global->get_data(array('select' => '*', 'table' => 'jenis_pakaian','order_by' => 'id_jenis_pakaian asc'));
			$this->load->view('pages/header',$data);
			$this->load->view('pages/order',$data);
		}
	}	
	public function editprofile()
	{
		if($this->session->userdata('usernameUser') ==""){
			redirect(base_url());
		}else{
			$data['kabupaten'] = $this->regis_model->getKabupaten();
			$query= $this->model_global->view_by($this->session->userdata('id'));
			$data['user']= $query;
			$this->load->view('pages/header',$data);
			$this->load->view('pages/editprofile',$data);
		}
	}	

	public function updateprofile(){
		if($this->session->userdata('usernameUser')==""){
			redirect(base_url().'mydashbor/editprofile?st=failed');
		}else{
			$data['nama'] = $_POST['nama'];
			$data['no_telp'] = $_POST['no_telp'];
			$data['email'] = $_POST['email'];
			$data['alamat'] = $_POST['alamat'];
			$data['id_kabupaten'] = $_POST['kabupaten'];
			$data['tgl_lahir'] = $_POST['tgl_lahir'];
			$data['username'] = $_POST['username'];
			$this->model_global->update('id',$data,'member',$_POST['id']);
			redirect(base_url().'mydashbor/editprofile?st=success');
		}
	}

	public function orderProses(){
		if($_POST['berdasarkan']=="jp"){
			$jp = "true";			

			$data['id_pegawai'] = "1";
			$data['id_member'] = $this->session->userdata['id'];
			$result = $_POST['id_paket'];
			$result_implode = implode('-', $result);
			$result_explode = explode('-',$result_implode);
			$data1 = (int)$result_explode[0];
			$data2 = (int)$result_explode[1];
			$data['id_paket'] = $data1;
			$data['tgl_transaksi'] = $_POST['tgl_transaksi'];
			$data['status'] = 'Not Checked';
			$data['berat_pakaian'] = 0;
			$harga_paket= $result_explode[1];
			$data['total_biaya']= (($_POST['berat_pakaian']*6000) + $data2); 
			$data['status_pembayaran'] = 'Belum Lunas';
			
			$insert_id = $this->model_global->insert($data, 'transaksi');
			$idt = $this->db->insert_id();

			$jp1 = $_POST['id_jp1'];
			$jp2 = $_POST['id_jp2'];
			$jp3 = $_POST['id_jp3'];
			$jp4 = $_POST['id_jp4'];
			$jp5 = $_POST['id_jp5'];
			$jml1= $_POST['jml_pakaian1'];
			$jml2= $_POST['jml_pakaian2'];
			$jml3= $_POST['jml_pakaian3'];
			$jml4= $_POST['jml_pakaian4'];
			$jml5= $_POST['jml_pakaian5'];
			if($jp=="true"){
				if($jp1 != NULL && $jml1!= NULL){
					$result_implode1 = implode('-', $jp1);
					$result_explode1 = explode('-',$result_implode1);
					$datadet11 = (int)$result_explode1[0];
					$datadet12 = (int)$result_explode1[1];
					$datadetil['id_transaksi'] = $idt;
					$datadetil['id_jenis_pakaian'] = $datadet11;
					$datadetil['jml_pakaian'] = $jml1;
					$datadetil['harga_det'] = $datadet12 * $jml1;
					$this->model_global->insert($datadetil, 'detail_transaksi');
				}
				if($jp2 != NULL && $jml2!= NULL){
					$result_implode2 = implode('-', $jp2);
					$result_explode2 = explode('-',$result_implode2);
					$datadet21 = (int)$result_explode2[0];
					$datadet22 = (int)$result_explode2[1];
					$datadetil['id_transaksi'] = $idt;
					$datadetil['id_jenis_pakaian'] = $datadet21;
					$datadetil['jml_pakaian'] = $jml2;
					$datadetil['harga_det'] = $datadet22 * $jml2;
					$this->model_global->insert($datadetil, 'detail_transaksi');
				}
				if($jp3 !="" && $jml3!= NULL){
					$result_implode3 = implode('-', $jp3);
					$result_explode3 = explode('-',$result_implode3);
					$datadet31 = (int)$result_explode3[0];
					$datadet32 = (int)$result_explode3[1];
					$datadetil['id_transaksi'] = $idt;
					$datadetil['id_jenis_pakaian'] = $datadet31;
					$datadetil['jml_pakaian'] = $jml3;
					$datadetil['harga_det'] = $datadet32 * $jml3;
					$this->model_global->insert($datadetil, 'detail_transaksi');
				}
				if($jp4 !="" && $jml4!= NULL){
					$result_implode4 = implode('-', $jp4);
					$result_explode4 = explode('-',$result_implode4);
					$datadet41 = (int)$result_explode4[0];
					$datadet42 = (int)$result_explode4[1];
					$datadetil['id_transaksi'] = $idt;
					$datadetil['id_jenis_pakaian'] = $datadet41;
					$datadetil['jml_pakaian'] = $jml4;
					$datadetil['harga_det'] = $datadet42 * $jml4;
					$this->model_global->insert($datadetil, 'detail_transaksi');
				}
				if($jp5 !="" && $jml5!= NULL){
					$result_implode5 = implode('-', $jp5);
					$result_explode5 = explode('-',$result_implode5);
					$datadet51 = (int)$result_explode5[0];
					$datadet52 = (int)$result_explode5[1];
					$datadetil['id_transaksi'] = $idt;
					$datadetil['id_jenis_pakaian'] = $datadet51;
					$datadetil['jml_pakaian'] = $jml5;
					$datadetil['harga_det'] = $datadet52 * $jml5;
					$this->model_global->insert($datadetil, 'detail_transaksi');
				}
				$where =$this->model_global->max_id('id','transaksi');
				$sum = $this->model_global->sum('harga_det','id_transaksi','detail_transaksi',(int)$where);
				$det = $this->model_global->select('id','total_biaya','transaksi',$where);
				$this->model_global->update_total('id',$sum,$det,'total_biaya','transaksi', $where );
				redirect(base_url().'order?st=success');
			}
		}
		else if($_POST['berdasarkan']=="bp"){
			$jp = "false";
			$status="true";
			$data['id_pegawai'] = '1';
			$data['id_member'] = $this->session->userdata['id'];
			$result = $_POST['id_paket'];
			$result_implode = implode('-', $result);
			$result_explode = explode('-',$result_implode);
			$data1 = (int)$result_explode[0];
			$data2 = (int)$result_explode[1];
			$data['id_paket'] = $data1;
			$data['tgl_transaksi'] = $_POST['tgl_transaksi'];
			$data['status'] = 'Not Checked';
			$data['berat_pakaian'] = $_POST['berat_pakaian'];
			$harga_paket= $result_explode[1];
			$data['total_biaya']= (($_POST['berat_pakaian']*6000) + $data2); 
			$data['status_pembayaran'] = 'Belum Lunas';
			$insert_id = $this->model_global->insert($data, 'transaksi');
			$idt = $this->db->insert_id();
			redirect(base_url().'mydashbor/order?st=success');
		}
		else{
			$status = "false";
			echo "<script>alert('Pilih jenis pakaian');</script>";
			redirect(base_url().'order?st=failed');
		}

	}

	function email()
    {	

		$htmlContent = 	'<div style="border:solid 2px #000; width:100%; padding:40px; font-family:sans-serif;">';
		$htmlContent .= 	'<img src="'.base_url().'image/logoHeader.png" width:100%;>';
		$htmlContent .=		'<H1>Your Booking Has been Accepted </h1>';
		$htmlContent .=			'Thank You For Booking On Our Website Mr/Ms. <b></b><br>';
		$htmlContent .=			'Your Booking Has Been Accepted For <b> Room(s)</b><br>';
		$htmlContent .=			'Your Check In Date is On <b></b><br><br><br>';
		$htmlContent .=		'</center>';
		$htmlContent .=	'Note:<br>';
		$htmlContent .= '*Pay the bill with cash on the spot (at Nyuh Bengkok Tree House)<br>';
		$htmlContent .= '*If you want to cancel your booking please contact us <br>';
		$htmlContent .= '*More information and cancel booking please call : <b>+6289516644259</b>';

        $this->email->to('sujanaputra6@gmail.com');
		$this->email->from('prabahridayami97@gmail.com','test');
		$this->email->subject('testing');
		$this->email->message($htmlContent);
  
		if (!$this->email->send()) {
		show_error($this->email->print_debugger()); }
		else {
		echo "sukses"; 
			}
		

    }
}
