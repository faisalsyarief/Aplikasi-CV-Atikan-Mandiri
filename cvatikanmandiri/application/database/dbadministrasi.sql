-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 13, 2018 at 03:25 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbadministrasi`
--

-- --------------------------------------------------------

--
-- Table structure for table `banking`
--

CREATE TABLE `banking` (
  `id_bank` varchar(11) NOT NULL,
  `nama_pemilik` varchar(50) NOT NULL,
  `no_rekening` varchar(30) NOT NULL,
  `jenis_bank` varchar(10) NOT NULL,
  `gambar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `banking`
--

INSERT INTO `banking` (`id_bank`, `nama_pemilik`, `no_rekening`, `jenis_bank`, `gambar`) VALUES
('BANK00001', 'Faisal Syarifuddin', '0395401081', 'BNI', '_b1srOsk.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `daftar_buku`
--

CREATE TABLE `daftar_buku` (
  `id_buku` varchar(10) NOT NULL,
  `judul_buku` varchar(30) DEFAULT NULL,
  `ket_judul` text,
  `tingkat` varchar(20) DEFAULT NULL,
  `kelas` int(11) DEFAULT NULL,
  `jenis` varchar(50) DEFAULT NULL,
  `pengarang` text,
  `harga` int(30) DEFAULT NULL,
  `jumlah_stok` int(11) DEFAULT NULL,
  `id_cetak` varchar(10) NOT NULL,
  `id_terbit` varchar(10) NOT NULL,
  `semester` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `daftar_buku`
--

INSERT INTO `daftar_buku` (`id_buku`, `judul_buku`, `ket_judul`, `tingkat`, `kelas`, `jenis`, `pengarang`, `harga`, `jumlah_stok`, `id_cetak`, `id_terbit`, `semester`) VALUES
('BK001', 'PLH', 'Pendidikan Lingkungan Hidup', 'SD/Mi', 1, 'Paket', 'Adi Asmara, SE & Tim Cahaya', 27200, 10, 'CV. Atikan', 'CV. Atikan', '1'),
('BK002', 'LUGINA', 'Bahasa Sunda', 'SD/Mi', 1, 'Paket', 'Darpan, S.Pd', 25350, 20, 'CV. Atikan', 'CV. Atikan', '1'),
('BK003', 'PLH', 'Pendidikan Lingkungan Hidup', 'SD/Mi', 2, 'Paket', 'Adi Asmara, SE & Tim Cahaya', 29350, 10, 'CV. Atikan', 'CV. Atikan', '1'),
('BK004', 'PLH', 'Pendidikan Lingkungan Hidup', 'SD/Mi', 3, 'Paket', 'Adi Asmara, SE & Tim Cahaya', 27350, 10, 'CV. Atikan', 'CV. Atikan', '1'),
('BK005', 'LUGINA', 'Bahasa Sunda', 'SD/Mi', 2, 'Paket', 'Darpan, S.Pd', 25350, 100, 'CV. Atikan', 'CV. Atikan', '1'),
('BK006', 'Huruf Hijaiyah', 'Agama', 'TK', 0, 'Majalah', '-', 4000, 150, 'CV. Atikan', 'CV. Atikan', '-'),
('BK007', 'Agama', 'Pendidikan Agama Islam', 'SMP', 7, 'Paket', '-', 25350, 100, 'CV. Atikan', 'CV. Atikan', 'Ganjil');

-- --------------------------------------------------------

--
-- Table structure for table `detail_pembelian`
--

CREATE TABLE `detail_pembelian` (
  `id_detailbeli` int(11) NOT NULL,
  `no_faktur` varchar(10) DEFAULT NULL,
  `id_buku` varchar(10) DEFAULT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_pembelian`
--

INSERT INTO `detail_pembelian` (`id_detailbeli`, `no_faktur`, `id_buku`, `qty`) VALUES
(94, 'INV001', 'BK002', 10),
(95, 'INV002', 'BK005', 50),
(96, 'INV003', 'BK004', 10);

-- --------------------------------------------------------

--
-- Table structure for table `det_pengiriman`
--

CREATE TABLE `det_pengiriman` (
  `id_detkirim` int(11) NOT NULL,
  `no_faktur` varchar(10) NOT NULL,
  `tgl_kirim` date NOT NULL,
  `status_kirim` enum('sedang di proses','sudah sampai tujuan') NOT NULL,
  `gambar` text NOT NULL,
  `id_kurir` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `det_pengiriman`
--

INSERT INTO `det_pengiriman` (`id_detkirim`, `no_faktur`, `tgl_kirim`, `status_kirim`, `gambar`, `id_kurir`) VALUES
(10, 'INV002', '2018-02-01', 'sudah sampai tujuan', 'bukti.PNG', 'KUR001'),
(19, 'INV003', '2018-02-07', 'sudah sampai tujuan', 'BUKTI.PNG', 'KUR001');

-- --------------------------------------------------------

--
-- Table structure for table `hutang`
--

CREATE TABLE `hutang` (
  `id_hutang` int(11) NOT NULL,
  `no_faktur` varchar(10) NOT NULL,
  `userid` varchar(10) NOT NULL,
  `tgl_beli` datetime NOT NULL,
  `total` int(11) NOT NULL,
  `pembayaran` int(11) NOT NULL,
  `sisa_hutang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hutang`
--

INSERT INTO `hutang` (`id_hutang`, `no_faktur`, `userid`, `tgl_beli`, `total`, `pembayaran`, `sisa_hutang`) VALUES
(4, 'INV001', 'USR022', '2018-02-08 19:24:28', 253500, 50000, 190825),
(5, 'INV001', 'USR022', '2018-02-08 19:25:14', 253500, 100000, 140825),
(6, 'INV001', 'USR022', '2018-02-08 19:27:20', 253500, 240825, 0),
(7, 'INV002', 'USR020', '2018-02-08 19:37:56', 1267500, 500000, 387250),
(8, 'INV002', 'USR020', '2018-02-08 19:38:16', 1267500, 800000, 87250),
(9, 'INV003', 'USR019', '2018-02-09 04:53:00', 273500, 50000, 259825),
(10, 'INV003', 'USR019', '2018-02-09 04:53:13', 273500, 150000, 159825),
(11, 'INV003', 'USR019', '2018-02-09 04:53:24', 273500, 250000, 59825);

-- --------------------------------------------------------

--
-- Table structure for table `kurir`
--

CREATE TABLE `kurir` (
  `id_kur` varchar(11) NOT NULL,
  `nama_kurir` varchar(50) NOT NULL,
  `no_tlpn` varchar(15) NOT NULL,
  `alamat` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kurir`
--

INSERT INTO `kurir` (`id_kur`, `nama_kurir`, `no_tlpn`, `alamat`) VALUES
('KUR001', 'hermawan', '089612837819', 'jl. perintis no 12'),
('KUR002', 'dede', '082117481910', 'jl. aceh'),
('KUR003', 'akhmad', '082113849101', 'jl. anyar no 14'),
('KUR006', 'akhmad', '082118918290', 'jl.anyar no 13 rt 011/011 bandung'),
('KUR007', 'aa', '11', 'aa');

-- --------------------------------------------------------

--
-- Table structure for table `pembelian`
--

CREATE TABLE `pembelian` (
  `no_faktur` varchar(10) NOT NULL,
  `userid` varchar(10) DEFAULT NULL,
  `tgl_beli` datetime DEFAULT NULL,
  `diskon` int(15) DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  `pembayaran` int(11) DEFAULT NULL,
  `sisa_hutang` int(11) NOT NULL,
  `tgl_lunas` date NOT NULL,
  `gambar` text NOT NULL,
  `status` enum('Belum di Proses','Sudah di Proses') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembelian`
--

INSERT INTO `pembelian` (`no_faktur`, `userid`, `tgl_beli`, `diskon`, `total`, `pembayaran`, `sisa_hutang`, `tgl_lunas`, `gambar`, `status`) VALUES
('INV001', 'USR022', '2018-02-08 19:27:20', 5, 253500, 240825, 0, '2018-02-09', 'Pembelian Langsung Di Toko', 'Sudah di Proses'),
('INV002', 'USR020', '2018-02-08 19:38:16', 30, 1267500, 800000, 87250, '2018-02-08', 'Pembelian Langsung Di Toko', 'Sudah di Proses'),
('INV003', 'USR019', '2018-02-09 04:53:24', 5, 273500, 250000, 59825, '2018-02-09', 'Pembelian Langsung Di Toko', 'Sudah di Proses');

-- --------------------------------------------------------

--
-- Table structure for table `penerbit`
--

CREATE TABLE `penerbit` (
  `id_terbit` varchar(10) NOT NULL,
  `nama_terbit` text,
  `alamat_terbit` text,
  `no_tlpn_terbit` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `penerima`
--

CREATE TABLE `penerima` (
  `id_penerima` int(11) NOT NULL,
  `no_faktur` varchar(11) NOT NULL,
  `nama_penerima` text NOT NULL,
  `no_tlpn` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penerima`
--

INSERT INTO `penerima` (`id_penerima`, `no_faktur`, `nama_penerima`, `no_tlpn`) VALUES
(1, 'INV002', 'bambang', '0979876875674');

-- --------------------------------------------------------

--
-- Table structure for table `pengeluaran`
--

CREATE TABLE `pengeluaran` (
  `id_luar` varchar(10) NOT NULL,
  `tgl_keluar` date NOT NULL,
  `keperluan` varchar(50) NOT NULL,
  `nominal` int(11) NOT NULL,
  `ket_keluar` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengeluaran`
--

INSERT INTO `pengeluaran` (`id_luar`, `tgl_keluar`, `keperluan`, `nominal`, `ket_keluar`) VALUES
('PLN001', '2018-01-31', 'Buku', 500000, ''),
('PLN002', '2018-01-31', 'Kertas', 800000, ''),
('PLN003', '2018-01-31', 'Cover Buku', 200000, '');

-- --------------------------------------------------------

--
-- Table structure for table `percetakan`
--

CREATE TABLE `percetakan` (
  `id_cetak` varchar(10) NOT NULL,
  `nama_cetak` text,
  `alamat_cetak` text,
  `no_tlpn_cetak` text,
  `no_fax_cetak` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tracking_detail`
--

CREATE TABLE `tracking_detail` (
  `id_track` int(11) NOT NULL,
  `no_faktur` varchar(20) NOT NULL,
  `tgl` date NOT NULL,
  `time` time NOT NULL,
  `lokasi` varchar(100) NOT NULL,
  `status_track` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tracking_detail`
--

INSERT INTO `tracking_detail` (`id_track`, `no_faktur`, `tgl`, `time`, `lokasi`, `status_track`) VALUES
(14, 'INV002', '2018-02-01', '08:39:00', 'Perusahaan CV Atikan Mandiri', 'shipment received by courier'),
(16, 'INV002', '2018-02-01', '10:47:00', 'Bandung', 'WITH DELIVERY COURIER'),
(17, 'INV002', '2018-02-01', '12:35:00', 'sukasari, Bandung', 'DELIVERED TO BAMBANG\r\n'),
(18, 'INV003', '2018-02-06', '23:58:00', 'Perusahaan CV Atikan Mandiri', 'shipment received by courier'),
(19, 'INV003', '2018-02-07', '12:02:00', 'BANDUNG', 'DELIVERY');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userid` varchar(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `alamat` text NOT NULL,
  `group` tinyint(1) NOT NULL,
  `lastlogin` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userid`, `name`, `email`, `username`, `password`, `alamat`, `group`, `lastlogin`) VALUES
('KUR007', 'aa', 'a@gmail.com', 'aa', 'aa', 'aa', 3, '0000-00-00'),
('USR005', 'Hanna Tasya', 'hannaatasya@gmail.com', 'hanna', 'hanna', 'Cibogo, Bandung', 2, '2018-01-22'),
('USR006', 'Faisal Syarifuddin', 'ichaltkj96@gmail.com', 'faisalsyarief', 'faisalsyarief', 'Blok 8 No. 126, Sarijadi Bandung', 1, '2018-01-22'),
('USR007', 'Abdul Mulyono', 'abdulmulyono@gmail.com', 'abdulmulyono', 'abdulmulyono', 'Bumi Harapan Cibiru CC 12 No. 72', 3, '2018-01-31'),
('USR008', 'Hendra / Alip Wahyoedi', 'hendra@gmail.com', 'hendra', 'hendra', 'Sindang Rasa Rt. 02/01 No. 72', 2, '2018-01-31'),
('USR009', 'Maman Sahdi', 'mamansahdi@gmail.com', 'mamansahdi', 'mamansahdi', 'Sukaleueur', 2, '2018-01-31'),
('USR010', 'Marwanto', 'marwanto@gmail.com', 'marwanto', 'marwanto', 'Jl. Agape No. 10 Perum. Puri Cibeureum Permai 2', 2, '2018-01-31'),
('USR011', 'Asep K', 'asepk@gmail.com', 'asepk', 'asepk', 'Bumi Cibinong Endah Blok C-7 No. 23 Rt. 07 Rw. 09', 2, '2018-01-31'),
('USR012', 'H. Sumadi', 'sumadi@gmail.com', 'sumadi', 'sumadi', 'Jl. Gunung Laya 2 NO. 43 A Klayam', 2, '2018-01-31'),
('USR013', 'Mulyadi', 'mulyadi@gmail.com', 'mulyadi', 'mulyadi', 'Jl. Ciganitri Mukti V No. 12', 2, '2018-01-31'),
('USR014', 'Dede AS', 'dede@gmail.com', 'dede', 'dede', 'Cijerah', 2, '2018-01-31'),
('USR015', 'Jaka Purnama, SE', 'jakapurnama@gmail.com', 'jakapurnama', 'jakapurnama', 'Jl. A. Sohiri Pamat Tanah Baru Perum. Taman Kenari Blok C 7 No. 1, 16155', 2, '2018-01-31'),
('USR016', 'Gianto', 'gianto@gmail.com', 'gianto', 'gianto', 'Jl. Cibuntu Gadog Cibitung', 2, '2018-01-31'),
('USR017', 'H. Baskoro Waluyo', 'baskorowaluyo@gmail.com', 'baskorowaluyo', 'baskorowaluyo', 'Komp. Cibiuk Indah Blok II No. 8 Perbas Moh. Toha', 2, '2018-01-31'),
('USR018', 'Cecep B', 'cecepb@gmail.com', 'cecepb', 'cecepb', 'Jl. Sena 1 No. 5 Komp. Bima Indah', 2, '2018-01-31'),
('USR019', 'Dadan R', 'dadanr@gmail.com', 'dadanr', 'dadanr', 'Jl. Cisaranten Kulon No. 48 B', 2, '2018-01-31'),
('USR020', 'H. Aep Sutisna, S.Pd', 'aepsutisna@gmail.com', 'aepsutisna', 'aepsutisna', 'Jl. Raya Sukawening No. 607 (Panatas)', 2, '2018-01-31'),
('USR021', 'Apet Sudrajat', 'apetsudrajat@gmail.com', 'apetsudrajat', 'apetsudrajat', 'Jl. Cijerah Gg. Mekar Sari RT. 06/04 Cijerah', 2, '2018-01-31'),
('USR022', 'Tatang Hidayat', 'tatanghidayat@gmail.com', 'tatanghidayat', 'tatanghidayat', 'Jl. Tegal VII Perum Limus Pratama Regency G9 No.22 RT. 07/07 Kel. Limusnunggal Kec. Cileungsi', 2, '2018-01-31'),
('USR023', 'Iman', 'iman@gmail.com', 'iman', 'iman', 'Jl. Raya Rancaekek No. 404', 2, '2018-01-31'),
('USR024', 'Nurdiana', 'nurdiana@gmail.com', 'nurdiana', 'nurdiana', 'Jl. Pasantren No. 102 RT. 02/16', 2, '2018-01-31'),
('USR025', 'Anwar Syahid', 'anwarsyahid@gmail.com', 'anwarsyahid', 'anwarsyahid', 'Jl. Komp. Soreang Indah Blok P I Soreang', 2, '2018-01-31'),
('USR026', 'Yuli', 'yuli@gmail.com', 'yuli', 'yuli', 'Jl. Serma Muktar No. 85', 2, '2018-01-31'),
('USR027', 'Irfan', 'irfan@gmail.com', 'irfan', 'irfan', 'Jl. Soreag Cipatik No. 30 Kel. Jati Sari', 2, '2018-01-31'),
('USR028', 'H. Sukadi', 'sukadi@gmail.com', 'sukadi', 'sukadi', 'Jl. Mayor Abdurahman Gg. Ita No. 8 Kotakaler', 2, '2018-01-31'),
('USR029', 'Inggie / Jangkung', 'inggie@gmail.com', 'inggie', 'inggie', 'Perum Griya Astri No. 17 Heuleut Kadipaten', 2, '2018-01-31');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `banking`
--
ALTER TABLE `banking`
  ADD PRIMARY KEY (`id_bank`);

--
-- Indexes for table `daftar_buku`
--
ALTER TABLE `daftar_buku`
  ADD PRIMARY KEY (`id_buku`);

--
-- Indexes for table `detail_pembelian`
--
ALTER TABLE `detail_pembelian`
  ADD PRIMARY KEY (`id_detailbeli`);

--
-- Indexes for table `det_pengiriman`
--
ALTER TABLE `det_pengiriman`
  ADD PRIMARY KEY (`id_detkirim`);

--
-- Indexes for table `hutang`
--
ALTER TABLE `hutang`
  ADD PRIMARY KEY (`id_hutang`);

--
-- Indexes for table `kurir`
--
ALTER TABLE `kurir`
  ADD PRIMARY KEY (`id_kur`);

--
-- Indexes for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`no_faktur`);

--
-- Indexes for table `penerbit`
--
ALTER TABLE `penerbit`
  ADD PRIMARY KEY (`id_terbit`);

--
-- Indexes for table `penerima`
--
ALTER TABLE `penerima`
  ADD PRIMARY KEY (`id_penerima`);

--
-- Indexes for table `pengeluaran`
--
ALTER TABLE `pengeluaran`
  ADD PRIMARY KEY (`id_luar`);

--
-- Indexes for table `percetakan`
--
ALTER TABLE `percetakan`
  ADD PRIMARY KEY (`id_cetak`);

--
-- Indexes for table `tracking_detail`
--
ALTER TABLE `tracking_detail`
  ADD PRIMARY KEY (`id_track`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detail_pembelian`
--
ALTER TABLE `detail_pembelian`
  MODIFY `id_detailbeli` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;
--
-- AUTO_INCREMENT for table `det_pengiriman`
--
ALTER TABLE `det_pengiriman`
  MODIFY `id_detkirim` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `hutang`
--
ALTER TABLE `hutang`
  MODIFY `id_hutang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `penerima`
--
ALTER TABLE `penerima`
  MODIFY `id_penerima` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tracking_detail`
--
ALTER TABLE `tracking_detail`
  MODIFY `id_track` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
