SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

CREATE DATABASE IF NOT EXISTS `hospital_reservation_db` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `hospital_reservation_db`;

CREATE TABLE `appointments` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `doctor_id` int(11) DEFAULT NULL,
  `appointment_time` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `clinic_types` (
  `id` int(11) NOT NULL,
  `type_name` varchar(255) NOT NULL,
  `image_url` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `clinic_types` (`id`, `type_name`, `image_url`, `description`) VALUES
(1, 'عيادة العظام', 'images/Bons.png', 'توفر العلاج و العنايه للجهاز العظمي ومعالجته.'),
(2, 'عيادة الاسره', 'images/Family.png', 'توفر الاستشاره للمريض اذا كان مرض نفسي او جسدي او سلوكي.'),
(3, 'عيادة الاشعة', 'images/x-ray.png', 'عياده مخصه في التصوير السيني و كشف الامراض .'),
(4, 'عيادة الباطنيه', 'images/internal.png', 'مختص بتجهيز الاجهزه و استخراد الصور للمريض و تقديم'),
(5, 'عيادة اذن وحنجره', 'images/earsAndnose.png', 'مختصه بامراض الجهاز السمعي و الجهاز التنفسي و معالجتها.');

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `doctors` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `clinic_type_id` int(11) DEFAULT NULL,
  `working_hours_from` time DEFAULT NULL,
  `working_hours_to` time DEFAULT NULL,
  `image_url` varchar(255) DEFAULT '/images/Doctor_1.jpg',
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `doctors` (`id`, `name`, `clinic_type_id`, `working_hours_from`, `working_hours_to`, `image_url`, `description`) VALUES
(1, 'مبارك الدوسري', 1, '00:00:00', '11:59:59', 'images/DCTR1.png', 'طبيب مختص بمراض الجهاز العظمي و مشاكل العظم.'),
(2, 'الدكتور **', 1, '12:00:00', '23:59:59', 'images/Doctor_defualt.png', 'طبيب مختص بمراض الجهاز العظمي و مشاكل العظم.'),
(3, 'إبراهيم الفضل', 2, '00:00:00', '11:59:59', 'images/DCTR2.png', 'طبيب مختص بالاتشاره و و معالجة المريض و يتوقع قدرت المريض على التعايش معا المرض او تحمله للعلاج.'),
(4, 'الدكتور **', 2, '12:00:00', '23:59:59', 'images/Doctor_defualt.png', 'طبيب مختص بالاتشاره و و معالجة المريض و يتوقع قدرت المريض على التعايش معا المرض او تحمله للعلاج.'),
(5, 'Doctor1', 3, '00:00:00', '11:59:59', 'images/DCTR3.png', 'طبيب الاشعه: مختص بتجهيز الاجهزه و استخراد الصور للمريض و تقديم التقارير للأطباء.'),
(6, 'الدكتور **', 3, '12:00:00', '23:59:59', 'images/Doctor_defualt.png', 'طبيب الاشعه: مختص بتجهيز الاجهزه و استخراد الصور للمريض و تقديم التقارير للأطباء.'),
(7, 'عبد الاله الشهراني', 4, '00:00:00', '11:59:59', 'images/DCTR4.png', 'طبيب الباطنيه:مختص بمراض الجهاز الهضمي و تشخصيها و معالقجتها.'),
(8, 'الدكتور **', 4, '12:00:00', '23:59:59', 'images/Doctor_defualt.png', 'طبيب الباطنيه:مختص بمراض الجهاز الهضمي و تشخصيها و معالقجتها.'),
(9, 'غسان الاسمري', 5, '00:00:00', '11:59:59', 'images/DCTR5.png', 'طبيب الاذن و الحنجره:مختص بامراض الجهاز السمعي و الجهاز التنفسي و تشخصيها و معالجتها.'),
(10, 'الدكتور **', 5, '12:00:00', '23:59:59', 'images/Doctor_defualt.png', 'طبيب الاذن و الحنجره:مختص بامراض الجهاز السمعي و الجهاز التنفسي و تشخصيها و معالجتها.');

CREATE TABLE `ratings` (
  `id` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `comment` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone_number` varchar(15) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `height` int(11) DEFAULT NULL,
  `weight` int(11) DEFAULT NULL,
  `country` varchar(100) DEFAULT NULL,
  `gender` enum('Male','Female') DEFAULT NULL,
  `user_id` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

ALTER TABLE `appointments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `doctor_id` (`doctor_id`);

ALTER TABLE `clinic_types`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `doctors`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `clinic_type_id` (`clinic_type_id`);

ALTER TABLE `ratings`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `user_id` (`user_id`);

ALTER TABLE `appointments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `clinic_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `ratings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `appointments`
  ADD CONSTRAINT `appointments_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `appointments_ibfk_2` FOREIGN KEY (`doctor_id`) REFERENCES `doctors` (`id`);

ALTER TABLE `doctors`
  ADD CONSTRAINT `doctors_ibfk_1` FOREIGN KEY (`clinic_type_id`) REFERENCES `clinic_types` (`id`);
COMMIT;
