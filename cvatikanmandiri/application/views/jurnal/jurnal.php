            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-sm-4">
                    <h2>Jurnal</h2>
                    <ol class="breadcrumb">
                        <li>Jurnal</li>
                        <li class="active">
                            <strong>Jurnal Umum</strong>
                        </li>
                    </ol>
                </div>
                <div class="col-sm-8">
                    <div class="title-action">
                        <a href="<?php echo base_url();?>index.php/jurnal/pembelian" class="btn btn-primary">Jurnal Pembelian</a>
                        <a href="<?php echo base_url();?>index.php/jurnal/pengeluaran" class="btn btn-primary">Jurnal Pengeluaran</a>
                        <a href="<?php echo base_url();?>index.php/jurnal/jurnal_hutang" class="btn btn-primary">Jurnal Hutang</a>
                        <a href="<?php echo base_url();?>index.php/Jurnal/cetak_umum/" target="_blank" class="btn btn-primary"><i class="fa fa-print"></i> Cetak Jurnal</a>
                    </div>
                </div>
            </div>

            <div class="wrapper wrapper-content animated fadeInRight">
                <div class="row">
                    <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Jurnal Umum</h5>
                           
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
                                        echo '<td>Kas</td>';

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
                                        echo '<td>'.number_format($total).'</td>';
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