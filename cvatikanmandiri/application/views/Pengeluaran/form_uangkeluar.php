            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-sm-4">
                    <h2>Pengeluaran</h2>
                    <ol class="breadcrumb">
                        <li>Keuangan</li>
                        <li>Pengeluaran</li>
                        <li class="active">
                            <strong><?php echo @$mode;?> Pengeluaran</strong>
                        </li>
                    </ol>
                </div>
                <div class="col-sm-8">
                    <div class="title-action">
                        <a href="<?php echo base_url();?>index.php/uangkeluar/view" class="btn btn-primary">Kembali</a>
                    </div>
                </div>
            </div>

            <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Daftar Pengeluaran</h5>
                       
                    </div>
                    <div class="ibox-content">
                    <form method="post" action="<?php echo base_url();?>index.php/uangkeluar/pengeluaran" class="form-horizontal">
                        <input type="hidden" name="id" value="<?php echo @$detail[0]['id_luar']?>">
                        <div class="form-group">
                            <label class="col-sm-2 control-label">ID Pengeluaran</label>
                            <div class="col-sm-10"><input type="text" name="id_luar" class="form-control" value="<?php echo @$kode?>" readonly></div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Tanggal Pembayaran</label>
                            <div class="col-sm-10"><input type="date" name="tgl_keluar" class="form-control" value="<?php echo date("Y-m-d")?>" required></div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Keperluan</label>
                            <div class="col-sm-10"><input type="text" name="keperluan" class="form-control" value="<?php echo @$detail[0]['keperluan']?>" required></div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Nominal</label>
                            <div class="col-sm-10"><input type="text" name="nominal" class="form-control money" value="<?php echo @$detail[0]['nominal']?>" required></div>
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

            
