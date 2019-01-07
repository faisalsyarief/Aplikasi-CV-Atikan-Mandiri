<?php
                                            if(isset($data_berkas)){
                                                foreach($data_berkas as $row){
                                                  $id = $row->id_detkirim;
                                            ?>
          <?php echo form_open_multipart('pengiriman/statuskirim_kurir/'.$id)?> 
                <br>
                  <div class="form-group">
                    <input type="hidden" class="form-control" name="id_detkirim" value="<?php echo $row->id_detkirim; ?>" required>
                    </div>

                    <div class="form-group">
                            <label class="col-sm-2 control-label">Status</label>
                            <div class="col-sm-10">

                      <div class="col-sm-10"><input type="radio" name="status_kirim"  value="Sedang di Proses" required>Sedang Proses Pengiriman</div>
                      <div class="col-sm-10"><input type="radio" name="status_kirim" value="Sudah Sampai Tujuan" required>Sudah Sampai Tujuan</div>

                    </div>
                        </div>
                        <div class="hr-line-dashed"></div><br>

                        <div class="form-group">
                                <div class="col-md-12">
                                <div class="box box-info">
                                  <div class="box-header">
                                    <h4 class="box-title">Bukti Pengiriman</h4>
                                    <!-- /. tools -->
                                  </div>
                                  <!-- /.box-header -->
                                  <div class="box-body pad">
                                    <input type="file" class="form-control" name="gambar[]" value="<?php echo $row->gambar; ?>"></br>
                                  </div>
                                </div>
                                </div>
          <!-- /.box -->
                      </div>



                  <div class="form-group">
                  <div class="col-md-12">
                  <div class="box box-info">
                    <div class="box-header">
                      <!-- /. tools -->
                    </div>
                    <!-- /.box-header -->
                    <div align="center">
                      <button type="submit" class="btn btn-danger">Simpan</button>
                    </div>
                  </div>
                  </div>
          <!-- /.box -->
        </div>
                  <?php }
                                             }
                                                ?>