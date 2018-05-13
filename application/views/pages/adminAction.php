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
                            <a href='<?php echo base_url()?>mydashbor'>Not Checked</a>
                        </div> 
                    </li> 
                    <li>
                        <div class="list-group-item <?php echo lol($now1,'order')?>">
				            <a href='<?php echo base_url()?>mydashbor'>Processed</a>
			            </div> 
                    </li>
                    <li>
                        <div class="list-group-item <?php echo lol($now1,'order')?>">
				            <a href='<?php echo base_url()?>order'>Finished</a>
			            </div>
                    </li>
                </ul>
            </div>
        </nav>
			
			
		