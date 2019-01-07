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
                        <h5>Data Pengiriman  </h5>
                       
                    </div>
                    <div class="ibox-content">
                    <table class="table table-striped table-bordered table-hover dataTables-example" >
                    <thead>
                    <tr>
                        <th>No</th>
                        <th>No Faktur</th>
                        <th>Tanggal</th>
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
                                        <td>
                                            <a href="<?php echo base_url();?>index.php/tracking/tracking/<?php echo $row['no_faktur'];?>" class="btn btn-xs btn-primary">Detail</a>
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

            
