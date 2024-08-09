

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";






CREATE TABLE `sh_contact` (
  `id` int(11) NOT NULL,
  `sh_fullname` varchar(50) NOT NULL,
  `sh_email` varchar(50) NOT NULL,
  `sh_mobile` varchar(10) NOT NULL,
  `sh_subject` varchar(500) NOT NULL,
  `sh_datetime` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;





-- --------------------------------------------------------


-- Table structure for table `sh_order`


CREATE TABLE `sh_order` (
  `id` int(11) NOT NULL,
  `sh_fullname` text NOT NULL,
  `sh_email` varchar(50) NOT NULL,
  `sh_mobile` varchar(10) NOT NULL,
  `sh_companyname` varchar(50) NOT NULL,
  `sh_budget` int(12) NOT NULL,
  `sh_people` int(7) NOT NULL,
  `sh_function` varchar(50) NOT NULL,
  `sh_menu` varchar(50) NOT NULL,
  `sh_service` varchar(50) NOT NULL,
  `sh_detailsvenue` varchar(50) NOT NULL,
  `sh_addressvenue` varchar(50) NOT NULL,
  `sh_datetime` int(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
-- --------------------------------------------------------
CREATE TABLE `sh_user` (
  `sh_id` bigint(20) NOT NULL,
  `sh_user` varchar(50) NOT NULL,
  `sh_pass` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
-----------------------------------------------------------
ALTER TABLE `sh_contact`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `sh_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sh_user`
--
ALTER TABLE `sh_user`
  ADD PRIMARY KEY (`sh_id`);


ALTER TABLE `sh_contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

ALTER TABLE `sh_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;


ALTER TABLE `sh_user`
  MODIFY `sh_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

