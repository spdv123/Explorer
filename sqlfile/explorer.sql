-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 05, 2016 at 05:57 AM
-- Server version: 5.5.53-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `explorer`
--

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE `location` (
  `id` int(11) NOT NULL,
  `lat_lng` varchar(30) NOT NULL COMMENT '经纬度，如"12.45,-34.5667"',
  `score` float NOT NULL DEFAULT '4' COMMENT '地图评分'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`id`, `lat_lng`, `score`) VALUES
(1, '46.414602,10.013988', 4),
(2, '41.386151,-72.594942', 4),
(3, '41.143598,-79.850821', 4),
(4, '39.953833,-82.459817', 4),
(5, '31.710572,-81.731586', 4),
(6, '54.730097,-113.322859', 4),
(7, '18.204668,98.688083', 4),
(8, '41.716861,-73.444118', 4),
(9, '49.773504,18.443298', 4),
(10, '49.760865,18.540459', 4),
(11, '45.441826,-76.482697', 4),
(12, '45.048785,-81.364746', 4),
(13, '46.487874,-87.341824', 4),
(14, '40.48642,-8.67229', 4),
(15, '-30.060433,-51.235402', 4),
(16, '48.462939,-122.57806', 4),
(17, '41.089282,-112.153015', 4),
(18, '39.607942,-104.037314', 4),
(19, '43.01766,-70.832514', 4),
(20, '44.636013,-63.56979', 4),
(21, '46.12368,-60.178324', 4),
(22, '58.154715,-6.503611', 4),
(23, '56.527054,-2.715433', 4),
(24, '52.381691,4.842191', 4),
(25, '52.323185,5.077737', 4),
(26, '48.627318,2.414361', 4),
(27, '22.158751,113.568383', 4),
(28, '50.443452,30.368872', 4),
(29, '46.102489,0.489836', 4),
(30, '40.32928,-8.843704', 4),
(31, '47.506302,-52.878399', 4),
(32, '59.91132,10.704117', 4),
(33, '59.324429,18.027363', 4),
(34, '59.308133,18.017603', 4),
(35, '61.583522,24.121818', 4),
(36, '61.792067,26.09482', 4),
(37, '61.153023,28.626297', 4),
(38, '59.930482,30.326724', 4),
(39, '55.740989,37.643505', 4),
(40, '42.504454,26.778216', 4),
(41, '32.047836,34.764', 4),
(42, '27.85158,-15.431503', 4),
(43, '28.405772,-13.851339', 4),
(44, '28.136941,-14.265967', 4),
(45, '-22.121892,-41.579143', 4),
(46, '21.107432,-101.643071', 4),
(47, '33.907164,-118.291597', 4),
(48, '32.578544,-117.084322', 4),
(49, '32.499614,-116.949802', 4),
(50, '27.954928,-110.838017', 4),
(51, '-33.627253,-70.713926', 4),
(52, '-33.902864,19.156254', 4),
(53, '-33.418034,19.287207', 4),
(54, '-29.603402,31.162643', 4),
(55, '-29.353418,31.275769', 4),
(56, '44.396495,8.943227', 4),
(57, '52.455897,13.315633', 4),
(58, '52.399292,4.54257', 4),
(59, '51.504403,-0.096115', 4),
(60, '50.779741,-1.076586', 4),
(61, '53.006673,-9.388301', 4),
(62, '53.269908,-9.056027', 4),
(63, '-36.244136,150.138252', 4),
(64, '-35.910253,150.080754', 4),
(65, '-35.304017,149.125024', 4),
(66, '-33.852164,151.210808', 4),
(67, '-33.60936,151.330671', 4),
(68, '-27.276922,152.981374', 4),
(69, '-16.914506,145.772079', 4),
(70, '-18.414849,133.850509', 4),
(71, '-12.714131,131.087205', 4),
(72, '-32.375691,124.624594', 4),
(73, '-33.205705,136.127483', 4),
(74, '-37.809287,144.860957', 4),
(75, '-38.518886,145.364938', 4),
(76, '-37.881112,147.986631', 4),
(77, '-45.890042,170.509817', 4),
(78, '-45.732399,170.570131', 4),
(79, '-44.395179,171.248557', 4),
(80, '-43.352667,172.662721', 4),
(81, '14.42514,-60.88696', 4),
(82, '-41.528316,174.006963', 4),
(83, '-41.278536,173.79653', 4),
(84, '-41.296114,174.805083', 4),
(85, '-39.831018,174.884594', 4),
(86, '-37.097002,174.944404', 4),
(87, '-36.586234,174.696246', 4),
(88, '23.392954,120.167403', 4),
(89, '23.434591,120.475001', 4),
(90, '24.164274,120.466706', 4),
(91, '25.127677,121.345888', 4),
(92, '22.14233,120.895906', 4),
(93, '22.068026,120.713913', 4),
(94, '24.180617,121.310135', 4),
(95, '22.713633,120.647938', 4),
(96, '37.520159,126.965217', 4),
(97, '37.605225,126.819185', 4),
(98, '33.03172,133.092495', 4),
(99, '33.363595,133.257364', 4),
(100, '33.245564,134.175172', 4),
(101, '33.9355,134.675445', 4),
(102, '34.090315,134.568655', 4),
(103, '34.370156,134.897461', 4),
(104, '34.573761,135.483717', 4),
(105, '35.036556,136.624798', 4),
(106, '35.053323,136.860677', 4),
(107, '37.919095,140.90102', 4),
(108, '38.172184,140.890116', 4),
(109, '38.302981,141.016754', 4),
(110, '39.004622,141.620705', 4),
(111, '40.834644,140.724153', 4),
(112, '13.671031,100.453813', 4),
(113, '13.794303,100.475734', 4),
(114, '13.820743,100.520225', 4),
(115, '15.688301,100.123802', 4),
(116, '20.701626,-156.444524', 4),
(117, '20.935914,-156.340622', 4),
(118, '20.754721,-156.307426', 4),
(119, '20.932671,-156.512269', 4),
(120, '20.930665,-156.690124', 4),
(121, '20.817193,-156.627544', 4),
(122, '21.059255,-156.833847', 4),
(123, '21.170511,-156.998919', 4),
(124, '21.099857,-157.043906', 4),
(125, '21.314349,-157.88783', 4),
(126, '21.390764,-157.963323', 4),
(127, '21.460369,-157.994817', 4),
(128, '21.500828,-158.029445', 4),
(129, '21.579848,-158.179746', 4),
(130, '21.546209,-158.240185', 4),
(131, '22.215538,-159.533002', 4),
(132, '22.210937,-159.475825', 4),
(133, '22.14238,-159.313348', 4),
(134, '21.975743,-159.370528', 4),
(135, '61.037293,-149.780767', 4),
(136, '61.087325,-149.834305', 4),
(137, '61.481578,-149.252417', 4),
(138, '60.986285,-149.509693', 4),
(139, '60.81731,-148.986377', 4),
(140, '64.788119,-148.215078', 4),
(141, '66.426153,19.682644', 4),
(142, '66.897023,17.836021', 4),
(143, '68.419404,17.38831', 4),
(144, '42.041688,11.828012', 4),
(145, '36.747676,-3.062242', 4),
(146, '27.752501,-15.647589', 4),
(147, '-42.808793,147.521977', 4),
(148, '-41.188572,146.370518', 4),
(149, '-41.239591,147.007891', 4),
(150, '-41.564388,148.297033', 4),
(151, '-42.193771,148.058178', 4),
(152, '-22.539818,27.150758', 4),
(153, '-22.564326,27.084064', 4),
(154, '-19.988805,23.420358', 4),
(155, '-19.987536,23.400586', 4),
(156, '-19.97829,23.436552', 4),
(157, '-2.547081,-44.303493', 4),
(158, '-2.521623,-44.303452', 4),
(159, '-2.496611,-44.307604', 4),
(160, '-2.483738,-44.251567', 4),
(161, '-4.8685,-43.359994', 4),
(162, '-4.862966,-43.366505', 4),
(163, '-4.856253,-43.350032', 4),
(164, '61.256752,73.445459', 4),
(165, '61.260159,73.255434', 4),
(166, '61.223046,73.159369', 4),
(167, '61.260149,73.522541', 4),
(168, '61.018278,69.03807', 4),
(169, '61.060151,72.611124', 4),
(170, '60.161247,24.924737', 4),
(171, '60.166274,24.894095', 4),
(172, '60.180358,24.839546', 4),
(173, '60.156709,24.61002', 4),
(174, '60.443872,22.269734', 4),
(175, '59.43249,24.786236', 4),
(176, '59.438622,24.77217', 4),
(177, '59.440308,24.739404', 4),
(178, '59.428183,24.725075', 4),
(179, '56.965314,23.87461', 4),
(180, '56.930528,23.611445', 4),
(181, '38.796784,-9.217481', 4),
(182, '38.762923,-9.140635', 4),
(183, '41.173086,-71.558383', 4),
(184, '41.1882,-71.568413', 4),
(185, '41.224204,-71.565897', 4),
(186, '41.503585,-71.342547', 4),
(187, '41.27875,-70.09466', 4),
(188, '41.285498,-70.097395', 4),
(189, '41.290028,-70.091802', 4),
(190, '41.28397,-70.169894', 4),
(191, '42.05567,-70.130615', 4),
(192, '42.0437,-70.214552', 4),
(193, '42.061555,-70.161672', 4),
(194, '41.460846,-71.321621', 4),
(195, '38.663682,1.583126', 4),
(196, '39.067397,1.588115', 4),
(197, '39.545419,2.620647', 4),
(198, '39.56504,2.643499', 4),
(199, '36.744034,11.989399', 4),
(200, '40.846046,14.266241', 4),
(201, '41.903467,12.52023', 4),
(202, '41.900241,12.45591', 4),
(203, '41.917006,8.736544', 4),
(204, '41.931862,8.740537', 4),
(205, '41.863582,-87.619196', 4),
(206, '41.702427,-87.524245', 4),
(207, '39.961456,-83.000494', 4),
(208, '39.953099,-82.998817', 4),
(209, '40.438824,-80.011528', 4),
(210, '40.449676,-79.993329', 4),
(211, '41.49853,-81.705368', 4),
(212, '41.478657,-81.673517', 4),
(213, '42.32768,-83.04662', 4),
(214, '42.347674,-83.000241', 4),
(215, '43.632123,-79.412226', 4),
(216, '43.649058,-79.354391', 4),
(217, '43.700565,-79.254752', 4),
(218, '41.390699,-73.477126', 4),
(219, '41.425949,-73.340598', 4),
(220, '41.468883,-73.405674', 4),
(221, '41.455067,-73.238091', 4),
(222, '41.465248,-73.246627', 4),
(223, '41.465829,-73.229696', 4),
(224, '41.477619,-73.216943', 4),
(225, '41.507517,-73.140724', 4),
(226, '41.117671,-73.38268', 4),
(227, '41.107462,-73.411', 4),
(228, '41.093624,-73.419081', 4),
(229, '41.09153,-73.415912', 4),
(230, '41.098894,-73.416056', 4),
(231, '41.576465,-73.411813', 4),
(232, '41.605417,-73.404012', 4),
(233, '41.592727,-73.450599', 4),
(234, '41.556962,-73.387772', 4),
(235, '41.550288,-73.329864', 4),
(236, '41.535304,-73.279492', 4),
(237, '41.550911,-73.205327', 4),
(238, '41.551363,-73.055456', 4),
(239, '41.518617,-72.771206', 4);

