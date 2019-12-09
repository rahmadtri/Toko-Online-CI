-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 09, 2019 at 06:54 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `toko_online`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_barang`
--

CREATE TABLE `tb_barang` (
  `id_brg` int(11) NOT NULL,
  `nama_brg` varchar(130) NOT NULL,
  `keterangan` varchar(225) NOT NULL,
  `kategori` varchar(60) NOT NULL,
  `harga` int(11) NOT NULL,
  `stok` int(4) NOT NULL,
  `gambar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_barang`
--

INSERT INTO `tb_barang` (`id_brg`, `nama_brg`, `keterangan`, `kategori`, `harga`, `stok`, `gambar`) VALUES
(1, 'Sepatu', 'cockok bgt', 'pakaian pria', 300000, 5, 'Sepatu.jpg'),
(2, 'Sepatu 2', 'Sepatu Vans', 'Pakaian Pria', 450000, 17, 'sepatu2.jpg'),
(3, 'Handphone', 'Handphone LG', 'Elektronik', 5000000, 10, 'hp.jpg'),
(5, 'Lipstik hijau', 'hijau', 'kecantikan', 300000, 10, '42492138_454e3b31-9d01-4165-a900-ee668538f21d_1280_1280.jpeg'),
(6, 'bedak', 'bedak', 'kecantikan', 500000, 50, '6.jpg'),
(7, 'Iphone X', 'Handphone', 'Elektronik', 10000000, 5, 'iphone.png'),
(8, 'Autan Anti Nyamuk', 'Cocok untuk perlindungan dari nyamuk', 'kecantikan', 24000, 20, 'anti-nyamuk.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_invoice`
--

CREATE TABLE `tb_invoice` (
  `id` int(11) NOT NULL,
  `nama` varchar(90) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `no_hp` varchar(11) NOT NULL,
  `tgl_pesan` datetime NOT NULL,
  `batas_bayar` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_invoice`
--

INSERT INTO `tb_invoice` (`id`, `nama`, `alamat`, `no_hp`, `tgl_pesan`, `batas_bayar`) VALUES
(1, 'tuminah', 'jl solo no 7', '2147483647', '2019-09-15 21:24:21', '2019-09-16 21:24:21'),
(2, 'Agustina', 'klaten trucuk', '08213803764', '2019-09-15 21:37:06', '2019-09-16 21:37:06'),
(3, 'rahmad', 'nganjuk jawa timur', '08213803764', '2019-09-16 07:07:33', '2019-09-17 07:07:33'),
(4, '', '', '', '2019-09-17 08:03:27', '2019-09-18 08:03:27'),
(5, '', '', '', '2019-09-17 08:04:06', '2019-09-18 08:04:06'),
(6, 'cac', 'sacas', '4323', '2019-09-22 09:46:47', '2019-09-23 09:46:47');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pesanan`
--

CREATE TABLE `tb_pesanan` (
  `id` int(11) NOT NULL,
  `id_invoice` int(11) NOT NULL,
  `id_brg` int(11) NOT NULL,
  `nama_brg` varchar(100) NOT NULL,
  `jumlah` int(3) NOT NULL,
  `harga` int(10) NOT NULL,
  `pilihan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pesanan`
--

INSERT INTO `tb_pesanan` (`id`, `id_invoice`, `id_brg`, `nama_brg`, `jumlah`, `harga`, `pilihan`) VALUES
(1, 1, 2, 'Sepatu 2', 1, 450000, ''),
(2, 1, 1, 'Sepatu', 1, 300000, ''),
(3, 1, 5, 'Lipstik hijau', 1, 300000, ''),
(4, 2, 3, 'Handphone', 1, 5000000, ''),
(5, 2, 7, 'Iphone X', 1, 10000000, ''),
(6, 3, 2, 'Sepatu 2', 4, 450000, ''),
(7, 4, 2, 'Sepatu 2', 1, 450000, ''),
(8, 5, 1, 'Sepatu', 4, 300000, ''),
(9, 6, 1, 'Sepatu', 1, 300000, ''),
(10, 6, 2, 'Sepatu 2', 2, 450000, '');

--
-- Triggers `tb_pesanan`
--
DELIMITER $$
CREATE TRIGGER `pesanan_penjualan` AFTER INSERT ON `tb_pesanan` FOR EACH ROW BEGIN
	UPDATE tb_barang SET stok = stok-NEW.jumlah
    WHERE id_brg = NEW.id_brg;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id` int(11) NOT NULL,
  `nama` varchar(90) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role_id` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id`, `nama`, `username`, `password`, `role_id`) VALUES
(1, 'admin', 'admin', '123', 1),
(2, 'Joni', 'user', '123', 2),
(3, 'dalijo', 'jojo', '1234', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_barang`
--
ALTER TABLE `tb_barang`
  ADD PRIMARY KEY (`id_brg`);

--
-- Indexes for table `tb_invoice`
--
ALTER TABLE `tb_invoice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_pesanan`
--
ALTER TABLE `tb_pesanan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_barang`
--
ALTER TABLE `tb_barang`
  MODIFY `id_brg` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tb_invoice`
--
ALTER TABLE `tb_invoice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_pesanan`
--
ALTER TABLE `tb_pesanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
