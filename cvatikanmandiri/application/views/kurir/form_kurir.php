            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-sm-4">
                    <h2>Kurir</h2>
                    <ol class="breadcrumb">
                        <li>Master</li>
                        <li>Data Kurir</li>
                        <li class="active">
                            <strong><?php echo @$mode;?> Daftar Kurir</strong>
                        </li>
                    </ol>
                </div>
                <div class="col-sm-8">
                    <div class="title-action">
                        <a href="<?php echo base_url();?>index.php/kurir" class="btn btn-primary">Kembali</a>
                    </div>
                </div>
            </div>

            <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Daftar Kurir</h5>
                       
                    </div>
                    <div class="ibox-content">
                    <form method="post" action="<?php echo base_url();?>index.php/kurir/manage" class="form-horizontal">
                        <input type="hidden" name="id" value="<?php echo @$detail[0]['id_kur']?>">
                        <div class="form-group">
                            <label class="col-sm-2 control-label">ID Kurir</label>
                            <div class="col-sm-10"><input type="text" name="id_kur" class="form-control" value="<?php echo @$kode?>" readonly></div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Nama Kurir</label>
                            <div class="col-sm-10"><input type="text" name="nama_kurir" class="form-control" value="<?php echo @$detail[0]['nama_kurir']?>" required></div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Alamat</label>
                            <div class="col-sm-10"><input type="text" name="alamat" class="form-control" value="<?php echo @$detail[0]['alamat']?>" required></div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">No Telepon</label>
                            <div class="col-sm-10"><input type="text" name="no_tlpn" class="form-control" value="<?php echo @$detail[0]['no_tlpn']?>" required></div>
                        </div>
                        <div class="hr-line-dashed"></div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label">Email</label>
                            <div class="col-sm-10"><input type="email" name="email" class="form-control" value="<?php echo @$detail2[0]['email']?>" required></div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Username</label>
                            <div class="col-sm-10"><input type="text" name="username" class="form-control" value="<?php echo @$detail2[0]['username']?>" required></div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Password</label>
                            <div class="col-sm-10"><input type="text" name="password" class="form-control" value="<?php echo @$detail2[0]['password']?>" required></div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        

                        <div class="form-group">
                            <div class="col-sm-4 col-sm-offset-2">
                                <button class="btn btn-primary" type="submit" name="submit" value="submit">Save</button>
                            </div>
                        </div>
                    </form>
                    </div>
                </div>
                </div>
            </div>
            </div>

            
