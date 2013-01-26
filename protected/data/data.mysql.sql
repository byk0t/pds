-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 26, 2013 at 10:20 AM
-- Server version: 5.5.29
-- PHP Version: 5.3.10-1ubuntu3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `pds`
--

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `code`, `description`) VALUES
(1, 'Колбаса', 'КОД', 'Колбаса для пынгыса'),
(2, 'Рыба морская', 'МР2Р', 'Любимое лакомство пынгыса');

--
-- Dumping data for table `stocks`
--

INSERT INTO `stocks` (`id`, `name`, `address`, `type`) VALUES
(1, 'Главный склад', 'ул. Ленина 35', 1),
(2, 'Второй главный склад', 'Минск, Минина 19', 2);

--
-- Dumping data for table `stock_moves`
--

INSERT INTO `stock_moves` (`id`, `date`, `user_id`, `from_id`, `to_id`) VALUES
(1, '2013-01-23', 2, 1, 2),
(2, '2013-01-30', 2, 2, 1);

--
-- Dumping data for table `stock_move_lines`
--

INSERT INTO `stock_move_lines` (`id`, `move_id`, `product_id`, `quantity`) VALUES
(1, 1, 1, 100);

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `login`, `password`, `role`) VALUES
(1, 'test', 'test', '098f6bcd4621d373cade4e832627b4f6', 'user'),
(2, 'admin', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'administrator'),
(4, 'Вероника', 'nika', '34335', ''),
(6, '111111111', '111111111', '202cb962ac59075b964b07152d234b70', 'administrator');
