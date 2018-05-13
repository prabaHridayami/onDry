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
			<div class="list-group-item <?php echo cur($now1,'mydashbor')?>">
				<a href='<?php echo base_url()?>mydashbor'>Dasboard</a>
			</div> 
			<div class="list-group-item <?php echo cur($now1,'order')?>">
				<a href='<?php echo base_url()?>order'>Member</a>
			</div>
			<div class="list-group-item <?php echo cur($now1,'editprofile')?>">
				<a href='<?php echo base_url()?>editprofile'>Pegawai</a>
			</div> 			 
		</div>