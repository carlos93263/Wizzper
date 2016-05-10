SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

CREATE DATABASE IF NOT EXISTS `bd_whisperinlight` DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish_ci;
USE `bd_whisperinlight`;

	
--
-- Estructura de la tabla `tbl_user`
--

	CREATE TABLE IF NOT EXISTS `tbl_user` (
		`user_id` int(11) NOT NULL,
		`user_nickname` varchar(50) NOT NULL,
		`user_email` varchar(50) NOT NULL,
		`user_password` varchar(50) NOT NULL,
		`user_name` varchar(30) NULL,
		`user_surname` varchar(50) NULL,
		`user_dateofbirth` date NULL,
		`user_avatar` varchar(50) NULL,
		`user_gender` tinyint(1) NULL,
		`user_response` boolean default true NULL,
		`user_notification` boolean default true NULL
	) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;
	/*  Canvi a Primari Key */
			ALTER TABLE `tbl_user`
			ADD CONSTRAINT PRIMARY KEY (user_id);
	/*  Canvi a autoincremental*/
			ALTER TABLE `tbl_user`
			MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT;	
	/*  Creació de les FK */
			ALTER TABLE `tbl_user`
			ADD kous_id int(11) NULL;
	/* Inserts taula categories */
	INSERT INTO `tbl_user` (`user_id`, `user_nickname`, `user_email`, `user_password`, `user_name`, `user_surname`, `user_gender`, `user_response`, `user_notification`) VALUES
	(1, "melenas", "sergio.ayala@gmail.com", "81dc9bdb52d04dc20036dbd8313ed055", "Sergio", "Ayala", "M", 1, 1),
	(2, "gymPower", "aitor.blesa@gmail.com", "81dc9bdb52d04dc20036dbd8313ed055", "Aitor", "Blesa", "M", 1, 1),
	(3, "xavier", "xavier.granell@gmail.com", "81dc9bdb52d04dc20036dbd8313ed055", "Xavier", "Granell", "M", 1, 1),
	(4, "alvaro", "alvaro.camacho@gmail.com", "81dc9bdb52d04dc20036dbd8313ed055", "Alvaro", "Camacho", "M", 1, 1),
	(5, "noescarles", "carlos.sanchez@gmail.com", "81dc9bdb52d04dc20036dbd8313ed055", "Carlos", "Sanchez", "M", 1, 1),
	(6, "catesmillor", "enric.gorriz@gmail.com", "81dc9bdb52d04dc20036dbd8313ed055", "Enric", "Gorriz", "M", 1, 1);
	

--
-- Estructura de la taula `tbl_kindOfUser`
--
	CREATE TABLE IF NOT EXISTS `tbl_kindOfUser` (
		`kous_id` int(11) NOT NULL,
		`kous_name` varchar(50) NULL
	) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;
	/*  Canvi a Primari Key */
			ALTER TABLE `tbl_kindOfUser`
			ADD CONSTRAINT PRIMARY KEY (kous_id);
	/*  Canvi a autoincremental*/
			ALTER TABLE `tbl_kindOfUser`
			MODIFY `kous_id` int(11) NOT NULL AUTO_INCREMENT;	
	/* Inserts taula categories */
	INSERT INTO `tbl_kindOfUser` (`kous_id`, `kous_name`) VALUES
	(1, "Admin"),
	(2, "Psychologist"),
	(3, "User");	
	
--
-- Estructura de la taula `tbl_publicThems`
--
	CREATE TABLE IF NOT EXISTS `tbl_publicThems` (
		`pthe_id` int(11) NOT NULL,
		`pthe_matter` varchar(80) NULL,
		`pthe_textBody` text NULL,
		`pthe_dateText` date NULL,
		`pthe_timeText` time NULL,
		`pthe_closed` boolean default false NULL,
		`pthe_ProfesionalArticle` boolean default false NULL
	) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;
	/*  Canvi a Primari Key */
			ALTER TABLE `tbl_publicThems`
			ADD CONSTRAINT PRIMARY KEY (pthe_id);
	/*  Canvi a autoincremental*/
			ALTER TABLE `tbl_publicThems`
			MODIFY `pthe_id` int(11) NOT NULL AUTO_INCREMENT;	
	/*  Creació de les FK */
			ALTER TABLE `tbl_publicThems`
			ADD user_id int(11) NULL;
			ALTER TABLE `tbl_publicThems`
			ADD cate_id int(11) NULL;
			
