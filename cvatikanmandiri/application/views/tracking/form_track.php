            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-sm-4">
                    <h2>Tracking </h2>
                </div>
                <div class="col-sm-8">
                    <div class="title-action">
                        <a href="<?php echo base_url();?>index.php/Tracking/list_kurir/<?php echo @$kirim[0]['no_faktur'];?>" class="btn btn-primary">Kembali</a>
                    </div>
                </div>
            </div>

            <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Tambah Data <?php echo @$mode;?> <?php echo @$view[0]['no_faktur']?> </h5>
                       
                    </div>
                    <div class="ibox-content">
                    <form method="post" action="<?php echo base_url();?>index.php/tracking/manage/" class="form-horizontal">
                        <input type="hidden" name="id" value="<?php echo @$detail[0]['id_track']?>">
                        <input type="hidden" name="no_faktur" class="form-control" value="<?php echo @$kirim[0]['no_faktur'];?>" readonly="readonly">
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Tanggal</label>
                            <div class="col-sm-10"><input type="date" name="tgl" class="form-control" value="<?php echo date("Y-m-d");?>" required></div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Time</label>
                            <div class="col-sm-10"><input type="time" name="time" class="form-control" value="<?php echo date("H:i");?>" required></div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Status</label>
                            <div class="col-sm-10"><input type="text" name="status_track" class="form-control" value="<?php echo @$detail[0]['status_track']?>" required></div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Lokasi</label>
                            <div class="col-sm-10"><input type="text" name="lokasi" class="form-control" value="<?php echo @$detail[0]['lokasi']?>" required></div>
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

            
