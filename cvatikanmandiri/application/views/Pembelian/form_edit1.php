<?php
                                            if(isset($data_berkas)){
                                                foreach($data_berkas as $row){
                                                  $id = $row->no_faktur;
                                            ?>
          <?php echo form_open_multipart('pembelian/transfer1/'.$id)?> 
                <br>
                  <div class="form-group">
                    <input type="hidden" class="form-control" name="no_faktur" value="<?php echo $row->no_faktur; ?>" required>
                    </div>

                    <div class="form-group">
                            <label class="col-sm-2 control-label">Status</label>
                            <div class="col-sm-10">

                      <input type="radio" id="status" value="Sudah di Proses" name="status" required><label class="light">Sudah di Proses</label><br>
                      <input type="radio" id="status" value="Belum di Proses" name="status" required><label class="light">Belum di Proses</label><br>

                    </div>
                        </div>
                        <div class="hr-line-dashed"></div><br>

                        <div class="form-group">
                            <label class="col-sm-2 control-label">Bukti Pembayaran</label>
                            <div class="col-sm-10">

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