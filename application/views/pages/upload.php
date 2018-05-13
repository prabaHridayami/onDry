<div class='container' style="margin-top:50px;">
	<div class='col-md-3'>
		<?php
			$this->load->view('pages/sidemydashbor');
		?>
	
	</div>
	<div class='col-md-9'>
		<?php
			if(isset($_GET['st'])){
				if($_GET['st']=="success"){
					echo"
					<div class='alert alert-success'>
						Order Berhasil.
						Silahkan upload bukti transfer pada dashbor, sehingga pesanan dapat diproses.
					</div>";
				}else{
					echo"
					<div class='alert alert-danger'>
						Order Gagal
					</div>";
				}
			}
		?>
		<h3>Pembayaran</h3>
		<div class="panel panel-default">
			<div class="panel-heading">
				<div class="row">
					<div class='col-sm-6'><b>Form Pembayaran </b></div>
					<div class='col-sm-6' align='right'></div>
				</div>
			</div>		

			<form method="post" action="<?php echo base_url()?>Mydashbor/upload" >
				<div class="panel-body">
					<div class="form-group">
						<div class="row">
							<div class="col-sm-3">
								<label class="control-label">Upload Bukti <span class="text-danger">*</span></label>
							</div>
							<div class="col-sm-4">
								<input type='file' name='bukti' class='form-control'>
							</div>
						</div>
					</div> 	
                </div>
                <div class="panel-footer">
					<input type="submit" onclick=" " class="button-act" value="Upload"/>	 
				</div>