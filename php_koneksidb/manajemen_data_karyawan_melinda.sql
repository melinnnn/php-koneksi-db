-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 27, 2024 at 12:19 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `manajemen_data_karyawan_melinda`
--

-- --------------------------------------------------------

--
-- Table structure for table `divisi_melinda`
--

CREATE TABLE `divisi_melinda` (
  `divisi_id_melinda` varchar(10) NOT NULL,
  `namadivisi_melinda` varchar(255) DEFAULT NULL,
  `lokasi_melinda` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `divisi_melinda`
--

INSERT INTO `divisi_melinda` (`divisi_id_melinda`, `namadivisi_melinda`, `lokasi_melinda`) VALUES
('d001', 'Logistics', 'cimahi'),
('d002', 'Sales', 'Jakarta'),
('d003', 'Sales', 'bandung'),
('d004', 'Finance', 'jakarta'),
('d005', 'HR', 'Jakarta'),
('d006', 'Logistics', 'Bandung'),
('d007', 'IT', 'Jakarta'),
('d008', 'Sales', 'Bandung'),
('d009', 'Finance', 'Jakarta'),
('d010', 'HR', 'Jakarta'),
('d011', 'Sales', 'Cimahi'),
('d013', 'Sales', 'Cimahi'),
('d016', 'HR', 'Bandung'),
('d023', 'HR', 'Bali');

-- --------------------------------------------------------

--
-- Table structure for table `karyawan_melinda`
--

CREATE TABLE `karyawan_melinda` (
  `nik_melinda` varchar(10) NOT NULL,
  `nama_melinda` varchar(255) DEFAULT NULL,
  `email_melinda` varchar(100) DEFAULT NULL,
  `tanggal_masuk_melinda` date DEFAULT NULL,
  `gaji_melinda` int(11) DEFAULT NULL,
  `divisi_id_melinda` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `karyawan_melinda`
--

INSERT INTO `karyawan_melinda` (`nik_melinda`, `nama_melinda`, `email_melinda`, `tanggal_masuk_melinda`, `gaji_melinda`, `divisi_id_melinda`) VALUES
('0123045621', 'melinda puspita a', 'melin@gmail.com', '2024-11-27', 1200000000, 'd002'),
('1025', 'Tiara', 'tiara@gmail.com', '2024-11-21', 450000000, 'd002'),
('1026', 'Kayla', 'kayla@gmail.com', '2024-01-02', 450000000, 'd004'),
('1027', 'Agisti', 'agisti@gmail.com', '2024-02-05', 350000000, 'd005'),
('1028', 'Rini', 'rini@gmail.com', '2024-04-02', 250000000, 'd006'),
('1029', 'Derell', 'derell@gmail.com', '2024-02-10', 350000000, 'd007'),
('1030', 'Jiyad', 'jiyad@gmail.com', '2024-11-02', 550000000, 'd008'),
('1031', 'fauz', 'fauz@gmail.com', '2024-02-01', 650000000, 'd009'),
('1041', 'ezet', 'santet@gmail.com', '2024-11-12', 50000000, 'd004'),
('123', 'azkia', 'azki@jg', '2024-11-23', 545, 'd002'),
('123456721', 'melinda puspita anggraeni', 'azki@jg', '2024-11-06', 200000000, 'd003'),
('1300', 'santet', 'santet@gmail.com', '2024-11-05', 10000000, 'd005');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `divisi_melinda`
--
ALTER TABLE `divisi_melinda`
  ADD PRIMARY KEY (`divisi_id_melinda`);

--
-- Indexes for table `karyawan_melinda`
--
ALTER TABLE `karyawan_melinda`
  ADD PRIMARY KEY (`nik_melinda`),
  ADD KEY `divisi_id_melinda` (`divisi_id_melinda`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `karyawan_melinda`
--
ALTER TABLE `karyawan_melinda`
  ADD CONSTRAINT `karyawan_melinda_ibfk_1` FOREIGN KEY (`divisi_id_melinda`) REFERENCES `divisi_melinda` (`divisi_id_melinda`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
