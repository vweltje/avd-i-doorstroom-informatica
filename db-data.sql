-- -------------------------------------------------------------
-- TablePlus 3.10.0(348)
--
-- https://tableplus.com/
--
-- Database: avd-i-doorstroom
-- Generation Time: 2020-11-14 14:43:16.9060
-- -------------------------------------------------------------


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


INSERT INTO `groups` (`id`, `name`) VALUES
('1', 'client'),
('2', 'manager'),
('3', 'employee');

INSERT INTO `tickets` (`id`, `name`, `description`, `status`) VALUES
('1', 'Special characters - search query', 'Disallow the usage of special characters in search queries. ', 'APPROVED'),
('2', 'Dropdown list behind content', 'After opening the dropdown list on the contact page the options disappears behind contact information. ', 'IN_PROGRESS'),
('3', 'X axis scroll mobile', 'Disable x axis scroll after opening mobile menu. ', 'DONE'),
('4', 'Spacing footer columns', 'The spacing between footer columns differs from design. (desktop only)', 'NEW'),
('5', 'Focus state buttons', 'I am missing a focus state on buttons. Add a border or drop-shadow please.', 'NEW'),
('11', 'Filter state after page reload', 'After page reload the previous filter state should be applied. ', 'NEW'),
('13', 'Blurry images', 'Full width images are blurry on larger screens. ', 'NEW');

INSERT INTO `user-groups` (`id`, `user-id`, `group-id`) VALUES
('1', '1', '1'),
('2', '2', '2'),
('3', '3', '3');

INSERT INTO `users` (`id`, `password`, `email`, `name`) VALUES
('1', '$2y$10$KwkXGVxGiOqkAiQD1SXH4uQyYbWke54pEsbcXxwrII0c374tNWTzG', 'client@test.test', 'Brendon Thompson'),
('2', '$2y$10$3ZD.R2.5Rv/gRUt11ek.vOkFi/.AkgeyKFFY/Pw3ZBa4DPgoGcVTC', 'manager@test.test', 'Caroline Jones'),
('3', '$2y$10$P7lWILewngNT.zjrwxAf2OCP6Hd4hTbZLk8DcX1Frvs3lcymgdSEi', 'employee@test.test', 'Henrey Brown');



/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;