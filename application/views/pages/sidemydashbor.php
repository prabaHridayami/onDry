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
			<div class="list-group-item <?=cur($now1,'editprofile')?>">
				<a href='<?=base_url()?>editprofile'>Edit Profile</a>
			</div> 
			<div class="list-group-item <?=cur($now1,'mydashbor')?>">
				<a href='<?=base_url()?>mydashbor'>Dasboard</a>
			</div> 
			<div class="list-group-item <?=cur($now1,'order')?>">
				<a href='<?php echo base_url()?>/mydashbor/order'>Pesan Laundry</a>
			</div> 
		</div>	