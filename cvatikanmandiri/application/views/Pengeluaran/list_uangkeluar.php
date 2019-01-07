            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-sm-4">
                    <h2>Pengeluaran</h2>
                    <ol class="breadcrumb">
                        <li>Keuangan</li>
                        <li class="active">
                            <strong>Pengeluaran</strong>
                        </li>
                    </ol>
                </div>
                <div class="col-sm-8">
                    <div class="title-action">
                        <a href="<?php echo base_url();?>index.php/uangkeluar/pengeluaran" class="btn btn-primary">Tambah</a>
                    </div>
                </div>
            </div>

            <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Data Pengeluaran</h5>
                       
                    </div>
                    <div class="ibox-content">
                    <table class="table table-striped table-bordered table-hover dataTables-example" >
                    <thead>
                    <tr>
                        <th>No</th>
                        <th>ID Pengeluaran</th>
                        <th>Tanggal</th>
                        <th>Keperluan</th>
                        <th>Nominal</th>
                        <th>#</th>
                    </tr>
                    </thead>
                        <tbody>
                        <?php
                        if(@$result){
                            $i=1;
                            foreach(@$result as $row){
                                echo '<tr>';
                                        echo '<td>'.$i++.'</td>';
                                        echo '<td>'.$row['id_luar'].'</td>';
                                        echo '<td>'.$row['tgl_keluar'].'</td>';
                                        echo '<td>'.$row['keperluan'].'</td>';
                                        echo '<td>'.number_format($row['nominal']).'</td>';
                                        echo '<td>';
                                        ?><a href="<?php echo base_url();?>index.php/uangkeluar/pengeluaran/<?php echo $row['id_luar'];?>" class="btn btn-xs btn-primary">Edit</a>
                                        <a href="<?php echo base_url();?>index.php/uangkeluar/delete/<?php echo $row['id_luar'];?>" onclick="return confirm('Hapus?')" class="btn btn-xs btn-danger">Delete</a>
                                        <?php
                                        echo '</td>';

                            }
                        }

                        ?>
                        </tbody>
                    </table>
                    </div>
                </div>
                </div>
            </div>
        </div>
        
            
