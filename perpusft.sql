-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 07, 2022 at 09:28 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `perpusft`
--

-- --------------------------------------------------------

--
-- Table structure for table `anggota`
--

CREATE TABLE `anggota` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `npm` varchar(9) NOT NULL,
  `programStudi` varchar(50) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `anggota`
--

INSERT INTO `anggota` (`id`, `nama`, `npm`, `programStudi`, `alamat`, `email`) VALUES
(43, 'Adha Dont Differatama', 'G1A019055', 'S1 - Informatika', '', ''),
(45, 'Rizki', 'njksadnk', 'kasjdn', 'kjnkj', 'askd@gmail.com'),
(46, 'Ahmad Faris', 'G1A019047', 'S1 - Informatika', '', ''),
(47, 'Adha Dont', 'G1A019091', 'S1 - Informatika', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `id` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `subJudul` varchar(255) NOT NULL,
  `isbn` varchar(255) NOT NULL,
  `bahasa` varchar(255) NOT NULL,
  `penulis` varchar(255) NOT NULL,
  `editor` varchar(255) NOT NULL,
  `edisiCetakan` varchar(255) NOT NULL,
  `penerbit` varchar(255) NOT NULL,
  `kotaTerbit` varchar(255) NOT NULL,
  `tahunTerbit` varchar(255) NOT NULL,
  `subjek` varchar(255) NOT NULL,
  `seri` varchar(255) NOT NULL,
  `asalBuku` varchar(255) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `jumlah` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`id`, `judul`, `subJudul`, `isbn`, `bahasa`, `penulis`, `editor`, `edisiCetakan`, `penerbit`, `kotaTerbit`, `tahunTerbit`, `subjek`, `seri`, `asalBuku`, `gambar`, `jumlah`) VALUES
