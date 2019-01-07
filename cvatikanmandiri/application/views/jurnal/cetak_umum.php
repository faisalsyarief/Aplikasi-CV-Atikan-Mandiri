<div class="wrapper wrapper-content animated fadeInRight">
                <div class="row">
                    <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Daftar Jurnal</h5>
                           
                        </div>
                        <div class="ibox-content">
                        <table class="table table-striped table-bordered table-hover dataTables-example" >
                        <thead>
                        <tr>
                            <th>Tanggal</th>
                            <th>Keterangan</th>
                            <th>Debit</th>
                            <th>Kredit</th>
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
                                        echo '<td>Cash</td>';

                                        if(@$buku){
                                            foreach(@$buku as $b){
                                                $cek = $this->Mpembelian->det_agen($row['no_faktur'], $b['id_buku']);
                                                if(@$cek){
                                                    $jumlah = $jumlah+($cek[0]['qty']*$b['harga']);
                                                } else {
                                                }
                                            }
                                        }
                                        $total = $jumlah-($jumlah*$row['diskon']/100);
                                        $total_semua = $total_semua+$total;
                                        echo '<td>'.number_format($jumlah).'</td>';
                                        echo '<td></td>';
                                        echo '</tr>';
                                    }
                            }
                            ?>

                            <?php
                                $total_semua = 0;
                            if(@$faktur){
                                    foreach($faktur as $row){
                                        $jumlah = 0;
                                        $total = 0;
                                        echo '<tr>';
                                        echo '<td>'.$row['tgl_beli'].'</td>';
                                        echo '<td align="right">Penjualan</td>';

                                        if(@$buku){
                                            foreach(@$buku as $b){
                                                $cek = $this->Mpembelian->det_agen($row['no_faktur'], $b['id_buku']);
                                                if(@$cek){
                                                    $jumlah = $jumlah+($cek[0]['qty']*$b['harga']);
                                                } else {
                                                }
                                            }
                                        }
                                        $total = $jumlah-($jumlah*$row['diskon']/100);
                                        $total_semua = $total_semua+$total;
                                        echo '<td></td>';
                                        echo '<td>'.number_format($total).'</td>';
                                        echo '</tr>';
                                    }
                            }
                            echo '<tr>';
                            echo '<td>Jumlah</td>';
                            echo '<td></td>';
                            echo '<td>'.number_format($total_semua).'</td>';
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