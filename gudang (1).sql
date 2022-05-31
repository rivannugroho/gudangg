-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 25, 2022 at 03:06 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gudang`
--

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE `stock` (
  `idbarang` int(11) UNSIGNED NOT NULL,
  `namabrg` varchar(50) NOT NULL,
  `merek` varchar(50) NOT NULL,
  `harga` int(50) NOT NULL,
  `gmbr_barang` varchar(45) NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stock`
--

INSERT INTO `stock` (`idbarang`, `namabrg`, `merek`, `harga`, `gmbr_barang`, `deskripsi`) VALUES
(6, 'Sun Swallow', 'Swallow', 12000, 'gambar/28976928_B.jpg', 'Tersedia > 1000 stok barang SANDAL JEPIT SWALLOW ANAK - SANDAL ANAK UKURAN KECIL ORIGINAL SWALLOW  Deskripsi SANDAL JEPIT SWALLOW ANAK - SANDAL ANAK UKURAN KECIL ORIGINAL SWALLOW  SANDAL JEPIT SWALLOW ANAK - SANDAL ANAK UKURAN KECIL ORIGINAL SWALLOW  Warna ukuran sandal.. tiap ukuran ada warna masing2 : Ukuran 7 - orenge Ukuran 7.5 - kuning , merah Ukuran 8 - biru Ukuran 8.5 - hijau  TIDAK MELAYANI DISKUSI / TANYA-JAWAB WARNA.  Warna RANDOM. Dikirim sesuai stok ya'),
(7, 'converse chuck taylor 70', 'converse', 999000, 'gambar/images.jpg', 'Chuck Taylor adalah sosok dibalik sneakers basket terlaris sepanjang sejarah. Karena masukan dan ide-idenya, Converse All Stars mengalami perubahan signifkan seperti lebih fleksibel dan dilengkapi dengan tambalan untuk melindungi pergelangan kaki. Lahirlah sneakers Converse khusus untuk bermain basket!'),
(8, 'Reebok Quietly Retro', 'Reebok', 450000, 'gambar/sepati.jpg', 'Dengan tampilan cerah berupa multi-panel berwarna natural krem kapur, sepatu ini mengikuti gaya retro dengan tambahan aksen ungu dan merah muda neon. Lebih detil lagi, sneaker ini dibuat dengan konstruksi multi-panel yang bold.'),
(9, 'Nike Estilo Converse', 'Nike', 800000, 'gambar/sepatu3.jpg', 'BNIB (Brand New In Box) . Ukuran   36 / 37 / 38 / 39/ 40 / 41 / 42 / 43 / 44 .  KUALITAS PK 1: 1 Quality Made In Indonesia foto 100% Asli sudah realpict ada stiker toko GudangSnkrs disetiap foto produk '),
(10, 'PUMA Suede Classic', 'PUMA', 800000, 'gambar/PUMA Suede Classic.jpg', 'Suede muncul di panggung pada tahun 1968 dan telah mengubah permainan sejak saat itu. Itu telah dipakai oleh ikon dari setiap generasi dan tetap klasik melalui semuanya. Tahun ini, kami meluncurkan kembali Suede dengan jalur warna segar dan pembaruan desain yang halus. Klasik seperti biasa, sepanjang masa.'),
(11, 'Adidas Daily 3.0', 'Adidas', 840000, 'gambar/Adidas2.jpg', 'Sebuah sentuhan baru pada klasik, sepatu adidas ini memadukan nuansa warisan dengan bahan dan desain modern. Perjalanan Anda melintasi kampus tidak pernah terlihat atau terasa semenyenangkan ini.'),
(15, 'wadasdsa', 'dsasdas1', 2312321, 'gambar/ventela.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Arcu, ullamcorper sollicitudin nec purus ullamcorper faucibus amet. Elementum odio semper sed faucibus mattis porttitor vulputate egestas posuere.');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userId` varchar(45) NOT NULL,
  `userNama` varchar(80) NOT NULL,
  `userPassword` text NOT NULL,
  `userGroup` varchar(45) NOT NULL,
  `userFoto` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userId`, `userNama`, `userPassword`, `userGroup`, `userFoto`) VALUES
('admin', 'admin', '123', 'admin', NULL),
('anya', 'anya', '1234', 'customer', NULL),
('ferndly', 'ferndly', '1234', 'customer', NULL),
('rayid', 'rayid', '1234', 'customer', NULL),
('rivann', 'rivann', '1234', 'member', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`idbarang`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `stock`
--
ALTER TABLE `stock`
  MODIFY `idbarang` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
