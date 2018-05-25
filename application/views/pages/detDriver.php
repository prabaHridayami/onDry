<link rel="stylesheet" type="text/css" media="all" href="<?php echo base_url()?>assets/css/loader/main.css" />
<link rel="stylesheet" type="text/css" media="all" href="<?php echo base_url()?>assets/css/loader/normalize.css" />
<div id="loader-wrapper">
	<div id="loader"></div>

	<div class="loader-section section-left"></div>
	<div class="loader-section section-right"></div>

</div>
<div class='container' style="margin-top:50px; margin-left:17%;">
	<div class='col-md-9'>
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
							<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
							<script>window.jQuery || document.write('<script src="<?php echo base_url()?>js/loader/vendor/jquery-1.9.1.min.js"><\/script>')</script>
							<script src="<?php echo base_url()?>assets/js/loader/main.js"></script>