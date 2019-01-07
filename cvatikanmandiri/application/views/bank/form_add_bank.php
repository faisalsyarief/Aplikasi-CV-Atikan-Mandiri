<?php $this->load->view('element/header') ?>
            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-sm-4">
                    <h2>Tambah Bank</h2>
                    <ol class="breadcrumb">
                        <li>Daftar Bank</li>
                        <li class="active">
                            <strong>Tambah Bank</strong>
                        </li>
                    </ol>
                </div>
                <div class="col-sm-8">
                    <div class="title-action">
                        <a href="<?php echo base_url();?>index.php/bank" class="btn btn-primary">Kembali</a>
                    </div>
                </div>
            </div>

            <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Tambah Bank</h5>
                       
                    </div>
                    <br>
        <div class="col-md-11">
           <?=form_open_multipart('bank/add_bank/',['class'=>'form-horizontal'])?>
             <?php $error = form_error("nama_pemilik", "<p class='text-danger'>", '</p>'); ?>
             <div class="form-group <?php echo $error ? 'has-error' : '' ?>">
                <label class="col-sm-2 control-label">Nama Pemilik</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="nama_pemilik" value="<?= set_value('nama_pemilik') ?>">
                  <?php echo $error; ?>
                </div>
              </div>
              
              <?php $error = form_error("no_rekening", "<p class='text-danger'>", '</p>'); ?>
              <div class="form-group <?php echo $error ? 'has-error' : '' ?>">
                <label class="col-sm-2 control-label">No Rekening</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="no_rekening"><?= set_value('no_rekening') ?>
                  <?php echo $error; ?>
                </div>
              </div>

              <?php $error = form_error("jenis_bank", "<p class='text-danger'>", '</p>'); ?>
              <div class="form-group <?php echo $error ? 'has-error' : '' ?>">
                <label class="col-sm-2 control-label">Jenis Bank</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="jenis_bank" value="<?= set_value('jenis_bank') ?>">
                  <?php echo $error; ?>
                </div>
              </div>
              
              <div class="form-group">
                <label class="col-sm-2 control-label">Gambar</label>
                <div class="col-sm-10">
                  <input type="file" class="form-control" name="userfile">
                </div>
              </div>
              
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <button type="submit" class="btn btn-primary pull-right">Simpan</button>
                </div>
              </div>
                </div>
                </div>
            </div>
            </div>
            <br>
<?php $this->load->view('element/footer') ?>