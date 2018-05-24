<!DOCTYPE html>

    <link rel="stylesheet" type="text/css" media="all" href="<?php echo base_url()?>assets/css/loader/main.css"/>
    <link rel="stylesheet" type="text/css" media="all" href="<?php echo base_url()?>assets/css/loader/normalize.css"/>
<div id="loader-wrapper">
			<div id="loader"></div>

			<div class="loader-section section-left"></div>
            <div class="loader-section section-right"></div>

		</div>
<div class='container' style="margin-top:50px;">
	<div class='col-md-3'>
	</div>
	<div class='col-md-9'>
		<?php
			if(isset($_GET['st'])){
				if($_GET['st']=="success"){
					echo"
					<div class='alert alert-success'>
						Pesanan telah sampai
					</div>";
				}else{
					echo"
					<div class='alert alert-danger'>
						Pesanan gagal sampai
					</div>";
				}
			}
		?>
		<h3>Dashbor</h3>
		<div class="panel panel-default">
			<div class="panel-heading">
                <p>Daftar Antar</p>
            </div>	
            <div class="panel-body">
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
                            <td style="text-align: center;"><?php echo $row->tgl_transaksi; ?></td>
							<td style="text-align: center;"><?php echo $row->id; ?></td>
							<td style="text-align: center;"><?php echo $row->nama_paket;?>(Rp. <?php echo $row->harga_paket?>)</td>
							<td style="text-align: center;"><?php echo $row->berat_pakaian; ?></td>
							<td style="text-align: center;">Rp.<?php echo $row->total_biaya; ?></td>
							<td style="text-align: center;"><?php echo $row->status; ?></td>
							<td style="text-align: center;"><?php echo $row->status_pembayaran; ?></td>
                            <td >
                                <?php
                                        echo "<form method='post' action='".base_url()."admins/action'>
                                        <input type='hidden' name='id_trans' value='".$row->id."'/>
                                        <input type='hidden' name='status' value='".$row->status."'/>	
                                        <button class='button'>Sampai</button>
                                        </form>";
                                    }
                            ?></td><td>
                                <?php 
                                    if($row->berat_pakaian==0){
                                        echo "<form method='post' action='".base_url()."admins/detail'>
                                                <input type='hidden' name='id_det' value='".$row->id."'/>
                                                <button type='submit' class='button'>Detail</button>
                                            </form>";
                                    }	
                                ?>
                                </td>
                                <td>
                                <?php 
                                    if($row->image!=""){
                                        echo "<form method='post' action='".base_url()."admins/bukti'>
                                                <input type='hidden' name='image' value='".$row->image."'/>
                                                <button type='submit' class='button'>Bukti</button>
                                            </form>";
                                    }	
                                ?>
                                </td>
                            </tr>
                            <?php
                                }

                            ?>
                        </table>
                        <div class="panel-footer">
						    <?php echo $pagination; ?>
					    </div>
                    </div>
                </div>
            </div>
            <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
	    <script>window.jQuery || document.write('<script src="<?php echo base_url()?>js/loader/vendor/jquery-1.9.1.min.js"><\/script>')</script>
	    <script src="<?php echo base_url()?>assets/js/loader/main.js"></script>