--
-- Estructura de la taula `tbl_commentsPublicThems`
--
	CREATE TABLE IF NOT EXISTS `tbl_commentsPublicThems` (
		`cpth_id` int(11) NOT NULL,
		`cpth_textBody` text NULL,
		`cpth_dateText` date NULL,
		`cpth_timeText` time NULL,
		`cpth_like` varchar(3) NULL,
		`cpth_visible` boolean default true
	) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;
	/*  Canvi a Primari Key */
			ALTER TABLE `tbl_commentsPublicThems`
			ADD CONSTRAINT PRIMARY KEY (cpth_id);
	/*  Canvi a autoincremental*/
			ALTER TABLE `tbl_commentsPublicThems`
			MODIFY `cpth_id` int(11) NOT NULL AUTO_INCREMENT;	
	/*  Creació de les FK */
			ALTER TABLE `tbl_commentsPublicThems`
			ADD user_id int(11) NULL;
			ALTER TABLE `tbl_commentsPublicThems`
			ADD pthe_id int(11) NULL;
			
--
-- Estructura de la taula `tbl_categories`
--
	CREATE TABLE IF NOT EXISTS `tbl_categories` (
		`cate_id` int(11) NOT NULL,
		`cate_name` varchar(50) NULL
	) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;
	/*  Canvi a Primari Key */
			ALTER TABLE `tbl_categories`
			ADD CONSTRAINT PRIMARY KEY (cate_id);
	/*  Canvi a autoincremental*/
			ALTER TABLE `tbl_categories`
			MODIFY `cate_id` int(11) NOT NULL AUTO_INCREMENT;	
	/* Inserts taula categories */
	INSERT INTO `tbl_categories` (`cate_id`, `cate_name`) VALUES
	(1, "Amistad"),
	(2, "Amor"),
	(3, "Dinero"),
	(4, "Estudios"),
	(5, "Familia"),
	(6, "Salud"),
	(7, "Trabajo"),
	(8, "Varios");
	
--
-- Estructura de la taula `tbl_xatText`
--
	CREATE TABLE IF NOT EXISTS `tbl_xatText` (
		`xatt_id` int(11) NOT NULL,
		`xatt_text` text NULL,
		`xatt_dateText` date NULL,
		`xatt_timeText` time NULL
	) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;
	/*  Canvi a Primari Key */
			ALTER TABLE `tbl_xatText`
			ADD CONSTRAINT PRIMARY KEY (xatt_id);
	/*  Canvi a autoincremental*/
			ALTER TABLE `tbl_xatText`
			MODIFY `xatt_id` int(11) NOT NULL AUTO_INCREMENT;	
	/*  Creació de les FK */
			ALTER TABLE `tbl_xatText`
			ADD user_id int(11) NULL;

--
-- Estructura de la taula `tbl_xatUser`
--
	CREATE TABLE IF NOT EXISTS `tbl_xatUser` (
		`xatu_id` int(11) NOT NULL
	) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;
	/*  Canvi a Primari Key */
			ALTER TABLE `tbl_xatUser`
			ADD CONSTRAINT PRIMARY KEY (xatu_id);
	/*  Canvi a autoincremental*/
			ALTER TABLE `tbl_xatUser`
			MODIFY `xatu_id` int(11) NOT NULL AUTO_INCREMENT;	
	/*  Creació de les FK */
			ALTER TABLE `tbl_xatUser`
			ADD xatf_id int(11) NULL;
			ALTER TABLE `tbl_xatUser`
			ADD user_id int(11) NULL;

--
-- Estructura de la taula `tbl_xatFinal`
--
	CREATE TABLE IF NOT EXISTS `tbl_xatFinal` (
		`xatf_id` int(11) NOT NULL
	) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;
	/*  Canvi a Primari Key */
			ALTER TABLE `tbl_xatFinal`
			ADD CONSTRAINT PRIMARY KEY (xatf_id);
	/*  Canvi a autoincremental*/
			ALTER TABLE `tbl_xatFinal`
			MODIFY `xatf_id` int(11) NOT NULL AUTO_INCREMENT;	
	/*  Creació de les FK */
			ALTER TABLE `tbl_xatFinal`
			ADD xatt_id int(11) NULL;
			
