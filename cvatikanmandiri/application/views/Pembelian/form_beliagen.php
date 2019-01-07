            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-sm-4">
                    <h2>Pembelian</h2>
                    <ol class="breadcrumb">
                        <li>Pembelian</li>
                        <li class="active">
                            <strong>Form Pembelian</strong>
                        </li>
                    </ol>
                </div>
            </div>

            <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Daftar Pembelian</h5>
                       
                    </div>
                    <div class="ibox-content">
                    <form method="post" action="<?php echo base_url();?>index.php/pembelian/manageagen" class="form-horizontal">
                        <input type="hidden" name="id" value="<?php echo @$detail[0]['no_faktur']?>">
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Tanggal Pembelian</label>
                            <div class="col-sm-10"><input type="date" name="tgl_beli" class="form-control" value="<?php echo date("Y-m-d");?>" readonly></div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">No Faktur</label>
                            <div class="col-sm-10"><input type="text" name="no_faktur" class="form-control" value="<?php echo @$kode?>" readonly></div>
                        </div>
                        <div class="hr-line-dashed"></div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label">Nama Agen</label>
                            <div class="col-sm-10"><input type="text" name="userid" class="form-control" value="<?php echo $this->session->userdata('userid'); ?>" readonly></div>
                        </div>
                        <div class="hr-line-dashed"></div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label">Daftar Buku</label>
                            <div class="col-sm-10">
                                <button type="button" id="tambah" class="btn btn-primary" data-toggle="modal" data-target="#bukumodal">Tambah</button>

                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Hapus</th>
                                            <th>Nama Buku</th>
                                            <th>Harga</th>
                                            <th>Qty</th>
                                            <th>Jumlah</th>
                                        </tr>
                                    </thead>
                                    <tbody id="isi">  
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td colspan="4" align="right">Sub Total</td>
                                            <td><input type="text" class="form-control money" name="total" id="subtotal" value="0" readonly="readonly"/></td>
                                        </tr>
                                        <tr>
                                            <td colspan="4" align="right">Disc (%)</td>
                                            <td><input type="text" class="form-control" maxlength="3" name="diskon" id="diskon" value="0" readonly></td>
                                        </tr>
                                        <tr>
                                            <td colspan="4" align="right">Total</td>
                                            <td><input type="text" class="form-control money" name="" id="total" value="0" readonly="readonly"/></td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>    

                        <div class="form-group">
                            <div class="col-sm-4 col-sm-offset-2">
                                <button class="btn btn-primary" type="submit" name="submit" value="submit">Beli</button>
                            </div>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal inmodal fade" id="bukumodal" tabindex="-1" role="dialog"  aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title">Daftar Buku</h4>
                </div>
                <div class="modal-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Judul</th>
                                <th>Stok</th>
                                <th>Harga</th>
                                <th>#</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            if(@$buku){
                                foreach($buku as $row){
                                    ?>
                                    <input type="hidden" class="id_buku" value="<?php echo $row['id_buku'];?>"/>
                                    <input type="hidden" class="judul_buku" id="nb-<?php echo $row['id_buku'];?>" value="<?php echo $row['judul_buku'];?>"/>
                                    <input type="hidden" class="harga" id="hg-<?php echo $row['id_buku'];?>" value="<?php echo $row['harga'];?>"/>
                                    <tr>
                                        <td><?php echo $no++;?></td>
                                        <td><?php echo $row['judul_buku'];?></td>
                                        <td><?php echo $row['jumlah_stok'];?></td>
                                        <td><?php echo $row['harga'];?></td>
                                        <td><button type"button" class="btn btn-primary btn-xs btn-tambah" id="tb-<?php echo $row['id_buku'];?>">Tambah</button></td>
                                    </tr>
                                    <?php
                                }
                            }

                            ?>
                        </tbody>
                    </table>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-white" data-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function(){
          $('.btn-tambah').click(function(){ //nambahin di tabel pembelian
            var ch = $(this).attr('id').split('-');
            var id = ch[1];
            var judul = $('#nb-'+id).val();
            var harga = $('#hg-'+id).val();
            // var stok = $('#stk-'+id).val();

            $('#isi').prepend('<tr id="tr-'+id+'">'+
                '<input type="hidden" name="id_buku[]" value="'+id+'">' +
                '<td><button type="button" class="btn btn-danger btn-xs btn-remove" id="remove-'+id+'"><i class="fa fa-remove"></i></button></td>' +
                '<td>'+judul+'</td>' +
                //'<td>'+stok+'</td>' +
                '<td>'+harga+'</td>' +
                '<td id="td-'+id+'"></td>' +
                '<td><input type="text" class="form-control money" name="hrg_smtr[]" id="hs-'+id+'" value="0" readonly="readonly"></td>' +
                '</tr>');

            $('<input type="text" class="form-control inp-qty money" name="qty[]" id="qty-'+id+'" value="0">').appendTo('#td-'+id).number(true, 0);
           // console.log(judul+' '+harga);
          });

          $(document).on('click', '.btn-remove', function(){ //remove
            var ch = $(this).attr('id').split('-');
            var id = ch[1];
            var hrg_smtr = $('#hs-'+id).val();
            var subtotal = $('#subtotal').val();
            stotal = parseInt(subtotal) - parseInt(hrg_smtr);
            $('#subtotal').val(stotal);

            $('#tr-'+id).remove();
          });

          $(document).on('keyup', '.inp-qty', function(){ //masukin qty
            var ch = $(this).attr('id').split('-');
            var id = ch[1];
            var harga = $('#hg-'+id).val();
            var qty = $(this).val();
            var subtotal = $('#subtotal').val();
            var hargatemp =  $('#hs-'+id).val();
            var diskon = $('#diskon').val();
            var total = $('#total').val();

            
            // #1 --> jika qty kosong langsung diganti 0
            if(qty == ""){
                qty = 0;
                $(this).val(0);
                $('#hs-'+id).val(0);

                // #3 --> jika qty otomatis 0, subtotal berkurang
                stotalmin = parseInt(subtotal) - parseInt(hargatemp);

                // #2 --> jika qty kosong, subtotal langsung berkurang
                jumlah = parseInt(qty) * parseInt(harga);
                stotal= parseInt(stotalmin) - parseInt(jumlah);


            }else{
                stotalmin = parseInt(subtotal) - parseInt(hargatemp);
                jumlah = parseInt(qty) * parseInt(harga);
                stotal= parseInt(jumlah) + parseInt(stotalmin);

            }

            total = parseInt(stotal) - parseInt((parseInt(stotal) * parseInt(diskon) / parseInt(100)));
            
            $('#hs-'+id).val(jumlah).number(true ,0);
            $('#subtotal').val(stotal);
            $('#total').val(total);
          });

          $('#diskon').keyup(function(){
            var diskon = $('#diskon').val();
            var subtotal = $('#subtotal').val();

            if(diskon == ""){
                diskon = 0;
                $(this).val(0);
            }
            if(subtotal >= 100000){
                diskon = 5;
                $(this).val(5);
            }
            if(subtotal >= 300000){
                diskon = 10;
                $(this).val(10);
            }
            if(subtotal >= 500000){
                diskon = 15;
                $(this).val(15);
            }
            if(subtotal >= 700000){
                diskon = 20;
                $(this).val(20);
            }
            if(subtotal >= 900000){
                diskon = 25;
                $(this).val(25);
            }
            if(subtotal >= 1000000){
                diskon = 30;
                $(this).val(30);
            }
            if(subtotal >= 1300000){
                diskon = 35;
                $(this).val(35);
            }            
            if(subtotal >= 1700000){
                diskon = 40;
                $(this).val(40);
            }
            if(subtotal >= 1900000){
                diskon = 45;
                $(this).val(45);
            }
            if(subtotal >= 3000000){
                diskon = 50;
                $(this).val(50);
            }
            total = parseInt(subtotal) - parseInt((parseInt(subtotal) * parseInt(diskon) / parseInt(100)));
            $('#total').val(total);

          });

          $('#pembayaran').keyup(function(){ //pembayaran
            var bayar = $(this).val();
            var total =$('#total').val();

            if(bayar == ""){
                bayar = 0;
                $(this).val(0);
            }

            if(parseInt(bayar) >= parseInt(total)){
                kembali = parseInt(bayar) - parseInt(total);
                hutang = 0;

            }

            if(parseInt(bayar) < parseInt(total)){
                hutang = parseInt(total) - parseInt(bayar);
                kembalian = 0;
            }
            $('#hutang').val(hutang);
            $('#kembali').val(kembali);
          });

        });
    </script>


            
