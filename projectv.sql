-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le : jeu. 25 août 2022 à 20:10
-- Version du serveur : 5.7.34
-- Version de PHP : 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `projectv`
--

-- --------------------------------------------------------

--
-- Structure de la table `endpoints`
--

CREATE TABLE `endpoints` (
  `name` varchar(50) NOT NULL,
  `endpoint_id` varchar(50) NOT NULL,
  `vpc_id` varchar(50) NOT NULL,
  `service_name` varchar(50) NOT NULL,
  `endoint_type` varchar(50) NOT NULL,
  `state` varchar(50) NOT NULL,
  `creation_time` varchar(50) NOT NULL,
  `network_interfaces` varchar(50) NOT NULL,
  `subnets` varchar(50) NOT NULL,
  `route_tables` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `endpoints`
--

INSERT INTO `endpoints` (`name`, `endpoint_id`, `vpc_id`, `service_name`, `endoint_type`, `state`, `creation_time`, `network_interfaces`, `subnets`, `route_tables`) VALUES
('Not', 'vpce-07dcf86962d1fe7f8', 'vpc-01b88edc87fee897f', 'com.amazonaws.eu-west-1.s3', 'Gateway', 'Available', 'Tuesday, May 28, 2019, 16:07:53 GMT+2', 'Not', 'Not', 'rtb-07ab5cbce7b12ba8b'),
('Not', 'vpce-039e3457954050888', 'vpc-db0ba2be', 'com.amazonaws.eu-west-1.s3', 'Gateway', 'Available', 'Wednesday, February 9, 2022, 15:11:53 GMT+1', 'Not', 'Not', 'Not');

-- --------------------------------------------------------

--
-- Structure de la table `internet_gateways`
--

CREATE TABLE `internet_gateways` (
  `name` varchar(50) NOT NULL,
  `internet_gateway_id` varchar(50) NOT NULL,
  `state` varchar(50) NOT NULL,
  `vpc_id` varchar(50) NOT NULL,
  `owner` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `internet_gateways`
--

INSERT INTO `internet_gateways` (`name`, `internet_gateway_id`, `state`, `vpc_id`, `owner`) VALUES
('IGW_VPC_VESA-PROD-PF', 'igw-042f6d2934a39e595', 'Attached', 'vpc-00344fe8bc5e453f6', '895005297952'),
('VPC_VESA-ACCESS-WAF-PROD-IRELAND', 'igw-04400028c49cfa24f', 'Attached', 'vpc-0ab43a9252c40819c', '895005297952'),
('IGW_EOL', 'igw-07b6e98d10c98652b', 'Attached', 'vpc-01b88edc87fee897f', '895005297952'),
('IGW_VPC_SERVICES_TECHNIQUES', 'igw-0e3e2aa53a785ef1a', 'Attached', 'vpc-07dbe76a0049b6630', '895005297952'),
('IGW_VPC_VESA_INDUS', 'igw-0f9a2b621077bfc0a', 'Attached', 'vpc-0c4bccf053441edf6', '895005297952'),
('–', 'igw-6b97600e', 'Attached', 'vpc-fd33ff98', '895005297952'),
('IGW_PROD', 'igw-75a86110', 'Attached', 'vpc-db0ba2be', '895005297952'),
('IGW_VERI', 'igw-92821df7', 'Attached', 'vpc-0f94c76a', '895005297952'),
('IGW_VPC_STREAMING', 'igw-e1f3b486', 'Attached', 'vpc-9681faf0', '895005297952');

-- --------------------------------------------------------

--
-- Structure de la table `nat_gateway`
--

CREATE TABLE `nat_gateway` (
  `name` varchar(50) NOT NULL,
  `nat_gateway_id` varchar(50) NOT NULL,
  `connectivity_type` varchar(50) NOT NULL,
  `state` varchar(50) NOT NULL,
  `state_message` varchar(50) NOT NULL,
  `elastic_ip_address` varchar(50) NOT NULL,
  `private_ip_address` varchar(50) NOT NULL,
  `network_interface_id` varchar(50) NOT NULL,
  `vpc` varchar(50) NOT NULL,
  `subnet` varchar(50) NOT NULL,
  `created` varchar(50) NOT NULL,
  `deleted` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `nat_gateway`
--

INSERT INTO `nat_gateway` (`name`, `nat_gateway_id`, `connectivity_type`, `state`, `state_message`, `elastic_ip_address`, `private_ip_address`, `network_interface_id`, `vpc`, `subnet`, `created`, `deleted`) VALUES
('NAT_VPC_STREAMING', 'nat-032ccd649a1e9fed1', 'Public', 'Available', '–', '34.254.37.226', '10.64.15.212', 'eni-78f5817f', 'vpc-9681faf0', 'subnet-7331c829', 'Monday, June 11, 2018, 15:02:20 GMT+2', '–'),
('–', 'nat-0a8e69b68da69b00e', 'Public', 'Available', '–', '63.34.174.3', '172.31.11.232', 'eni-0c9c072a301d14a46', 'vpc-fd33ff98', 'subnet-7b49b022', 'Tuesday, March 12, 2019, 17:36:06 GMT+1', '–');

-- --------------------------------------------------------

--
-- Structure de la table `network`
--

CREATE TABLE `network` (
  `name` varchar(50) NOT NULL,
  `network_id` varchar(50) NOT NULL,
  `vpc_id` varchar(50) NOT NULL,
  `cidr_ipv4` varchar(50) NOT NULL,
  `ipv4_available` varchar(50) NOT NULL,
  `zone_disponibility` varchar(50) NOT NULL,
  `zone_disponibility_id` varchar(50) NOT NULL,
  `table_routage` varchar(100) NOT NULL,
  `acl_network` varchar(50) NOT NULL,
  `default_subnet` varchar(50) NOT NULL,
  `auto_ipv4_public` varchar(50) NOT NULL,
  `auto_ipv4_private` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `network`
--

INSERT INTO `network` (`name`, `network_id`, `vpc_id`, `cidr_ipv4`, `ipv4_available`, `zone_disponibility`, `zone_disponibility_id`, `table_routage`, `acl_network`, `default_subnet`, `auto_ipv4_public`, `auto_ipv4_private`) VALUES
('VPC_PROD_CIBLE_SubnetPriINFRAA', 'subnet-3909ae60', 'vpc-db0ba2be', '10.66.64.0/21', '2034', 'eu-west-1a', 'euw1-az3', 'rtb-8318a0e6 | PrivateRouteTableA', 'acl-1a259a7f', 'Non', 'Non', 'Non'),
('VPC_SERVICES_TECHNIQUES_SubnetIPri_InfraB', 'subnet-0245530a4fc62c02a', 'vpc-07dbe76a0049b6630', '10.64.246.128/25', '106', 'eu-west-1b', 'euw1-az1', 'rtb-058a88b5f2609b4ce | RTB_VPC_SERVICES_TECHNIQUES', 'acl-065f63813dec9fc12', 'Non', 'Non', 'Non'),
('VPC_VERI_SubnetPriPROD2B', 'subnet-90ac96f5', 'vpc-0f94c76a', '10.72.26.0/24', '250', 'eu-west-1b', 'euw1-az1', 'rtb-0f7e426a | PrivateRouteTableB_VERI', 'acl-ce7542ab', 'Non', 'Non', 'Non'),
('VPC_PROD_CIBLE_SubnetPriPROD1A', 'subnet-0209ae5b', 'vpc-db0ba2be', '10.66.0.0/23', '470', 'eu-west-1a', 'euw1-az3', 'rtb-8318a0e6 | PrivateRouteTableA', 'acl-1a259a7f', 'Non', 'Non', 'Non'),
('VPC_PROD_CIBLE_SubnetPriPROD2A', 'subnet-0409ae5d', 'vpc-db0ba2be', '10.66.2.0/23', '493', 'eu-west-1a', 'euw1-az3', 'rtb-8318a0e6 | PrivateRouteTableA', 'acl-1a259a7f', 'Non', 'Non', 'Non'),
('VPC_EOL_SubnetPub_InfraB', 'subnet-001b58dc6ca1d6f4a', 'vpc-01b88edc87fee897f', '10.64.33.128/25', '122', 'eu-west-1b', 'euw1-az1', 'rtb-0be1ce2cb87bb0c19 | RTB_VPC_EOL_PUB', 'acl-064a774bba04f80d5', 'Non', 'Non', 'Non'),
('Private-subnet-1a', 'subnet-00ff8e9744741f1ba', 'vpc-fd33ff98', '172.31.64.0/20', '4089', 'eu-west-1a', 'euw1-az3', 'rtb-035316cad742cbd8c | private-rt', 'acl-9072a5f5', 'Non', 'Non', 'Non'),
('VPC_VERI_SubnetPubINFRAA', 'subnet-2085ff79', 'vpc-0f94c76a', '10.72.20.128/25', '122', 'eu-west-1a', 'euw1-az3', 'rtb-0c7e4269 | PublicRouteTable_VERI', 'acl-ce7542ab', 'Non', 'Non', 'Non'),
('–', 'subnet-7b49b022', 'vpc-fd33ff98', '172.31.0.0/20', '4090', 'eu-west-1a', 'euw1-az3', 'rtb-1f06d77a | DefaultRouteTable_default', 'acl-9072a5f5', 'Oui', 'Oui', 'Non'),
('SB_VPC_VESA-PROD-PF_PUB_B', 'subnet-083bb243988fde6b8', 'vpc-00344fe8bc5e453f6', '10.72.114.64/26', '59', 'eu-west-1b', 'euw1-az1', 'rtb-0eafdfd338866ef54 | RTB_VESA-PROD-PF_PUB', 'acl-0c98fa206a13ae0aa', 'Non', 'Oui', 'Non'),
('VPC_SERVICES_TECHNIQUES_SubnetIPri_InfraA', 'subnet-0cfd14ada98e492fe', 'vpc-07dbe76a0049b6630', '10.64.246.0/25', '106', 'eu-west-1a', 'euw1-az3', 'rtb-058a88b5f2609b4ce | RTB_VPC_SERVICES_TECHNIQUES', 'acl-065f63813dec9fc12', 'Non', 'Non', 'Non'),
('VPC_PROD_CIBLE_SubnetPriPROD3A', 'subnet-3a09ae63', 'vpc-db0ba2be', '10.66.4.0/23', '507', 'eu-west-1a', 'euw1-az3', 'rtb-8318a0e6 | PrivateRouteTableA', 'acl-1a259a7f', 'Non', 'Non', 'Non'),
('VPC_VERI_SubnetPubDMZ2B', 'subnet-93ac96f6', 'vpc-0f94c76a', '10.72.31.0/24', '251', 'eu-west-1b', 'euw1-az1', 'rtb-0c7e4269 | PublicRouteTable_VERI', 'acl-ce7542ab', 'Non', 'Non', 'Non'),
('SB_VPC_STREAMING_PRI_PROD_B', 'subnet-cef749a8', 'vpc-9681faf0', '10.64.4.0/22', '926', 'eu-west-1b', 'euw1-az1', 'rtb-09ea8f70 | RTB_VPC_STREAMING_PRI_B', 'acl-cf986bb6', 'Non', 'Non', 'Non'),
('VPC_PROD_CIBLE_SubnetPriRELAYA', 'subnet-871369de', 'vpc-db0ba2be', '10.66.73.0/24', '251', 'eu-west-1a', 'euw1-az3', 'rtb-8318a0e6 | PrivateRouteTableA', 'acl-1a259a7f', 'Non', 'Non', 'Non'),
('VPC_VERI_SubnetPubDMZ1B', 'subnet-9dac96f8', 'vpc-0f94c76a', '10.72.29.0/24', '251', 'eu-west-1b', 'euw1-az1', 'rtb-0c7e4269 | PublicRouteTable_VERI', 'acl-ce7542ab', 'Non', 'Non', 'Non'),
('VPC_SERVICES_TECHNIQUES_SubnetIPublic_B', 'subnet-03ae2cb903b6c175f', 'vpc-07dbe76a0049b6630', '10.64.247.192/26', '58', 'eu-west-1b', 'euw1-az1', 'rtb-00fb25e5e524ddfd7 | RTB_VPC_SERVICES_TECHNIQUES_Public', 'acl-065f63813dec9fc12', 'Non', 'Non', 'Non'),
('VPC_PROD_CIBLE_SubnetPriRELAYEXPA', 'subnet-a7bdf8fe', 'vpc-db0ba2be', '10.66.72.0/28', '11', 'eu-west-1a', 'euw1-az3', 'rtb-8318a0e6 | PrivateRouteTableA', 'acl-1a259a7f', 'Non', 'Non', 'Non'),
('SB_VPC_STREAMING_PUB_PROD_B', 'subnet-13f44a75', 'vpc-9681faf0', '10.64.15.224/27', '26', 'eu-west-1b', 'euw1-az1', 'rtb-96f590ef | RTB_VPC_STREAMING_PUB', 'acl-cf986bb6', 'Non', 'Non', 'Non'),
('SB_VPC_VESA_INDUS_EXT_B', 'subnet-0222cec96f05b71a5', 'vpc-0c4bccf053441edf6', '10.72.36.160/27', '27', 'eu-west-1b', 'euw1-az1', 'rtb-06f3a98f14ae373f6 | RTB_VESA_INDUS_INT_B', 'acl-0420f2a4966d37e1f', 'Non', 'Non', 'Non'),
('VPC_EOL_SubnetPri_ProdB', 'subnet-098c8fb4208cafff3', 'vpc-01b88edc87fee897f', '10.64.244.128/25', '123', 'eu-west-1b', 'euw1-az1', 'rtb-07ab5cbce7b12ba8b | RTB_VPC_EOL_PRI', 'acl-064a774bba04f80d5', 'Non', 'Non', 'Non'),
('VPC_PROD_CIBLE_SubnetPubDMZ1A', 'subnet-0609ae5f', 'vpc-db0ba2be', '10.66.96.0/23', '505', 'eu-west-1a', 'euw1-az3', 'rtb-8218a0e7 | PublicRouteTableA', 'acl-1a259a7f', 'Non', 'Non', 'Non'),
('SB_VPC_VESA_INDUS_PUB_A', 'subnet-0f6ade1455c0bf7e7', 'vpc-0c4bccf053441edf6', '10.72.36.0/27', '27', 'eu-west-1a', 'euw1-az3', 'rtb-0e82296ddd0cfdaa1 | RTB_VESA_INDUS_PUB', 'acl-0420f2a4966d37e1f', 'Non', 'Oui', 'Non'),
('VPC_VERI_SubnetPubINFRAB', 'subnet-91ac96f4', 'vpc-0f94c76a', '10.72.28.128/25', '123', 'eu-west-1b', 'euw1-az1', 'rtb-0c7e4269 | PublicRouteTable_VERI', 'acl-ce7542ab', 'Non', 'Non', 'Non'),
('VPC_PROD_CIBLE_SubnetPubDMZ2A', 'subnet-3b09ae62', 'vpc-db0ba2be', '10.66.98.0/23', '503', 'eu-west-1a', 'euw1-az3', 'rtb-8218a0e7 | PublicRouteTableA', 'acl-1a259a7f', 'Non', 'Non', 'Non'),
('VPC_VERI_SubnetPriINFRAA', 'subnet-2685ff7f', 'vpc-0f94c76a', '10.72.19.0/24', '250', 'eu-west-1a', 'euw1-az3', 'rtb-0d7e4268 | PrivateRouteTableA_VERI', 'acl-ce7542ab', 'Non', 'Non', 'Non'),
('VPC_PROD_CIBLE_SubnetPubDMZ3A', 'subnet-0709ae5e', 'vpc-db0ba2be', '10.66.100.0/23', '507', 'eu-west-1a', 'euw1-az3', 'rtb-8218a0e7 | PublicRouteTableA', 'acl-1a259a7f', 'Non', 'Non', 'Non'),
('VPC_VERI_SubnetPubHPDMZ1A', 'subnet-2e85ff77', 'vpc-0f94c76a', '10.72.22.0/24', '251', 'eu-west-1a', 'euw1-az3', 'rtb-0c7e4269 | PublicRouteTable_VERI', 'acl-ce7542ab', 'Non', 'Non', 'Non'),
('VPC_VERI_SubnetPriRELAYEXPA', 'subnet-fedc99a7', 'vpc-0f94c76a', '10.72.20.64/28', '11', 'eu-west-1a', 'euw1-az3', 'rtb-0d7e4268 | PrivateRouteTableA_VERI', 'acl-ce7542ab', 'Non', 'Non', 'Non'),
('VPC_PROD_CIBLE_SubnetPubINFRAA', 'subnet-3809ae61', 'vpc-db0ba2be', '10.66.127.0/24', '251', 'eu-west-1a', 'euw1-az3', 'rtb-8218a0e7 | PublicRouteTableA', 'acl-1a259a7f', 'Non', 'Non', 'Non'),
('VPC_PROD_CIBLE_SubnetPriINFRAB', 'subnet-d580e5b0', 'vpc-db0ba2be', '10.66.192.0/21', '2039', 'eu-west-1b', 'euw1-az1', 'rtb-8018a0e5 | PrivateRouteTableB', 'acl-1a259a7f', 'Non', 'Non', 'Non'),
('–', 'subnet-cd9430ba', 'vpc-fd33ff98', '172.31.32.0/20', '4091', 'eu-west-1c', 'euw1-az2', 'rtb-1f06d77a | DefaultRouteTable_default', 'acl-9072a5f5', 'Oui', 'Oui', 'Non'),
('VPC_VERI_SubnetPriPROD1B', 'subnet-94ac96f1', 'vpc-0f94c76a', '10.72.24.0/24', '250', 'eu-west-1b', 'euw1-az1', 'rtb-0f7e426a | PrivateRouteTableB_VERI', 'acl-ce7542ab', 'Non', 'Non', 'Non'),
('VPC_VERI_SubnetPubHPDMZ1B', 'subnet-97ac96f2', 'vpc-0f94c76a', '10.72.30.0/24', '251', 'eu-west-1b', 'euw1-az1', 'rtb-0c7e4269 | PublicRouteTable_VERI', 'acl-ce7542ab', 'Non', 'Non', 'Non'),
('SB_VPC_VESA-PROD-PF_PUB_A', 'subnet-012408d9a1bbc94fa', 'vpc-00344fe8bc5e453f6', '10.72.114.0/26', '57', 'eu-west-1a', 'euw1-az3', 'rtb-0eafdfd338866ef54 | RTB_VESA-PROD-PF_PUB', 'acl-0c98fa206a13ae0aa', 'Non', 'Oui', 'Non'),
('VPC_PROD_CIBLE_SubnetPriPROD1B', 'subnet-cb80e5ae', 'vpc-db0ba2be', '10.66.128.0/23', '497', 'eu-west-1b', 'euw1-az1', 'rtb-8018a0e5 | PrivateRouteTableB', 'acl-1a259a7f', 'Non', 'Non', 'Non'),
('SB_VPC_VESA-PROD-PF_EXT_B', 'subnet-03da88b17a91a0abb', 'vpc-00344fe8bc5e453f6', '10.72.115.64/26', '58', 'eu-west-1b', 'euw1-az1', 'rtb-0817aa3206ee80a18 | RTB_VESA-PROD-PF_INT_B', 'acl-0c98fa206a13ae0aa', 'Non', 'Non', 'Non'),
('SB_VPC_VESA-PROD-PF_INT_B', 'subnet-0561d445c3048e8d1', 'vpc-00344fe8bc5e453f6', '10.72.114.192/26', '59', 'eu-west-1b', 'euw1-az1', 'rtb-0817aa3206ee80a18 | RTB_VESA-PROD-PF_INT_B', 'acl-0c98fa206a13ae0aa', 'Non', 'Non', 'Non'),
('VPC_VERI_SubnetPriRELAYA', 'subnet-2385ff7a', 'vpc-0f94c76a', '10.72.20.0/26', '59', 'eu-west-1a', 'euw1-az3', 'rtb-0d7e4268 | PrivateRouteTableA_VERI', 'acl-ce7542ab', 'Non', 'Non', 'Non'),
('SB_VPC_STREAMING_PRI_PROD_C', 'subnet-9566e9dd', 'vpc-9681faf0', '10.64.8.0/22', '923', 'eu-west-1c', 'euw1-az2', 'rtb-bde98cc4 | RTB_VPC_STREAMING_PRI_C', 'acl-cf986bb6', 'Non', 'Non', 'Non'),
('VPC_VERI_SubnetPubDMZ2A', 'subnet-2785ff7e', 'vpc-0f94c76a', '10.72.23.0/24', '251', 'eu-west-1a', 'euw1-az3', 'rtb-0c7e4269 | PublicRouteTable_VERI', 'acl-ce7542ab', 'Non', 'Non', 'Non'),
('VPC_PROD_CIBLE_SubnetPriPROD2B', 'subnet-d780e5b2', 'vpc-db0ba2be', '10.66.130.0/23', '495', 'eu-west-1b', 'euw1-az1', 'rtb-8018a0e5 | PrivateRouteTableB', 'acl-1a259a7f', 'Non', 'Non', 'Non'),
('VPC_PROD_CIBLE_SubnetPriPROD3B', 'subnet-d380e5b6', 'vpc-db0ba2be', '10.66.132.0/23', '507', 'eu-west-1b', 'euw1-az1', 'rtb-8018a0e5 | PrivateRouteTableB', 'acl-1a259a7f', 'Non', 'Non', 'Non'),
('VPC_EOL_SubnetPri_InfraB', 'subnet-07c67bf5bcf4e599e', 'vpc-01b88edc87fee897f', '10.64.245.128/25', '122', 'eu-west-1a', 'euw1-az3', 'rtb-07ab5cbce7b12ba8b | RTB_VPC_EOL_PRI', 'acl-064a774bba04f80d5', 'Non', 'Non', 'Non'),
('VPC_VERI_SubnetPriPROD1A', 'subnet-2f85ff76', 'vpc-0f94c76a', '10.72.16.0/24', '234', 'eu-west-1a', 'euw1-az3', 'rtb-0d7e4268 | PrivateRouteTableA_VERI', 'acl-ce7542ab', 'Non', 'Non', 'Non'),
('SB_VPC_STREAMING_PRI_PROD_A', 'subnet-f032cbaa', 'vpc-9681faf0', '10.64.0.0/22', '943', 'eu-west-1a', 'euw1-az3', 'rtb-c5f491bc | RTB_VPC_STREAMING_PRI_A', 'acl-cf986bb6', 'Non', 'Non', 'Non'),
('VPC_EOL_SubnetPri_InfraA', 'subnet-005fde4becb90971d', 'vpc-01b88edc87fee897f', '10.64.245.0/25', '122', 'eu-west-1c', 'euw1-az2', 'rtb-07ab5cbce7b12ba8b | RTB_VPC_EOL_PRI', 'acl-064a774bba04f80d5', 'Non', 'Non', 'Non'),
('VPC_SERVICES_TECHNIQUES_SubnetIPri_ProdA', 'subnet-0fe2d66a7288724ac', 'vpc-07dbe76a0049b6630', '10.64.247.0/25', '119', 'eu-west-1c', 'euw1-az2', 'rtb-058a88b5f2609b4ce | RTB_VPC_SERVICES_TECHNIQUES', 'acl-065f63813dec9fc12', 'Non', 'Non', 'Non'),
('SB_VPC_VESA_INDUS_EXT_A', 'subnet-0eb956599b6e889ac', 'vpc-0c4bccf053441edf6', '10.72.36.128/27', '27', 'eu-west-1a', 'euw1-az3', 'rtb-05aeed59de9a0bf2e | RTB_VESA_INDUS_INT_A', 'acl-0420f2a4966d37e1f', 'Non', 'Non', 'Non'),
('VPC_PROD_CIBLE_SubnetPriRELAYB', 'subnet-d2447eb7', 'vpc-db0ba2be', '10.66.201.0/24', '251', 'eu-west-1b', 'euw1-az1', 'rtb-8018a0e5 | PrivateRouteTableB', 'acl-1a259a7f', 'Non', 'Non', 'Non'),
('VPC_VERI_SubnetPriRELAYEXPB', 'subnet-ffdc99a6', 'vpc-0f94c76a', '10.72.28.64/28', '11', 'eu-west-1a', 'euw1-az3', 'rtb-0f7e426a | PrivateRouteTableB_VERI', 'acl-ce7542ab', 'Non', 'Non', 'Non'),
('SB_VPC_VESA_INDUS_PUB_B', 'subnet-0f8e9a92944e946e0', 'vpc-0c4bccf053441edf6', '10.72.36.32/27', '26', 'eu-west-1b', 'euw1-az1', 'rtb-0e82296ddd0cfdaa1 | RTB_VESA_INDUS_PUB', 'acl-0420f2a4966d37e1f', 'Non', 'Oui', 'Non'),
('VPC_EOL_SubnetPub_InfraA', 'subnet-007aab9f1255c488b', 'vpc-01b88edc87fee897f', '10.64.33.0/25', '123', 'eu-west-1a', 'euw1-az3', 'rtb-0be1ce2cb87bb0c19 | RTB_VPC_EOL_PUB', 'acl-064a774bba04f80d5', 'Non', 'Non', 'Non'),
('SB_VPC_VESA_INDUS_INT_A', 'subnet-0972d8582f8ae7635', 'vpc-0c4bccf053441edf6', '10.72.36.64/27', '22', 'eu-west-1a', 'euw1-az3', 'rtb-05aeed59de9a0bf2e | RTB_VESA_INDUS_INT_A', 'acl-0420f2a4966d37e1f', 'Non', 'Non', 'Non'),
('VPC_VERI_SubnetPriINFRAB', 'subnet-96ac96f3', 'vpc-0f94c76a', '10.72.27.0/24', '250', 'eu-west-1b', 'euw1-az1', 'rtb-0f7e426a | PrivateRouteTableB_VERI', 'acl-ce7542ab', 'Non', 'Non', 'Non'),
('SB_VPC_VESA-PROD-PF_INT_A', 'subnet-08059f757b130fa90', 'vpc-00344fe8bc5e453f6', '10.72.114.128/26', '56', 'eu-west-1a', 'euw1-az3', 'rtb-007c040ce09e2e4a1 | RTB_VESA-PROD-PF_INT_A', 'acl-0c98fa206a13ae0aa', 'Non', 'Non', 'Non'),
('VPC_PROD_CIBLE_SubnetPriRELAYEXPB', 'subnet-f894919d', 'vpc-db0ba2be', '10.66.200.0/28', '11', 'eu-west-1b', 'euw1-az1', 'rtb-8018a0e5 | PrivateRouteTableB', 'acl-1a259a7f', 'Non', 'Non', 'Non'),
('VPC_PROD_CIBLE_SubnetPubDMZ1B', 'subnet-d680e5b3', 'vpc-db0ba2be', '10.66.224.0/23', '507', 'eu-west-1b', 'euw1-az1', 'rtb-b918a0dc | PublicRouteTableB', 'acl-1a259a7f', 'Non', 'Non', 'Non'),
('SB_VPC_VESA-PROD-PF_EXT_A', 'subnet-03a07acf36e0bc0dd', 'vpc-00344fe8bc5e453f6', '10.72.115.0/26', '59', 'eu-west-1a', 'euw1-az3', 'rtb-007c040ce09e2e4a1 | RTB_VESA-PROD-PF_INT_A', 'acl-0c98fa206a13ae0aa', 'Non', 'Non', 'Non'),
('SB_VPC_VESA-ACCESS-WAF-PROD-IRELAND_PUB_A', 'subnet-0d2c17d123e625dbd', 'vpc-0ab43a9252c40819c', '10.65.150.0/24', '251', 'eu-west-1a', 'euw1-az3', 'rtb-0a81a16e549552ed5 | RTB_VESA-ACCESS-WAF-PROD-IRELAND_PUB', 'acl-0e8c74918d8660835', 'Non', 'Oui', 'Non'),
('VPC_VERI_SubnetPriPROD2A', 'subnet-2285ff7b', 'vpc-0f94c76a', '10.72.18.0/24', '251', 'eu-west-1a', 'euw1-az3', 'rtb-0d7e4268 | PrivateRouteTableA_VERI', 'acl-ce7542ab', 'Non', 'Non', 'Non'),
('VPC_PROD_CIBLE_SubnetPubDMZ2B', 'subnet-ca80e5af', 'vpc-db0ba2be', '10.66.226.0/23', '507', 'eu-west-1b', 'euw1-az1', 'rtb-b918a0dc | PublicRouteTableB', 'acl-1a259a7f', 'Non', 'Non', 'Non'),
('VPC_EOL_SubnetPri_ProdA', 'subnet-0e8204ff493dd9931', 'vpc-01b88edc87fee897f', '10.64.244.0/25', '120', 'eu-west-1a', 'euw1-az3', 'rtb-07ab5cbce7b12ba8b | RTB_VPC_EOL_PRI', 'acl-064a774bba04f80d5', 'Non', 'Non', 'Non'),
('VPC_VERI_SubnetPriHPPROD1A', 'subnet-d985ff80', 'vpc-0f94c76a', '10.72.17.0/24', '246', 'eu-west-1a', 'euw1-az3', 'rtb-0d7e4268 | PrivateRouteTableA_VERI', 'acl-ce7542ab', 'Non', 'Non', 'Non'),
('VPC_PROD_CIBLE_SubnetPubDMZ3B', 'subnet-d480e5b1', 'vpc-db0ba2be', '10.66.228.0/23', '507', 'eu-west-1b', 'euw1-az1', 'rtb-b918a0dc | PublicRouteTableB', 'acl-1a259a7f', 'Non', 'Non', 'Non'),
('SB_VPC_VESA_INDUS_INT_B', 'subnet-0db7daaf298491f1b', 'vpc-0c4bccf053441edf6', '10.72.36.96/27', '26', 'eu-west-1b', 'euw1-az1', 'rtb-06f3a98f14ae373f6 | RTB_VESA_INDUS_INT_B', 'acl-0420f2a4966d37e1f', 'Non', 'Non', 'Non'),
('VPC_PROD_CIBLE_SubnetPubINFRAB', 'subnet-d180e5b4', 'vpc-db0ba2be', '10.66.255.0/24', '251', 'eu-west-1b', 'euw1-az1', 'rtb-b918a0dc | PublicRouteTableB', 'acl-1a259a7f', 'Non', 'Non', 'Non'),
('VPC_PROD_CIBLE_SubnetPriINFRAC', 'subnet-b4b596c3', 'vpc-db0ba2be', '10.66.191.0/24', '250', 'eu-west-1c', 'euw1-az2', 'rtb-b7310cd2 | PrivateRouteTableC', 'acl-1a259a7f', 'Non', 'Non', 'Non'),
('VPC_SERVICES_TECHNIQUES_SubnetIPriI_ProdB', 'subnet-0e8fe02851dffa549', 'vpc-07dbe76a0049b6630', '10.64.247.128/26', '58', 'eu-west-1b', 'euw1-az1', 'rtb-058a88b5f2609b4ce | RTB_VPC_SERVICES_TECHNIQUES', 'acl-065f63813dec9fc12', 'Non', 'Non', 'Non'),
('–', 'subnet-2e99264b', 'vpc-fd33ff98', '172.31.16.0/20', '4091', 'eu-west-1b', 'euw1-az1', 'rtb-1f06d77a | DefaultRouteTable_default', 'acl-9072a5f5', 'Oui', 'Oui', 'Non'),
('VPC_VERI_SubnetPriHPPROD1B', 'subnet-9cac96f9', 'vpc-0f94c76a', '10.72.25.0/24', '250', 'eu-west-1b', 'euw1-az1', 'rtb-0f7e426a | PrivateRouteTableB_VERI', 'acl-ce7542ab', 'Non', 'Non', 'Non'),
('VPC_VERI_SubnetPriRELAYB', 'subnet-92ac96f7', 'vpc-0f94c76a', '10.72.28.0/26', '59', 'eu-west-1b', 'euw1-az1', 'rtb-0f7e426a | PrivateRouteTableB_VERI', 'acl-ce7542ab', 'Non', 'Non', 'Non'),
('SB_VPC_STREAMING_PUB_PROD_A', 'subnet-7331c829', 'vpc-9681faf0', '10.64.15.192/27', '23', 'eu-west-1a', 'euw1-az3', 'rtb-96f590ef | RTB_VPC_STREAMING_PUB', 'acl-cf986bb6', 'Non', 'Non', 'Non'),
('VPC_VERI_SubnetPubDMZ1A', 'subnet-2585ff7c', 'vpc-0f94c76a', '10.72.21.0/24', '251', 'eu-west-1a', 'euw1-az3', 'rtb-0c7e4269 | PublicRouteTable_VERI', 'acl-ce7542ab', 'Non', 'Non', 'Non'),
('–', 'subnet-08cffd42', 'vpc-6b42bd02', '172.31.32.0/20', '4091', 'eu-west-3c', 'euw3-az3', 'rtb-12aa6c7b', 'acl-d02ce9b9', 'Oui', 'Oui', 'Non'),
('SB_VPC_VESA_NETBACKUP_PUB_A', 'subnet-0367b54592611baf5', 'vpc-05d465008f28183b8', '10.73.8.0/28', '10', 'eu-west-3a', 'euw3-az1', 'rtb-0d71ae029d1968b1d | RTB_VPC_PARIS_NETBACKUP_PUB', 'acl-0317f258fc1ca7ec0', 'Non', 'Non', 'Non'),
('SB_VPC_VESA_NETBACKUP_PUB_B', 'subnet-042cf2755b8f752d9', 'vpc-05d465008f28183b8', '10.73.8.16/28', '10', 'eu-west-3b', 'euw3-az2', 'rtb-0d71ae029d1968b1d | RTB_VPC_PARIS_NETBACKUP_PUB', 'acl-0317f258fc1ca7ec0', 'Non', 'Non', 'Non'),
('–', 'subnet-81657af9', 'vpc-6b42bd02', '172.31.16.0/20', '4091', 'eu-west-3b', 'euw3-az2', 'rtb-12aa6c7b', 'acl-d02ce9b9', 'Oui', 'Oui', 'Non'),
('–', 'subnet-a4d52ecd', 'vpc-6b42bd02', '172.31.0.0/20', '4091', 'eu-west-3a', 'euw3-az1', 'rtb-12aa6c7b', 'acl-d02ce9b9', 'Oui', 'Oui', 'Non'),
('SB_VPC_VESA_NETBACKUP_INT_A', 'subnet-0bfb04427779f4faa', 'vpc-05d465008f28183b8', '10.73.8.32/28', '7', 'eu-west-3a', 'euw3-az1', 'rtb-0885889164c27b4da | RTB_VPC_PARIS_NETBACKUP_INT', 'acl-0317f258fc1ca7ec0', 'Non', 'Non', 'Non'),
('SB_VPC_VESA_NETBACKUP_INT_B', 'subnet-0adc7ebaa6b3b139b', 'vpc-05d465008f28183b8', '10.73.8.48/28', '11', 'eu-west-3b', 'euw3-az2', 'rtb-0885889164c27b4da | RTB_VPC_PARIS_NETBACKUP_INT', 'acl-0317f258fc1ca7ec0', 'Non', 'Non', 'Non');

-- --------------------------------------------------------

--
-- Structure de la table `peering_connections`
--

CREATE TABLE `peering_connections` (
  `name` varchar(50) NOT NULL,
  `peering_connection_id` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `requester_vpc` varchar(50) NOT NULL,
  `accepter_vpc` varchar(50) NOT NULL,
  `requester_cidr` varchar(50) NOT NULL,
  `accepter_cidr` varchar(50) NOT NULL,
  `requester_owner_id` varchar(50) NOT NULL,
  `accepter_owner_id` varchar(50) NOT NULL,
  `route_table_id` varchar(50) NOT NULL,
  `vpc_id` varchar(50) NOT NULL,
  `main` varchar(50) NOT NULL,
  `associated_with` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `peering_connections`
--

INSERT INTO `peering_connections` (`name`, `peering_connection_id`, `status`, `requester_vpc`, `accepter_vpc`, `requester_cidr`, `accepter_cidr`, `requester_owner_id`, `accepter_owner_id`, `route_table_id`, `vpc_id`, `main`, `associated_with`) VALUES
('peering_VPC_POC_EXTRAHOP_VPC_PROD', 'pcx-07061cf6c126e11c0', 'Active', 'vpc-091037b9411faca7c', 'vpc-db0ba2be / VPC_PROD', '10.73.10.0/23', '10.66.0.0/16', '329349508430', '895005297952', 'rtb-b918a0dc / PublicRouteTableB', 'vpc-db0ba2be', 'Yes', '4 subnets'),
('peering_VPC_POC_EXTRAHOP_VPC_PROD', 'pcx-07061cf6c126e11c1', 'Active', 'vpc-091037b9411faca7c', 'vpc-db0ba2be / VPC_PROD', '10.73.10.0/24', '10.66.0.0/17', '329349508430', '895005297952', 'rtb-b7310cd2 / PrivateRouteTableC', 'vpc-db0ba2be', 'No', 'subnet-b4b596c3'),
('peering_VPC_POC_EXTRAHOP_VPC_PROD', 'pcx-07061cf6c126e11c2', 'Active', 'vpc-091037b9411faca7c', 'vpc-db0ba2be / VPC_PROD', '10.73.10.0/25', '10.66.0.0/18', '329349508430', '895005297952', 'rtb-8018a0e5 / PrivateRouteTableB', 'vpc-db0ba2be', 'No', '6 subnets'),
('peering_VPC_POC_EXTRAHOP_VPC_PROD', 'pcx-07061cf6c126e11c3', 'Active', 'vpc-091037b9411faca7c', 'vpc-db0ba2be / VPC_PROD', '10.73.10.0/26', '10.66.0.0/19', '329349508430', '895005297952', 'rtb-8318a0e6 / PrivateRouteTableA', 'vpc-db0ba2be', 'No', '6 subnets'),
('peering_VPC_POC_EXTRAHOP_VPC_PROD', 'pcx-07061cf6c126e11c4', 'Active', 'vpc-091037b9411faca7c', 'vpc-db0ba2be / VPC_PROD', '10.73.10.0/27', '10.66.0.0/20', '329349508430', '895005297952', 'rtb-8218a0e7 / PublicRouteTableA', 'vpc-db0ba2be', 'No', '4 subnets');

-- --------------------------------------------------------

--
-- Structure de la table `private_gateway`
--

CREATE TABLE `private_gateway` (
  `name` varchar(50) NOT NULL,
  `gateway` varchar(50) NOT NULL,
  `state` varchar(50) NOT NULL,
  `type` varchar(50) NOT NULL,
  `vpc` varchar(50) NOT NULL,
  `asn` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `private_gateway`
--

INSERT INTO `private_gateway` (`name`, `gateway`, `state`, `type`, `vpc`, `asn`) VALUES
('VPG_VPC_VESA-PROD-PF', 'vgw-0e73d581fb4cafe61', 'Attached', 'ipsec.1', 'vpc-00344fe8bc5e453f6', 9059),
('VPG_VPC_VESA_INDUS', 'vgw-07c106d7984f1ed67', 'Attached', 'ipsec.1', 'vpc-0c4bccf053441edf6', 9059),
('VPG_VPC_SERVICES_TECHNIQUES', 'vgw-0e1602b66fc782e40', 'Attached', 'ipsec.1', 'vpc-07dbe76a0049b6630', 9059),
('VPG_VPC_EOL', 'vgw-0ecbce5bd7714eb85', 'Attached', 'ipsec.1', 'vpc-01b88edc87fee897f', 9059),
('VPG_VPC_STREAMING', 'vgw-5693ad22', 'Attached', 'ipsec.1', 'vpc-9681faf0', 9059),
('VPG_VPC_PROD', 'vgw-439ea037', 'Attached', 'ipsec.1', 'vpc-db0ba2be', 9059),
('VPG_PROD_VERI', 'vgw-fa63538e', 'Attached', 'ipsec.1', 'vpc-0f94c76a', 9059);

-- --------------------------------------------------------

--
-- Structure de la table `route_tables`
--

CREATE TABLE `route_tables` (
  `name` varchar(50) NOT NULL,
  `id` varchar(50) NOT NULL,
  `destination` varchar(50) NOT NULL,
  `target` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `propagated` varchar(50) NOT NULL,
  `private_gateway` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `route_tables`
--

INSERT INTO `route_tables` (`name`, `id`, `destination`, `target`, `status`, `propagated`, `private_gateway`) VALUES
('–', 'rtb-0f8a46bdfa08b1ff2', '10.65.150.0/23', 'local', 'Active', 'No', ''),
('DefaultRouteTable_default', 'rtb-1f06d77a', '172.31.0.0/16', 'local', 'Active', 'No', ''),
('DefaultRouteTable_default', 'rtb-1f06d77a', '0.0.0.0/0', 'igw-6b97600e', 'Active', 'No', ''),
('RTB_VPC_STREAMING_PRI_A', 'rtb-c5f491bc', '10.10.24.0/26', 'tgw-09bee705ee37e8cb8', 'Active', 'No', ''),
('RTB_VPC_STREAMING_PRI_A', 'rtb-c5f491bc', '10.161.40.0/26', 'tgw-09bee705ee37e8cb8', 'Active', 'No', ''),
('RTB_VPC_STREAMING_PRI_A', 'rtb-c5f491bc', '10.10.23.0/24', 'tgw-09bee705ee37e8cb8', 'Active', 'No', ''),
('RTB_VPC_STREAMING_PRI_A', 'rtb-c5f491bc', '10.73.12.0/23', 'tgw-09bee705ee37e8cb8', 'Active', 'No', ''),
('RTB_VPC_STREAMING_PRI_A', 'rtb-c5f491bc', '10.64.0.0/20', 'local', 'Active', 'No', ''),
('RTB_VPC_STREAMING_PRI_A', 'rtb-c5f491bc', '0.0.0.0/0', 'tgw-09bee705ee37e8cb8', 'Active', 'No', ''),
('RTB_VPC_STREAMING_PRI_A', 'rtb-c5f491bc', '10.74.235.192/27', 'vgw-5693ad22', 'Active', 'Yes', 'vgw-5693ad22 '),
('RTB_VPC_STREAMING_PRI_A', 'rtb-c5f491bc', '10.74.238.0/27', 'vgw-5693ad22', 'Active', 'Yes', 'vgw-5693ad22 '),
('RTB_VPC_STREAMING_PRI_A', 'rtb-c5f491bc', '10.10.25.0/26', 'vgw-5693ad22', 'Active', 'Yes', 'vgw-5693ad22 '),
('RTB_VPC_STREAMING_PRI_A', 'rtb-c5f491bc', '10.65.205.0/26', 'vgw-5693ad22', 'Active', 'Yes', 'vgw-5693ad22 '),
('RTB_VPC_STREAMING_PRI_A', 'rtb-c5f491bc', '10.73.8.0/26', 'vgw-5693ad22', 'Active', 'Yes', 'vgw-5693ad22 '),
('RTB_VPC_STREAMING_PRI_A', 'rtb-c5f491bc', '10.74.235.128/26', 'vgw-5693ad22', 'Active', 'Yes', 'vgw-5693ad22 '),
('RTB_VPC_STREAMING_PRI_A', 'rtb-c5f491bc', '10.74.232.0/25', 'vgw-5693ad22', 'Active', 'Yes', 'vgw-5693ad22 '),
('RTB_VPC_STREAMING_PRI_A', 'rtb-c5f491bc', '10.74.233.0/25', 'vgw-5693ad22', 'Active', 'Yes', 'vgw-5693ad22 '),
('RTB_VPC_STREAMING_PRI_A', 'rtb-c5f491bc', '10.74.234.0/25', 'vgw-5693ad22', 'Active', 'Yes', 'vgw-5693ad22 '),
('RTB_VPC_STREAMING_PRI_A', 'rtb-c5f491bc', '10.74.234.128/25', 'vgw-5693ad22', 'Active', 'Yes', 'vgw-5693ad22 '),
('RTB_VPC_STREAMING_PRI_A', 'rtb-c5f491bc', '10.74.235.0/25', 'vgw-5693ad22', 'Active', 'Yes', 'vgw-5693ad22 '),
('RTB_VPC_STREAMING_PRI_A', 'rtb-c5f491bc', '192.168.6.0/24', 'vgw-5693ad22', 'Active', 'Yes', 'vgw-5693ad22 '),
('RTB_VPC_STREAMING_PRI_A', 'rtb-c5f491bc', '10.64.34.0/24', 'vgw-5693ad22', 'Active', 'Yes', 'vgw-5693ad22 '),
('RTB_VPC_STREAMING_PRI_A', 'rtb-c5f491bc', '10.73.14.0/24', 'vgw-5693ad22', 'Active', 'Yes', 'vgw-5693ad22 '),
('RTB_VPC_STREAMING_PRI_A', 'rtb-c5f491bc', '10.73.24.0/24', 'vgw-5693ad22', 'Active', 'Yes', 'vgw-5693ad22 '),
('RTB_VPC_STREAMING_PRI_A', 'rtb-c5f491bc', '10.74.240.0/24', 'vgw-5693ad22', 'Active', 'Yes', 'vgw-5693ad22 '),
('RTB_VPC_STREAMING_PRI_A', 'rtb-c5f491bc', '10.64.68.0/23', 'vgw-5693ad22', 'Active', 'Yes', 'vgw-5693ad22 '),
('RTB_VPC_STREAMING_PRI_A', 'rtb-c5f491bc', '10.64.92.0/23', 'vgw-5693ad22', 'Active', 'Yes', 'vgw-5693ad22 '),
('RTB_VPC_STREAMING_PRI_A', 'rtb-c5f491bc', '10.73.12.0/23', 'vgw-5693ad22', 'Active', 'Yes', 'vgw-5693ad22 '),
('RTB_VPC_STREAMING_PRI_A', 'rtb-c5f491bc', '10.74.128.0/23', 'vgw-5693ad22', 'Active', 'Yes', 'vgw-5693ad22 '),
('RTB_VPC_STREAMING_PRI_A', 'rtb-c5f491bc', '10.74.136.0/23', 'vgw-5693ad22', 'Active', 'Yes', 'vgw-5693ad22 '),
('RTB_VPC_STREAMING_PRI_A', 'rtb-c5f491bc', '10.74.168.0/23', 'vgw-5693ad22', 'Active', 'Yes', 'vgw-5693ad22 '),
('RTB_VPC_STREAMING_PRI_A', 'rtb-c5f491bc', '10.74.236.0/23', 'vgw-5693ad22', 'Active', 'Yes', 'vgw-5693ad22 '),
('RTB_VPC_STREAMING_PRI_A', 'rtb-c5f491bc', '10.64.16.0/22', 'vgw-5693ad22', 'Active', 'Yes', 'vgw-5693ad22 '),
('RTB_VPC_STREAMING_PRI_A', 'rtb-c5f491bc', '10.64.44.0/22', 'vgw-5693ad22', 'Active', 'Yes', 'vgw-5693ad22 '),
('RTB_VPC_STREAMING_PRI_A', 'rtb-c5f491bc', '10.64.48.0/22', 'vgw-5693ad22', 'Active', 'Yes', 'vgw-5693ad22 '),
('RTB_VPC_STREAMING_PRI_A', 'rtb-c5f491bc', '10.64.80.0/22', 'vgw-5693ad22', 'Active', 'Yes', 'vgw-5693ad22 '),
('RTB_VPC_STREAMING_PRI_A', 'rtb-c5f491bc', '10.64.84.0/22', 'vgw-5693ad22', 'Active', 'Yes', 'vgw-5693ad22 '),
('RTB_VPC_STREAMING_PRI_A', 'rtb-c5f491bc', '10.65.0.0/22', 'vgw-5693ad22', 'Active', 'Yes', 'vgw-5693ad22 '),
('RTB_VPC_STREAMING_PRI_A', 'rtb-c5f491bc', '10.65.76.0/22', 'vgw-5693ad22', 'Active', 'Yes', 'vgw-5693ad22 '),
('RTB_VPC_STREAMING_PRI_A', 'rtb-c5f491bc', '10.72.96.0/22', 'vgw-5693ad22', 'Active', 'Yes', 'vgw-5693ad22 '),
('RTB_VPC_STREAMING_PRI_A', 'rtb-c5f491bc', '10.72.100.0/22', 'vgw-5693ad22', 'Active', 'Yes', 'vgw-5693ad22 '),
('RTB_VPC_STREAMING_PRI_A', 'rtb-c5f491bc', '10.73.4.0/22', 'vgw-5693ad22', 'Active', 'Yes', 'vgw-5693ad22 '),
('RTB_VPC_STREAMING_PRI_A', 'rtb-c5f491bc', '10.73.48.0/22', 'vgw-5693ad22', 'Active', 'Yes', 'vgw-5693ad22 '),
('RTB_VPC_STREAMING_PRI_A', 'rtb-c5f491bc', '10.73.52.0/22', 'vgw-5693ad22', 'Active', 'Yes', 'vgw-5693ad22 '),
('RTB_VPC_STREAMING_PRI_A', 'rtb-c5f491bc', '10.74.140.0/22', 'vgw-5693ad22', 'Active', 'Yes', 'vgw-5693ad22 '),
('RTB_VPC_STREAMING_PRI_A', 'rtb-c5f491bc', '10.74.144.0/22', 'vgw-5693ad22', 'Active', 'Yes', 'vgw-5693ad22 '),
('RTB_VPC_STREAMING_PRI_A', 'rtb-c5f491bc', '10.64.72.0/21', 'vgw-5693ad22', 'Active', 'Yes', 'vgw-5693ad22 '),
('RTB_VPC_STREAMING_PRI_A', 'rtb-c5f491bc', '10.64.88.0/21', 'vgw-5693ad22', 'Active', 'Yes', 'vgw-5693ad22 '),
('RTB_VPC_STREAMING_PRI_A', 'rtb-c5f491bc', '10.72.104.0/21', 'vgw-5693ad22', 'Active', 'Yes', 'vgw-5693ad22 '),
('RTB_VPC_STREAMING_PRI_A', 'rtb-c5f491bc', '10.72.160.0/21', 'vgw-5693ad22', 'Active', 'Yes', 'vgw-5693ad22 '),
('RTB_VPC_STREAMING_PRI_A', 'rtb-c5f491bc', '10.72.168.0/21', 'vgw-5693ad22', 'Active', 'Yes', 'vgw-5693ad22 '),
('RTB_VPC_STREAMING_PRI_A', 'rtb-c5f491bc', '10.73.16.0/21', 'vgw-5693ad22', 'Active', 'Yes', 'vgw-5693ad22 '),
('RTB_VPC_STREAMING_PRI_A', 'rtb-c5f491bc', '192.168.48.0/20', 'vgw-5693ad22', 'Active', 'Yes', 'vgw-5693ad22 '),
('RTB_VPC_STREAMING_PRI_A', 'rtb-c5f491bc', '10.74.0.0/17', 'vgw-5693ad22', 'Active', 'Yes', 'vgw-5693ad22 '),
('RTB_VPC_STREAMING_PRI_A', 'rtb-c5f491bc', '10.64.0.0/16', 'vgw-5693ad22', 'Active', 'Yes', 'vgw-5693ad22 '),
('RTB_VPC_STREAMING_PRI_A', 'rtb-c5f491bc', '10.65.0.0/16', 'vgw-5693ad22', 'Active', 'Yes', 'vgw-5693ad22 '),
('RTB_VPC_STREAMING_PRI_A', 'rtb-c5f491bc', '10.66.0.0/16', 'vgw-5693ad22', 'Active', 'Yes', 'vgw-5693ad22 '),
('RTB_VPC_STREAMING_PRI_A', 'rtb-c5f491bc', '10.70.0.0/16', 'vgw-5693ad22', 'Active', 'Yes', 'vgw-5693ad22 '),
('RTB_VPC_STREAMING_PRI_A', 'rtb-c5f491bc', '10.72.0.0/16', 'vgw-5693ad22', 'Active', 'Yes', 'vgw-5693ad22 '),
('RTB_VPC_STREAMING_PRI_A', 'rtb-c5f491bc', '10.75.0.0/16', 'vgw-5693ad22', 'Active', 'Yes', 'vgw-5693ad22 '),
('RTB_VPC_STREAMING_PRI_A', 'rtb-c5f491bc', '10.182.0.0/16', 'vgw-5693ad22', 'Active', 'Yes', 'vgw-5693ad22 '),
('RTB_VPC_STREAMING_PRI_A', 'rtb-c5f491bc', '10.76.0.0/14', 'vgw-5693ad22', 'Active', 'Yes', 'vgw-5693ad22 '),
('RTB_VPC_STREAMING_PRI_A', 'rtb-c5f491bc', '172.16.0.0/12', 'vgw-5693ad22', 'Active', 'Yes', 'vgw-5693ad22 '),
('RTB_VPC_STREAMING_PRI_A', 'rtb-c5f491bc', '10.80.0.0/12', 'vgw-5693ad22', 'Active', 'Yes', 'vgw-5693ad22 '),
('RTB_VPC_STREAMING_PRI_A', 'rtb-c5f491bc', '10.96.0.0/11', 'vgw-5693ad22', 'Active', 'Yes', 'vgw-5693ad22 '),
('RTB_VPC_STREAMING_PRI_A', 'rtb-c5f491bc', '10.0.0.0/10', 'vgw-5693ad22', 'Active', 'Yes', 'vgw-5693ad22 '),
('RTB_VPC_STREAMING_PRI_A', 'rtb-c5f491bc', '10.128.0.0/9', 'vgw-5693ad22', 'Active', 'Yes', 'vgw-5693ad22 '),
('RTB_VPC_STREAMING_PRI_A', 'rtb-c5f491bc', '10.0.0.0/8', 'vgw-5693ad22', 'Active', 'Yes', 'vgw-5693ad22 '),
('PrivateRouteTableA_VERI', 'rtb-0d7e4268', '10.161.40.0/26', 'tgw-09bee705ee37e8cb8', 'Active', 'No', ''),
('PrivateRouteTableA_VERI', 'rtb-0d7e4268', '192.168.6.0/24', 'tgw-09bee705ee37e8cb8', 'Active', 'No', ''),
('PrivateRouteTableA_VERI', 'rtb-0d7e4268', '10.72.16.0/20', 'local', 'Active', 'No', ''),
('PrivateRouteTableA_VERI', 'rtb-0d7e4268', '172.16.0.0/12', 'tgw-09bee705ee37e8cb8', 'Active', 'No', ''),
('PrivateRouteTableA_VERI', 'rtb-0d7e4268', '10.0.0.0/8', 'tgw-09bee705ee37e8cb8', 'Active', 'No', ''),
('PrivateRouteTableA_VERI', 'rtb-0d7e4268', '0.0.0.0/0', 'tgw-09bee705ee37e8cb8', 'Active', 'No', ''),
('RTB_VPC_STREAMING_PRI_C', 'rtb-bde98cc4', '10.10.24.0/26', 'tgw-09bee705ee37e8cb8', 'Active', 'No', ''),
('RTB_VPC_STREAMING_PRI_C', 'rtb-bde98cc4', '10.161.40.0/26', 'tgw-09bee705ee37e8cb8', 'Active', 'No', ''),
('RTB_VPC_STREAMING_PRI_C', 'rtb-bde98cc4', '10.10.23.0/24', 'tgw-09bee705ee37e8cb8', 'Active', 'No', ''),
('RTB_VPC_STREAMING_PRI_C', 'rtb-bde98cc4', '10.73.12.0/23', 'tgw-09bee705ee37e8cb8', 'Active', 'No', ''),
('RTB_VPC_STREAMING_PRI_C', 'rtb-bde98cc4', '10.64.0.0/20', 'local', 'Active', 'No', ''),
('RTB_VPC_STREAMING_PRI_C', 'rtb-bde98cc4', '0.0.0.0/0', 'tgw-09bee705ee37e8cb8', 'Active', 'No', ''),
('RTB_VPC_STREAMING_PRI_C', 'rtb-bde98cc4', '10.74.235.192/27', 'vgw-5693ad22', 'Active', 'Yes', 'vgw-5693ad22'),
('RTB_VPC_STREAMING_PRI_C', 'rtb-bde98cc4', '10.74.238.0/27', 'vgw-5693ad22', 'Active', 'Yes', 'vgw-5693ad22'),
('RTB_VPC_STREAMING_PRI_C', 'rtb-bde98cc4', '10.10.25.0/26', 'vgw-5693ad22', 'Active', 'Yes', 'vgw-5693ad22'),
('RTB_VPC_STREAMING_PRI_C', 'rtb-bde98cc4', '10.65.205.0/26', 'vgw-5693ad22', 'Active', 'Yes', 'vgw-5693ad22'),
('RTB_VPC_STREAMING_PRI_C', 'rtb-bde98cc4', '10.73.8.0/26', 'vgw-5693ad22', 'Active', 'Yes', 'vgw-5693ad22'),
('RTB_VPC_STREAMING_PRI_C', 'rtb-bde98cc4', '10.74.235.128/26', 'vgw-5693ad22', 'Active', 'Yes', 'vgw-5693ad22'),
('RTB_VPC_STREAMING_PRI_C', 'rtb-bde98cc4', '10.74.232.0/25', 'vgw-5693ad22', 'Active', 'Yes', 'vgw-5693ad22'),
('RTB_VPC_STREAMING_PRI_C', 'rtb-bde98cc4', '10.74.233.0/25', 'vgw-5693ad22', 'Active', 'Yes', 'vgw-5693ad22'),
('RTB_VPC_STREAMING_PRI_C', 'rtb-bde98cc4', '10.74.234.0/25', 'vgw-5693ad22', 'Active', 'Yes', 'vgw-5693ad22'),
('RTB_VPC_STREAMING_PRI_C', 'rtb-bde98cc4', '10.74.234.128/25', 'vgw-5693ad22', 'Active', 'Yes', 'vgw-5693ad22'),
('RTB_VPC_STREAMING_PRI_C', 'rtb-bde98cc4', '10.74.235.0/25', 'vgw-5693ad22', 'Active', 'Yes', 'vgw-5693ad22'),
('RTB_VPC_STREAMING_PRI_C', 'rtb-bde98cc4', '192.168.6.0/24', 'vgw-5693ad22', 'Active', 'Yes', 'vgw-5693ad22'),
('RTB_VPC_STREAMING_PRI_C', 'rtb-bde98cc4', '10.64.34.0/24', 'vgw-5693ad22', 'Active', 'Yes', 'vgw-5693ad22'),
('RTB_VPC_STREAMING_PRI_C', 'rtb-bde98cc4', '10.73.14.0/24', 'vgw-5693ad22', 'Active', 'Yes', 'vgw-5693ad22'),
('RTB_VPC_STREAMING_PRI_C', 'rtb-bde98cc4', '10.73.24.0/24', 'vgw-5693ad22', 'Active', 'Yes', 'vgw-5693ad22'),
('RTB_VPC_STREAMING_PRI_C', 'rtb-bde98cc4', '10.74.240.0/24', 'vgw-5693ad22', 'Active', 'Yes', 'vgw-5693ad22'),
('RTB_VPC_STREAMING_PRI_C', 'rtb-bde98cc4', '10.64.68.0/23', 'vgw-5693ad22', 'Active', 'Yes', 'vgw-5693ad22'),
('RTB_VPC_STREAMING_PRI_C', 'rtb-bde98cc4', '10.64.92.0/23', 'vgw-5693ad22', 'Active', 'Yes', 'vgw-5693ad22'),
('RTB_VPC_STREAMING_PRI_C', 'rtb-bde98cc4', '10.73.12.0/23', 'vgw-5693ad22', 'Active', 'Yes', 'vgw-5693ad22'),
('RTB_VPC_STREAMING_PRI_C', 'rtb-bde98cc4', '10.74.128.0/23', 'vgw-5693ad22', 'Active', 'Yes', 'vgw-5693ad22'),
('RTB_VPC_STREAMING_PRI_C', 'rtb-bde98cc4', '10.74.136.0/23', 'vgw-5693ad22', 'Active', 'Yes', 'vgw-5693ad22'),
('RTB_VPC_STREAMING_PRI_C', 'rtb-bde98cc4', '10.74.168.0/23', 'vgw-5693ad22', 'Active', 'Yes', 'vgw-5693ad22'),
('RTB_VPC_STREAMING_PRI_C', 'rtb-bde98cc4', '10.74.236.0/23', 'vgw-5693ad22', 'Active', 'Yes', 'vgw-5693ad22'),
('RTB_VPC_STREAMING_PRI_C', 'rtb-bde98cc4', '10.64.16.0/22', 'vgw-5693ad22', 'Active', 'Yes', 'vgw-5693ad22'),
('RTB_VPC_STREAMING_PRI_C', 'rtb-bde98cc4', '10.64.44.0/22', 'vgw-5693ad22', 'Active', 'Yes', 'vgw-5693ad22'),
('RTB_VPC_STREAMING_PRI_C', 'rtb-bde98cc4', '10.64.48.0/22', 'vgw-5693ad22', 'Active', 'Yes', 'vgw-5693ad22'),
('RTB_VPC_STREAMING_PRI_C', 'rtb-bde98cc4', '10.64.80.0/22', 'vgw-5693ad22', 'Active', 'Yes', 'vgw-5693ad22'),
('RTB_VPC_STREAMING_PRI_C', 'rtb-bde98cc4', '10.64.84.0/22', 'vgw-5693ad22', 'Active', 'Yes', 'vgw-5693ad22'),
('RTB_VPC_STREAMING_PRI_C', 'rtb-bde98cc4', '10.65.0.0/22', 'vgw-5693ad22', 'Active', 'Yes', 'vgw-5693ad22'),
('RTB_VPC_STREAMING_PRI_C', 'rtb-bde98cc4', '10.65.76.0/22', 'vgw-5693ad22', 'Active', 'Yes', 'vgw-5693ad22'),
('RTB_VPC_STREAMING_PRI_C', 'rtb-bde98cc4', '10.72.96.0/22', 'vgw-5693ad22', 'Active', 'Yes', 'vgw-5693ad22'),
('RTB_VPC_STREAMING_PRI_C', 'rtb-bde98cc4', '10.72.100.0/22', 'vgw-5693ad22', 'Active', 'Yes', 'vgw-5693ad22'),
('RTB_VPC_STREAMING_PRI_C', 'rtb-bde98cc4', '10.73.4.0/22', 'vgw-5693ad22', 'Active', 'Yes', 'vgw-5693ad22'),
('RTB_VPC_STREAMING_PRI_C', 'rtb-bde98cc4', '10.73.48.0/22', 'vgw-5693ad22', 'Active', 'Yes', 'vgw-5693ad22'),
('RTB_VPC_STREAMING_PRI_C', 'rtb-bde98cc4', '10.73.52.0/22', 'vgw-5693ad22', 'Active', 'Yes', 'vgw-5693ad22'),
('RTB_VPC_STREAMING_PRI_C', 'rtb-bde98cc4', '10.74.140.0/22', 'vgw-5693ad22', 'Active', 'Yes', 'vgw-5693ad22'),
('RTB_VPC_STREAMING_PRI_C', 'rtb-bde98cc4', '10.74.144.0/22', 'vgw-5693ad22', 'Active', 'Yes', 'vgw-5693ad22'),
('RTB_VPC_STREAMING_PRI_C', 'rtb-bde98cc4', '10.64.72.0/21', 'vgw-5693ad22', 'Active', 'Yes', 'vgw-5693ad22'),
('RTB_VPC_STREAMING_PRI_C', 'rtb-bde98cc4', '10.64.88.0/21', 'vgw-5693ad22', 'Active', 'Yes', 'vgw-5693ad22'),
('RTB_VPC_STREAMING_PRI_C', 'rtb-bde98cc4', '10.72.104.0/21', 'vgw-5693ad22', 'Active', 'Yes', 'vgw-5693ad22'),
('RTB_VPC_STREAMING_PRI_C', 'rtb-bde98cc4', '10.72.160.0/21', 'vgw-5693ad22', 'Active', 'Yes', 'vgw-5693ad22'),
('RTB_VPC_STREAMING_PRI_C', 'rtb-bde98cc4', '10.72.168.0/21', 'vgw-5693ad22', 'Active', 'Yes', 'vgw-5693ad22'),
('RTB_VPC_STREAMING_PRI_C', 'rtb-bde98cc4', '10.73.16.0/21', 'vgw-5693ad22', 'Active', 'Yes', 'vgw-5693ad22'),
('RTB_VPC_STREAMING_PRI_C', 'rtb-bde98cc4', '192.168.48.0/20', 'vgw-5693ad22', 'Active', 'Yes', 'vgw-5693ad22'),
('RTB_VPC_STREAMING_PRI_C', 'rtb-bde98cc4', '10.74.0.0/17', 'vgw-5693ad22', 'Active', 'Yes', 'vgw-5693ad22'),
('RTB_VPC_STREAMING_PRI_C', 'rtb-bde98cc4', '10.64.0.0/16', 'vgw-5693ad22', 'Active', 'Yes', 'vgw-5693ad22'),
('RTB_VPC_STREAMING_PRI_C', 'rtb-bde98cc4', '10.65.0.0/16', 'vgw-5693ad22', 'Active', 'Yes', 'vgw-5693ad22'),
('RTB_VPC_STREAMING_PRI_C', 'rtb-bde98cc4', '10.66.0.0/16', 'vgw-5693ad22', 'Active', 'Yes', 'vgw-5693ad22'),
('RTB_VPC_STREAMING_PRI_C', 'rtb-bde98cc4', '10.70.0.0/16', 'vgw-5693ad22', 'Active', 'Yes', 'vgw-5693ad22'),
('RTB_VPC_STREAMING_PRI_C', 'rtb-bde98cc4', '10.72.0.0/16', 'vgw-5693ad22', 'Active', 'Yes', 'vgw-5693ad22'),
('RTB_VPC_STREAMING_PRI_C', 'rtb-bde98cc4', '10.75.0.0/16', 'vgw-5693ad22', 'Active', 'Yes', 'vgw-5693ad22'),
('RTB_VPC_STREAMING_PRI_C', 'rtb-bde98cc4', '10.182.0.0/16', 'vgw-5693ad22', 'Active', 'Yes', 'vgw-5693ad22'),
('RTB_VPC_STREAMING_PRI_C', 'rtb-bde98cc4', '10.76.0.0/14', 'vgw-5693ad22', 'Active', 'Yes', 'vgw-5693ad22'),
('RTB_VPC_STREAMING_PRI_C', 'rtb-bde98cc4', '172.16.0.0/12', 'vgw-5693ad22', 'Active', 'Yes', 'vgw-5693ad22'),
('RTB_VPC_STREAMING_PRI_C', 'rtb-bde98cc4', '10.80.0.0/12', 'vgw-5693ad22', 'Active', 'Yes', 'vgw-5693ad22'),
('RTB_VPC_STREAMING_PRI_C', 'rtb-bde98cc4', '10.96.0.0/11', 'vgw-5693ad22', 'Active', 'Yes', 'vgw-5693ad22'),
('RTB_VPC_STREAMING_PRI_C', 'rtb-bde98cc4', '10.0.0.0/10', 'vgw-5693ad22', 'Active', 'Yes', 'vgw-5693ad22'),
('RTB_VPC_STREAMING_PRI_C', 'rtb-bde98cc4', '10.128.0.0/9', 'vgw-5693ad22', 'Active', 'Yes', 'vgw-5693ad22'),
('RTB_VPC_STREAMING_PRI_C', 'rtb-bde98cc4', '10.0.0.0/8', 'vgw-5693ad22', 'Active', 'Yes', 'vgw-5693ad22'),
('RTB_VPC_EOL_PUB', 'rtb-0be1ce2cb87bb0c19', '192.168.6.0/24', 'tgw-09bee705ee37e8cb8', 'Active', 'No', ''),
('RTB_VPC_EOL_PUB', 'rtb-0be1ce2cb87bb0c19', '10.64.33.0/24', 'local', 'Active', 'No', ''),
('RTB_VPC_EOL_PUB', 'rtb-0be1ce2cb87bb0c19', '10.64.244.0/23', 'local', 'Active', 'No', ''),
('RTB_VPC_EOL_PUB', 'rtb-0be1ce2cb87bb0c19', '172.16.0.0/12', 'tgw-09bee705ee37e8cb8', 'Active', 'No', ''),
('RTB_VPC_EOL_PUB', 'rtb-0be1ce2cb87bb0c19', '10.0.0.0/8', 'tgw-09bee705ee37e8cb8', 'Active', 'No', ''),
('RTB_VPC_EOL_PUB', 'rtb-0be1ce2cb87bb0c19', '0.0.0.0/0', 'igw-07b6e98d10c98652b', 'Active', 'No', ''),
('–', 'rtb-5ff59026', '10.64.0.0/20', 'local', 'Active', 'No', ''),
('RTB_VESA-PROD-PF_PUB', 'rtb-0eafdfd338866ef54', '192.168.6.0/24', 'tgw-09bee705ee37e8cb8', 'Active', 'No', ''),
('RTB_VESA-PROD-PF_PUB', 'rtb-0eafdfd338866ef54', '10.72.114.0/23', 'local', 'Active', 'No', ''),
('RTB_VESA-PROD-PF_PUB', 'rtb-0eafdfd338866ef54', '172.16.0.0/12', 'tgw-09bee705ee37e8cb8', 'Active', 'No', ''),
('RTB_VESA-PROD-PF_PUB', 'rtb-0eafdfd338866ef54', '10.0.0.0/8', 'tgw-09bee705ee37e8cb8', 'Active', 'No', ''),
('RTB_VESA-PROD-PF_PUB', 'rtb-0eafdfd338866ef54', '0.0.0.0/0', 'igw-042f6d2934a39e595', 'Active', 'No', ''),
('PublicRouteTableB', 'rtb-b918a0dc', '10.79.128.0/25', 'tgw-09bee705ee37e8cb8', 'Active', 'No', ''),
('PublicRouteTableB', 'rtb-b918a0dc', '10.79.128.128/25', 'tgw-09bee705ee37e8cb8', 'Active', 'No', ''),
('PublicRouteTableB', 'rtb-b918a0dc', '192.168.6.0/24', 'tgw-09bee705ee37e8cb8', 'Active', 'No', ''),
('PublicRouteTableB', 'rtb-b918a0dc', '10.79.129.0/24', 'tgw-09bee705ee37e8cb8', 'Active', 'No', ''),
('PublicRouteTableB', 'rtb-b918a0dc', '10.73.10.0/23', 'pcx-07061cf6c126e11c0', 'Active', 'No', ''),
('PublicRouteTableB', 'rtb-b918a0dc', '10.65.0.0/22', 'tgw-09bee705ee37e8cb8', 'Active', 'No', ''),
('PublicRouteTableB', 'rtb-b918a0dc', '10.65.8.0/22', 'pcx-bf85a5d6', 'Blackhole', 'No', ''),
('PublicRouteTableB', 'rtb-b918a0dc', '10.73.16.0/21', 'tgw-09bee705ee37e8cb8', 'Active', 'No', ''),
('PublicRouteTableB', 'rtb-b918a0dc', '10.66.0.0/16', 'local', 'Active', 'No', ''),
('PublicRouteTableB', 'rtb-b918a0dc', '172.16.0.0/12', 'tgw-09bee705ee37e8cb8', 'Active', 'No', ''),
('PublicRouteTableB', 'rtb-b918a0dc', '10.0.0.0/8', 'tgw-09bee705ee37e8cb8', 'Active', 'No', ''),
('PublicRouteTableB', 'rtb-b918a0dc', '0.0.0.0/0', 'igw-75a86110', 'Active', 'No', ''),
('DefaultRouteTable_VERI', 'rtb-397e425c', '10.72.16.0/20', 'local', 'Active', 'No', ''),
('RTB_VPC_STREAMING_PRI_B', 'rtb-09ea8f70', '10.10.24.0/26', 'tgw-09bee705ee37e8cb8', 'Active', 'No', ''),
('RTB_VPC_STREAMING_PRI_B', 'rtb-09ea8f70', '10.161.40.0/26', 'tgw-09bee705ee37e8cb8', 'Active', 'No', ''),
('RTB_VPC_STREAMING_PRI_B', 'rtb-09ea8f70', '10.72.44.0/25', 'tgw-09bee705ee37e8cb8', 'Active', 'No', ''),
('RTB_VPC_STREAMING_PRI_B', 'rtb-09ea8f70', '10.10.23.0/24', 'tgw-09bee705ee37e8cb8', 'Active', 'No', ''),
('RTB_VPC_STREAMING_PRI_B', 'rtb-09ea8f70', '10.72.36.0/24', 'tgw-09bee705ee37e8cb8', 'Active', 'No', ''),
('RTB_VPC_STREAMING_PRI_B', 'rtb-09ea8f70', '10.64.246.0/23', 'tgw-09bee705ee37e8cb8', 'Active', 'No', ''),
('RTB_VPC_STREAMING_PRI_B', 'rtb-09ea8f70', '10.72.114.0/23', 'tgw-09bee705ee37e8cb8', 'Active', 'No', ''),
('RTB_VPC_STREAMING_PRI_B', 'rtb-09ea8f70', '10.73.12.0/23', 'tgw-09bee705ee37e8cb8', 'Active', 'No', ''),
('RTB_VPC_STREAMING_PRI_B', 'rtb-09ea8f70', '10.65.168.0/21', 'tgw-09bee705ee37e8cb8', 'Active', 'No', ''),
('RTB_VPC_STREAMING_PRI_B', 'rtb-09ea8f70', '10.64.0.0/20', 'local', 'Active', 'No', ''),
('RTB_VPC_STREAMING_PRI_B', 'rtb-09ea8f70', '10.66.0.0/16', 'tgw-09bee705ee37e8cb8', 'Active', 'No', ''),
('RTB_VPC_STREAMING_PRI_B', 'rtb-09ea8f70', '0.0.0.0/0', 'tgw-09bee705ee37e8cb8', 'Active', 'No', ''),
('RTB_VPC_STREAMING_PRI_B', 'rtb-09ea8f70', '10.74.235.192/27', 'vgw-5693ad22', 'Active', 'Yes', 'vgw-5693ad22'),
('RTB_VPC_STREAMING_PRI_B', 'rtb-09ea8f70', '10.74.238.0/27', 'vgw-5693ad22', 'Active', 'Yes', 'vgw-5693ad22'),
('RTB_VPC_STREAMING_PRI_B', 'rtb-09ea8f70', '10.10.25.0/26', 'vgw-5693ad22', 'Active', 'Yes', 'vgw-5693ad22'),
('RTB_VPC_STREAMING_PRI_B', 'rtb-09ea8f70', '10.65.205.0/26', 'vgw-5693ad22', 'Active', 'Yes', 'vgw-5693ad22'),
('RTB_VPC_STREAMING_PRI_B', 'rtb-09ea8f70', '10.73.8.0/26', 'vgw-5693ad22', 'Active', 'Yes', 'vgw-5693ad22'),
('RTB_VPC_STREAMING_PRI_B', 'rtb-09ea8f70', '10.74.235.128/26', 'vgw-5693ad22', 'Active', 'Yes', 'vgw-5693ad22'),
('RTB_VPC_STREAMING_PRI_B', 'rtb-09ea8f70', '10.74.232.0/25', 'vgw-5693ad22', 'Active', 'Yes', 'vgw-5693ad22'),
('RTB_VPC_STREAMING_PRI_B', 'rtb-09ea8f70', '10.74.233.0/25', 'vgw-5693ad22', 'Active', 'Yes', 'vgw-5693ad22'),
('RTB_VPC_STREAMING_PRI_B', 'rtb-09ea8f70', '10.74.234.0/25', 'vgw-5693ad22', 'Active', 'Yes', 'vgw-5693ad22'),
('RTB_VPC_STREAMING_PRI_B', 'rtb-09ea8f70', '10.74.234.128/25', 'vgw-5693ad22', 'Active', 'Yes', 'vgw-5693ad22'),
('RTB_VPC_STREAMING_PRI_B', 'rtb-09ea8f70', '10.74.235.0/25', 'vgw-5693ad22', 'Active', 'Yes', 'vgw-5693ad22'),
('RTB_VPC_STREAMING_PRI_B', 'rtb-09ea8f70', '192.168.6.0/24', 'vgw-5693ad22', 'Active', 'Yes', 'vgw-5693ad22'),
('RTB_VPC_STREAMING_PRI_B', 'rtb-09ea8f70', '10.64.34.0/24', 'vgw-5693ad22', 'Active', 'Yes', 'vgw-5693ad22'),
('RTB_VPC_STREAMING_PRI_B', 'rtb-09ea8f70', '10.73.14.0/24', 'vgw-5693ad22', 'Active', 'Yes', 'vgw-5693ad22'),
('RTB_VPC_STREAMING_PRI_B', 'rtb-09ea8f70', '10.73.24.0/24', 'vgw-5693ad22', 'Active', 'Yes', 'vgw-5693ad22'),
('RTB_VPC_STREAMING_PRI_B', 'rtb-09ea8f70', '10.74.240.0/24', 'vgw-5693ad22', 'Active', 'Yes', 'vgw-5693ad22'),
('RTB_VPC_STREAMING_PRI_B', 'rtb-09ea8f70', '10.64.68.0/23', 'vgw-5693ad22', 'Active', 'Yes', 'vgw-5693ad22'),
('RTB_VPC_STREAMING_PRI_B', 'rtb-09ea8f70', '10.64.92.0/23', 'vgw-5693ad22', 'Active', 'Yes', 'vgw-5693ad22'),
('RTB_VPC_STREAMING_PRI_B', 'rtb-09ea8f70', '10.73.12.0/23', 'vgw-5693ad22', 'Active', 'Yes', 'vgw-5693ad22'),
('RTB_VPC_STREAMING_PRI_B', 'rtb-09ea8f70', '10.74.128.0/23', 'vgw-5693ad22', 'Active', 'Yes', 'vgw-5693ad22'),
('RTB_VPC_STREAMING_PRI_B', 'rtb-09ea8f70', '10.74.136.0/23', 'vgw-5693ad22', 'Active', 'Yes', 'vgw-5693ad22'),
('RTB_VPC_STREAMING_PRI_B', 'rtb-09ea8f70', '10.74.168.0/23', 'vgw-5693ad22', 'Active', 'Yes', 'vgw-5693ad22'),
('RTB_VPC_STREAMING_PRI_B', 'rtb-09ea8f70', '10.74.236.0/23', 'vgw-5693ad22', 'Active', 'Yes', 'vgw-5693ad22'),
('RTB_VPC_STREAMING_PRI_B', 'rtb-09ea8f70', '10.64.16.0/22', 'vgw-5693ad22', 'Active', 'Yes', 'vgw-5693ad22'),
('RTB_VPC_STREAMING_PRI_B', 'rtb-09ea8f70', '10.64.44.0/22', 'vgw-5693ad22', 'Active', 'Yes', 'vgw-5693ad22'),
('RTB_VPC_STREAMING_PRI_B', 'rtb-09ea8f70', '10.64.48.0/22', 'vgw-5693ad22', 'Active', 'Yes', 'vgw-5693ad22'),
('RTB_VPC_STREAMING_PRI_B', 'rtb-09ea8f70', '10.64.80.0/22', 'vgw-5693ad22', 'Active', 'Yes', 'vgw-5693ad22'),
('RTB_VPC_STREAMING_PRI_B', 'rtb-09ea8f70', '10.64.84.0/22', 'vgw-5693ad22', 'Active', 'Yes', 'vgw-5693ad22'),
('RTB_VPC_STREAMING_PRI_B', 'rtb-09ea8f70', '10.65.0.0/22', 'vgw-5693ad22', 'Active', 'Yes', 'vgw-5693ad22'),
('RTB_VPC_STREAMING_PRI_B', 'rtb-09ea8f70', '10.65.76.0/22', 'vgw-5693ad22', 'Active', 'Yes', 'vgw-5693ad22'),
('RTB_VPC_STREAMING_PRI_B', 'rtb-09ea8f70', '10.72.96.0/22', 'vgw-5693ad22', 'Active', 'Yes', 'vgw-5693ad22'),
('RTB_VPC_STREAMING_PRI_B', 'rtb-09ea8f70', '10.72.100.0/22', 'vgw-5693ad22', 'Active', 'Yes', 'vgw-5693ad22'),
('RTB_VPC_STREAMING_PRI_B', 'rtb-09ea8f70', '10.73.4.0/22', 'vgw-5693ad22', 'Active', 'Yes', 'vgw-5693ad22'),
('RTB_VPC_STREAMING_PRI_B', 'rtb-09ea8f70', '10.73.48.0/22', 'vgw-5693ad22', 'Active', 'Yes', 'vgw-5693ad22'),
('RTB_VPC_STREAMING_PRI_B', 'rtb-09ea8f70', '10.73.52.0/22', 'vgw-5693ad22', 'Active', 'Yes', 'vgw-5693ad22'),
('RTB_VPC_STREAMING_PRI_B', 'rtb-09ea8f70', '10.74.140.0/22', 'vgw-5693ad22', 'Active', 'Yes', 'vgw-5693ad22'),
('RTB_VPC_STREAMING_PRI_B', 'rtb-09ea8f70', '10.74.144.0/22', 'vgw-5693ad22', 'Active', 'Yes', 'vgw-5693ad22'),
('RTB_VPC_STREAMING_PRI_B', 'rtb-09ea8f70', '10.64.72.0/21', 'vgw-5693ad22', 'Active', 'Yes', 'vgw-5693ad22'),
('RTB_VPC_STREAMING_PRI_B', 'rtb-09ea8f70', '10.64.88.0/21', 'vgw-5693ad22', 'Active', 'Yes', 'vgw-5693ad22'),
('RTB_VPC_STREAMING_PRI_B', 'rtb-09ea8f70', '10.72.104.0/21', 'vgw-5693ad22', 'Active', 'Yes', 'vgw-5693ad22'),
('RTB_VPC_STREAMING_PRI_B', 'rtb-09ea8f70', '10.72.160.0/21', 'vgw-5693ad22', 'Active', 'Yes', 'vgw-5693ad22'),
('RTB_VPC_STREAMING_PRI_B', 'rtb-09ea8f70', '10.72.168.0/21', 'vgw-5693ad22', 'Active', 'Yes', 'vgw-5693ad22'),
('RTB_VPC_STREAMING_PRI_B', 'rtb-09ea8f70', '10.73.16.0/21', 'vgw-5693ad22', 'Active', 'Yes', 'vgw-5693ad22'),
('RTB_VPC_STREAMING_PRI_B', 'rtb-09ea8f70', '192.168.48.0/20', 'vgw-5693ad22', 'Active', 'Yes', 'vgw-5693ad22'),
('RTB_VPC_STREAMING_PRI_B', 'rtb-09ea8f70', '10.74.0.0/17', 'vgw-5693ad22', 'Active', 'Yes', 'vgw-5693ad22'),
('RTB_VPC_STREAMING_PRI_B', 'rtb-09ea8f70', '10.64.0.0/16', 'vgw-5693ad22', 'Active', 'Yes', 'vgw-5693ad22'),
('RTB_VPC_STREAMING_PRI_B', 'rtb-09ea8f70', '10.65.0.0/16', 'vgw-5693ad22', 'Active', 'Yes', 'vgw-5693ad22'),
('RTB_VPC_STREAMING_PRI_B', 'rtb-09ea8f70', '10.66.0.0/16', 'vgw-5693ad22', 'Active', 'Yes', 'vgw-5693ad22'),
('RTB_VPC_STREAMING_PRI_B', 'rtb-09ea8f70', '10.70.0.0/16', 'vgw-5693ad22', 'Active', 'Yes', 'vgw-5693ad22'),
('RTB_VPC_STREAMING_PRI_B', 'rtb-09ea8f70', '10.72.0.0/16', 'vgw-5693ad22', 'Active', 'Yes', 'vgw-5693ad22'),
('RTB_VPC_STREAMING_PRI_B', 'rtb-09ea8f70', '10.75.0.0/16', 'vgw-5693ad22', 'Active', 'Yes', 'vgw-5693ad22'),
('RTB_VPC_STREAMING_PRI_B', 'rtb-09ea8f70', '10.182.0.0/16', 'vgw-5693ad22', 'Active', 'Yes', 'vgw-5693ad22'),
('RTB_VPC_STREAMING_PRI_B', 'rtb-09ea8f70', '10.76.0.0/14', 'vgw-5693ad22', 'Active', 'Yes', 'vgw-5693ad22'),
('RTB_VPC_STREAMING_PRI_B', 'rtb-09ea8f70', '172.16.0.0/12', 'vgw-5693ad22', 'Active', 'Yes', 'vgw-5693ad22'),
('RTB_VPC_STREAMING_PRI_B', 'rtb-09ea8f70', '10.80.0.0/12', 'vgw-5693ad22', 'Active', 'Yes', 'vgw-5693ad22'),
('RTB_VPC_STREAMING_PRI_B', 'rtb-09ea8f70', '10.96.0.0/11', 'vgw-5693ad22', 'Active', 'Yes', 'vgw-5693ad22'),
('RTB_VPC_STREAMING_PRI_B', 'rtb-09ea8f70', '10.0.0.0/10', 'vgw-5693ad22', 'Active', 'Yes', 'vgw-5693ad22'),
('RTB_VPC_STREAMING_PRI_B', 'rtb-09ea8f70', '10.128.0.0/9', 'vgw-5693ad22', 'Active', 'Yes', 'vgw-5693ad22'),
('RTB_VPC_STREAMING_PRI_B', 'rtb-09ea8f70', '10.0.0.0/8', 'vgw-5693ad22', 'Active', 'Yes', 'vgw-5693ad22'),
('RTB_VESA-ACCESS-WAF-PROD-IRELAND_PUB', 'rtb-0a81a16e549552ed5', '10.65.150.0/23', 'local', 'Active', 'No', ''),
('RTB_VESA-ACCESS-WAF-PROD-IRELAND_PUB', 'rtb-0a81a16e549552ed5', '0.0.0.0/0', 'igw-04400028c49cfa24f', 'Active', 'No', ''),
('RTB_VPC_EOL_PRI', 'rtb-07ab5cbce7b12ba8b', '192.168.6.0/24', 'tgw-09bee705ee37e8cb8', 'Active', 'No', ''),
('RTB_VPC_EOL_PRI', 'rtb-07ab5cbce7b12ba8b', '10.64.33.0/24', 'local', 'Active', 'No', ''),
('RTB_VPC_EOL_PRI', 'rtb-07ab5cbce7b12ba8b', '10.64.244.0/23', 'local', 'Active', 'No', ''),
('RTB_VPC_EOL_PRI', 'rtb-07ab5cbce7b12ba8b', '172.16.0.0/12', 'tgw-09bee705ee37e8cb8', 'Active', 'No', ''),
('RTB_VPC_EOL_PRI', 'rtb-07ab5cbce7b12ba8b', '10.0.0.0/8', 'tgw-09bee705ee37e8cb8', 'Active', 'No', ''),
('RTB_VPC_EOL_PRI', 'rtb-07ab5cbce7b12ba8b', '0.0.0.0/0', 'tgw-09bee705ee37e8cb8', 'Active', 'No', ''),
('RTB_VPC_EOL_PRI', 'rtb-07ab5cbce7b12ba8b', 'pl-6da54004', 'vpce-07dcf86962d1fe7f8', 'Active', 'No', ''),
('RTB_VPC_STREAMING_PUB', 'rtb-96f590ef', '10.10.24.0/26', 'tgw-09bee705ee37e8cb8', 'Active', 'No', ''),
('RTB_VPC_STREAMING_PUB', 'rtb-96f590ef', '10.10.23.0/24', 'tgw-09bee705ee37e8cb8', 'Active', 'No', ''),
('RTB_VPC_STREAMING_PUB', 'rtb-96f590ef', '10.73.12.0/23', 'tgw-09bee705ee37e8cb8', 'Active', 'No', ''),
('RTB_VPC_STREAMING_PUB', 'rtb-96f590ef', '10.64.0.0/20', 'local', 'Active', 'No', ''),
('RTB_VPC_STREAMING_PUB', 'rtb-96f590ef', '0.0.0.0/0', 'igw-e1f3b486', 'Active', 'No', ''),
('RTB_VPC_STREAMING_PUB', 'rtb-96f590ef', '10.74.235.192/27', 'vgw-5693ad22', 'Active', 'Yes', 'vgw-5693ad22'),
('RTB_VPC_STREAMING_PUB', 'rtb-96f590ef', '10.74.238.0/27', 'vgw-5693ad22', 'Active', 'Yes', 'vgw-5693ad22'),
('RTB_VPC_STREAMING_PUB', 'rtb-96f590ef', '10.10.25.0/26', 'vgw-5693ad22', 'Active', 'Yes', 'vgw-5693ad22'),
('RTB_VPC_STREAMING_PUB', 'rtb-96f590ef', '10.65.205.0/26', 'vgw-5693ad22', 'Active', 'Yes', 'vgw-5693ad22'),
('RTB_VPC_STREAMING_PUB', 'rtb-96f590ef', '10.73.8.0/26', 'vgw-5693ad22', 'Active', 'Yes', 'vgw-5693ad22'),
('RTB_VPC_STREAMING_PUB', 'rtb-96f590ef', '10.74.235.128/26', 'vgw-5693ad22', 'Active', 'Yes', 'vgw-5693ad22'),
('RTB_VPC_STREAMING_PUB', 'rtb-96f590ef', '10.74.232.0/25', 'vgw-5693ad22', 'Active', 'Yes', 'vgw-5693ad22'),
('RTB_VPC_STREAMING_PUB', 'rtb-96f590ef', '10.74.233.0/25', 'vgw-5693ad22', 'Active', 'Yes', 'vgw-5693ad22'),
('RTB_VPC_STREAMING_PUB', 'rtb-96f590ef', '10.74.234.0/25', 'vgw-5693ad22', 'Active', 'Yes', 'vgw-5693ad22'),
('RTB_VPC_STREAMING_PUB', 'rtb-96f590ef', '10.74.234.128/25', 'vgw-5693ad22', 'Active', 'Yes', 'vgw-5693ad22'),
('RTB_VPC_STREAMING_PUB', 'rtb-96f590ef', '10.74.235.0/25', 'vgw-5693ad22', 'Active', 'Yes', 'vgw-5693ad22'),
('RTB_VPC_STREAMING_PUB', 'rtb-96f590ef', '192.168.6.0/24', 'vgw-5693ad22', 'Active', 'Yes', 'vgw-5693ad22'),
('RTB_VPC_STREAMING_PUB', 'rtb-96f590ef', '10.64.34.0/24', 'vgw-5693ad22', 'Active', 'Yes', 'vgw-5693ad22'),
('RTB_VPC_STREAMING_PUB', 'rtb-96f590ef', '10.73.14.0/24', 'vgw-5693ad22', 'Active', 'Yes', 'vgw-5693ad22'),
('RTB_VPC_STREAMING_PUB', 'rtb-96f590ef', '10.73.24.0/24', 'vgw-5693ad22', 'Active', 'Yes', 'vgw-5693ad22'),
('RTB_VPC_STREAMING_PUB', 'rtb-96f590ef', '10.74.240.0/24', 'vgw-5693ad22', 'Active', 'Yes', 'vgw-5693ad22'),
('RTB_VPC_STREAMING_PUB', 'rtb-96f590ef', '10.64.68.0/23', 'vgw-5693ad22', 'Active', 'Yes', 'vgw-5693ad22'),
('RTB_VPC_STREAMING_PUB', 'rtb-96f590ef', '10.64.92.0/23', 'vgw-5693ad22', 'Active', 'Yes', 'vgw-5693ad22'),
('RTB_VPC_STREAMING_PUB', 'rtb-96f590ef', '10.73.12.0/23', 'vgw-5693ad22', 'Active', 'Yes', 'vgw-5693ad22'),
('RTB_VPC_STREAMING_PUB', 'rtb-96f590ef', '10.74.128.0/23', 'vgw-5693ad22', 'Active', 'Yes', 'vgw-5693ad22'),
('RTB_VPC_STREAMING_PUB', 'rtb-96f590ef', '10.74.136.0/23', 'vgw-5693ad22', 'Active', 'Yes', 'vgw-5693ad22'),
('RTB_VPC_STREAMING_PUB', 'rtb-96f590ef', '10.74.168.0/23', 'vgw-5693ad22', 'Active', 'Yes', 'vgw-5693ad22'),
('RTB_VPC_STREAMING_PUB', 'rtb-96f590ef', '10.74.236.0/23', 'vgw-5693ad22', 'Active', 'Yes', 'vgw-5693ad22'),
('RTB_VPC_STREAMING_PUB', 'rtb-96f590ef', '10.64.16.0/22', 'vgw-5693ad22', 'Active', 'Yes', 'vgw-5693ad22'),
('RTB_VPC_STREAMING_PUB', 'rtb-96f590ef', '10.64.44.0/22', 'vgw-5693ad22', 'Active', 'Yes', 'vgw-5693ad22'),
('RTB_VPC_STREAMING_PUB', 'rtb-96f590ef', '10.64.48.0/22', 'vgw-5693ad22', 'Active', 'Yes', 'vgw-5693ad22'),
('RTB_VPC_STREAMING_PUB', 'rtb-96f590ef', '10.64.80.0/22', 'vgw-5693ad22', 'Active', 'Yes', 'vgw-5693ad22'),
('RTB_VPC_STREAMING_PUB', 'rtb-96f590ef', '10.64.84.0/22', 'vgw-5693ad22', 'Active', 'Yes', 'vgw-5693ad22'),
('RTB_VPC_STREAMING_PUB', 'rtb-96f590ef', '10.65.0.0/22', 'vgw-5693ad22', 'Active', 'Yes', 'vgw-5693ad22'),
('RTB_VPC_STREAMING_PUB', 'rtb-96f590ef', '10.65.76.0/22', 'vgw-5693ad22', 'Active', 'Yes', 'vgw-5693ad22'),
('RTB_VPC_STREAMING_PUB', 'rtb-96f590ef', '10.72.96.0/22', 'vgw-5693ad22', 'Active', 'Yes', 'vgw-5693ad22'),
('RTB_VPC_STREAMING_PUB', 'rtb-96f590ef', '10.72.100.0/22', 'vgw-5693ad22', 'Active', 'Yes', 'vgw-5693ad22'),
('RTB_VPC_STREAMING_PUB', 'rtb-96f590ef', '10.73.4.0/22', 'vgw-5693ad22', 'Active', 'Yes', 'vgw-5693ad22'),
('RTB_VPC_STREAMING_PUB', 'rtb-96f590ef', '10.73.48.0/22', 'vgw-5693ad22', 'Active', 'Yes', 'vgw-5693ad22'),
('RTB_VPC_STREAMING_PUB', 'rtb-96f590ef', '10.73.52.0/22', 'vgw-5693ad22', 'Active', 'Yes', 'vgw-5693ad22'),
('RTB_VPC_STREAMING_PUB', 'rtb-96f590ef', '10.74.140.0/22', 'vgw-5693ad22', 'Active', 'Yes', 'vgw-5693ad22'),
('RTB_VPC_STREAMING_PUB', 'rtb-96f590ef', '10.74.144.0/22', 'vgw-5693ad22', 'Active', 'Yes', 'vgw-5693ad22'),
('RTB_VPC_STREAMING_PUB', 'rtb-96f590ef', '10.64.72.0/21', 'vgw-5693ad22', 'Active', 'Yes', 'vgw-5693ad22'),
('RTB_VPC_STREAMING_PUB', 'rtb-96f590ef', '10.64.88.0/21', 'vgw-5693ad22', 'Active', 'Yes', 'vgw-5693ad22'),
('RTB_VPC_STREAMING_PUB', 'rtb-96f590ef', '10.72.104.0/21', 'vgw-5693ad22', 'Active', 'Yes', 'vgw-5693ad22'),
('RTB_VPC_STREAMING_PUB', 'rtb-96f590ef', '10.72.160.0/21', 'vgw-5693ad22', 'Active', 'Yes', 'vgw-5693ad22'),
('RTB_VPC_STREAMING_PUB', 'rtb-96f590ef', '10.72.168.0/21', 'vgw-5693ad22', 'Active', 'Yes', 'vgw-5693ad22'),
('RTB_VPC_STREAMING_PUB', 'rtb-96f590ef', '10.73.16.0/21', 'vgw-5693ad22', 'Active', 'Yes', 'vgw-5693ad22'),
('RTB_VPC_STREAMING_PUB', 'rtb-96f590ef', '192.168.48.0/20', 'vgw-5693ad22', 'Active', 'Yes', 'vgw-5693ad22'),
('RTB_VPC_STREAMING_PUB', 'rtb-96f590ef', '10.74.0.0/17', 'vgw-5693ad22', 'Active', 'Yes', 'vgw-5693ad22'),
('RTB_VPC_STREAMING_PUB', 'rtb-96f590ef', '10.64.0.0/16', 'vgw-5693ad22', 'Active', 'Yes', 'vgw-5693ad22'),
('RTB_VPC_STREAMING_PUB', 'rtb-96f590ef', '10.65.0.0/16', 'vgw-5693ad22', 'Active', 'Yes', 'vgw-5693ad22'),
('RTB_VPC_STREAMING_PUB', 'rtb-96f590ef', '10.66.0.0/16', 'vgw-5693ad22', 'Active', 'Yes', 'vgw-5693ad22'),
('RTB_VPC_STREAMING_PUB', 'rtb-96f590ef', '10.70.0.0/16', 'vgw-5693ad22', 'Active', 'Yes', 'vgw-5693ad22'),
('RTB_VPC_STREAMING_PUB', 'rtb-96f590ef', '10.72.0.0/16', 'vgw-5693ad22', 'Active', 'Yes', 'vgw-5693ad22'),
('RTB_VPC_STREAMING_PUB', 'rtb-96f590ef', '10.75.0.0/16', 'vgw-5693ad22', 'Active', 'Yes', 'vgw-5693ad22'),
('RTB_VPC_STREAMING_PUB', 'rtb-96f590ef', '10.182.0.0/16', 'vgw-5693ad22', 'Active', 'Yes', 'vgw-5693ad22'),
('RTB_VPC_STREAMING_PUB', 'rtb-96f590ef', '10.76.0.0/14', 'vgw-5693ad22', 'Active', 'Yes', 'vgw-5693ad22'),
('RTB_VPC_STREAMING_PUB', 'rtb-96f590ef', '172.16.0.0/12', 'vgw-5693ad22', 'Active', 'Yes', 'vgw-5693ad22'),
('RTB_VPC_STREAMING_PUB', 'rtb-96f590ef', '10.80.0.0/12', 'vgw-5693ad22', 'Active', 'Yes', 'vgw-5693ad22'),
('RTB_VPC_STREAMING_PUB', 'rtb-96f590ef', '10.96.0.0/11', 'vgw-5693ad22', 'Active', 'Yes', 'vgw-5693ad22'),
('RTB_VPC_STREAMING_PUB', 'rtb-96f590ef', '10.0.0.0/10', 'vgw-5693ad22', 'Active', 'Yes', 'vgw-5693ad22'),
('RTB_VPC_STREAMING_PUB', 'rtb-96f590ef', '10.128.0.0/9', 'vgw-5693ad22', 'Active', 'Yes', 'vgw-5693ad22'),
('RTB_VPC_STREAMING_PUB', 'rtb-96f590ef', '10.0.0.0/8', 'vgw-5693ad22', 'Active', 'Yes', 'vgw-5693ad22'),
('RTB_VESA_INDUS_INT_A', 'rtb-05aeed59de9a0bf2e', '10.161.40.0/26', 'tgw-09bee705ee37e8cb8', 'Active', 'No', ''),
('RTB_VESA_INDUS_INT_A', 'rtb-05aeed59de9a0bf2e', '192.168.6.0/24', 'tgw-09bee705ee37e8cb8', 'Active', 'No', ''),
('RTB_VESA_INDUS_INT_A', 'rtb-05aeed59de9a0bf2e', '10.72.36.0/24', 'local', 'Active', 'No', ''),
('RTB_VESA_INDUS_INT_A', 'rtb-05aeed59de9a0bf2e', '172.16.0.0/12', 'tgw-09bee705ee37e8cb8', 'Active', 'No', ''),
('RTB_VESA_INDUS_INT_A', 'rtb-05aeed59de9a0bf2e', '10.0.0.0/8', 'tgw-09bee705ee37e8cb8', 'Active', 'No', ''),
('RTB_VESA_INDUS_INT_A', 'rtb-05aeed59de9a0bf2e', '0.0.0.0/0', 'tgw-09bee705ee37e8cb8', 'Active', 'No', ''),
('RTB_VESA_INDUS_PUB', 'rtb-0e82296ddd0cfdaa1', '192.168.6.0/24', 'tgw-09bee705ee37e8cb8', 'Active', 'No', ''),
('RTB_VESA_INDUS_PUB', 'rtb-0e82296ddd0cfdaa1', '10.72.36.0/24', 'local', 'Active', 'No', ''),
('RTB_VESA_INDUS_PUB', 'rtb-0e82296ddd0cfdaa1', '172.16.0.0/12', 'tgw-09bee705ee37e8cb8', 'Active', 'No', ''),
('RTB_VESA_INDUS_PUB', 'rtb-0e82296ddd0cfdaa1', '10.0.0.0/8', 'tgw-09bee705ee37e8cb8', 'Active', 'No', ''),
('RTB_VESA_INDUS_PUB', 'rtb-0e82296ddd0cfdaa1', '0.0.0.0/0', 'igw-0f9a2b621077bfc0a', 'Active', 'No', ''),
('PrivateRouteTableC', 'rtb-b7310cd2', '10.79.128.0/25', 'tgw-09bee705ee37e8cb8', 'Active', 'No', ''),
('PrivateRouteTableC', 'rtb-b7310cd2', '10.79.128.128/25', 'tgw-09bee705ee37e8cb8', 'Active', 'No', ''),
('PrivateRouteTableC', 'rtb-b7310cd2', '192.168.6.0/24', 'tgw-09bee705ee37e8cb8', 'Active', 'No', ''),
('PrivateRouteTableC', 'rtb-b7310cd2', '10.79.129.0/24', 'tgw-09bee705ee37e8cb8', 'Active', 'No', ''),
('PrivateRouteTableC', 'rtb-b7310cd2', '10.73.10.0/23', 'pcx-07061cf6c126e11c0', 'Active', 'No', ''),
('PrivateRouteTableC', 'rtb-b7310cd2', '10.65.0.0/22', 'tgw-09bee705ee37e8cb8', 'Active', 'No', ''),
('PrivateRouteTableC', 'rtb-b7310cd2', '10.65.8.0/22', 'pcx-bf85a5d6', 'Blackhole', 'No', ''),
('PrivateRouteTableC', 'rtb-b7310cd2', '10.73.16.0/21', 'tgw-09bee705ee37e8cb8', 'Active', 'No', ''),
('PrivateRouteTableC', 'rtb-b7310cd2', '10.72.0.0/20', 'pcx-7870f611', 'Blackhole', 'No', ''),
('PrivateRouteTableC', 'rtb-b7310cd2', '10.66.0.0/16', 'local', 'Active', 'No', ''),
('PrivateRouteTableC', 'rtb-b7310cd2', '172.16.0.0/12', 'tgw-09bee705ee37e8cb8', 'Active', 'No', ''),
('PrivateRouteTableC', 'rtb-b7310cd2', '10.0.0.0/8', 'tgw-09bee705ee37e8cb8', 'Active', 'No', ''),
('PrivateRouteTableC', 'rtb-b7310cd2', '0.0.0.0/0', 'tgw-09bee705ee37e8cb8', 'Active', 'No', ''),
('–', 'rtb-0c334af6bbfcc2e01', '10.72.114.0/23', 'local', 'Active', 'No', ''),
('–', 'rtb-0d2389af502a36861', '10.72.36.0/24', 'local', 'Active', 'No', ''),
('PrivateRouteTableB', 'rtb-8018a0e5', '10.79.128.0/25', 'tgw-09bee705ee37e8cb8', 'Active', 'No', ''),
('PrivateRouteTableB', 'rtb-8018a0e5', '10.79.128.128/25', 'tgw-09bee705ee37e8cb8', 'Active', 'No', ''),
('PrivateRouteTableB', 'rtb-8018a0e5', '192.168.6.0/24', 'tgw-09bee705ee37e8cb8', 'Active', 'No', ''),
('PrivateRouteTableB', 'rtb-8018a0e5', '10.79.129.0/24', 'tgw-09bee705ee37e8cb8', 'Active', 'No', ''),
('PrivateRouteTableB', 'rtb-8018a0e5', '10.73.10.0/23', 'pcx-07061cf6c126e11c0', 'Active', 'No', ''),
('PrivateRouteTableB', 'rtb-8018a0e5', '10.65.0.0/22', 'tgw-09bee705ee37e8cb8', 'Active', 'No', ''),
('PrivateRouteTableB', 'rtb-8018a0e5', '10.65.8.0/22', 'pcx-bf85a5d6', 'Blackhole', 'No', ''),
('PrivateRouteTableB', 'rtb-8018a0e5', '10.73.16.0/21', 'tgw-09bee705ee37e8cb8', 'Active', 'No', ''),
('PrivateRouteTableB', 'rtb-8018a0e5', '10.72.0.0/20', 'pcx-7870f611', 'Blackhole', 'No', ''),
('PrivateRouteTableB', 'rtb-8018a0e5', '10.66.0.0/16', 'local', 'Active', 'No', ''),
('PrivateRouteTableB', 'rtb-8018a0e5', '172.16.0.0/12', 'tgw-09bee705ee37e8cb8', 'Active', 'No', ''),
('PrivateRouteTableB', 'rtb-8018a0e5', '10.0.0.0/8', 'tgw-09bee705ee37e8cb8', 'Active', 'No', ''),
('PrivateRouteTableB', 'rtb-8018a0e5', '0.0.0.0/0', 'tgw-09bee705ee37e8cb8', 'Active', 'No', ''),
('PublicRouteTable_VERI', 'rtb-0c7e4269', '10.161.40.0/26', 'tgw-09bee705ee37e8cb8', 'Active', 'No', ''),
('PublicRouteTable_VERI', 'rtb-0c7e4269', '192.168.6.0/24', 'tgw-09bee705ee37e8cb8', 'Active', 'No', ''),
('PublicRouteTable_VERI', 'rtb-0c7e4269', '10.72.16.0/20', 'local', 'Active', 'No', ''),
('PublicRouteTable_VERI', 'rtb-0c7e4269', '172.16.0.0/12', 'tgw-09bee705ee37e8cb8', 'Active', 'No', ''),
('PublicRouteTable_VERI', 'rtb-0c7e4269', '10.0.0.0/8', 'tgw-09bee705ee37e8cb8', 'Active', 'No', ''),
('PublicRouteTable_VERI', 'rtb-0c7e4269', '0.0.0.0/0', 'igw-92821df7', 'Active', 'No', ''),
('RTB_VPC_SERVICES_TECHNIQUES_Public', 'rtb-00fb25e5e524ddfd7', '10.161.40.0/26', 'tgw-09bee705ee37e8cb8', 'Active', 'No', ''),
('RTB_VPC_SERVICES_TECHNIQUES_Public', 'rtb-00fb25e5e524ddfd7', '192.168.6.0/24', 'tgw-09bee705ee37e8cb8', 'Active', 'No', ''),
('RTB_VPC_SERVICES_TECHNIQUES_Public', 'rtb-00fb25e5e524ddfd7', '10.64.246.0/23', 'local', 'Active', 'No', ''),
('RTB_VPC_SERVICES_TECHNIQUES_Public', 'rtb-00fb25e5e524ddfd7', '10.65.0.0/22', 'tgw-09bee705ee37e8cb8', 'Active', 'No', ''),
('RTB_VPC_SERVICES_TECHNIQUES_Public', 'rtb-00fb25e5e524ddfd7', '172.16.0.0/12', 'tgw-09bee705ee37e8cb8', 'Active', 'No', ''),
('RTB_VPC_SERVICES_TECHNIQUES_Public', 'rtb-00fb25e5e524ddfd7', '10.0.0.0/8', 'tgw-09bee705ee37e8cb8', 'Active', 'No', ''),
('RTB_VPC_SERVICES_TECHNIQUES_Public', 'rtb-00fb25e5e524ddfd7', '0.0.0.0/0', 'igw-0e3e2aa53a785ef1a', 'Active', 'No', ''),
('RTB_VPC_SERVICES_TECHNIQUES', 'rtb-058a88b5f2609b4ce', '10.64.246.0/23', 'local', 'Active', 'No', ''),
('RTB_VPC_SERVICES_TECHNIQUES', 'rtb-058a88b5f2609b4ce', '0.0.0.0/0', 'tgw-09bee705ee37e8cb8', 'Active', 'No', ''),
('PrivateRouteTableB_VERI', 'rtb-0f7e426a', '10.161.40.0/26', 'tgw-09bee705ee37e8cb8', 'Active', 'No', ''),
('PrivateRouteTableB_VERI', 'rtb-0f7e426a', '192.168.6.0/24', 'tgw-09bee705ee37e8cb8', 'Active', 'No', ''),
('PrivateRouteTableB_VERI', 'rtb-0f7e426a', '10.72.16.0/20', 'local', 'Active', 'No', ''),
('PrivateRouteTableB_VERI', 'rtb-0f7e426a', '172.16.0.0/12', 'tgw-09bee705ee37e8cb8', 'Active', 'No', ''),
('PrivateRouteTableB_VERI', 'rtb-0f7e426a', '10.0.0.0/8', 'tgw-09bee705ee37e8cb8', 'Active', 'No', ''),
('PrivateRouteTableB_VERI', 'rtb-0f7e426a', '0.0.0.0/0', 'tgw-09bee705ee37e8cb8', 'Active', 'No', ''),
('RTB_VESA_INDUS_INT_B', 'rtb-06f3a98f14ae373f6', '192.168.6.0/24', 'tgw-09bee705ee37e8cb8', 'Active', 'No', ''),
('RTB_VESA_INDUS_INT_B', 'rtb-06f3a98f14ae373f6', '10.72.36.0/24', 'local', 'Active', 'No', ''),
('RTB_VESA_INDUS_INT_B', 'rtb-06f3a98f14ae373f6', '172.16.0.0/12', 'tgw-09bee705ee37e8cb8', 'Active', 'No', ''),
('RTB_VESA_INDUS_INT_B', 'rtb-06f3a98f14ae373f6', '10.0.0.0/8', 'tgw-09bee705ee37e8cb8', 'Active', 'No', ''),
('RTB_VESA_INDUS_INT_B', 'rtb-06f3a98f14ae373f6', '0.0.0.0/0', 'tgw-09bee705ee37e8cb8', 'Active', 'No', ''),
('PrivateRouteTableA', 'rtb-8318a0e6', '10.12.11.81/32', 'vgw-439ea037', 'Active', 'No', ''),
('PrivateRouteTableA', 'rtb-8318a0e6', '10.79.128.0/25', 'tgw-09bee705ee37e8cb8', 'Active', 'No', ''),
('PrivateRouteTableA', 'rtb-8318a0e6', '10.79.128.128/25', 'tgw-09bee705ee37e8cb8', 'Active', 'No', ''),
('PrivateRouteTableA', 'rtb-8318a0e6', '192.168.6.0/24', 'tgw-09bee705ee37e8cb8', 'Active', 'No', ''),
('PrivateRouteTableA', 'rtb-8318a0e6', '10.79.129.0/24', 'tgw-09bee705ee37e8cb8', 'Active', 'No', ''),
('PrivateRouteTableA', 'rtb-8318a0e6', '10.73.10.0/23', 'pcx-07061cf6c126e11c0', 'Active', 'No', ''),
('PrivateRouteTableA', 'rtb-8318a0e6', '10.65.0.0/22', 'tgw-09bee705ee37e8cb8', 'Active', 'No', ''),
('PrivateRouteTableA', 'rtb-8318a0e6', '10.65.8.0/22', 'pcx-bf85a5d6', 'Blackhole', 'No', ''),
('PrivateRouteTableA', 'rtb-8318a0e6', '10.73.16.0/21', 'tgw-09bee705ee37e8cb8', 'Active', 'No', ''),
('PrivateRouteTableA', 'rtb-8318a0e6', '10.72.0.0/20', 'pcx-7870f611', 'Blackhole', 'No', ''),
('PrivateRouteTableA', 'rtb-8318a0e6', '10.66.0.0/16', 'local', 'Active', 'No', ''),
('PrivateRouteTableA', 'rtb-8318a0e6', '172.16.0.0/12', 'tgw-09bee705ee37e8cb8', 'Active', 'No', ''),
('PrivateRouteTableA', 'rtb-8318a0e6', '10.0.0.0/8', 'tgw-09bee705ee37e8cb8', 'Active', 'No', ''),
('PrivateRouteTableA', 'rtb-8318a0e6', '0.0.0.0/0', 'tgw-09bee705ee37e8cb8', 'Active', 'No', ''),
('RTB_VESA-PROD-PF_INT_B', 'rtb-0817aa3206ee80a18', '192.168.6.0/24', 'tgw-09bee705ee37e8cb8', 'Active', 'No', ''),
('RTB_VESA-PROD-PF_INT_B', 'rtb-0817aa3206ee80a18', '10.72.114.0/23', 'local', 'Active', 'No', ''),
('RTB_VESA-PROD-PF_INT_B', 'rtb-0817aa3206ee80a18', '172.16.0.0/12', 'tgw-09bee705ee37e8cb8', 'Active', 'No', ''),
('RTB_VESA-PROD-PF_INT_B', 'rtb-0817aa3206ee80a18', '10.0.0.0/8', 'tgw-09bee705ee37e8cb8', 'Active', 'No', ''),
('RTB_VESA-PROD-PF_INT_B', 'rtb-0817aa3206ee80a18', '0.0.0.0/0', 'tgw-09bee705ee37e8cb8', 'Active', 'No', ''),
('RTB_VESA-PROD-PF_INT_A', 'rtb-007c040ce09e2e4a1', '192.168.6.0/24', 'tgw-09bee705ee37e8cb8', 'Active', 'No', ''),
('RTB_VESA-PROD-PF_INT_A', 'rtb-007c040ce09e2e4a1', '10.72.114.0/23', 'local', 'Active', 'No', ''),
('RTB_VESA-PROD-PF_INT_A', 'rtb-007c040ce09e2e4a1', '172.16.0.0/12', 'tgw-09bee705ee37e8cb8', 'Active', 'No', ''),
('RTB_VESA-PROD-PF_INT_A', 'rtb-007c040ce09e2e4a1', '10.0.0.0/8', 'tgw-09bee705ee37e8cb8', 'Active', 'No', ''),
('RTB_VESA-PROD-PF_INT_A', 'rtb-007c040ce09e2e4a1', '0.0.0.0/0', 'tgw-09bee705ee37e8cb8', 'Active', 'No', ''),
('private-rt', 'rtb-035316cad742cbd8c', '172.31.0.0/16', 'local', 'Active', 'No', ''),
('private-rt', 'rtb-035316cad742cbd8c', '0.0.0.0/0', 'nat-0a8e69b68da69b00e', 'Active', 'No', ''),
('PublicRouteTableA', 'rtb-8218a0e7', '10.79.128.0/25', 'tgw-09bee705ee37e8cb8', 'Active', 'No', ''),
('PublicRouteTableA', 'rtb-8218a0e7', '10.79.128.128/25', 'tgw-09bee705ee37e8cb8', 'Active', 'No', ''),
('PublicRouteTableA', 'rtb-8218a0e7', '192.168.6.0/24', 'tgw-09bee705ee37e8cb8', 'Active', 'No', ''),
('PublicRouteTableA', 'rtb-8218a0e7', '10.79.129.0/24', 'tgw-09bee705ee37e8cb8', 'Active', 'No', ''),
('PublicRouteTableA', 'rtb-8218a0e7', '10.73.10.0/23', 'pcx-07061cf6c126e11c0', 'Active', 'No', ''),
('PublicRouteTableA', 'rtb-8218a0e7', '10.65.0.0/22', 'tgw-09bee705ee37e8cb8', 'Active', 'No', ''),
('PublicRouteTableA', 'rtb-8218a0e7', '10.65.8.0/22', 'pcx-bf85a5d6', 'Blackhole', 'No', ''),
('PublicRouteTableA', 'rtb-8218a0e7', '10.73.16.0/21', 'tgw-09bee705ee37e8cb8', 'Active', 'No', ''),
('PublicRouteTableA', 'rtb-8218a0e7', '10.66.0.0/16', 'local', 'Active', 'No', ''),
('PublicRouteTableA', 'rtb-8218a0e7', '172.16.0.0/12', 'tgw-09bee705ee37e8cb8', 'Active', 'No', ''),
('PublicRouteTableA', 'rtb-8218a0e7', '10.0.0.0/8', 'tgw-09bee705ee37e8cb8', 'Active', 'No', ''),
('PublicRouteTableA', 'rtb-8218a0e7', '0.0.0.0/0', 'igw-75a86110', 'Active', 'No', '');

-- --------------------------------------------------------

--
-- Structure de la table `transit_gateway`
--

CREATE TABLE `transit_gateway` (
  `name` varchar(50) NOT NULL,
  `gateway` varchar(50) NOT NULL,
  `owner` varchar(50) NOT NULL,
  `state` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `transit_gateway`
--

INSERT INTO `transit_gateway` (`name`, `gateway`, `owner`, `state`) VALUES
('–', 'tgw-09bee705ee37e8cb8', '57738928110', 'Available');

-- --------------------------------------------------------

--
-- Structure de la table `transit_gateway_attachments`
--

CREATE TABLE `transit_gateway_attachments` (
  `name` varchar(70) NOT NULL,
  `transit_gateway_attachment_ID` varchar(70) NOT NULL,
  `transit_gateway_ID` varchar(70) NOT NULL,
  `resource_type` varchar(70) NOT NULL,
  `resource_ID` varchar(70) NOT NULL,
  `state` varchar(70) NOT NULL,
  `association_route_table_ID` varchar(70) NOT NULL,
  `association_state` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `transit_gateway_attachments`
--

INSERT INTO `transit_gateway_attachments` (`name`, `transit_gateway_attachment_ID`, `transit_gateway_ID`, `resource_type`, `resource_ID`, `state`, `association_route_table_ID`, `association_state`) VALUES
('ATTACH_VPC_VESA-PROD-PF', 'tgw-attach-0e436923fd80ed837', 'tgw-09bee705ee37e8cb8', 'VPC', 'vpc-00344fe8bc5e453f6', 'Available', 'tgw-rtb-0a162ee031a12ae77', 'Associated'),
('ATTACH_VPC_EOL', 'tgw-attach-07a204bfd9fd0e6f4', 'tgw-09bee705ee37e8cb8', 'VPC', 'vpc-01b88edc87fee897f', 'Available', 'tgw-rtb-0a162ee031a12ae77', 'Associated'),
('ATTACH_VPC_SERVICES_TECHNIQUES', 'tgw-attach-0f3b0852849e8a777', 'tgw-09bee705ee37e8cb8', 'VPC', 'vpc-07dbe76a0049b6630', 'Available', 'tgw-rtb-0a162ee031a12ae77', 'Associated'),
('ATTACH_VPC_VESA_INDUS', 'tgw-attach-08f5573fc853bddd9', 'tgw-09bee705ee37e8cb8', 'VPC', 'vpc-0c4bccf053441edf6', 'Available', 'tgw-rtb-0a162ee031a12ae77', 'Associated'),
('ATTACH_VPC_VERI', 'tgw-attach-0290917ddd9320b25', 'tgw-09bee705ee37e8cb8', 'VPC', 'vpc-0f94c76a', 'Available', 'tgw-rtb-0a162ee031a12ae77', 'Associated'),
('ATTACH_VPC_STREAMING', 'tgw-attach-050bad6518f6cf14a', 'tgw-09bee705ee37e8cb8', 'VPC', 'vpc-9681faf0', 'Available', 'tgw-rtb-0a162ee031a12ae77', 'Associated'),
('ATTACH_VPC_PROD', 'tgw-attach-06abc74bacaf16c17', 'tgw-09bee705ee37e8cb8', 'VPC', 'vpc-db0ba2be', 'Available', 'tgw-rtb-0a162ee031a12ae77', 'Associated');

-- --------------------------------------------------------

--
-- Structure de la table `vpc`
--

CREATE TABLE `vpc` (
  `souscription` varchar(50) NOT NULL,
  `region` varchar(50) NOT NULL,
  `vpc` varchar(50) NOT NULL,
  `vpc_id` varchar(50) NOT NULL,
  `cidr` varchar(50) NOT NULL,
  `id_table_routage` varchar(50) NOT NULL,
  `id_acl` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `vpc_network`
--

CREATE TABLE `vpc_network` (
  `id` varchar(50) NOT NULL,
  `id_sous_reseaux` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `vpc_network`
--

INSERT INTO `vpc_network` (`id`, `id_sous_reseaux`) VALUES
('vpc-00344fe8bc5e453f6', '6'),
('vpc-01b88edc87fee897f', '6'),
('vpc-05d465008f28183b8', '4'),
('vpc-07dbe76a0049b6630', '5'),
('vpc-0ab43a9252c40819c', '1'),
('vpc-0c4bccf053441edf6', '6'),
('vpc-0f94c76a', '20'),
('vpc-6b42bd02', '3'),
('vpc-9681faf0', '5'),
('vpc-db0ba2be', '21'),
('vpc-fd33ff98', '4'),
('Total général', '81');

-- --------------------------------------------------------

--
-- Structure de la table `vpn`
--

CREATE TABLE `vpn` (
  `name` varchar(70) NOT NULL,
  `virutal_private_gateway_id` varchar(70) NOT NULL,
  `state` varchar(70) NOT NULL,
  `type` varchar(70) NOT NULL,
  `vpc` varchar(70) NOT NULL,
  `asn` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `vpn`
--

INSERT INTO `vpn` (`name`, `virutal_private_gateway_id`, `state`, `type`, `vpc`, `asn`) VALUES
('VPG_VPC_VESA-PROD-PF', 'vgw-0e73d581fb4cafe61', 'Attached', 'ipsec.1', 'vpc-00344fe8bc5e453f6', '9059'),
('VPG_VPC_VESA_INDUS', 'vgw-07c106d7984f1ed67', 'Attached', 'ipsec.1', 'vpc-0c4bccf053441edf6', '9059'),
('VPG_VPC_SERVICES_TECHNIQUES', 'vgw-0e1602b66fc782e40', 'Attached', 'ipsec.1', 'vpc-07dbe76a0049b6630', '9059'),
('VPG_VPC_EOL', 'vgw-0ecbce5bd7714eb85', 'Attached', 'ipsec.1', 'vpc-01b88edc87fee897f', '9059'),
('VPG_VPC_STREAMING', 'vgw-5693ad22', 'Attached', 'ipsec.1', 'vpc-9681faf0', '9059'),
('VPG_VPC_PROD', 'vgw-439ea037', 'Attached', 'ipsec.1', 'vpc-db0ba2be', '9059'),
('VPG_PROD_VERI', 'vgw-fa63538e', 'Attached', 'ipsec.1', 'vpc-0f94c76a', '9059');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `peering_connections`
--
ALTER TABLE `peering_connections`
  ADD PRIMARY KEY (`peering_connection_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
