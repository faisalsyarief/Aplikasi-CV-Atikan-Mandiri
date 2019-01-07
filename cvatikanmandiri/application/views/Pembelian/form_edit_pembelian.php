<?php
	$id = $pembelian->no_faktur;
if($this->input->post('is_submitted')){
    $no_faktur = set_value('no_faktur');
    $userid = set_value('userid');
    $tgl_beli = set_value('tgl_beli');
	$total = set_value('total');
	$pembayaran = set_value('pembayaran');
	$sisa_hutang = set_value('sisa_hutang');
}else{
    $no_faktur = $pembelian->no_faktur;
    $userid = $pembelian->userid;
    $tgl_beli = $pembelian->tgl_beli;
	$total = $pembelian->total;
	$pembayaran = $pembelian->pembayaran;
	$sisa_hutang = $pembelian->sisa_hutang;
}
?>
<?php $this->load->view('element/header') ?>

  	<div id="page-wrapper">

        <div class="col-md-11">
	       
	       <?=form_open_multipart('pembelian/edit_pembelian/' . $id,['class'=>'form-horizontal'])?>
           <?php $error = form_error("no_faktur", "<p class='text-danger'>", '</p>'); ?>
             <div class="form-group <?php echo $error ? 'has-error' : '' ?>">
                <div class="col-sm-10">
                  <input type="hidden" class="form-control" name="no_faktur" value="<?= $no_faktur ?>" readonly>
                  <?php echo $error; ?>
                </div>
              </div>

              <?php $error = form_error("userid", "<p class='text-danger'>", '</p>'); ?>
             <div class="form-group <?php echo $error ? 'has-error' : '' ?>">
                <div class="col-sm-10">
                  <input type="hidden" class="form-control" name="userid" value="<?= $userid ?>" readonly>
                  <?php echo $error; ?>
                </div>
              </div>

              <?php $error = form_error("tgl_beli", "<p class='text-danger'>", '</p>'); ?>
             <div class="form-group <?php echo $error ? 'has-error' : '' ?>">
                  <label class="col-sm-2 control-label">Tanggal Pembayaran</label>
                <div class="col-sm-10">
                  <input type="date" class="form-control" name="tgl_beli" value="<?php echo date("Y-m-d");?>" readonly>
                  <?php echo $error; ?>
                </div>
              </div>

              <?php $error = form_error("total", "<p class='text-danger'>", '</p>'); ?>
	         <div class="form-group <?php echo $error ? 'has-error' : '' ?>">
	         	<label class="col-sm-2 control-label">Total</label>
	            <div class="col-sm-10">
	              <input type="text" class="form-control money" name="total" value="<?= $total ?>" readonly>
	              <?php echo $error; ?>
	            </div>
	          </div>
	          
	          <?php $error = form_error("pembayaran", "<p class='text-danger'>", '</p>'); ?>
	          <div class="form-group <?php echo $error ? 'has-error' : '' ?>">
	            <label class="col-sm-2 control-label">DP</label>
	            <div class="col-sm-10">
	              <input type="text"  class="form-control money" value="<?= $pembayaran ?>" readonly>
	              <?php echo $error; ?>
	            </div>
	          </div>

	          <?php $error = form_error("sisa_hutang", "<p class='text-danger'>", '</p>'); ?>
	          <div class="form-group <?php echo $error ? 'has-error' : '' ?>">
	            <label class="col-sm-2 control-label">Sisa Hutang</label>
	            <div class="col-sm-10">
	              <input type="text"  class="form-control money" id="total" value="<?= $sisa_hutang ?>" readonly>
	              = <input type="text"  class="form-control money" name="sisa_hutang" id="hutang" value="<?= $sisa_hutang ?>" readonly>
	              <?php echo $error; ?>
	            </div>
	          </div>

	          <?php $error = form_error("pembayaran", "<p class='text-danger'>", '</p>'); ?>
	          <div class="form-group <?php echo $error ? 'has-error' : '' ?>">
	            <label class="col-sm-2 control-label">Pembayaran</label>
	            <div class="col-sm-10">
	              <input type="text"  class="form-control money" name="pembayaran" id="pembayaran" value="0">
	              <?php echo $error; ?>
	            </div>
	          </div>
	          
	          <div class="form-group">
	            <div class="col-sm-offset-2 col-sm-10">
	              <button type="submit" class="btn btn-primary pull-right">Simpan</button>
	            </div>
	          </div>
	       </form>
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
                stotal = parseInt(stotalmin) - parseInt(jumlah);


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
                diskon =0;
                $(this).val(0);
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