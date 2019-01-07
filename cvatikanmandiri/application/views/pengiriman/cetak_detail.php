<html>
<head>    
    <title>CV ATIKAN MANDIRI</title>
    <link href="<?php echo base_url();?>aset/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>aset/font-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="<?php echo base_url();?>aset/css/animate.css" rel="stylesheet">
    <link href="<?php echo base_url();?>aset/css/style.css" rel="stylesheet">
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
</head>
<body onload="window.print()"> 
<div class="row" id="section-to-print">
<div class="col-lg-12">
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="ibox-content p-xl">
                <div class="row" >

                    <div class="col-sm-6 text">
                        <h2>BUKTI PENGIRIMAN</h2>
                        <h4>No Faktur</h4>
                        <h4 class="text-navy"><?php echo @$info[0]['no_faktur'];?></h4>
                        <span>To:</span>
                        <address>
                            <strong><?php echo @$user[0]['name'];?></strong><br>
                            <?php echo @$user[0]['alamat'];?><br>
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
                            <th>Total</th>
                        </tr>
                        </thead>
                        <tbody>
                            
                            <?php if(@$detail):?>
                                <?php foreach (@$detail as $row):?>
                                    <tr>
                                        <td><?php echo $row['buku'];?></td>
                                        <td>Rp. <?php echo number_format($row['harga']);?></td>
                                        <td><?php echo number_format($row['qty']);?></td>
                                        <td>Rp. <?php echo number_format($row['harga'] * $row['qty']);?></td>

                                    </tr>

                                <?php endforeach?>
                            <?php endif?>

                        </tbody>
                    </table>
                </div><!-- /table-responsive -->

                <div class="col-sm-15 text-right">
                        <p>
                            <span><strong>Date: ...........,.../.../20...</strong></span><br>
                            <span><strong>Penerima  </strong></span><br>
                            <br>
                            <br>
                            <br>
                            <br>
                            <br>
                            <span><strong>(...................)</strong></span><br>
                        </p>

                    </div>
            </div>
    </div>
</div>
</div>
</body>
</html>