(2, 'Pemrogramman C++', '-', '978-623-7908-90-6', 'Indonesia', 'Bambang Murdaka Eka Jati', 'Vindent G Bush', '3', 'Nuha Medika', 'Yogyakarta ', '2009', 'Memahami bahasa program pada C++', '2', 'Bandung ', 'cpp.jpg', 10),
(3, 'Kalkulus Dasar', '-', '978-623-7715-91-7', 'Indonesia', 'Peter Soedojo', 'Haryanto', '5', 'ITB : Bandung', 'Bandung', '2007', 'Perhitungan pada kalkulus dasar', '2', 'Bekasi', 'kalkulusDasar.jpg', 10),
(4, 'Pengantar metode numerik', '-', '978-623-95006-6-5', 'Indonesia', 'Ni Kadek Rini Purwati, Ni Ketut Erawati ; editor, Teddy Fiktorius', 'oleh Bahruddin', '5', 'Klik Media', 'Jakarta', '2007', 'Metode Berhitung ', '3', 'Surabaya', 'metnum.jpg', 10),
(7, ' pendidikan kewarganegaraan untuk mahasiswa', '-', '978-602-289-288-5', 'Indonesia', 'Srijanti', 'Asmayani Salimi', '5', 'Graha Ilmu  ', ' Yogyakarta', '2009', 'Mempelajari pasal-pasal  ', '3', 'Jakarta ', 'pkn.jpg', 10),
(8, 'DASAR DASAR KONSTRUKSI BANGUNAN ', '-', '978-623-328-211-6', 'Indonesia ', 'EDWARD ALLEN', 'EDY DARMAWAN', '2', 'ERLANGGA', 'Jakarta ', '2009', 'Mempelajari struktur pada bangunan ', '3', 'Yogyakarta ', 'dasarKonstruksi.jpg', 10),
(9, 'Fisika Dasar	', '-', '978-623-6622-99-5', 'Indonesia ', 'PRIYAMBODO, Tri Kuntoro Bambang Murdaka Eka Jati', 'Peter Soedojo', 'Edisi Dasar', 'ANDI : Yogyakarta', 'Yogyakarta', '2009', 'Perhitungan dasar pada fisika', '2', 'Yogyakarta ', 'fisikaDasar.jpg', 10),
(10, 'Kewirausahaan', '-', '978-265-4457-83-9', 'Indonesia ', 'Kasmir', 'RajaGrafindo Persada', '2', 'Rajawali Press', 'Jakarta ', '2011', 'Cara dan kiat kiat membuka usaha sukses ', '1', 'Jakarta ', 'kewirausahaan.jpg', 10),
(11, 'Pengantar metodologi penelitian', '-', '978-453-29543-6-8', 'Indonesia ', 'Didik Suharjito', 'Didik Suharjito', '4', 'IPB Press', 'Bogor', '2014', 'Mempelajari tahap- tahap meteodologi penelitian ', '3', 'Jakarta ', 'metodologiPenelitian.jpg', 10),
(12, 'Upaya Membangun Citra Arsitektur', '-', '978-225-84376-2-8', 'Indonesia ', 'Hartono Poerbo', 'Hartono Poerbo', '3', 'Kanisius', 'Bogor', '2013', 'pemahaman bagaimana cara membangun citra arsitektur dan step apa yang digunakan ', '5', 'Semarang ', 'citraArsitektur.jpg', 10),
(13, 'Teknik Kuantitatif untuk Arsitektur dan Perancangan Kota disertai Contoh-Contoh', '-', '978-376-29543-3-11', 'Indonesia', 'Agus B Purnomo', 'Agus B Purnomo', '1', 'Rajawali Press', 'Jakarta', '2009', 'Apa itu teknik kuantitatif dan bagaimana penerapannya pada perancangan arsitektur', '3', 'Yoogyakarta ', 'teknikKuantitatif.jpg', 10),
(14, 'Tata Atur: Pengantar Merancang Arsitektur', '-', '978-223-65532-3-9', 'Indonesia ', 'Edward T White', 'Edward T White', '2', 'ITB ', 'Bandung', '2014', 'Pengantar dan Perancangan dasar pada arsitektur', 'Dasar ', 'Semarang ', 'tataAturMerancangArsitektur.jpg', 10),
(15, 'Sejarah Kebudayaan Indonesia : Arsitektur', '-', '978-638-99732-8-1', 'Indonesia ', 'Boy Subirosa SabarGuna', 'Boy Subirosa SabarGuna', '1', 'Salemba, Medika ', 'Semarang ', '2013', 'Memahami Sejarah Kebudayaan Indonesia ', '1', 'Jakarta', 'sejarahKebudIndo.jpg', 10),
(16, 'Ilmu Fisika Bangunan : Seri Konstruksi Arsitektur 8', '-', '978-912-8885-1-10', 'Indonesia ', 'Heinz Frick', 'Heinz Frick', '3', 'Kanisius', 'Semarang', '2008', 'Mempelajari Ilmu Fisika Bangunan', '8', 'Bandung', 'ilmuFisikaBangunan.jpg', 10),
(17, 'CARA CEPAT MENGHITUNG BIAYA BANGUNAN', '-', '978-623-97765-2-2', 'Indonesia ', 'WULFRAM I.ERVIANTO', 'WULFRAM I.ERVIANTO', '5', 'GRIYA KREASI', 'Semarang ', '2011', 'Langkah dan Cara Cepat Menghitung Biaya Bangunan', '3', 'Yogyakarta ', 'menghitungBiayaBangunan.jpg', 10),
(18, 'Pengantar metode numerik : teori & praktik	', '-', '978-602-447-522-2', 'Indonesia ', 'Putri Fitriasari, Yunika Lestaria Ningsih', 'Yunika Lestaria Ningsih', '5', 'Noer Fikri Offset', 'Bandung', '2017', 'Mempelajari tentang perhitungan pada metode numerik beserta moul praktikum ', '7', 'Semarang ', 'MetodeNumerik.jpg', 10),
(19, 'Metode penyusunan prototipe denah', '-', '978-979-9330-90-5', 'Indonesia ', 'Putri Cristian', 'Putri Cristian', '2', 'ANDI : Yogyakarta', 'Yogyakarta ', '2009', 'Mengenal bagaimana metode penyusunan prototipe denah', '1-dasar ', 'Bandung ', 'prototipeDenah.jpg', 10),
(20, 'Modul pembelajaran kalkulus peubah banyak', '-', '978-623-362-225-7', 'Indonesia ', 'Joko Soebagyo   ', 'Rintho R. Rerung', '3', 'CV. Media Sains Indonesia', 'Jakarta ', '2010', ' pembelajaran kalkulus peubah banyak', '3', 'Semarang ', 'peubahBanyak.jpg', 10),
(21, 'Permodelan kalkulus diferensial', '-', '978-623-6318-50-8', 'Indonesia ', 'Sanusi', 'Sanusi', '5', 'Unipma Press', 'Madiun ', '2013', 'Apa itu permodelan kalkulus diferensial', '3', 'Semarang', 'kalkulusDiferensial.jpg', 10),
(22, 'Marketing architectural and engineering service', '-', '978-602-9066-54-8\r\n', 'English-Indonesia', 'Weld Coxe', 'Weld Coxe', '8', 'Gramedia ', 'Jakarta ', '2013', 'Bagaimana cara memasarkan layanan arsitektur dan teknik', '5', 'Yogyakarta ', 'marketingArsitektural.jpg', 10),
(23, 'Kalkulus integral', '-', '978-623-6036-22-8', 'Indonesia ', ' Heny Sri Astutik ', 'Anang Triyoso', '5', 'Unimuda PRESS', 'Jakarta ', '2016', 'Perhitungan tentang kalkulus integral', '2', 'Sorong ', 'kalkulusIntegral.jpg', 10),
(24, 'Analisysing Genre Language Use in Professional Settings', '-', '978-623-6481-77-6', 'English-Indonesia', 'Sahulata, Daniel', 'Daniel', '7', 'Depdikbud : Jakarta', 'Jakarta', '2015', 'Bagaimana menganalisis Penggunaan Bahasa Genre dalam Pengaturan Profesional', '3', 'Yogyakarta ', 'bahasaGenre.jpg', 10),
(25, 'An Introduction To Sounds and Sounds Systems Of English', '-', '978-623-98446-1-5', 'English-Indonesia', 'Campbell, Anne', 'Campbell, Anne', '6', 'Depdikbud : Jakarta', 'Jakarta ', '2013', 'Pengantar Sistem Bunyi dan Bunyi Bahasa Inggris', '5', 'London ', 'sistemBunyi.jpg', 10),
(29, 'Penggunaan aplikasi GeoGebra pada mata kuliah kalkulus integral	', '-', '978-623-316-545-7', 'Indonesia ', 'Yeni Listiana ', 'Dewi Wahyuni', '7', 'K-Media', 'Bogor ', '2011', 'apa itun aplikasi GeoGebra dan bagimana penerapan penggunaanya pada mata kuliah kalkulus integral', '2', 'Semarang ', 'aplikasiGeogebra.jpg', 10),
(30, 'Bahasa Inggris Bagi Mahasiswa Magister ', '-', '978-623-5776-07-1', 'Indonesia ', 'Safnil', 'Safnil', '2', 'FKIP UNIB : Bengkulu', 'Bengkulu', '2017', 'Cara cepat berbahasa Inggris Bagi Mahasiswa Magister ', '1', 'Bengkulu', 'bahasaInggris.jpg', 10),
(31, 'Dasar-Dasar Fisika Universitas: mekanika dan termodinamika jilid 1', '-', '978-623-5669-16-8', 'Indonesia ', 'Marcelo Alonso', 'Mohamad Ishaq', '4', 'Erlangga', 'Jakarta ', '2013', 'Memahami dasar - dasar fisika ', '2', 'Yogyakarta ', 'fisikaDasar.jpg', 10),
(32, 'Kalkulus : terapan, konsep, dan prinsip disertai visualisasi', '-', '978-602-14423-8-8', 'Indonesia ', 'Ridho Ananda ', 'Maman Sulaeman', '3', 'Sumberdaya Energi Indonesia,PT', 'Jakarta ', '2007', 'Memahami terapan, konsep, dan prinsip disertai visualisasi', '2', 'Madiun ', 'Terapan Visualisasi.jpg', 10),
(33, 'Mekanika Rekayasa ', '-', '78-623-98007-0-3', 'Indonesia ', 'Bernard Mediarman', 'Arono', '7', 'Salemba Teknik ', ' Jakarta', '2005', 'Penerapan Teknik Mekanika Rekayasa ', '1-Dasar ', 'Bandung ', 'Bangunan mekanika rekayasa.jpg', 10),
(34, 'Pengantar Teknik Sipil ', '-', '978-623-376-011-9', 'Indonesia', 'Siregar, Marida', 'Aminuddin', '2', 'Angkasa ', 'Bandung', '2008', 'Mempelajariaplikasi dan hitungan bangunan pada teknik sipil ', '1', 'Jakarta ', 'Bangunan.jpg', 10),
(35, 'Analisa dan Perancangan Fondasi 1', '-', '978-623-266-391-6', 'Indonesia ', 'Khak, Muh Abdul', 'Khak, Muh Abdul', '1', 'Salemba Teknik ', 'Jakarta ', '2004', 'Memahami pendalaman fondasi', '1', 'Bandung', 'Fondasi bangunan.jpg', 10),
(36, 'Sturuktur Jembatan ', '-', '978-623-96657-2-2', 'Indonesia ', 'ASTRID KUSUMO WIDAGDO', ' Graha Ilmu ', '8', 'Gramedia ', 'Yogyakarta', '2011', 'Mempelajari dan memahami peranangan pada bangunan jembatan ', '2', 'Bandung ', 'Struktur Jembatan.jpg ', 10),
(37, 'Dasar Tenaga Listrik ', '-', '978-623-94550-9-5', 'Indonesia', 'Ahmad Watik Pratiknya', 'Sudigdo Sastroasmoro', '10', 'Nuha Medika ', 'Yogyakarta ', '2016', 'Memahami dasar dasar pada kelistrikan ', '7', 'Malang', 'dari sini kebawah belum', 10),
(38, 'Teori Sistem Kendali Linear dan Aplikasinya ', '-', '978-623-319-349-8', 'Indonesia ', 'Sumadi Suryabrata', 'Soejono', '4', 'Gramedia ', 'Jakarta', '2010', 'Memahami defenisi,tujuan teori sisttem kendali linear fan panduan memakai aplikasinya ', '3', 'Bandung ', 'kendaliLinear.jpg', 10),
(39, 'Teknik Penyediaan Air Minum Perpipaan ', '-', '978-602-269-434-2', 'Inddnesia ', 'Bambang Murdaka Eka Jati', 'Sutrisno', '9', 'ITB (Istitut Teknologi Bandung)', 'Bandung', '2007', 'Memahami Teknik Penyediaan Air Minum Perpipaan dan bagaimana sistem penerapannya ', '5', 'Semarang', 'airMinumPipa.jpg', 10),
(40, 'Mekanika Tanah', '-', '978-623-7936-95-4', 'Indonesia ', 'Staadegaard Lid', 'Ronald W', '3', 'Gramedia', 'Yogyakarta ', '2007', 'Konsep yang harus digunakan dalam mekanika Tanah', '3', 'Jakarta', 'mekanikaTanah.jpg', 10),
(41, 'Bangunan Tenaga Air', '-', '978-602-60227-4-5', 'Indonesia ', 'Handriani Kristini', 'Purma Ayu', '5', 'Gramedia ', 'Jakarta', '2011', 'Memahami pendefenisian Bangunan Tenaga Air', '3', 'Bandung', 'tenagaAir.jpg', 10),
(42, 'Metode Penelitian ', '-', '978-602-5867-56-9', 'Indonesia', 'Handriani Kristini', 'Purna Bayu Nugrohho', '3', 'Gramedia', 'Semarang ', '2007', 'Baimana langkah dan cara pada metode peelitian', '2', 'Yogyakarta ', 'metodePenelitian.jpg', 10),
(43, 'Organisasi dan Arsitektur Komputer', '-', '978-623-91508-7-7', 'Indonesia', ' Annajmi & Ratri Isharyadi	', 'Ansari Saleh Ahmar', '5', 'Erlangga ', 'Jakarta ', '2009', 'Bagaimana Organisasi dan Arsitektur Komputer', '3', 'Bandung', 'arsitekturKomputer.jpg', 10),
(44, 'Statika Struktur ', '-', '978-602-5728-40-2', 'Indonesia ', 'Bambang Eko', 'David Mubarok', '7', 'Gramedia ', 'Jakarta', '2011', 'Penerapan Statika Struktur', '2', 'Semaranng ', 'StatikaStruktur.jpg', 10),
(45, 'Pengantar Teknologi Informasi', '-', '978-602-432-823-8', 'Indonesia ', 'Ari Andari', 'Ari Andari', '8', 'Erlangga ', 'Jakarta', '2010', 'Memahami Dasar-Dasar Pengantar Teknologi Informasi', '3', 'Bandung', 'PengantarTeknologi.jpg', 10),
(46, 'Perencanaan Bangunan Bendung', '-', '978-602-432-824-5', 'Indonesia ', 'IR. ACHMAD FANANI', 'IMELDA AKMAL', '6', 'PUSTAKA UTAMA', 'Semarang ', '2011', 'Perencanaan Bangunan Bendung', '3', 'Jawa Tengah ', 'Bendung.jpg', 10),
(47, 'Kalkulus Peubah Banyak ', '-', '978-979-796-407-8', 'Indonesia', 'Almanar, Elvita Alma', 'Almanar, Elvita Alma', '3', 'Gramedia ', 'Yogyakarta ', '2009', 'Penerapan Kalkulus Peubah Banyak ', '3', 'Madiun', 'KalkulusPeubah.jpg', 10),
(48, 'Fisika dasar mekanika', '-', '978-602-50970-9-6', 'Indonesia ', 'Bambang Murdaka Eka Jati', 'Sutrisno', '3', 'ITB : Bandung', 'Bandung', '2013', 'Memahami dan cara berhitung pada fisika dasar', '3', 'Yogyakarta ', 'fisika dasar.jpg', 10),
(50, 'kalkulus integral melalui 4K', '-', '978-602-462-274-9', 'Indonesia ', 'unis Sulistyorini, Siti Napfiah', 'unis Sulistyorini, Siti Napfiah', '5', 'Media Nusa Creative', 'Jakarta ', '2010', 'Mempelajari kalkulus integral melalui 4K', '1', 'Bandung', 'Mempelajari kalkulus integral melalui 4K', 10);

