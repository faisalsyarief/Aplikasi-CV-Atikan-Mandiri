            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-sm-4">
                    <h2>Jurnal</h2>
                    <ol class="breadcrumb">
                        <li>Jurnal</li>
                        <li class="active">
                            <strong>Jurnal Hutang</strong>
                        </li>
                    </ol>
                </div>
                <div class="col-sm-8">
                    <div class="title-action">
                        <a href="<?php echo base_url();?>index.php/jurnal" class="btn btn-primary">Jurnal Umum</a>
                        <a href="<?php echo base_url();?>index.php/jurnal/pembelian" class="btn btn-primary">Jurnal Pembelian</a>
                        <a href="<?php echo base_url();?>index.php/jurnal/pengeluaran" class="btn btn-primary">Jurnal Pengeluaran</a>
                    </div>
                </div>
            </div>

            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-sm-8">
                </div>
            </div>

            <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Data Hutang</h5>
                       
                    </div>
                    <div class="ibox-content">
                    <table class="table table-striped table-bordered table-hover dataTables-example" >
                    <thead>
                    <tr>
                        <th>Tanggal</th>
                        <th>UserID</th>
                        <th>Keterangan</th>
                        <th>Debet</th>
                        <th>Kredit</th>
                    </tr>
                    </thead>
                        <tbody>
                        <?php
                        $i = 1;
                        $totalhutang = 0;
                        $totalhutang1 = 0;
                        if(@$result){
                            $i=1;
                            foreach(@$result as $row){
                                echo '<tr>';
                                        echo '<td>'.$row['tgl_beli'].'</td>';
                                        echo '<td>'.$row['userid'].'</td>';
                                        echo '<td>Kas</td>';
                                        echo '<td>'.number_format($row['pembayaran']).'</td>';
                                        echo '<td></td>';
                                echo '</tr>';
                                $totalhutang1 = $totalhutang1 + $row['pembayaran'];
                                echo '<tr>';
                                        echo '<td type="hidden">'.$row['tgl_beli'].'</td>';
                                        echo '<td>'.$row['userid'].'</td>';
                                        echo '<td>Piutang</td>';
                                        echo '<td>'.number_format($row['sisa_hutang']).'</td>';
                                        echo '<td></td>';
                                echo '</tr>';
                                $totalhutang1 = $totalhutang1 + $row['sisa_hutang'];
                                echo '<tr>';
                                        echo '<td>'.$row['tgl_beli'].'</td>';
                                        echo '<td>'.$row['userid'].'</td>';
                                        echo '<td align="right">Penjualan</td>';
                                        echo '<td></td>';
                                        echo '<td>'.number_format($row['pembayaran']).'</td>';
                                echo '</tr>';
                                $totalhutang = $totalhutang + $row['pembayaran'];

                            }
                        }
                                echo '<tr>';
                                    echo '<td>Jumlah</td>';
                                    echo '<td></td>';
                                    echo '<td></td>';
                                    echo '<td>'.number_format($totalhutang1).'</td>';
                                    echo '<td>'.number_format($totalhutang).'</td>';
                                echo '</tr>';

                        ?>
                        </tbody>
                    </table>
                    </div>
                </div>
                </div>
            </div>
            </div>

            
