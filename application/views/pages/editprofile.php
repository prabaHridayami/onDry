
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
	</div>	
	<div class='col-md-9'>
	<?php
			if(isset($_GET['st'])){
				if($_GET['st']=="success"){
					echo"
					<div class='alert alert-success'>
						Update Berhasil
					</div>";
				}else{
					echo"
					<div class='alert alert-danger'>
						Update Gagal
					</div>";
				}
			}
		?>
		<h3>Edit Profile</h3>
		<div class="panel panel-default">
		<div class="panel-heading">
			<div class="row">
				<div class='col-sm-6'><b>Form Edit Profil</b></div>
				<div class='col-sm-6' align='right'></div>
			</div>
		</div>
		<form method="post" action="<?php echo base_url()?>mydashbor/updateprofile">
			<div class="panel-body">
			<div class="form-group">
				<div class="row">
					<div class="col-sm-2">
						<label class="control-label">ID</label>
					</div>
					<div class="col-sm-2">
						<input type="text" name="id" value="<?php echo $user->id;?>" class="form-control" readonly="readonly">
					</div>
				</div>
			</div> 
			<div class="form-group">
				<div class="row">
					<div class="col-sm-2">
						<label class="control-label">Nama</label>
					</div>
					<div class="col-sm-4">
						<input type="text" name="nama" value="<?php echo $user->nama;?>" class="form-control" required>
					</div>
				</div>
			</div> 	
			<div class="form-group">
				<div class="row">
					<div class="col-sm-2">
						<label class="control-label">Nomor Telepon</label>
					</div>
					<div class="col-sm-4">
						<input type="text" name="no_telp" value="<?php echo $user->no_telp;?>" class="form-control" required>
					</div>
				</div>
			</div>
			<div class="form-group">
				<div class="row">
					<div class="col-sm-2">
						<label class="control-label">Email</label>
					</div>
					<div class="col-sm-4">
						<input type="email" name="email" value="<?php echo $user->email;?>" class="form-control" required>
					</div>
				</div>
			</div>
			<div class="form-group">
				<div class="row">
					<div class="col-sm-2">
						<label class="control-label">Username</label>
					</div>
					<div class="col-sm-4">
						<input type="text" name="username" value="<?php echo $user->username;?>" class="form-control" required>
					</div>
				</div>
			</div>
			<div class="form-group">
				<div class="row">
					<div class="col-sm-2">
						<label class="control-label">Tanggal Lahir</label>
					</div>
					<div class="col-sm-4">
						<input type="date" name="tgl_lahir" value="<?php echo $user->tgl_lahir;?>" class="form-control" required>
					</div>
				</div>
			</div>
			<div class="form-group">
				<div class="row">
					<div class="col-sm-2">
						<label class="control-label">Alamat</label>
					</div>
					<div class="col-sm-6">
						<input type="text" name="alamat" value="<?php echo $user->alamat;?>" class="form-control" required>
					</div>
				</div>
			</div>
			<div class="form-group">
				<div class="row">
					<div class="col-sm-2">
						<label class="control-label">Kabupaten</label>
					</div>
					<div class="col-sm-4">
						<select name="kabupaten" class="form-control" required>
							<option value="">Select</option>
							<?php if(isset($kabupaten) && count($kabupaten) > 0): foreach($kabupaten as $row ):
								if(($user->id_kabupaten)==($row->id)){
									echo "<option selected='selected' value=".$user->id_kabupaten.">".$row->nama."</option>";
								} else{
									echo "<option value=".$row->id.">".$row->nama."</option>";
								} endforeach; endif; ?>
						</select>
					</div>
				</div>
			</div>
			<div class="form-group">
				<div class="row">
					<div class="col-sm-2">
						<label class="control-label">Alamat</label>
					</div>
					<div class="col-sm-6">
						<input type="text" name="alamat" value="<?php echo $user->alamat;?>" class="form-control" required>
					</div>
				</div>
			</div>
			<div class="panel-footer">
				<button name="simpan" type="submit" class="button-act" >Simpan</button>
			</div>
		</form>
	</div>	
</div>
<?php $this->load->view('pages/footer');?>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
	    <script>window.jQuery || document.write('<script src="<?php echo base_url()?>js/loader/vendor/jquery-1.9.1.min.js"><\/script>')</script>
	    <script src="<?php echo base_url()?>assets/js/loader/main.js"></script>