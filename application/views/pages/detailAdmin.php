<div class='container' style="margin-top:50px;">
	<div class='col-md-3'>
		<?php
			$this->load->view('pages/sideAdmin');
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
			<h3>Detail</h3>
			<div class="panel panel-default">
				<div class="panel-heading">
					<div class="row">
						<div class='col-sm-6'>
							<b>Detail Pesanan</b>
						</div>
						<div class='col-sm-6' align='right'></div>
					</div>
				</div>
				<div class="tab-content" id="myTable">
					<div id="home" class="tab-fane in active">
						<table class="table table-striped table-hover table-condensed">
							<thead>
								<!-- <th style="text-align: center; width: 50px;">IDM</th> -->
								<th style="text-align: center; width: 50px;">No</th>
								<th style="text-align: center; width: 150px;">Jenis Pakaian</th>
								<th style="text-align: center; width: 50px;">Jumlah</th>
								<th style="text-align: center; width: 150px;">Harga/Pcs</th>
								<th style="text-align: center; width: 150px;">Total</th>
							</thead>
							<?php 
						if($det!=""){
                            $no=1;
							foreach($det as $row ){ ?>
							<tr>
								<td style="text-align: center;">
									<?php echo $no++; ?>
								</td>
								<td style="text-align: center;">
									<?php echo $row->nama; ?>
								</td>
								<td style="text-align: center;">
									<?php echo $row->jml_pakaian; ?>
								</td>
								<td style="text-align: center;">
									<?php echo $row->harga;?>
								</td>
								<td style="text-align: center;">
									<?php echo $row->harga_det; ?>
								</td>
							</tr>
							<?php
							}
						}
						?>