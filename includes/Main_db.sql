-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 15, 2023 at 09:51 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `prepmeal_db`
--
CREATE DATABASE IF NOT EXISTS `prepmeal_db` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `prepmeal_db`;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` tinyint(4) NOT NULL,
  `Category` varchar(25) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `description` text CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `Category`, `description`) VALUES
(1, 'Continental Cuisine', 'Continental cuisine is a diverse European culinary tradition from countries like France, Italy, and Germany.'),
(2, 'Asian Cuisine', 'Asian cuisines are a diverse set of culinary traditions, from Japanese sushi to the spicy dishes of Thai and Korean cuisine.'),
(3, 'Latin & Fusion Cuisine', 'Latin and Fusion cuisines blend the flavors of Mexican, Tex-Mex, Latin American, and Caribbean traditions, that merges diverse ingredients and cooking styles.'),
(4, 'South Asian Cuisine', 'South Asian cuisine, exemplified by Indian culinary traditions, has diverse regional specialties that offer a range of culinary flavors and textures.'),
(5, 'Other', 'Other dishes that do not fit perfectly in one category. ');

-- --------------------------------------------------------

--
-- Table structure for table `prepmeals`
--

CREATE TABLE `prepmeals` (
  `id` int(11) NOT NULL,
  `title` varchar(130) NOT NULL,
  `price` decimal(5,2) NOT NULL,
  `category_id` tinyint(4) NOT NULL,
  `serving_size` int(11) NOT NULL,
  `image` varchar(130) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `prepmeals`
--

INSERT INTO `prepmeals` (`id`, `title`, `price`, `category_id`, `serving_size`, `image`, `description`) VALUES
(1, 'American Classics', 30.00, 1, 3, 'www/images/food2.jpg\r\n', 'American Classic dishes showcase a hearty and diverse culinary heritage, featuring iconic favorites such as juicy burgers, crispy fried chicken, macaroni and cheese, and apple pie, reflecting a delicious combinations flavors from across the United States.'),
(2, 'Mediterranean Crusine', 35.00, 2, 2, 'www/images/food6.jpg\r\n', 'Mediterranean dishes, feature an array of olives, feta cheese, juicy tomatoes, grilled fish, and herbs, creating a fusion that celebrates fresh, wholesome ingredients.'),
(3, 'Greek Dish', 55.00, 2, 4, 'www/images/food10.jpg\r\n', 'Greek cuisine is a mix of fresh and healthy ingredients, featuring dishes such as moussaka, a layered casserole of eggplant, minced meat, and béchamel sauce, alongside classic delights like spanakopita, a savory spinach and feta pastry, all seasoned with olive oil, oregano, and the warmth of Mediterranean flavors.\r\n\r\n\r\n\r\n\r\n\r\n'),
(4, 'Korean Dish', 50.00, 2, 3, 'www/images/food14.jpg\r\n', 'Asian dishes boast a blend of diverse culinary treasures, featuring the  artistry of sushi, the savory notes of Chinese stir-fries, the spices of Indian curries, and the umami richness of Japanese ramen, offering dynamic feast.\r\n\r\n\r\n\r\n\r\n\r\n'),
(5, 'Mexican Cuisine', 35.00, 3, 3, 'www/images/food5.jpg\r\n', 'Mexican cuisine is a fiesta of savory delights, featuring classics like zesty tacos filled with grilled meats, creamy guacamole served alongside crisp tortilla chips, and enchiladas smothered in flavorful sauces, all embodying the diverse flavors of this culinary feast.\r\n\r\n\r\n\r\n\r\n\r\n'),
(6, 'Thai Flavors', 30.00, 2, 5, 'www/images/food7.jpg\r\n', 'Thai cuisine is a blend of sweet, spicy, sour, and savory flavors, featuring iconic dishes such as Pad Thai, a stir-fried noodle dish, Tom Yum soup with its blend of lemongrass and shrimp, and Green Curry, a creamy coconut-based curry loaded with vibrant vegetables and fragrant herbs.\r\n\r\n\r\n\r\n\r\n\r\n'),
(7, 'Tex-Mex Classics', 35.00, 3, 3, 'www/images/food11.jpg\r\n', 'Tex-Mex cuisine, a fusion of Texan and Mexican flavors, is a palate with dishes like sizzling fajitas, cheesy enchiladas, zesty tacos, and hearty chili con carne, showcasing a blend of spicy, savory, and comforting elements.\r\n\r\n\r\n\r\n\r\n\r\n'),
(8, 'Latin American Fare', 45.00, 3, 4, 'www/images/food15.jpg\r\n', 'Latin American Fare cuisine celebrates a carnival of flavors with dishes like zesty Mexican tacos, hearty Brazilian feijoada, and the vibrant Peruvian ceviche, offering a festive fusion of spices, colors, and diverse culinary traditions.\r\n\r\n\r\n\r\n\r\n\r\n'),
(9, 'Italian Delights', 60.00, 1, 6, 'www/images/food4.jpg\r\n', 'Italian Delights is a celebration of comforting flavors, featuring iconic dishes such as creamy risotto, perfectly al dente pasta adorned with rich tomato sauces, delectable pizzas with a thin, crispy crust, and indulgent tiramisu for a sweet, satisfying finale.\r\n\r\n\r\n\r\n\r\n\r\n'),
(10, 'Indian Spice', 50.00, 4, 5, 'www/images/food8.jpg\r\n', 'Indian Spice Cuisine is a culinary plate with the aromatic allure of cumin, coriander, and cardamom, featuring  dishes such as spicy Chicken Tikka, flavorful Vegetable Biryani, and creamy Chicken Korma that fill the taste buds with a combination of rich and complex flavors.\r\n\r\n\r\n\r\n\r\n\r\n'),
(11, 'French Bistro', 65.00, 1, 5, 'www/images/food12.jpg\r\n', 'A French Bistro cuisine is a delightful fusion of refined flavors, featuring classics such as Coq au Vin, Beef Bourguignon, and Ratatouille, accompanied by crusty baguettes, decadent pastries like Tarte Tatin, and a touch of French elegance in every dish.\r\n\r\n\r\n\r\n\r\n\r\n'),
(12, 'Caribbean Creations', 35.00, 3, 3, 'www/images/food16.jpg\r\n', 'Caribbean Creations is a fusion of tropical influences, featuring jerk chicken, flavorful coconut-infused rice and peas, zesty mango salsa, and sweet plantains, offering a blend of spices and flavors reminiscent of the sunny Caribbean islands.\r\n\r\n\r\n\r\n\r\n\r\n'),
(13, 'Authentic Japenese', 40.00, 2, 4, 'www/images/food3.jpg\r\n', 'Authentic Japanese cuisine is a culinary dish that features iconic dishes such as sushi, alongside tempura, a delicacy of perfectly battered and fried ingredients, and ramen, a soul-warming noodle soup with complex broth and a medley of toppings, all reflecting a deep respect for seasonal ingredients and culinary finesse.\r\n\r\n\r\n\r\n\r\n\r\n\r\n'),
(14, 'Chinese Cuisine', 25.00, 2, 3, 'www/images/food9.jpg\r\n', 'Chinese cuisine, a culinary dish showcasing a blend of savory and sweet flavors, featuring iconic dishes such as the aromatic and crispy Peking Duck, the savory delight of Dim Sum dumplings, and the comforting warmth of Beef Noodle Soup.\r\n\r\n\r\n\r\n\r\n\r\n\r\n'),
(15, 'Middle Eastern', 55.00, 5, 5, 'www/images/food13.jpg\r\n', 'Middle Eastern cuisine is a feast for the senses, with a blend of flavors and textures, from the delights of falafel and kebabs to the allure of hummus, couscous, and baklava, all infused with the warmth of Mediterranean spices.\r\n\r\n\r\n\r\n\r\n\r\n\r\n'),
(16, 'Vietnamese Cuisine', 30.00, 2, 3, 'www/images/food17.jpg\r\n', 'Vietnamese cuisine is a great blend of fresh and aromatic flavors, featuring iconic dishes such as pho, a fragrant noodle soup with savory broth and tender meat; banh mi, a crispy baguette filled with flavorful meats and fresh vegetables; and spring rolls, delicate rice paper parcels bursting with herbs, vermicelli, and either shrimp or pork. \r\n\r\n\r\n\r\n\r\n\r\n\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` tinyint(4) NOT NULL,
  `role` varchar(25) NOT NULL,
  `description` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `role`, `description`) VALUES
(1, 'System administrator', 'A system administrator has permissions to manage users and contents of the website.'),
(2, 'User manager', ' A user manager has permission to manage user accounts.'),
(3, 'Advanced user', 'In addition to the permission granted to the basic user role, an advanced user also has access to the search feature.'),
(4, 'Basic user', 'A basic user has access to the shopping cart feature.');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `firstname` varchar(20) NOT NULL,
  `lastname` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `role` tinyint(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `username`, `password`, `role`) VALUES
(1, 'Main', 'Admin', '', 'admin', 'password', 1),
(2, 'Basic', 'User', '', 'Basic', 'password', 4),
(3, 'Advanced', 'User', '', 'Advanced', 'password', 3),
(4, 'User', 'Manager', '', 'Manager', 'password', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `prepmeals`
--
ALTER TABLE `prepmeals`
  ADD PRIMARY KEY (`id`),
  ADD KEY `X` (`category_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `prepmeals`
--
ALTER TABLE `prepmeals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `prepmeals`
--
ALTER TABLE `prepmeals`
  ADD CONSTRAINT `X` FOREIGN KEY (`category_id`) REFERENCES `categories` (`category_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
