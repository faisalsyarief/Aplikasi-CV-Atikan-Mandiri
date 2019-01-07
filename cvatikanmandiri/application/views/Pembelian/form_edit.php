<?php
                                            if(isset($data_berkas)){
                                                foreach($data_berkas as $row){
                                                  $id = $row->no_faktur;
                                            ?>
          <?php echo form_open_multipart('pembelian/transfer/'.$id)?> 
                <br>
                  <div class="form-group">
                    <input type="hidden" class="form-control" name="no_faktur" value="<?php echo $row->no_faktur; ?>" required>
                    </div>

                    <div class="form-group">
                  <div class="col-md-12">
                  <div class="box box-info">
                    <div class="box-header">
                      <h4 class="box-title">Total Pembayaran</h4>
                      <!-- /. tools -->
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body pad">
                      <input type="text" class="form-control money" name="pembayaran" value="<?php echo $row->total; ?>" readonly>
                    </div>
                  </div>
                  </div>
          <!-- /.box -->
        </div>
        <br>

        <div class="form-group">
                  <div class="col-md-12">
                  <div class="box box-info">
                    <div class="box-header">
                      <h4 class="box-title">Jumlah Transfer</h4>
                      <!-- /. tools -->
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body pad">
                      <input type="text" class="form-control money" name="pembayaran" id="pembayaran" required>
                    </div>
                  </div>
                  </div>
          <!-- /.box -->
        </div>
        <br>

        <div class="form-group">
                  <div class="col-md-12">
                  <div class="box box-info">
                    <div class="box-header">
                      <h4 class="box-title">Bukti Pembayaran</h4>
                      <!-- /. tools -->
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body pad">
                      <input type="file" class="form-control" name="gambar[]" value="<?php echo $row->gambar; ?>">
                    </div>
                  </div>
                  </div>
          <!-- /.box -->
        </div>
        <br>

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