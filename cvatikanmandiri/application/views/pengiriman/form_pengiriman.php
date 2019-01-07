            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-sm-4">
                    <h2>Pengiriman Buku</h2>
                    
                </div>
                <div class="col-sm-8">
                    <div class="title-action">
                        <a href="<?php echo base_url();?>index.php/" class="btn btn-primary">Kembali</a>
                    </div>
                </div>
            </div>

            <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Pengiriman Buku</h5>
                       
                    </div>
                    <div class="ibox-content">
                    <form method="post" action="<?php echo base_url();?>index.php/pengiriman/manage" class="form-horizontal">
                        <input type="hidden" name="id" value="<?php echo @$detail[0]['id_detkirim']?>">
                        <div class="form-group">
                            <label class="col-sm-2 control-label">No Faktur</label>
                            <div class="col-sm-10">
                            <select name="no_faktur" class="form-control">
                                <option value="">-Pilih-</option>
                                <?php if(@$faktur):?>
                                    <?php foreach($faktur as $row):?>
                                        <option value="<?php echo $row['no_faktur'];?>"><?php echo $row['no_faktur'];?></option>
                                    <?php endforeach?>
                                <?php endif?>
                                </select>
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Tanggal</label>
                            <div class="col-sm-10"><input type="date" name="tgl_kirim" class="form-control" value="<?php echo date("Y-m-d");?>" required></div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Status Pengiriman</label>
                            <div class="col-sm-10">
                                <div class="col-sm-10"><input type="radio" name="status_kirim"  value="Sedang di Proses" required>Sedang di Proses</div>
                                <div class="col-sm-10"><input type="radio" name="status_kirim" value="Sudah Sampai Tujuan" required>Sudah Sampai Tujuan</div>
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                         <div class="form-group">
                            <label class="col-sm-2 control-label">ID Kurir</label>
                            <div class="col-sm-10">
                             <select name="id_kurir" class="form-control">
                                <option value="">-Pilih-</option>
                                <?php if(@$kurir):?>
                                    <?php foreach($kurir as $row):?>
                                        <option value="<?php echo $row['id_kur'];?>"><?php echo $row['nama_kurir'];?></option>
                                    <?php endforeach?>
                                <?php endif?>
                                </select>
                            </div>
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

            
