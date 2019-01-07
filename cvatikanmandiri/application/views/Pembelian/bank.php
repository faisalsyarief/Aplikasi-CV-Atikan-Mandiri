
            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-sm-4">
                    <h2>Daftar Bank</h2>
                    <ol class="breadcrumb">
                        <li>Daftar Bank</li>
                    </ol>
                </div>
                <div class="col-sm-8">
                </div>
            </div>

            <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Daftar Bank</h5>
                       
                    </div>
                    <div class="container table-responsive">
          <div class="col-lg-11">
            <table id="myTable" class="table table-hover">
                <thead>
                  <tr>
                    <th class="header">Kode Bank</th>
                    <th class="header">Nama Pemilik</th>
                    <th class="header">No Rekening</th>
                    <th class="header">Jenis Bank</th>
                    <th class="header">Foto</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach($banking as $banking) : ?>
                  <tr>
                    <td><?=$banking->id_bank?></td>
                    <td><?=$banking->nama_pemilik?></td>
                    <td><?=$banking->no_rekening?></td>
                    <td><?=$banking->jenis_bank?></td>
                    <td><?=img(['src'=>'uploads/bank-image/' . $banking->gambar,'style'=>'max_width:100%; max_height:100%; height:100px;'])?></td>
                  </tr>
                  <?php endforeach; ?>
                </tbody>
            </table>
          </div>
        </div>
                </div>
                </div>
            </div>
            </div>