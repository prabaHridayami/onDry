
<div class='container' style="margin-top:220px;">
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
						Order Berhasil
					</div>";
				}else{
					echo"
					<div class='alert alert-danger'>
						Order Gagal
					</div>";
				}
			}
		?>
		<h3>New Order</h3>
		<div class="panel panel-default">
			<div class="panel-heading">
				<div class="row">
					<div class='col-sm-6'><b>Form Order</b></div>
					<div class='col-sm-6' align='right'>

					</div>
				</div>
			</div>		
			<form action="<?=base_url()?>mydashbor/orderProses" method="post" data-parsley-validate enctype="multipart/form-data">
				<input type='hidden' name='id_member' value='<?=$user['id']?>'>
				<input type='hidden' name='status' value='Not Checked'>
				<input type='hidden' name='status_pembayaran' value='Belum Lunas'>
				<div class="panel-body">
					<div class="form-group">
						<div class="row">
							<div class="col-sm-3">
								<label class="control-label">Tanggal <span class="text-danger">*</span></label>
							</div>
							<div class="col-sm-4">
								<input type='text' name='tgl_transaksi' readonly value='<?=date("Y-m-d h:i:s")?>' class='form-control'>
							</div>
						</div>
					</div> 			
					<div class="form-group">
						<div class="row">
							<div class="col-sm-3">
								<label class="control-label">Paket <span class="text-danger">*</span></label>
							</div>
							<div class="col-sm-4">
								<select name="id_paket" class="form-control" required>
									<option value="">Select</option>
									<?php
									if(isset($paket) && count($paket) > 0): foreach($paket as $row ):?>
										<option value="<?=$row['id']?>" ><?=$row['nama']." (Rp. ".number_format($row['harga'],2,",",".").")";?></option>  
									<?php endforeach; endif;  ?>
								</select>
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="row">
							<div class="col-sm-3">
								<label class="control-label">Antar <span class="text-danger">*</span></label>
							</div>
							<div class="col-sm-4">
								<select name="id_antar" class="form-control" required>
									<option value="">Select</option>
									<?php
									if(isset($antar) && count($antar) > 0): foreach($antar as $row ):?>
										<option value="<?=$row['id']?>" ><?=$row['nama']." (Rp. ".number_format($row['harga'],2,",",".").")";?></option>  
									<?php endforeach; endif;  ?>
								</select>
							</div>
						</div>
					</div> 			
					<div class="form-group">
						<div class="row">
							<div class="col-sm-3">
								<label class="control-label">Kategori <span class="text-danger">*</span></label>
							</div>
							<div class="col-sm-4">
								<select name="id_kategori" class="form-control" required>
									<option value="">Select</option>
									<?php
									if(isset($kategori) && count($kategori) > 0): foreach($kategori as $row ):?>
										<option value="<?=$row['id']?>"  ><?=$row['nama']." (Rp. ".number_format($row['harga'],2,",",".").")";?></option>  
									<?php endforeach; endif;  ?>
								</select>
							</div>
						</div>
					</div> 			
					<div class="form-group">
						<div class="row">
							<div class="col-sm-3">
								<label class="control-label">Berdasarkan<span class="text-danger">*</span></label>
							</div>
							<div class="col-sm-2"> 
								<label>Jenis Pakaian <input type='radio' id='jp' name='berdasarkan' required value='jp'></label>
								<label>Berat Pakaian <input type='radio' id='bp' name='berdasarkan' required value='bp'></label>
							</div>
						</div>
					</div>  
					<div class="form-group" id='divbp'>
						<div class="row">
							<div class="col-sm-3">
								<label class="control-label">Berat Pakaian <span class="text-danger">*</span></label>
							</div>
							<div class="col-sm-2"> 
								<input type='number' name='berat_pakaian' id='berat_pakaian'   class='form-control ' placeholder='Satuan Kg'>
							</div>
						</div>
					</div>  
					<div class="form-group" id='divjp'>
						<div class="row">
							<div class="col-sm-3">
								<label class="control-label">Jenis Pakaian <span class="text-danger">*</span></label>
							</div>
							<div class="col-sm-8"> 
								<?php
									$no=1;
									if(isset($jenis) && count($jenis) > 0): foreach($jenis as $row ):
										echo "<label><input  type='checkbox' name='jenis[]' value='".$row['id']."'> ".$row['nama']." (".number_format($row['harga'],2,",",".").")</label><br>";
										$no++;
									endforeach;endif;
								?>
							</div>
						</div>
					</div>  		
				</div>
				
				<div class="panel-footer">
					<input type="submit" onclick=" " class="btn btn-sm btn-primary" value="Order">
				</div>
			</form>		
		
		</div>
	</div>
</div>
<?php $this->load->view('pages/footer');?>
<script>
	$('#divjp').hide();$('#divbp').hide();
	
	$('#jp').click(function(){
		$('#divjp').show();
		$('#divbp').hide();
		$('#berat_pakaian').removeAttr('required');
	});
	$('#bp').click(function(){
		$('#divbp').show();
		$('#divjp').hide();
		$('#berat_pakaian').attr('required','required');
	});
</script>