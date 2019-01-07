            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-sm-4">
                    <h2>tracking</h2>
                </div>

                <div class="col-sm-8">
                     <div class="title-action">
                        <a href="<?php echo base_url();?>index.php/pengiriman/viewkurir" class="btn btn-primary">Kembali</a>
                    
                        <a href="<?php echo base_url();?>index.php/tracking/manage/<?php echo @$kirim[0]['no_faktur'];?>" class="btn btn-primary">Tambah</a>
                    </div>
                </div>
            </div>

            <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Tracking : <?php echo @$kirim[0]['no_faktur'];?></h5>
                       
                    </div>
                    <div class="ibox-content">
                    <table class="table table-striped table-bordered table-hover dataTables-example" >
                    <thead>
                    <tr>
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Status</th>
                        <th>Lokasi</th>
                        <th>#</th>
                    </tr>
                    </thead>
                        <tbody>
                        <?php if(@$view):?>
                            <?php $i =1;?>
                            <?php foreach($view as $row):?>
                                <tr>
                                <td><?php echo $i++;?></td>
                                <td><?php echo date('d/m/Y', strtotime($row['tgl']));?> <?php echo date('h:i', strtotime($row['time']));?></td>
                                <td><?php echo $row['status_track'];?></td>
                                <td><?php echo $row['lokasi'];?></td>
                                <td>
                                    <a href="<?php echo base_url();?>index.php/tracking/manage/<?php echo $row['no_faktur'];?>" class="btn btn-xs btn-primary">Edit</a>
                                    <a href="<?php echo base_url();?>index.php/tracking/delete/<?php echo $row['id_track'];?>" onclick="return confirm('Hapus?')" class="btn btn-xs btn-danger">Delete</a>
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

            
