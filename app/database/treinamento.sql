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
-- Banco de dados: `treinamento`
--

CREATE TABLE `dados_usuarios`(
	`id` int(11) primary key auto_increment,
	`nome` varchar(150),
	`sobrenome` varchar(150),
	`email` varchar(200),
	`senha` varchar(500),
	`foto` varchar(150),
	`video` varchar(150),
	`data` DATETIME DEFAULT NOW()
);

CREATE TABLE `logs`(
	`id` int(11) primary key auto_increment,
	`id_usuarios` int(11),
	`hora_entrada` timestamp,
	`hora_saida` timestamp,
	`ultima_alteracao` timestamp,
	`ip` varchar(45),
	`navegador` varchar(45),
	`sistema` varchar(45)
);