-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 27, 2025 at 04:05 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `film`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `films`
--

CREATE TABLE `films` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `genre` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `rating` decimal(3,1) NOT NULL DEFAULT 0.0,
  `sinopsis` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `films`
--

INSERT INTO `films` (`id`, `title`, `description`, `genre`, `created_at`, `updated_at`, `gambar`, `rating`, `sinopsis`) VALUES
(1, 'The Shawshank Redemption', 'Dua pria dipenjara membentuk ikatan selama bertahun-tahun, menemukan penghiburan dan akhirnya penebusan melalui tindakan kesopanan yang umum.', 'Drama', '2024-12-29 19:13:30', '2025-01-19 20:06:46', 'images/55y5gDI9cHmMiH7fig8PNbo3axVG69IPnJ0ZkyfB.jpg', 9.3, 'Andy Dufresne, seorang bankir yang dihukum karena kejahatan yang tidak dilakukannya, membentuk persahabatan dengan sesama narapidana, Ellis \"Red\" Redding, dan bersama-sama mereka menemukan harapan dan penebusan di Penjara Shawshank.'),
(2, 'The Godfather', 'Kepala keluarga kriminal terorganisir mentransfer kendali kerajaannya yang tersembunyi kepada putranya yang enggan.', 'Kejahatan, Drama', '2024-12-29 19:13:30', '2024-12-29 12:37:53', 'images/JyiABALzahbVGlx8tSPYpUh7Lp5ifidXoXf7RP0U.jpg', 9.2, 'Don Vito Corleone, patriark keluarga mafia Corleone, mencoba untuk mengalihkan kekuasaan kepada putranya, Michael, yang awalnya enggan terlibat dalam bisnis keluarga.'),
(3, 'The Dark Knight', 'Ketika ancaman yang dikenal sebagai Joker menyebabkan kekacauan dan kekacauan pada orang-orang di Gotham, Batman harus menerima salah satu tes psikologis dan fisik terbesar dari kemampuannya untuk melawan ketidakadilan.', 'Aksi, Kejahatan, Drama', '2024-12-29 19:13:30', '2024-12-29 12:38:22', 'images/13SGK5J2EoT0iSpc5xC9efms5fPB0IrwpXLnaYG4.jpg', 9.0, 'Batman menghadapi musuh terbesarnya, Joker, yang berusaha menjerumuskan Gotham ke dalam anarki dan menguji batas moral Batman.'),
(4, 'The Godfather Part II', 'Kisah masa muda dan kebangkitan Vito Corleone ditampilkan sementara putranya, Michael, memperluas dan memperketat cengkeramannya pada sindikat kejahatan keluarga.', 'Kejahatan, Drama', '2024-12-29 19:13:30', '2024-12-29 12:38:48', 'images/3hLDyRp1q0n0UC0STRQ6wb97o5YURqvmw48VLAgB.jpg', 9.0, 'Paralel antara kebangkitan Vito Corleone muda dan perjuangan putranya, Michael, untuk memperluas kekuasaan keluarga mafia di masa kini.'),
(5, '12 Angry Men', 'Seorang juri yang terisolasi mencoba mencegah kesalahan peradilan dengan memaksa rekan-rekannya untuk mempertimbangkan kembali bukti.', 'Drama', '2024-12-29 19:13:30', '2024-12-29 12:39:26', 'images/7ZZD8ZY3VKpp1k7KxmQGXRcAomKEkMue4U67CdOG.jpg', 9.0, 'Dalam ruang juri, satu orang berusaha meyakinkan 11 juri lainnya untuk tidak terburu-buru memutuskan bersalah terhadap seorang terdakwa muda, dengan meneliti bukti secara mendalam.'),
(6, 'Schindler\'s List', 'Di tengah kekejaman Holocaust, seorang pengusaha Jerman menyelamatkan lebih dari seribu pengungsi Yahudi dengan mempekerjakan mereka di pabriknya.', 'Biografi, Drama, Sejarah', '2024-12-29 19:13:30', '2024-12-29 12:40:34', 'images/tjvl7Y9Z4l65Oyp4V716y8II6YHJ32QAPQ5Z1UGY.jpg', 9.0, 'Oskar Schindler, seorang anggota partai Nazi dan pengusaha, menjadi penyelamat bagi lebih dari seribu pengungsi Yahudi selama Holocaust dengan mempekerjakan mereka di pabrik amunisinya.'),
(7, 'The Lord of the Rings: The Return of the King', 'Gandalf dan Aragorn memimpin Dunia Manusia melawan pasukan Sauron untuk mengalihkan perhatiannya dari Frodo dan Sam yang mendekati Gunung Doom dengan Cincin Satu.', 'Petualangan, Drama, Fantasi', '2024-12-29 19:13:30', '2024-12-29 12:41:04', 'images/SCHizhWjyNaa2CxwKFWUD1p1dXPhab2ASCJcrodd.jpg', 8.9, 'Pertempuran epik untuk Middle-earth mencapai puncaknya saat Frodo dan Sam mendekati Gunung Doom untuk menghancurkan Cincin Satu, sementara Aragorn memimpin pasukan melawan kekuatan Sauron.'),
(8, 'Pulp Fiction', 'Kehidupan dua pembunuh bayaran, petinju, istri gangster, dan sepasang perampok kafe saling terkait dalam empat kisah kekerasan dan penebusan.', 'Kejahatan, Drama', '2024-12-29 19:13:30', '2024-12-29 12:41:39', 'images/UUAMcTKoYA39NSoBdqxGMZY2ffWapEux4ACYrJze.jpg', 8.9, 'Serangkaian cerita yang saling berhubungan menampilkan kehidupan dua pembunuh bayaran, seorang petinju, istri seorang gangster, dan sepasang perampok, yang semuanya terjalin dalam jaringan kekerasan dan penebusan.'),
(9, 'The Lord of the Rings: The Fellowship of the Ring', 'Seorang Hobbit muda bernama Frodo Baggins memulai perjalanan untuk menghancurkan Cincin Satu yang kuat untuk menyelamatkan Middle-earth dari Lord Kegelapan Sauron.', 'Petualangan, Drama, Fantasi', '2024-12-29 19:13:30', '2024-12-29 12:42:08', 'images/lOahwEWn9lObSKYMiVEF55u5ZqtBJJKqUiT0kSwp.jpg', 8.8, 'Frodo Baggins memulai perjalanan epik dengan delapan sahabat untuk menghancurkan Cincin Satu yang kuat dan menyelamatkan Middle-earth dari kekuasaan Sauron.'),
(10, 'The Good, the Bad and the Ugly', 'Seorang penipu bergabung dengan dua orang lainnya dalam aliansi yang tidak nyaman dalam perlombaan untuk menemukan kekayaan emas yang terkubur di pemakaman terpencil.', 'Petualangan, Barat', '2024-12-29 19:13:30', '2024-12-29 12:42:31', 'images/zKZAVBvYMG5sCflZl6B7okeu18UbbnVI9BomS2YX.jpg', 8.8, 'Tiga penembak jitu bersaing untuk menemukan harta emas yang terkubur di'),
(11, 'Forrest Gump', 'Seorang pria sederhana dengan kecerdasan yang terbatas menjalani kehidupan yang luar biasa, menjadi saksi sejarah besar Amerika sambil mengejar cinta seumur hidupnya.', 'Drama, Romansa', '2024-12-29 19:13:30', '2024-12-29 19:13:30', 'forrest_gump.jpg', 8.8, 'Forrest Gump, seorang pria dengan IQ rendah, mengalami peristiwa-peristiwa bersejarah dunia sambil tetap menjaga pandangan optimis dan mengejar cintanya, Jenny.'),
(12, 'Fight Club', 'Seorang pekerja kantor yang kecewa membentuk klub pertarungan bawah tanah dengan seorang pembuat sabun yang ceroboh, dan hubungan mereka menjadi kacau.', 'Drama', '2024-12-29 19:13:30', '2024-12-29 19:13:30', 'fight_club.jpg', 8.8, 'Seorang pria yang jenuh dengan kehidupannya menemukan pelarian melalui kekerasan fisik dan pemberontakan sosial dengan klub pertarungan rahasia yang dia bentuk bersama Tyler Durden.'),
(13, 'Inception', 'Seorang pencuri yang memiliki kemampuan untuk memasuki mimpi orang lain ditawari kesempatan untuk mendapatkan pengampunan dengan melakukan penanaman ide ke dalam pikiran seseorang.', 'Aksi, Petualangan, Fiksi Ilmiah', '2024-12-29 19:13:30', '2024-12-29 19:13:30', 'inception.jpg', 8.8, 'Dom Cobb, seorang pencuri mimpi, menghadapi tantangan besar ketika dia harus menanamkan ide ke dalam mimpi seseorang, sambil berjuang dengan kenangan pribadinya.'),
(14, 'The Lord of the Rings: The Two Towers', 'Frodo dan Sam melanjutkan perjalanan mereka menuju Mordor untuk menghancurkan Cincin Satu, sementara Aragorn, Legolas, dan Gimli berperang untuk menyelamatkan Middle-earth.', 'Petualangan, Drama, Fantasi', '2024-12-29 19:13:30', '2024-12-29 19:13:30', 'lotr_two_towers.jpg', 8.8, 'Pertempuran epik Middle-earth berlanjut dengan Frodo dan Sam melanjutkan perjalanan mereka sementara teman-teman mereka menghadapi pasukan Saruman.'),
(15, 'Star Wars: Episode V - The Empire Strikes Back', 'Setelah pemberontak dikalahkan oleh Kekaisaran, Luke Skywalker memulai pelatihan dengan Yoda sementara teman-temannya mencoba melarikan diri dari Darth Vader.', 'Aksi, Petualangan, Fantasi', '2024-12-29 19:13:30', '2024-12-29 19:13:30', 'star_wars_empire.jpg', 8.7, 'Luke Skywalker berlatih dengan Yoda untuk menjadi Jedi, sementara pemberontak menghadapi ancaman besar dari Kekaisaran yang dipimpin oleh Darth Vader.'),
(16, 'The Matrix', 'Seorang hacker mengetahui bahwa kenyataan seperti yang dia tahu sebenarnya adalah simulasi, dan dia bergabung dengan pemberontakan untuk melawan pengontrolnya.', 'Aksi, Fiksi Ilmiah', '2024-12-29 19:13:30', '2024-12-29 19:13:30', 'matrix.jpg', 8.7, 'Neo menemukan kebenaran tentang dunia maya yang dikontrol oleh mesin dan bergabung dengan pemberontakan untuk membebaskan umat manusia.'),
(17, 'Goodfellas', 'Kisah nyata seorang gangster yang naik pangkat dalam dunia kejahatan terorganisir, dan akhirnya menyaksikan kejatuhannya.', 'Biografi, Kejahatan, Drama', '2024-12-29 19:13:30', '2024-12-29 19:13:30', 'goodfellas.jpg', 8.7, 'Henry Hill memaparkan dunia mafia dari dalam, mencatat kejayaan dan kehancurannya dalam kejahatan terorganisir.'),
(18, 'One Flew Over the Cuckoo\'s Nest', 'Seorang tahanan yang berpura-pura gila dikirim ke rumah sakit jiwa, di mana ia menginspirasi pasien lainnya melawan peraturan yang menindas.', 'Drama', '2024-12-29 19:13:30', '2024-12-29 19:13:30', 'cuckoos_nest.jpg', 8.7, 'Randle McMurphy, seorang tahanan yang berpura-pura sakit jiwa, menghidupkan semangat para pasien dengan melawan sistem yang represif di rumah sakit jiwa.'),
(19, 'Seven Samurai', 'Tujuh samurai direkrut untuk melindungi desa kecil dari kelompok bandit yang mengancam mereka.', 'Petualangan, Drama', '2024-12-29 19:13:30', '2024-12-29 19:13:30', 'seven_samurai.jpg', 8.6, 'Para samurai bersatu untuk mempertahankan desa petani dari serangan para bandit yang mendatangkan kekacauan.'),
(20, 'Se7en', 'Dua detektif memburu pembunuh berantai yang menggunakan tujuh dosa mematikan sebagai motif kejahatannya.', 'Kejahatan, Drama, Misteri', '2024-12-29 19:13:30', '2024-12-29 19:13:30', 'se7en.jpg', 8.6, 'Dua detektif, satu yang baru dan satu yang hampir pensiun, berusaha menangkap pembunuh berantai yang terobsesi dengan dosa mematikan.'),
(21, 'City of God', 'Dua anak muda di lingkungan kumuh Rio de Janeiro mengikuti jalan yang berbeda: satu menjadi fotografer dan yang lain menjadi penguasa narkoba.', 'Kejahatan, Drama', '2024-12-29 19:13:30', '2024-12-29 19:13:30', 'city_of_god.jpg', 8.6, 'Cerita tentang kemiskinan, kejahatan, dan perjuangan hidup di Cidade de Deus, dilihat melalui mata seorang fotografer muda yang ingin keluar dari kehidupan kriminal.'),
(22, 'The Silence of the Lambs', 'Seorang calon agen FBI meminta bantuan seorang pembunuh berantai yang dipenjara untuk menangkap pembunuh lain yang aktif.', 'Kejahatan, Drama, Horor', '2024-12-29 19:13:30', '2024-12-29 19:13:30', 'silence_of_the_lambs.jpg', 8.6, 'Clarice Starling, seorang agen FBI pemula, bekerja sama dengan Hannibal Lecter untuk menangkap pembunuh berantai yang dikenal sebagai \"Buffalo Bill\".'),
(23, 'It\'s a Wonderful Life', 'Seorang pria yang putus asa mendapatkan kesempatan untuk melihat kehidupan orang lain jika dia tidak pernah dilahirkan.', 'Drama, Fantasi', '2024-12-29 19:13:30', '2024-12-29 19:13:30', 'its_a_wonderful_life.jpg', 8.6, 'George Bailey, yang frustrasi dengan hidupnya, mendapat bantuan malaikat untuk menyadari dampak positif yang dia miliki terhadap dunia.'),
(24, 'Life Is Beautiful', 'Seorang pria menggunakan imajinasinya untuk melindungi putranya dari kengerian kamp konsentrasi selama Holocaust.', 'Komedi, Drama, Romansa', '2024-12-29 19:13:30', '2024-12-29 19:13:30', 'life_is_beautiful.jpg', 8.6, 'Guido Orefice, seorang ayah yang penuh kasih, menciptakan permainan khayalan untuk menjaga semangat anaknya tetap tinggi selama mereka dipenjara di kamp konsentrasi Nazi.'),
(25, 'The Usual Suspects', 'Seorang penipu yang selamat menceritakan bagaimana lima penjahat bertemu dalam penahanan polisi dan rencana kriminal mereka berkembang.', 'Kejahatan, Drama, Misteri', '2024-12-29 19:13:30', '2024-12-29 19:13:30', 'usual_suspects.jpg', 8.5, 'Kisah misterius yang melibatkan lima penjahat dalam rencana kriminal rumit yang berujung pada pengungkapan identitas Keyser Söze.'),
(26, 'Saving Private Ryan', 'Selama Perang Dunia II, sekelompok tentara ditugaskan untuk menemukan dan membawa pulang seorang tentara yang saudara-saudaranya tewas dalam pertempuran.', 'Drama, Perang', '2024-12-29 19:13:30', '2024-12-29 19:13:30', 'saving_private_ryan.jpg', 8.6, 'Kapten Miller dan timnya memulai misi berbahaya untuk menyelamatkan James Ryan, seorang tentara yang keluarganya telah kehilangan semua putra lainnya dalam perang.'),
(27, 'Interstellar', 'Tim penjelajah ruang angkasa melakukan perjalanan melalui lubang cacing untuk mencari tempat baru bagi umat manusia di luar bumi.', 'Petualangan, Drama, Fiksi Ilmiah', '2024-12-29 19:13:30', '2024-12-29 19:13:30', 'interstellar.jpg', 8.6, 'Seorang mantan pilot NASA memimpin misi untuk menemukan planet layak huni bagi umat manusia setelah Bumi menghadapi kehancuran lingkungan.'),
(28, 'Spirited Away', 'Seorang gadis muda menemukan dirinya di dunia roh dan harus bekerja di pemandian roh untuk menyelamatkan orang tuanya.', 'Animasi, Petualangan, Keluarga', '2024-12-29 19:13:30', '2024-12-29 19:13:30', 'spirited_away.jpg', 8.6, 'Chihiro Ogino terjebak di dunia roh dan harus menemukan cara untuk menyelamatkan orang tuanya sambil menghadapi berbagai makhluk magis.'),
(29, 'The Green Mile', 'Kisah seorang sipir penjara yang bertugas di koridor maut dan persahabatannya dengan seorang tahanan yang memiliki kekuatan magis.', 'Kejahatan, Drama, Fantasi', '2024-12-29 19:13:30', '2024-12-29 19:13:30', 'green_mile.jpg', 8.6, 'Paul Edgecomb, sipir koridor maut, menemukan keajaiban dan kebenaran melalui persahabatannya dengan John Coffey, seorang tahanan misterius yang memiliki kekuatan ajaib.'),
(30, 'Parasite', 'Kisah keluarga miskin yang menyusup ke rumah keluarga kaya dengan mengambil posisi pekerjaan mereka.', 'Kejahatan, Drama, Komedi', '2024-12-29 19:13:30', '2024-12-29 19:13:30', 'parasite.jpg', 8.5, 'Keluarga Kim yang cerdik memasuki kehidupan keluarga Park yang kaya, dengan rencana yang membawa konsekuensi tak terduga.'),
(31, 'The Pianist', 'Seorang pianis Yahudi Polandia bertahan dari kengerian Holocaust dengan perjuangan yang mengharukan.', 'Biografi, Drama, Musik', '2024-12-29 19:13:30', '2024-12-29 19:13:30', 'the_pianist.jpg', 8.5, 'Władysław Szpilman, seorang pianis berbakat, berjuang untuk bertahan hidup di Warsawa selama pendudukan Nazi.'),
(32, 'Gladiator', 'Seorang jenderal Romawi yang dikhianati menjadi gladiator untuk membalas dendam pada kaisar korup yang membunuh keluarganya.', 'Aksi, Petualangan, Drama', '2024-12-29 19:13:30', '2024-12-29 19:13:30', 'gladiator.jpg', 8.5, 'Maximus, seorang jenderal yang dipermalukan, bangkit sebagai gladiator dan mencari balas dendam terhadap Commodus, penguasa Romawi yang jahat.'),
(33, 'The Lion King', 'Seekor singa muda melarikan diri dari rumah setelah kematian ayahnya, tetapi kembali untuk merebut tahtanya.', 'Animasi, Petualangan, Drama', '2024-12-29 19:13:30', '2024-12-29 19:13:30', 'lion_king.jpg', 8.5, 'Simba, pewaris kerajaan Pride Lands, menghadapi pengkhianatan dan perjuangan untuk mengambil tempatnya sebagai raja.'),
(34, 'The Departed', 'Seorang polisi yang menyamar dan seorang informan di kepolisian mencoba mengungkap identitas satu sama lain.', 'Kejahatan, Drama, Thriller', '2024-12-29 19:13:30', '2024-12-29 19:13:30', 'the_departed.jpg', 8.5, 'Ketegangan meningkat ketika dua orang dengan agenda rahasia bekerja di sisi berlawanan dari hukum di Boston.'),
(35, 'Whiplash', 'Seorang drummer muda yang bercita-cita tinggi menghadapi pelatihannya yang brutal di bawah seorang instruktur yang kejam.', 'Drama, Musik', '2024-12-29 19:13:30', '2024-12-29 19:13:30', 'whiplash.jpg', 8.5, 'Andrew Neiman, seorang drummer berbakat, menghadapi tantangan fisik dan emosional yang intens di bawah arahan mentor yang keras.'),
(36, 'The Prestige', 'Dua pesulap berkompetisi sengit untuk menciptakan ilusi terbaik, dengan akibat yang tragis.', 'Drama, Misteri, Thriller', '2024-12-29 19:13:30', '2024-12-29 19:13:30', 'the_prestige.jpg', 8.5, 'Dua pesulap abad ke-19 bersaing dalam pertarungan penuh tipu daya, pengorbanan, dan rahasia kelam.'),
(37, 'The Dark Knight Rises', 'Batman kembali untuk melawan ancaman baru, Bane, yang bertekad menghancurkan Gotham.', 'Aksi, Drama, Thriller', '2024-12-29 19:13:30', '2024-12-29 19:13:30', 'dark_knight_rises.jpg', 8.4, 'Bruce Wayne keluar dari pengasingan untuk melawan Bane, seorang teroris tangguh yang mengancam menghancurkan Gotham City.'),
(38, 'Joker', 'Kisah asal usul musuh bebuyutan Batman, seorang pria yang berubah menjadi penjahat setelah menghadapi penderitaan hidup.', 'Kejahatan, Drama, Thriller', '2024-12-29 19:13:30', '2024-12-29 19:13:30', 'joker.jpg', 8.4, 'Arthur Fleck, seorang komedian gagal, bertransformasi menjadi Joker setelah menghadapi pengkhianatan dan kekerasan di Gotham.'),
(39, 'Avengers: Infinity War', 'Avengers dan sekutu mereka berjuang melawan Thanos, yang mencari Batu Infinity untuk menghancurkan setengah kehidupan di alam semesta.', 'Aksi, Petualangan, Fiksi Ilmiah', '2024-12-29 19:13:30', '2024-12-29 19:13:30', 'infinity_war.jpg', 8.4, 'Para Avengers bersatu untuk mencegah Thanos mendapatkan Batu Infinity yang bisa menghancurkan setengah alam semesta.'),
(40, 'Avengers: Endgame', 'Para Avengers yang tersisa mencoba membalikkan kerusakan yang dilakukan oleh Thanos.', 'Aksi, Petualangan, Drama', '2024-12-29 19:13:30', '2024-12-29 19:13:30', 'endgame.jpg', 8.4, 'Para Avengers yang tersisa bekerja sama untuk mengalahkan Thanos dan mengembalikan kehidupan yang hilang.'),
(41, 'Coco', 'Seorang anak muda yang bermimpi menjadi musisi memasuki dunia orang mati untuk menemukan sejarah keluarganya.', 'Animasi, Petualangan, Komedi', '2024-12-29 19:13:30', '2024-12-29 19:13:30', 'coco.jpg', 8.4, 'Miguel, seorang anak muda pencinta musik, melakukan perjalanan magis ke dunia orang mati untuk membuka rahasia keluarganya.'),
(42, 'WALL-E', 'Robot pembersih sampah menemukan cinta dan menjalani petualangan di luar angkasa.', 'Animasi, Petualangan, Keluarga', '2024-12-29 19:13:30', '2024-12-29 19:13:30', 'wall_e.jpg', 8.4, 'WALL-E, robot kecil yang menyukai kebersihan, memulai petualangan luar angkasa bersama EVE, robot canggih dari masa depan.'),
(43, 'Inside Out', 'Kisah tentang emosi seorang gadis muda yang menghadapi perubahan besar dalam hidupnya.', 'Animasi, Petualangan, Komedi', '2024-12-29 19:13:30', '2024-12-29 19:13:30', 'inside_out.jpg', 8.3, 'Joy, Sadness, Anger, Fear, dan Disgust bekerja sama untuk membantu Riley menghadapi pindahan ke kota baru.'),
(44, 'Up', 'Seorang pria tua dan seorang anak laki-laki pergi dalam petualangan balon udara untuk memenuhi janji lama.', 'Animasi, Petualangan, Komedi', '2024-12-29 19:13:30', '2024-12-29 19:13:30', 'up.jpg', 8.3, 'Carl Fredricksen mengejar mimpinya bersama Russell, seorang anak pengintai yang penuh semangat.'),
(45, 'The Incredibles', 'Sebuah keluarga dengan kekuatan super kembali beraksi untuk melawan ancaman baru.', 'Animasi, Aksi, Petualangan', '2024-12-29 19:13:30', '2024-12-29 19:13:30', 'incredibles.jpg', 8.3, 'Bob Parr dan keluarganya mencoba menyeimbangkan kehidupan sehari-hari dengan misi superhero.'),
(46, 'Ratatouille', 'Seekor tikus berbakat memasak bermimpi menjadi koki di restoran terbaik Paris.', 'Animasi, Petualangan, Komedi', '2024-12-29 19:13:30', '2024-12-29 19:13:30', 'ratatouille.jpg', 8.3, 'Remy, tikus yang mencintai memasak, membuktikan bahwa siapa saja bisa menjadi koki.'),
(48, 'The Wolf of Wall Street', 'Kisah nyata Jordan Belfort, broker saham yang sukses namun korup.', 'Biografi, Komedi, Kejahatan', '2024-12-29 19:13:30', '2024-12-29 19:13:30', 'wolf_of_wall_street.jpg', 8.2, 'Jordan Belfort mengisahkan perjalanan bisnis dan gaya hidup mewahnya yang penuh skandal dan korupsi.'),
(49, 'Django Unchained', 'Seorang budak yang dibebaskan bekerja sama dengan pemburu bayaran untuk menyelamatkan istrinya.', 'Drama, Barat', '2024-12-29 19:13:30', '2024-12-29 19:13:30', 'django_unchained.jpg', 8.4, 'Django, seorang mantan budak, memulai misi penyelamatan yang penuh aksi dan ketegangan untuk menemukan istrinya.'),
(52, 'Forrest Gump', 'Kisah luar biasa seorang pria sederhana yang memiliki pengaruh besar pada sejarah Amerika.', 'Drama, Romansa', '2024-12-29 19:13:30', '2024-12-29 19:13:30', 'forrest_gump.jpg', 8.8, 'Forrest Gump, seorang pria dengan kecerdasan terbatas, menjalani kehidupan yang luar biasa dan penuh inspirasi.'),
(60, 'Star Wars: Episode IV - A New Hope', 'Pemberontakan melawan Kekaisaran dimulai dengan penyelamatan Putri Leia.', 'Aksi, Petualangan, Fiksi Ilmiah', '2024-12-29 19:13:30', '2024-12-29 19:13:30', 'new_hope.jpg', 8.6, 'Luke Skywalker dan teman-temannya memulai misi untuk menghancurkan Death Star dan mengalahkan Kekaisaran.'),
(66, 'Braveheart', 'Kisah William Wallace, seorang pahlawan Skotlandia yang memimpin pemberontakan melawan Inggris.', 'Biografi, Drama, Sejarah', '2024-12-29 19:13:30', '2024-12-29 19:13:30', 'braveheart.jpg', 8.4, 'William Wallace menginspirasi bangsanya untuk berjuang demi kemerdekaan dari tirani Inggris.'),
(67, 'The Truman Show', 'Seorang pria menemukan bahwa hidupnya adalah bagian dari acara televisi raksasa.', 'Komedi, Drama', '2024-12-29 19:13:30', '2024-12-29 19:13:30', 'truman_show.jpg', 8.2, 'Truman Burbank menyadari bahwa kehidupannya sepenuhnya diatur untuk hiburan jutaan orang.'),
(68, 'La La Land', 'Seorang pianis jazz dan seorang aktris bercita-cita tinggi jatuh cinta sambil mengejar mimpi mereka.', 'Komedi, Drama, Musik', '2024-12-29 19:13:30', '2024-12-29 19:13:30', 'la_la_land.jpg', 8.0, 'Sebastian dan Mia menghadapi tantangan cinta dan ambisi di Los Angeles.'),
(69, 'The Social Network', 'Kisah pendirian Facebook dan konflik yang mengikutinya.', 'Biografi, Drama', '2024-12-29 19:13:30', '2024-12-29 19:13:30', 'social_network.jpg', 7.8, 'Mark Zuckerberg menghadapi konflik hukum dan pribadi setelah menciptakan jejaring sosial terbesar di dunia.'),
(70, 'Mad Max: Fury Road', 'Perjalanan penuh aksi di dunia pasca-apokaliptik dengan mobil-mobil perang yang menakjubkan.', 'Aksi, Petualangan, Fiksi Ilmiah', '2024-12-29 19:13:30', '2024-12-29 19:13:30', 'mad_max_fury_road.jpg', 8.1, 'Max Rockatansky membantu Furiosa melarikan diri dari diktator tirani Immortan Joe.'),
(71, 'The Shining', 'Seorang pria yang bekerja di hotel terpencil mulai kehilangan kewarasannya akibat pengaruh supernatural.', 'Horor, Misteri, Thriller', '2024-12-29 19:13:30', '2024-12-29 19:13:30', 'the_shining.jpg', 8.4, 'Jack Torrance menjadi gila setelah bekerja di hotel yang dihantui dan terisolasi selama musim dingin.'),
(72, 'Citizen Kane', 'Kisah perjalanan hidup seorang pengusaha media yang terkenal, dimulai dari kematiannya.', 'Drama, Misteri', '2024-12-29 19:13:30', '2024-12-29 19:13:30', 'citizen_kane.jpg', 8.3, 'Kisah kompleks mengenai kehidupan Charles Foster Kane dan perjuangannya dalam dunia media dan politik.'),
(74, 'No Country for Old Men', 'Seorang pembunuh bayaran kejam memburu seorang pria yang menemukan uang hasil kejahatan.', 'Kejahatan, Drama, Thriller', '2024-12-29 19:13:30', '2024-12-29 19:13:30', 'no_country_for_old_men.jpg', 8.1, 'Chigurh, pembunuh bayaran tak kenal ampun, mengejar Llewelyn Moss yang menemukan uang hasil kejahatan.'),
(75, 'Memento', 'Seorang pria dengan ingatan jangka pendek berusaha memecahkan misteri pembunuhan istrinya.', 'Drama, Misteri, Thriller', '2024-12-29 19:13:30', '2024-12-29 19:13:30', 'memento.jpg', 8.4, 'Leonard Shelby berjuang mengatasi kehilangan ingatannya dan mencari pembunuh istrinya dengan petunjuk yang terbatas.'),
(77, 'The Big Lebowski', 'Seorang pria yang dikenal sebagai \"The Dude\" terlibat dalam kasus penculikan yang rumit dan penuh humor.', 'Komedi, Kejahatan', '2024-12-29 19:13:30', '2024-12-29 19:13:30', 'big_lebowski.jpg', 8.1, 'Jeffrey Lebowski, yang dijuluki \"The Dude\", terjebak dalam situasi yang penuh kekacauan dan komedi.'),
(78, 'The Revenant', 'Seorang pemburu yang terluka parah bertahan hidup di alam liar dan mencari balas dendam.', 'Aksi, Petualangan, Drama', '2024-12-29 19:13:30', '2024-12-29 19:13:30', 'revenant.jpg', 8.0, 'Hugh Glass berjuang untuk bertahan hidup di alam liar setelah diserang beruang dan dikhianati oleh rekan-rekannya.'),
(80, 'A Clockwork Orange', 'Seorang pemuda jahat melalui eksperimen kontroversial untuk rehabilitasi.', 'Drama, Kejahatan, Fiksi Ilmiah', '2024-12-29 19:13:30', '2024-12-29 19:13:30', 'clockwork_orange.jpg', 8.3, 'Alex DeLarge melakukan kekerasan, namun melalui terapi eksperimen yang brutal, ia mulai kehilangan kebebasannya.'),
(81, 'The Sixth Sense', 'Seorang anak yang dapat melihat orang mati berusaha mengungkapkan kebenaran tentang kemampuannya kepada seorang psikolog.', 'Drama, Misteri, Thriller', '2024-12-29 19:13:30', '2024-12-29 19:13:30', 'sixth_sense.jpg', 8.1, 'Cole Sear berjuang dengan penglihatannya yang bisa melihat orang mati, sementara Dr. Malcolm Crowe membantunya memahami apa yang terjadi.'),
(82, 'The Terminator', 'Seorang cyborg dari masa depan dikirim untuk membunuh wanita yang akan melahirkan pemimpin perlawanan masa depan.', 'Aksi, Fiksi Ilmiah, Thriller', '2024-12-29 19:13:30', '2024-12-29 19:13:30', 'terminator.jpg', 8.0, 'Seorang pembunuh cyborg dari masa depan dikirim untuk membunuh Sarah Connor, wanita yang akan melahirkan pemimpin perlawanan.'),
(83, 'The Princess Bride', 'Seorang pria berusaha menyelamatkan wanita yang dicintainya dari penjahat, dalam petualangan yang penuh humor dan keajaiban.', 'Aksi, Petualangan, Komedi', '2024-12-29 19:13:30', '2024-12-29 19:13:30', 'princess_bride.jpg', 8.1, 'Westley berusaha menyelamatkan Princess Buttercup dengan melawan penjahat dan monster dalam perjalanan yang penuh keajaiban.'),
(88, 'Moulin Rouge!', 'Seorang penulis muda jatuh cinta pada seorang penari di Paris yang penuh dengan drama dan musik.', 'Drama, Musik, Romansa', '2024-12-29 19:13:30', '2024-12-29 19:13:30', 'moulin_rouge.jpg', 8.0, 'Christian, seorang penulis muda, jatuh cinta pada Satine, seorang penari di cabaret Moulin Rouge.'),
(89, 'A Beautiful Mind', 'Kisah nyata seorang matematikawan jenius yang berjuang dengan gangguan mental.', 'Biografi, Drama', '2024-12-29 19:13:30', '2024-12-29 19:13:30', 'beautiful_mind.jpg', 8.2, 'John Nash berjuang dengan gangguan mental saat berusaha mempertahankan karier dan keluarganya.'),
(90, 'The Hunt', 'Seorang pria yang dijebak dalam tuduhan palsu berjuang untuk membersihkan namanya di tengah konspirasi besar.', 'Drama, Thriller', '2024-12-29 19:13:30', '2024-12-29 19:13:30', 'hunt.jpg', 8.3, 'Lucas berjuang untuk mengembalikan reputasinya setelah dituduh melakukan kejahatan yang tidak dilakukannya.'),
(93, 'The Great Dictator', 'Seorang pengusaha yang mirip dengan diktator yang menguasai dunia berusaha menyelamatkan dunia dari tirani.', 'Komedi, Drama', '2024-12-29 19:13:30', '2024-12-29 19:13:30', 'great_dictator.jpg', 8.4, 'Charlie Chaplin berperan sebagai seorang pengusaha yang mirip dengan seorang diktator yang berusaha mengubah dunia.'),
(96, 'The Godfather Part III', 'Kisah kelanjutan keluarga Corleone yang berjuang untuk melepaskan diri dari dunia kriminal.', 'Kejahtan, Drama, Kriminal', '2024-12-29 19:13:30', '2024-12-29 19:13:30', 'godfather_part_iii.jpg', 7.6, 'Michael Corleone berusaha keluar dari dunia kejahatan, tetapi terjebak dalam permasalahan keluarga yang tak terhindarkan.'),
(97, 'Blade Runner', 'Seorang detektif diminta untuk menangkap robot-robot manusia yang melarikan diri.', 'Aksi, Fiksi Ilmiah, Misteri', '2024-12-29 19:13:30', '2024-12-29 19:13:30', 'blade_runner.jpg', 8.1, 'Rick Deckard, seorang blade runner, ditugaskan untuk memburu dan \"pensiunkan\" replika manusia yang melarikan diri.'),
(99, 'Jaws', 'Sekelompok orang berjuang untuk bertahan hidup dari serangan hiu pemangsa yang menakutkan.', 'Petualangan, Drama, Horor', '2024-12-29 19:13:30', '2024-12-29 19:13:30', 'jaws.jpg', 8.0, 'Polisi, seorang ahli hiu, dan seorang pemburu laut berusaha menghentikan hiu besar yang meneror pantai.'),
(100, 'Schindler\'s List', 'Seorang pengusaha Jerman menyelamatkan ratusan orang Yahudi selama Holocaust.', 'Biografi, Drama, Sejarah', '2024-12-29 19:13:30', '2024-12-29 19:13:30', 'schindlers_list.jpg', 9.0, 'Oskar Schindler menyelamatkan banyak orang Yahudi dari kamp konsentrasi Nazi dengan risiko tinggi bagi dirinya sendiri.');

