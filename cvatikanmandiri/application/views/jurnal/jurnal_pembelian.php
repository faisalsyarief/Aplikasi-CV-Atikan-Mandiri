            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-sm-4">
                    <h2>Jurnal</h2>
                    <ol class="breadcrumb">
                        <li>Jurnal</li>
                        <li class="active">
                            <strong>Jurnal Pembelian</strong>
                        </li>
                    </ol>
                </div>
                <div class="col-sm-8">
                    <div class="title-action">
                        <a href="<?php echo base_url();?>index.php/jurnal" class="btn btn-primary">Jurnal Umum</a>
                        <a href="<?php echo base_url();?>index.php/jurnal/pengeluaran" class="btn btn-primary">Jurnal Pengeluaran</a>
                        <a href="<?php echo base_url();?>index.php/jurnal/jurnal_hutang" class="btn btn-primary">Jurnal Hutang</a>
                    </div>
                </div>
            </div>

            <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-content">
                    <table class= "table table-striped table-bordered table-hover">
                        <thead>
                        <tr>
                            <th rowspan="3">Tgl Faktur</th>
                            <th rowspan="3">ID Agen</th>
                            <th rowspan="3">No Faktur</th>
                            <th colspan="<?php echo count(@$buku)*2?>">Buku</th>
                            <th rowspan="3">Jumlah</th>
                            <th rowspan="3">Diskon</th>
                            <th rowspan="3">Total</th>
                        </tr>
                        <tr>
                            <?php
                            if(@$buku){
                                foreach($buku as $row){
                                echo '<th colspan="2">'.$row['jdl_buku'].'</th>';
                            }
                            }
                            ?>
                        </tr>
                        <tr>
                            <?php
                            for($c=1;$c<=count(@$buku);$c++){
                                echo '<th>qty</th>';
                                echo '<th>Harga</th>';
                            }

                            ?>
                        </tr>
                        </thead>
                        <tbody>
                            <?php
                                $total_semua = 0;
                            if(@$faktur){
                                    foreach($faktur as $row){
                                        $jumlah = 0;
                                        $total = 0;
                                        echo '<tr>';
                                        echo '<td>'.$row['tgl_beli'].'</td>';
                                        echo '<td>'.$row['userid'].'</td>';
                                        echo '<td>'.$row['no_faktur'].'</td>';
                                        if(@$buku){
                                            foreach(@$buku as $b){
                                                $cek = $this->Mpembelian->det_agen($row['no_faktur'], $b['id_buku']);
                                                if(@$cek){
                                                    echo '<td>'.$cek[0]['qty'].'</td>';
                                                    echo '<td>'.number_format($b['harga']).'</td>';
                                                    $jumlah = $jumlah+($cek[0]['qty']*$b['harga']);
                                                } else {
                                                    echo '<td>-</td>';
                                                    echo '<td>-</td>';
                                                }
                                            }
                                        }
                                        $total = $jumlah-($jumlah*$row['diskon']/100);
                                        $total_semua = $total_semua+$total;
                                        echo '<td>'.number_format($jumlah).'</td>';
                                        echo '<td>'.$row['diskon'].'%</td>';
                                        echo '<td>'.number_format($total).'</td>';
                                        echo '</tr>';
                                    }
                            }
                            echo '<tr>';
                            echo '<td colspan="'.(5+count(@$buku)*2).'">Jumlah</td>';
                            echo '<td>'.number_format($total_semua).'</td>';
                            echo '</tr>';
                            ?>
                        </tbody>
                        </table>
                    </div>
                </div>
                </div>
            </div>
            </div>

            