-- --------------------------------------------------------

--
-- Table structure for table `kartuanggota`
--

CREATE TABLE `kartuanggota` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `npm` varchar(10) NOT NULL,
  `programStudi` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kartuanggota`
--

INSERT INTO `kartuanggota` (`id`, `nama`, `npm`, `programStudi`) VALUES
(22, 'Adha Dont Differatama', 'G1A019055', 'S1 - Informatika'),
(23, 'Joni', 'G1A0190100', 'S1 - TI'),
(24, 'Ahmad Faris', 'G1A019047', 'S1 - Informatika'),
(25, 'Adha Dont', 'G1A019091', 'S1 - Informatika');

-- --------------------------------------------------------

--
-- Table structure for table `pesan`
--

CREATE TABLE `pesan` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `subjek` varchar(50) NOT NULL,
  `pesan` text NOT NULL,
  `keterangan` char(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pesan`
--

INSERT INTO `pesan` (`id`, `nama`, `email`, `subjek`, `pesan`, `keterangan`) VALUES
(2, 'Adha Dont Differatama', 'fratamaadha18@gmail.com', 'mencoba', 'Kirim pesan percobaan', 'belumDibaca'),
(7, 'anonim', 'kucing@gmail.com', 'ayam', 'jkjajsa', 'belumDibaca');

