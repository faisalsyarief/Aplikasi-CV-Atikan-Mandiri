            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-sm-4">
                    <h2>Jurnal</h2>
                    <ol class="breadcrumb">
                        <li>Jurnal</li>
                        <li class="active">
                            <strong>Jurnal Pengeluaran</strong>
                        </li>
                    </ol>
                </div>
                <div class="col-sm-8">
                    <div class="title-action">
                        <a href="<?php echo base_url();?>index.php/jurnal" class="btn btn-primary">Jurnal Umum</a>
                        <a href="<?php echo base_url();?>index.php/jurnal/pembelian" class="btn btn-primary">Jurnal Pembelian</a>
                        <a href="<?php echo base_url();?>index.php/jurnal/jurnal_hutang" class="btn btn-primary">Jurnal Hutang</a>
                    </div>
                </div>
            </div>

            <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Jurnal Pengeluaran</h5>
                       
                    </div>
                    <div class="ibox-content">
                    <table class="table table-striped table-bordered table-hover dataTables-example" >
                    <thead>
                    <tr>
                        <th>Tanggal</th>
                        <th>Keterangan</th>
                        <th>Debet</th>
                        <th>Kredit</th>
                    </tr>
                    </thead>
                        <tbody>
                        <?php
                        $i = 1;
                        $totalkeluar = 0;
                        $totalkeluar1 = 0;
                        if(@$result){
                            $i=1;
                            foreach(@$result as $row){
                                echo '<tr>';
                                        echo '<td>'.$row['tgl_keluar'].'</td>';
                                        echo '<td>Perlengkapan</td>';
                                        echo '<td>'.number_format($row['nominal']).'</td>';
                                        echo '<td></td>';
                                echo '</tr>';
                                $totalkeluar = $totalkeluar + $row['nominal'];
                                echo '<tr>';
                                        echo '<td>'.$row['tgl_keluar'].'</td>';
                                        echo '<td align="right">Kas</td>';
                                        echo '<td></td>';
                                        echo '<td align="right">'.number_format($row['nominal']).'</td>';
                                echo '</tr>';
                                $totalkeluar1 = $totalkeluar1 + $row['nominal'];
                                echo '<tr>';
                                        echo '<td>'.$row['tgl_keluar'].'</td>';
                                        echo '<td align="center">(Membeli '.$row['keperluan'].')</td>';
                                        echo '<td></td>';
                                        echo '<td></td>';
                                echo '</tr>';

                            }
                        }
                        
                                echo '<tr>';
                                        echo '<td>Jumlah</td>';
                                        echo '<td></td>';
                                        echo '<td>'.number_format($totalkeluar).'</td>';
                                        echo '<td align="right">'.number_format($totalkeluar1).'</td>';
                                echo '</tr>';

                        ?>
                        </tbody>
                    </table>
                    </div>
                </div>
                </div>
            </div>
        </div>