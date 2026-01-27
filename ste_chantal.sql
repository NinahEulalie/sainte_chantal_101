-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 28, 2026 at 12:14 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ste_chantal`
--

-- --------------------------------------------------------

--
-- Table structure for table `absences`
--

CREATE TABLE `absences` (
  `id_absence` int(11) NOT NULL,
  `date_absence` date NOT NULL,
  `nom_matiere` varchar(50) NOT NULL,
  `id_eleve` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `anneescolaires`
--

CREATE TABLE `anneescolaires` (
  `id_annee` int(11) NOT NULL,
  `date_debut` date NOT NULL,
  `date_fin` date NOT NULL,
  `active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `classes`
--

CREATE TABLE `classes` (
  `id_classe` int(11) NOT NULL,
  `nom_classe` varchar(10) NOT NULL,
  `effectif` int(11) NOT NULL,
  `niveau` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ecolages`
--

CREATE TABLE `ecolages` (
  `id_ecolage` int(11) NOT NULL,
  `mois` varchar(10) NOT NULL,
  `montant_ecolage` int(11) NOT NULL,
  `statut` tinyint(1) NOT NULL,
  `id_eleve` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `eleves`
--

CREATE TABLE `eleves` (
  `id_eleve` int(11) NOT NULL,
  `matricule` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `prenom` varchar(100) NOT NULL,
  `date_nais` date NOT NULL,
  `lieu_nais` varchar(50) NOT NULL,
  `adresse` varchar(100) NOT NULL,
  `genre` varchar(10) NOT NULL,
  `date_inscription` date NOT NULL,
  `id_parent` int(11) NOT NULL,
  `id_classe` int(11) NOT NULL,
  `id_personnel` int(11) NOT NULL,
  `id_annee` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `evaluations`
--

CREATE TABLE `evaluations` (
  `id_evaluation` int(11) NOT NULL,
  `type_evaluation` varchar(50) NOT NULL,
  `date_debut` date NOT NULL,
  `date_fin` date NOT NULL,
  `periode` varchar(100) NOT NULL,
  `note` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `frais`
--

CREATE TABLE `frais` (
  `id_frais` int(11) NOT NULL,
  `type_frais` varchar(100) NOT NULL,
  `montant_frais` int(11) NOT NULL,
  `date_frais` date NOT NULL,
  `date_echeance` date NOT NULL,
  `statut` varchar(50) NOT NULL,
  `mode_paiement` varchar(50) NOT NULL,
  `paye_par` varchar(100) NOT NULL,
  `id_eleve` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `infirmeries`
--

CREATE TABLE `infirmeries` (
  `id_infirmerie` int(11) NOT NULL,
  `date` date NOT NULL,
  `description` varchar(500) NOT NULL,
  `mesures_prises` varchar(500) NOT NULL,
  `parent_notifies` tinyint(1) NOT NULL,
  `id_eleve` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `inscriptions`
--

CREATE TABLE `inscriptions` (
  `id_inscription` int(11) NOT NULL,
  `montant_total` int(11) NOT NULL,
  `montant_paye` int(11) NOT NULL,
  `reste` int(11) NOT NULL,
  `id_frais` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `matieres`
--

CREATE TABLE `matieres` (
  `id_matiere` int(11) NOT NULL,
  `nom_matiere` varchar(100) NOT NULL,
  `nom_prof` varchar(100) NOT NULL,
  `coefficient` int(11) NOT NULL,
  `id_evaluation` int(11) NOT NULL,
  `id_classe` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `parapointages`
--

CREATE TABLE `parapointages` (
  `id_para` int(11) NOT NULL,
  `id_eleve` int(11) NOT NULL,
  `date` date NOT NULL,
  `heure_debut` time NOT NULL,
  `heure_fin` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `parascolaires`
--

CREATE TABLE `parascolaires` (
  `id_para` int(11) NOT NULL,
  `activite_choisie` int(11) NOT NULL,
  `frai_para` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personnels`
--

CREATE TABLE `personnels` (
  `id_personnel` int(11) NOT NULL,
  `nom_personnel` varchar(100) NOT NULL,
  `prenom_personnel` varchar(100) NOT NULL,
  `image_personnel` varchar(50) NOT NULL,
  `telephone_personnel` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `role` varchar(50) NOT NULL,
  `statut_personnel` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sanctions`
--

CREATE TABLE `sanctions` (
  `id_sancion` int(11) NOT NULL,
  `type_sanction` varchar(50) NOT NULL,
  `motif` varchar(200) NOT NULL,
  `date_sanction` date NOT NULL,
  `description` varchar(500) NOT NULL,
  `nom_personnel` varchar(100) NOT NULL,
  `id_eleve` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sortieanticipees`
--

CREATE TABLE `sortieanticipees` (
  `id_sortie` int(11) NOT NULL,
  `motif` varchar(500) NOT NULL,
  `date_sortie` date NOT NULL,
  `heure_sortie` time NOT NULL,
  `justifie` tinyint(1) NOT NULL,
  `id_eleve` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `studentparents`
--

CREATE TABLE `studentparents` (
  `id_parent` int(11) NOT NULL,
  `matricule_parent` int(11) NOT NULL,
  `nom_pere` varchar(200) NOT NULL,
  `profession_pere` varchar(50) NOT NULL,
  `nom_mere` varchar(200) NOT NULL,
  `profession_mere` varchar(50) NOT NULL,
  `nom_tuteur` varchar(200) NOT NULL,
  `profession_tuteur` varchar(50) NOT NULL,
  `telephone` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `adresse_parent` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absences`
--
ALTER TABLE `absences`
  ADD PRIMARY KEY (`id_absence`),
  ADD KEY `id_eleve` (`id_eleve`);

--
-- Indexes for table `anneescolaires`
--
ALTER TABLE `anneescolaires`
  ADD PRIMARY KEY (`id_annee`);

--
-- Indexes for table `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`id_classe`);

--
-- Indexes for table `ecolages`
--
ALTER TABLE `ecolages`
  ADD PRIMARY KEY (`id_ecolage`),
  ADD KEY `id_eleve` (`id_eleve`);

--
-- Indexes for table `eleves`
--
ALTER TABLE `eleves`
  ADD PRIMARY KEY (`id_eleve`),
  ADD KEY `id_annee` (`id_annee`),
  ADD KEY `id_parent` (`id_parent`),
  ADD KEY `id_classe` (`id_classe`),
  ADD KEY `id_personnel` (`id_personnel`);

--
-- Indexes for table `evaluations`
--
ALTER TABLE `evaluations`
  ADD PRIMARY KEY (`id_evaluation`);

--
-- Indexes for table `frais`
--
ALTER TABLE `frais`
  ADD PRIMARY KEY (`id_frais`),
  ADD KEY `id_eleve` (`id_eleve`);

--
-- Indexes for table `infirmeries`
--
ALTER TABLE `infirmeries`
  ADD PRIMARY KEY (`id_infirmerie`),
  ADD KEY `id_eleve` (`id_eleve`);

--
-- Indexes for table `inscriptions`
--
ALTER TABLE `inscriptions`
  ADD PRIMARY KEY (`id_inscription`),
  ADD KEY `id_frais` (`id_frais`);

--
-- Indexes for table `matieres`
--
ALTER TABLE `matieres`
  ADD PRIMARY KEY (`id_matiere`),
  ADD KEY `id_evaluation` (`id_evaluation`),
  ADD KEY `id_classe` (`id_classe`);

--
-- Indexes for table `parapointages`
--
ALTER TABLE `parapointages`
  ADD KEY `id_para` (`id_para`),
  ADD KEY `id_eleve` (`id_eleve`);

--
-- Indexes for table `parascolaires`
--
ALTER TABLE `parascolaires`
  ADD PRIMARY KEY (`id_para`);

--
-- Indexes for table `personnels`
--
ALTER TABLE `personnels`
  ADD PRIMARY KEY (`id_personnel`);

--
-- Indexes for table `sanctions`
--
ALTER TABLE `sanctions`
  ADD PRIMARY KEY (`id_sancion`),
  ADD KEY `id_eleve` (`id_eleve`);

--
-- Indexes for table `sortieanticipees`
--
ALTER TABLE `sortieanticipees`
  ADD PRIMARY KEY (`id_sortie`),
  ADD KEY `id_eleve` (`id_eleve`);

--
-- Indexes for table `studentparents`
--
ALTER TABLE `studentparents`
  ADD PRIMARY KEY (`id_parent`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `absences`
--
ALTER TABLE `absences`
  ADD CONSTRAINT `absences_ibfk_1` FOREIGN KEY (`id_eleve`) REFERENCES `eleves` (`id_eleve`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ecolages`
--
ALTER TABLE `ecolages`
  ADD CONSTRAINT `ecolages_ibfk_1` FOREIGN KEY (`id_eleve`) REFERENCES `eleves` (`id_eleve`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `eleves`
--
ALTER TABLE `eleves`
  ADD CONSTRAINT `eleves_ibfk_1` FOREIGN KEY (`id_parent`) REFERENCES `studentparents` (`id_parent`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `eleves_ibfk_2` FOREIGN KEY (`id_personnel`) REFERENCES `personnels` (`id_personnel`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `eleves_ibfk_3` FOREIGN KEY (`id_classe`) REFERENCES `classes` (`id_classe`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `eleves_ibfk_5` FOREIGN KEY (`id_annee`) REFERENCES `anneescolaires` (`id_annee`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `frais`
--
ALTER TABLE `frais`
  ADD CONSTRAINT `frais_ibfk_1` FOREIGN KEY (`id_eleve`) REFERENCES `eleves` (`id_eleve`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `infirmeries`
--
ALTER TABLE `infirmeries`
  ADD CONSTRAINT `infirmeries_ibfk_1` FOREIGN KEY (`id_eleve`) REFERENCES `eleves` (`id_eleve`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `inscriptions`
--
ALTER TABLE `inscriptions`
  ADD CONSTRAINT `inscriptions_ibfk_1` FOREIGN KEY (`id_frais`) REFERENCES `frais` (`id_frais`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `matieres`
--
ALTER TABLE `matieres`
  ADD CONSTRAINT `matieres_ibfk_1` FOREIGN KEY (`id_evaluation`) REFERENCES `evaluations` (`id_evaluation`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `matieres_ibfk_2` FOREIGN KEY (`id_classe`) REFERENCES `classes` (`id_classe`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `parapointages`
--
ALTER TABLE `parapointages`
  ADD CONSTRAINT `parapointages_ibfk_1` FOREIGN KEY (`id_para`) REFERENCES `parascolaires` (`id_para`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `parapointages_ibfk_2` FOREIGN KEY (`id_eleve`) REFERENCES `eleves` (`id_eleve`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sanctions`
--
ALTER TABLE `sanctions`
  ADD CONSTRAINT `sanctions_ibfk_1` FOREIGN KEY (`id_eleve`) REFERENCES `eleves` (`id_eleve`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sortieanticipees`
--
ALTER TABLE `sortieanticipees`
  ADD CONSTRAINT `sortieanticipees_ibfk_1` FOREIGN KEY (`id_eleve`) REFERENCES `eleves` (`id_eleve`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
