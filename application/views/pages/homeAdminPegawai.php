<div class="mainContent" id="mainContent">
            <div class="contentHeader">
                <h3>
                    <b>PEGAWAI</b>
                </h3>
                <hr>

            </div>
            <div class="contentHeader content" id="contentHeader">
                <ul class="nav nav-pills" style="margin-bottom: 5px">
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
                                <th style="text-align: center">No</th>
                                <th style="text-align: center">ID</th>
                                <th style="text-align: center">Nama</th>
                                <th style="text-align: center">Nomor Telepon</th>
                                <th style="text-align: center">Alamat</th>
                                <th style="text-align: center">Jenis Kelamin</th>
                                <th style="text-align: center">Create_At</th>
                            </thead>
                            <?php
                                $no = 1;
                                foreach($pegawai as $pegawai){
                            ?>
                            <tr>
                                <td><?php echo $no++; ?></td>
                                <td><?php echo $pegawai->id; ?></td>
                                <td><?php echo $pegawai->nama; ?></td>
                                <td><?php echo $pegawai->no_telp; ?></td>
                                <td><?php echo $pegawai->alamat; ?></td>
                                <td><?php echo $pegawai->jenis_kelamin; ?></td>
                                <td><?php echo $pegawai->create_at; ?></td>
                            </tr>

                            <?php 
                                }
                            ?>
                        </table>
                    </div>
                </div>
  