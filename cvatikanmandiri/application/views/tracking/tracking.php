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
        <h2>Tracking</h2>
    </div>
    <div class="col-lg-4">
        <div class="title-action">
            <!--<button onclick="window.print()" class="btn btn-default"><i class="fa fa-print"></i> Cetak Faktur</button>-->   
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#kurir"><i class="fa fa-truck" ></i> Info Kurir</button>
            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#penerima"><i class="fa fa-send" ></i> Info Penerima</button>
        </div>
    </div>
</div>
<div class="row" id="section-to-print">
<div class="col-lg-12">
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="ibox-content p-xl">
                <div class="row" >
                    <div class="col-sm-6">
                        <h5>Pengirim:</h5>
                        <address>
                            <strong>CV ATIKAN MANDIRI</strong><br>
                            Jl. Pasir Impun Atas No. 7 RT 01 RW 05<br>
                            Bandung<br>
                            <abbr title="Phone">Telp :</abbr> 08979086034 - 081320586250
                        </address>
                    </div>

                    <div class="col-sm-6 text-right">
                        <h4>No Faktur</h4>
                        <h4 class="text-navy"><?php echo @$kirim[0]['no_faktur'];?></h4>
                        <span>Penerima:</span>
                        <address>
                            <strong><?php echo @$user[0]['name'];?></strong><br>
                            <?php echo @$user[0]['alamat'];?><br>
                            <?php echo @$user[0]['nohp'];?><br>
                        </address>
                        <p>
                            <span><strong>Tanggal Kirim:</strong> <?php echo date('d/m/Y', strtotime($kirim[0]['tgl_kirim']))?></span>
                        </p>
                        <p>
                            <span><strong>Status:</strong> <?php echo @$kirim[0]['status_kirim']?></span>
                        </p>
                    </div>
                </div>

                <div class="table-responsive m-t">
                     <table class= "table table-striped table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>Tanggal</th>
                            <th>Lokasi</th>
                            <th>Status</th>
                            
                        </tr>
                        </thead>
                        <tbody>
                            <?php if(@$view):?>
                            <?php foreach($view as $row):?>
                                        <tr>
                                        <td><?php echo date('d/m/Y', strtotime($row['tgl']));?> <?php echo date('h:i', strtotime($row['time']));?></td>
                                        <td><?php echo $row['lokasi'];?></td>
                                        <td><?php echo @$row['status_track'];?></td>
                                        </tr>
                           <?php endforeach?>
                        <?php endif?> 
                        </tbody>
                    </table>
                </div><!-- /table-responsive -->
            </div>
    </div>
    <div class="modal inmodal fade" id="kurir" tabindex="-1" role="dialog"  aria-hidden="true"> <!-- kurir-->
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title">Info Kurir <?php echo @$kurir[0]['id_kur'];?></h4>
                </div>
                <div class="modal-body">
                    <div>
                        
                   <table class= "table table-striped table-bordered table-hover">
                        <div class="form-group">
                        <label class="col-sm-2 control-label">ID Kurir</label>
                            <div class="col-sm-10"><input type="text" class="form-control" value=<?php echo $kurir[0]['id_kur'];?> readonly="readonly"></div>
                        </div>
                        
                        <div class="form-group">
                        <label class="col-sm-2 control-label">Nama Kurir</label>
                            <div class="col-sm-10"><input type="text" class="form-control" value=<?php echo $kurir[0]['nama_kurir'];?> readonly="readonly"></div>
                        </div>
                        
                        <div class="form-group">
                        <label class="col-sm-2 control-label">Alamat</label>
                            <div class="col-sm-10"><input type="text" class="form-control" value=<?php echo $kurir[0]['alamat'];?> readonly="readonly"></div>
                        </div>
                        
                        <div class="form-group">
                        <label class="col-sm-2 control-label">No Telepon</label>
                            <div class="col-sm-10"><input type="text" class="form-control" value=<?php echo $kurir[0]['no_tlpn'];?> readonly="readonly"></div>
                        </div>

                    </table>
                
                </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-white" data-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal inmodal fade" id="penerima" tabindex="-1" role="dialog"  aria-hidden="true">  <!-- penerima-->
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title">Di terima oleh : </h4>
                </div>
                <div class="modal-body">
                    <div>
                        
                   <table class= "table table-striped table-bordered table-hover">
                        <div class="form-group">
                        <label class="col-sm-2 control-label">Nama</label>
                            <div class="col-sm-10"><input type="text" class="form-control" value=<?php echo $penerima[0]['nama_penerima'];?> readonly="readonly"></div>
                        </div>
                        
                        <div class="form-group">
                        <label class="col-sm-2 control-label">No Telepon</label>
                            <div class="col-sm-10"><input type="text" class="form-control" value=<?php echo $penerima[0]['no_tlpn'];?> readonly="readonly"></div>
                        </div>

                    </table>
                
                </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-white" data-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
