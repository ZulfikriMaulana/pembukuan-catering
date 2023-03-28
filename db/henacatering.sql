-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 27, 2023 at 10:57 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `henacatering`
--

-- --------------------------------------------------------

--
-- Table structure for table `item_pesanan`
--

CREATE TABLE `item_pesanan` (
  `id_item_pesanan` int(11) NOT NULL,
  `nama_item` text NOT NULL,
  `harga_jual` int(11) NOT NULL,
  `harga_modal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `item_pesanan`
--

INSERT INTO `item_pesanan` (`id_item_pesanan`, `nama_item`, `harga_jual`, `harga_modal`) VALUES
(1, 'Snack Box', 15000, 8000),
(2, 'Nasi Box', 30000, 20000),
(3, 'Prasmanan', 40000, 25000);

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(255) NOT NULL,
  `jenis` enum('Pengeluaran','Pemasukan') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`, `jenis`) VALUES
(1, 'pembayaran pesanan', 'Pemasukan'),
(2, 'pinjaman', 'Pemasukan'),
(3, 'belanja modal', 'Pengeluaran'),
(4, 'gaji pegawai', 'Pengeluaran'),
(5, 'biaya listrik', 'Pengeluaran'),
(6, 'biaya transportasi', 'Pengeluaran'),
(7, 'bayar pajak', 'Pengeluaran'),
(8, 'bayar cicilan', 'Pengeluaran'),
(12, 'Paylater', 'Pengeluaran');

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int(11) NOT NULL,
  `nama_instansi` text NOT NULL,
  `alamat` text NOT NULL,
  `nama_cp` text NOT NULL,
  `no_hp` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `nama_instansi`, `alamat`, `nama_cp`, `no_hp`) VALUES
(1, 'Dinas Kesehatan Kota Depok', 'Jalan Margonda Depok', 'Ratna', '991992993'),
(2, 'Dinas Pendidikan Kota Depok', 'Jl. Raya Margonda Kantor Walikota', 'Agus ', '82234645'),
(3, 'Dinas Komunikasi dan Informasi Kota Depok', 'Jl. Raya Margonda Kantor Walikota', 'Darmawan', '82232456'),
(6, 'ESQ', 'esq', 'TB', '881882883'),
(7, 'Cianju Corp', 'Cianjur Indah', 'Cebeh', '085156304583');

-- --------------------------------------------------------

--
-- Table structure for table `pesanan`
--

CREATE TABLE `pesanan` (
  `id_pesanan` int(11) NOT NULL,
  `tanggal_pesanan` date NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `alamat_pelanggan` text NOT NULL,
  `nama_pelanggan` text NOT NULL,
  `no_hp` varchar(16) NOT NULL,
  `id_item_pesanan` int(11) NOT NULL,
  `jumlah_pesanan` int(11) NOT NULL,
  `catatan` text DEFAULT NULL,
  `subtotal_pesanan` int(11) NOT NULL,
  `pajak_pesanan` int(11) NOT NULL,
  `total_pesanan` int(11) NOT NULL,
  `status` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pesanan`
--

INSERT INTO `pesanan` (`id_pesanan`, `tanggal_pesanan`, `id_pelanggan`, `alamat_pelanggan`, `nama_pelanggan`, `no_hp`, `id_item_pesanan`, `jumlah_pesanan`, `catatan`, `subtotal_pesanan`, `pajak_pesanan`, `total_pesanan`, `status`) VALUES
(2, '2002-12-03', 3, 'jakarta menara 165', 'Lala', '8191919', 1, 100, 'ok', 1500000, 150000, 1650000, ''),
(3, '2023-02-20', 1, 'Margonda', 'Zul', '2147483647', 1, 21, 'ok', 315000, 31500, 346500, ''),
(4, '2023-02-23', 1, 'Depok', 'Zul', '1231243', 1, 20, 'ok', 300000, 30000, 330000, 'Lunas'),
(5, '2023-03-16', 6, 'Kampus ESQ', 'TB', '881882883', 2, 6, 'Kosong', 150000, 15000, 165000, 'Lunas'),
(6, '2023-03-25', 7, 'Pesona Cianjur Indah', 'Cebeh', '085156304583', 3, 10, 'null', 400000, 40000, 440000, 'Belum Lunas');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id_role` int(11) NOT NULL,
  `nama_role` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id_role`, `nama_role`) VALUES
(1, 'admin'),
(2, 'owner');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `id_pesanan` int(11) DEFAULT NULL,
  `id_kategori` int(11) NOT NULL,
  `tanggal_transaksi` date NOT NULL,
  `jenis_transaksi` enum('Pengeluaran','Pemasukan') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `keterangan_transaksi` text CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `foto_transaksi` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `nominal_transaksi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_pesanan`, `id_kategori`, `tanggal_transaksi`, `jenis_transaksi`, `keterangan_transaksi`, `foto_transaksi`, `nominal_transaksi`) VALUES
(1, 0, 1, '2023-03-01', 'Pemasukan', '', '', 1000000),
(2, 0, 1, '2023-03-01', 'Pemasukan', 'gaada', 'Screenshot_20230228_110727.png', 100000),
(3, 0, 1, '2023-03-08', 'Pemasukan', '', 'Screenshot (78).png', 200000),
(4, 0, 1, '2023-03-09', 'Pemasukan', 'test pemasukan 090323', 'Screenshot (98).png', 89000),
(5, 0, 1, '2023-03-09', 'Pengeluaran', 'test pengeluaran 090323', 'Screenshot (104).png', 21000),
(6, 5, 1, '2023-03-16', 'Pemasukan', 'lunas yak', '240_F_195155587_4qRykqpRiTp0drhsOhUwB7Rf0m3LNRAH.jpg', 165000),
(7, 4, 1, '2023-03-16', 'Pemasukan', 'lunas yak', 'hkw-phpmyadmin-sqr.jpg', 330000),
(8, 0, 2, '2023-03-15', 'Pemasukan', 'tes', 'hkw-phpmyadmin-sqr.jpg', 100000),
(9, 0, 3, '2023-02-16', 'Pemasukan', 'tes card tahun', '', 100000),
(10, 0, 1, '2023-03-24', 'Pemasukan', '', '', 24032023);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userid` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `id_role` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userid`, `nama`, `email`, `password`, `id_role`) VALUES
(1, 'Administrator', 'admin', 'admin', 1),
(2, 'Pemilik Hena Catering', 'owner', 'owner', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `item_pesanan`
--
ALTER TABLE `item_pesanan`
  ADD PRIMARY KEY (`id_item_pesanan`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indexes for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`id_pesanan`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id_role`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `item_pesanan`
--
ALTER TABLE `item_pesanan`
  MODIFY `id_item_pesanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `id_pesanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