--
-- Estructura de la taula `tbl_message`
--
	CREATE TABLE IF NOT EXISTS `tbl_message` (
		`mess_id` int(11) NOT NULL,
		`mess_matter` varchar(50) NULL,
		`mess_textBody` text NULL,
		`mess_dateText` date NULL,
		`mess_timeText` time NULL
	) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;
	/*  Canvi a Primari Key */
			ALTER TABLE `tbl_message`
			ADD CONSTRAINT PRIMARY KEY (mess_id);
	/*  Canvi a autoincremental*/
			ALTER TABLE `tbl_message`
			MODIFY `mess_id` int(11) NOT NULL AUTO_INCREMENT;	
	/*  Creació de les FK */
			ALTER TABLE `tbl_message`
			ADD user_id int(11) NULL;
	/* Inserts taula message */
	INSERT INTO `tbl_message` (`mess_id`, `mess_matter`, `mess_textBody`, `mess_dateText`, `mess_timeText`, `user_id`) VALUES
	(1, "Amistad1", "cos missatge 1", '2016-04-11', '10:34:09', 5),
	(2, "Amistad2", "cos missatge 2", '2016-05-06', '10:34:09', 5),
	(3, "Amistad3", "cos missatge 3", '2016-05-11', '10:34:09', 5),
	(4, "Amistad4", "cos missatge 4", '2016-05-15', '10:34:09', 5),
	(5, "Amistad5", "cos missatge 5", '2016-05-18', '10:34:09', 6),
	(6, "Amistad6", "cos missatge 6", '2016-05-21', '10:34:09', 6),
	(7, "Amistad7", "cos missatge 7", '2016-06-11', '10:34:09', 6),
	(8, "Amistad8", "cos missatge 8", '2016-06-15', '10:34:09', 6);
			
--
-- Estructura de la taula `tbl_messUser`
--
	CREATE TABLE IF NOT EXISTS `tbl_messUser` (
		`meus_id` int(11) NOT NULL
	) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;
	/*  Canvi a Primari Key */
			ALTER TABLE `tbl_messUser`
			ADD CONSTRAINT PRIMARY KEY (meus_id);
	/*  Canvi a autoincremental*/
			ALTER TABLE `tbl_messUser`
			MODIFY `meus_id` int(11) NOT NULL AUTO_INCREMENT;	
	/*  Creació de les FK */
			ALTER TABLE `tbl_messUser`
			ADD user_id int(11) NULL;
			ALTER TABLE `tbl_messUser`
			ADD mess_id int(11) NULL;
	/* Inserts taula tbl_messUser */
	INSERT INTO `tbl_messUser` (`meus_id`, `user_id`, `mess_id`) VALUES
	(1, 6, 1),
	(2, 6, 2),
	(3, 4, 2),
	(4, 6, 3),
	(5, 6, 4),
	(6, 5, 5),
	(7, 5, 6),
	(8, 5, 7),
	(9, 4, 7),
	(10, 5, 8);
	
--
-- Estructura de la taula `tbl_messConver`
--
	CREATE TABLE IF NOT EXISTS `tbl_messConver` (
		`meco_id` int(11) NOT NULL,
		`meco_textBody` text NULL,
		`meco_dateText` date NULL,
		`meco_timeText` time NULL,
		`meco_read` boolean default true NULL
	) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;
	/*  Canvi a Primari Key */
			ALTER TABLE `tbl_messConver`
			ADD CONSTRAINT PRIMARY KEY (meco_id);
	/*  Canvi a autoincremental*/
			ALTER TABLE `tbl_messConver`
			MODIFY `meco_id` int(11) NOT NULL AUTO_INCREMENT;	
	/*  Creació de les FK */
			ALTER TABLE `tbl_messConver`
			ADD user_id int(11) NULL;
			ALTER TABLE `tbl_messConver`
			ADD meus_id int(11) NULL;
	/* Inserts taula tbl_messConver */
	INSERT INTO `tbl_messConver` (`meco_id`, `meco_textBody`, `meco_dateText`, `meco_timeText`, `user_id`, `meus_id`) VALUES
	(1, "Resposta 1", '2016-05-06', '10:34:09', 6, 1),
	(2, "Resposta 2", '2016-05-11', '10:34:09', 6, 2),
	(3, "Resposta 3", '2016-05-15', '10:34:09', 6, 2),
	(4, "Resposta 4", '2016-05-18', '10:34:09', 6, 3),
	(5, "Resposta 5", '2016-05-21', '10:34:09', 6, 4),
	(6, "Resposta 6", '2016-06-11', '10:34:09', 6, 5),
	(7, "Resposta 7", '2016-06-15', '10:34:09', 6, 6),
	(8, "Resposta 8", '2016-06-16', '10:34:09', 6, 7),
	(9, "Resposta 9", '2016-06-17', '10:34:09', 6, 7),
	(10, "Resposta 10", '2016-06-18', '10:34:09', 6, 8);
	
