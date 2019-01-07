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
        <h2>Info Pembeli</h2>
       
    </div>
    <div class="col-lg-4">
        <div class="title-action">
            <!--<button onclick="window.print()" class="btn btn-default"><i class="fa fa-print"></i> Cetak Faktur</button>-->   
            <a href="<?php echo base_url();?>index.php/Pengiriman/cetak/<?php echo @$detail[0]['no_faktur'];?>" target="_blank" class="btn btn-primary"><i class="fa fa-print"></i> Cetak </a>
        </div>
    </div>
</div>
<div class="row" id="section-to-print">
<div class="col-lg-12">
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="ibox-content p-xl">
                <div class="row" >

                    <div class="col-sm-6 text">
                        <h4>No Faktur</h4>
                        <h4 class="text-navy"><?php echo @$info[0]['no_faktur'];?></h4>
                        <span>To:</span>
                        <address>
                            <strong><?php echo @$user[0]['name'];?></strong><br>
                            <?php echo @$user[0]['alamat'];?><br>
                            <?php echo @$user[0]['nohp'];?><br>
                        </address>
                        <p>
                            <span><strong>Invoice Date:</strong> <?php echo date('d/m/Y', strtotime(@$info[0]['tgl_beli']))?></span><br>
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
                            
                        </tr>
                        </thead>
                        <tbody>
                            
                            <?php if(@$detail):?>
                                <?php foreach (@$detail as $row):?>
                                    <tr>
                                        <td><?php echo $row['buku'];?></td>
                                        <td>Rp. <?php echo number_format($row['harga']);?></td>
                                        <td><?php echo number_format($row['qty']);?></td>

                                    </tr>

                                <?php endforeach?>
                            <?php endif?>

                        </tbody>
                    </table>
                </div><!-- /table-responsive -->

                <div class="col-sm-15 text-right">
                        <p>
                            <span><strong>Date: ...........,.../.../20...</strong></span><br>
                            <span><strong>Penerima</strong></span><br>
                            <br>
                            <br>
                            <br>
                            <br>
                            <br>
                            <span><strong>(........................)</strong></span><br>
                        </p>

                    </div>
            </div>
    </div>
</div>
</div>
