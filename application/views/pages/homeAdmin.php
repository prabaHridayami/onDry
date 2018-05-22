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
                                <td style="text-align: center;"><?php echo $row->status_pembayaran; ?></td>
                                <td >
                                    <?php
                                        if($row->status=='Not Checked'){
                                            echo "<form method='post' action='".base_url()."admins/action'>
                                            <input type='hidden' name='id_trans' value='".$row->id."'/>
                                            <input type='hidden' name='status' value='".$row->status."'/>	
                                            <button class='button-red'>Proses</button>
                                            </form>";
                                        }else if($row->status=='Proses'){
                                                echo "<form method='post' action='".base_url()."admins/action'>
                                                <input type='hidden' name='id_trans' value='".$row->id."'/>
                                                <input type='hidden' name='status' value='".$row->status."'/>	
                                                <button class='button'>Finished</button>
                                                </form>";
                                        }else if($row->status=='Selesai'){
                                            echo "<form method='post' action='".base_url()."admins/action'>
                                            <input type='hidden' name='id_trans' value='".$row->id."'/>
                                            <input type='hidden' name='status' value='".$row->status."'/>	
                                            <button class='button'>Diantar</button>
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
                                            echo "
                                                    <button type='submit' class='button-green' data-toggle='modal' data-target='#myModal'>Bukti</button>
                                                ";
                                        }	
                                    ?>
                                                                <!-- Modal -->
                                    <div id="myModal" class="modal fade" role="dialog">
                                    <div class="modal-dialog">

                                        <!-- Modal content-->
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h4 class="modal-title" style="text-align:center;">Bukti Pembayaran</h4>
                                        </div>
                                        <div class="modal-body" style="width:300px; width:500px; margin-left:8%;">
                                            <?php echo "<img src='".base_url()."image/".$row->image."'>";?>
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
</body>	


        