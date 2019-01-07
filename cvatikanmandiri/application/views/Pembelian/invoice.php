<style>
    @media print{
    body * {
    visibility: hidden;
    }
    #section-to-print, #section-to-print * {
    visibility: visible;
    }
    #section-to-print{
    position: absolute;
    left = 0;
    top = 0;
    }

    .opsi, .dataTables_filter{
        display: none;
    }
    .print-title{
        display: block;
    }
}
</style> 
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-8">
        <h2>Pembelian</h2>
        <ol class="breadcrumb">
            <li>
                <a href="index-2.html">Pembelian</a>
            </li>
            <li>
                Form pembelian
            </li>
            <li class="active">
                <strong>Invoice</strong>
            </li>
        </ol>
    </div>
    <div class="col-lg-4">
        <div class="title-action">
            <!--<button onclick="window.print()" class="btn btn-default"><i class="fa fa-print"></i> Cetak Faktur</button>-->   
            <a href="<?php echo base_url();?>index.php/Pembelian/cetak/<?php echo @$detail[0]['no_faktur'];?>" target="_blank" class="btn btn-primary"><i class="fa fa-print"></i> Cetak Faktur</a>
        </div>
    </div>
</div>
<div class="row" id="section-to-print">
<div class="col-lg-12">
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="ibox-content p-xl">
                <div class="row" >
                    <div class="col-sm-6">
                        <h5>From:</h5>
                        <address>
                            <strong>CV ATIKAN MANDIRI</strong><br>
                            Jl. Pasir Impun Atas No. 7 RT 01 RW 05<br>
                            Bandung<br>
                            <abbr title="Phone">Telp :</abbr> 08979086034 - 081320586250
                        </address>
                    </div>

                    <div class="col-sm-6 text-right">
                        <h4>No Faktur</h4>
                        <h4 class="text-navy"><?php echo @$info[0]['no_faktur'];?></h4>
                        <span>To:</span>
                        <address>
                            <strong><?php echo @$user[0]['name'];?></strong><br>
                            <?php echo @$user[0]['alamat'];?><br>
                        </address>
                        <p>
                            <span><strong>Invoice Date:</strong> <?php echo date('d/m/Y', strtotime(@$info[0]['tgl_beli']))?></span><br>
                            <span><strong>Repayment Date:</strong> <?php echo date('d/m/Y', strtotime(@$info[0]['tgl_lunas']))?></span>
                        </p>
                    </div>
                </div>

                <div class="table-responsive m-t">
                    <table class="table invoice-table">
                        <thead>
                        <tr>
                            <th>Barang</th>
                            <th>Harga Price</th>
                            <th>Qty</th>
                            <th>Total</th>
                        </tr>
                        </thead>
                        <tbody>
                            <?php
                                $subtotal =0;
                                $total = 0;
                                $pembayaran = 0;
                                $hutang = 0;
                                $kembalian = 0;

                            ?>
                            <?php if(@$detail):?>
                                <?php foreach (@$detail as $row):?>
                                    <tr>
                                        <td><?php echo $row['buku'];?></td>
                                        <td>Rp. <?php echo number_format($row['harga']);?></td>
                                        <td><?php echo number_format($row['qty']);?></td>
                                        <td>Rp. <?php echo number_format($row['harga'] * $row['qty']);?></td>

                                    </tr>

                                    <?php
                                    $subtotal = $subtotal + ($row['harga'] * $row['qty']);
                                    ?>
                                <?php endforeach?>
                            <?php endif?>

                            <?php
                                $diskon = $subtotal * @$info[0]['diskon'] / 100;
                                $total = $subtotal - $diskon;
                                $pembayaran = @$info[0]['pembayaran'];


                                if($pembayaran >= $total){
                                    $kembalian = $pembayaran - $total;
                                }
                                if($pembayaran <= $total){
                                    $hutang = $total - $pembayaran;
                                }
                            ?>
                        </tbody>
                    </table>
                </div><!-- /table-responsive -->

                <table class="table invoice-total">
                    <tbody>
                    <tr>
                        <td><strong>Sub Total :</strong></td>
                        <td>Rp. <?php echo number_format($subtotal);?></td>
                    </tr>
                    <tr>
                        <td><strong>Diskon :</strong></td>
                        <td><?php echo @$info[0]['diskon'];?>%</td>
                    </tr>
                    <tr>
                        <td><strong>TOTAL :</strong></td>
                        <td>Rp. <?php echo number_format($total);?></td>
                    </tr>
                    <tr>
                        <td><strong>Pembayaran :</strong></td>
                        <td>Rp. <?php echo number_format($pembayaran);?></td>
                    </tr>
                    <tr>
                        <td><strong>Hutang :</strong></td>
                        <td>Rp. <?php echo number_format($hutang);?></td>
                    </tr>
                    <tr>
                        <td><strong>Kembalian :</strong></td>
                        <td>Rp. <?php echo number_format($kembalian);?></td>
                    </tr>
                    </tbody>
                </table>
            </div>
    </div>
</div>
</div>
