            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-sm-4">
                    <h2>Rekapitulasi Pembelian PerAgen</h2>
                    <ol class="breadcrumb">
                        <li>Rekapitulasi</li>
                        <li class="active">
                            <strong>Rekap Pembelian PerAgen</strong>
                        </li>
                    </ol>
                </div>
            </div>

            <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-content">
                    <table class="table table-striped table-bordered table-hover dataTables-example" >
                    <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Agen</th>
                        <th>#</th>
                    </tr>
                    </thead>
                        <tbody>
                        <?php if(@$result):?>
                            <?php $i =1;?>
                            <?php foreach($result as $row):?>
                                <tr>
                                <td><?php echo $i++;?></td>
                                <td><?php echo $row['name'];?></td>
                                <td>
                                    <a href="<?php echo base_url();?>index.php/Rekapitulasi/rekap/<?php echo $row['userid']?>" class="btn btn-xs btn-primary">detail</a>
                                    
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

            
