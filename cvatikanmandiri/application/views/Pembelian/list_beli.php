            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-sm-4">
                    <h2>Pembelian</h2>
                    <ol class="breadcrumb">
                        <li>Pembelian</li>
                        <li class="active">
                            <strong>Data Pembelian</strong>
                        </li>
                    </ol>
                </div>
            </div>

            <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
                <div class="ibox float-e-margins">
                <div class="ibox-title">
                        <h5>Data Pembelian</h5>
                       
                    </div>
                    <div class="ibox-content">
                    <table class="table table-striped table-bordered table-hover dataTables-example" >
                    <thead>
                    <tr>
                        <th>No</th>
                        <th>No faktur</th>
                        <th>ID User</th>
                        <th>Hutang</th>
                        <th>Tanggal</th>
                        <th>Bukti Transfer</th>
                        <th>Status</th>
                        <th>#</th>
                    </tr>
                    </thead>
                        <tbody>
                        <?php if(@$result):?>
                            <?php $i =1;?>
                            <?php foreach($result as $row):?>
                                <tr>
                                <td><?php echo $i++;?></td>
                                <td><?php echo $row['no_faktur'];?></td>
                                <td><?php echo $row['userid'];?></td>
                                <td><?php echo $row['sisa_hutang'];?></td>
                                <td><?php echo date('d/m/Y', strtotime($row['tgl_beli']));?></td>
                                <td><?php echo $row['gambar'];?></td>
                                <td><?php echo $row['status'];?></td>
                                <td>
                                    <a href="<?php echo base_url();?>index.php/pembelian/delete/<?php echo $row['no_faktur'];?>" onclick="return confirm('Hapus?')" class="btn btn-xs btn-danger">hapus</a>
                                    <a href="<?php echo base_url();?>index.php/pembelian/editbukti1/<?php echo $row['no_faktur'];?>" class="btn btn-xs btn-default">Kelola</a>
                                    <a href="<?php echo base_url();?>index.php/pembelian/edit_pembelian/<?php echo $row['no_faktur'];?>" class="btn btn-xs btn-default">Edit</a>
                                    <a href="<?php echo base_url();?>index.php/pembelian/invoice/<?php echo $row['no_faktur'];?>" class="btn btn-xs btn-primary">detail</a>
                                    
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

            
