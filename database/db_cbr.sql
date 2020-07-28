-- Adminer 4.7.5 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `tb_detail_kasus`;
CREATE TABLE `tb_detail_kasus` (
  `id_detail_kasus` int(11) NOT NULL AUTO_INCREMENT,
  `id_kasus` int(11) NOT NULL,
  `id_gejala` int(11) NOT NULL,
  PRIMARY KEY (`id_detail_kasus`),
  KEY `id_kasus` (`id_kasus`),
  KEY `id_gejala` (`id_gejala`),
  CONSTRAINT `tb_detail_kasus_ibfk_3` FOREIGN KEY (`id_kasus`) REFERENCES `tb_kasus` (`id_kasus`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `tb_detail_kasus_ibfk_4` FOREIGN KEY (`id_gejala`) REFERENCES `tb_gejala` (`id_gejala`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `tb_gejala`;
CREATE TABLE `tb_gejala` (
  `id_gejala` int(11) NOT NULL AUTO_INCREMENT,
  `kd_gejala` varchar(10) NOT NULL,
  `nm_gejala` varchar(255) NOT NULL,
  PRIMARY KEY (`id_gejala`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `tb_gejala` (`id_gejala`, `kd_gejala`, `nm_gejala`) VALUES
(1,	'G12',	'Timbulnya benjolan apabila mengejan, batuk, berdiri, berjalan dan menangis (pada anak-anak)'),
(2,	'G01',	'Nyeri bisa dirasakan atau tidak'),
(3,	'G22',	'Adanya sebuah benjolan di pusar'),
(4,	'G13',	'Benjolan hilang saat bersitirahat'),
(5,	'G02',	'Rewel saat benjolan muncul dan tenang saat benjolan menghilang'),
(6,	'G03',	'Benjolan lunak ketika ditekan'),
(7,	'G04',	'Riwayat keluarga'),
(8,	'G23',	'Tonjolan di pangkal paha'),
(9,	'G05',	'Rasa terbakar, dan pegal pada tonjolan'),
(10,	'G24',	'Benjolan muncul terutama saat aktifitas bekerja'),
(11,	'G14',	'Pembengkakan disekitar testis ketika usus yang menonjol ke strotum'),
(12,	'G06',	'Kelemahan atau ada tekanan di pangkal paha anda'),
(15,	'G07',	'Adanya nyeri pada benjolan'),
(16,	'G15',	'Nyeri mulai dari pantat menjalar ke lutut kemudian ke tungkai bawah'),
(17,	'G16',	'Nyeri atau benjolan berkurang ketika beristirahat'),
(18,	'G08',	'Benjolan tidak selalu terlihat atau benjolan muncul tiba-tiba'),
(19,	'G09',	'Benjolan di area sekitar selangkangan');

DROP TABLE IF EXISTS `tb_gejala_penyakit`;
CREATE TABLE `tb_gejala_penyakit` (
  `id_gejala_penyakit` int(11) NOT NULL AUTO_INCREMENT,
  `id_penyakit` int(11) NOT NULL,
  `id_gejala` int(11) NOT NULL,
  `bobot` tinyint(4) NOT NULL,
  PRIMARY KEY (`id_gejala_penyakit`),
  KEY `id_penyakit` (`id_penyakit`),
  KEY `id_gejala` (`id_gejala`),
  CONSTRAINT `tb_gejala_penyakit_ibfk_1` FOREIGN KEY (`id_penyakit`) REFERENCES `tb_penyakit` (`id_penyakit`) ON DELETE CASCADE,
  CONSTRAINT `tb_gejala_penyakit_ibfk_2` FOREIGN KEY (`id_gejala`) REFERENCES `tb_gejala` (`id_gejala`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `tb_gejala_penyakit` (`id_gejala_penyakit`, `id_penyakit`, `id_gejala`, `bobot`) VALUES
(1,	1,	1,	3),
(2,	1,	2,	1),
(3,	1,	3,	5),
(4,	1,	4,	3),
(5,	1,	5,	1),
(6,	1,	6,	1),
(7,	1,	7,	1),
(8,	2,	8,	5),
(9,	2,	9,	1),
(10,	2,	10,	5),
(11,	2,	11,	3),
(12,	2,	12,	1),
(13,	2,	7,	1),
(14,	3,	10,	5),
(15,	3,	15,	1),
(16,	3,	16,	3),
(17,	3,	17,	3),
(18,	3,	18,	1),
(19,	3,	19,	5),
(20,	3,	7,	1);

DROP TABLE IF EXISTS `tb_kasus`;
CREATE TABLE `tb_kasus` (
  `id_kasus` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `tgl_kasus` datetime NOT NULL,
  `id_penyakit` int(11) DEFAULT NULL,
  `kemiripan` double DEFAULT NULL,
  `keterangan` text,
  PRIMARY KEY (`id_kasus`),
  KEY `id_penyakit` (`id_penyakit`),
  KEY `id_user` (`id_user`),
  CONSTRAINT `tb_kasus_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tb_user` (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `tb_penyakit`;
CREATE TABLE `tb_penyakit` (
  `id_penyakit` int(11) NOT NULL AUTO_INCREMENT,
  `kd_penyakit` varchar(10) NOT NULL,
  `nm_penyakit` varchar(50) NOT NULL,
  `keterangan` text NOT NULL,
  `solusi` text NOT NULL,
  PRIMARY KEY (`id_penyakit`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `tb_penyakit` (`id_penyakit`, `kd_penyakit`, `nm_penyakit`, `keterangan`, `solusi`) VALUES
(1,	'P01',	'Hernia Umbilicalis ',	'Hernia yang terjadi di pusar',	'Untuk orang dewasa harus dilakukan pembedahan sebagai bentuk penanganannya. Sedangkan hernia umbilikalis yang terjadi pada anak-anak, biasanya akan menghilang seiring bertambahnya usia, tanpa memerlukan tindakan pembedahan. Namun, anak-anak dengan hernia umbilikalis yang memiliki defek yang besarnya lebih dari 1 cm, kecil kemungkinan bisa menutup sendiri sehingga membutuhkan tindakan pembedahan. Nah, jika anak Anda memiliki pusar yang menonjol sebaiknya Anda tidak perlu langsung merasa cemas. Tonjolan yang timbul di sekitar pusar ini biasanya akan mengecil seiring dengan bertambahnya umur. Namun, bagi Anda dengan kondisi khusus yang memiliki hernia umbilikalis hingga usia dewasa dianjurkan untuk segera memeriksakannya ke dokter untuk mendapatkan penanganan lebih lanjut.'),
(2,	'P02',	'Hernia Inguinalis ',	'Hernia yang terjadi dipangkal paha',	'Hernia inguinalis bisa ditangani melalui prosedur operasi. Prosedur ini dilakukan untuk memasukkan kembali organ atau usus yang menonjol dan menguatkan bagian dinding perut yang lemah.\r\nTujuan dari operasi hernia inguinalis adalah untuk mengatasi keluhan, mencegah muncul atau kambuhnya hernia, dan mencegah komplikasi.\r\n'),
(3,	'P03',	'Hernia Femoralis ',	'Dokter dapat menduga pasien menderita hernia femoralis melalui pemeriksaan fisik pada area selangkangan. Pada umumnya, dokter dapat merasakan adanya benjolan bila ukuran hernia cukup besar. Bila pasien diduga kuat mengalami hernia femoralis, namun benjolan tidak ditemukan pada pemeriksaan fisik, dokter dapat menjalankan pemeriksaan foto Rontgen, USG, atau CT scan pada area selangkangan.',	'Pada umumnya, hernia femoralis yang berukuran kecil dan tidak menimbulkan gejala apa pun, tidak memerlukan penanganan khusus. Namun demikian, dokter akan terus memantau perkembangan kondisi pasien. Adapun untuk hernia berukuran sedang hingga besar, dokter akan menjalankan prosedur operasi, terutama bila hernia yang dialami menyebabkan nyeri.\r\nOperasi hernia dapat dilakukan secara terbuka atau laparoskopi (operasi lubang kunci), dengan terlebih dahulu memberi bius umum (bius total) pada pasien. Tujuan dari kedua metode ini adalah untuk mengembalikan hernia ke posisinya semula. Kemudian, pintu dari kanalis femoralis akan dijahit dan diperkuat dengan jaring sintetis (mesh) guna mencegah hernia kambuh.\r\nPencegahan Hernia Femoralis\r\n \r\n1.	Mengkonsumsi makanan kaya akan serat \r\n2.	Menghindari mengangkat beban yang terlalu berat atau melakukannya dengan perlahan \r\n3.	Menghentikan kebiasaan merokok \r\n4.	Menjaga berat badan agar tetap batasan ideal dan sehat\r\n\r\nSaran pengobatan Hernia Femoralis:\r\n1.	Hernia inguinalis bisa ditangani melalui prosedur operasi untuk mendorong kembali benjolan dan untuk menguatkan bagian-bagian lemah dari dinding abdomen.Prosedur ini akan dilakukan jika hernia menyebabkan gejala yang cukup parah dan jika muncul komplikasi yang cukup serius.	\r\n2.	Bedah terbuka. Disini, dokter akan mendorong benjolan hernia inguinalis kembali ke dalam perut melalui melalui sayatan besar.  \r\n3.	Laporaskopi atau operasi lubang kunci. Dalam teknik ini,dokter bedah akan membuat beberapa sayatan kecil di bagian perut. Melalui beberapa sayatan,dokter akan memasukkan alat yang disebut laparoskop, yaitu sebuah selang kecil pada bagian ujungnya. Kamera akan memperlihatkan kondisi didalam perut pada sebuah monitor. Melalui panduan kamere ini,dokter kemudian akan memasukkan alat-alat beda khusus melalui lubang sayatan 	lainnya untuk menarik hernia kembali ke tempatnya.\r\n');

DROP TABLE IF EXISTS `tb_user`;
CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nm_lengkap` varchar(50) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jk` varchar(20) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `nohp` varchar(15) NOT NULL,
  `pekerjaan` varchar(100) NOT NULL,
  `level` enum('Admin','Member') NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `tb_user` (`id_user`, `username`, `password`, `nm_lengkap`, `tgl_lahir`, `jk`, `alamat`, `nohp`, `pekerjaan`, `level`) VALUES
(1,	'locygebyte',	'56de48825b002939979921f9ea0c9033',	'Proident illo tempo',	'2000-10-27',	'Perempuan',	'Sunt consequuntur ip',	'Et quasi alias ',	'Earum irure cumque a',	'Member'),
(2,	'buxuryf',	'56de48825b002939979921f9ea0c9033',	'Tempora dolorum repr',	'2000-11-27',	'Perempuan',	'Atque nulla deserunt',	'Eos ullam quod ',	'Rerum sint veritatis',	'Member'),
(3,	'madam',	'38d43ac2ed7bcd14d55fc5c99214cf5c',	'Illo tenetur aliquid',	'2000-06-30',	'Perempuan',	'Exercitationem assum',	'Obcaecati at do',	'Quo obcaecati ut par',	'Member');

-- 2020-07-28 08:46:19