--
-- Estructura de la taula `tbl_relationship`
--
	CREATE TABLE IF NOT EXISTS `tbl_relationship` (
		`rela_id` int(11) NOT NULL,
		`rela_type` varchar(20) NULL
	) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;
	/*  Canvi a Primari Key */
			ALTER TABLE `tbl_relationship`
			ADD CONSTRAINT PRIMARY KEY (rela_id);
	/*  Canvi a autoincremental*/
			ALTER TABLE `tbl_relationship`
			MODIFY `rela_id` int(11) NOT NULL AUTO_INCREMENT;	
	/*  Creació de les FK */
			ALTER TABLE `tbl_relationship`
			ADD user_id1 int(11) NULL;
			ALTER TABLE `tbl_relationship`
			ADD user_id2 int(11) NULL;
			
-- RELACIONS BASE DE DADES
-- PK tbl_kindOfUser FK tbl_user 
	ALTER TABLE `tbl_user`
	ADD CONSTRAINT FOREIGN KEY (kous_id)
	REFERENCES `tbl_kindOfUser` (kous_id);
	
-- PK tbl_user FK tbl_publicThems 
	ALTER TABLE `tbl_publicthems`
	ADD CONSTRAINT FOREIGN KEY (user_id)
	REFERENCES `tbl_user` (user_id);
	
-- PK tbl_user FK tbl_commentsPublicThems 
	ALTER TABLE `tbl_commentsPublicThems`
	ADD CONSTRAINT FOREIGN KEY (user_id)
	REFERENCES `tbl_user` (user_id);
	
-- PK tbl_user FK tbl_xatText 
	ALTER TABLE `tbl_xatText`
	ADD CONSTRAINT FOREIGN KEY (user_id)
	REFERENCES `tbl_user` (user_id);
	
-- PK tbl_user FK tbl_xatUser 
	ALTER TABLE `tbl_xatUser`
	ADD CONSTRAINT FOREIGN KEY (user_id)
	REFERENCES `tbl_user` (user_id);
	
-- PK tbl_user FK tbl_message 
	ALTER TABLE `tbl_message`
	ADD CONSTRAINT FOREIGN KEY (user_id)
	REFERENCES `tbl_user` (user_id);
	
-- PK tbl_user FK tbl_messUser 
	ALTER TABLE `tbl_messUser`
	ADD CONSTRAINT FOREIGN KEY (user_id)
	REFERENCES `tbl_user` (user_id);

-- PK tbl_user FK tbl_messConver 
	ALTER TABLE `tbl_messConver`
	ADD CONSTRAINT FOREIGN KEY (user_id)
	REFERENCES `tbl_user` (user_id);
	
-- PK tbl_categories FK tbl_publicThems 
	ALTER TABLE `tbl_publicThems`
	ADD CONSTRAINT FOREIGN KEY (cate_id)
	REFERENCES `tbl_categories` (cate_id);

-- PK tbl_publicThems FK tbl_commentsPublicThems 
	ALTER TABLE `tbl_commentsPublicThems`
	ADD CONSTRAINT FOREIGN KEY (pthe_id)
	REFERENCES `tbl_publicThems` (pthe_id);
	
-- PK tbl_xatFinal FK tbl_xatUser 
	ALTER TABLE `tbl_xatUser`
	ADD CONSTRAINT FOREIGN KEY (xatf_id)
	REFERENCES `tbl_xatFinal` (xatf_id);

-- PK tbl_xatText FK tbl_xatFinal 
	ALTER TABLE `tbl_xatFinal`
	ADD CONSTRAINT FOREIGN KEY (xatt_id)
	REFERENCES `tbl_xatText` (xatt_id);
	
-- PK tbl_user FK tbl_relationship 
	ALTER TABLE `tbl_relationship`
	ADD CONSTRAINT FOREIGN KEY (user_id1)
	REFERENCES `tbl_user` (user_id);
	
-- PK tbl_user FK tbl_relationship 
	ALTER TABLE `tbl_relationship`
	ADD CONSTRAINT FOREIGN KEY (user_id2)
	REFERENCES `tbl_user` (user_id);

-- PK tbl_messUser FK tbl_messConver 
	ALTER TABLE `tbl_messConver`
	ADD CONSTRAINT FOREIGN KEY (meus_id)
	REFERENCES `tbl_messUser` (meus_id);
	
-- PK tbl_message FK tbl_messUser 
	ALTER TABLE `tbl_messUser`
	ADD CONSTRAINT FOREIGN KEY (mess_id)
	REFERENCES `tbl_message` (mess_id);