-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 25, 2022 at 02:04 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inventory`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang_keluar`
--

CREATE TABLE `barang_keluar` (
  `id` int(11) NOT NULL,
  `id_transaksi` varchar(100) NOT NULL,
  `tanggal` date NOT NULL,
  `kode_barang` varchar(100) NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `jumlah` varchar(100) NOT NULL,
  `tujuan` varchar(100) NOT NULL,
  `satuan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang_keluar`
--

INSERT INTO `barang_keluar` (`id`, `id_transaksi`, `tanggal`, `kode_barang`, `nama_barang`, `jumlah`, `tujuan`, `satuan`) VALUES
(10, 'TRM-1222001', '2022-12-24', 'BAR-1222001', 'SNOWMAN V1', '32', 'Pembelian', 'BOX'),
(11, 'TRM-1222002', '2022-12-24', 'BAR-1222004', 'SNOWMAN MARKER KECIL', '2', '-', 'Pcs');

--
-- Triggers `barang_keluar`
--
DELIMITER $$
CREATE TRIGGER `barang_keluar` AFTER INSERT ON `barang_keluar` FOR EACH ROW BEGIN
	UPDATE tblbarang SET jumlah = jumlah-new.jumlah
    WHERE kodeBarang=new.kode_barang;
    END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `barang_masuk`
--

CREATE TABLE `barang_masuk` (
  `id` int(11) NOT NULL,
  `id_transaksi` varchar(100) NOT NULL,
  `tanggal` date NOT NULL,
  `kode_barang` varchar(100) NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `pengirim` varchar(100) NOT NULL,
  `jumlah` varchar(100) NOT NULL,
  `satuan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang_masuk`
--

INSERT INTO `barang_masuk` (`id`, `id_transaksi`, `tanggal`, `kode_barang`, `nama_barang`, `pengirim`, `jumlah`, `satuan`) VALUES
(25, 'TRM-1222002', '2022-12-24', 'BAR-1222002', 'SNOWMAN V2', 'PT Globall', '10', 'BOX'),
(26, 'TRM-1222003', '2022-12-24', 'BAR-1222001', 'SNOWMAN V1', 'PT Sakti Jaya', '50', 'BOX'),
(27, 'TRM-1222004', '2022-12-24', 'BAR-1222003', 'FASTER HIGH GRADE C-600', 'PT Surya Makmur', '5', 'BOX'),
(28, 'TRM-1222005', '2022-12-24', 'BAR-1222004', 'SNOWMAN MARKER KECIL', 'PT Raya Rupa', '32', 'Pcs'),
(29, 'TRM-1222006', '2022-12-24', 'BAR-1222013', 'DRAWING BOOK A3', 'PT Sakti Jaya', '14', 'Packs'),
(30, 'TRM-1222007', '2022-12-24', 'BAR-1222011', 'SIDU ISI 58 LEMBAR', 'PT Globall', '10', 'Packs'),
(31, 'TRM-1222008', '2022-12-24', 'BAR-1222009', 'MAP DIAMOND', 'PT Globall', '5', 'Packs'),
(32, 'TRM-1222009', '2022-12-24', 'BAR-1222013', 'DRAWING BOOK A3', 'PT Surya Makmur', '24', 'Packs'),
(33, 'TRM-1222010', '2022-12-24', 'BAR-1222007', 'MAP L', 'PT Angkasa', '10', 'Packs'),
(34, 'TRM-1222011', '2022-12-24', 'BAR-1222014', 'DRAWING BOOK A4 ', 'PT Sakti Jaya', '2', 'Packs'),
(35, 'TRM-1222012', '2022-12-24', 'BAR-1222018', 'PENGGARIS NIKIKO PLASTIK', 'PT Globall', '51', 'Lusin'),
(36, 'TRM-1222013', '2022-12-24', 'BAR-1222011', 'SIDU ISI 58 LEMBAR', '', '11', 'Packs'),
(37, 'TRM-1222014', '2022-12-24', 'BAR-1222006', 'STEADLER RASOPLAST', 'PT Angkasa', '50', 'BOX'),
(38, 'TRM-1222015', '2022-12-24', 'BAR-1222016', 'KENKO GLUE STICK 8 GRAM', 'PT Surya Makmur', '19', 'Lusin'),
(39, 'TRM-1222016', '2022-12-24', 'BAR-1222015', 'LAKBAN NACHI', 'PT Angkasa', '32', 'Lusin'),
(40, 'TRM-1222017', '2022-12-24', 'BAR-1222001', 'SNOWMAN V1', 'PT Surya Makmur', '100', 'BOX'),
(41, 'TRM-1222018', '2022-12-24', 'BAR-1222002', 'SNOWMAN V2', 'PT Sakti Jaya', '100', 'BOX'),
(42, 'TRM-1222019', '2022-12-24', 'BAR-1222003', 'FASTER HIGH GRADE C-600', 'PT Angkasa', '200', 'BOX');

--
-- Triggers `barang_masuk`
--
DELIMITER $$
CREATE TRIGGER `barang_masuk` AFTER INSERT ON `barang_masuk` FOR EACH ROW BEGIN
	UPDATE tblbarang SET jumlah = jumlah+new.jumlah
    WHERE kodeBarang=new.kode_barang;
    END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `inv`
--

CREATE TABLE `inv` (
  `invid` int(11) NOT NULL,
  `invoice` varchar(100) NOT NULL,
  `tgl_inv` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `pembayaran` int(11) NOT NULL,
  `kembalian` int(11) NOT NULL,
  `status` varchar(10) NOT NULL,
  `subtotal` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `inv`
--

INSERT INTO `inv` (`invid`, `invoice`, `tgl_inv`, `pembayaran`, `kembalian`, `status`, `subtotal`) VALUES
(251, 'AD25122203904', '2022-12-24 23:39:47', 0, 0, 'proses', 0),
(259, 'AD25122210511', '2022-12-25 00:06:07', 100000, 5000, 'selesai', 0),
(260, 'AD25122210611', '2022-12-25 00:06:55', 100000, 14000, 'selesai', 0),
(261, 'AD25122211711', '2022-12-25 00:17:21', 100000, 50000, 'selesai', 0),
(264, 'AD25122211912', '2022-12-25 00:19:25', 1000000, 790000, 'selesai', 0),
(265, 'AD25122213812', '2022-12-25 00:38:48', 10000, 5000, 'selesai', 0);

-- --------------------------------------------------------

--
-- Table structure for table `jenisbarang`
--

CREATE TABLE `jenisbarang` (
  `id` int(10) NOT NULL,
  `jenisBarang` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jenisbarang`
--

INSERT INTO `jenisbarang` (`id`, `jenisBarang`) VALUES
(6, 'Pulpen'),
(7, 'Pensil'),
(8, 'Penghapus'),
(9, 'Spidol'),
(10, 'Map'),
(11, 'Buku Gambar'),
(12, 'Lakban'),
(13, 'Buku Tulis'),
(14, 'Kertas'),
(15, 'Penggaris'),
(16, 'Lem Kertas');

-- --------------------------------------------------------

--
-- Table structure for table `laporan`
--

CREATE TABLE `laporan` (
  `idlaporan` int(11) NOT NULL,
  `invoice` varchar(100) NOT NULL,
  `kode_produk` varchar(100) NOT NULL,
  `nama_produk` varchar(100) NOT NULL,
  `harga` int(11) NOT NULL,
  `harga_modal` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `subtotal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `laporan`
--

INSERT INTO `laporan` (`idlaporan`, `invoice`, `kode_produk`, `nama_produk`, `harga`, `harga_modal`, `qty`, `subtotal`) VALUES
(244, 'AD25122210511', 'BAR-1222002', 'SNOWMAN V2', 5000, 4000, 6, 30000),
(245, 'AD25122210511', 'BAR-1222001', 'SNOWMAN V1', 5000, 4000, 13, 65000),
(247, 'AD25122210611', 'BAR-1222001', 'SNOWMAN V1', 5000, 4000, 2, 10000),
(248, 'AD25122210611', 'BAR-1222003', 'FASTER HIGH GRADE C-600', 6000, 5000, 8, 48000),
(249, 'AD25122210611', 'BAR-1222004', 'SNOWMAN MARKER KECIL', 4000, 3000, 7, 28000),
(250, 'AD25122211711', 'BAR-1222001', 'SNOWMAN V1', 5000, 4000, 6, 30000),
(251, 'AD25122211711', 'BAR-1222002', 'SNOWMAN V2', 5000, 4000, 4, 20000),
(259, 'AD25122211912', 'BAR-1222003', 'FASTER HIGH GRADE C-600', 6000, 5000, 30, 180000),
(260, 'AD25122211912', 'BAR-1222002', 'SNOWMAN V2', 5000, 4000, 6, 30000),
(262, 'AD25122213812', 'BAR-1222001', 'SNOWMAN V1', 5000, 4000, 1, 5000);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `userid` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `telepon` varchar(15) NOT NULL,
  `level` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`userid`, `username`, `password`, `alamat`, `telepon`, `level`) VALUES
(2, 'rusman', 'admin', 'Maros', '4235', 'admin'),
(7, 'rusman priadi', 'kasir', 'Maros', '082194502220', 'kasir');

-- --------------------------------------------------------

--
-- Table structure for table `satuanbarang`
--

CREATE TABLE `satuanbarang` (
  `id` int(11) NOT NULL,
  `satuanBarang` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `satuanbarang`
--

INSERT INTO `satuanbarang` (`id`, `satuanBarang`) VALUES
(13, 'BOX'),
(14, 'Pcs'),
(15, 'Lusin'),
(16, 'Packs'),
(17, 'Roll');

-- --------------------------------------------------------

--
-- Table structure for table `tblbarang`
--

CREATE TABLE `tblbarang` (
  `id` int(11) NOT NULL,
  `kodeBarang` varchar(100) NOT NULL,
  `namaBarang` varchar(30) NOT NULL,
  `jenisBarang` varchar(13) NOT NULL,
  `satuan` varchar(10) NOT NULL,
  `hargaModal` varchar(100) NOT NULL,
  `hargaJual` varchar(100) NOT NULL,
  `jumlah` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblbarang`
--

INSERT INTO `tblbarang` (`id`, `kodeBarang`, `namaBarang`, `jenisBarang`, `satuan`, `hargaModal`, `hargaJual`, `jumlah`) VALUES
(17, 'BAR-1222001', 'SNOWMAN V1', 'Pulpen', 'BOX', '4000', '5000', '1'),
(18, 'BAR-1222002', 'SNOWMAN V2', 'Pulpen', 'BOX', '4000', '5000', '6'),
(19, 'BAR-1222003', 'FASTER HIGH GRADE C-600', 'Penghapus', 'BOX', '5000', '6000', '142'),
(20, 'BAR-1222004', 'SNOWMAN MARKER KECIL', 'Spidol', 'Pcs', '3000', '4000', '10'),
(21, 'BAR-1222005', 'SNOWMAN WHITE BOARD', 'Spidol', 'BOX', '12000', '13000', '0'),
(22, 'BAR-1222006', 'STEADLER RASOPLAST', 'Penghapus', 'BOX', '4000', '5000', '12'),
(23, 'BAR-1222007', 'MAP L', 'Map', 'Packs', '3000', '4000', '2'),
(24, 'BAR-1222008', 'MAP BUSINESS FILE ', 'Map', 'Packs', '5000', '6000', '0'),
(25, 'BAR-1222009', 'MAP DIAMOND', 'Map', 'Packs', '7000', '8000', '1'),
(26, 'BAR-1222010', 'MAP PLASTIK TAS', 'Map', 'Pcs', '27000', '28000', '0'),
(27, 'BAR-1222011', 'SIDU ISI 58 LEMBAR', 'Buku Tulis', 'Packs', '9000', '10000', '3'),
(28, 'BAR-1222012', 'PAPERLINE QUARTO ISI 100 LEMBA', 'Buku Tulis', 'Packs', '18000', '20000', '0'),
(29, 'BAR-1222013', 'DRAWING BOOK A3', 'Buku Gambar', 'Packs', '12000', '15000', '16'),
(30, 'BAR-1222014', 'DRAWING BOOK A4 ', 'Buku Gambar', 'Packs', '5000', '6000', '1'),
(31, 'BAR-1222015', 'LAKBAN NACHI', 'Lakban', 'Lusin', '3000', '5000', '28'),
(32, 'BAR-1222016', 'KENKO GLUE STICK 8 GRAM', 'Lem Kertas', 'Lusin', '5000', '7000', '19'),
(33, 'BAR-1222017', 'PENGGARIS BESI 30 CM', 'Penggaris', 'Lusin', '5000', '6000', '0'),
(34, 'BAR-1222018', 'PENGGARIS NIKIKO PLASTIK', 'Penggaris', 'Lusin', '3000', '5000', '51');

-- --------------------------------------------------------

--
-- Table structure for table `tblsupplier`
--

CREATE TABLE `tblsupplier` (
  `id` int(11) NOT NULL,
  `kodeSupplier` varchar(100) NOT NULL,
  `namaSupplier` varchar(30) NOT NULL,
  `alamat` varchar(30) NOT NULL,
  `telp` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblsupplier`
--

INSERT INTO `tblsupplier` (`id`, `kodeSupplier`, `namaSupplier`, `alamat`, `telp`) VALUES
(6, 'SUP-1222001', 'PT Surya Makmur', 'Makassar', '085634874452'),
(8, 'SUP-1222003', 'PT Globall', 'Jakarta', '082294402820'),
(9, 'SUP-1222004', 'PT Sakti Jaya', 'Bandung', '082194502220'),
(10, 'SUP-1222005', 'PT Raya Rupa', 'Maros', '081997505120'),
(11, 'SUP-1222006', 'PT Angkasa', 'Medan', '085197500220');

-- --------------------------------------------------------

--
-- Table structure for table `tb_penjualan`
--

CREATE TABLE `tb_penjualan` (
  `id` int(11) NOT NULL,
  `id_barang` int(100) NOT NULL,
  `jumlah` int(100) NOT NULL,
  `tgl_penjualan` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_penjualan`
--

INSERT INTO `tb_penjualan` (`id`, `id_barang`, `jumlah`, `tgl_penjualan`) VALUES
(74, 12, 95000, '2022-12-25'),
(75, 10, 86000, '2022-11-25'),
(76, 9, 50000, '2022-09-25'),
(77, 4, 72000, '2022-10-25'),
(78, 8, 68000, '2022-08-25'),
(79, 7, 210000, '2022-07-25'),
(80, 12, 5000, '2022-12-25');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id` int(100) NOT NULL,
  `invoice` varchar(100) NOT NULL,
  `kodeBarang` varchar(100) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL,
  `namaBarang` varchar(100) NOT NULL,
  `harga` int(15) NOT NULL,
  `hargaModal` int(15) NOT NULL,
  `qty` int(15) NOT NULL,
  `subtotal` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `toko` varchar(100) NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `telepon` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `toko`, `alamat`, `telepon`) VALUES
(27, 'CV HASCO', 'Jl. Perintis Kemerdekaan No.Km.9, RW.No.29, Tamalanrea Indah, Kota Makassar, Sulawesi Selatan ', '082194502270');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang_keluar`
--
ALTER TABLE `barang_keluar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `barang_masuk`
--
ALTER TABLE `barang_masuk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inv`
--
ALTER TABLE `inv`
  ADD PRIMARY KEY (`invid`);

--
-- Indexes for table `jenisbarang`
--
ALTER TABLE `jenisbarang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `laporan`
--
ALTER TABLE `laporan`
  ADD PRIMARY KEY (`idlaporan`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`userid`);

--
-- Indexes for table `satuanbarang`
--
ALTER TABLE `satuanbarang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblbarang`
--
ALTER TABLE `tblbarang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblsupplier`
--
ALTER TABLE `tblsupplier`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_penjualan`
--
ALTER TABLE `tb_penjualan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang_keluar`
--
ALTER TABLE `barang_keluar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `barang_masuk`
--
ALTER TABLE `barang_masuk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `inv`
--
ALTER TABLE `inv`
  MODIFY `invid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=266;

--
-- AUTO_INCREMENT for table `jenisbarang`
--
ALTER TABLE `jenisbarang`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `laporan`
--
ALTER TABLE `laporan`
  MODIFY `idlaporan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=263;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `satuanbarang`
--
ALTER TABLE `satuanbarang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tblbarang`
--
ALTER TABLE `tblbarang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `tblsupplier`
--
ALTER TABLE `tblsupplier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tb_penjualan`
--
ALTER TABLE `tb_penjualan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=400;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
