<!DOCTYPE html>
<html>


<!-- Site: HackForums.Ru | E-mail: abuse@hackforums.ru | Skype: h2osancho -->
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>CV ATIKAN MANDIRI</title>

    <link href="<?php echo base_url();?>aset/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>aset/font-awesome/css/font-awesome.css" rel="stylesheet">

    <!-- Data Tables -->
    <link href="<?php echo base_url();?>aset/css/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet">
    <link href="<?php echo base_url();?>aset/css/plugins/dataTables/dataTables.responsive.css" rel="stylesheet">
    <link href="<?php echo base_url();?>aset/css/plugins/dataTables/dataTables.tableTools.min.css" rel="stylesheet">

    <link href="<?php echo base_url();?>aset/css/animate.css" rel="stylesheet">
    <link href="<?php echo base_url();?>aset/css/style.css" rel="stylesheet">


    <script src="<?php echo base_url();?>aset/js/jquery-2.1.1.js"></script>
    <script src="<?php echo base_url();?>aset/js/jquery.number.min.js"></script>

    <script>

        function numberformat(x){ //number format
        return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        }
        $(document).ready(function(){
            $('.money').number( true, 0 );
        });
    </script>

</head>

<body>

    <div id="wrapper">

    <nav class="navbar-default navbar-static-side" role="navigation">
        <div class="sidebar-collapse">
            <ul class="nav" id="side-menu">
                <li class="nav-header">
                    <div class="dropdown profile-element"> <span>
                            <img alt="image" class="img-circle" src="<?php echo base_url();?>aset/img/images.jpg" />
                             </span>
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold"><?php echo $this->session->userdata('username'); ?></strong>
                             </span> </span> </a>
                    </div>
                    <div class="logo-element">
                        IN+
                    </div>
                </li>
                 <li>
                    <a href="<?php echo base_url();?>index.php/Home/index"><i class="fa fa-home"></i> <span class="nav-label">Homepage</span></a>
                </li>
                 <li>
                    <a href="<?php echo base_url();?>index.php/Bank"><i class="fa fa-money"></i> <span class="nav-label">Bank</span></a>
                </li>
                <li>
                    <a href="index-2.html"><i class="fa fa-th-large"></i> <span class="nav-label">Pembelian</span> <span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li ><a href="<?php echo base_url();?>index.php/Pembelian/manage">Form Pembelian</a></li>
                        <li ><a href="<?php echo base_url();?>index.php/Pembelian/managehutang">Form Pembelian Hutang</a></li>
                        <li ><a href="<?php echo base_url();?>index.php/Pembelian/view">Data Pembelian</a></li>
                    </ul>
                </li>

                 <li>
                    <a href="<?php echo base_url();?>index.php/pengiriman/view"><i class="fa fa-truck"></i> <span class="nav-label">Pengiriman</span></a>
                </li>
        
                <li>
                    <a href="index-2.html"><i class="fa fa-th-large"></i> <span class="nav-label">Keuangan</span> <span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li ><a href="<?php echo base_url();?>index.php/Uangmasuk/view">Pemasukan</a></li>
                        <li ><a href="<?php echo base_url();?>index.php/Uangkeluar/view">Pengeluaran</a></li>
                    </ul>
                </li>

                <li>
                    <a href="index-2.html"><i class="fa fa-th-large"></i> <span class="nav-label">Rekapitulasi</span> <span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li ><a href="<?php echo base_url();?>index.php/Rekapitulasi/omset">Omzet</a></li>
                        <li ><a href="<?php echo base_url();?>index.php/Rekapitulasi/Rekapagen">Rekap Pembelian Per Agen</a></li>
                        <li ><a href="<?php echo base_url();?>index.php/Rekapitulasi/rekap_hutang">Rekap Hutang Agen</a></li>
                    </ul>
                </li>

                <li>
                    <a href="<?php echo base_url();?>index.php/Jurnal"><i class="fa fa-th-large"></i> <span class="nav-label">Jurnal</span></a>
                </li>

                <li>
                    <a href="index-2.html"><i class="fa fa-th-large"></i> <span class="nav-label">Master</span> <span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li class="<?php echo @$mnuBuku;?>"><a href="<?php echo base_url();?>index.php/Kurir">Data Kurir</a></li>
                        <li class="<?php echo @$mnuBuku;?>"><a href="<?php echo base_url();?>index.php/Buku">Data Buku</a></li>
                        <li class="<?php echo @$mnuPenerbit;?>"><a href="<?php echo base_url();?>index.php/Penerbit">Data Penerbit</a></li>
                        <li class="<?php echo @$mnuPercetakan;?>"><a href="<?php echo base_url();?>index.php/Percetakan">Data Percetakan</a></li>
                    </ul>
                </li>
                </li>
                 <li class="<?php echo @$mnuUser;?>">
                    <a href="<?php echo base_url();?>index.php/user"><i class="fa fa-user"></i> <span class="nav-label">User</span></a>
                </li>

            </ul>

        </div>
    </nav>

        <div id="page-wrapper" class="gray-bg">
        <div class="row border-bottom">
        <nav class="navbar navbar-static-top  " role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
            
        </div>
            <ul class="nav navbar-top-links navbar-right">
                <li>
                    <span class="m-r-sm text-muted welcome-message">CV ATIKAN MANDIRI</span>
                </li>


                <li>
                    <a href="<?php echo base_url();?>index.php/login/logout">
                        <i class="fa fa-sign-out"></i> Log out
                    </a>
                </li>
            </ul>

        </nav>
        </div>