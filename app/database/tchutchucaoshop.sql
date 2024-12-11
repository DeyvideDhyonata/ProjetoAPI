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
	`tipo_usuario` varchar(10),
	`nome_completo` varchar(120),
	`email` varchar(200),
	`senha` varchar(500),
	`telefone` varchar(12)
);


CREATE TABLE `servicos` (
	`id` int(11) primary key auto_increment,
	`id_usuario` varchar(22),
	`nome_animal` varchar(100),
	`raca_animal` varchar(100),
	`data_servico` varchar(22),
	`tipo_servico` varchar(50) 
);

INSERT INTO usuarios(tipo_usuario, nome_completo, email, senha, telefone) VALUES('adm','Deyvide Dhyonata Nunes Marques','deyvide@gmail.com','$2y$10$o8qzkddwLOjwRO3LYdz61OZCiXrfpUzKyxBP0Xy6fAbOJ53TEyrAe','11999999999');
INSERT INTO usuarios(tipo_usuario, nome_completo, email, senha, telefone) VALUES('adm','Matheus Eduardo Alves Muniz','matheus@gmail.com','$2y$10$o8qzkddwLOjwRO3LYdz61OZCiXrfpUzKyxBP0Xy6fAbOJ53TEyrAe','11999999999');
INSERT INTO usuarios(tipo_usuario, nome_completo, email, senha, telefone) VALUES('adm','Jennifer da Silveira Santos','jennifer@gmail.com','$2y$10$o8qzkddwLOjwRO3LYdz61OZCiXrfpUzKyxBP0Xy6fAbOJ53TEyrAe','11999999999');



