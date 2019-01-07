            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-sm-4">
                    <h2>Pemasukan</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a >Keuangan</a>
                        </li>
                        <li class="active">
                            <strong>Pemasukan</strong>
                        </li>
                    </ol>
                </div>
                <div class="col-sm-8">
                    <div class="title-action">
                    </div>
                </div>
            </div>

            <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Data Pemasukan</h5>
                       
                    </div>
                    <div class="ibox-content">
                    <table class="table table-striped table-bordered table-hover dataTables-example" >
                    <thead>
                    <tr>
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Nama Agen</th>
                        <th>No faktur</th>
                        <th>Total</th>
                        <th>Pembayaran</th>
                        <th>Sisa Hutang</th>
                        <th>Tanggal Pelunasan</th>
                    </tr>
                    </thead>
                        <tbody>
                        <?php
                        if(@$result){
                            $i=1;
                            foreach(@$result as $row){
                                echo '<tr>';
                                        echo '<td>'.$i++.'</td>';
                                        echo '<td>'.$row['tgl_beli'].'</td>';
                                        echo '<td>'.$row['name'].'</td>';
                                        echo '<td>'.$row['no_faktur'].'</td>';
                                        echo '<td>'.number_format($row['total']).'</td>';
                                        echo '<td>'.number_format($row['pembayaran']).'</td>';
                                        echo '<td>'.number_format($row['sisa_hutang']).'</td>';
                                        echo '<td>'.$row['tgl_lunas'].'</td>';

                            }
                        }

                        ?>
                        </tbody>
                    </table>
                    </div>
                </div>
                </div>
            </div>
            </div>

            
