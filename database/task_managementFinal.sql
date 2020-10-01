-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 01, 2020 at 03:39 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `task_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `app_forms`
--

CREATE TABLE `app_forms` (
  `FormID` bigint(20) UNSIGNED NOT NULL,
  `FormName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Status` int(11) NOT NULL,
  `Link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `app_menus`
--

CREATE TABLE `app_menus` (
  `MenuID` bigint(20) UNSIGNED NOT NULL,
  `Title` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Description` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `SortOrder` int(11) DEFAULT NULL,
  `ClassName` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `app_menu_details`
--

CREATE TABLE `app_menu_details` (
  `MenuDetailID` bigint(20) UNSIGNED NOT NULL,
  `MenuID` int(11) DEFAULT NULL,
  `FormID` int(11) DEFAULT NULL,
  `Title` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Description` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `SortOrder` int(11) DEFAULT NULL,
  `MenuType` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `app_roles`
--

CREATE TABLE `app_roles` (
  `RoleID` bigint(20) UNSIGNED NOT NULL,
  `RoleName` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Status` int(11) DEFAULT NULL,
  `CreatedOn` datetime DEFAULT NULL,
  `CreatedBy` int(11) DEFAULT NULL,
  `ModifiedBy` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `app_roles_permission`
--

CREATE TABLE `app_roles_permission` (
  `PermissionID` bigint(20) UNSIGNED NOT NULL,
  `MenuDetailID` int(11) DEFAULT NULL,
  `UserID` int(11) DEFAULT NULL,
  `CreatedOn` datetime DEFAULT NULL,
  `CreatedBy` int(11) DEFAULT NULL,
  `ModifiedOn` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `app_status_types`
--

CREATE TABLE `app_status_types` (
  `StatusID` bigint(20) UNSIGNED NOT NULL,
  `StatusType` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `StatusText` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `StatusValue` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `CreatedOn` datetime DEFAULT NULL,
  `CreatedBy` int(11) DEFAULT NULL,
  `ModifiedOn` datetime DEFAULT NULL,
  `ModifiedBy` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `app_users`
--

CREATE TABLE `app_users` (
  `UserID` bigint(20) UNSIGNED NOT NULL,
  `FirstName` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `LastName` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Phone` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Email` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Username` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Password` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `CompanyID` int(11) DEFAULT NULL,
  `RoleID` int(11) NOT NULL,
  `Status` int(11) NOT NULL,
  `CreatedOn` datetime DEFAULT NULL,
  `CreatedBy` int(11) DEFAULT NULL,
  `ModifiedOn` datetime DEFAULT NULL,
  `ModifiedBy` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(61, '2020_09_29_073414_create_app_menus_table', 1),
(62, '2020_09_29_090743_create_app_menu_details_table', 1),
(63, '2020_10_01_053719_create_app_roles_table', 1),
(64, '2020_10_01_053936_create_app_roles_permission_table', 1),
(65, '2020_10_01_062925_create_app_status_types_table', 1),
(66, '2020_10_01_063227_create_app_users_table', 1),
(67, '2020_10_01_063613_create_mst_companies_table', 1),
(68, '2020_10_01_063909_create_tk_clients_table', 1),
(69, '2020_10_01_064105_create_tk_modules_table', 1),
(70, '2020_10_01_064322_create_tk_priority_table', 1),
(71, '2020_10_01_064440_create_tk_projects_table', 1),
(72, '2020_10_01_064625_create_tk_statuses_table', 1),
(73, '2020_10_01_065337_create_tk_tasks_table', 1),
(74, '2020_10_01_065600_create_tk_task_assignees_table', 1),
(75, '2020_10_01_065724_create_tk_task_comments_table', 1),
(76, '2020_10_01_065854_create_tk_task_followers_table', 1),
(77, '2020_10_01_070023_create_tk_task_timers_table', 1),
(78, '2020_10_01_114639_create_app_forms_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `mst_companies`
--

CREATE TABLE `mst_companies` (
  `CompanyID` bigint(20) UNSIGNED NOT NULL,
  `CompanyName` varchar(300) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Status` int(11) DEFAULT NULL,
  `RegisteredDate` datetime DEFAULT NULL,
  `LicenseKey` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `LicenseStart` datetime DEFAULT NULL,
  `LicenseExpiry` datetime DEFAULT NULL,
  `CreatedOn` datetime DEFAULT NULL,
  `CreatedBy` int(11) DEFAULT NULL,
  `ModifiedOn` datetime DEFAULT NULL,
  `ModifiedBy` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tk_clients`
--

CREATE TABLE `tk_clients` (
  `ClientID` bigint(20) UNSIGNED NOT NULL,
  `ClientName` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Status` int(11) DEFAULT NULL,
  `CompanyID` int(11) DEFAULT NULL,
  `CreatedOn` datetime DEFAULT NULL,
  `CreatedBy` int(11) DEFAULT NULL,
  `ModifiedOn` datetime DEFAULT NULL,
  `ModifiedBy` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tk_modules`
--

CREATE TABLE `tk_modules` (
  `ModuleID` bigint(20) UNSIGNED NOT NULL,
  `ModuleName` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ProjectID` int(11) DEFAULT NULL,
  `Status` int(11) DEFAULT NULL,
  `CreatedOn` datetime DEFAULT NULL,
  `CreatedBy` int(11) DEFAULT NULL,
  `ModifiedOn` datetime DEFAULT NULL,
  `ModifiedBy` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tk_priority`
--

CREATE TABLE `tk_priority` (
  `PriorityID` bigint(20) UNSIGNED NOT NULL,
  `PriorityName` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Status` int(11) DEFAULT NULL,
  `CompanyID` int(11) DEFAULT NULL,
  `CreatedOn` datetime DEFAULT NULL,
  `CreatedBy` int(11) DEFAULT NULL,
  `ModifiedOn` datetime DEFAULT NULL,
  `ModifiedBy` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tk_projects`
--

CREATE TABLE `tk_projects` (
  `ProjectID` bigint(20) UNSIGNED NOT NULL,
  `ProjectName` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Status` int(11) DEFAULT NULL,
  `ClientID` int(11) DEFAULT NULL,
  `CreatedOn` datetime DEFAULT NULL,
  `CreatedBy` int(11) DEFAULT NULL,
  `ModifiedOn` datetime DEFAULT NULL,
  `ModifiedBy` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tk_statuses`
--

CREATE TABLE `tk_statuses` (
  `StatusID` bigint(20) UNSIGNED NOT NULL,
  `StatusText` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `CompanyID` int(11) DEFAULT NULL,
  `CreatedOn` datetime DEFAULT NULL,
  `CreatedBy` int(11) DEFAULT NULL,
  `ModifiedOn` datetime DEFAULT NULL,
  `ModifiedBy` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tk_tasks`
--

CREATE TABLE `tk_tasks` (
  `TaskID` bigint(20) UNSIGNED NOT NULL,
  `Title` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Description` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ClientID` int(11) DEFAULT NULL,
  `ProjectID` int(11) DEFAULT NULL,
  `ModuleID` int(11) DEFAULT NULL,
  `StartDate` datetime DEFAULT NULL,
  `EndDate` datetime DEFAULT NULL,
  `PriorityID` int(11) DEFAULT NULL,
  `TaskStatusID` int(11) DEFAULT NULL,
  `Status` int(11) DEFAULT NULL,
  `CreatedOn` datetime DEFAULT NULL,
  `CreatedBy` int(11) DEFAULT NULL,
  `ModifiedOn` datetime DEFAULT NULL,
  `ModifiedBy` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tk_task_assignees`
--

CREATE TABLE `tk_task_assignees` (
  `AssignID` bigint(20) UNSIGNED NOT NULL,
  `TaskID` int(11) DEFAULT NULL,
  `AssignTo` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tk_task_comments`
--

CREATE TABLE `tk_task_comments` (
  `CommentID` bigint(20) UNSIGNED NOT NULL,
  `TaskID` int(11) NOT NULL,
  `CommentText` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `CommentBy` int(11) NOT NULL,
  `CreatedOn` datetime DEFAULT NULL,
  `CreatedBy` int(11) DEFAULT NULL,
  `ModifiedOn` datetime DEFAULT NULL,
  `ModifiedBy` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tk_task_followers`
--

CREATE TABLE `tk_task_followers` (
  `FollowerID` bigint(20) UNSIGNED NOT NULL,
  `TaskID` int(11) DEFAULT NULL,
  `FollowedBy` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tk_task_timers`
--

CREATE TABLE `tk_task_timers` (
  `TimerID` bigint(20) UNSIGNED NOT NULL,
  `TaskID` int(11) NOT NULL,
  `TaskTime` time NOT NULL,
  `IsBillable` int(11) DEFAULT NULL,
  `CreatedOn` datetime DEFAULT NULL,
  `CreatedBy` int(11) DEFAULT NULL,
  `ModifiedOn` datetime DEFAULT NULL,
  `ModifiedBy` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `app_forms`
--
ALTER TABLE `app_forms`
  ADD PRIMARY KEY (`FormID`);

--
-- Indexes for table `app_menus`
--
ALTER TABLE `app_menus`
  ADD PRIMARY KEY (`MenuID`);

--
-- Indexes for table `app_menu_details`
--
ALTER TABLE `app_menu_details`
  ADD PRIMARY KEY (`MenuDetailID`);

--
-- Indexes for table `app_roles`
--
ALTER TABLE `app_roles`
  ADD PRIMARY KEY (`RoleID`);

--
-- Indexes for table `app_roles_permission`
--
ALTER TABLE `app_roles_permission`
  ADD PRIMARY KEY (`PermissionID`);

--
-- Indexes for table `app_status_types`
--
ALTER TABLE `app_status_types`
  ADD PRIMARY KEY (`StatusID`);

--
-- Indexes for table `app_users`
--
ALTER TABLE `app_users`
  ADD PRIMARY KEY (`UserID`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mst_companies`
--
ALTER TABLE `mst_companies`
  ADD PRIMARY KEY (`CompanyID`);

--
-- Indexes for table `tk_clients`
--
ALTER TABLE `tk_clients`
  ADD PRIMARY KEY (`ClientID`);

--
-- Indexes for table `tk_modules`
--
ALTER TABLE `tk_modules`
  ADD PRIMARY KEY (`ModuleID`);

--
-- Indexes for table `tk_priority`
--
ALTER TABLE `tk_priority`
  ADD PRIMARY KEY (`PriorityID`);

--
-- Indexes for table `tk_projects`
--
ALTER TABLE `tk_projects`
  ADD PRIMARY KEY (`ProjectID`);

--
-- Indexes for table `tk_statuses`
--
ALTER TABLE `tk_statuses`
  ADD PRIMARY KEY (`StatusID`);

--
-- Indexes for table `tk_tasks`
--
ALTER TABLE `tk_tasks`
  ADD PRIMARY KEY (`TaskID`);

--
-- Indexes for table `tk_task_assignees`
--
ALTER TABLE `tk_task_assignees`
  ADD PRIMARY KEY (`AssignID`);

--
-- Indexes for table `tk_task_comments`
--
ALTER TABLE `tk_task_comments`
  ADD PRIMARY KEY (`CommentID`);

--
-- Indexes for table `tk_task_followers`
--
ALTER TABLE `tk_task_followers`
  ADD PRIMARY KEY (`FollowerID`);

--
-- Indexes for table `tk_task_timers`
--
ALTER TABLE `tk_task_timers`
  ADD PRIMARY KEY (`TimerID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `app_forms`
--
ALTER TABLE `app_forms`
  MODIFY `FormID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `app_menus`
--
ALTER TABLE `app_menus`
  MODIFY `MenuID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `app_menu_details`
--
ALTER TABLE `app_menu_details`
  MODIFY `MenuDetailID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `app_roles`
--
ALTER TABLE `app_roles`
  MODIFY `RoleID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `app_roles_permission`
--
ALTER TABLE `app_roles_permission`
  MODIFY `PermissionID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `app_status_types`
--
ALTER TABLE `app_status_types`
  MODIFY `StatusID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `app_users`
--
ALTER TABLE `app_users`
  MODIFY `UserID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT for table `mst_companies`
--
ALTER TABLE `mst_companies`
  MODIFY `CompanyID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tk_clients`
--
ALTER TABLE `tk_clients`
  MODIFY `ClientID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tk_modules`
--
ALTER TABLE `tk_modules`
  MODIFY `ModuleID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tk_priority`
--
ALTER TABLE `tk_priority`
  MODIFY `PriorityID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tk_projects`
--
ALTER TABLE `tk_projects`
  MODIFY `ProjectID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tk_statuses`
--
ALTER TABLE `tk_statuses`
  MODIFY `StatusID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tk_tasks`
--
ALTER TABLE `tk_tasks`
  MODIFY `TaskID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tk_task_assignees`
--
ALTER TABLE `tk_task_assignees`
  MODIFY `AssignID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tk_task_comments`
--
ALTER TABLE `tk_task_comments`
  MODIFY `CommentID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tk_task_followers`
--
ALTER TABLE `tk_task_followers`
  MODIFY `FollowerID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tk_task_timers`
--
ALTER TABLE `tk_task_timers`
  MODIFY `TimerID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
