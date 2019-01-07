            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-sm-4">
                    <h2>Penerbit</h2>
                    <ol class="breadcrumb">
                        <li>
                            Master
                        </li>
                        <li class="active">
                            <strong>Penerbit</strong>
                        </li>
                    </ol>
                </div>
                <div class="col-sm-8">
                    <div class="title-action">
                        <a href="<?php echo base_url();?>index.php/penerbit/manage" class="btn btn-primary">Tambah Penerbit</a>
                    </div>
                </div>
            </div>

            <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Daftar Penerbit</h5>
                       
                    </div>
                    <div class="ibox-content">
                    <table class="table table-striped table-bordered table-hover dataTables-example" >
                    <thead>
                    <tr>
                        <th>No</th>
                        <th>ID Penerbit</th>
                        <th>Nama Penerbit</th>
                        <th>Alamat</th>
                        <th>No Telepon</th>
                        <th>#</th>
                    </tr>
                    </thead>
                        <tbody>
                        <?php if(@$result):?>
                            <?php $i =1;?>
                            <?php foreach($result as $row):?>
                                <tr>
                                <td><?php echo $i++;?></td>
                                <td><?php echo $row['id_terbit'];?></td>
                                <td><?php echo $row['nama_terbit'];?></td>
                                <td><?php echo $row['alamat_terbit'];?></td>
                                <td><?php echo $row['no_tlpn_terbit'];?></td>
                                <td>
                                    <a href="<?php echo base_url();?>index.php/penerbit/manage/<?php echo $row['id_terbit'];?>" class="btn btn-xs btn-primary">Edit</a>
                                    <a href="<?php echo base_url();?>index.php/penerbit/delete/<?php echo $row['id_terbit'];?>" onclick="return confirm('Hapus?')" class="btn btn-xs btn-danger">Delete</a>
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

            
