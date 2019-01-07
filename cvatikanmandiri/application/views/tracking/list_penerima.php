
         
            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-sm-4">
                    <h2>Tracking</h2>
                </div>
                <div class="col-sm-8">
                    <div class="title-action">
                        <a href="<?php echo base_url();?>index.php/Pengiriman/viewkurir" class="btn btn-primary">Kembali</a>
                    </div>
                </div>
            </div>

            <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Penerima <?php echo @$faktur[0]['no_faktur']?></h5>
                       
                    </div>
                    <div class="ibox-content">
                    <form  class="form-horizontal">
                        
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Nama Penerima</label>
                            <div class="col-sm-10"><input type="text" name="nama_penerima" class="form-control" value="<?php echo @$view[0]['nama_penerima']?>" readonly></div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">No Telepon</label>
                            <div class="col-sm-10"><input type="text" name="no_tlpn" class="form-control" value="<?php echo @$view[0]['no_tlpn']?>" readonly></div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        
                       
                    </form>
                    </div>
                </div>
                </div>
            </div>
            </div>

