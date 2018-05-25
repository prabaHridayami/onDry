<?php
	function lol($l,$j){
		if($j == $l){
			echo "active";
		}
	}
	$now1 = $this->uri->segment(1);  
?>
    <nav>
        <div class="pull-left" style="margin: -50px 0 0 20px;">
            <ul class="list-inline">
                <li>
                    <div class="list-group-item <?php echo lol($now1,'admins')?>">
                        <a href='<?php echo base_url()?>admins'>Not Checked</a>
                    </div>
                </li>
                <li>
                    <div class="list-group-item <?php echo lol($now1,'proses')?>">
                        <a href='<?php echo base_url()?>proses'>Processed</a>
                    </div>
                </li>
                <li>
                    <div class="list-group-item <?php echo lol($now1,'selesai')?>">
                        <a href='<?php echo base_url()?>selesai'>Finished</a>
                    </div>
                </li>
                <li>
                    <div class="list-group-item <?php echo lol($now1,'diantar')?>">
                        <a href='<?php echo base_url()?>diantar'>Diantar</a>
                    </div>
                </li>
                <li>
                    <div class="list-group-item <?php echo lol($now1,'sampai')?>">
                        <a href='<?php echo base_url()?>sampai'>Sampai</a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>