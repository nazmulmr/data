-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 22, 2019 at 01:39 PM
-- Server version: 10.1.40-MariaDB
-- PHP Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `closing`
--

-- --------------------------------------------------------

--
-- Table structure for table `hc19`
--

CREATE TABLE `hc19` (
  `id` int(4) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `cbscashdeposit` double NOT NULL DEFAULT '0',
  `cbssonalibank` double NOT NULL DEFAULT '0',
  `mfsDisburse` double NOT NULL DEFAULT '0',
  `smeDisburse` double NOT NULL DEFAULT '0',
  `mfsProjectRepay` double NOT NULL DEFAULT '0',
  `mfsBankRepay` double NOT NULL DEFAULT '0',
  `smeRepay` double NOT NULL DEFAULT '0',
  `mfsOdProjectRepay` double NOT NULL DEFAULT '0',
  `mfOdBankRepay` double NOT NULL DEFAULT '0',
  `smeOdRepay` double NOT NULL DEFAULT '0',
  `mfsLoanBal` double NOT NULL DEFAULT '0',
  `smeLoanBal` double NOT NULL DEFAULT '0',
  `mfsOdBal` double NOT NULL DEFAULT '0',
  `smeOdBal` double NOT NULL DEFAULT '0',
  `odPercentage` double NOT NULL DEFAULT '0',
  `mfsOdPercentage` double NOT NULL DEFAULT '0',
  `savingsDepositBal` double NOT NULL DEFAULT '0',
  `sndDepositBal` double NOT NULL DEFAULT '0',
  `sonaliBankSndInterest` double NOT NULL DEFAULT '0',
  `samitteeSavingCharge` double NOT NULL DEFAULT '0',
  `totalExpense` double NOT NULL DEFAULT '0',
  `overAllProfit` double NOT NULL DEFAULT '0',
  `asOnDeposit` double NOT NULL DEFAULT '0',
  `loanCalculation` double NOT NULL DEFAULT '0',
  `transferAgentBank` double NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `hc19`
--
ALTER TABLE `hc19`
  ADD PRIMARY KEY (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
