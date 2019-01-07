<?php
                                            if(isset($data_berkas)){
                                                foreach($data_berkas as $row){
                                                  $id = $row->id_detkirim;
                                            ?>
          <?php echo form_open_multipart('pengiriman/statuskirim/'.$id)?> 
                <br>
                  <div class="form-group">
                    <input type="hidden" class="form-control" name="id_detkirim" value="<?php echo $row->id_detkirim; ?>" required>
                  </div>

                    <div class="form-group">
                            <label class="col-sm-2 control-label">Bukti Pengiriman</label>

                            <img src="<?php echo base_url('uploads/bukti-image/'.$row->gambar) ?>" width="500px" height="250px">

                            </div>
                        </div>
                    <div class="hr-line-dashed"></div>



                  <div class="form-group">
                  <div class="col-md-12">
                  <div class="box box-info">
                    <div class="box-header">
                      <!-- /. tools -->
                    </div>
                    <!-- /.box-header -->
                  </div>
                  </div>
                </div>
                
          <!-- /.box -->
        </div>
                  <?php }
                                             }
                                                ?>