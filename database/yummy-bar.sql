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
-- Banco de dados: `yummy-bar`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `dishes`
--

CREATE TABLE `dishes` (
  `Code` varchar(30) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Category` varchar(50) NOT NULL,
  `Description` varchar(255) NOT NULL,
  `Price` float NOT NULL,
  `Calories` int(11) NOT NULL,
  `Specials` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `dishes`
--

INSERT INTO `dishes` (`Code`, `Name`, `Category`, `Description`, `Price`, `Calories`, `Specials`) VALUES
('apple-salmon', 'Apple Salmon Delight', 'entrees', 'Description Apple Salmon Delight', 25, 400, 0),
('beef-lasagna', 'Beef Lasagna', 'entrees', 'Description Beef Lasagna', 21, 600, 1),
('berries-flan', 'Berries Flan', 'desserts', 'Description Berries Flan', 14, 400, 0),
('brazilian-cheesebread', 'Brazilian Cheesebread', 'appetizers', 'Description Brazilian Cheesebread', 12, 300, 1),
('brazilian-churrasco', 'Brazilian Churrasco', 'entrees', 'Description Brazilian Churrasco', 28, 500, 1),
('brazilian-picanha', 'Brazilian Picanha', 'entrees', 'Description Brazilian Picanha', 30, 500, 0),
('brie-jelly', 'Brie Cheese and Jelly Bites', 'appetizers', 'Description Brie Cheese and Jelly Bites', 14, 400, 0),
('brownie-icecream', 'Icecream Brownie', 'desserts', 'Description Icecream Brownie', 12, 400, 0),
('burger-fries', 'Burger with Fries', 'entrees', 'Description Burger with Fries', 21, 700, 0),
('caesar-salad', 'Caesar Salad', 'appetizers', 'Description Caesar Salad', 12, 450, 0),
('cheesy-bacon', 'Cheesy Bacon Bites', 'appetizers', 'Description Cheesy Bacon Bites', 15, 500, 1),
('cherry-cheesecake', 'Cherry Cheesecake', 'desserts', 'Description Cherry Cheesecake', 15, 400, 1),
('chicken-enchilada', 'Chicken Enchilada', 'entrees', 'Description Chicken Enchilada', 17, 400, 1),
('chicken-soup', 'Chicken Soup', 'appetizers', 'Description Chicken Soup', 11, 400, 0),
('chocolate-shake', 'Chocolate Shake', 'desserts', 'Description Chocolate Shake', 10, 500, 0),
('club.sandwich', 'Club Sandwich', 'entrees', 'Description Club Sandwich', 17, 400, 0),
('crab-cake', 'Crab Cake', 'appetizers', 'Description Crab Cake', 14, 400, 0),
('cucumber-salmon-guacamole', 'Salmon Gacamole Cucumber Bites', 'appetizers', 'Salmon Gacamole Cucumber Bites', 17, 500, 0),
('easy-polenta', 'Polenta', 'appetizers', 'Description Polenta', 13, 400, 0),
('fresh-fruit-juice', 'Fresh Fruit Juice', 'beverages', '12oz glass - Please enter flavor and quantity at check out. Options: Strawberry juice, Orange Juice, Pineapple Kale Juice, Mango, Juice, and\r\nBerry juice\r\n\r\n\r\n', 12, 400, 0),
('fried-calamari', 'Fried Calamari', 'appetizers', 'Description Fried Calamari', 18, 600, 0),
('fudge-icecream', 'Icecream Fudge', 'desserts', 'Description Icecream Fudge', 13, 400, 0),
('garlic.shrimp', 'Garlic Shrimp', 'entrees', 'Description Garlic Shrimp', 16, 340, 0),
('greek-salad', 'Greek Salad', 'appetizers', 'Description Greek Salad', 11, 180, 0),
('icecream-cookie', 'Icecream Sandwich', 'desserts', 'Description Icecream Sandwich', 16, 600, 1),
('mushroom-garden', 'Mushroom Salad', 'appetizers', 'Description Mushroom Salad', 12, 290, 1),
('papaya-cream', 'Papaya Cream', 'desserts', 'Description Papaya Cream', 14, 300, 1),
('petit-gateau', 'Petit Gateau', 'desserts', 'Description Petit Gateau', 16, 500, 0),
('rib', 'Lamb Rib', 'entrees', 'Description Lamb Rib', 27, 600, 0),
('salmon-vegetables', 'Salmon with Vegetables', 'entrees', 'Description Salmon with Vegetables', 28, 500, 0),
('shrimp-pasta', 'Shrimp Pasta', 'entrees', 'Description Shrimp Pasta', 25, 600, 0),
('soft-drinks', 'Soft-Drinks', 'beverages', '12oz can - Please enter flavor and quantity at check out. \r\nOptions: Coke, Fanta, and Sprite.', 12, 400, 0),
('sparkling-water', 'Bubbly Sparkling Water', 'beverages', '12oz bottle - Please enter flavor and quantity at check out. Options: Lime Bubly, Mango Bubly, and Grapefruit Bubly.', 12, 400, 0),
('strawberry-shortcake', 'Strawberry Shortcake', 'desserts', 'Description Strawberry Shortcake', 14, 600, 0),
('strawberry-sundae', 'Strawberry Sundae', 'desserts', 'Description Strawberry Sundae', 12, 400, 0),
('water', 'Water', 'beverages', '16.9oz bottle - Please enter quantity at checkout ', 12, 400, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `address` varchar(255) NOT NULL,
  `payment_mode` varchar(20) NOT NULL,
  `dishes` varchar(255) NOT NULL,
  `paid_amount` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Índices para tabela `dishes`
--
ALTER TABLE `dishes`
  ADD PRIMARY KEY (`Code`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(255) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
