-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 27, 2026 at 03:20 AM
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
-- Database: `ste_chantal_claude`
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
-- Table structure for table `affectations_classes`
--

CREATE TABLE `affectations_classes` (
  `id_eleve` int(11) NOT NULL,
  `id_classe` int(11) NOT NULL,
  `id_annee` int(11) NOT NULL,
  `statut` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `anneescolaires`
--

CREATE TABLE `anneescolaires` (
  `id_annee` int(11) NOT NULL,
  `nom_annee` varchar(200) NOT NULL,
  `date_debut` date NOT NULL,
  `date_fin` date NOT NULL,
  `active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `anneescolaires`
--

INSERT INTO `anneescolaires` (`id_annee`, `nom_annee`, `date_debut`, `date_fin`, `active`) VALUES
(1, 'Année scolaire 2024-2025', '2025-09-11', '2026-07-09', 0),
(2, 'Année scolaire 2025-2026', '2026-02-05', '2026-02-27', 1);

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `classes`
--

CREATE TABLE `classes` (
  `id_classe` int(11) NOT NULL,
  `nom_classe` varchar(10) NOT NULL,
  `niveau` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `classes`
--

INSERT INTO `classes` (`id_classe`, `nom_classe`, `niveau`) VALUES
(1, '9ème C', 'primaire');

-- --------------------------------------------------------

--
-- Table structure for table `classes_annees`
--

CREATE TABLE `classes_annees` (
  `id_classe` int(11) NOT NULL,
  `id_annee` int(11) NOT NULL,
  `effectif` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

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
  `lieu_nais` varchar(100) NOT NULL,
  `adresse` varchar(100) NOT NULL,
  `genre` varchar(50) NOT NULL,
  `annee_scolaire_entree` varchar(100) NOT NULL,
  `id_parent` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `eleves`
--

INSERT INTO `eleves` (`id_eleve`, `matricule`, `nom`, `prenom`, `date_nais`, `lieu_nais`, `adresse`, `genre`, `annee_scolaire_entree`, `id_parent`) VALUES
(1, 600000, 'RAKOTO', 'Kelly', '2010-03-02', 'Antananrivo', 'Ampamantanana', 'Masculin', 'Année scolaire 2018-2019', 1),
(2, 600001, 'ANDRY', 'Rajo', '2025-08-06', 'Antananrivo', 'Ampamantanana', 'Masculin', 'Année scolaire 2022-2023', 2);

-- --------------------------------------------------------

--
-- Table structure for table `evaluations`
--

CREATE TABLE `evaluations` (
  `id_evaluation` int(11) NOT NULL,
  `type_evaluation` varchar(50) NOT NULL,
  `date_evaluation` date NOT NULL,
  `periode` varchar(100) NOT NULL,
  `bareme` int(11) NOT NULL,
  `id_matiere` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  `id_inscription` int(11) NOT NULL
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
  `date_inscription` date NOT NULL,
  `montant_total` int(11) NOT NULL,
  `montant_paye` int(11) NOT NULL,
  `reste` int(11) NOT NULL,
  `id_eleve` int(11) NOT NULL,
  `id_annee` int(11) NOT NULL,
  `id_classe` int(11) NOT NULL,
  `id_frais` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `matieres`
--

CREATE TABLE `matieres` (
  `id_matiere` int(11) NOT NULL,
  `nom_matiere` varchar(100) NOT NULL,
  `nom_prof` varchar(100) NOT NULL,
  `coefficient` int(11) NOT NULL,
  `id_classe` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `notes`
--

CREATE TABLE `notes` (
  `id_eleve` int(11) NOT NULL,
  `id_evaluation` int(11) NOT NULL,
  `note` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `parapointages`
--

CREATE TABLE `parapointages` (
  `id_parapointage` int(11) NOT NULL,
  `id_eleve` int(11) NOT NULL,
  `id_para` int(11) NOT NULL,
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
  `activite_choisie` varchar(100) NOT NULL,
  `frais_para` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `parascolaires`
--

INSERT INTO `parascolaires` (`id_para`, `activite_choisie`, `frais_para`) VALUES
(1, 'Football', 10000);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personnels`
--

CREATE TABLE `personnels` (
  `id_personnel` int(11) NOT NULL,
  `nom_personnel` varchar(100) NOT NULL,
  `prenom_personnel` varchar(100) NOT NULL,
  `image_personnel` varchar(50) NOT NULL,
  `telephone_personnel` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `role` varchar(50) NOT NULL,
  `statut_personnel` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sanctions`
--

CREATE TABLE `sanctions` (
  `id_sanction` int(11) NOT NULL,
  `type_sanction` varchar(50) NOT NULL,
  `motif` varchar(200) NOT NULL,
  `date_sanction` date NOT NULL,
  `description` varchar(500) NOT NULL,
  `nom_personnel` varchar(100) NOT NULL,
  `id_eleve` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('0i6w53dMOso7sfaATTbndCKQen538V9y1woSOju9', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/144.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiR2xTUWh0QUlVWUw1cVRDUTB5RG55WHNuOG1JeE14Qm9KQlpFNDFFQiI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7czo1OiJyb3V0ZSI7czo0OiJob21lIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1771889452),
('6cd7dxTDH7LXy5RDtaztDkMwFM1Vh3IXp1yA2u7A', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/144.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiSEQzdVpxVEJzV0hVV0RKbFNSenk4azVzR2hrclVlOUpoa0hQUGJEMSI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MzU6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9wYXJlbnRzL2luZGV4IjtzOjU6InJvdXRlIjtzOjEzOiJwYXJlbnRzLmluZGV4Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1771362932),
('cnPt5ESEmimyJH2Ik6V7eFpQP2nVdDhIaLV4TiXw', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiYUZDVjFONERmeXdjakxYR0Z4bGZNdWRDNEVmdTd3bTdNbUpXOVVDbSI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MzY6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9tYXRpZXJlcy9pbmRleCI7czo1OiJyb3V0ZSI7czoxNDoibWF0aWVyZXMuaW5kZXgiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1772158692),
('dixNeaFnIKM3VKj9dZxBZISR7P7nxrWxDr1OoS6e', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/144.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiVnJ0cmpnT2tLY1JJMjBqajNvdXg0Rk5jWW54N3F3Y2dQRGUzQklpUyI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7czo1OiJyb3V0ZSI7czo0OiJob21lIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1771336775),
('Hv7ndLNZ6Yd1gn94zRhrTPLYPa2lApajyZpOJjFn', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiR0hEbHFTQmN0Z1ROaW9QTFpkWmZZUENsRDdKMWlEYTJXR0gzR1NheCI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7czo1OiJyb3V0ZSI7czo0OiJob21lIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1772102283),
('L8OFZ6zrtaNHHPQ8GOLeuxUMcGiLW9OaqjqELiJV', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/144.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiMGhSN3drNzd6VW8wWUs0YzhLTGZQZ2xOajAwN1B4Q1dQNWl6WVI2biI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MzQ6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9lbGV2ZXMvaW5kZXgiO3M6NToicm91dGUiO3M6MTI6ImVsZXZlcy5pbmRleCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1771801151),
('UMG6VjiIi1Jf4jYfG8N6tw6xM2KaCHrhmfvLTrmE', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiVGdBcE1CaE54VjZjamJJYlcwdnJZREtzMGJNM3VQTFRXSWx0NU9DeSI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7czo1OiJyb3V0ZSI7czo0OiJob21lIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1772116373),
('Vtiy1hzOwxhYcH04Z0ghepM2CPnjdQymNkDZPweE', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoibHFqRkdLZTNLTm9yemtGUmFKeW5zdWFKYlFKOWtEUGhCQ25XTWE0NyI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MzU6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9wYXJlbnRzL2luZGV4IjtzOjU6InJvdXRlIjtzOjEzOiJwYXJlbnRzLmluZGV4Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1771967035);

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
  `matricule_parent` varchar(100) NOT NULL,
  `nom_pere` varchar(200) NOT NULL,
  `profession_pere` varchar(50) NOT NULL,
  `nom_mere` varchar(200) NOT NULL,
  `profession_mere` varchar(50) NOT NULL,
  `nom_tuteur` varchar(200) NOT NULL,
  `profession_tuteur` varchar(50) NOT NULL,
  `telephone` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `adresse_parent` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `studentparents`
--

INSERT INTO `studentparents` (`id_parent`, `matricule_parent`, `nom_pere`, `profession_pere`, `nom_mere`, `profession_mere`, `nom_tuteur`, `profession_tuteur`, `telephone`, `email`, `adresse_parent`) VALUES
(1, '2435', 'RAKOTO Randria', 'Chauffeur', 'RASOA Jeannette', 'Commerçante', 'ANDRISOA', 'Professeur', '0341120011', 'rakotorandria@gmail.com', 'Ampamantanana'),
(2, '0001fam2526', 'RANDRIA', 'Chauffeur', 'RAKETAKA', 'Vendeuse', 'RAFOTSY', 'Vendeuse', '0342464302', 'randria@gmail.com', 'Ambanidia');

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
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Indexes for table `affectations_classes`
--
ALTER TABLE `affectations_classes`
  ADD KEY `id_eleve` (`id_eleve`),
  ADD KEY `id_classe` (`id_classe`),
  ADD KEY `id_annee` (`id_annee`);

--
-- Indexes for table `anneescolaires`
--
ALTER TABLE `anneescolaires`
  ADD PRIMARY KEY (`id_annee`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_expiration_index` (`expiration`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_locks_expiration_index` (`expiration`);

--
-- Indexes for table `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`id_classe`);

--
-- Indexes for table `classes_annees`
--
ALTER TABLE `classes_annees`
  ADD KEY `id_classe` (`id_classe`),
  ADD KEY `id_annee` (`id_annee`);

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
  ADD UNIQUE KEY `matricule` (`matricule`),
  ADD UNIQUE KEY `matricule_2` (`matricule`),
  ADD KEY `id_parent` (`id_parent`);

--
-- Indexes for table `evaluations`
--
ALTER TABLE `evaluations`
  ADD PRIMARY KEY (`id_evaluation`),
  ADD KEY `id_matiere` (`id_matiere`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `frais`
--
ALTER TABLE `frais`
  ADD PRIMARY KEY (`id_frais`),
  ADD KEY `id_inscription` (`id_inscription`);

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
  ADD KEY `id_eleve` (`id_eleve`),
  ADD KEY `id_annee` (`id_annee`),
  ADD KEY `id_classe` (`id_classe`),
  ADD KEY `id_frais` (`id_frais`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `matieres`
--
ALTER TABLE `matieres`
  ADD PRIMARY KEY (`id_matiere`),
  ADD KEY `id_classe` (`id_classe`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notes`
--
ALTER TABLE `notes`
  ADD KEY `id_eleve` (`id_eleve`),
  ADD KEY `id_evaluation` (`id_evaluation`);

--
-- Indexes for table `parapointages`
--
ALTER TABLE `parapointages`
  ADD PRIMARY KEY (`id_parapointage`),
  ADD KEY `id_para` (`id_para`),
  ADD KEY `id_eleve` (`id_eleve`);

--
-- Indexes for table `parascolaires`
--
ALTER TABLE `parascolaires`
  ADD PRIMARY KEY (`id_para`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personnels`
--
ALTER TABLE `personnels`
  ADD PRIMARY KEY (`id_personnel`);

--
-- Indexes for table `sanctions`
--
ALTER TABLE `sanctions`
  ADD PRIMARY KEY (`id_sanction`),
  ADD KEY `id_eleve` (`id_eleve`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

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
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `absences`
--
ALTER TABLE `absences`
  MODIFY `id_absence` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `anneescolaires`
--
ALTER TABLE `anneescolaires`
  MODIFY `id_annee` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `classes`
--
ALTER TABLE `classes`
  MODIFY `id_classe` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ecolages`
--
ALTER TABLE `ecolages`
  MODIFY `id_ecolage` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `eleves`
--
ALTER TABLE `eleves`
  MODIFY `id_eleve` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `evaluations`
--
ALTER TABLE `evaluations`
  MODIFY `id_evaluation` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `frais`
--
ALTER TABLE `frais`
  MODIFY `id_frais` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `infirmeries`
--
ALTER TABLE `infirmeries`
  MODIFY `id_infirmerie` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `inscriptions`
--
ALTER TABLE `inscriptions`
  MODIFY `id_inscription` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `matieres`
--
ALTER TABLE `matieres`
  MODIFY `id_matiere` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `parapointages`
--
ALTER TABLE `parapointages`
  MODIFY `id_parapointage` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `parascolaires`
--
ALTER TABLE `parascolaires`
  MODIFY `id_para` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `personnels`
--
ALTER TABLE `personnels`
  MODIFY `id_personnel` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sanctions`
--
ALTER TABLE `sanctions`
  MODIFY `id_sanction` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sortieanticipees`
--
ALTER TABLE `sortieanticipees`
  MODIFY `id_sortie` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `studentparents`
--
ALTER TABLE `studentparents`
  MODIFY `id_parent` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `absences`
--
ALTER TABLE `absences`
  ADD CONSTRAINT `absences_ibfk_1` FOREIGN KEY (`id_eleve`) REFERENCES `eleves` (`id_eleve`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `affectations_classes`
--
ALTER TABLE `affectations_classes`
  ADD CONSTRAINT `affectations_classes_ibfk_1` FOREIGN KEY (`id_eleve`) REFERENCES `eleves` (`id_eleve`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `affectations_classes_ibfk_2` FOREIGN KEY (`id_classe`) REFERENCES `classes` (`id_classe`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `affectations_classes_ibfk_3` FOREIGN KEY (`id_annee`) REFERENCES `anneescolaires` (`id_annee`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `classes_annees`
--
ALTER TABLE `classes_annees`
  ADD CONSTRAINT `classes_annees_ibfk_1` FOREIGN KEY (`id_annee`) REFERENCES `anneescolaires` (`id_annee`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `classes_annees_ibfk_2` FOREIGN KEY (`id_classe`) REFERENCES `classes` (`id_classe`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ecolages`
--
ALTER TABLE `ecolages`
  ADD CONSTRAINT `ecolages_ibfk_1` FOREIGN KEY (`id_eleve`) REFERENCES `eleves` (`id_eleve`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `eleves`
--
ALTER TABLE `eleves`
  ADD CONSTRAINT `eleves_ibfk_1` FOREIGN KEY (`id_parent`) REFERENCES `studentparents` (`id_parent`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `evaluations`
--
ALTER TABLE `evaluations`
  ADD CONSTRAINT `evaluations_ibfk_1` FOREIGN KEY (`id_matiere`) REFERENCES `matieres` (`id_matiere`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `infirmeries`
--
ALTER TABLE `infirmeries`
  ADD CONSTRAINT `infirmeries_ibfk_1` FOREIGN KEY (`id_eleve`) REFERENCES `eleves` (`id_eleve`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `inscriptions`
--
ALTER TABLE `inscriptions`
  ADD CONSTRAINT `inscriptions_ibfk_1` FOREIGN KEY (`id_eleve`) REFERENCES `eleves` (`id_eleve`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `inscriptions_ibfk_2` FOREIGN KEY (`id_annee`) REFERENCES `anneescolaires` (`id_annee`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `matieres`
--
ALTER TABLE `matieres`
  ADD CONSTRAINT `matieres_ibfk_2` FOREIGN KEY (`id_classe`) REFERENCES `classes` (`id_classe`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `notes`
--
ALTER TABLE `notes`
  ADD CONSTRAINT `notes_ibfk_1` FOREIGN KEY (`id_eleve`) REFERENCES `eleves` (`id_eleve`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `notes_ibfk_2` FOREIGN KEY (`id_evaluation`) REFERENCES `evaluations` (`id_evaluation`) ON DELETE CASCADE ON UPDATE CASCADE;

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