INSERT INTO `location` (`id`, `lat_lng`, `score`) VALUES
(240, '44.4323844909668,-77.09492492675781', 4),
(241, '46.838215,16.05991599999993', 4),
(242, '38.385729,-90.95286499999997', 4),
(243, '-17.594499,-62.15100000000001', 4),
(244, '-29.015399932861328,153.27566528320312', 4),
(245, '-18.87643051147461,-41.95545959472656', 4),
(246, '-31.475818634033203,27.359127044677734', 4),
(247, '-35.749811,-61.734756000000004', 4),
(248, '56.166727,71.22256900000002', 4),
(249, '59.851817,29.05271199999993', 4),
(250, '42.9673957824707,11.888347625732421', 4),
(251, '66.01351165771484,12.598751068115234', 4),
(252, '42.530087,2.7289009999999507', 4),
(253, '55.742665,68.205377', 4),
(254, '35.536912,135.19247300000006', 4),
(255, '58.630049,8.522670000000062', 4),
(256, '20.028865814208984,-99.19416809082031', 4),
(257, '-17.042768,-39.85134700000003', 4),
(258, '40.551425,-85.70168699999999', 4),
(259, '-27.660873413085937,-53.304344177246094', 4),
(260, '-25.216548,-64.93672400000002', 4),
(261, '57.551038,15.96694100000002', 4),
(262, '29.639097213745117,-99.49067687988281', 4),
(263, '56.153299,59.21253999999999', 4),
(264, '10.487322,77.76114600000005', 4),
(265, '45.459262,-67.63442199999997', 4),
(266, '43.949411,-92.05953199999999', 4),
(267, '43.066872,-91.928245', 4),
(268, '65.522196,-19.855500000000006', 4),
(269, '-26.873027801513672,28.501262664794922', 4),
(270, '16.60333824157715,-98.97441101074219', 4),
(271, '40.030555725097656,-3.6077120304107666', 4),
(272, '41.160544,-4.842795000000024', 4),
(273, '55.619382,45.29377599999998', 4),
(274, '58.326080322265625,15.09099292755127', 4),
(275, '36.03909683227539,-90.28430938720703', 4),
(276, '-5.743246078491211,-38.516353607177734', 4),
(277, '61.843307,30.64680199999998', 4),
(278, '49.227222,143.08234900000002', 4),
(279, '32.385441,-104.18593199999998', 4),
(280, '50.36214065551758,15.904254913330078', 4),
(281, '63.87396240234375,27.440317153930664', 4),
(282, '51.336925,110.58100000000002', 4),
(283, '49.606178283691406,-119.67266082763672', 4),
(284, '40.625465393066406,-111.83416748046875', 4),
(285, '5.638114,100.81061599999998', 4),
(286, '38.498857,24.110686999999984', 4),
(287, '-34.836193,-61.54822999999999', 4),
(288, '-35.348777770996094,143.5144500732422', 4),
(289, '42.534479,142.43074000000001', 4),
(290, '52.738654,33.25911700000006', 4),
(291, '58.416302,34.221982000000025', 4),
(292, '47.420711517333984,21.14307975769043', 4),
(293, '31.008211135864258,130.66622924804687', 4),
(294, '52.764311,80.78078800000003', 4),
(295, '46.737317,-65.83034600000002', 4),
(296, '30.01929,75.39952800000003', 4),
(297, '47.175605,-67.20487000000003', 4),
(298, '61.610829,73.12207000000001', 4),
(299, '52.751914978027344,-8.331856727600097', 4),
(300, '44.457559,-98.69047', 4),
(301, '-20.3582,25.89484600000003', 4),
(302, '-23.892587,29.714061000000015', 4),
(303, '38.51707077026367,-92.38822174072265', 4),
(304, '44.268529,142.97493499999996', 4);


