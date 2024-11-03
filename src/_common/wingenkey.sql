-- phpMyAdmin SQL Dump
-- version 5.2.1deb3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Creato il: Ott 02, 2024 alle 08:00
-- Versione del server: 8.0.39-0ubuntu0.24.04.2
-- Versione PHP: 8.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wingenkey`
--
CREATE DATABASE IF NOT EXISTS `wingenkey` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `wingenkey`;

-- --------------------------------------------------------

--
-- Struttura della tabella `edition`
--

CREATE TABLE `edition` (
  `name` char(32) COLLATE utf8mb4_general_ci NOT NULL,
  `friendlyName` varchar(32) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `edition`
--

INSERT INTO `edition` (`name`, `friendlyName`) VALUES
('business', 'Business'),
('businessN', 'Business N'),
('chnSL', 'CHN SL'),
('core', 'Core'),
('coreN', 'Core N'),
('datacenter', 'Datacenter'),
('education', 'Education'),
('educationN', 'Education N'),
('enterprise', 'Enterprise'),
('enterpriseE', 'Enterprise E'),
('enterpriseG', 'Enterprise G'),
('enterpriseGN', 'Enterprise G N'),
('enterpriseLTSB2015', 'Enterprise LTSB 2015'),
('enterpriseLTSB2016', 'Enterprise LTSB 2016'),
('enterpriseLTSC2019', 'Enterprise LTSC 2019'),
('enterpriseLTSC2021', 'Enterprise LTSC 2021'),
('enterpriseLTSC2024', 'Enterprise LTSC 2024'),
('enterpriseN', 'Enterprise N'),
('enterpriseNLTSB2015', 'Enterprise N LTSB 2015'),
('enterpriseNLTSB2016', 'Enterprise N LTSB 2016'),
('enterpriseNLTSC2019', 'Enterprise N LTSC 2019'),
('enterpriseNLTSC2021', 'Enterprise N LTSC 2021'),
('enterpriseNLTSC2024', 'Enterprise N LTSC 2024'),
('home', 'Home'),
('homeBasic', 'Home Basic'),
('homeBasicE', 'Home Basic E'),
('homeBasicN', 'Home Basic N'),
('homeN', 'Home N'),
('homePremium', 'Home Premium'),
('homePremiumE', 'Home Premium E'),
('homePremiumN', 'Home Premium N'),
('pro', 'Pro'),
('proEducation', 'Pro Education'),
('proEducationN', 'Pro Education N'),
('professional', 'Professional'),
('professionalE', 'Professional E'),
('professionalN', 'Professional N'),
('proForWorkstations', 'Pro for Workstations'),
('proForWorkstationsN', 'Pro for Workstations N'),
('proN', 'Pro N'),
('sl', 'SL'),
('standard', 'Standard'),
('starter', 'starter'),
('starterE', 'starter E'),
('starterN', 'Starter N'),
('ultimate', 'Ultimate'),
('ultimateE', 'Ultimate E'),
('ultimateN', 'Ultimate N'),
('unknown', 'Unknown');

-- --------------------------------------------------------

--
-- Struttura della tabella `key`
--

CREATE TABLE `key` (
  `version` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'unknown',
  `edition` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'unknown',
  `type` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'unknown',
  `key` char(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `verified` tinyint(1) NOT NULL DEFAULT '0',
  `verifiedOn` datetime DEFAULT NULL,
  `invalidated` tinyint(1) NOT NULL DEFAULT '0',
  `invalidatedOn` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `key`
--

INSERT INTO `key` (`version`, `edition`, `type`, `key`, `verified`, `verifiedOn`, `invalidated`, `invalidatedOn`) VALUES
('win10', 'chnSL', 'generic', '68WP7-N2JMW-B676K-WR24Q-9D7YC', 1, '2024-10-01 14:00:00', 0, NULL),
('win10', 'chnSL', 'genericOem', '7B6NC-V3438-TRQG7-8TCCX-H6DDY', 1, '2024-10-01 14:00:00', 0, NULL),
('win10', 'education', 'genericKms', 'NW6C2-QMPVW-D7KKK-3GKT6-VCFB2', 1, '2024-10-01 14:00:00', 0, NULL),
('win10', 'education', 'genericRtm', 'YNMGQ-8RYV3-4PGQ3-C8XTP-7CFBY', 1, '2024-10-01 14:00:00', 0, NULL),
('win10', 'educationN', 'genericKms', '2WH4N-8QGBV-H22JP-CT43Q-MDWWJ', 1, '2024-10-01 14:00:00', 0, NULL),
('win10', 'educationN', 'genericRtm', '84NGF-MHBT6-FXBX8-QWJK7-DRR8H', 1, '2024-10-01 14:00:00', 0, NULL),
('win10', 'enterprise', 'genericKms', 'NPPR9-FWDCX-D2C8J-H872K-2YT43', 1, '2024-10-01 14:00:00', 0, NULL),
('win10', 'enterprise', 'genericRtm', 'XGVPP-NMH47-7TTHJ-W3FW7-8HV2C', 1, '2024-10-01 14:00:00', 0, NULL),
('win10', 'enterpriseG', 'genericKms', 'YYVX9-NTFWV-6MDM3-9PT4T-4M68B', 1, '2024-10-01 14:00:00', 0, NULL),
('win10', 'enterpriseGN', 'genericKms', '44RPN-FTY23-9VTTB-MP9BX-T84FV', 1, '2024-10-01 14:00:00', 0, NULL),
('win10', 'enterpriseLTSB2015', 'genericKms', 'WNMTR-4C88C-JK8YV-HQ7T2-76DF9', 1, '2024-10-01 14:00:00', 0, NULL),
('win10', 'enterpriseLTSB2016', 'genericKms', 'DCPHK-NFMTC-H88MJ-PFHPY-QJ4BJ', 1, '2024-10-01 14:00:00', 0, NULL),
('win10', 'enterpriseLTSC2019', 'genericKms', 'M7XTQ-FN8P6-TTKYV-9D4CC-J462D', 1, '2024-10-01 14:00:00', 0, NULL),
('win10', 'enterpriseLTSC2021', 'genericKms', 'M7XTQ-FN8P6-TTKYV-9D4CC-J462D', 1, '2024-10-01 14:00:00', 0, NULL),
('win10', 'enterpriseN', 'genericKms', 'DPH2V-TTNVB-4X9Q3-TJR4H-KHJW4', 1, '2024-10-01 14:00:00', 0, NULL),
('win10', 'enterpriseN', 'genericRtm', 'WGGHN-J84D6-QYCPR-T7PJ7-X766F', 1, '2024-10-01 14:00:00', 0, NULL),
('win10', 'enterpriseNLTSB2015', 'genericKms', '2F77B-TNFGY-69QQF-B8YKP-D69TJ', 1, '2024-10-01 14:00:00', 0, NULL),
('win10', 'enterpriseNLTSB2016', 'genericKms', 'QFFDN-GRT3P-VKWWX-X7T3R-8B639', 1, '2024-10-01 14:00:00', 0, NULL),
('win10', 'enterpriseNLTSC2019', 'genericKms', '92NFX-8DJQP-P6BBQ-THF9C-7CG2H', 1, '2024-10-01 14:00:00', 0, NULL),
('win10', 'enterpriseNLTSC2021', 'genericKms', '92NFX-8DJQP-P6BBQ-THF9C-7CG2H', 1, '2024-10-01 14:00:00', 0, NULL),
('win10', 'home', 'generic', '46J3N-RY6B3-BJFDY-VBFT9-V22HG', 1, '2024-10-01 14:00:00', 0, NULL),
('win10', 'home', 'genericKms', 'TX9XD-98N7V-6WMQ6-BX7FG-H8Q99', 1, '2024-10-01 14:00:00', 0, NULL),
('win10', 'home', 'genericOem', '37GNV-YCQVD-38XP9-T848R-FC2HD', 1, '2024-10-01 14:00:00', 0, NULL),
('win10', 'home', 'genericRtm', 'YTMG3-N6DKC-DKB77-7M9GH-8HVX7', 1, '2024-10-01 14:00:00', 0, NULL),
('win10', 'homeN', 'generic', 'PGGM7-N77TC-KVR98-D82KJ-DGPHV', 1, '2024-10-01 14:00:00', 0, NULL),
('win10', 'homeN', 'genericKms', '3KHY7-WNT83-DGQKR-F7HPR-844BM', 1, '2024-10-01 14:00:00', 0, NULL),
('win10', 'homeN', 'genericOem', '33CY4-NPKCC-V98JP-42G8W-VH636', 1, '2024-10-01 14:00:00', 0, NULL),
('win10', 'homeN', 'genericRtm', '4CPRK-NM3K3-X6XXQ-RXX86-WXCHW', 1, '2024-10-01 14:00:00', 0, NULL),
('win10', 'pro', 'generic', 'RHGJR-N7FVY-Q3B8F-KBQ6V-46YP4', 1, '2024-10-01 14:00:00', 0, NULL),
('win10', 'pro', 'genericKms', 'W269N-WFGWX-YVC9B-4J6C9-T83GX', 1, '2024-10-01 14:00:00', 0, NULL),
('win10', 'pro', 'genericOem', 'NF6HC-QH89W-F8WYV-WWXV4-WFG6P', 1, '2024-10-01 14:00:00', 0, NULL),
('win10', 'pro', 'genericRtm', 'VK7JG-NPHTM-C97JM-9MPGT-3V66T', 1, '2024-10-01 14:00:00', 0, NULL),
('win10', 'proEducation', 'genericKms', '6TP4R-GNPTD-KYYHQ-7B7DP-J447Y', 1, '2024-10-01 14:00:00', 0, NULL),
('win10', 'proEducation', 'genericRtm', '8PTT6-RNW4C-6V7J2-C2D3X-MHBPB', 1, '2024-10-01 14:00:00', 0, NULL),
('win10', 'proEducationN', 'genericKms', 'YVWGF-BXNMC-HTQYQ-CPQ99-66QFC', 1, '2024-10-01 14:00:00', 0, NULL),
('win10', 'proEducationN', 'genericRtm', 'GJTYN-HDMQY-FRR76-HVGC7-QPF8P', 1, '2024-10-01 14:00:00', 0, NULL),
('win10', 'proForWorkstations', 'genericKms', 'NRG8B-VKK3Q-CXVCJ-9G2XF-6Q84J', 1, '2024-10-01 14:00:00', 0, NULL),
('win10', 'proForWorkstations', 'genericRtm', 'DXG7C-N36C4-C4HTG-X4T3X-2YV77', 1, '2024-10-01 14:00:00', 0, NULL),
('win10', 'proForWorkstationsN', 'genericKms', '9FNHH-K3HBT-3W4TD-6383H-6XYWF', 1, '2024-10-01 14:00:00', 0, NULL),
('win10', 'proForWorkstationsN', 'genericRtm', 'WYPNQ-8C467-V2W6J-TX4WX-WT2RQ', 1, '2024-10-01 14:00:00', 0, NULL),
('win10', 'proN', 'generic', '2KMWQ-NRH27-DV92J-J9GGT-TJF9R', 1, '2024-10-01 14:00:00', 0, NULL),
('win10', 'proN', 'genericKms', 'MH37W-N47XK-V7XM9-C7227-GCQG9', 1, '2024-10-01 14:00:00', 0, NULL),
('win10', 'proN', 'genericOem', 'NH7W7-BMC3R-4W9XT-94B6D-TCQG3', 1, '2024-10-01 14:00:00', 0, NULL),
('win10', 'proN', 'genericRtm', '2B87N-8KFHP-DKV6R-Y2C8J-PKCKT', 1, '2024-10-01 14:00:00', 0, NULL),
('win10', 'sl', 'generic', 'GH37Y-TNG7X-PP2TK-CMRMT-D3WV4', 1, '2024-10-01 14:00:00', 0, NULL),
('win10', 'sl', 'genericOem', 'NTRHT-XTHTG-GBWCG-4MTMP-HH64C', 1, '2024-10-01 14:00:00', 0, NULL),
('win11', 'chnSL', 'generic', 'GH37Y-TNG7X-PP2TK-CMRMT-D3WV4', 0, NULL, 0, NULL),
('win11', 'chnSL', 'genericOem', '7B6NC-V3438-TRQG7-8TCCX-H6DDY', 0, NULL, 0, NULL),
('win11', 'education', 'genericKms', 'NW6C2-QMPVW-D7KKK-3GKT6-VCFB2', 1, '2024-10-01 14:00:00', 0, NULL),
('win11', 'education', 'genericRtm', 'YNMGQ-8RYV3-4PGQ3-C8XTP-7CFBY', 1, '2024-10-01 14:00:00', 0, NULL),
('win11', 'educationN', 'genericKms', '2WH4N-8QGBV-H22JP-CT43Q-MDWWJ', 1, '2024-10-01 14:00:00', 0, NULL),
('win11', 'educationN', 'genericRtm', '84NGF-MHBT6-FXBX8-QWJK7-DRR8H', 1, '2024-10-01 14:00:00', 0, NULL),
('win11', 'enterprise', 'genericKms', 'NPPR9-FWDCX-D2C8J-H872K-2YT43', 1, '2024-10-01 14:00:00', 0, NULL),
('win11', 'enterprise', 'genericRtm', 'XGVPP-NMH47-7TTHJ-W3FW7-8HV2C', 1, '2024-10-01 14:00:00', 0, NULL),
('win11', 'enterpriseG', 'genericKms', 'YYVX9-NTFWV-6MDM3-9PT4T-4M68B', 1, '2024-10-01 14:00:00', 0, NULL),
('win11', 'enterpriseGN', 'genericKms', '44RPN-FTY23-9VTTB-MP9BX-T84FV', 1, '2024-10-01 14:00:00', 0, NULL),
('win11', 'enterpriseLTSC2019', 'genericKms', 'M7XTQ-FN8P6-TTKYV-9D4CC-J462D', 0, NULL, 0, NULL),
('win11', 'enterpriseLTSC2024', 'genericKms', 'M7XTQ-FN8P6-TTKYV-9D4CC-J462D', 1, '2024-10-01 14:00:00', 0, NULL),
('win11', 'enterpriseN', 'genericKms', 'DPH2V-TTNVB-4X9Q3-TJR4H-KHJW4', 1, '2024-10-01 14:00:00', 0, NULL),
('win11', 'enterpriseN', 'genericRtm', 'WGGHN-J84D6-QYCPR-T7PJ7-X766F', 1, '2024-10-01 14:00:00', 0, NULL),
('win11', 'enterpriseNLTSC2019', 'genericKms', '92NFX-8DJQP-P6BBQ-THF9C-7CG2H', 0, NULL, 0, NULL),
('win11', 'enterpriseNLTSC2024', 'genericKms', '92NFX-8DJQP-P6BBQ-THF9C-7CG2H', 1, '2024-10-01 14:00:00', 0, NULL),
('win11', 'home', 'generic', '46J3N-RY6B3-BJFDY-VBFT9-V22HG', 0, NULL, 0, NULL),
('win11', 'home', 'genericKms', 'TX9XD-98N7V-6WMQ6-BX7FG-H8Q99', 1, '2024-10-01 14:00:00', 0, NULL),
('win11', 'home', 'genericOem', '37GNV-YCQVD-38XP9-T848R-FC2HD', 0, NULL, 0, NULL),
('win11', 'home', 'genericRtm', 'YTMG3-N6DKC-DKB77-7M9GH-8HVX7', 1, '2024-10-01 14:00:00', 0, NULL),
('win11', 'homeN', 'generic', 'PGGM7-N77TC-KVR98-D82KJ-DGPHV', 0, NULL, 0, NULL),
('win11', 'homeN', 'genericKms', '3KHY7-WNT83-DGQKR-F7HPR-844BM', 1, '2024-10-01 14:00:00', 0, NULL),
('win11', 'homeN', 'genericOem', '33CY4-NPKCC-V98JP-42G8W-VH636', 0, NULL, 0, NULL),
('win11', 'homeN', 'genericRtm', '4CPRK-NM3K3-X6XXQ-RXX86-WXCHW', 1, '2024-10-01 14:00:00', 0, NULL),
('win11', 'pro', 'generic', 'RHGJR-N7FVY-Q3B8F-KBQ6V-46YP4', 0, NULL, 0, NULL),
('win11', 'pro', 'genericKms', 'W269N-WFGWX-YVC9B-4J6C9-T83GX', 1, '2024-10-01 14:00:00', 0, NULL),
('win11', 'pro', 'genericOem', 'NF6HC-QH89W-F8WYV-WWXV4-WFG6P', 0, NULL, 0, NULL),
('win11', 'pro', 'genericRtm', 'VK7JG-NPHTM-C97JM-9MPGT-3V66T', 1, '2024-10-01 14:00:00', 0, NULL),
('win11', 'proEducation', 'genericKms', '6TP4R-GNPTD-KYYHQ-7B7DP-J447Y', 1, '2024-10-01 14:00:00', 0, NULL),
('win11', 'proEducation', 'genericRtm', '8PTT6-RNW4C-6V7J2-C2D3X-MHBPB', 1, '2024-10-01 14:00:00', 0, NULL),
('win11', 'proEducationN', 'genericKms', 'YVWGF-BXNMC-HTQYQ-CPQ99-66QFC', 1, '2024-10-01 14:00:00', 0, NULL),
('win11', 'proEducationN', 'genericRtm', 'GJTYN-HDMQY-FRR76-HVGC7-QPF8P', 1, '2024-10-01 14:00:00', 0, NULL),
('win11', 'proForWorkstations', 'genericKms', 'NRG8B-VKK3Q-CXVCJ-9G2XF-6Q84J', 1, '2024-10-01 14:00:00', 0, NULL),
('win11', 'proForWorkstations', 'genericRtm', 'DXG7C-N36C4-C4HTG-X4T3X-2YV77', 1, '2024-10-01 14:00:00', 0, NULL),
('win11', 'proForWorkstationsN', 'genericKms', '9FNHH-K3HBT-3W4TD-6383H-6XYWF', 1, '2024-10-01 14:00:00', 0, NULL),
('win11', 'proForWorkstationsN', 'genericRtm', 'WYPNQ-8C467-V2W6J-TX4WX-WT2RQ', 1, '2024-10-01 14:00:00', 0, NULL),
('win11', 'proN', 'generic', 'RHGJR-N7FVY-Q3B8F-KBQ6V-46YP4', 0, NULL, 0, NULL),
('win11', 'proN', 'genericKms', 'MH37W-N47XK-V7XM9-C7227-GCQG9', 1, '2024-10-01 14:00:00', 0, NULL),
('win11', 'proN', 'genericOem', 'NH7W7-BMC3R-4W9XT-94B6D-TCQG3', 0, NULL, 0, NULL),
('win11', 'proN', 'genericRtm', '2B87N-8KFHP-DKV6R-Y2C8J-PKCKT', 1, '2024-10-01 14:00:00', 0, NULL),
('win11', 'sl', 'generic', 'GH37Y-TNG7X-PP2TK-CMRMT-D3WV4', 0, NULL, 0, NULL),
('win11', 'sl', 'genericOem', 'NTRHT-XTHTG-GBWCG-4MTMP-HH64C', 0, NULL, 0, NULL),
('win7', 'enterprise', 'generic', 'H7X92-3VPBB-Q799D-Y6JJ3-86WC6', 0, NULL, 0, NULL),
('win7', 'enterprise', 'genericKms', '33PXH-7Y6KF-2VJC9-XBBR8-HVTHH', 1, '2024-10-01 14:00:00', 0, NULL),
('win7', 'enterpriseE', 'generic', 'H3V6Q-JKQJG-GKVK3-FDDRF-TCKVR', 0, NULL, 0, NULL),
('win7', 'enterpriseE', 'genericKms', 'C29WB-22CC8-VJ326-GHFJW-H9DH4', 1, '2024-10-01 14:00:00', 0, NULL),
('win7', 'enterpriseN', 'generic', 'BQ4TH-BWRRY-424Y9-7PQX2-B4WBD', 0, NULL, 0, NULL),
('win7', 'enterpriseN', 'genericKms', 'YDRBP-3D83W-TY26F-D46B2-XCKRJ', 1, '2024-10-01 14:00:00', 0, NULL),
('win7', 'homeBasic', 'generic', 'YGFVB-QTFXQ-3H233-PTWTJ-YRYRV', 0, NULL, 0, NULL),
('win7', 'homeBasicE', 'generic', 'VTKM9-74GQY-K3W94-47DHV-FTXJY', 0, NULL, 0, NULL),
('win7', 'homeBasicN', 'generic', 'MD83G-H98CG-DXPYQ-Q8GCR-HM8X2', 0, NULL, 0, NULL),
('win7', 'homePremium', 'generic', 'RHPQ2-RMFJH-74XYM-BH4JX-XM76F', 0, NULL, 0, NULL),
('win7', 'homePremiumE', 'generic', '76BRM-9Q4K3-QDJ48-FH4F3-9WT2R', 0, NULL, 0, NULL),
('win7', 'homePremiumN', 'generic', 'D3PVQ-V7M4J-9Q9K3-GG4K3-F99JM', 0, NULL, 0, NULL),
('win7', 'professional', 'generic', 'HYF8J-CVRMY-CM74G-RPHKF-PW487', 0, NULL, 0, NULL),
('win7', 'professional', 'genericKms', 'FJ82H-XT6CR-J8D7P-XQJJ2-GPDD4', 1, '2024-10-01 14:00:00', 0, NULL),
('win7', 'professionalE', 'generic', '3YHKG-DVQ27-RYRBX-JMPVM-WG38T', 0, NULL, 0, NULL),
('win7', 'professionalE', 'genericKms', 'W82YF-2Q76Y-63HXB-FGJG9-GF7QX', 1, '2024-10-01 14:00:00', 0, NULL),
('win7', 'professionalN', 'generic', 'BKFRB-RTCT3-9HW44-FX3X8-M48M6', 0, NULL, 0, NULL),
('win7', 'professionalN', 'genericKms', 'MRPKT-YTG23-K7D7T-X2JMM-QY7MG', 1, '2024-10-01 14:00:00', 0, NULL),
('win7', 'starter', 'generic', '7Q28W-FT9PC-CMMYT-WHMY2-89M6G', 0, NULL, 0, NULL),
('win7', 'starterE', 'generic', 'BRQCV-K7HGQ-CKXP6-2XP7K-F233B', 0, NULL, 0, NULL),
('win7', 'starterN', 'generic', 'D4C3G-38HGY-HGQCV-QCWR8-97FFR', 0, NULL, 0, NULL),
('win7', 'ultimate', 'generic', 'D4F6K-QK3RD-TMVMJ-BBMRX-3MBMV', 0, NULL, 0, NULL),
('win7', 'ultimateE', 'generic', 'TWMF7-M387V-XKW4Y-PVQQD-RK7C8', 0, NULL, 0, NULL),
('win7', 'ultimateN', 'generic', 'HTJK6-DXX8T-TVCR6-KDG67-97J8Q', 0, NULL, 0, NULL),
('win8', 'enterprise', 'genericKms', '32JNW-9KQ84-P47T8-D8GGY-CWCK7', 1, '2024-10-01 14:00:00', 0, NULL),
('win8', 'enterpriseN', 'genericKms', 'JMNMF-RHW7P-DMY6X-RF3DR-X2BQT', 1, '2024-10-01 14:00:00', 0, NULL),
('win8', 'pro', 'genericKms', 'NG4HW-VH26C-733KW-K6F98-J8CK4', 1, '2024-10-01 14:00:00', 0, NULL),
('win8', 'proN', 'genericKms', 'XCVCF-2NXM9-723PB-MHCB7-2RYQQ', 1, '2024-10-01 14:00:00', 0, NULL),
('win8.1', 'enterprise', 'genericKms', 'MHF9N-XY6XB-WVXMC-BTDCT-MKKG7', 1, '2024-10-01 14:00:00', 0, NULL),
('win8.1', 'enterpriseN', 'genericKms', 'TT4HM-HN7YT-62K67-RGRQJ-JFFXW', 1, '2024-10-01 14:00:00', 0, NULL),
('win8.1', 'pro', 'genericKms', 'GCRJD-8NW9H-F2CDX-CCM8D-9D6T9', 1, '2024-10-01 14:00:00', 0, NULL),
('win8.1', 'proN', 'genericKms', 'HMCNV-VVBFX-7HMBH-CTY9B-B4FXY', 1, '2024-10-01 14:00:00', 0, NULL),
('windowsIoT', 'enterpriseLTSC2021', 'genericKms', 'KBN8V-HFGQ4-MGXVD-347P6-PDQGT', 1, '2024-10-01 14:00:00', 0, NULL),
('windowsIoT', 'enterpriseLTSC2024', 'genericKms', 'KBN8V-HFGQ4-MGXVD-347P6-PDQGT', 1, '2024-10-01 14:00:00', 0, NULL),
('windowsServer2016', 'datacenter', 'genericKms', 'CB7KF-BWN84-R7R2Y-793K2-8XDDG', 1, '2024-10-01 14:00:00', 0, NULL),
('windowsServer2016', 'datacenter', 'genericKms', 'WC2BQ-8NRM3-FDDYY-2BFGV-KHKQY', 1, '2024-10-01 14:00:00', 0, NULL),
('windowsServer2019', 'datacenter', 'genericKms', 'WMDGN-G9PQG-XVVXX-R3X43-63DFG', 1, '2024-10-01 14:00:00', 0, NULL),
('windowsServer2019', 'standard', 'genericKms', 'N69G4-B89J2-4G8F4-WWYCC-J464C', 1, '2024-10-01 14:00:00', 0, NULL),
('windowsServer2022', 'datacenter', 'genericKms', 'WX4NM-KYWYW-QJJR4-XV3QB-6VM33', 1, '2024-10-01 14:00:00', 0, NULL),
('windowsServer2022', 'standard', 'genericKms', 'VDYBN-27WPP-V4HQT-9VMD4-VMK7H', 1, '2024-10-01 14:00:00', 0, NULL),
('windowsServer2025', 'datacenter', 'genericKms', 'D764K-2NDRG-47T6Q-P8T8W-YP6DF', 1, '2024-10-01 14:00:00', 0, NULL),
('windowsServer2025', 'standard', 'genericKms', 'TVRH6-WHNXV-R9WG3-9XRFY-MY832', 1, '2024-10-01 14:00:00', 0, NULL),
('winVista', 'business', 'genericKms', 'YFKBB-PQJJV-G996G-VWGXY-2V3X8', 1, '2024-10-01 14:00:00', 0, NULL),
('winVista', 'businessN', 'genericKms', 'HMBQG-8H2RH-C77VX-27R82-VMQBT', 1, '2024-10-01 14:00:00', 0, NULL),
('winVista', 'enterprise', 'genericKms', 'VKK3X-68KWM-X2YGT-QR4M6-4BWMV', 1, '2024-10-01 14:00:00', 0, NULL),
('winVista', 'enterpriseN', 'genericKms', 'VTC42-BM838-43QHV-84HX6-XJXKV', 1, '2024-10-01 14:00:00', 0, NULL);

-- --------------------------------------------------------

--
-- Struttura della tabella `type`
--

CREATE TABLE `type` (
  `name` char(32) COLLATE utf8mb4_general_ci NOT NULL,
  `friendlyName` varchar(32) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `type`
--

INSERT INTO `type` (`name`, `friendlyName`) VALUES
('generic', 'Generic'),
('genericKms', 'Generic KMS'),
('genericOem', 'Generic OEM'),
('genericRtm', 'Generic RTM'),
('kms', 'KMS'),
('oem', 'OEM'),
('retail', 'Retail'),
('rtm', 'RTM'),
('unknown', 'Unknown');

-- --------------------------------------------------------

--
-- Struttura della tabella `version`
--

CREATE TABLE `version` (
  `name` char(32) COLLATE utf8mb4_general_ci NOT NULL,
  `friendlyName` varchar(32) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `version`
--

INSERT INTO `version` (`name`, `friendlyName`) VALUES
('unknown', 'Unknown'),
('win10', 'Windows 10'),
('win11', 'Windows 11'),
('win2000', 'Windows 2000'),
('win7', 'Windows 7'),
('win8', 'Windows 8'),
('win8.1', 'Windows 8.1'),
('win95', 'Windows 95'),
('win98', 'Windows 98'),
('windowsIoT', 'Windows IoT'),
('windowsServer2016', 'Windows Server 2016'),
('windowsServer2019', 'Windows Server 2019'),
('windowsServer2022', 'Windows Server 2022'),
('windowsServer2025', 'Windows Server 2025'),
('winMe', 'Windows Me'),
('winVista', 'Windows Vista'),
('winXP', 'Windows XP');

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `edition`
--
ALTER TABLE `edition`
  ADD PRIMARY KEY (`name`);

--
-- Indici per le tabelle `key`
--
ALTER TABLE `key`
  ADD PRIMARY KEY (`version`,`edition`,`type`,`key`),
  ADD KEY `version` (`version`),
  ADD KEY `edition` (`edition`),
  ADD KEY `type` (`type`);

--
-- Indici per le tabelle `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`name`);

--
-- Indici per le tabelle `version`
--
ALTER TABLE `version`
  ADD PRIMARY KEY (`name`);

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `key`
--
ALTER TABLE `key`
  ADD CONSTRAINT `key_edition` FOREIGN KEY (`edition`) REFERENCES `edition` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `key_type` FOREIGN KEY (`type`) REFERENCES `type` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `key_version` FOREIGN KEY (`version`) REFERENCES `version` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
