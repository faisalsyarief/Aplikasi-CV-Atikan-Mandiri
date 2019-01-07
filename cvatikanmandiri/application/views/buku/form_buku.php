            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-sm-4">
                    <h2>Buku</h2>
                    <ol class="breadcrumb">
                        <li>Master</li>
                        <li>Data Buku</li>
                        <li class="active">
                            <strong><?php echo @$mode;?> Daftar Buku</strong>
                        </li>
                    </ol>
                </div>
                <div class="col-sm-8">
                    <div class="title-action">
                        <a href="<?php echo base_url();?>index.php/buku" class="btn btn-primary">Kembali</a>
                    </div>
                </div>
            </div>

            <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Daftar Buku</h5>
                       
                    </div>
                    <div class="ibox-content">
                    <form method="post" action="<?php echo base_url();?>index.php/buku/manage" class="form-horizontal">
                        <input type="hidden" name="id" value="<?php echo @$detail[0]['id_buku']?>">
                        <div class="form-group">
                            <label class="col-sm-2 control-label">ID Buku</label>
                            <div class="col-sm-10"><input type="text" name="id_buku" class="form-control" value="<?php echo @$kode?>" readonly></div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Judul Buku</label>
                            <div class="col-sm-10"><input type="text" name="judul_buku" class="form-control" value="<?php echo @$detail[0]['judul_buku']?>" required></div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Keterangan Judul</label>
                            <div class="col-sm-10"><input type="text" name="ket_judul" class="form-control" value="<?php echo @$detail[0]['ket_judul']?>" required></div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Tingkat</label>
                            <div class="col-sm-10"><input type="text" name="tingkat" class="form-control" value="<?php echo @$detail[0]['tingkat']?>" required></div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Kelas</label>
                            <div class="col-sm-10"><input type="text" name="kelas" class="form-control" value="<?php echo @$detail[0]['kelas']?>" required></div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Jenis</label>
                            <div class="col-sm-10"><input type="text" name="jenis" class="form-control" value="<?php echo @$detail[0]['jenis']?>" required></div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Pengarang</label>
                            <div class="col-sm-10"><input type="text" name="pengarang" class="form-control" value="<?php echo @$detail[0]['pengarang']?>" required></div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Harga</label>
                            <div class="col-sm-10"><input type="text" name="harga" class="form-control money" value="<?php echo @$detail[0]['harga']?>" required></div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Jumlah Stok</label>
                            <div class="col-sm-10"><input type="text" name="jumlah_stok" class="form-control" value="<?php echo @$detail[0]['jumlah_stok']?>" required></div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Percetakan</label>
                            <div class="col-sm-10"><input type="text" name="id_cetak" class="form-control" value="<?php echo @$detail[0]['id_cetak']?>"></div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Penerbit</label>
                            <div class="col-sm-10"><input type="text" name="id_terbit" class="form-control" value="<?php echo @$detail[0]['id_terbit']?>"></div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Semester</label>
                            <div class="col-sm-10"><input type="text" name="semester" class="form-control" value="<?php echo @$detail[0]['semester']?>" required></div>
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

            
