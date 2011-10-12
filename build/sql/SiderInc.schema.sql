
# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

-- ---------------------------------------------------------------------
-- Famiglia
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `Famiglia`;

CREATE TABLE `Famiglia`
(
	`id` INTEGER NOT NULL AUTO_INCREMENT,
	`descrizione` TEXT,
	PRIMARY KEY (`id`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- MacroCategoria
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `MacroCategoria`;

CREATE TABLE `MacroCategoria`
(
	`id` INTEGER NOT NULL AUTO_INCREMENT,
	`idFamiglia` INTEGER NOT NULL,
	`descrizione` TEXT,
	PRIMARY KEY (`id`),
	INDEX `FI_igliaMacroCategoria` (`idFamiglia`),
	CONSTRAINT `FamigliaMacroCategoria`
		FOREIGN KEY (`idFamiglia`)
		REFERENCES `Famiglia` (`id`)
		ON DELETE CASCADE
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- Categoria
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `Categoria`;

CREATE TABLE `Categoria`
(
	`id` INTEGER NOT NULL AUTO_INCREMENT,
	`idMacroCategoria` INTEGER NOT NULL,
	`descrizione` TEXT,
	PRIMARY KEY (`id`),
	INDEX `FI_roCategoriaCategoria` (`idMacroCategoria`),
	CONSTRAINT `MacroCategoriaCategoria`
		FOREIGN KEY (`idMacroCategoria`)
		REFERENCES `MacroCategoria` (`id`)
		ON DELETE CASCADE
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- Utente
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `Utente`;

CREATE TABLE `Utente`
(
	`id` INTEGER NOT NULL AUTO_INCREMENT,
	`username` CHAR(50),
	`password` CHAR(50),
	PRIMARY KEY (`id`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- DettaglioUtente
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `DettaglioUtente`;

CREATE TABLE `DettaglioUtente`
(
	`id` INTEGER NOT NULL AUTO_INCREMENT,
	`idUtente` INTEGER NOT NULL,
	`nome` CHAR(50),
	`cognome` CHAR(50),
	`ragioneSociale` CHAR(50),
	PRIMARY KEY (`id`),
	INDEX `FI_nteDettaglioUtente` (`idUtente`),
	CONSTRAINT `UtenteDettaglioUtente`
		FOREIGN KEY (`idUtente`)
		REFERENCES `Utente` (`id`)
		ON DELETE CASCADE
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- LivelloUtente
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `LivelloUtente`;

CREATE TABLE `LivelloUtente`
(
	`id` INTEGER NOT NULL AUTO_INCREMENT,
	`idUtente` INTEGER NOT NULL,
	`livello` CHAR(20),
	PRIMARY KEY (`id`),
	INDEX `FI_nteLivelloUtente` (`idUtente`),
	CONSTRAINT `UtenteLivelloUtente`
		FOREIGN KEY (`idUtente`)
		REFERENCES `Utente` (`id`)
		ON DELETE CASCADE
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- Inserzione
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `Inserzione`;

CREATE TABLE `Inserzione`
(
	`id` INTEGER NOT NULL AUTO_INCREMENT,
	`idCategoria` INTEGER NOT NULL,
	`data` DATETIME,
	PRIMARY KEY (`id`),
	INDEX `FI_egoriaInserzione` (`idCategoria`),
	CONSTRAINT `CategoriaInserzione`
		FOREIGN KEY (`idCategoria`)
		REFERENCES `Categoria` (`id`)
		ON DELETE CASCADE
) ENGINE=MyISAM;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
