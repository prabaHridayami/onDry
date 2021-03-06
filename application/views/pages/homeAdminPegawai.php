<link rel="stylesheet" type="text/css" media="all" href="<?php echo base_url()?>assets/css/loader/main.css" />
<link rel="stylesheet" type="text/css" media="all" href="<?php echo base_url()?>assets/css/loader/normalize.css" />
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
    </div>
    <div class='col-md-9'>
        <h3>Detail</h3>
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="row">
                    <div class='col-sm-6'>
                        <b>Data Pegawai</b>
                    </div>
                    <div class='col-sm-6' align='right'>
                        <form action="<?php echo base_url()?>admins/fetch_pegawai" method="post">
                            <div class="input-group">
                                <input type="text" class="form-control" name="search" placeholder="Search" id="myInput" onkeyup="myFunction()">
                                <span class="input-group-addon">
                                    <button type="submit">
                                        <span class="glyphicon glyphicon-search"></span>
                                    </button>
                                </span>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="panel-body">
                <div class="tab-content" id="myTable">
                    <div id="home" class="tab-fane in active">
                        <table class="table table-striped table-hover table-condensed">
                            <thead>
                                <th style="text-align: center; width: 30px;">No</th>
                                <th style="text-align: center; width: 30px;">ID</th>
                                <th style="text-align: center; width: 100px;">Nama</th>
                                <th style="text-align: center; width: 100px;">No-Telp</th>
                                <th style="text-align: center; width: 150px;">Alamat</th>
                                <th style="text-align: center; width: 100px;">Gender</th>
                                <th style="text-align: center; width: 100px;">Create_at</th>
                            </thead>
                            <?php
                                    $no = 1;
                                    foreach($pegawai as $pegawai){
                                ?>
                                <tr>
                                    <td>
                                        <?php echo $no++; ?>
                                    </td>
                                    <td>
                                        <?php echo $pegawai->id; ?>
                                    </td>
                                    <td>
                                        <?php echo $pegawai->nama; ?>
                                    </td>
                                    <td>
                                        <?php echo $pegawai->no_telp; ?>
                                    </td>
                                    <td>
                                        <?php echo $pegawai->alamat; ?>
                                    </td>
                                    <td>
                                        <?php echo $pegawai->jenis_kelamin; ?>
                                    </td>
                                    <td>
                                        <?php echo $pegawai->create_at; ?>
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
        </div>
    </div>
</div>
</body>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="<?php echo base_url()?>js/loader/vendor/jquery-1.9.1.min.js"><\/script>')</script>
<script src="<?php echo base_url()?>assets/js/loader/main.js"></script>