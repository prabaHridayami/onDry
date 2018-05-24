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
            <?php
                $this->load->view('pages/sideAdmin');
            ?>
            <?php function format_ribuan ($nilai){
                return number_format ($nilai, 0, ',', '.');
            } ?>
        
        </div>
        <div class='col-md-9'>
            <?php
                if(isset($_GET['st'])){
                    if($_GET['st']=="success"){
                        echo"
                        <div class='alert alert-success'>
                            Aksi berhasil
                        </div>";
                    }else{
                        echo"
                        <div class='alert alert-danger'>
                            Aksi gagal
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
                                    <th colspan="2" style="text-align: center;">Action</th>
                                </thead>
                                <?php 
                                if($trans!=""){
                                    foreach($trans as $row ){ ?>
                                <tr>
                                <td style="text-align: center;"><?php echo $row->tgl_transaksi; ?></td>
                                <td style="text-align: center;"><?php echo $row->id; ?></td>
                                <td style="text-align: center;"><?php echo $row->nama_paket;?>(Rp. <?php echo $row->harga_paket?>)</td>
                                <td style="text-align: center;"><?php echo $row->berat_pakaian; ?></td>
                                <td style="text-align: center;">Rp.<?php echo format_ribuan($row->total_biaya); ?></td>
                                <td style="text-align: center;"><?php echo $row->status; ?></td>
                                <td style="text-align: center;"><?php echo $row->status_pembayaran; ?></td>
                                    <?php
                                        if($row->status=='Not Checked'){
                                            echo "<td><form method='post' action='".base_url()."admins/action'>
                                            <input type='hidden' name='id_trans' value='".$row->id."'/>
                                            <input type='hidden' name='id_member' value='".$row->id_member."'/>
                                            <input type='hidden' name='status' value='".$row->status."'/>	
                                            <button class='button-red'><i class='fa fa-history'></i></button>
                                            </form></td>";
                                        }else if($row->status=='Proses'){
                                                echo "<td><form method='post' action='".base_url()."admins/action'>
                                                <input type='hidden' name='id_trans' value='".$row->id."'/>
                                                <input type='hidden' name='status' value='".$row->status."'/>	
                                                <button class='button-blue'><i class='fa fa-flag'></i></button>
                                                </form></td>";
                                        }else if($row->status=='Selesai'){
                                            
                                            echo "</td><button class='button' data-toggle='modal' data-target='.bs-example-modal-sm'><i class='fa fa-car'></i></button></td>";
                                        }else{

                                        }?>
                                         <div class="modal bs-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true">
                                                <div class="modal-dialog modal-sm">
                                                    <div class="modal-content">
                                                    <div class="modal-header"><h4>Pilih Driver<i class="fa fa-lock"></i></h4></div>
                                                    <div class="modal-body"><i class="fa fa-question-circle"></i> 
                                                        <form method="post" action="<?=base_url()?>admins/action">
                                                            <input type='hidden' name='id_trans' value="<?php echo $row->id ?>"/>
                                                            <input type='hidden' name='status' value="<?php echo $row->status ?>"/>
                                                            <select name="id_driver" class='form-control' style='float:left; width: calc(100% - 26px);'>
                                                            <option disabled selected value="">Select</option>
                                                            <?php if($pegawai!=''){
                                                                foreach($pegawai as $pegawai ){
                                                                    echo "<option value='".$pegawai->id."'>".$pegawai->id."</option>";
                                                                }
                                                            } ?>
                                                        </select>	
                                                            <button class="btn btn-primary btn-block">Pilih</button>
                                                        </form>
                                            
                                    
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <?php 
                                        if($row->berat_pakaian==0){
                                            echo "<form method='post' action='".base_url()."admins/detail'>
                                                    <input type='hidden' name='id_det' value='".$row->id."'/>
                                                    <button type='submit' class='button'><i class='fa fa-reorder'></i></button>
                                                </form>";
                                        }	
                                    ?>
                                    </td>
                                    <td>

                                    <?php 
                                        if($row->image!=""){
                                            echo "
                                                    <button type='submit' class='button-green' data-toggle='modal' data-target='#myModal".$row->id."'><i class='fa fa-camera'></i></button>
                                                ";
                                        }	
                                    ?>
                                        <!-- Modal -->
                                        <div id="myModal<?=$row->id?>" class="modal fade" role="dialog">
                                        <div class="modal-dialog">

                                            <!-- Modal content-->
                                            <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                <h4 class="modal-title" style="text-align:center;">Bukti Pembayaran</h4>
                                            </div>
                                            <div class="modal-body" style="width:300px; width:500px; margin-left:8%;">
                                               <img src="<?php echo base_url('image/'.$row->image);?>" >
                                            </div>
                                            <div class="modal-footer"></div>
                                        </div>
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
                </div>
            </div>
        </div>
    </div>
    
<?php $this->load->view('pages/footer');?>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
	    <script>window.jQuery || document.write('<script src="<?php echo base_url()?>js/loader/vendor/jquery-1.9.1.min.js"><\/script>')</script>
	    <script src="<?php echo base_url()?>assets/js/loader/main.js"></script>


        