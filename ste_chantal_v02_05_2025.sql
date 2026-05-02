-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : sam. 02 mai 2026 à 11:12
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `ste_chantal_claude`
--

-- --------------------------------------------------------

--
-- Structure de la table `absences`
--

CREATE TABLE `absences` (
  `id_absence` int(11) NOT NULL,
  `date_absence` date NOT NULL,
  `nom_matiere` varchar(50) NOT NULL,
  `id_eleve` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `affectations_classes`
--

CREATE TABLE `affectations_classes` (
  `id_eleve` int(11) NOT NULL,
  `id_classe` int(11) NOT NULL,
  `id_annee` int(11) NOT NULL,
  `statut` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `anneescolaires`
--

CREATE TABLE `anneescolaires` (
  `id_annee` int(11) NOT NULL,
  `nom_annee` varchar(200) NOT NULL,
  `date_debut` date NOT NULL,
  `date_fin` date NOT NULL,
  `active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `anneescolaires`
--

INSERT INTO `anneescolaires` (`id_annee`, `nom_annee`, `date_debut`, `date_fin`, `active`) VALUES
(1, 'Année scolaire 2024-2025', '2025-09-11', '2026-07-09', 0),
(2, 'Année scolaire 2025-2026', '2026-02-05', '2026-02-27', 1);

-- --------------------------------------------------------

--
-- Structure de la table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('laravel-cache-spatie.permission.cache', 'a:3:{s:5:\"alias\";a:4:{s:1:\"a\";s:2:\"id\";s:1:\"b\";s:4:\"name\";s:1:\"c\";s:10:\"guard_name\";s:1:\"r\";s:5:\"roles\";}s:11:\"permissions\";a:30:{i:0;a:4:{s:1:\"a\";i:21;s:1:\"b\";s:11:\"view eleves\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:7;i:1;i:9;}}i:1;a:4:{s:1:\"a\";i:22;s:1:\"b\";s:11:\"edit eleves\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:7;}}i:2;a:3:{s:1:\"a\";i:23;s:1:\"b\";s:13:\"delete eleves\";s:1:\"c\";s:3:\"web\";}i:3;a:4:{s:1:\"a\";i:24;s:1:\"b\";s:13:\"create eleves\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:7;}}i:4;a:4:{s:1:\"a\";i:25;s:1:\"b\";s:11:\"show eleves\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:7;}}i:5;a:3:{s:1:\"a\";i:26;s:1:\"b\";s:19:\"view anneescolaires\";s:1:\"c\";s:3:\"web\";}i:6;a:3:{s:1:\"a\";i:27;s:1:\"b\";s:21:\"create anneescolaires\";s:1:\"c\";s:3:\"web\";}i:7;a:3:{s:1:\"a\";i:28;s:1:\"b\";s:19:\"show anneescolaires\";s:1:\"c\";s:3:\"web\";}i:8;a:3:{s:1:\"a\";i:29;s:1:\"b\";s:19:\"edit anneescolaires\";s:1:\"c\";s:3:\"web\";}i:9;a:3:{s:1:\"a\";i:30;s:1:\"b\";s:21:\"delete anneescolaires\";s:1:\"c\";s:3:\"web\";}i:10;a:4:{s:1:\"a\";i:31;s:1:\"b\";s:12:\"view classes\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:7;}}i:11;a:3:{s:1:\"a\";i:32;s:1:\"b\";s:14:\"create classes\";s:1:\"c\";s:3:\"web\";}i:12;a:3:{s:1:\"a\";i:33;s:1:\"b\";s:12:\"show classes\";s:1:\"c\";s:3:\"web\";}i:13;a:3:{s:1:\"a\";i:34;s:1:\"b\";s:12:\"edit classes\";s:1:\"c\";s:3:\"web\";}i:14;a:3:{s:1:\"a\";i:35;s:1:\"b\";s:14:\"delete classes\";s:1:\"c\";s:3:\"web\";}i:15;a:3:{s:1:\"a\";i:36;s:1:\"b\";s:15:\"view evaluation\";s:1:\"c\";s:3:\"web\";}i:16;a:3:{s:1:\"a\";i:37;s:1:\"b\";s:17:\"create evaluation\";s:1:\"c\";s:3:\"web\";}i:17;a:3:{s:1:\"a\";i:38;s:1:\"b\";s:15:\"show evaluation\";s:1:\"c\";s:3:\"web\";}i:18;a:3:{s:1:\"a\";i:39;s:1:\"b\";s:15:\"edit evaluation\";s:1:\"c\";s:3:\"web\";}i:19;a:3:{s:1:\"a\";i:40;s:1:\"b\";s:17:\"delete evaluation\";s:1:\"c\";s:3:\"web\";}i:20;a:4:{s:1:\"a\";i:41;s:1:\"b\";s:13:\"view matieres\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:7;}}i:21;a:3:{s:1:\"a\";i:42;s:1:\"b\";s:15:\"create matieres\";s:1:\"c\";s:3:\"web\";}i:22;a:3:{s:1:\"a\";i:43;s:1:\"b\";s:13:\"show matieres\";s:1:\"c\";s:3:\"web\";}i:23;a:3:{s:1:\"a\";i:44;s:1:\"b\";s:13:\"edit matieres\";s:1:\"c\";s:3:\"web\";}i:24;a:3:{s:1:\"a\";i:45;s:1:\"b\";s:15:\"delete matieres\";s:1:\"c\";s:3:\"web\";}i:25;a:3:{s:1:\"a\";i:46;s:1:\"b\";s:18:\"view parascolaires\";s:1:\"c\";s:3:\"web\";}i:26;a:3:{s:1:\"a\";i:47;s:1:\"b\";s:20:\"create parascolaires\";s:1:\"c\";s:3:\"web\";}i:27;a:3:{s:1:\"a\";i:48;s:1:\"b\";s:18:\"show parascolaires\";s:1:\"c\";s:3:\"web\";}i:28;a:3:{s:1:\"a\";i:49;s:1:\"b\";s:18:\"edit parascolaires\";s:1:\"c\";s:3:\"web\";}i:29;a:3:{s:1:\"a\";i:50;s:1:\"b\";s:20:\"delete parascolaires\";s:1:\"c\";s:3:\"web\";}}s:5:\"roles\";a:2:{i:0;a:3:{s:1:\"a\";i:7;s:1:\"b\";s:5:\"admin\";s:1:\"c\";s:3:\"web\";}i:1;a:3:{s:1:\"a\";i:9;s:1:\"b\";s:9:\"sub amdin\";s:1:\"c\";s:3:\"web\";}}}', 1777799368);

-- --------------------------------------------------------

--
-- Structure de la table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `classes`
--

CREATE TABLE `classes` (
  `id_classe` int(11) NOT NULL,
  `nom_classe` varchar(10) NOT NULL,
  `niveau` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `classes`
--

INSERT INTO `classes` (`id_classe`, `nom_classe`, `niveau`) VALUES
(1, '9ème C', 'primaire'),
(2, '8ème B', 'Primaire');

-- --------------------------------------------------------

--
-- Structure de la table `classes_annees`
--

CREATE TABLE `classes_annees` (
  `id_classe` int(11) NOT NULL,
  `id_annee` int(11) NOT NULL,
  `effectif` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `ecolages`
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
-- Structure de la table `eleves`
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
-- Déchargement des données de la table `eleves`
--

INSERT INTO `eleves` (`id_eleve`, `matricule`, `nom`, `prenom`, `date_nais`, `lieu_nais`, `adresse`, `genre`, `annee_scolaire_entree`, `id_parent`) VALUES
(1, 600000, 'RAKOTO1223', 'Kellyy5*5', '2010-03-02', 'Antananrivo', 'Ampamantanana', 'Masculin', 'Année scolaire 2018-2019', 1),
(2, 600001, 'ANDRY3', 'Rajo', '2025-08-06', 'Antananrivo', 'Ampamantanana', 'Masculin', 'Année scolaire 2022-2023', 2);

-- --------------------------------------------------------

--
-- Structure de la table `evaluations`
--

CREATE TABLE `evaluations` (
  `id_evaluation` int(11) NOT NULL,
  `type_evaluation` varchar(50) NOT NULL,
  `date_evaluation` date NOT NULL,
  `periode` varchar(100) NOT NULL,
  `bareme` int(11) NOT NULL,
  `id_matiere` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `evaluations`
--

INSERT INTO `evaluations` (`id_evaluation`, `type_evaluation`, `date_evaluation`, `periode`, `bareme`, `id_matiere`) VALUES
(1, 'Test', '2026-04-23', 'Trimestre I', 20, 1);

-- --------------------------------------------------------

--
-- Structure de la table `failed_jobs`
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
-- Structure de la table `frais`
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
-- Structure de la table `infirmeries`
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
-- Structure de la table `inscriptions`
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
-- Structure de la table `jobs`
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
-- Structure de la table `job_batches`
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
-- Structure de la table `matieres`
--

CREATE TABLE `matieres` (
  `id_matiere` int(11) NOT NULL,
  `nom_matiere` varchar(100) NOT NULL,
  `nom_prof` varchar(100) NOT NULL,
  `coefficient` int(11) NOT NULL,
  `id_classe` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `matieres`
--

INSERT INTO `matieres` (`id_matiere`, `nom_matiere`, `nom_prof`, `coefficient`, `id_classe`) VALUES
(1, 'Malagasy', 'test name', 2, 1);

-- --------------------------------------------------------

--
-- Structure de la table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2026_04_14_090922_create_permission_tables', 2);

-- --------------------------------------------------------

--
-- Structure de la table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(7, 'App\\Models\\User', 1),
(7, 'App\\Models\\User', 4),
(9, 'App\\Models\\User', 1),
(10, 'App\\Models\\User', 5);

-- --------------------------------------------------------

--
-- Structure de la table `notes`
--

CREATE TABLE `notes` (
  `id_eleve` int(11) NOT NULL,
  `id_evaluation` int(11) NOT NULL,
  `note` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `parapointages`
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
-- Structure de la table `parascolaires`
--

CREATE TABLE `parascolaires` (
  `id_para` int(11) NOT NULL,
  `activite_choisie` varchar(100) NOT NULL,
  `frais_para` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `parascolaires`
--

INSERT INTO `parascolaires` (`id_para`, `activite_choisie`, `frais_para`) VALUES
(1, 'Football', 10000);

-- --------------------------------------------------------

--
-- Structure de la table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `password_reset_tokens`
--

INSERT INTO `password_reset_tokens` (`email`, `token`, `created_at`) VALUES
('lafatra@gmail.com', '$2y$12$42ur2HYo7JKoZ05t0XOQEeNOYwo0T0k/96hSRwS5oqhFf.d4gMsn6', '2026-04-14 07:52:51');

-- --------------------------------------------------------

--
-- Structure de la table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(21, 'view eleves', 'web', '2026-04-22 09:27:06', '2026-04-22 09:27:06'),
(22, 'edit eleves', 'web', '2026-04-22 19:49:31', '2026-04-22 19:49:31'),
(23, 'delete eleves', 'web', '2026-04-22 19:49:56', '2026-04-22 19:49:56'),
(24, 'create eleves', 'web', '2026-04-22 19:50:15', '2026-04-22 19:50:15'),
(25, 'show eleves', 'web', '2026-04-22 19:50:28', '2026-04-22 19:50:28'),
(26, 'view anneescolaires', 'web', '2026-04-22 22:53:40', '2026-04-22 22:53:40'),
(27, 'create anneescolaires', 'web', '2026-04-22 22:54:05', '2026-04-22 22:54:05'),
(28, 'show anneescolaires', 'web', '2026-04-22 22:54:29', '2026-04-22 22:54:29'),
(29, 'edit anneescolaires', 'web', '2026-04-22 22:54:56', '2026-04-22 22:54:56'),
(30, 'delete anneescolaires', 'web', '2026-04-22 22:55:27', '2026-04-22 22:55:27'),
(31, 'view classes', 'web', '2026-04-22 22:57:11', '2026-04-22 22:57:11'),
(32, 'create classes', 'web', '2026-04-22 22:57:37', '2026-04-22 22:57:37'),
(33, 'show classes', 'web', '2026-04-22 22:58:04', '2026-04-22 22:58:04'),
(34, 'edit classes', 'web', '2026-04-22 22:58:31', '2026-04-22 22:58:31'),
(35, 'delete classes', 'web', '2026-04-22 22:58:50', '2026-04-22 22:58:50'),
(36, 'view evaluation', 'web', '2026-04-22 23:00:18', '2026-04-22 23:00:18'),
(37, 'create evaluation', 'web', '2026-04-22 23:00:44', '2026-04-22 23:00:44'),
(38, 'show evaluation', 'web', '2026-04-22 23:02:17', '2026-04-22 23:02:17'),
(39, 'edit evaluation', 'web', '2026-04-22 23:02:32', '2026-04-22 23:02:32'),
(40, 'delete evaluation', 'web', '2026-04-22 23:02:48', '2026-04-22 23:02:48'),
(41, 'view matieres', 'web', '2026-04-22 23:03:29', '2026-04-22 23:03:29'),
(42, 'create matieres', 'web', '2026-04-22 23:03:43', '2026-04-22 23:03:43'),
(43, 'show matieres', 'web', '2026-04-22 23:04:03', '2026-04-22 23:04:03'),
(44, 'edit matieres', 'web', '2026-04-22 23:04:15', '2026-04-22 23:04:15'),
(45, 'delete matieres', 'web', '2026-04-22 23:04:33', '2026-04-22 23:04:33'),
(46, 'view parascolaires', 'web', '2026-04-22 23:05:21', '2026-04-22 23:05:21'),
(47, 'create parascolaires', 'web', '2026-04-22 23:05:43', '2026-04-22 23:05:43'),
(48, 'show parascolaires', 'web', '2026-04-22 23:06:03', '2026-04-22 23:06:03'),
(49, 'edit parascolaires', 'web', '2026-04-22 23:06:21', '2026-04-22 23:06:21'),
(50, 'delete parascolaires', 'web', '2026-04-22 23:06:53', '2026-04-22 23:06:53');

-- --------------------------------------------------------

--
-- Structure de la table `personnels`
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
-- Structure de la table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(7, 'admin', 'web', '2026-04-16 17:36:59', '2026-04-16 17:36:59'),
(9, 'sub amdin', 'web', '2026-04-22 10:10:05', '2026-04-22 20:38:18'),
(10, 'SuperAdmin', 'web', '2026-04-22 20:55:28', '2026-04-22 20:55:28');

-- --------------------------------------------------------

--
-- Structure de la table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(21, 7),
(21, 9),
(22, 7),
(24, 7),
(25, 7),
(31, 7),
(41, 7);

-- --------------------------------------------------------

--
-- Structure de la table `sanctions`
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
-- Structure de la table `sessions`
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
-- Déchargement des données de la table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('2mgLk7UowQFKFW5bgvK9MGS7HTX88wdEuf69jcFV', 5, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/147.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoidXBnVFZPMEJubW5BdURLbmZJVWFBMlhXS21VUVNiU09Vak4wNGdRcSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6Mzc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9wZXJtaXNzaW9uL2xpc3QiO3M6NToicm91dGUiO3M6MTY6InBlcm1pc3Npb25zLmxpc3QiO31zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aTo1O30=', 1776912236),
('H7SgFbY0dduVAbdIhK9QkrRJO52f8u9X97udqIBE', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/147.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiMUdadjJpWHU2bExHYTJacUNnd1VwSFE0TnJuQ2xkSEhOcEFFRG9PeCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7czo1OiJyb3V0ZSI7czo1OiJsb2dpbiI7fX0=', 1777713054);

-- --------------------------------------------------------

--
-- Structure de la table `sortieanticipees`
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
-- Structure de la table `studentparents`
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
-- Déchargement des données de la table `studentparents`
--

INSERT INTO `studentparents` (`id_parent`, `matricule_parent`, `nom_pere`, `profession_pere`, `nom_mere`, `profession_mere`, `nom_tuteur`, `profession_tuteur`, `telephone`, `email`, `adresse_parent`) VALUES
(1, '2435', 'RAKOTO Randria', 'Chauffeur', 'RASOA Jeannette', 'Commerçante', 'ANDRISOA', 'Professeur', '0341120011', 'rakotorandria@gmail.com', 'Ampamantanana'),
(2, '0001fam2526', 'RANDRIA', 'Chauffeur', 'RAKETAKA', 'Vendeuse', 'RAFOTSY', 'Vendeuse', '0342464302', 'randria@gmail.com', 'Ambanidia');

-- --------------------------------------------------------

--
-- Structure de la table `users`
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
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Lafatra Raharison', 'lafatra@gmail.com', NULL, '$2y$12$7Wy2OAd3XBualFcl/k/Ik.VnDAw0MkpDHskXgE7vZFLvLS98ZZDyO', NULL, '2026-04-12 22:34:59', '2026-04-14 07:52:07'),
(4, 'lafatratest', 'testl@gmail.com', NULL, '$2y$12$0uxGJbpFSedXld0DDrrmregvz8eqfyXHCMotcAsv3g3TQxgxurNkS', NULL, '2026-04-12 23:37:50', '2026-04-22 08:42:09'),
(5, 'LafatraSA', 'lafatrasupad@gmail.com', NULL, '$2y$12$emICuY1dGJ2fuEdbCvtG3erkCi7dDaP3PPz52Z2kahb5OD8.xmaM6', NULL, '2026-04-22 20:54:48', '2026-04-22 20:54:48');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `absences`
--
ALTER TABLE `absences`
  ADD PRIMARY KEY (`id_absence`),
  ADD KEY `id_eleve` (`id_eleve`);

--
-- Index pour la table `affectations_classes`
--
ALTER TABLE `affectations_classes`
  ADD KEY `id_eleve` (`id_eleve`),
  ADD KEY `id_classe` (`id_classe`),
  ADD KEY `id_annee` (`id_annee`);

--
-- Index pour la table `anneescolaires`
--
ALTER TABLE `anneescolaires`
  ADD PRIMARY KEY (`id_annee`);

--
-- Index pour la table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_expiration_index` (`expiration`);

--
-- Index pour la table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_locks_expiration_index` (`expiration`);

--
-- Index pour la table `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`id_classe`);

--
-- Index pour la table `classes_annees`
--
ALTER TABLE `classes_annees`
  ADD KEY `id_classe` (`id_classe`),
  ADD KEY `id_annee` (`id_annee`);

--
-- Index pour la table `ecolages`
--
ALTER TABLE `ecolages`
  ADD PRIMARY KEY (`id_ecolage`),
  ADD KEY `id_eleve` (`id_eleve`);

--
-- Index pour la table `eleves`
--
ALTER TABLE `eleves`
  ADD PRIMARY KEY (`id_eleve`),
  ADD UNIQUE KEY `matricule` (`matricule`),
  ADD UNIQUE KEY `matricule_2` (`matricule`),
  ADD KEY `id_parent` (`id_parent`);

--
-- Index pour la table `evaluations`
--
ALTER TABLE `evaluations`
  ADD PRIMARY KEY (`id_evaluation`),
  ADD KEY `id_matiere` (`id_matiere`);

--
-- Index pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Index pour la table `frais`
--
ALTER TABLE `frais`
  ADD PRIMARY KEY (`id_frais`),
  ADD KEY `id_inscription` (`id_inscription`);

--
-- Index pour la table `infirmeries`
--
ALTER TABLE `infirmeries`
  ADD PRIMARY KEY (`id_infirmerie`),
  ADD KEY `id_eleve` (`id_eleve`);

--
-- Index pour la table `inscriptions`
--
ALTER TABLE `inscriptions`
  ADD PRIMARY KEY (`id_inscription`),
  ADD KEY `id_eleve` (`id_eleve`),
  ADD KEY `id_annee` (`id_annee`),
  ADD KEY `id_classe` (`id_classe`),
  ADD KEY `id_frais` (`id_frais`);

--
-- Index pour la table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Index pour la table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `matieres`
--
ALTER TABLE `matieres`
  ADD PRIMARY KEY (`id_matiere`),
  ADD KEY `id_classe` (`id_classe`);

--
-- Index pour la table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Index pour la table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Index pour la table `notes`
--
ALTER TABLE `notes`
  ADD KEY `id_eleve` (`id_eleve`),
  ADD KEY `id_evaluation` (`id_evaluation`);

--
-- Index pour la table `parapointages`
--
ALTER TABLE `parapointages`
  ADD PRIMARY KEY (`id_parapointage`),
  ADD KEY `id_para` (`id_para`),
  ADD KEY `id_eleve` (`id_eleve`);

--
-- Index pour la table `parascolaires`
--
ALTER TABLE `parascolaires`
  ADD PRIMARY KEY (`id_para`);

--
-- Index pour la table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Index pour la table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Index pour la table `personnels`
--
ALTER TABLE `personnels`
  ADD PRIMARY KEY (`id_personnel`);

--
-- Index pour la table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Index pour la table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Index pour la table `sanctions`
--
ALTER TABLE `sanctions`
  ADD PRIMARY KEY (`id_sanction`),
  ADD KEY `id_eleve` (`id_eleve`);

--
-- Index pour la table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Index pour la table `sortieanticipees`
--
ALTER TABLE `sortieanticipees`
  ADD PRIMARY KEY (`id_sortie`),
  ADD KEY `id_eleve` (`id_eleve`);

--
-- Index pour la table `studentparents`
--
ALTER TABLE `studentparents`
  ADD PRIMARY KEY (`id_parent`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `absences`
--
ALTER TABLE `absences`
  MODIFY `id_absence` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `anneescolaires`
--
ALTER TABLE `anneescolaires`
  MODIFY `id_annee` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `classes`
--
ALTER TABLE `classes`
  MODIFY `id_classe` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `ecolages`
--
ALTER TABLE `ecolages`
  MODIFY `id_ecolage` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `eleves`
--
ALTER TABLE `eleves`
  MODIFY `id_eleve` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `evaluations`
--
ALTER TABLE `evaluations`
  MODIFY `id_evaluation` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `frais`
--
ALTER TABLE `frais`
  MODIFY `id_frais` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `infirmeries`
--
ALTER TABLE `infirmeries`
  MODIFY `id_infirmerie` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `inscriptions`
--
ALTER TABLE `inscriptions`
  MODIFY `id_inscription` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `matieres`
--
ALTER TABLE `matieres`
  MODIFY `id_matiere` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `parapointages`
--
ALTER TABLE `parapointages`
  MODIFY `id_parapointage` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `parascolaires`
--
ALTER TABLE `parascolaires`
  MODIFY `id_para` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT pour la table `personnels`
--
ALTER TABLE `personnels`
  MODIFY `id_personnel` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `sanctions`
--
ALTER TABLE `sanctions`
  MODIFY `id_sanction` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `sortieanticipees`
--
ALTER TABLE `sortieanticipees`
  MODIFY `id_sortie` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `studentparents`
--
ALTER TABLE `studentparents`
  MODIFY `id_parent` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `absences`
--
ALTER TABLE `absences`
  ADD CONSTRAINT `absences_ibfk_1` FOREIGN KEY (`id_eleve`) REFERENCES `eleves` (`id_eleve`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `affectations_classes`
--
ALTER TABLE `affectations_classes`
  ADD CONSTRAINT `affectations_classes_ibfk_1` FOREIGN KEY (`id_eleve`) REFERENCES `eleves` (`id_eleve`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `affectations_classes_ibfk_2` FOREIGN KEY (`id_classe`) REFERENCES `classes` (`id_classe`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `affectations_classes_ibfk_3` FOREIGN KEY (`id_annee`) REFERENCES `anneescolaires` (`id_annee`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `classes_annees`
--
ALTER TABLE `classes_annees`
  ADD CONSTRAINT `classes_annees_ibfk_1` FOREIGN KEY (`id_annee`) REFERENCES `anneescolaires` (`id_annee`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `classes_annees_ibfk_2` FOREIGN KEY (`id_classe`) REFERENCES `classes` (`id_classe`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `ecolages`
--
ALTER TABLE `ecolages`
  ADD CONSTRAINT `ecolages_ibfk_1` FOREIGN KEY (`id_eleve`) REFERENCES `eleves` (`id_eleve`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `eleves`
--
ALTER TABLE `eleves`
  ADD CONSTRAINT `eleves_ibfk_1` FOREIGN KEY (`id_parent`) REFERENCES `studentparents` (`id_parent`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `evaluations`
--
ALTER TABLE `evaluations`
  ADD CONSTRAINT `evaluations_ibfk_1` FOREIGN KEY (`id_matiere`) REFERENCES `matieres` (`id_matiere`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `infirmeries`
--
ALTER TABLE `infirmeries`
  ADD CONSTRAINT `infirmeries_ibfk_1` FOREIGN KEY (`id_eleve`) REFERENCES `eleves` (`id_eleve`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `inscriptions`
--
ALTER TABLE `inscriptions`
  ADD CONSTRAINT `inscriptions_ibfk_1` FOREIGN KEY (`id_eleve`) REFERENCES `eleves` (`id_eleve`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `inscriptions_ibfk_2` FOREIGN KEY (`id_annee`) REFERENCES `anneescolaires` (`id_annee`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `matieres`
--
ALTER TABLE `matieres`
  ADD CONSTRAINT `matieres_ibfk_2` FOREIGN KEY (`id_classe`) REFERENCES `classes` (`id_classe`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `notes`
--
ALTER TABLE `notes`
  ADD CONSTRAINT `notes_ibfk_1` FOREIGN KEY (`id_eleve`) REFERENCES `eleves` (`id_eleve`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `notes_ibfk_2` FOREIGN KEY (`id_evaluation`) REFERENCES `evaluations` (`id_evaluation`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `parapointages`
--
ALTER TABLE `parapointages`
  ADD CONSTRAINT `parapointages_ibfk_1` FOREIGN KEY (`id_para`) REFERENCES `parascolaires` (`id_para`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `parapointages_ibfk_2` FOREIGN KEY (`id_eleve`) REFERENCES `eleves` (`id_eleve`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `sanctions`
--
ALTER TABLE `sanctions`
  ADD CONSTRAINT `sanctions_ibfk_1` FOREIGN KEY (`id_eleve`) REFERENCES `eleves` (`id_eleve`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `sortieanticipees`
--
ALTER TABLE `sortieanticipees`
  ADD CONSTRAINT `sortieanticipees_ibfk_1` FOREIGN KEY (`id_eleve`) REFERENCES `eleves` (`id_eleve`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
