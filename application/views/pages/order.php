
    <link rel="stylesheet" type="text/css" media="all" href="<?php echo base_url()?>assets/css/loader/main.css"/>
    <link rel="stylesheet" type="text/css" media="all" href="<?php echo base_url()?>assets/css/loader/normalize.css"/>
<div id="loader-wrapper">
			<div id="loader"></div>

			<div class="loader-section section-left"></div>
            <div class="loader-section section-right"></div>

		</div>

<div class='container' style="margin-top:50px;">
	<div class='col-md-3'>
		<?php
			$this->load->view('pages/sidemydashbor');
		?>
		<div class="panel panel-default" style="">
			<div class="panel-heading" style="background:#032F3E; color:#fff;">
				<b>Promo</b>
			</div>
			<img src="<?php echo base_url()?>assets/image/09.png">
			<img src="<?php echo base_url()?>assets/image/10.png">
			<div class="panel-footer" style="background:#032F3E;"></div>
		</div>
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
		<h3>New Order</h3>
		<div class="panel panel-default">
			<div class="panel-heading">
				<div class="row">
					<div class='col-sm-6'><b>Form Order</b></div>
					<div class='col-sm-6' align='right'></div>
				</div>
			</div>		

			<form method="post" action="<?php echo base_url()?>Mydashbor/orderProses" >
				<div class="panel-body">
					<div class="form-group">
						<div class="row">
							<div class="col-sm-3">
								<label class="control-label">Tanggal <span class="text-danger">*</span></label>
							</div>
							<div class="col-sm-4">
								<?php date_default_timezone_set('Singapore');?>
								<input type='date' name='tgl_transaksi' value='<?=date("Y-m-d")?>' class='form-control'>
								<input type='time' name='time_transaksi' readonly value='<?=date("H:i:s")?>' class='form-control'>
							</div>
						</div>
					</div> 			
					<div class="form-group">
						<div class="row">
							<div class="col-sm-3">
								<label class="control-label">Paket <span class="text-danger">*</span></label>
							</div>
							<div class="col-sm-4">
								<select name="id_paket[]" class="form-control" required>
									<option value="">Select</option>
									<?php
									if(isset($paket) && count($paket) > 0): foreach($paket as $row ):?>
										<option value="<?=$row['id_paket']."-".$row['harga_paket'];?>"><?=$row['nama_paket']."( ".$row['durasi/hari']." jam) (Rp. ".number_format($row['harga_paket'],2,",",".").")";?></option>  
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
							<div class="col-sm-3"> 
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
								<input type='number' name='berat_pakaian' id='berat_pakaian' class='form-control ' placeholder='Satuan Kg' min="1">
							</div>
						</div>
					</div>  
					<div class="form-group" id='divjp'>
						<input id="idf" value="1" type="hidden" />
						<div class="row">
							<div class="col-sm-3">
								<label class="control-label">Jenis Pakaian <span class="text-danger">*</span></label>
							</div>
							<div>
								<div class="col-sm-4" style="float: left;">
									<select name="id_jp1[]" class="form-control" >
										<option value="">Select</option>
										<?php
										if(isset($jenis_pakaian) && count($jenis_pakaian) > 0): foreach($jenis_pakaian as $row ):?>
											<option value="<?=$row['id_jenis_pakaian']."-".$row['harga'];?>" ><?=$row['nama']."(Rp. ".number_format($row['harga'],2,",",".").")";?></option>  
										<?php endforeach; endif;  ?>
									</select>
								</div>
								<div class="col-sm-2" id="jenis_pakaian">
									<input type='number' name='jml_pakaian1' id='jml_pakaian'  class='form-control' placeholder='pcs' min="1">
								</div>
							</div>		
						</div>
						<div class="row" style="margin-top:10px;">
							<div class="col-sm-4" style="float: left; margin-left:205px;">
								<select name="id_jp2[]" class="form-control" >
									<option value="">Select</option>
									<?php
									if(isset($jenis_pakaian) && count($jenis_pakaian) > 0): foreach($jenis_pakaian as $row ):?>
										<option value="<?=$row['id_jenis_pakaian']."-".$row['harga'];?>" ><?=$row['nama']."(Rp. ".number_format($row['harga'],2,",",".").")";?></option>  
									<?php endforeach; endif;  ?>
								</select>
							</div>
							<div class="col-sm-2" id="jenis_pakaian">
								<input type='number' name='jml_pakaian2' id='jml_pakaian'   class='form-control ' placeholder='pcs' min="1">
							</div>
						</div>
						<div class="row" style="margin-top:10px;">
							<div class="col-sm-4" style="float: left; margin-left:205px;">
								<select name="id_jp3[]" class="form-control" >
									<option value="">Select</option>
									<?php
									if(isset($jenis_pakaian) && count($jenis_pakaian) > 0): foreach($jenis_pakaian as $row ):?>
										<option value="<?=$row['id_jenis_pakaian']."-".$row['harga'];?>" ><?=$row['nama']."(Rp. ".number_format($row['harga'],2,",",".").")";?></option>  
									<?php endforeach; endif;  ?>
								</select>
							</div>
							<div class="col-sm-2" id="jenis_pakaian">
								<input type='number' name='jml_pakaian3' id='jml_pakaian'   class='form-control ' placeholder='pcs' min="1">
							</div>
						</div>
						<div class="row" style="margin-top:10px;">
							<div class="col-sm-4" style="float: left; margin-left:205px;">
								<select name="id_jp4[]" class="form-control" >
									<option value="">Select</option>
									<?php
									if(isset($jenis_pakaian) && count($jenis_pakaian) > 0): foreach($jenis_pakaian as $row ):?>
										<option value="<?=$row['id_jenis_pakaian']."-".$row['harga'];?>" ><?=$row['nama']."(Rp. ".number_format($row['harga'],2,",",".").")";?></option>  
									<?php endforeach; endif;  ?>
								</select>
							</div>
							<div class="col-sm-2" id="jenis_pakaian">
								<input type='number' name='jml_pakaian4' id='jml_pakaian'   class='form-control ' placeholder='pcs' min="1">
							</div>
						</div>
						<div class="row" style="margin-top:10px;">
							<div class="col-sm-4" style="float: left; margin-left:205px;">
								<select name="id_jp5[]" class="form-control">
									<option value="">Select</option>
									<?php
									if(isset($jenis_pakaian) && count($jenis_pakaian) > 0): foreach($jenis_pakaian as $row ):?>
										<option value="<?=$row['id_jenis_pakaian']."-".$row['harga'];?>" ><?=$row['nama']."(Rp. ".number_format($row['harga'],2,",",".").")";?></option>  
									<?php endforeach; endif;  ?>
								</select>
							</div>
							<div class="col-sm-2" id="jenis_pakaian">
								<input type='number' name='jml_pakaian5' id='jml_pakaian'   class='form-control ' placeholder='pcs' min="1">
							</div>
						</div>									
					</div>
				</div>
				<div class="panel-footer">
					<input type="submit" onclick=" " class="button-act" value="Order"/>	 
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
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
	    <script>window.jQuery || document.write('<script src="<?php echo base_url()?>js/loader/vendor/jquery-1.9.1.min.js"><\/script>')</script>
	    <script src="<?php echo base_url()?>assets/js/loader/main.js"></script>