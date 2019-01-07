            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-sm-4">
                    <h2>Penerbit</h2>
                    <ol class="breadcrumb">
                        <li>Master</li>
                        <li>Data Penerbit</li>
                        <li class="active">
                            <strong><?php echo @$mode;?> Daftar Penerbit</strong>
                        </li>
                    </ol>
                </div>
                <div class="col-sm-8">
                    <div class="title-action">
                        <a href="<?php echo base_url();?>index.php/penerbit" class="btn btn-primary">Kembali</a>
                    </div>
                </div>
            </div>

            <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Daftar Penerbit</h5>
                       
                    </div>
                    <div class="ibox-content">
                    <form method="post" action="<?php echo base_url();?>index.php/penerbit/manage" class="form-horizontal">
                        <input type="hidden" name="id" value="<?php echo @$detail[0]['id_terbit']?>">
                        <div class="form-group">
                            <label class="col-sm-2 control-label">ID Penerbit</label>
                            <div class="col-sm-10"><input type="text" name="id_terbit" class="form-control" value="<?php echo @$kode?>" readonly></div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Nama Penerbit</label>
                            <div class="col-sm-10"><input type="text" name="nama_terbit" class="form-control" value="<?php echo @$detail[0]['nama_terbit']?>" required></div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Alamat</label>
                            <div class="col-sm-10"><input type="text" name="alamat_terbit" class="form-control" value="<?php echo @$detail[0]['alamat_terbit']?>" required></div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">No Telepon</label>
                            <div class="col-sm-10"><input type="text" name="no_tlpn_terbit" class="form-control" value="<?php echo @$detail[0]['no_tlpn_terbit']?>" required></div>
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

            
