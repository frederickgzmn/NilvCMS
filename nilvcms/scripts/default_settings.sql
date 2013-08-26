-- phpMyAdmin SQL Dump
-- version 2.9.1.1
-- http://www.phpmyadmin.net
-- 
-- Servidor: localhost
-- Tiempo de generación: 05-08-2013 a las 16:05:31
-- Versión del servidor: 5.5.30
-- Versión de PHP: 5.3.22
-- 
-- Base de datos: `pyro`
-- 

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `default_settings`
-- 

CREATE TABLE `settings` (
  `slug` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `types` set('text','textarea','password','select','select-multiple','radio','checkbox') COLLATE utf8_unicode_ci NOT NULL,
  `defaults` text COLLATE utf8_unicode_ci NOT NULL,
  `values` text COLLATE utf8_unicode_ci NOT NULL,
  `is_required` int(1) NOT NULL,
  PRIMARY KEY (`slug`),
  UNIQUE KEY `unique_slug` (`slug`),
  KEY `slug` (`slug`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
