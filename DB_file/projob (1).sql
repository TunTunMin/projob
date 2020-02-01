-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 30, 2020 at 04:40 AM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.1.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projob`
--

-- --------------------------------------------------------

--
-- Table structure for table `addresses`
--

CREATE TABLE `addresses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `township_id` bigint(20) UNSIGNED NOT NULL,
  `street_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `addresses`
--

INSERT INTO `addresses` (`id`, `township_id`, `street_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 5, 1, '2020-01-24 07:09:11', '2020-01-24 07:09:11', NULL),
(2, 5, 2, '2020-01-24 07:11:41', '2020-01-24 07:11:41', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE `companies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_overview` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `register_no` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ea_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_size` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `industry` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `average_processtime` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `benefit_other` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gallery` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cover_photo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `ea_register_no` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`id`, `name`, `company_overview`, `register_no`, `ea_no`, `company_size`, `industry`, `location`, `average_processtime`, `benefit_other`, `gallery`, `cover_photo`, `logo`, `type_id`, `created_at`, `updated_at`, `deleted_at`, `ea_register_no`, `website`, `facebook`) VALUES
(1, 'Excelitas Technologies Singapore Pte. Ltd.', '<p><span style=\"color: rgb(51, 51, 51); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 14px; background-color: rgb(229, 248, 255);\">We have this challenging and interesting opportunity for an&nbsp;</span><span class=\"key-highlight\" style=\"color: rgb(51, 51, 51); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 14px; background-color: rgb(229, 248, 255);\">Executive</span><span style=\"color: rgb(51, 51, 51); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 14px; background-color: rgb(229, 248, 255);\">&nbsp;Assistant to join our Japan team. Selected incumbent will be offered a 2 years...</span><br></p>', '20222', 'EA-2424242', '51 - 200 Employees', 'Testing', 'Singapore', '13 Days', NULL, '[\"image-2.png\",\"image-3.png\"]', '1579873718.jpg', '1579873718.jpg', 1, '2020-01-24 07:18:38', '2020-01-24 07:18:38', NULL, 'ER-424242', 'http://ttm.itbankus.com/', 'https://www.facebook.com/profile.php?id=100007244836333'),
(2, 'Client Relationship Executive (Business Customer Management) Sales Marketing', '<p>At Victory17 HR Solutions we understand your needs; we are your perfect one-stop staffing solutions partners in local and foreign recruitment. As a leading recruitment agency and staffing solutions provider, we’re constantly shaping comprehensive strategies and expanding our local and global network of foreign workers and professionals to give our clients access to the best service. Along with our personalized, professional and friendly recruitment service and approach, these factors make us the first choice for many leading SMEs and MNCs in Singapore.&lt;br&gt;&lt;br&gt;Victory17 HR Solutions has the experience required to get right to the source of qualified personnel. We can help your organization determine its precise labour needs and we will guide you through the process of selecting the right people for your team.</p><p><span style=\"color: rgb(213, 213, 213); font-family: Menlo, monospace; font-size: 11px; white-space: pre-wrap; background-color: rgb(36, 36, 36);\">IT IS NOT WHAT WE DO, BUT HOW WE DO IT THAT MAKES US DIFFERENT</span><br></p>', NULL, '15C7597', NULL, 'Human Resources Management/Consulting', NULL, '1 Day Fast', NULL, '[\"company_logo.png\"]', '1579874274.jpg', '1579874274.jpg', 1, '2020-01-24 07:27:54', '2020-01-24 07:27:54', NULL, NULL, 'http://www.victory17.com.sg', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `educations`
--

CREATE TABLE `educations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `institute_university` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `graduate_date` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `qualification_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `institute_location_id` bigint(20) UNSIGNED DEFAULT NULL,
  `field_study_id` bigint(20) UNSIGNED DEFAULT NULL,
  `major` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `grade` int(11) DEFAULT NULL,
  `additional_info` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `educations`
--

INSERT INTO `educations` (`id`, `institute_university`, `graduate_date`, `qualification_id`, `created_at`, `updated_at`, `institute_location_id`, `field_study_id`, `major`, `grade`, `additional_info`, `user_id`, `deleted_at`) VALUES
(4, 'University of Computer Studies, Meiktila', '\"2018-02\"', 6, '2020-01-17 11:36:08', '2020-01-17 11:36:08', 4, 1, NULL, NULL, NULL, 5, NULL),
(5, 'KMD-Down Town', '\"2017-03\"', 1, '2020-01-23 10:38:58', '2020-01-23 17:51:30', 1, 1, 'JAVA', 3, 'Testing', 5, '2020-01-23 17:51:30');

-- --------------------------------------------------------

--
-- Table structure for table `experiences`
--

CREATE TABLE `experiences` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `position_title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `job_duration_from` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `job_duration_to` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `specializations_id` bigint(20) UNSIGNED DEFAULT NULL,
  `role_id` bigint(20) UNSIGNED DEFAULT NULL,
  `industries_id` bigint(20) UNSIGNED DEFAULT NULL,
  `position_level` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `currency_unit` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `monthly_salary` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `experience_description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `phone_no` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `experiences`
--

INSERT INTO `experiences` (`id`, `position_title`, `company_name`, `job_duration_from`, `job_duration_to`, `specializations_id`, `role_id`, `industries_id`, `position_level`, `currency_unit`, `monthly_salary`, `experience_description`, `user_id`, `created_at`, `updated_at`, `deleted_at`, `phone_no`) VALUES
(1, 'Full-stack developer', 'HostMyanmar', '2017-02', NULL, 1, 1, 2, '1', NULL, NULL, NULL, 3, '2020-01-15 11:35:57', '2020-01-15 11:35:57', NULL, ''),
(2, 'Junior-stack developer', 'Computer University', '2018-02', '2019-03', 1, 1, 2, '1', 'SGD', '2000', NULL, 5, '2020-01-17 11:38:21', '2020-01-22 20:57:28', '2020-01-22 20:57:28', NULL),
(3, 'Senior Web Developer', 'Tun', '2017-04', NULL, 1, 1, 2, '1', 'USD', '20000', NULL, 5, '2020-01-21 00:29:05', '2020-01-21 00:29:05', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `field_studies`
--

CREATE TABLE `field_studies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `field_studies`
--

INSERT INTO `field_studies` (`id`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Computer Science/Information Technology', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `industries`
--

CREATE TABLE `industries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `industries`
--

INSERT INTO `industries` (`id`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, ' Accounting / Audit / Tax Services', NULL, NULL, NULL),
(2, 'Computer / Information Technology (Software)', NULL, NULL, NULL),
(3, 'Computer / Information Technology (Hardware)', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_date` datetime NOT NULL,
  `job_highlights` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `job_description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `career_level` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `qualification` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `employee_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `salary_unit` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `salary_from` int(11) NOT NULL,
  `salary_to` int(11) NOT NULL,
  `specialization_id` bigint(20) UNSIGNED NOT NULL,
  `job_type_id` bigint(20) UNSIGNED NOT NULL,
  `company_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`id`, `title`, `post_date`, `job_highlights`, `job_description`, `career_level`, `qualification`, `employee_type`, `salary_unit`, `salary_from`, `salary_to`, `specialization_id`, `job_type_id`, `company_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Junior Web Developer', '2020-01-24 20:29:00', '<div style=\"color: rgb(212, 212, 212); background-color: rgb(30, 30, 30); font-family: Menlo, Monaco, &quot;Courier New&quot;, monospace; font-size: 12px; line-height: 18px; white-space: pre;\">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Officiis reiciendis, temporibus minima corporis iusto voluptates quibusdam voluptatibus eaque eius obcaecati, voluptatem molestiae! Delectus sed recusandae officiis non et, vel cum!</div>', '<div style=\"color: rgb(212, 212, 212); background-color: rgb(30, 30, 30); font-family: Menlo, Monaco, &quot;Courier New&quot;, monospace; font-size: 12px; line-height: 18px; white-space: pre;\">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Officiis reiciendis, temporibus minima corporis iusto voluptates quibusdam voluptatibus eaque eius obcaecati, voluptatem molestiae! Delectus sed recusandae officiis non et, vel cum!</div>', 'Junior', 'B.C.Sc', 'Full-time', 'SGD', 2000, 3000, 3, 1, 1, '2020-01-24 07:32:17', '2020-01-24 07:32:17', NULL),
(2, 'Senior Andriod Developer', '2020-01-24 20:32:00', '<b>•$3000-$6000 (Salary + Comm)<br>•Client Relationship Representative<br>•No Need To Find Customers<br>•Interested Customers Office Meet Up Appointments Fully Provided<br>•No Experience Acceptable - Training provided<br>•Career Progression Available<br>•Whatsapp Only - For Applications And Enquiries - Alvin 93381340</b>', '<div><div><b>•$3000-$6000 (Salary + Comm)<br>•Client Relationship Representative<br>•No Need To Find Customers<br>•Interested Customers Office Meet Up Appointments Fully Provided<br>•No Experience Acceptable - Training provided<br>•Career Progression Available<br>•Whatsapp Only - For Applications And Enquiries - Alvin 93381340</b></div><div>&nbsp;</div><div>(Pay Package To Be Negotiated Based On Interviewing Confidence + Past Work Experiences And Last Drawn Salary)</div><div>&nbsp;</div><div><b>•Not Required To Be A Sales Hunter<br>•No Cold Calls<br>•No Roadshows<br>•No Street Canvassing<br>•No Door To Door<br>•No Approaching Of Own Contacts<br>•(Ready To Be Prospected Customers Portfolios Office Appointments Provided)</b></div><div>&nbsp;</div><div>•••Job Requirements•••<br>To Serve B2B/B2C Customers + Clients Via Appointment Basis And Explain Enquiries In Office, Showing Customers Around Company’s Facilities + One To One Sales And Events Presentations, Maintaining Relationship Of Existing Client Accounts As Well, Applicants Have To Like Interacting With People</div><div>&nbsp;</div><div><b>•••Salary•••<br>Average Take Home $6000 Per Monthly Based On New Personnels First Year Track Record, And 5-Figure Monthly Monetary Career Advancement And Progression To Come When Experienced</b></div><div>&nbsp;</div><div>•••Eligibility•••<br>For Full-Time Jobseekers, Looking For Lucrative Career, People On Part-Time Studies Welcome As Well</div><div>&nbsp;</div><div><b>•••Application/Enquiries•••<br>(Whatsapp only) To Alvin 93381340 For Applications And Enquiries (24/7 Reply ASAP)</b></div><div>&nbsp;</div><div>•••Note•••<br>By Sending Any Application To Us, You Will Have Deemed To Have Consented To Us Collecting, Using, Retaining And Disclosing Your Personal Information To Prospective Employers For Their Consideration</div><div>&nbsp;</div><div><b>•••Note: No Calls Will Be Entertained•••</b></div><div>&nbsp;</div><div>Alvin Chia<br>Victory17 HR Solutions Pte. Ltd<br>EA license: 15C7597<br>EA Personnel No : R1874093</div></div>', 'Senior', 'B.C.Sc or B.C.St', 'Full-time', 'SGD', 3000, 4000, 2, 1, 2, '2020-01-24 07:35:43', '2020-01-24 07:35:43', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `job_types`
--

CREATE TABLE `job_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `job_types`
--

INSERT INTO `job_types` (`id`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'IT', '2020-01-24 07:13:09', '2020-01-24 07:13:09', NULL),
(2, 'Accounting', '2020-01-24 07:13:23', '2020-01-24 07:13:23', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

CREATE TABLE `languages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `language_id` int(11) NOT NULL,
  `spoken` int(11) NOT NULL,
  `written` int(11) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `languages`
--

INSERT INTO `languages` (`id`, `language_id`, `spoken`, `written`, `user_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 5, 5, 5, 5, '2020-01-18 01:17:38', '2020-01-18 01:29:17', NULL),
(2, 12, 1, 1, 5, '2020-01-18 01:17:38', '2020-01-19 03:27:05', '2020-01-19 03:27:05'),
(9, 5, 5, 5, 5, '2020-01-19 03:27:33', '2020-01-19 03:29:58', '2020-01-19 03:29:58'),
(10, 12, 1, 2, 5, '2020-01-19 03:27:33', '2020-01-19 03:27:33', NULL),
(11, 3, 0, 1, 5, '2020-01-19 03:30:14', '2020-01-19 03:41:47', '2020-01-19 03:41:47');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2013_11_19_090415_create_types_table', 1),
(2, '2014_10_12_000000_create_users_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2019_11_19_085440_create_job_types_table', 1),
(5, '2019_11_19_085941_create_nationalities_table', 1),
(6, '2019_11_19_090043_create_races_table', 1),
(7, '2019_11_19_090222_create_townships_table', 1),
(8, '2019_11_19_090315_create_streets_table', 1),
(9, '2019_11_19_090420_create_specializations_table', 1),
(10, '2019_11_19_090602_create_addresses_table', 1),
(11, '2019_11_19_090935_create_companies_table', 1),
(12, '2019_11_19_091636_create_jobs_table', 1),
(13, '2019_11_19_093030_create_save_jobs_table', 1),
(14, '2019_11_19_093031_create_field_studies_table', 1),
(15, '2019_11_19_093032_create_qualifications_table', 1),
(16, '2019_11_19_093315_create_user_detail_infos_table', 1),
(17, '2019_11_19_095019_add_active_to_users_table', 1),
(18, '2019_11_19_095255_add_softdelete_to_users_table', 1),
(19, '2019_11_29_080427_add_ea_register_no_to_companies_table', 1),
(20, '2019_12_30_090536_add_votes_to_companies_table', 1),
(21, '2020_01_10_034624_create_roles_table', 1),
(22, '2020_01_10_075012_create_industries_table', 1),
(23, '2020_01_10_075014_add_changenameindustry_to_user_detail_infos_table', 1),
(24, '2020_01_10_135846_add_role_id_to_user_detail_infos', 1),
(25, '2020_01_15_092117_create_experiences_table', 1),
(26, '2020_01_15_140939_create_educations_table', 1),
(27, '2020_01_15_141726_create_skills_table', 1),
(28, '2020_01_15_142036_create_languages_table', 1),
(29, '2020_01_16_071738_add_phone_no_to_experiences', 2),
(32, '2020_01_18_151120_add__profile_image_to_user_detail_infos', 3);

-- --------------------------------------------------------

--
-- Table structure for table `nationalities`
--

CREATE TABLE `nationalities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `nationalities`
--

INSERT INTO `nationalities` (`id`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Myanmar', '2020-01-14 17:30:00', '2020-01-14 17:30:00', NULL),
(2, 'English', '2020-01-14 17:30:00', '2020-01-14 17:30:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `qualifications`
--

CREATE TABLE `qualifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `qualifications`
--

INSERT INTO `qualifications` (`id`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Primary/Secondary School', NULL, NULL, NULL),
(2, 'Higher Secondary/Pre-U/\r\n', NULL, NULL, NULL),
(3, 'Professional Certificate', NULL, NULL, NULL),
(4, 'Diploma', NULL, NULL, NULL),
(5, 'Advanced/Higher/Graduate Diploma', NULL, NULL, NULL),
(6, 'Bachelor\'s Degree', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `races`
--

CREATE TABLE `races` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `races`
--

INSERT INTO `races` (`id`, `name`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Burmese', NULL, '2020-01-24 07:12:08', '2020-01-24 07:12:08');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `specialization_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `specialization_id`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'audit', NULL, NULL, NULL),
(2, 2, 'Banking', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `save_jobs`
--

CREATE TABLE `save_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `job_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `skills`
--

CREATE TABLE `skills` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `position_level` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `skills`
--

INSERT INTO `skills` (`id`, `name`, `position_level`, `user_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'PHP', '1', 3, '2020-01-17 10:38:40', '2020-01-17 10:38:40', NULL),
(2, 'Laravel', '1', 3, '2020-01-17 10:38:40', '2020-01-17 10:38:40', NULL),
(3, 'WordPress', '2', 3, '2020-01-17 10:38:40', '2020-01-17 10:38:40', NULL),
(4, 'PHP', '1', 3, '2020-01-17 11:19:32', '2020-01-17 11:19:32', NULL),
(5, 'Laravel', '1', 3, '2020-01-17 11:19:32', '2020-01-17 11:19:32', NULL),
(6, 'WordPress', '2', 3, '2020-01-17 11:19:32', '2020-01-17 11:19:32', NULL),
(7, 'PHP', '1', 3, '2020-01-17 11:26:33', '2020-01-17 11:26:33', NULL),
(8, 'Laravel', '1', 3, '2020-01-17 11:26:33', '2020-01-17 11:26:33', NULL),
(9, 'WordPress', '2', 3, '2020-01-17 11:26:33', '2020-01-17 11:26:33', NULL),
(15, 'PHP', '0', 5, '2020-01-17 21:08:01', '2020-01-17 21:08:01', NULL),
(16, 'Laravel', '1', 5, '2020-01-17 21:08:01', '2020-01-17 21:08:01', NULL),
(17, 'NodeJS', '1', 5, '2020-01-17 21:08:01', '2020-01-17 21:08:01', NULL),
(18, 'WordPress', '0', 5, '2020-01-17 21:08:01', '2020-01-17 21:08:01', NULL),
(20, 'Microsoft World', '1', 5, '2020-01-17 21:08:01', '2020-01-17 21:08:01', NULL),
(21, 'Photoshop', '0', 5, '2020-01-17 21:08:01', '2020-01-17 21:08:01', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `specializations`
--

CREATE TABLE `specializations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `specializations`
--

INSERT INTO `specializations` (`id`, `name`, `link`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Audit & Taxation', NULL, '2020-01-14 17:30:00', '2020-01-14 17:30:00', NULL),
(2, 'Banking/Financial', NULL, '2020-01-14 17:30:00', '2020-01-14 17:30:00', NULL),
(3, 'Corporate Finance/Investment', NULL, '2020-01-14 17:30:00', '2020-01-14 17:30:00', NULL),
(4, 'General/Cost Accounting', NULL, '2020-01-14 17:30:00', '2020-01-14 17:30:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `streets`
--

CREATE TABLE `streets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `streets`
--

INSERT INTO `streets` (`id`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '1 street, Hlaing Township', '2020-01-24 07:08:25', '2020-01-24 07:09:37', NULL),
(2, '2 street, Hlaing', '2020-01-24 07:08:31', '2020-01-24 07:10:08', NULL),
(3, '3 street', '2020-01-24 07:08:41', '2020-01-24 07:08:41', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `townships`
--

CREATE TABLE `townships` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `townships`
--

INSERT INTO `townships` (`id`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Anywhere in Singapore', '2020-01-14 17:30:00', '2020-01-14 17:30:00', NULL),
(2, 'Anywhere in Malaysia', NULL, NULL, NULL),
(3, 'Johor', NULL, NULL, NULL),
(4, 'Kedah', NULL, NULL, NULL),
(5, 'Anywhere in Yangon', '2020-01-24 07:08:57', '2020-01-24 07:08:57', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `types`
--

CREATE TABLE `types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `types`
--

INSERT INTO `types` (`id`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Admin', '2020-01-14 17:30:00', '2020-01-14 17:30:00', NULL),
(2, 'Job Seeker', '2020-01-14 17:30:00', '2020-01-14 17:30:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `active` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `type_id`, `created_at`, `updated_at`, `active`, `deleted_at`) VALUES
(1, 'Admin', 'admin@gmail.com', NULL, '$2y$10$IU1QwIXVCeYuRLD1S4Q4W.9op6Ap6CYTlsNAjUGCWwiKHKIVyJ1e6', NULL, 1, '2020-01-15 10:36:23', '2020-01-15 10:36:23', '0', NULL),
(3, 'Tun MIn', 'tunmin@gmail.com', NULL, '$2y$10$RO/369WP7NF9VZmHsQ1vse67BYf1/hAPh5uwInUBUECr28klQ4RGi', NULL, 2, '2020-01-15 10:41:25', '2020-01-15 10:41:25', '0', NULL),
(5, 'Htoo win', 'htoowin@gmail.com', NULL, '$2y$10$LLGQf/Tv0jfeT9ym0Ck9pu4/l6gBfHroAv2B35LIjk/.H0zMz5R1i', NULL, 2, '2020-01-17 11:35:28', '2020-01-17 11:35:28', '0', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_detail_infos`
--

CREATE TABLE `user_detail_infos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nationality_id` bigint(20) UNSIGNED DEFAULT NULL,
  `current_resident_id` bigint(20) UNSIGNED DEFAULT NULL,
  `permanent_resident_id` bigint(20) UNSIGNED DEFAULT NULL,
  `monthly_salary` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `currency_unit` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `working_since` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `specializations_id` bigint(20) UNSIGNED DEFAULT NULL,
  `preferwork_location_id` bigint(20) UNSIGNED DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `address_id` bigint(20) UNSIGNED DEFAULT NULL,
  `race_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `industries_id` bigint(20) UNSIGNED DEFAULT NULL,
  `role_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `resume` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_detail_infos`
--

INSERT INTO `user_detail_infos` (`id`, `nationality_id`, `current_resident_id`, `permanent_resident_id`, `monthly_salary`, `currency_unit`, `working_since`, `specializations_id`, `preferwork_location_id`, `user_id`, `address_id`, `race_id`, `created_at`, `updated_at`, `deleted_at`, `industries_id`, `role_id`, `profile`, `resume`) VALUES
(1, 1, 1, 1, '3000', 'SGD', '2017', 1, 1, 3, NULL, NULL, '2020-01-15 10:43:28', '2020-01-15 10:43:28', NULL, NULL, NULL, NULL, NULL),
(4, 1, 1, 1, '3000', 'SGD', '1', 1, 2, 5, NULL, NULL, '2020-01-17 11:35:46', '2020-01-24 01:39:46', NULL, NULL, NULL, 'image-5.png', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addresses`
--
ALTER TABLE `addresses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `addresses_township_id_foreign` (`township_id`),
  ADD KEY `addresses_street_id_foreign` (`street_id`);

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `companies_type_id_foreign` (`type_id`);

--
-- Indexes for table `educations`
--
ALTER TABLE `educations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `educations_qualification_id_foreign` (`qualification_id`),
  ADD KEY `educations_institute_location_id_foreign` (`institute_location_id`),
  ADD KEY `educations_field_study_id_foreign` (`field_study_id`),
  ADD KEY `educations_user_id_foreign` (`user_id`);

--
-- Indexes for table `experiences`
--
ALTER TABLE `experiences`
  ADD PRIMARY KEY (`id`),
  ADD KEY `experiences_specializations_id_foreign` (`specializations_id`),
  ADD KEY `experiences_role_id_foreign` (`role_id`),
  ADD KEY `experiences_industries_id_foreign` (`industries_id`),
  ADD KEY `experiences_user_id_foreign` (`user_id`);

--
-- Indexes for table `field_studies`
--
ALTER TABLE `field_studies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `industries`
--
ALTER TABLE `industries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_specialization_id_foreign` (`specialization_id`),
  ADD KEY `jobs_job_type_id_foreign` (`job_type_id`),
  ADD KEY `jobs_company_id_foreign` (`company_id`);

--
-- Indexes for table `job_types`
--
ALTER TABLE `job_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `languages_user_id_foreign` (`user_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nationalities`
--
ALTER TABLE `nationalities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `qualifications`
--
ALTER TABLE `qualifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `races`
--
ALTER TABLE `races`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `roles_specialization_id_foreign` (`specialization_id`);

--
-- Indexes for table `save_jobs`
--
ALTER TABLE `save_jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `save_jobs_job_id_foreign` (`job_id`),
  ADD KEY `save_jobs_user_id_foreign` (`user_id`);

--
-- Indexes for table `skills`
--
ALTER TABLE `skills`
  ADD PRIMARY KEY (`id`),
  ADD KEY `skills_user_id_foreign` (`user_id`);

--
-- Indexes for table `specializations`
--
ALTER TABLE `specializations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `streets`
--
ALTER TABLE `streets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `townships`
--
ALTER TABLE `townships`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `types`
--
ALTER TABLE `types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_type_id_foreign` (`type_id`);

--
-- Indexes for table `user_detail_infos`
--
ALTER TABLE `user_detail_infos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_detail_infos_nationality_id_foreign` (`nationality_id`),
  ADD KEY `user_detail_infos_current_resident_id_foreign` (`current_resident_id`),
  ADD KEY `user_detail_infos_permanent_resident_id_foreign` (`permanent_resident_id`),
  ADD KEY `user_detail_infos_specializations_id_foreign` (`specializations_id`),
  ADD KEY `user_detail_infos_preferwork_location_id_foreign` (`preferwork_location_id`),
  ADD KEY `user_detail_infos_user_id_foreign` (`user_id`),
  ADD KEY `user_detail_infos_address_id_foreign` (`address_id`),
  ADD KEY `user_detail_infos_race_id_foreign` (`race_id`),
  ADD KEY `user_detail_infos_industries_id_foreign` (`industries_id`),
  ADD KEY `user_detail_infos_role_id_foreign` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addresses`
--
ALTER TABLE `addresses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `educations`
--
ALTER TABLE `educations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `experiences`
--
ALTER TABLE `experiences`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `field_studies`
--
ALTER TABLE `field_studies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `industries`
--
ALTER TABLE `industries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `job_types`
--
ALTER TABLE `job_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `languages`
--
ALTER TABLE `languages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `nationalities`
--
ALTER TABLE `nationalities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `qualifications`
--
ALTER TABLE `qualifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `races`
--
ALTER TABLE `races`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `save_jobs`
--
ALTER TABLE `save_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `skills`
--
ALTER TABLE `skills`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `specializations`
--
ALTER TABLE `specializations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `streets`
--
ALTER TABLE `streets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `townships`
--
ALTER TABLE `townships`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `types`
--
ALTER TABLE `types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user_detail_infos`
--
ALTER TABLE `user_detail_infos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `addresses`
--
ALTER TABLE `addresses`
  ADD CONSTRAINT `addresses_street_id_foreign` FOREIGN KEY (`street_id`) REFERENCES `streets` (`id`),
  ADD CONSTRAINT `addresses_township_id_foreign` FOREIGN KEY (`township_id`) REFERENCES `townships` (`id`);

--
-- Constraints for table `companies`
--
ALTER TABLE `companies`
  ADD CONSTRAINT `companies_type_id_foreign` FOREIGN KEY (`type_id`) REFERENCES `types` (`id`);

--
-- Constraints for table `educations`
--
ALTER TABLE `educations`
  ADD CONSTRAINT `educations_field_study_id_foreign` FOREIGN KEY (`field_study_id`) REFERENCES `field_studies` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `educations_institute_location_id_foreign` FOREIGN KEY (`institute_location_id`) REFERENCES `townships` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `educations_qualification_id_foreign` FOREIGN KEY (`qualification_id`) REFERENCES `qualifications` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `educations_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `experiences`
--
ALTER TABLE `experiences`
  ADD CONSTRAINT `experiences_industries_id_foreign` FOREIGN KEY (`industries_id`) REFERENCES `industries` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `experiences_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `experiences_specializations_id_foreign` FOREIGN KEY (`specializations_id`) REFERENCES `specializations` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `experiences_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `jobs`
--
ALTER TABLE `jobs`
  ADD CONSTRAINT `jobs_company_id_foreign` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`),
  ADD CONSTRAINT `jobs_job_type_id_foreign` FOREIGN KEY (`job_type_id`) REFERENCES `job_types` (`id`),
  ADD CONSTRAINT `jobs_specialization_id_foreign` FOREIGN KEY (`specialization_id`) REFERENCES `specializations` (`id`);

--
-- Constraints for table `languages`
--
ALTER TABLE `languages`
  ADD CONSTRAINT `languages_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `roles`
--
ALTER TABLE `roles`
  ADD CONSTRAINT `roles_specialization_id_foreign` FOREIGN KEY (`specialization_id`) REFERENCES `specializations` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `save_jobs`
--
ALTER TABLE `save_jobs`
  ADD CONSTRAINT `save_jobs_job_id_foreign` FOREIGN KEY (`job_id`) REFERENCES `jobs` (`id`),
  ADD CONSTRAINT `save_jobs_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `skills`
--
ALTER TABLE `skills`
  ADD CONSTRAINT `skills_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_type_id_foreign` FOREIGN KEY (`type_id`) REFERENCES `types` (`id`);

--
-- Constraints for table `user_detail_infos`
--
ALTER TABLE `user_detail_infos`
  ADD CONSTRAINT `user_detail_infos_address_id_foreign` FOREIGN KEY (`address_id`) REFERENCES `addresses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_detail_infos_current_resident_id_foreign` FOREIGN KEY (`current_resident_id`) REFERENCES `nationalities` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_detail_infos_industries_id_foreign` FOREIGN KEY (`industries_id`) REFERENCES `industries` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_detail_infos_nationality_id_foreign` FOREIGN KEY (`nationality_id`) REFERENCES `nationalities` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_detail_infos_permanent_resident_id_foreign` FOREIGN KEY (`permanent_resident_id`) REFERENCES `nationalities` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_detail_infos_preferwork_location_id_foreign` FOREIGN KEY (`preferwork_location_id`) REFERENCES `townships` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_detail_infos_race_id_foreign` FOREIGN KEY (`race_id`) REFERENCES `races` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_detail_infos_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_detail_infos_specializations_id_foreign` FOREIGN KEY (`specializations_id`) REFERENCES `specializations` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_detail_infos_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
