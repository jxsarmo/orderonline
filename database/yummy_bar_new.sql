-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 17-Set-2023 às 03:19
-- Versão do servidor: 10.4.24-MariaDB
-- versão do PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `yummy_bar_new`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `cart`
--

CREATE TABLE `cart` (
  `id` int(30) NOT NULL,
  `client_ip` varchar(20) NOT NULL,
  `user_id` int(30) NOT NULL,
  `product_id` int(30) NOT NULL,
  `qty` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `cart`
--

INSERT INTO `cart` (`id`, `client_ip`, `user_id`, `product_id`, `qty`) VALUES
(40, '', 3, 14, 1),
(41, '', 3, 9, 1),
(42, '', 3, 13, 2),
(43, '', 7, 10, 2),
(60, '', 11, 10, 1),
(61, '', 6, 16, 3),
(64, '::1', 4, 7, 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `category_list`
--

CREATE TABLE `category_list` (
  `id` int(30) NOT NULL,
  `name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `category_list`
--

INSERT INTO `category_list` (`id`, `name`) VALUES
(1, 'appetizers'),
(2, 'entrees'),
(3, 'desserts'),
(4, 'beverages');

-- --------------------------------------------------------

--
-- Estrutura da tabela `orders`
--

CREATE TABLE `orders` (
  `id` int(30) NOT NULL,
  `name` text NOT NULL,
  `address` text NOT NULL,
  `mobile` text NOT NULL,
  `email` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `orders`
--

INSERT INTO `orders` (`id`, `name`, `address`, `mobile`, `email`, `status`) VALUES
(1, 'James Smith', 'adasdasd asdadasd', '4756463215', 'jsmith@sample.com', 1),
(2, 'James Smith', 'adasdasd asdadasd', '4756463215', 'jsmith@sample.com', 1),
(3, 'juliana sarmo juliana10@gmail.com', '2062 S WOLCOTT CT', '7209408600', 'juliana10@gmail.com', 1),
(4, 'Gabriela Sarmo', '2062 Brazil Ave Denver-CO', '236 547 59', 'gabriela@gmail.com', 0),
(5, 'Isabel Sarmo', '2062 S WOLCOTT CT\r\n', '754147589', 'isabel@gmail.com', 1),
(6, 'Isabel Sarmo', '2062 S WOLCOTT CT\r\n', '754147589', 'isabel@gmail.com', 1),
(7, 'Juliana I Sarmo', '\r\n', '1720940860', 'jxsarmo@gmail.com', 0),
(8, 'Juliana  Sarmo', '2145 Brazil Ave Denver-CO 80219\r\n', '1800 236 0', 'juliana36@gmail.com', 0),
(9, 'Juliana  Sarmo', '2145 Brazil Ave Denver-CO 80219\r\n', '1800 236 0', 'juliana36@gmail.com', 0),
(10, 'Juliana  Sarmo', '2145 Brazil Ave Denver-CO 80219\r\n', '1800 236 0', 'juliana36@gmail.com', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `order_list`
--

CREATE TABLE `order_list` (
  `id` int(30) NOT NULL,
  `order_id` int(30) NOT NULL,
  `product_id` int(30) NOT NULL,
  `qty` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `order_list`
--

INSERT INTO `order_list` (`id`, `order_id`, `product_id`, `qty`) VALUES
(1, 1, 3, 1),
(2, 1, 5, 1),
(3, 1, 3, 1),
(4, 1, 6, 3),
(5, 2, 1, 2),
(6, 3, 6, 1),
(7, 3, 6, 1),
(8, 3, 1, 1),
(9, 3, 3, 1),
(10, 3, 7, 3),
(11, 3, 12, 0),
(12, 3, 17, 0),
(13, 3, 18, 0),
(14, 3, 40, 0),
(15, 3, 7, 0),
(16, 3, 9, 2),
(17, 3, 7, 4),
(18, 5, 11, 2),
(19, 6, 11, 2),
(20, 7, 11, 1),
(21, 7, 10, 2),
(22, 8, 11, 2),
(23, 8, 15, 1),
(24, 9, 11, 2),
(25, 9, 12, 1),
(26, 10, 11, 2),
(27, 10, 15, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `product_list`
--

CREATE TABLE `product_list` (
  `id` int(30) NOT NULL,
  `category_id` int(30) NOT NULL,
  `code` text NOT NULL,
  `category` varchar(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `price` float NOT NULL DEFAULT 0,
  `calories` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '0= unavailable, 2 Available'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `product_list`
--

INSERT INTO `product_list` (`id`, `category_id`, `code`, `category`, `name`, `description`, `price`, `calories`, `status`) VALUES
(7, 1, 'mushroom-garden', 'appetizers', 'Mushroom Salad', 'Description Mushroom Salad', 12, 290, 2),
(8, 2, 'garlic.shrimp', 'entrees', 'Garlic Shrimp', 'Description Garlic Shrimp', 16, 340, 2),
(9, 1, 'greek-salad', 'appetizers', 'Greek Salad', 'Description Greek Salad', 11, 180, 2),
(10, 1, 'brie-jelly', 'appetizers', 'Brie Cheese and Jelly Bites', 'Description Brie Cheese and Jelly Bites', 14, 400, 2),
(11, 1, 'brazilian-cheesebread', 'appetizers', 'Brazilian Cheesebread', 'Description Brazilian Cheesebread', 12, 300, 2),
(12, 1, 'caesar-salad', 'appetizers', 'Caesar Salad', 'Description Caesar Salad', 12, 450, 2),
(13, 1, 'cheesy-bacon', 'appetizers', 'Cheesy Bacon Bites', 'Description Cheesy Bacon Bites', 15, 500, 2),
(14, 1, 'chicken-soup', 'appetizers', 'Chicken Soup', 'Description Chicken Soup', 11, 400, 2),
(15, 1, 'crab-cake', 'appetizers', 'Crab Cake', 'Description Crab Cake', 14, 400, 2),
(16, 1, 'cucumber-salmon-guacamole', 'appetizers', 'Salmon Gacamole Cucumber Bites', 'Salmon Gacamole Cucumber Bites', 17, 500, 2),
(17, 1, 'easy-polenta', 'appetizers', 'Polenta', 'Description Polenta', 13, 400, 2),
(18, 1, 'fried-calamari', 'appetizers', 'Fried Calamari', 'Description Fried Calamari', 18, 600, 2),
(19, 2, 'apple-salmon', 'entrees', 'Apple Salmon Delight', 'Description Apple Salmon Delight', 25, 400, 2),
(20, 2, 'beef-lasagna', 'entrees', 'Beef Lasagna', 'Description Beef Lasagna', 21, 600, 2),
(21, 2, 'brazilian-churrasco', 'entrees', 'Brazilian Churrasco', 'Description Brazilian Churrasco', 28, 500, 2),
(22, 2, 'brazilian-picanha', 'entrees', 'Brazilian Picanha', 'Description Brazilian Picanha', 30, 500, 2),
(23, 2, 'burger-fries', 'entrees', 'Burger with Fries', 'Description Burger with Fries', 21, 700, 2),
(24, 2, 'chicken-enchilada', 'entrees', 'Chicken Enchilada', 'Description Chicken Enchilada', 17, 400, 2),
(25, 2, 'club.sandwich', 'entrees', 'Club Sandwich', 'Description Club Sandwich', 17, 400, 2),
(26, 2, 'rib', 'entrees', 'Lamb Rib', 'Description Lamb Rib', 27, 600, 2),
(27, 2, 'salmon-vegetables', 'entrees', 'Salmon with Vegetables', 'Description Salmon with Vegetables', 28, 500, 2),
(28, 2, 'shrimp-pasta', 'entrees', 'Shrimp Pasta', 'Description Shrimp Pasta', 25, 600, 2),
(29, 3, 'berries-flan', 'desserts', 'Berries Flan', 'Description Berries Flan', 14, 400, 2),
(30, 3, 'brownie-icecream', 'desserts', 'Icecream Brownie', 'Description Icecream Brownie', 12, 400, 2),
(31, 3, 'cherry-cheesecake', 'desserts', 'Cherry Cheesecake', 'Description Cherry Cheesecake', 15, 400, 2),
(32, 3, 'chocolate-shake', 'desserts', 'Chocolate Shake', 'Description Chocolate Shake', 10, 500, 2),
(33, 3, 'fudge-icecream', 'desserts', 'Icecream Fudge', 'Description Icecream Fudge', 13, 400, 2),
(34, 3, 'icecream-cookie', 'desserts', 'Icecream Sandwich', 'Description Icecream Sandwich', 16, 600, 2),
(35, 3, 'papaya-cream', 'desserts', 'Papaya Cream', 'Description Papaya Cream', 14, 300, 2),
(36, 3, 'petit-gateau', 'desserts', 'Petit Gateau', 'Description Petit Gateau', 16, 500, 2),
(37, 3, 'strawberry-shortcake', 'desserts', 'Strawberry Shortcake', 'Description Strawberry Shortcake', 14, 600, 2),
(38, 3, 'strawberry-sundae', 'desserts', 'Strawberry Sundae', 'Description Strawberry Sundae', 12, 400, 2),
(39, 4, 'soft-drinks', 'beverages', 'Soft-Drinks', '12oz can - Choose your options at check out', 12, 400, 2),
(40, 4, 'fresh-fruit-juice', 'beverages', 'Fresh Fruit Juice', '12oz glass - Choose your options at check out', 12, 400, 2),
(41, 4, 'water', 'beverages', 'Water', '16.9oz bottle', 12, 400, 2),
(42, 4, 'sparkling-water', 'beverages', 'Sparkling Water', '12oz bottle - Choose your options at check out', 12, 400, 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `system_settings`
--

CREATE TABLE `system_settings` (
  `id` int(30) NOT NULL,
  `name` text NOT NULL,
  `email` varchar(200) NOT NULL,
  `contact` varchar(20) NOT NULL,
  `cover_img` text NOT NULL,
  `about_content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `system_settings`
--

INSERT INTO `system_settings` (`id`, `name`, `email`, `contact`, `cover_img`, `about_content`) VALUES
(1, 'Yummy Bar', 'info@sample.com', '+6948 8542 623', 'img.model/logomenor.transp.png', '&lt;p style=&quot;text-align: center; background: transparent; position: relative;&quot;&gt;&lt;span style=&quot;font-size:28px;background: transparent; position: relative;&quot;&gt;ABOUT US&lt;/span&gt;&lt;/b&gt;&lt;/span&gt;&lt;/p&gt;&lt;p style=&quot;text-align: center; background: transparent; position: relative;&quot;&gt;&lt;span style=&quot;background: transparent; position: relative; font-size: 14px;&quot;&gt;&lt;span style=&quot;font-size:28px;background: transparent; position: relative;&quot;&gt;&lt;b style=&quot;margin: 0px; padding: 0px; color: rgb(0, 0, 0); font-family: &amp;quot;Open Sans&amp;quot;, Arial, sans-serif; text-align: justify;&quot;&gt;Lorem Ipsum&lt;/b&gt;&lt;span style=&quot;color: rgb(0, 0, 0); font-family: &amp;quot;Open Sans&amp;quot;, Arial, sans-serif; font-weight: 400; text-align: justify;&quot;&gt;&amp;nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&amp;#x2019;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.&lt;/span&gt;&lt;br&gt;&lt;/span&gt;&lt;/b&gt;&lt;/span&gt;&lt;/p&gt;&lt;p style=&quot;text-align: center; background: transparent; position: relative;&quot;&gt;&lt;span style=&quot;background: transparent; position: relative; font-size: 14px;&quot;&gt;&lt;span style=&quot;font-size:28px;background: transparent; position: relative;&quot;&gt;&lt;span style=&quot;color: rgb(0, 0, 0); font-family: &amp;quot;Open Sans&amp;quot;, Arial, sans-serif; font-weight: 400; text-align: justify;&quot;&gt;&lt;br&gt;&lt;/span&gt;&lt;/b&gt;&lt;/span&gt;&lt;/p&gt;&lt;p style=&quot;text-align: center; background: transparent; position: relative;&quot;&gt;&lt;span style=&quot;background: transparent; position: relative; font-size: 14px;&quot;&gt;&lt;span style=&quot;font-size:28px;background: transparent; position: relative;&quot;&gt;&lt;h2 style=&quot;font-size:28px;background: transparent; position: relative;&quot;&gt;Where does it come from?&lt;/h2&gt;&lt;p style=&quot;text-align: center; margin-bottom: 15px; padding: 0px; color: rgb(0, 0, 0); font-family: &amp;quot;Open Sans&amp;quot;, Arial, sans-serif; font-weight: 400;&quot;&gt;Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of &quot;de Finibus Bonorum et Malorum&quot; (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, &quot;Lorem ipsum dolor sit amet..&quot;, comes from a line in section 1.10.32.&lt;/p&gt;&lt;/span&gt;&lt;/b&gt;&lt;/span&gt;&lt;/p&gt;');

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id` int(30) NOT NULL,
  `name` varchar(200) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL,
  `type` tinyint(1) NOT NULL DEFAULT 2 COMMENT '1=admin , 2 = staff'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`, `type`) VALUES
(1, 'Administrator Juliana', 'admin', 'admin123', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `users_info`
--

CREATE TABLE `users_info` (
  `id` int(11) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `username` varchar(255) NOT NULL,
  `Address` varchar(200) NOT NULL,
  `City` varchar(50) NOT NULL,
  `State` varchar(2) NOT NULL,
  `Zip_Code` int(5) NOT NULL,
  `Phone` varchar(15) NOT NULL,
  `password_hash` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `users_info`
--

INSERT INTO `users_info` (`id`, `Name`, `username`, `Address`, `City`, `State`, `Zip_Code`, `Phone`, `password_hash`) VALUES
(1, 'Juliana Isabel Sarmo', 'jjuliana.sarmo@gmail.com', '2062 S WOLCOTT CT', 'DENVER', 'Co', 80219, '7209408600', '$2y$10$F3gQDdoqg.R6MZeQQK.NVu9mO1vNZLZJ2kF9MaKRKLY3pU515.5b.'),
(2, 'Jujuba', 'juliana@gmail.com', '2062 S WOLCOTT CT', 'DENVER', 'Co', 80219, '7209408600', '$2y$10$CLr6wFtZP/OdD18/9wRYTOYEP8GqBbsIHSa4VZIG/.1vf6/7fC4Oy'),
(3, 'Rosely Xavier', 'jjuliana.xavier@gmail.com', 'Rua Biann de Medeiros', 'Recife', 'PE', 52071, '8196968251', '$2y$10$/r4fp6TMLp.eyU7e9nhUE.bXov9SDyoQYB4szBFv3Dgfet4VMt6j.'),
(4, 'Aaron Sarmo', 'atsarmo@gmail.com', '2062 S Wolcott ct', 'Denver', 'CO', 80219, '7209408600', '$2y$10$Mxdd7OWzUguyKru8r.Na../K/7l0OkXzz2FgG2YiXrCBk16YTIs2y'),
(17, 'Juliana Isabel Sarmo', 'juliana86@gmail.com', '2062 S WOLCOTT CT', 'DENVER', 'Co', 80219, '7209408600', '$2y$10$ONcLbfi8pe8apwfu11OPLOsJDQMe5EfRp39B95DKbY4t2wjm9i/kW'),
(18, 'juliana10', 'juliana10@gmail.com', '2062 S WOLCOTT CT', 'DENVER', 'Co', 80219, '7209408600', '$2y$10$qSMEh0nZtfnUBhNtiwiUy.XbnWhDJA0i0.OyYZB3Cy61opJNux4Bu'),
(22, 'Juliana Isabel Sarmo', 'juliana20@gmail.com', '2062 S WOLCOTT CT', 'DENVER', 'Co', 80219, '7209408600', '$2y$10$s.e2DVBfbVieqJklmWk25.E1JRjYXaJJVSJhYEWBwVcIYiESG1rZO'),
(24, 'Mary Smith', 'mary30@gmail.com', '2541 Brazil Avenue', 'denver', 'co', 54147, '3657896255', '$2y$10$j9MSptzBNqz0LH.jrlEH9es1rn94h0/D7MmyYM/I5e4vrX1A7AfX2'),
(25, 'Juliana Sarmo', 'juliana40@gmail.com', '2062 South Wolcott Court', 'Denver', 'Co', 80219, '7209408600', '$2y$10$MlL/r2d35HZhz1bUCknu4ecdHx/TvTl0VH0H6glDFdEKsM9/0SzTW');

-- --------------------------------------------------------

--
-- Estrutura da tabela `user_info`
--

CREATE TABLE `user_info` (
  `user_id` int(10) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `email` varchar(300) NOT NULL,
  `password` varchar(300) NOT NULL,
  `mobile` varchar(10) NOT NULL,
  `address` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `user_info`
--

INSERT INTO `user_info` (`user_id`, `first_name`, `last_name`, `email`, `password`, `mobile`, `address`) VALUES
(1, 'James', 'Smith', 'jsmith@sample.com', '1254737c076cf867dc53d60a0364f38e', '4756463215', 'adasdasd asdadasd'),
(2, 'juliana sarmo', 'juliana10@gmail.com', 'juliana10@gmail.com', '2e78045beaee85d64b6cbd889b7d7646', '7209408600', '2062 S WOLCOTT CT'),
(3, 'Juliana', 'Sarmo', 'jjuliana.sarmo@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '1720940860', '2062 S WOLCOTT CT'),
(4, 'Juliana I', 'Sarmo', 'jxsarmo@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '1720940860', '2062 S WOLCOTT CT\r\n'),
(5, 'Gabriela', 'Sarmo', 'gabriela@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '236 547 59', '2062 Brazil Ave Denver-CO'),
(6, 'Isabel', 'Sarmo', 'isabel@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '754147589', '2062 S WOLCOTT CT\r\n'),
(7, 'aaron', 'sarmo', 'aaron@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '1425874', '214 Brazil aven'),
(8, 'Juliana ', 'Sarmo', 'juliana36@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '1800 236 0', '2145 Brazil Ave Denver-CO 80219\r\n'),
(9, '', '', '', 'd41d8cd98f00b204e9800998ecf8427e', '', ''),
(10, 'mary', 'smith', 'mary50@gmail.com', '2e78045beaee85d64b6cbd889b7d7646', '1234567890', '2062 S WOLCOTT CT\r\n'),
(11, 'rose', 'xavier', 'rose20@gmail.com', '2e78045beaee85d64b6cbd889b7d7646', '1234567890', 'rua biann de medeiros');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `category_list`
--
ALTER TABLE `category_list`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `order_list`
--
ALTER TABLE `order_list`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `product_list`
--
ALTER TABLE `product_list`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `system_settings`
--
ALTER TABLE `system_settings`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `users_info`
--
ALTER TABLE `users_info`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email` (`username`);

--
-- Índices para tabela `user_info`
--
ALTER TABLE `user_info`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT de tabela `category_list`
--
ALTER TABLE `category_list`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `order_list`
--
ALTER TABLE `order_list`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de tabela `product_list`
--
ALTER TABLE `product_list`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT de tabela `system_settings`
--
ALTER TABLE `system_settings`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `users_info`
--
ALTER TABLE `users_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de tabela `user_info`
--
ALTER TABLE `user_info`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
