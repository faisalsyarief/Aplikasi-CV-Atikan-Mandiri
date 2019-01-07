            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-sm-4">
                    <h2>Buku</h2>
                    <ol class="breadcrumb">
                        <li>Master</li>
                        <li class="active">
                            <strong>Data Buku</strong>
                        </li>
                    </ol>
                </div>
                <div class="col-sm-8">
                    <div class="title-action">
                        <a href="<?php echo base_url();?>index.php/buku/manage" class="btn btn-primary">Tambah buku</a>
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
                    <table class="table table-striped table-bordered table-hover dataTables-example" >
                    <thead>
                    <tr>
                        <th>No</th>
                        <th>ID Buku</th>
                        <th>Judul Buku</th>
                        <th>Ket Judul</th>
                        <th>Tingkat</th>
                        <th>Kelas</th>
                        <th>Jenis</th>
                        <th>Pengarang</th>
                        <th>Harga Normal</th>
                        <th>Jumlah Stok</th>
                        <th>Percetakan</th>
                        <th>Penerbit</th>
                        <th>Semester</th>
                        <th>#</th>
                    </tr>
                    </thead>
                        <tbody>
                        <?php if(@$result):?>
                            <?php $i =1;?>
                            <?php foreach($result as $row):?>
                                <tr>
                                <td><?php echo $i++;?></td>
                                <td><?php echo $row['id_buku'];?></td>
                                <td><?php echo $row['judul_buku'];?></td>
                                <td><?php echo $row['ket_judul'];?></td>
                                <td><?php echo $row['tingkat'];?></td>
                                <td><?php echo $row['kelas'];?></td>
                                <td><?php echo $row['jenis'];?></td>
                                <td><?php echo $row['pengarang'];?></td>
                                <td><?php echo number_format($row['harga']);?></td>
                                <td><?php echo $row['jumlah_stok'];?></td>
                                <td><?php echo $row['id_cetak'];?></td>
                                <td><?php echo $row['id_terbit'];?></td>
                                <td><?php echo $row['semester'];?></td>
                                <td>
                                    <a href="<?php echo base_url();?>index.php/buku/manage/<?php echo $row['id_buku'];?>" class="btn btn-xs btn-primary">Edit</a>
                                    <a href="<?php echo base_url();?>index.php/buku/delete/<?php echo $row['id_buku'];?>" onclick="return confirm('Hapus?')" class="btn btn-xs btn-danger">Delete</a>
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

            
