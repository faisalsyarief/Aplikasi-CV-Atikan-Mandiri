            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-sm-4">
                    <h2>Omzet</h2>
                    <ol class="breadcrumb">
                        <li>Rekapitulasi</li>
                        <li class="active">
                            <strong>Omzet</strong>
                        </li>
                    </ol>
                </div>
            </div>

            <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Omzet <?php echo date('Y')?></h5>
                       
                    </div>
                    <div class="ibox-content">
                    <table class="table table-striped table-bordered table-hover" >
                    <thead>
                    <tr>
                        <th>No</th>
                        <th>Pemasukan</th>
                        <th>Nominal</th>
                    </tr>
                    </thead>
                        <tbody>
                        <?php
                        $i = 1;
                        $totalmasuk = 0;
                        $totalkeluar = 0;
                        $total = 0;
                        if(@$omzetmasuk){
                            foreach(@$omzetmasuk as $row){
                                echo '<tr>';
                                    echo '<td>'.$i++.'</td>';
                                    echo '<td>'.$row['name'].'</td>';
                                    echo '<td>'.number_format($row['pembayaran']).'</td>';
                                echo '</tr>';
                                $totalmasuk = $totalmasuk + $row['pembayaran'];
                            }
                        }

                        ?>
                        </tbody>
                    <thead>
                    <tr>
                        <th>No</th>
                        <th>Pengeluaran</th>
                        <th>Nominal</th>
                    </tr>
                    </thead>
                        <tbody>
                        <?php
                        if(@$omzetkeluar){
                            foreach(@$omzetkeluar as $row){
                                echo '<tr>';
                                    echo '<td>'.$i++.'</td>';
                                    echo '<td>'.$row['keperluan'].'</td>';
                                    echo '<td>'.number_format($row['nominal']).'</td>';
                                echo '</tr>';
                                $totalkeluar = $totalkeluar + $row['nominal'];
                            }
                        }
                        $total = $totalmasuk - $totalkeluar;

                        echo '<tr>';
                                    echo '<td></td>';
                                    echo '<td>Omzet</td>';
                                    echo '<td>'.number_format($total).'</td>';
                                echo '</tr>';
                        ?>
                        </tbody>
                    </table>
                    </div>

                </div>
                </div>

                <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Omzet <?php echo date('M')?></h5>
                       
                    </div>
                    <div class="ibox-content">
                    <table class="table table-striped table-bordered table-hover" >
                    <thead>
                    <tr>
                        <th>No</th>
                        <th>Pemasukan</th>
                        <th>Nominal</th>
                    </tr>
                    </thead>
                        <tbody>
                        <?php
                        $i = 1;
                        $totalmasuk = 0;
                        $totalkeluar = 0;
                        $total = 0;
                        if(@$omsetmasuk){
                            foreach(@$omsetmasuk as $row){
                                echo '<tr>';
                                    echo '<td>'.$i++.'</td>';
                                    echo '<td>'.$row['name'].'</td>';
                                    echo '<td>'.number_format($row['pembayaran']).'</td>';
                                echo '</tr>';
                                $totalmasuk = $totalmasuk + $row['pembayaran'];
                            }
                        }

                        ?>
                        </tbody>
                    <thead>
                    <tr>
                        <th>No</th>
                        <th>Pengeluaran</th>
                        <th>Nominal</th>
                    </tr>
                    </thead>
                        <tbody>
                        <?php
                        if(@$omsetkeluar){
                            foreach(@$omsetkeluar as $row){
                                echo '<tr>';
                                    echo '<td>'.$i++.'</td>';
                                    echo '<td>'.$row['keperluan'].'</td>';
                                    echo '<td>'.number_format($row['nominal']).'</td>';
                                echo '</tr>';
                                $totalkeluar = $totalkeluar + $row['nominal'];
                            }
                        }
                        $total = $totalmasuk - $totalkeluar;

                        echo '<tr>';
                                    echo '<td></td>';
                                    echo '<td>Omzet</td>';
                                    echo '<td>'.number_format($total).'</td>';
                                echo '</tr>';
                        ?>
                        </tbody>
                    </table>
                    </div>

                </div>
                </div>
                 <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Omzet minggu ke-<?php $i = 7; echo'<td>'.$i++.'</td>'?></h5>
                       
                    </div>
                    <div class="ibox-content">
                    <table class="table table-striped table-bordered table-hover" >
                    <thead>
                    <tr>
                        <th>No</th>
                        <th>Pemasukan</th>
                        <th>Nominal</th>
                    </tr>
                    </thead>
                        <tbody>
                        <?php
                        $i = 1;
                        $totalmasuk = 0;
                        $totalkeluar = 0;
                        $total = 0;
                        if(@$omsetmasukminggu){
                            foreach(@$omsetmasukminggu as $row){
                                echo '<tr>';
                                    echo '<td>'.$i++.'</td>';
                                    echo '<td>'.$row['name'].'</td>';
                                    echo '<td>'.number_format($row['pembayaran']).'</td>';
                                echo '</tr>';
                                $totalmasuk = $totalmasuk + $row['pembayaran'];
                            }
                        }

                        ?>
                        </tbody>
                    <thead>
                    <tr>
                        <th>No</th>
                        <th>Pengeluaran</th>
                        <th>Nominal</th>
                    </tr>
                    </thead>
                        <tbody>
                        <?php
                        if(@$omsetkeluarminggu){
                            foreach(@$omsetkeluarminggu as $row){
                                echo '<tr>';
                                    echo '<td>'.$i++.'</td>';
                                    echo '<td>'.$row['keperluan'].'</td>';
                                    echo '<td>'.number_format($row['nominal']).'</td>';
                                echo '</tr>';
                                $totalkeluar = $totalkeluar + $row['nominal'];
                            }
                        }
                        $total = $totalmasuk - $totalkeluar;

                        echo '<tr>';
                                    echo '<td></td>';
                                    echo '<td>Omzet</td>';
                                    echo '<td>'.number_format($total).'</td>';
                                echo '</tr>';
                        ?>
                        </tbody>
                    </table>
                    </div>

                </div>
                </div>
            </div>
            </div>

            
