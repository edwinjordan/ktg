-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 16, 2021 at 12:36 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ktg_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `td_detail_point`
--

CREATE TABLE `td_detail_point` (
  `fn_idpoint` int(11) NOT NULL,
  `fn_id_customer` int(11) NOT NULL,
  `fn_jml_point` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `td_investigasi_garansi`
--

CREATE TABLE `td_investigasi_garansi` (
  `fn_idinves` int(11) NOT NULL,
  `fc_kdgaransi` varchar(225) DEFAULT NULL,
  `fn_iddepartment` int(11) DEFAULT NULL,
  `f_analisa_masalah` text DEFAULT NULL,
  `fn_qty` int(11) DEFAULT NULL,
  `fd_due_date` date DEFAULT NULL,
  `fv_rencana_penggantian` varchar(255) DEFAULT NULL,
  `fv_catatan` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `td_investigasi_garansi`
--

INSERT INTO `td_investigasi_garansi` (`fn_idinves`, `fc_kdgaransi`, `fn_iddepartment`, `f_analisa_masalah`, `fn_qty`, `fd_due_date`, `fv_rencana_penggantian`, `fv_catatan`) VALUES
(5, '602ac4c7a6294', 3, 'Jatuh saat pengiriman', 1, '2021-02-22', 'Penuh', 'Akana diganti dengan yang baru');

-- --------------------------------------------------------

--
-- Table structure for table `td_keluhan_investigasi`
--

CREATE TABLE `td_keluhan_investigasi` (
  `fn_id` int(11) NOT NULL,
  `fc_kdkeluhan` char(30) DEFAULT NULL,
  `fn_iddepartment` int(11) DEFAULT NULL,
  `fv_analisa_akar_masalah` text DEFAULT NULL,
  `fv_rencana_perbaikan` varchar(225) DEFAULT NULL,
  `fd_due_date` date DEFAULT NULL,
  `fv_feedback` text DEFAULT NULL,
  `fv_keterangan` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `td_keluhan_investigasi`
--

INSERT INTO `td_keluhan_investigasi` (`fn_id`, `fc_kdkeluhan`, `fn_iddepartment`, `fv_analisa_akar_masalah`, `fv_rencana_perbaikan`, `fd_due_date`, `fv_feedback`, `fv_keterangan`) VALUES
(3, '602aab0fcc012', 3, 'Jatuh saat pengiriman', 'Tidak Ada', '2021-02-22', 'Mohon untuk di feedback', 'Perbaikan Selesai');

-- --------------------------------------------------------

--
-- Table structure for table `td_klaim_garansi`
--

CREATE TABLE `td_klaim_garansi` (
  `fn_idklaim` int(11) NOT NULL,
  `fc_kdgaransi` varchar(225) DEFAULT NULL,
  `f_foto_kerusakan` text DEFAULT NULL,
  `fd_tgl_kerusakan` date DEFAULT NULL,
  `fv_luasan_kerusakan` varchar(225) DEFAULT NULL,
  `fv_indikasi_kerusakan` text DEFAULT NULL,
  `fv_nmpelapor` varchar(225) DEFAULT NULL,
  `fv_jabatan_pelapor` varchar(100) DEFAULT NULL,
  `fd_tgl_lapor` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `td_klaim_garansi`
--

INSERT INTO `td_klaim_garansi` (`fn_idklaim`, `fc_kdgaransi`, `f_foto_kerusakan`, `fd_tgl_kerusakan`, `fv_luasan_kerusakan`, `fv_indikasi_kerusakan`, `fv_nmpelapor`, `fv_jabatan_pelapor`, `fd_tgl_lapor`) VALUES
(1, '602ac4c7a6294', NULL, '2021-02-16', 'Parah', 'Jatuh', 'Kapten', 'Pelanggan', '2021-02-16');

-- --------------------------------------------------------

--
-- Table structure for table `td_po`
--

CREATE TABLE `td_po` (
  `fn_iddetail_po` int(11) NOT NULL,
  `fn_idpo` int(11) DEFAULT NULL,
  `fc_kdpo` int(11) NOT NULL,
  `fc_kdsj` int(11) NOT NULL,
  `fn_id_barang` int(11) NOT NULL,
  `fv_nmbarang` varchar(100) NOT NULL,
  `fn_qty` int(11) NOT NULL,
  `fn_qty_kg` int(11) NOT NULL,
  `f_dimensi` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `td_po`
--

INSERT INTO `td_po` (`fn_iddetail_po`, `fn_idpo`, `fc_kdpo`, `fc_kdsj`, `fn_id_barang`, `fv_nmbarang`, `fn_qty`, `fn_qty_kg`, `f_dimensi`) VALUES
(1, 2, 81332, 45112, 1026, 'Geomembrane AJT 500x400x20000 PE Black Smooth', 1, 6, NULL),
(2, 2, 81332, 45112, 1027, 'Geomembrane AJT 500x800x20000 PE Black Smooth', 2, 10, NULL),
(3, 3, 78293, 677213, 1026, 'Geomembrane AJT 500x400x20000 PE Black Smooth', 1, 6, NULL),
(4, 3, 78293, 677213, 1027, 'Geomembrane AJT 500x800x20000 PE Black Smooth', 2, 10, NULL),
(5, 4, 901233, 5312899, 1027, 'Geomembrane AJT 500x800x20000 PE Black Smooth', 3, 15, NULL),
(6, 6, 12412, 24155, 1027, 'Geomembrane AJT 500x400x20000 PE Black Smooth', 3, 18, NULL),
(7, 7, 78293, 7312837, 1027, 'Geomembrane AJT 500x400x20000 PE Black Smooth', 1, 6, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `td_po_ekspedisi`
--

CREATE TABLE `td_po_ekspedisi` (
  `fn_idpo_ekspedisi` int(11) NOT NULL,
  `fn_idpo` int(11) NOT NULL,
  `fn_idekspedisi` int(11) NOT NULL,
  `fm_harga_ekspedisi` double NOT NULL,
  `fd_tgl_penawaran` datetime NOT NULL,
  `fn_status_penawaran` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `td_po_ekspedisi`
--

INSERT INTO `td_po_ekspedisi` (`fn_idpo_ekspedisi`, `fn_idpo`, `fn_idekspedisi`, `fm_harga_ekspedisi`, `fd_tgl_penawaran`, `fn_status_penawaran`) VALUES
(1, 2, 1, 500000, '2021-02-11 09:08:32', 1),
(2, 3, 2, 600000, '2021-02-11 19:52:49', 1),
(3, 4, 2, 400000, '2021-02-11 19:53:52', 0),
(4, 3, 1, 550000, '2021-02-11 19:58:30', 0),
(5, 4, 1, 500000, '2021-02-11 19:58:39', 1),
(7, 6, 1, 800000, '2021-02-15 22:22:09', 1),
(8, 6, 2, 750000, '2021-02-15 22:29:07', 0);

-- --------------------------------------------------------

--
-- Table structure for table `td_privilage`
--

CREATE TABLE `td_privilage` (
  `id` int(11) NOT NULL,
  `fn_idstatus` int(11) NOT NULL,
  `fn_idlevel` int(11) NOT NULL,
  `r` int(11) NOT NULL,
  `c` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `td_privilage`
--

INSERT INTO `td_privilage` (`id`, `fn_idstatus`, `fn_idlevel`, `r`, `c`) VALUES
(1, 1, 1, 1, 1),
(13, 2, 3, 1, 1),
(14, 7, 3, 1, 1),
(15, 3, 3, 1, 1),
(16, 4, 2, 1, 1),
(17, 5, 1, 1, 1),
(18, 5, 2, 1, 1),
(19, 6, 2, 1, 1),
(20, 8, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tm_barang`
--

CREATE TABLE `tm_barang` (
  `fn_id_barang` int(11) NOT NULL,
  `fc_kdbarang` varchar(50) NOT NULL,
  `fv_nmbarang` varchar(100) NOT NULL,
  `fn_garansi` int(11) NOT NULL,
  `fv_garansi_detail` varchar(100) NOT NULL,
  `fn_garansi_masa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tm_barang`
--

INSERT INTO `tm_barang` (`fn_id_barang`, `fc_kdbarang`, `fv_nmbarang`, `fn_garansi`, `fv_garansi_detail`, `fn_garansi_masa`) VALUES
(1026, 'BJ.A31.AJT.0001', 'Geomembrane AJT 500x800x20000 PE Black Smooth\r\n', 1, 'Garansi pada produk saja\r\n', 5),
(1027, 'BJ.A31.AJT.0002', 'Geomembrane AJT 500x400x20000 PE Black Smooth\r\n', 0, '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tm_customer`
--

CREATE TABLE `tm_customer` (
  `fn_id_customer` int(11) NOT NULL,
  `fv_email` varchar(50) NOT NULL,
  `fv_nmcustomer` varchar(100) NOT NULL,
  `fv_pic_customer` varchar(50) NOT NULL,
  `fv_alamat_customer` text NOT NULL,
  `fv_kecamatan` varchar(50) NOT NULL,
  `fv_kota` varchar(50) NOT NULL,
  `fv_provinsi` varchar(50) NOT NULL,
  `fn_kode_pos` int(11) NOT NULL,
  `fv_npwp` varchar(50) NOT NULL,
  `fc_telp_kantor` decimal(15,0) NOT NULL,
  `fv_no_hp` decimal(15,0) NOT NULL,
  `fn_jumlah_point` int(11) NOT NULL,
  `fv_username` varchar(225) DEFAULT NULL,
  `fv_password` varchar(225) DEFAULT NULL,
  `fn_idlevel` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tm_customer`
--

INSERT INTO `tm_customer` (`fn_id_customer`, `fv_email`, `fv_nmcustomer`, `fv_pic_customer`, `fv_alamat_customer`, `fv_kecamatan`, `fv_kota`, `fv_provinsi`, `fn_kode_pos`, `fv_npwp`, `fc_telp_kantor`, `fv_no_hp`, `fn_jumlah_point`, `fv_username`, `fv_password`, `fn_idlevel`) VALUES
(1, 'kapten@gmail.com', 'Kapten Liverpol', '', 'Banyuwangi', 'Bawah', 'Banyuwangi', 'Jawa Timur', 631239, '839134222', '83412745521', '85461231344', 0, 'kapten123', 'kapten123', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tm_departement`
--

CREATE TABLE `tm_departement` (
  `fn_iddepartment` int(11) NOT NULL,
  `fv_nmdepartment` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tm_departement`
--

INSERT INTO `tm_departement` (`fn_iddepartment`, `fv_nmdepartment`) VALUES
(1, 'Admin'),
(2, 'Sales'),
(3, 'PPIC'),
(4, 'QA');

-- --------------------------------------------------------

--
-- Table structure for table `tm_ekspedisi`
--

CREATE TABLE `tm_ekspedisi` (
  `fn_idekspedisi` int(11) NOT NULL,
  `fv_email` varchar(50) NOT NULL,
  `fv_nama_ekspedisi` varchar(100) NOT NULL,
  `fv_pic_ekspedisi` varchar(50) NOT NULL,
  `fv_alamat_ekspedisi` text NOT NULL,
  `fv_kecamatan` varchar(50) NOT NULL,
  `fv_kota` varchar(50) NOT NULL,
  `fv_provinsi` varchar(50) NOT NULL,
  `fn_kode_pos` int(11) NOT NULL,
  `fv_npwp` varchar(50) NOT NULL,
  `fv_telp_kantor` decimal(15,0) NOT NULL,
  `fv_no_hp` decimal(15,0) NOT NULL,
  `fn_jumlah_point` int(11) NOT NULL,
  `fv_username` varchar(225) DEFAULT NULL,
  `fv_password` varchar(225) DEFAULT NULL,
  `fn_idlevel` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tm_ekspedisi`
--

INSERT INTO `tm_ekspedisi` (`fn_idekspedisi`, `fv_email`, `fv_nama_ekspedisi`, `fv_pic_ekspedisi`, `fv_alamat_ekspedisi`, `fv_kecamatan`, `fv_kota`, `fv_provinsi`, `fn_kode_pos`, `fv_npwp`, `fv_telp_kantor`, `fv_no_hp`, `fn_jumlah_point`, `fv_username`, `fv_password`, `fn_idlevel`) VALUES
(1, 'julian@gmail.com', 'JNE', '', 'Malang', 'Lowokwaru', 'Malang', 'Jawa Timur', 62451, '8928291', '89871231', '82391233', 0, 'jne123', 'jne123', 3),
(2, 'jnt@gmail.com', 'JNT', '', 'Jakarta', 'Pusat', 'Jakarta', 'DKI Jakarta', 63413, '8102381422', '897192836', '816364812', 0, 'jnt123', 'jnt123', 3);

-- --------------------------------------------------------

--
-- Table structure for table `tm_garansi`
--

CREATE TABLE `tm_garansi` (
  `fn_id` int(11) NOT NULL,
  `fc_kdgaransi` varchar(225) DEFAULT NULL,
  `fc_kdpo` char(50) DEFAULT NULL,
  `fc_kdsj` char(50) DEFAULT NULL,
  `fd_tglkirim_ktg` date DEFAULT NULL,
  `fn_id_customer` int(11) DEFAULT NULL,
  `fc_kdbarang` varchar(50) DEFAULT NULL,
  `fn_jml_barang` int(11) DEFAULT NULL,
  `fc_sjno_distributor` char(50) DEFAULT NULL,
  `f_foto_distributor` text DEFAULT NULL,
  `fv_nmowner_project` varchar(225) DEFAULT NULL,
  `fc_contact_owner` char(10) DEFAULT NULL,
  `fv_lokasi_project` varchar(225) DEFAULT NULL,
  `fv_jenis_project` varchar(225) DEFAULT NULL,
  `fv_luasan_project` varchar(100) DEFAULT NULL,
  `f_gambar` text DEFAULT NULL,
  `fc_sts` char(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tm_garansi`
--

INSERT INTO `tm_garansi` (`fn_id`, `fc_kdgaransi`, `fc_kdpo`, `fc_kdsj`, `fd_tglkirim_ktg`, `fn_id_customer`, `fc_kdbarang`, `fn_jml_barang`, `fc_sjno_distributor`, `f_foto_distributor`, `fv_nmowner_project`, `fc_contact_owner`, `fv_lokasi_project`, `fv_jenis_project`, `fv_luasan_project`, `f_gambar`, `fc_sts`) VALUES
(2, '602ac4c7a6294', '81332', '32511', '2021-02-10', 1, 'BJ.A31.AJT.0001', 0, '87122', NULL, 'Justin', '0897436123', 'Malang', 'Produk', 'Besar', NULL, '2');

-- --------------------------------------------------------

--
-- Table structure for table `tm_keluhan`
--

CREATE TABLE `tm_keluhan` (
  `fn_idkeluhan` int(11) NOT NULL,
  `fc_kdkeluhan` char(30) DEFAULT NULL,
  `fc_kdpo` char(50) DEFAULT NULL,
  `fc_kdsj` char(50) DEFAULT NULL,
  `fc_kdbarang` varchar(50) DEFAULT NULL,
  `fn_jml_rusak` int(11) DEFAULT NULL,
  `fv_jenis_keluhan` text DEFAULT NULL,
  `fd_tgl_keluhan` date DEFAULT NULL,
  `fv_foto_rusak` text DEFAULT NULL,
  `fv_foto_spk` text DEFAULT NULL,
  `fv_indikasi_penyebab` text DEFAULT NULL,
  `fn_id_customer` int(11) DEFAULT NULL,
  `fv_nmpelapor` varchar(225) DEFAULT NULL,
  `fv_jabatan_pelapor` varchar(225) DEFAULT NULL,
  `fc_approval` char(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tm_keluhan`
--

INSERT INTO `tm_keluhan` (`fn_idkeluhan`, `fc_kdkeluhan`, `fc_kdpo`, `fc_kdsj`, `fc_kdbarang`, `fn_jml_rusak`, `fv_jenis_keluhan`, `fd_tgl_keluhan`, `fv_foto_rusak`, `fv_foto_spk`, `fv_indikasi_penyebab`, `fn_id_customer`, `fv_nmpelapor`, `fv_jabatan_pelapor`, `fc_approval`) VALUES
(5, '602aab0fcc012', '901233', '5312899', '1027', 1, 'Rusak', '2021-02-16', '0', '0', 'Human Error', 1, 'Kapten', 'pembeli', '4'),
(6, '602b045a4b699', '12412', '24155', NULL, 1, 'Jatuh dan rusak', '2021-02-16', 'fotoLoading_1613431898.jpg', '0', 'Jatuh', 1, 'Kapten', 'Pelanggan', '0');

-- --------------------------------------------------------

--
-- Table structure for table `tm_kriteria`
--

CREATE TABLE `tm_kriteria` (
  `fn_idkriteria` int(11) NOT NULL,
  `fv_nmkriteria` varchar(100) DEFAULT NULL,
  `fc_param` char(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tm_kriteria`
--

INSERT INTO `tm_kriteria` (`fn_idkriteria`, `fv_nmkriteria`, `fc_param`) VALUES
(1, 'Kondisi Fisik Barang', NULL),
(2, 'Pelayanan Sopir', NULL),
(3, 'Kualitas Pelayanan KTG', NULL),
(4, 'Kualitas Barang', NULL),
(5, 'Ketepatan Waktu', NULL),
(6, 'Pelayanan', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tm_ktg`
--

CREATE TABLE `tm_ktg` (
  `fn_id_ktg` int(11) NOT NULL,
  `fv_email` varchar(50) DEFAULT NULL,
  `fv_nmktg` varchar(100) DEFAULT NULL,
  `fv_pic_ktg` varchar(50) DEFAULT NULL,
  `fv_alamat_ktg` text DEFAULT NULL,
  `fv_no_hp` varchar(20) DEFAULT NULL,
  `fv_username` varchar(225) CHARACTER SET utf8mb4 DEFAULT NULL,
  `fv_password` varchar(225) DEFAULT NULL,
  `fn_idlevel` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tm_ktg`
--

INSERT INTO `tm_ktg` (`fn_id_ktg`, `fv_email`, `fv_nmktg`, `fv_pic_ktg`, `fv_alamat_ktg`, `fv_no_hp`, `fv_username`, `fv_password`, `fn_idlevel`) VALUES
(1, 'ahmad@gmail.com', 'Ahmad Siregar', NULL, 'Surabaya', '087654321', 'ahmad123', 'ahmad123', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tm_level`
--

CREATE TABLE `tm_level` (
  `fn_idlevel` int(11) NOT NULL,
  `fv_nmlevel` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tm_level`
--

INSERT INTO `tm_level` (`fn_idlevel`, `fv_nmlevel`) VALUES
(1, 'ktg'),
(2, 'customer'),
(3, 'ekspedisi');

-- --------------------------------------------------------

--
-- Table structure for table `tm_penilaian_garansi`
--

CREATE TABLE `tm_penilaian_garansi` (
  `fn_idpenilaian_garansi` int(11) NOT NULL,
  `fc_kdpo` char(50) DEFAULT NULL,
  `fc_kdsj` char(50) DEFAULT NULL,
  `fc_kdgaransi` varchar(225) DEFAULT NULL,
  `fn_idkriteria` int(11) DEFAULT NULL,
  `fn_point` int(11) DEFAULT NULL,
  `fn_bobot` int(11) DEFAULT NULL,
  `fn_iddepartment` int(11) DEFAULT NULL,
  `fc_param` char(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tm_penilaian_keluhan`
--

CREATE TABLE `tm_penilaian_keluhan` (
  `fn_idpenilaian_keluhan` int(11) NOT NULL,
  `fc_kdpo` char(50) NOT NULL,
  `fc_kdsj` char(50) NOT NULL,
  `fc_kdkeluhan` int(11) NOT NULL,
  `fn_id_customer` int(11) DEFAULT NULL,
  `fn_idkriteria` int(11) NOT NULL,
  `fn_point` int(11) NOT NULL,
  `fn_bobot` int(11) NOT NULL,
  `fn_iddepartment` int(11) DEFAULT NULL,
  `fv_kritik_saran` text DEFAULT NULL,
  `fc_param` char(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tm_penilaian_keluhan`
--

INSERT INTO `tm_penilaian_keluhan` (`fn_idpenilaian_keluhan`, `fc_kdpo`, `fc_kdsj`, `fc_kdkeluhan`, `fn_id_customer`, `fn_idkriteria`, `fn_point`, `fn_bobot`, `fn_iddepartment`, `fv_kritik_saran`, `fc_param`) VALUES
(5, '901233', '5312899', 602, 1, 1, 5, 50, 0, 'Cepat Tanggap', NULL),
(6, '901233', '5312899', 602, 1, 2, 5, 50, 0, 'Cepat Tanggap', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tm_penilaian_pengiriman`
--

CREATE TABLE `tm_penilaian_pengiriman` (
  `fn_idpenilaian_pengiriman` int(11) NOT NULL,
  `fc_kdpo` int(11) NOT NULL,
  `fc_kdsj` int(11) NOT NULL,
  `fn_id_customer` int(11) NOT NULL,
  `fn_idkriteria` int(11) NOT NULL,
  `fn_poin` int(11) NOT NULL,
  `fn_bobot_ekspedisi` int(11) NOT NULL,
  `fn_bobot_ktg` int(11) NOT NULL,
  `fv_saran` text NOT NULL,
  `fc_param` char(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tm_penilaian_pengiriman`
--

INSERT INTO `tm_penilaian_pengiriman` (`fn_idpenilaian_pengiriman`, `fc_kdpo`, `fc_kdsj`, `fn_id_customer`, `fn_idkriteria`, `fn_poin`, `fn_bobot_ekspedisi`, `fn_bobot_ktg`, `fv_saran`, `fc_param`) VALUES
(11, 12412, 24155, 1, 1, 5, 40, 0, 'Sudah Bagus', NULL),
(12, 12412, 24155, 1, 2, 5, 20, 0, 'Sudah Bagus', NULL),
(13, 12412, 24155, 1, 3, 5, 0, 30, 'Sudah Bagus', NULL),
(14, 12412, 24155, 1, 4, 5, 0, 20, 'Sudah Bagus', NULL),
(15, 12412, 24155, 1, 5, 5, 40, 50, 'Sudah Bagus', NULL),
(16, 901233, 5312899, 1, 1, 3, 24, 0, 'Kurang Memuaskan', NULL),
(17, 901233, 5312899, 1, 2, 3, 12, 0, 'Kurang Memuaskan', NULL),
(18, 901233, 5312899, 1, 3, 3, 0, 18, 'Kurang Memuaskan', NULL),
(19, 901233, 5312899, 1, 4, 2, 0, 8, 'Kurang Memuaskan', NULL),
(20, 901233, 5312899, 1, 5, 4, 32, 40, 'Kurang Memuaskan', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tm_po`
--

CREATE TABLE `tm_po` (
  `fn_idpo` int(11) NOT NULL,
  `fc_kdpo` char(50) NOT NULL,
  `fd_tglpo` date NOT NULL,
  `fc_kdsj` char(50) DEFAULT NULL,
  `fd_tglsj` date DEFAULT NULL,
  `fd_target_tglkirim` date NOT NULL,
  `fd_target_tglsampai` date NOT NULL,
  `fd_tglmuat` date DEFAULT NULL,
  `fn_id_customer` int(11) NOT NULL,
  `fv_nm_penerima` varchar(225) DEFAULT NULL,
  `fv_jabatan_penerima` varchar(225) DEFAULT NULL,
  `fd_tgl_konfirmasi_terima_barang` date NOT NULL,
  `fd_tgl_penilaian` date NOT NULL,
  `fn_point` int(11) NOT NULL,
  `fv_nm_penilai` varchar(225) NOT NULL,
  `fv_jabatan_penilai` varchar(225) NOT NULL,
  `fv_alamat_kirim` text NOT NULL,
  `fv_jns_angkutan` varchar(50) DEFAULT NULL,
  `fv_jmn_ekspedisi` varchar(225) NOT NULL,
  `fv_syarat_ekspedisi` text DEFAULT NULL,
  `fv_dimensi` varchar(50) DEFAULT NULL,
  `fm_harga_ekspedisi` double DEFAULT NULL,
  `fv_img_load` varchar(225) DEFAULT NULL,
  `fv_transit` varchar(255) DEFAULT NULL,
  `fn_status_po` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tm_po`
--

INSERT INTO `tm_po` (`fn_idpo`, `fc_kdpo`, `fd_tglpo`, `fc_kdsj`, `fd_tglsj`, `fd_target_tglkirim`, `fd_target_tglsampai`, `fd_tglmuat`, `fn_id_customer`, `fv_nm_penerima`, `fv_jabatan_penerima`, `fd_tgl_konfirmasi_terima_barang`, `fd_tgl_penilaian`, `fn_point`, `fv_nm_penilai`, `fv_jabatan_penilai`, `fv_alamat_kirim`, `fv_jns_angkutan`, `fv_jmn_ekspedisi`, `fv_syarat_ekspedisi`, `fv_dimensi`, `fm_harga_ekspedisi`, `fv_img_load`, `fv_transit`, `fn_status_po`) VALUES
(7, '78293', '2021-02-16', '7312837', NULL, '2021-02-16', '0000-00-00', NULL, 1, NULL, NULL, '0000-00-00', '0000-00-00', 0, '', '', 'Surabaya', NULL, '', NULL, NULL, NULL, NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tm_status`
--

CREATE TABLE `tm_status` (
  `fn_idstatus` int(11) NOT NULL,
  `fv_name_sts` varchar(50) NOT NULL,
  `fc_param` varchar(225) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tm_status`
--

INSERT INTO `tm_status` (`fn_idstatus`, `fv_name_sts`, `fc_param`) VALUES
(1, 'PO', 'PO/list_po'),
(2, 'List Offer PO', 'PO/list_offer_po'),
(3, 'List Confirmation PO', 'PO/list_confirmation_po'),
(4, 'List Barang Terima', 'Penilaian'),
(5, 'List Laporan Keluhan', 'Keluhan'),
(6, 'List Garansi Barang', 'Garansi'),
(7, 'List Pengiriman', 'Pengiriman'),
(8, 'List Pengajuan Garansi', 'Garansi/list_pengajuan_garansi');

-- --------------------------------------------------------

--
-- Table structure for table `t_status`
--

CREATE TABLE `t_status` (
  `fc_param` char(10) NOT NULL,
  `fc_kode` char(2) NOT NULL,
  `fv_value` char(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `td_detail_point`
--
ALTER TABLE `td_detail_point`
  ADD PRIMARY KEY (`fn_idpoint`);

--
-- Indexes for table `td_investigasi_garansi`
--
ALTER TABLE `td_investigasi_garansi`
  ADD PRIMARY KEY (`fn_idinves`);

--
-- Indexes for table `td_keluhan_investigasi`
--
ALTER TABLE `td_keluhan_investigasi`
  ADD PRIMARY KEY (`fn_id`);

--
-- Indexes for table `td_klaim_garansi`
--
ALTER TABLE `td_klaim_garansi`
  ADD PRIMARY KEY (`fn_idklaim`);

--
-- Indexes for table `td_po`
--
ALTER TABLE `td_po`
  ADD PRIMARY KEY (`fn_iddetail_po`);

--
-- Indexes for table `td_po_ekspedisi`
--
ALTER TABLE `td_po_ekspedisi`
  ADD PRIMARY KEY (`fn_idpo_ekspedisi`);

--
-- Indexes for table `td_privilage`
--
ALTER TABLE `td_privilage`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tm_barang`
--
ALTER TABLE `tm_barang`
  ADD PRIMARY KEY (`fn_id_barang`);

--
-- Indexes for table `tm_customer`
--
ALTER TABLE `tm_customer`
  ADD PRIMARY KEY (`fn_id_customer`);

--
-- Indexes for table `tm_departement`
--
ALTER TABLE `tm_departement`
  ADD PRIMARY KEY (`fn_iddepartment`);

--
-- Indexes for table `tm_ekspedisi`
--
ALTER TABLE `tm_ekspedisi`
  ADD PRIMARY KEY (`fn_idekspedisi`);

--
-- Indexes for table `tm_garansi`
--
ALTER TABLE `tm_garansi`
  ADD PRIMARY KEY (`fn_id`);

--
-- Indexes for table `tm_keluhan`
--
ALTER TABLE `tm_keluhan`
  ADD PRIMARY KEY (`fn_idkeluhan`);

--
-- Indexes for table `tm_kriteria`
--
ALTER TABLE `tm_kriteria`
  ADD PRIMARY KEY (`fn_idkriteria`);

--
-- Indexes for table `tm_ktg`
--
ALTER TABLE `tm_ktg`
  ADD PRIMARY KEY (`fn_id_ktg`);

--
-- Indexes for table `tm_level`
--
ALTER TABLE `tm_level`
  ADD PRIMARY KEY (`fn_idlevel`);

--
-- Indexes for table `tm_penilaian_garansi`
--
ALTER TABLE `tm_penilaian_garansi`
  ADD PRIMARY KEY (`fn_idpenilaian_garansi`);

--
-- Indexes for table `tm_penilaian_keluhan`
--
ALTER TABLE `tm_penilaian_keluhan`
  ADD PRIMARY KEY (`fn_idpenilaian_keluhan`);

--
-- Indexes for table `tm_penilaian_pengiriman`
--
ALTER TABLE `tm_penilaian_pengiriman`
  ADD PRIMARY KEY (`fn_idpenilaian_pengiriman`);

--
-- Indexes for table `tm_po`
--
ALTER TABLE `tm_po`
  ADD PRIMARY KEY (`fn_idpo`);

--
-- Indexes for table `tm_status`
--
ALTER TABLE `tm_status`
  ADD PRIMARY KEY (`fn_idstatus`);

--
-- Indexes for table `t_status`
--
ALTER TABLE `t_status`
  ADD PRIMARY KEY (`fc_param`,`fc_kode`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `td_detail_point`
--
ALTER TABLE `td_detail_point`
  MODIFY `fn_idpoint` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `td_investigasi_garansi`
--
ALTER TABLE `td_investigasi_garansi`
  MODIFY `fn_idinves` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `td_keluhan_investigasi`
--
ALTER TABLE `td_keluhan_investigasi`
  MODIFY `fn_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `td_klaim_garansi`
--
ALTER TABLE `td_klaim_garansi`
  MODIFY `fn_idklaim` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `td_po`
--
ALTER TABLE `td_po`
  MODIFY `fn_iddetail_po` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `td_po_ekspedisi`
--
ALTER TABLE `td_po_ekspedisi`
  MODIFY `fn_idpo_ekspedisi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `td_privilage`
--
ALTER TABLE `td_privilage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tm_barang`
--
ALTER TABLE `tm_barang`
  MODIFY `fn_id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1028;

--
-- AUTO_INCREMENT for table `tm_customer`
--
ALTER TABLE `tm_customer`
  MODIFY `fn_id_customer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tm_departement`
--
ALTER TABLE `tm_departement`
  MODIFY `fn_iddepartment` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tm_ekspedisi`
--
ALTER TABLE `tm_ekspedisi`
  MODIFY `fn_idekspedisi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tm_garansi`
--
ALTER TABLE `tm_garansi`
  MODIFY `fn_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tm_keluhan`
--
ALTER TABLE `tm_keluhan`
  MODIFY `fn_idkeluhan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tm_kriteria`
--
ALTER TABLE `tm_kriteria`
  MODIFY `fn_idkriteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tm_ktg`
--
ALTER TABLE `tm_ktg`
  MODIFY `fn_id_ktg` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tm_level`
--
ALTER TABLE `tm_level`
  MODIFY `fn_idlevel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tm_penilaian_garansi`
--
ALTER TABLE `tm_penilaian_garansi`
  MODIFY `fn_idpenilaian_garansi` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tm_penilaian_keluhan`
--
ALTER TABLE `tm_penilaian_keluhan`
  MODIFY `fn_idpenilaian_keluhan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tm_penilaian_pengiriman`
--
ALTER TABLE `tm_penilaian_pengiriman`
  MODIFY `fn_idpenilaian_pengiriman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tm_po`
--
ALTER TABLE `tm_po`
  MODIFY `fn_idpo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tm_status`
--
ALTER TABLE `tm_status`
  MODIFY `fn_idstatus` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
