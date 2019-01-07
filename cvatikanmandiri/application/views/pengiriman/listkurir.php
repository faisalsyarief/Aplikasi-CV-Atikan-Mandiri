            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-sm-4">
                    <h2>Pengiriman</h2>
                
                </div>
            </div>

            <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Data Pengiriman :  <?php echo @$kurir[0]['id_kurir'];?> </h5>
                       
                    </div>
                    <div class="ibox-content">
                    <table class="table table-striped table-bordered table-hover dataTables-example" >
                    <thead>
                    <tr>
                        <th>No</th>
                        <th>No Faktur</th>
                        <th>Tanggal</th>
                        <th>Status Pengiriman</th>
                        <th>Penerima</th>
                        <th>#</th>
                    </tr>
                    </thead>
                        <tbody>
                           <?php if(@$view):?>
                            <?php $i =1;?>
                            <?php foreach($view as $row):?>
                                        <tr>
                                        <td><?php echo $i++;?></td>
                                        <td><?php echo @$row['no_faktur'];?></td>
                                        <td><?php echo date('d/m/Y', strtotime($row['tgl_kirim']));?></td>
                                        <td><?php echo $row['status_kirim'];?></td>
                                        <td>
                                             <a href="<?php echo base_url();?>index.php/Tracking/penerima/<?php echo $row['no_faktur'];?>" class="btn btn-xs btn-primary">Input</a>
                                            <a href="<?php echo base_url();?>index.php/Tracking/viewpenerima/<?php echo $row['no_faktur'];?>" class="btn btn-xs btn-primary">view</a>
                                        </td>
                                        <td>
                                            <a href="<?php echo base_url();?>index.php/pengiriman/editbuktikurir/<?php echo $row['id_detkirim'];?>" class="btn btn-xs btn-danger">input bukti</a>
                                            <a href="<?php echo base_url();?>index.php/tracking/list_kurir/<?php echo $row['no_faktur'];?>" class="btn btn-xs btn-default">kelola tracking</a>
                                            <a href="<?php echo base_url();?>index.php/pengiriman/info/<?php echo $row['no_faktur'];?>" class="btn btn-xs btn-primary">Info Pembeli</a>
                                           
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
            