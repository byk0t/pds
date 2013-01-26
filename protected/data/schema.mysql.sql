--
-- Database: `pds`
--
CREATE DATABASE IF NOT EXISTS pds CHARACTER SET utf8;
-- --------------------------------------------------------

--
-- User 
--

CREATE USER 'pds'@'localhost' IDENTIFIED BY 'pds';
GRANT ALL ON pds.* TO 'pds'@'localhost';


--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `stocks`
--

CREATE TABLE IF NOT EXISTS `stocks` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `address` text,
  `type` tinyint(1) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `stock_moves`
--

CREATE TABLE IF NOT EXISTS `stock_moves` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `from_id` int(10) unsigned NOT NULL,
  `to_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_stock_moves_users` (`user_id`),
  KEY `fk_stock_moves_from_stocks` (`from_id`),
  KEY `fk_stock_moves_to_stocks` (`to_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `stock_move_lines`
--

CREATE TABLE IF NOT EXISTS `stock_move_lines` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `move_id` int(10) unsigned NOT NULL,
  `product_id` int(10) unsigned NOT NULL,
  `quantity` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_stock_move_lines_stock_moves` (`move_id`),
  KEY `fk_stock_move_lines_products` (`product_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `login` varchar(255) NOT NULL,
  `password` varchar(32) NOT NULL,
  `role` enum('user','administrator') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;


--
-- Constrains
--

ALTER TABLE stock_moves ADD FOREIGN KEY fk_stock_moves_users (user_id) REFERENCES users (id) ON DELETE CASCADE; 
ALTER TABLE stock_moves ADD FOREIGN KEY fk_stock_moves_from_stocks (from_id) REFERENCES stocks (id) ON DELETE CASCADE; 
ALTER TABLE stock_moves ADD FOREIGN KEY fk_stock_moves_to_stocks (to_id) REFERENCES stocks (id) ON DELETE CASCADE; 
ALTER TABLE stock_move_lines ADD FOREIGN KEY fk_stock_move_lines_stock_moves (move_id) REFERENCES stock_moves (id) ON DELETE CASCADE;
ALTER TABLE stock_move_lines ADD FOREIGN KEY fk_stock_move_lines_products (product_id) REFERENCES products (id) ON DELETE CASCADE;
 