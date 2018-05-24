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
						Upload bukti pembayaran berhasil. Pesanan anda akan segera check.
					</div>";
				}else{
					echo"
					<div class='alert alert-danger'>
						Upload bukti pembayaran gagal
					</div>";
				}
			}
		?>
		<h3>My Dashboard</h3>
		<div class="panel panel-default" style="">
			<div class="panel-heading">
				<div class="row">
					<div class='col-sm-6'><b>My Order</b></div>
					<div class='col-sm-6' align='right'></div>
				</div>
			</div>
			<div class="tab-content" id="myTable">
				<div id="home" class="tab-fane in active">
					<table class="table table-striped table-hover table-condensed">
						<thead>
							<!-- <th style="text-align: center; width: 50px;">IDM</th> -->
							<th style="text-align: center; width: 100px;">Tanggal</th>
							<th style="text-align: center; width: 50px;">ID</th>
							<th style="text-align: center; width: 150px;">Paket</th>
							<th style="text-align: center; width: 30px;">Kilo/Pcs</th>
							<th style="text-align: center; width: 100px;">Total</th>
							<th style="text-align: center; width: 120px;">Status</th>
							<th style="text-align: center; width: 120px;">Keterangan</th>
							<th colspan="2" style="text-align: center; width: 100px;">Action</th>
						</thead>
						<?php 
						if($trans!=""){
							foreach($trans as $row ){ ?>
						<tr>
							<!-- <td style="text-align: center;"><?php echo $row->id_member; ?></td> -->
							<td style="text-align: center;"><?php echo $row->tgl_transaksi; ?></td>
							<td style="text-align: center;"><?php echo $row->id; ?></td>
							<td style="text-align: center;"><?php echo $row->nama_paket;?>(Rp. <?php echo $row->harga_paket?>)</td>
							<td style="text-align: center;"><?php echo $row->berat_pakaian; ?></td>
							<td style="text-align: center;">Rp.<?php echo $row->total_biaya; ?></td>
							<td id="statusC" style="text-align:center; color:#d7481d;"><?php echo $row->status?></td>
							<td style="text-align: center; color:#12159f;"><?php echo $row->status_pembayaran; ?></td>
							<td >
								<form method="post" action="<?php echo base_url('upload')?>">
									<input type="hidden" name="id_det" value="<?php echo $row->id;?>"/>	
									<button class="button">Upload</button>
								</form></td>
							<td>
							<?php 
								if($row->berat_pakaian==0){
									echo "<form method='post' action='".base_url()."Mydashbor/detail'>
											<input type='hidden' name='id_det' value='".$row->id."'/>
											<button type='submit' class='button'>Detail</button>
										</form>";
								}	
							?>
							</td>
							<td>
							<?php 
								if($row->image!=""){
									echo "
											<button type='submit' class='button-green' data-toggle='modal' data-target='#myModal".$row->id."'>Bukti</button>
										";
								}	
							?>
														<!-- Modal -->
							<div id="myModal<?=$row->id?>" class="modal fade" role="dialog">
							<div class="modal-dialog">

								<!-- Modal content-->
								<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal">&times;</button>
									<h4 class="modal-title" style="text-align:center;">Bukti Pembayaran</h4>
								</div>
								<div class="modal-body" style="width:300px; width:500px; margin-left:8%;">
									<?php echo "<img src='".base_url()."image/".$row->image."'>";?>
								</div>
								<div class="modal-footer"></div>
								</div>
							</td>
						</tr>
						<?php
							}
						}
						?>
					</table>
					<div class="panel-footer">
						 <?php echo $pagination; ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php $this->load->view('pages/footer');?>