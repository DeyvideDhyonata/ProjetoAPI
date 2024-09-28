-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de gera��o: 03/01/2024 �s 18:35
-- Vers�o do servidor: 10.4.28-MariaDB
-- Vers�o do PHP: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Banco de dados: `tchutchucaoshop`
--

CREATE TABLE `usuarios`(
	`id` int(11) primary key auto_increment,
	`nome_completo` varchar(120),
	`email` varchar(200),
	`senha` varchar(500),
	`telefone` varchar(12)
);

