            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-sm-4">
                    <h2>Detail Rekapitulasi</h2>
                    <ol class="breadcrumb">
                        <li>Rekapitulasi</li>
                        <li>Rekap Pembelian PerAgen</li>
                        <li class="active">
                            <strong>Detail Rekap</strong>
                        </li>
                    </ol>
                </div>
                <div class="col-sm-8">
                    <div class="title-action">
                        <a href="<?php echo base_url();?>index.php/rekapitulasi/rekapagen" class="btn btn-primary">Kembali</a>
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
                            if(@$faktur){
                                $total_semua = 0;
                                    foreach($faktur as $row){
                                        $jumlah = 0;
                                        $total = 0;
                                        echo '<tr>';
                                        echo '<td>'.$row['tgl_beli'].'</td>';
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
                            echo '<td colspan="'.(4+count(@$buku)*2).'"></td>';
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

            