-- --------------------------------------------------------

--
-- Table structure for table `pinjamkembali`
--

CREATE TABLE `pinjamkembali` (
  `id` int(11) NOT NULL,
  `judul` varchar(50) NOT NULL,
  `kodeBuku` varchar(50) NOT NULL,
  `npm` varchar(50) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `total` int(11) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `idBuku` int(11) NOT NULL,
  `idMhs` int(11) NOT NULL,
  `denda` float NOT NULL DEFAULT 0,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pinjamkembali`
--

INSERT INTO `pinjamkembali` (`id`, `judul`, `kodeBuku`, `npm`, `jumlah`, `total`, `tanggal`, `idBuku`, `idMhs`, `denda`, `status`) VALUES
(38, 'Pemrogramman C++', '978-623-7908-90-6', 'G1A019055', 10, 20, '2021-12-28', 2, 17, 0, 'kembali'),
(63, 'Pengantar metode numerik', '978-623-95006-6-5', 'G1A019055', 10, 10, '2021-12-29', 4, 22, 0, 'kembali'),
(71, 'Pengantar metode numerik', '978-623-95006-6-5', 'G1A019055', 10, 2, '2021-12-30', 4, 22, 0, 'pinjam'),
(73, 'Pemrogramman C++', '978-623-7908-90-6', 'G1A019047', 10, 2, '2021-12-30', 2, 24, 0, 'pinjam'),
(74, 'Pemrogramman C++', '978-623-7908-90-6', 'G1A019091', 10, 10, '2021-12-29', 2, 25, 0, 'kembali');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `password`, `status`) VALUES
('admin perpus', '$2y$10$k.YOUumk8R6vo7Urv8iAmOh/LrGsjxqV/lnM42C0WFxqZovgO0xYa', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anggota`
--
ALTER TABLE `anggota`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `npm` (`npm`);

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `isbn` (`isbn`);

--
-- Indexes for table `kartuanggota`
--
ALTER TABLE `kartuanggota`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `npm` (`npm`);

--
-- Indexes for table `pesan`
--
ALTER TABLE `pesan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pinjamkembali`
--
ALTER TABLE `pinjamkembali`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `anggota`
--
ALTER TABLE `anggota`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `book`
--
ALTER TABLE `book`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `kartuanggota`
--
ALTER TABLE `kartuanggota`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `pesan`
--
ALTER TABLE `pesan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `pinjamkembali`
--
ALTER TABLE `pinjamkembali`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
