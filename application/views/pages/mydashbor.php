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
		<div class="panel panel-default">
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
							<td style="text-align: center;"><?php echo $row->status; ?></td>
							<td style="text-align: center;"><?php echo $row->status_pembayaran; ?></td>
							<td ><form method="post" action=<?php base_url()?>"uploadIndex">
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
		<!-- Trigger the modal with a button -->
<button type="button" class="button" data-toggle="modal" data-target="#myModal">Open Modal</button>

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Modal Header</h4>
      </div>
      <div class="modal-body">
        <p>Some text in the modal.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="button" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
	</div>
</div>
<?php $this->load->view('pages/footer');?>