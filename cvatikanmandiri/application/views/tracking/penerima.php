
         
            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-sm-4">
                    <h2>Tracking</h2>
                </div>
                <div class="col-sm-8">
                    <div class="title-action">
                        <a href="<?php echo base_url();?>index.php/pengiriman/viewkurir" class="btn btn-primary">Kembali</a>
                    </div>
                </div>
            </div>

            <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Penerima </h5>
                       
                    </div>
                    <div class="ibox-content">
                    <form method="post" action="<?php echo base_url();?>index.php/tracking/Penerima/" class="form-horizontal">
                        <input type="hidden" name="id" value="<?php echo @$detail[0]['id_penerima']?>">
                       <input type="hidden" name="no_faktur" class="form-control" value="<?php echo @$view[0]['no_faktur']?>">
                            
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Nama Penerima</label>
                            <div class="col-sm-10"><input type="text" name="nama_penerima" class="form-control" value="<?php echo @$detail[0]['nama_penerima']?>" required></div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">No Telepon</label>
                            <div class="col-sm-10"><input type="text" name="no_tlpn" class="form-control" value="<?php echo @$detail[0]['no_tlpn']?>" required></div>
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