-- --------------------------------------------------------

--
-- Table structure for table `hybridfill`
--

CREATE TABLE `hybridfill` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `film_id` int(11) NOT NULL,
  `score` float NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hybridfill`
--

INSERT INTO `hybridfill` (`id`, `user_id`, `film_id`, `score`, `created_at`, `updated_at`) VALUES
(1635, 7, 99, 8.43333, '2025-01-26 19:17:07', '2025-01-26 19:17:07'),
(1636, 7, 13, 8.3, '2025-01-26 19:17:07', '2025-01-26 19:17:07'),
(1637, 7, 15, 8.3, '2025-01-26 19:17:07', '2025-01-26 19:17:07'),
(1638, 7, 39, 8.3, '2025-01-26 19:17:07', '2025-01-26 19:17:07'),
(1639, 7, 45, 8.3, '2025-01-26 19:17:07', '2025-01-26 19:17:07'),
(1640, 7, 60, 8.3, '2025-01-26 19:17:07', '2025-01-26 19:17:07'),
(1641, 7, 70, 8.3, '2025-01-26 19:17:07', '2025-01-26 19:17:07'),
(1642, 7, 28, 8.26, '2025-01-26 19:17:07', '2025-01-26 19:17:07'),
(1643, 7, 41, 8.23333, '2025-01-26 19:17:07', '2025-01-26 19:17:07'),
(1644, 7, 43, 8.23333, '2025-01-26 19:17:07', '2025-01-26 19:17:07'),
(1645, 7, 44, 8.23333, '2025-01-26 19:17:07', '2025-01-26 19:17:07'),
(1646, 7, 83, 8.2, '2025-01-26 19:17:07', '2025-01-26 19:17:07'),
(1647, 7, 12, 8.1, '2025-01-26 19:17:07', '2025-01-26 19:17:07'),
(1648, 7, 18, 8.1, '2025-01-26 19:17:07', '2025-01-26 19:17:07'),
(1649, 7, 11, 7.83333, '2025-01-26 19:17:07', '2025-01-26 19:17:07'),
(1650, 7, 23, 7.83333, '2025-01-26 19:17:07', '2025-01-26 19:17:07'),
(1651, 7, 35, 7.83333, '2025-01-26 19:17:07', '2025-01-26 19:17:07'),
(1652, 7, 52, 7.83333, '2025-01-26 19:17:07', '2025-01-26 19:17:07'),
(1653, 7, 72, 7.83333, '2025-01-26 19:17:07', '2025-01-26 19:17:07'),
(1654, 7, 90, 7.83333, '2025-01-26 19:17:07', '2025-01-26 19:17:07'),
(1655, 7, 36, 7.83333, '2025-01-26 19:17:07', '2025-01-26 19:17:07'),
(1656, 7, 75, 7.83333, '2025-01-26 19:17:07', '2025-01-26 19:17:07'),
(1657, 7, 80, 7.83333, '2025-01-26 19:17:07', '2025-01-26 19:17:07'),
(1658, 7, 81, 7.83333, '2025-01-26 19:17:07', '2025-01-26 19:17:07'),
(1659, 7, 88, 7.83333, '2025-01-26 19:17:07', '2025-01-26 19:17:07'),
(1660, 7, 49, 7.7, '2025-01-26 19:17:07', '2025-01-26 19:17:07'),
(1661, 7, 33, 7.63333, '2025-01-26 19:17:07', '2025-01-26 19:17:07'),
(1662, 7, 69, 7.63333, '2025-01-26 19:17:07', '2025-01-26 19:17:07'),
(1663, 7, 32, 7.3, '2025-01-26 19:17:07', '2025-01-26 19:17:07'),
(1664, 7, 40, 7.3, '2025-01-26 19:17:07', '2025-01-26 19:17:07'),
(1665, 7, 78, 7.3, '2025-01-26 19:17:07', '2025-01-26 19:17:07'),
(1666, 7, 48, 7.03333, '2025-01-26 19:17:07', '2025-01-26 19:17:07'),
(1667, 7, 5, 7.02, '2025-01-26 19:17:07', '2025-01-26 19:17:07'),
(1668, 7, 4, 6.76667, '2025-01-26 19:17:07', '2025-01-26 19:17:07'),
(1669, 7, 8, 6.76667, '2025-01-26 19:17:07', '2025-01-26 19:17:07'),
(1670, 7, 20, 6.76667, '2025-01-26 19:17:07', '2025-01-26 19:17:07'),
(1671, 7, 21, 6.76667, '2025-01-26 19:17:07', '2025-01-26 19:17:07'),
(1672, 7, 22, 6.76667, '2025-01-26 19:17:07', '2025-01-26 19:17:07'),
(1673, 7, 25, 6.76667, '2025-01-26 19:17:07', '2025-01-26 19:17:07'),
(1674, 7, 29, 6.76667, '2025-01-26 19:17:07', '2025-01-26 19:17:07'),
(1675, 7, 34, 6.76667, '2025-01-26 19:17:07', '2025-01-26 19:17:07'),
(1676, 7, 38, 6.76667, '2025-01-26 19:17:07', '2025-01-26 19:17:07'),
(1677, 7, 47, 6.76667, '2025-01-26 19:17:07', '2025-01-26 19:17:07'),
(1678, 7, 74, 6.76667, '2025-01-26 19:17:07', '2025-01-26 19:17:07'),
(1679, 7, 3, 6.75928, '2025-01-26 19:17:07', '2025-01-26 19:17:07'),
(1680, 7, 19, 6.72857, '2025-01-26 19:17:07', '2025-01-26 19:17:07'),
(1681, 7, 7, 6.63333, '2025-01-26 19:17:07', '2025-01-26 19:17:07'),
(1682, 7, 9, 6.63333, '2025-01-26 19:17:07', '2025-01-26 19:17:07'),
(1683, 7, 14, 6.63333, '2025-01-26 19:17:07', '2025-01-26 19:17:07'),
(1684, 7, 27, 6.63333, '2025-01-26 19:17:07', '2025-01-26 19:17:07'),
(1685, 7, 24, 6.3, '2025-01-26 19:17:07', '2025-01-26 19:17:07'),
(1686, 7, 37, 6.3, '2025-01-26 19:17:07', '2025-01-26 19:17:07'),
(1687, 7, 67, 6.3, '2025-01-26 19:17:07', '2025-01-26 19:17:07'),
(1688, 7, 68, 6.3, '2025-01-26 19:17:07', '2025-01-26 19:17:07'),
(1689, 7, 93, 6.3, '2025-01-26 19:17:07', '2025-01-26 19:17:07'),
(1690, 7, 96, 6.3, '2025-01-26 19:17:07', '2025-01-26 19:17:07'),
(1691, 7, 17, 5.83333, '2025-01-26 19:17:07', '2025-01-26 19:17:07'),
(1692, 7, 89, 5.83333, '2025-01-26 19:17:07', '2025-01-26 19:17:07'),
(1693, 7, 66, 5.6, '2025-01-26 19:17:07', '2025-01-26 19:17:07'),
(1694, 7, 100, 5.6, '2025-01-26 19:17:07', '2025-01-26 19:17:07'),
(1695, 7, 2, 5.23323, '2025-01-26 19:17:07', '2025-01-26 19:17:07'),
(1696, 7, 16, 4.5, '2025-01-26 19:17:07', '2025-01-26 19:17:07'),
(1697, 7, 71, 4.5, '2025-01-26 19:17:07', '2025-01-26 19:17:07'),
(1698, 7, 77, 4.5, '2025-01-26 19:17:07', '2025-01-26 19:17:07'),
(1699, 7, 82, 4.5, '2025-01-26 19:17:07', '2025-01-26 19:17:07'),
(1700, 7, 97, 4.5, '2025-01-26 19:17:07', '2025-01-26 19:17:07'),
(1701, 7, 31, 4.03333, '2025-01-26 19:17:07', '2025-01-26 19:17:07'),
(1772, 4, 77, 8.56, '2025-01-26 19:19:53', '2025-01-26 19:19:53'),
(1773, 4, 10, 8.26, '2025-01-26 19:19:53', '2025-01-26 19:19:53'),
(1774, 4, 93, 7.92, '2025-01-26 19:19:53', '2025-01-26 19:19:53'),
(1775, 4, 19, 7.87429, '2025-01-26 19:19:53', '2025-01-26 19:19:53'),
(1776, 4, 7, 7.76, '2025-01-26 19:19:53', '2025-01-26 19:19:53'),
(1777, 4, 9, 7.76, '2025-01-26 19:19:53', '2025-01-26 19:19:53'),
(1778, 4, 14, 7.76, '2025-01-26 19:19:53', '2025-01-26 19:19:53'),
(1779, 4, 27, 7.76, '2025-01-26 19:19:53', '2025-01-26 19:19:53'),
(1780, 4, 24, 7.76, '2025-01-26 19:19:53', '2025-01-26 19:19:53'),
(1781, 4, 89, 7.71294, '2025-01-26 19:19:53', '2025-01-26 19:19:53'),
(1782, 4, 46, 7.66, '2025-01-26 19:19:53', '2025-01-26 19:19:53'),
(1783, 4, 3, 7.6, '2025-01-26 19:19:53', '2025-01-26 19:19:53'),
(1784, 4, 32, 7.6, '2025-01-26 19:19:53', '2025-01-26 19:19:53'),
(1785, 4, 33, 7.6, '2025-01-26 19:19:53', '2025-01-26 19:19:53'),
(1786, 4, 37, 7.6, '2025-01-26 19:19:53', '2025-01-26 19:19:53'),
(1787, 4, 40, 7.6, '2025-01-26 19:19:53', '2025-01-26 19:19:53'),
(1788, 4, 78, 7.6, '2025-01-26 19:19:53', '2025-01-26 19:19:53'),
(1789, 4, 96, 7.6, '2025-01-26 19:19:53', '2025-01-26 19:19:53'),
(1790, 4, 2, 7.53143, '2025-01-26 19:19:53', '2025-01-26 19:19:53'),
(1791, 4, 4, 7.53143, '2025-01-26 19:19:53', '2025-01-26 19:19:53'),
(1792, 4, 8, 7.53143, '2025-01-26 19:19:53', '2025-01-26 19:19:53'),
(1793, 4, 17, 7.53143, '2025-01-26 19:19:53', '2025-01-26 19:19:53'),
(1794, 4, 21, 7.53143, '2025-01-26 19:19:53', '2025-01-26 19:19:53'),
(1795, 4, 22, 7.53143, '2025-01-26 19:19:53', '2025-01-26 19:19:53'),
(1796, 4, 47, 7.53143, '2025-01-26 19:19:53', '2025-01-26 19:19:53'),
(1797, 4, 66, 7.53143, '2025-01-26 19:19:53', '2025-01-26 19:19:53'),
(1798, 4, 68, 7.53143, '2025-01-26 19:19:53', '2025-01-26 19:19:53'),
(1799, 4, 100, 7.53143, '2025-01-26 19:19:53', '2025-01-26 19:19:53'),
(1800, 4, 20, 7.36, '2025-01-26 19:19:53', '2025-01-26 19:19:53'),
(1801, 4, 25, 7.36, '2025-01-26 19:19:53', '2025-01-26 19:19:53'),
(1802, 4, 29, 7.36, '2025-01-26 19:19:53', '2025-01-26 19:19:53'),
(1803, 4, 34, 7.36, '2025-01-26 19:19:53', '2025-01-26 19:19:53'),
(1804, 4, 38, 7.36, '2025-01-26 19:19:53', '2025-01-26 19:19:53'),
(1805, 4, 74, 7.36, '2025-01-26 19:19:53', '2025-01-26 19:19:53'),
(1806, 4, 48, 6.96, '2025-01-26 19:19:53', '2025-01-26 19:19:53'),
(1807, 4, 35, 6.16, '2025-01-26 19:19:53', '2025-01-26 19:19:53'),
(1808, 4, 41, 6.16, '2025-01-26 19:19:53', '2025-01-26 19:19:53'),
(1809, 4, 43, 6.16, '2025-01-26 19:19:53', '2025-01-26 19:19:53'),
(1810, 4, 44, 6.16, '2025-01-26 19:19:53', '2025-01-26 19:19:53'),
(1811, 4, 83, 6.16, '2025-01-26 19:19:53', '2025-01-26 19:19:53'),
(1812, 4, 88, 6.16, '2025-01-26 19:19:53', '2025-01-26 19:19:53'),
(1813, 4, 1, 6.06, '2025-01-26 19:19:53', '2025-01-26 19:19:53'),
(1814, 4, 42, 5.46, '2025-01-26 19:19:53', '2025-01-26 19:19:53'),
(1815, 4, 5, 4.56, '2025-01-26 19:19:53', '2025-01-26 19:19:53'),
(1816, 4, 11, 4.56, '2025-01-26 19:19:53', '2025-01-26 19:19:53'),
(1817, 4, 12, 4.56, '2025-01-26 19:19:53', '2025-01-26 19:19:53'),
(1818, 4, 13, 4.56, '2025-01-26 19:19:53', '2025-01-26 19:19:53'),
(1819, 4, 15, 4.56, '2025-01-26 19:19:53', '2025-01-26 19:19:53'),
(1820, 4, 16, 4.56, '2025-01-26 19:19:53', '2025-01-26 19:19:53'),
(1821, 4, 18, 4.56, '2025-01-26 19:19:53', '2025-01-26 19:19:53'),
(1822, 4, 23, 4.56, '2025-01-26 19:19:53', '2025-01-26 19:19:53'),
(1823, 4, 28, 4.56, '2025-01-26 19:19:53', '2025-01-26 19:19:53'),
(1824, 4, 36, 4.56, '2025-01-26 19:19:53', '2025-01-26 19:19:53'),
(1825, 4, 39, 4.56, '2025-01-26 19:19:53', '2025-01-26 19:19:53'),
(1826, 4, 45, 4.56, '2025-01-26 19:19:53', '2025-01-26 19:19:53'),
(1827, 4, 49, 4.56, '2025-01-26 19:19:53', '2025-01-26 19:19:53'),
(1828, 4, 52, 4.56, '2025-01-26 19:19:53', '2025-01-26 19:19:53'),
(1829, 4, 60, 4.56, '2025-01-26 19:19:53', '2025-01-26 19:19:53'),
(1830, 4, 70, 4.56, '2025-01-26 19:19:53', '2025-01-26 19:19:53'),
(1831, 4, 71, 4.56, '2025-01-26 19:19:53', '2025-01-26 19:19:53'),
(1832, 4, 72, 4.56, '2025-01-26 19:19:53', '2025-01-26 19:19:53'),
(1833, 4, 75, 4.56, '2025-01-26 19:19:53', '2025-01-26 19:19:53'),
(1834, 4, 80, 4.56, '2025-01-26 19:19:53', '2025-01-26 19:19:53'),
(1835, 4, 81, 4.56, '2025-01-26 19:19:53', '2025-01-26 19:19:53'),
(1836, 4, 82, 4.56, '2025-01-26 19:19:53', '2025-01-26 19:19:53'),
(1837, 4, 90, 4.56, '2025-01-26 19:19:53', '2025-01-26 19:19:53'),
(1838, 4, 97, 4.56, '2025-01-26 19:19:53', '2025-01-26 19:19:53'),
(1839, 4, 6, 3.63143, '2025-01-26 19:19:53', '2025-01-26 19:19:53'),
(1840, 4, 26, 3.06, '2025-01-26 19:19:53', '2025-01-26 19:19:53');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_12_04_045947_create_films_table', 1),
(6, '2024_12_04_051612_add_gambar_and_rating_to_films_table', 1),
(7, '2024_12_04_060838_add_sinopsis_to_films_table', 1),
(8, '2024_12_16_062124_create_user_ratings_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role` varchar(50) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `role`) VALUES
(3, 'Fajar Adha Fadillah', 'user10@gmail.com', NULL, '$2y$10$9lWhTFmFDLNpw/wg231DrO9VTnBSn1x4Lc074t2rvkOKk0520FvuS', NULL, '2025-01-19 07:14:03', '2025-01-19 07:14:03', 'user'),
(4, 'Fajar Adha Fadillah', 'user1@gmail.com', NULL, '$2y$10$PjtXhwNBZGfXm/J7rr0FKeFQhly1tymB83gt.T8HQwr2xvuI1FAQu', NULL, '2025-01-19 19:45:01', '2025-01-19 19:45:01', 'admin'),
(5, 'Fajar Adha Fadillah', 'fajaradhafadillah@gmail.com', NULL, '$2y$10$dIqCwkntubpzcm4znCSmVe3CtMPMJn2hOL697/Tk8VFfcVPBClAHG', NULL, '2025-01-24 14:50:11', '2025-01-24 14:50:11', 'user'),
(6, 'Fajar Adha Fadillah', 'fajaradhafadilla@gmail.com', NULL, '$2y$10$hd6vqWcSbWQOjEMzgPD3MOywqm0dCIbUjBn940XG/IhE8C.esz856', NULL, '2025-01-24 15:21:07', '2025-01-24 15:21:07', 'user'),
(7, 'Joy Aquila', 'user100@gmail.com', NULL, '$2y$10$k3PfgA7LkWQwrUn4m72VQOG23sPTfpAMeFWmxuA8qx7IvrqC2D1S2', NULL, '2025-01-26 06:30:05', '2025-01-26 06:30:05', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `user_ratings`
--

CREATE TABLE `user_ratings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `film_id` bigint(20) UNSIGNED NOT NULL,
  `rating` decimal(3,1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `comment` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_ratings`
--

INSERT INTO `user_ratings` (`id`, `user_id`, `film_id`, `rating`, `created_at`, `updated_at`, `comment`) VALUES
(2, 3, 1, 10.0, '2025-01-19 07:33:24', '2025-01-19 07:33:24', 'good'),
(3, 3, 2, 8.0, '2025-01-19 07:42:03', '2025-01-19 07:42:03', 'test'),
(4, 3, 3, 5.0, '2025-01-19 07:42:19', '2025-01-19 07:42:19', 'test'),
(5, 4, 99, 10.0, '2025-01-19 19:46:33', '2025-01-19 19:46:33', 'test'),
(6, 4, 31, 4.0, '2025-01-24 14:47:31', '2025-01-24 14:47:31', 'not good enough'),
(7, 4, 69, 10.0, '2025-01-24 14:48:53', '2025-01-24 14:48:53', 'test'),
(8, 5, 99, 1.0, '2025-01-24 14:51:15', '2025-01-24 14:51:15', 'test'),
(9, 6, 2, 1.0, '2025-01-26 05:25:09', '2025-01-26 05:25:09', 'test'),
(10, 6, 3, 10.0, '2025-01-26 05:35:33', '2025-01-26 05:35:33', 'test'),
(11, 6, 6, 10.0, '2025-01-26 05:40:16', '2025-01-26 05:40:16', 'test'),
(12, 6, 2, 1.0, '2025-01-26 05:56:15', '2025-01-26 05:56:15', 'test'),
(13, 6, 2, 1.0, '2025-01-26 05:58:44', '2025-01-26 05:58:44', 'test'),
(14, 6, 6, 1.0, '2025-01-26 06:00:20', '2025-01-26 06:00:20', 'test'),
(15, 6, 6, 1.0, '2025-01-26 06:01:37', '2025-01-26 06:01:37', 'test'),
(16, 6, 6, 10.0, '2025-01-26 06:03:11', '2025-01-26 06:03:11', 'tres'),
(17, 6, 1, 10.0, '2025-01-26 06:04:29', '2025-01-26 06:04:29', 'aaa'),
(18, 6, 5, 3.0, '2025-01-26 06:07:47', '2025-01-26 06:07:47', 'tres'),
(19, 4, 30, 4.0, '2025-01-26 06:28:43', '2025-01-26 06:28:43', 'gasuka'),
(20, 7, 30, 8.0, '2025-01-26 06:30:37', '2025-01-26 06:30:37', 'suka'),
(21, 7, 1, 10.0, '2025-01-26 06:31:20', '2025-01-26 06:31:20', 'suka'),
(22, 7, 10, 7.0, '2025-01-26 06:31:35', '2025-01-26 06:31:35', 'mayan'),
(23, 7, 26, 5.0, '2025-01-26 06:31:53', '2025-01-26 06:31:53', 'kurang'),
(24, 7, 1, 10.0, '2025-01-26 06:36:29', '2025-01-26 06:36:29', 'test'),
(25, 7, 6, 1.0, '2025-01-26 06:40:38', '2025-01-26 06:40:38', 'test'),
(26, 7, 46, 10.0, '2025-01-26 06:42:31', '2025-01-26 06:42:31', 'good'),
(27, 7, 42, 9.0, '2025-01-26 06:43:01', '2025-01-26 06:43:01', 'good'),
(28, 4, 67, 10.0, '2025-01-26 19:19:44', '2025-01-26 19:19:44', 'good');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `films`
--
ALTER TABLE `films`
  ADD PRIMARY KEY (`id`);
ALTER TABLE `films` ADD FULLTEXT KEY `title` (`title`,`description`,`genre`,`sinopsis`);

--
-- Indexes for table `hybridfill`
--
ALTER TABLE `hybridfill`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_id` (`user_id`,`film_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_ratings`
--
ALTER TABLE `user_ratings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_ratings_user_id_foreign` (`user_id`),
  ADD KEY `user_ratings_film_id_foreign` (`film_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `films`
--
ALTER TABLE `films`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `hybridfill`
--
ALTER TABLE `hybridfill`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1841;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user_ratings`
--
ALTER TABLE `user_ratings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `user_ratings`
--
ALTER TABLE `user_ratings`
  ADD CONSTRAINT `user_ratings_film_id_foreign` FOREIGN KEY (`film_id`) REFERENCES `films` (`id`),
  ADD CONSTRAINT `user_ratings_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
