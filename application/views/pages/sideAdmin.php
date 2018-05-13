<?php
	function cur($l,$j){
		if($j == $l){
			echo "active";
		}
	}
	$now1 = $this->uri->segment(1);  
?>
		<div class="list-group ">
			<div class="list-group-item head"><b>Sidebar Menu</b></div>
			<div class="list-group-item <?php echo cur($now1,'admins')?>">
				<a href='<?php echo base_url()?>admins'>Dasboard</a>
			</div> 
			<div class="list-group-item <?php echo cur($now1,'member')?>">
				<a href='<?php echo base_url()?>member'>Member</a>
			</div>
			<div class="list-group-item <?php echo cur($now1,'pegawai')?>">
				<a href='<?php echo base_url()?>pegawai'>Pegawai</a>
			</div> 			 
		</div>