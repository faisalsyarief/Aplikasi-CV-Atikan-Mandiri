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
                        <h5>Data Pembelian : <?php echo $this->session->userdata('username'); ?></h5>
                       
                    </div>
                    <div class="ibox-content">
                    <table class="table table-striped table-bordered table-hover dataTables-example" >
                    <thead>
                    <tr>
                        <th>No</th>
                        <th>No faktur</th>
                        <th>User</th>
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
                                <td><?php echo date('d/m/Y H:i:s', strtotime($row['tgl_beli']));?></td>
                                <td><?php echo $row['gambar'];?></td>
                                <td><?php echo $row['status'];?></td>
                                <td>
                                    <a href="<?php echo base_url();?>index.php/pembelian/deleteagen/<?php echo $row['no_faktur'];?>" onclick="return confirm('Batal?')" class="btn btn-xs btn-danger">Batal</a>
                                    <a href="<?php echo base_url();?>index.php/pembelian/editbukti/<?php echo $row['no_faktur'];?>" class="btn btn-xs btn-default">Bayar</a>
                                    <a href="<?php echo base_url();?>index.php/pembelian/invoiceagen/<?php echo $row['no_faktur'];?>" class="btn btn-xs btn-primary">detail</a>
                                    
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

            
