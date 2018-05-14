<!DOCTYPE html>
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
		<h3>Dashbor</h3>
		<div class="panel panel-default">
			<div class="panel-heading">
				<div class="row">
                    <?php 
                        $this->load->view('pages/adminAction'); 
                    ?>
                </div>
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
                                    if($row->status=='Not Checked'){
                                        echo "<form method='post' action='".base_url()."mydashbor/uploadIndex'>
                                        <input type='hidden' name='id_det' value='".$row->id."'/>	
                                        <button class='button'>Proses</button>
                                        </form>";
                                    }else if($row->status=='Proses'){
                                            echo "<form method='post' action='".base_url()."mydashbor/uploadIndex'>
                                            <input type='hidden' name='id_det' value='".$row->id."'/>	
                                            <button class='button'>Finished</button>
                                            </form>";
                                    }else if($row->status=='Selesai'){
                                        echo "<form method='post' action='".base_url()."mydashbor/uploadIndex'>
                                        <input type='hidden' name='id_det' value='".$row->id."'/>	
                                        <button class='button'>Diantar</button>
                                        </form>";
                                    }else{	
                                        "<button class='button' disabled>Proses</button>";
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
            <?php $this->load->view('pages/footer');?>	








<!-- <div class="mainContent" id="mainContent">
            <div class="contentHeader">
                <h3>
                    <b>DASHBOARD</b>
                </h3>
                <hr>

            </div>

                        <div class="contentHeader content" id="contentHeader">
                <ul class="nav nav-pills" style="margin-bottom: 5px">
                    <li class="active">
                        <a data-toggle="tab" href="#menu1" style="font-family: sans-serif">
                            <span>Not Checked</span>
                            <span style="margin-left: 10px;background: #dd4b39;color: white;padding-left: 5px;padding-right: 5px">
                            </span>
                        </a>
                    </li>
                    <li>
                        <a data-toggle="tab" href="#menu4" style="font-family: sans-serif">
                            <span>Progres</span>
                            <span style="margin-left: 10px;background: #f39c12;color: white;padding-left: 5px;padding-right: 5px">

                            </span>
                        </a>
                    </li>
                    <li>
                        <a data-toggle="tab" href="#menu3" style="font-family: sans-serif">
                            <span>Selesai</span>
                            <span style="margin-left: 10px;background: #00a65a;color: white;padding-left: 5px;padding-right: 5px">

                            </span>
                        </a>
                    </li>

                    <li class="search" style="float: right">
                        <div class="input-group stylish-input-group">
                            <input type="text" class="form-control" placeholder="Search" id="myInput" onkeyup="myFunction()">
                            <span class="input-group-addon">
                                <button type="submit">
                                    <span class="glyphicon glyphicon-search"></span>
                                </button>
                            </span>
                        </div>
                    </li>
                    <li style="float: right;width: 20%">
                        <div class="form-group">
                            <label class="col-sm-7 control-label" style="margin-top: 8px;padding-left: 25px">Data Entris</label>
                            <div class="col-sm-5" style="padding-left: 0px">
                                <select class="form-control" name="selectedValue" id="selectedValue" onchange="window.location.href=this.value">
                                    <option disabled selected style="display:none;">10
                                    </option>
                                    <option value="">10</option>
                                    <option value="">15</option>
                                    <option value="">20</option>
                                </select>
                            </div>
                        </div>
                    </li>
                </ul>
                <div class="tab-content" id="myTable">
                    <div id="home" class="tab-fane in active">
                        <hr>
                        <table>
                            <thead>
                                <th style="text-align: center">ID</th>
                                <th style="text-align: center">Nama</th>
                                <th style="text-align: center">Nomor Telepon</th>
                                <th style="text-align: center">Alamat</th>
                                <th style="text-align: center">Kabupaten</th>
                                <th style="text-align: center">Tanggal Transaksi</th>
                                <th style="text-align: center">Status</th>
                                <th style="text-align: center">Action</th>
                            </thead>

                            <tr>
                                <td>1</td>
                                <td>Owen Nirvana</td>
                                <td>085829706523</td>
                                <td>Jln. Goa Gong</td>
                                <td>Badung</td>
                                <td>2018-04-16 11:45:46 </td>
                                <td style="text-align: center">
                                    <span style="background: #dd4b39;padding: 5px;color: white;border-radius: 6px;text-align: center;width: 90%">
                                        <h6>Not Checked</h6>
                                    </span>
                                </td>
                                <td>
                                    <a href="#">
                                        <i class="glyphicon glyphicon-check" style="color: green"></i>
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Bayu Bahari</td>
                                <td>085829706523</td>
                                <td>Jln. Sedap Malam</td>
                                <td>Denpasar</td>
                                <td>2018-04-16 11:45:46 </td>
                                <td style="text-align: center">
                                    <span style="background: #f39c12;padding: 5px;color: white;border-radius: 6px;text-align: center;width: 90%;padding-top: 5px">
                                        <h6>Progres</h6>
                                    </span>
                                </td>
                                <td>
                                    <a href="#">
                                        <i class="glyphicon glyphicon-check" style="color: green"></i>
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>Praba</td>
                                <td>085829706523</td>
                                <td>Jln. Nusantara</td>
                                <td>Tabanan</td>
                                <td>2018-04-16 11:45:46 </td>
                                <td style="text-align: center">
                                    <span style="background: #00a65a;padding: 5px;color: white;border-radius: 6px;text-align: center;width: 90%">
                                        <h6>Finish</h6>
                                    </span>
                                </td>
                                <td>
                                    <a href="#">
                                        <i class="glyphicon glyphicon-check" style="color: green"></i>
                                    </a>
                                </td>
                            </tr>
                            <tr>
                        </table>
                    </div>
                </div> -->
