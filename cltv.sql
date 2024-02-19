-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 19, 2024 at 08:36 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cltv`
--

-- --------------------------------------------------------

--
-- Table structure for table `registrant`
--

CREATE TABLE `registrant` (
  `id` int(50) NOT NULL,
  `qr_code` varchar(100) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `branch` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `no_hp` varchar(30) NOT NULL,
  `moh_id` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `registrant`
--

INSERT INTO `registrant` (`id`, `qr_code`, `name`, `email`, `branch`, `password`, `no_hp`, `moh_id`, `updated_at`, `created_at`) VALUES
(1, 'A24100', 'Abraham Rendy', 'abrahamrendyh@gmail.com', 'NextGen Pusat', '$2y$10$nx1OPerbcDvk0CXdGQ4Qje1/mAnqEbR2DkMvCGuTCvzIVFOS1T.mS', '08986806006', NULL, '2024-02-19 06:29:45', '2024-02-19 06:29:45'),
(2, 'A24101', 'Agnes Felisha', 'agnesfelisha1@gmail.com', 'Legacy', '$2y$10$vNxJcgjStbN2G4KVPyQFUut8SVIH.Pc7pSS8HMPEG4U5wWOYNdNTa', '08987836007', NULL, '2024-02-19 06:29:45', '2024-02-19 06:29:45'),
(3, 'A24102', 'Anastasia Stephanie', 'anastasiastephanie94@gmail.com', 'Legacy', '$2y$10$6LQWvTBoKcncgzQKpOQvpeJQCdtt5H8ZDLteDpAELGrhE0WYA.w4y', '085860397870', NULL, '2024-02-19 06:29:45', '2024-02-19 06:29:45'),
(4, 'D24103', 'Delvina Paulin', 'Delvinapaulin97@gmail.com', 'Legacy', '$2y$10$5lCBomN4gX2dpxMzEgNRGuxvKGKx4h3LZ16NrH3eVCbNuxsHlUD02', '081224628547', NULL, '2024-02-19 06:29:45', '2024-02-19 06:29:45'),
(5, 'I24104', 'Ivan Ferianto Efendi', 'ivanferiantoefendi@gmail.com', 'Legacy', '$2y$10$xDV5mfMW4/A28xw0PqdDxeec0F./bBQw7gc8AaIh/2IsmTO5.tFyS', '081913930263', NULL, '2024-02-19 06:29:45', '2024-02-19 06:29:45'),
(6, 'I24105', 'Ivan Silvanus', 'ivan.8team@gmail.com', 'Legacy', '$2y$10$tRntmXzaqL2lEooWpmWiI.r8NJ/lSBQPmcIXqByiZmM/MJz0lPnxi', '082266886800', NULL, '2024-02-19 06:29:45', '2024-02-19 06:29:45'),
(7, 'J24106', 'Janice Dominique Raquel', 'janicedominique97@gmail.com', 'Legacy', '$2y$10$B3q0/q32KmR3wpepZC.hUe4FnCUL03pPjSv7pwp3dwNSIrcWYvcia', '081809220197', NULL, '2024-02-19 06:29:45', '2024-02-19 06:29:45'),
(8, 'J24107', 'Jefta Marvel Johanes', 'marveljefta@gmail.com', 'Legacy', '$2y$10$RzR9WdTf3LO3xKD3Gf1Bx.jf7MnsOkX0YLmzNFTLK8K3Y0Bdjxnhm', '085795389629', NULL, '2024-02-19 06:29:45', '2024-02-19 06:29:45'),
(9, 'O24108', 'Oktoria Irawati', 'oktha_acc@yma.com', 'Legacy', '$2y$10$ehWuhS9yk0KV0Z/kmPx2xudxYm9Leh5huc36AdxhOZwniLQLXebHa', '089613784291', NULL, '2024-02-19 06:29:45', '2024-02-19 06:29:45'),
(10, 'S24109', 'Stefanus Lazuardi Martono', 'lazuardistefanus@gmail.com', 'Legacy', '$2y$10$Gqwhgyk9SVXfTkAjz1ZWE.1oGW6WjLA.IoeD5649JU/2l8fLJE4Zq', '087781021451', NULL, '2024-02-19 06:29:45', '2024-02-19 06:29:45'),
(11, 'C24110', 'Cheryl Ryvi', 'cherylryvi@gmail.com', 'NextGen Aruna', '$2y$10$UIUp3W8Ss6vikIcTZZ.lmO.6qIl7OoCUiY9DGahAoHNgJo/W8Cce6', '08112313232', NULL, '2024-02-19 06:29:45', '2024-02-19 06:29:45'),
(12, 'G24111', 'Grace Angel So', 'graceangelso68062@gmail.com', 'NextGen Aruna', '$2y$10$CuQMxR7dtOve9MgezugfjuLgXiImLSPxmmts0SHKZwcnjX7GyAZJK', '081807103285', NULL, '2024-02-19 06:29:45', '2024-02-19 06:29:45'),
(13, 'J24112', 'Jason Edward Christian', 'jasonedwardch@gmail.com', 'NextGen Aruna', '$2y$10$JCqTiVeict273RF4vwMkfeUhrSi5CHF//7YfPdNqElc5YiacSywvO', '0811220606', NULL, '2024-02-19 06:29:45', '2024-02-19 06:29:45'),
(14, 'J24113', 'Jeconia Calista Cahyani ', 'Jeconia Calista Cahyani ', 'NextGen Aruna', '$2y$10$2Gq9fS2qXUtWhycevmzInewUfLYUfPWbnr3jikrocoFx2LnCfFA0O', '081274081817', NULL, '2024-02-19 06:29:46', '2024-02-19 06:29:46'),
(15, 'L24114', 'Leonora Odelia', 'leonoraodelia168@gmail.com', 'NextGen Aruna', '$2y$10$juAPT9xqGMuOSjo6FhZKUuIbbIuGneL84d.AJbA8ofq6ahkuxEZhO', '08112332388', NULL, '2024-02-19 06:29:46', '2024-02-19 06:29:46'),
(16, 'M24115', 'Melvin', 'tanmelvin2003@gmail.com', 'NextGen Aruna', '$2y$10$6T2qaErIH3swfRzs3FBRC.Qt0ywxWNehqw6bgOLgUrLJl0PfRxZiu', '081324385508', NULL, '2024-02-19 06:29:46', '2024-02-19 06:29:46'),
(17, 'N24116', 'Natasha Davina Hadinoto', 'hadinoto.natasha@gmail.com', 'NextGen Aruna', '$2y$10$cDTNxbuhJNkax945aMCTPuEAhytB7CQdeSKN/cTFrQqhuRRR005Ja', '082120541360', NULL, '2024-02-19 06:29:46', '2024-02-19 06:29:46'),
(18, 'R24117', 'Rachel Christhania Emmanuelle', 'rchristhania11@gmail.com', 'NextGen Aruna', '$2y$10$xT/EzvGadmAAYGeRlti3.OTvL0evJs2XSyGinWMzG4KaWabGTR8Cm', '0817110555', NULL, '2024-02-19 06:29:46', '2024-02-19 06:29:46'),
(19, 'R24118', 'Rivana Thania Kosandra', 'rivanathania7@gmail.com', 'NextGen Aruna', '$2y$10$t38mb4E42sBdPxlX4dTVnuDOm3kofH7fsOR3rp55AD4VNhE41IwOW', '087824280668', NULL, '2024-02-19 06:29:46', '2024-02-19 06:29:46'),
(20, 'T24119', 'Troy Alexander Abednego', 'troyalexanderr24@gmail.com', 'NextGen Aruna', '$2y$10$WMlZT5Kimd3lDSCjlobKTutfojLUGqnlTf3CUL5mnEuDYOFFXLAH.', '085179705305', NULL, '2024-02-19 06:29:46', '2024-02-19 06:29:46'),
(21, 'Y24120', 'Yulyanani', 'yyulianani@gmail.com', 'NextGen Aruna', '$2y$10$.rfKTRYBTLdcDwQhjJR9uOJ4KxnsVIelW10HGqMUxFuu5Ru3kUq4K', '087824998978', NULL, '2024-02-19 06:29:46', '2024-02-19 06:29:46'),
(22, 'C24121', 'Callista Priscilia', 'callistapriscila29@gmail.com', 'NextGen Baranangsiang', '$2y$10$F4FAaeCJiqyLFPpcvZJ6neFCOavQzlckPV70jG1Z4gF2791dyA2HS', '082126431138', NULL, '2024-02-19 06:29:46', '2024-02-19 06:29:46'),
(23, 'J24122', 'Jason Renata', 'jasonrenata03@gmail.com', 'NextGen Baranangsiang', '$2y$10$cjaUsZ/aBLrLPFh9aadzCuf.UH01XXYuyZfllBjrJ7BnpY5gNxetK', '081394698750', NULL, '2024-02-19 06:29:46', '2024-02-19 06:29:46'),
(24, 'M24123', 'Melvita Raphael Augusty', 'Melvitaraphael@gmail.com', 'Nextgen Baranangsiang', '$2y$10$2QxsRmi8xlgPLXDp5m7hZ.Dd2DoPJ1p70CrOpDYdC5M6En9KMGq/u', '082121456830', NULL, '2024-02-19 06:29:46', '2024-02-19 06:29:46'),
(25, 'P24124', 'Priskila Victoria', 'victoriapriskila78@gmail.com', 'NextGen Baranangsiang', '$2y$10$ve89.j8fauit7QnSAQpQWOrt9FCKngaL3JfeVu.HxRkB8Cb6oO/IC', '081320618978', NULL, '2024-02-19 06:29:46', '2024-02-19 06:29:46'),
(26, 'S24125', 'Sancta Adelynn Cardoso Trindade', 'sact048@gmail.com', 'NextGen Baranangsiang', '$2y$10$Vp1TP6oibKsgFo9F6Ut5X.VUUAvqSiNM6Mjcye/utF.sG2/io7Kdq', '081276101719', NULL, '2024-02-19 06:29:46', '2024-02-19 06:29:46'),
(27, 'C24126', 'Clarisa Jesika Korina Tm.H', 'jesikaclarisa1@gmail.com', 'NextGen Dago', '$2y$10$FyFTr9vG0SXnwr8pccoQC.T5OH8OjEWOonzIpd7VJvnkwU19X6DuO', '089646401022', NULL, '2024-02-19 06:29:46', '2024-02-19 06:29:46'),
(28, 'R24127', 'Rhaylandieqa Alva', 'rhaylandieqaalva@gmail.com', 'NextGen Dago', '$2y$10$33atx/ZjUiC3q0m7XbtVQu31FnMAHgL25LYRDwac2GvL5q1zLHfdm', '0895400264461', NULL, '2024-02-19 06:29:46', '2024-02-19 06:29:46'),
(29, 'S24128', 'Shierien Novita', 'novitashierien@gmail.com', 'NextGen Harris', '$2y$10$nQMr2OSqHa/KU2evKYh8WOEsnB.CzGNWiN2sJIZ.jnWIxT9517Je.', '089608516153', NULL, '2024-02-19 06:29:46', '2024-02-19 06:29:46'),
(30, 'T24129', 'Tabita Evelyn Defendy', 'tabita.defendy@gmail.com', 'NextGen Harris', '$2y$10$fvsffi8Y6o4apMxU6UNO4.FI9S3YJOvfQtJu4va.xYZdnMFe.Oa9e', '+60167195694', NULL, '2024-02-19 06:29:46', '2024-02-19 06:29:46'),
(31, 'V24130', 'Valent Joseta', 'valentjo1809@gmail.com', 'NextGen Harris', '$2y$10$stW4e6oUHnNcjehU/Yx8nOVj1KOjCQrnrEcGAdL5F.2PsodmYCr4q', '082216133202', NULL, '2024-02-19 06:29:47', '2024-02-19 06:29:47'),
(32, 'Y24131', 'Yohana Imannuel', 'Yohana.imannuel91099@gmail.com', 'NextGen Harris', '$2y$10$2COHlHxOL0a6jrH1rwp6/eWm9a7YRcemQvYPVENbVXrdt3UR13RUK', '081220505831', NULL, '2024-02-19 06:29:47', '2024-02-19 06:29:47'),
(33, 'F24132', 'Felicia Giovanni Tjandra ', 'vannitjandra@gmail.com', 'NextGen Kopo', '$2y$10$AsG37RtzryRDolJaX0NkSep9p0cga98vIm8Y1NJ8jWNULgjPQQJ6q', '089655777763', NULL, '2024-02-19 06:29:47', '2024-02-19 06:29:47'),
(34, 'P24133', 'Lim Priska Yuliani', 'priskayuliani27@gmail.com', 'NextGen Kopo', '$2y$10$gCIaImbrCBSr3GWzCvt/Reos8HYqmKj1NHimMOPfefoasQ9HRywlq', '08996868523', NULL, '2024-02-19 06:29:47', '2024-02-19 06:29:47'),
(35, 'M24134', 'Melina Cahyani Herman ', 'melinacahyani26@gmail.com', 'NextGen Kopo', '$2y$10$za4MrWiylx2kEEJktKhQSuJqERVZL5bIejtqiU/xAyA6/QbHCaa5S', '085841902517', NULL, '2024-02-19 06:29:47', '2024-02-19 06:29:47'),
(36, 'S24135', 'Stephanie Claresta Hidayat', 'stephanieclaresta@gmail.com', 'NextGen Kopo', '$2y$10$RsWalKiRHED9MZM3aGjsQ.di3QZUGapdb7b8KtfTNZy./L5WU5Zqu', '089656511129', NULL, '2024-02-19 06:29:47', '2024-02-19 06:29:47'),
(37, 'C24137', 'Catherine Angelina Husein', 'Catherineangel2112@gmail.com', 'NextGen Pusat', '$2y$10$c.aoIirgPVYU2sT4p1.dEeq8jMtggouCM3TkZo4RSjnIcKizB5XHC', '087737073907', NULL, '2024-02-19 06:29:47', '2024-02-19 06:29:47'),
(38, 'C24138', 'Clarissa Efendi', 'clarissaefendi31@gmail.com', 'NextGen Pusat', '$2y$10$REYaHB8QGmaKu1Blx1bAaObKa.3qavAHKb/Q89hve4k78BA8cucqe', '082126387722', NULL, '2024-02-19 06:29:47', '2024-02-19 06:29:47'),
(39, 'E24139', 'Evan Hans Christian', 'evanhanschristian17@gmail.com', 'NextGen Pusat', '$2y$10$Wei9yzyhpaNkdetenAujAOLyltvwoo9iHeALRUwCsDkFbaRZXF.TW', '082117100795', NULL, '2024-02-19 06:29:47', '2024-02-19 06:29:47'),
(40, 'J24140', 'Jeremia Firdaus', 'jeremiafirdaus11@gmail.com', 'NextGen Pusat', '$2y$10$pXLp5gOp064z6dndOv3J5eXeBSepxAanCLQfbC6WFof5KbG69bsH.', '085720857203', NULL, '2024-02-19 06:29:47', '2024-02-19 06:29:47'),
(41, 'M24141', 'Morris Benedick Adriyanto ', 'morrisbenedick@gmail.com', 'NextGen Pusat', '$2y$10$iUmmVICwuT3ECuYRNynprOQUG5S1bBOaEZGJcpWqFBMZM3CXbYpCC', '083822092543', NULL, '2024-02-19 06:29:47', '2024-02-19 06:29:47'),
(42, 'R24142', 'Rachel Christina', 'rachelchristina10@gmail.com', 'NextGen Pusat', '$2y$10$C2ZizhEYgU7afqOx3Dxr7.o.aBVtfxqr7GKyHVgVkwd3JLQheIaUW', '085157223940', NULL, '2024-02-19 06:29:47', '2024-02-19 06:29:47'),
(43, 'R24143', 'Rovelino Nathaniel', 'rovelinonathaniel123@gmail.com', 'NextGen Pusat', '$2y$10$y4vF0XB401FY9XlMlMGvBul88L9swpWb1kfuU.pKxoDn4V37NR7oW', '081322751896', NULL, '2024-02-19 06:29:47', '2024-02-19 06:29:47'),
(44, 'V24144', 'Vinsensius Willson Limantoro', 'vinsensiuswillson.vw@gmail.com', 'NextGen Pusat', '$2y$10$TJ9u7.d3UOyP3QWsLIi8h.LuPqKGjgHlaoqRp66eG.EAHMZa6rAc2', '08112277433', NULL, '2024-02-19 06:29:47', '2024-02-19 06:29:47'),
(45, 'A24145', 'Alvin Satrio Wibowo', 'alvinsatriowibowo@gmail.com', 'NextGen Regency', '$2y$10$gQhcmlbhsBBhk5SDXmbFR.FhKvnALPmmi8kpmU1nZWqaK5x9hJYjm', '089620760219', NULL, '2024-02-19 06:29:47', '2024-02-19 06:29:47'),
(46, 'C24146', 'Celine Theresa Wijaya', 'celinetheresawijaya@gmail.com', 'Nextgen Regency', '$2y$10$YKJWYkiwu4J2KuEHuQIjd.sk0com5pZlXqnfE1Fa4dzZB9JJ1gCNa', '081322051191', NULL, '2024-02-19 06:29:47', '2024-02-19 06:29:47'),
(47, 'D24147', 'Daryl Claudio', 'darylclaudio2805@gmail.com', 'NextGen Regency', '$2y$10$fOci9uG/cY5Ga1bMtmKxzu0ss7/ad2xVpwdyr2WNrS/r.5ht4kTTq', '082121771339', NULL, '2024-02-19 06:29:47', '2024-02-19 06:29:47'),
(48, 'D24148', 'Denisius Elia Chandra', 'Denis0553@gmail.com', 'NextGen Regency', '$2y$10$zKoCoTrzCz2ZfNeWAanmaevQVbm4bwu8rjTrRm4upvCUY5/83hm8.', '087709037427', NULL, '2024-02-19 06:29:47', '2024-02-19 06:29:47'),
(49, 'F24149', 'Felix Daniel Budiman ', 'feldan1001@gmail.com', 'NextGen Regency', '$2y$10$6woFIfD/YZQtSj7uyG12CudGVohvzrEtVWdtoKIfZq2IPCIhuWJ/y', '0895389890303', NULL, '2024-02-19 06:29:48', '2024-02-19 06:29:48'),
(50, 'G24150', 'Gabriela Maharani Putri', 'gabriela.maharani@ymail.com', 'NextGen Regency', '$2y$10$ol0DyPU/Ew7dwre64qGNfeuHFnXHgmEQOv5k6SkTGl7o/.t88OWHK', '087821222636', NULL, '2024-02-19 06:29:48', '2024-02-19 06:29:48'),
(51, 'G24151', 'Gloria Abigail Hadasali', 'glo.abigail98@gmail.com', 'NextGen Regency', '$2y$10$O7Hdaj1kJ3QjRlvigBs0ketPCuoJaAFJpbX2R6W7aSlvkm9/AGCci', '087823166298', NULL, '2024-02-19 06:29:48', '2024-02-19 06:29:48'),
(52, 'K24152', 'Katherine Elovani Br Sipayung', 'katherineelovani1@gmail.com', 'NextGen Regency', '$2y$10$U1ViMd6/K6en8.KKKtUYQOH3vgYB/XYIKXbhiK4cBVfgKpRzwkHA.', '085314678277', NULL, '2024-02-19 06:29:48', '2024-02-19 06:29:48'),
(53, 'L24153', 'Laurine Cecilia', 'laurinececilia@gmail.com ', 'NextGen Regency', '$2y$10$PfphVyp/QHRkSMEm4Nh.jOnly1GSxhAUgNnPWyYGkqR1m.W1U66s2', '081222174440', NULL, '2024-02-19 06:29:48', '2024-02-19 06:29:48'),
(54, 'S24154', 'Steffi Christiana Wijaya', 'steffichristiana1410@gmail.com', 'NextGen Regency', '$2y$10$.O8oZHyFdY83Y6YqQT9Yquly5/zYS0qeyg2ML99ORo7icvNk0H9Ha', '081122220922', NULL, '2024-02-19 06:29:48', '2024-02-19 06:29:48'),
(55, 'S24155', 'Stephen Nathaniel Rinaldi', 'stephenathaniel1912@gmail.com', 'NextGen Regency', '$2y$10$qlVTjpsUGf2euDA/Qu/ij.4NpjkjDByGcQ7wV50ny3VtkPZgAgsOS', '085798617125', NULL, '2024-02-19 06:29:48', '2024-02-19 06:29:48'),
(56, 'C24156', 'Christian Vieri', 'chris4vieri@gmail.com', 'NextGen Sukhat', '$2y$10$FapkIAPPW4qHU5WdBJaRzuYyBvaNILOznjG.px9/VZQk2O6r3AXAu', '081395720158', NULL, '2024-02-19 06:29:48', '2024-02-19 06:29:48'),
(57, 'N24157', 'Novie Yanti Lesmana ', 'novielesmanay@gmail.com', 'NextGen Sukhat', '$2y$10$KXDdGpgo.H79ag5YKmH.0eA0RuPBFol4/G9whQ7vbUkJ0NcYjnRpC', '085794584631', NULL, '2024-02-19 06:29:48', '2024-02-19 06:29:48'),
(58, 'G24158', 'Greville Timmie Tjandra ', 'grevilletimmietjandra@gmail.com', 'NextGen Regency', '$2y$10$JcV63oCFBBmpxprZTFr2wOOwen9xb0t7YCh7Wp5U/kbJU2ej0Ce2G', '08112200503', NULL, '2024-02-19 06:29:48', '2024-02-19 06:29:48'),
(59, 'C24159', 'Chika Serafina', 'chkasrfna@gmail.com', 'Legacy', '$2y$10$a1TyreN5Kqthe6mfPTwI4.u2PjafAdU30yTap1V1tTpwKcqZW/57C', '081224428889', NULL, '2024-02-19 06:29:48', '2024-02-19 06:29:48'),
(60, 'C24160', 'Cevin Hartanto', 'cevinhartanto@gmail.com', 'NextGen Dago', '$2y$10$okK7R30HdJSZV3srPRwPJu.XElK/2dw3Q9GYXmJXt1g4pkn8tkJrO', '081513064717', NULL, '2024-02-19 06:29:48', '2024-02-19 06:29:48'),
(61, 'I24161', 'Ishak Yesaya', 'ishakyesaya211@gmail.com', 'NextGen Pusat', '$2y$10$1uS92eJZmtWNqX45vEmeg.H89iZz39giDNuvXDNgRuznnTh4Ik4F6', '08159686018', NULL, '2024-02-19 06:29:48', '2024-02-19 06:29:48');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `registrant`
--
ALTER TABLE `registrant`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `registrant`
--
ALTER TABLE `registrant`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
