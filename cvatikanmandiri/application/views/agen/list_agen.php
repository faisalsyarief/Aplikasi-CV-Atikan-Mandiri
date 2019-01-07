                <div class="row wrapper border-bottom white-bg page-heading">
                    <div class="col-sm-4">
                        <h2>Agen</h2>
                        <ol class="breadcrumb">
                            <li>Master</li>
                            <li class="active">
                                <strong>Data Agen</strong>
                            </li>
                        </ol>
                    </div>
                    <div class="col-sm-8">
                        <div class="title-action">
                            <a href="<?php echo base_url();?>index.php/agen/manage" class="btn btn-primary">Tambah Agen</a>
                        </div>
                    </div>
                </div>

                <div class="wrapper wrapper-content animated fadeInRight">
                <div class="row">
                    <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Daftar Agen</h5>
                           
                        </div>
                        <div class="ibox-content">
                        <table class="table table-striped table-bordered table-hover dataTables-example" >
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>ID Agen</th>
                            <th>Nama Agen</th>
                            <th>Alamat</th>
                            <th>No Telepon</th>
                            <th>Kota</th>
                            <th>#</th>
                        </tr>
                        </thead>
                            <tbody>
                            <?php if(@$result):?>
                                <?php $i =1;?>
                                <?php foreach($result as $row):?>
                                    <tr>
                                    <td><?php echo $i++;?></td>
                                    <td><?php echo $row['id_agen'];?></td>
                                    <td><?php echo $row['nama_agen'];?></td>
                                    <td><?php echo $row['alamat_agen'];?></td>
                                    <td><?php echo $row['no_tlpn'];?></td>
                                    <td><?php echo $row['kota'];?></td>
                                    <td>
                                        <a href="<?php echo base_url();?>index.php/agen/manage/<?php echo $row['id_agen'];?>" class="btn btn-xs btn-primary">Edit</a>
                                        <a href="<?php echo base_url();?>index.php/agen/delete/<?php echo $row['id_agen'];?>" onclick="return confirm('Hapus?')" class="btn btn-xs btn-danger">Delete</a>
                                    </td>
                                    </tr>
                                <?php endforeach?>
                            <?php endif?>
                            </tbody>
                        </table>
                        </div>
                    </div>
                    </div>
                </div>
                </div>

                