-- --------------------------------------------------------

--
-- Table structure for table `motto`
--

CREATE TABLE `motto` (
  `content` varchar(1000) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `id` int(11) NOT NULL,
  `author` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `motto`
--

INSERT INTO `motto` (`content`, `id`, `author`) VALUES
('春天的太阳甚至给那最卑微的小花也注入了新的生命。', 18, '司各特'),
('如果冬天来了，春天还会远吗？', 19, '雪莱'),
('春天的意志和暖流正在逐渐地驱走寒冬。', 20, '纪德'),
('秋天确已到来，可是请君少待只要请你少待片刻时光春天就要驾到，苍天就要含笑世界就要充满紫罗兰的芳香。', 21, '西奥多·施托姆'),
('露珠只是在它自己小小球体的范围里理解太阳。', 22, '泰戈尔'),
('哦，狂暴的西风，秋之生命的呼吸！你无形，但枯死的落叶被你横扫，有如鬼魅碰上巫师，纷纷逃避。', 23, '雪莱'),
('云把水倒在河的水杯里，它们自己却藏在远山之中', 24, '泰戈尔'),
('急雨才收翠色新，长青树上露沉沉，迷蒙白雾轻如许，欲上秋空作暮云。', 25, '寂莲法师'),
('金云把风格迥异的画一幅幅画在天穹，但是不题写自己的姓名', 26, '泰戈尔'),
('如果没有乌云，我们就感受不到太阳的温暖。', 27, '约翰'),
('风儿带着异样的寂静，轻柔的把江河湖海亲吻。', 28, '弥尔顿'),
('若不是让画笔蘸满天园的七色颜料，人间灵巧的画师又怎能绘出斑斓的七色彩虹?', 29, '司各特'),
('昨夜的暴风雨用金色的和平为今晨加冕。', 30, '泰戈尔'),
('春天从这美丽的花园里走来，就像那爱的精灵无所不在；每一种花草都在大地黝黑的胸膛上，从冬眠的美梦里苏醒。', 31, '雪莱'),
('春天虽然飞去了，却引来竞芳斗翠的万物；百花虽然凋零了，却给我们留下了花的种子。', 32, '席勒'),
('昆虫的嗡嗡声中自有一番夏天的韵味。', 33, '兰道'),
('瞧，田野处处金光闪耀，这是因为太阳之子灿烂的夏天已经来到。', 34, '詹·汤姆逊');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `game_count` int(11) NOT NULL DEFAULT '0' COMMENT '游戏场次',
  `total_score` int(11) NOT NULL DEFAULT '0' COMMENT '总分'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `game_count`, `total_score`) VALUES
(1, 'User1', 'e10adc3949ba59abbe56e057f20f883e', 2, 40000),
(2, 'User2', 'e10adc3949ba59abbe56e057f20f883e', 4, 30000),
(3, 'User3', 'e10adc3949ba59abbe56e057f20f883e', 10, 50789);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `motto`
--
ALTER TABLE `motto`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `location`
--
ALTER TABLE `location`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=240;
--
-- AUTO_INCREMENT for table `motto`
--
ALTER TABLE `motto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
