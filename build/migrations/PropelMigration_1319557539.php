<?php

/**
 * Data object containing the SQL and PHP code to migrate the database
 * up to version 1319557539.
 * Generated on 2011-10-25 17:45:39 
 */
class PropelMigration_1319557539
{

	public function preUp($manager)
	{
		// add the pre-migration code here
	}

	public function postUp($manager)
	{
		// add the post-migration code here
	}

	public function preDown($manager)
	{
		// add the pre-migration code here
	}

	public function postDown($manager)
	{
		// add the post-migration code here
	}

	/**
	 * Get the SQL statements for the Up migration
	 *
	 * @return array list of the SQL strings to execute for the Up migration
	 *               the keys being the datasources
	 */
	public function getUpSQL()
	{
		return array (
  'SiderInc' => '
# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

ALTER TABLE `Categoria` ADD CONSTRAINT `MacroCategoriaCategoria`
	FOREIGN KEY (`idMacroCategoria`)
	REFERENCES `MacroCategoria` (`id`)
	ON DELETE CASCADE;

ALTER TABLE `DettaglioUtente` ADD CONSTRAINT `UtenteDettaglioUtente`
	FOREIGN KEY (`idUtente`)
	REFERENCES `Utente` (`id`)
	ON DELETE CASCADE;

ALTER TABLE `Inserzione` ADD CONSTRAINT `CategoriaInserzione`
	FOREIGN KEY (`idCategoria`)
	REFERENCES `Categoria` (`id`)
	ON DELETE CASCADE;

DROP INDEX `FI_nteLivelloUtente` ON `livelloutente`;

ALTER TABLE `livelloutente` DROP `idUtente`;

ALTER TABLE `MacroCategoria` ADD CONSTRAINT `FamigliaMacroCategoria`
	FOREIGN KEY (`idFamiglia`)
	REFERENCES `Famiglia` (`id`)
	ON DELETE CASCADE;

ALTER TABLE `Utente` ADD
(
	`livello` INTEGER(50)
);

CREATE INDEX `FI_nteLivelloUtente` ON `Utente` (`livello`);

ALTER TABLE `Utente` ADD CONSTRAINT `UtenteLivelloUtente`
	FOREIGN KEY (`livello`)
	REFERENCES `LivelloUtente` (`id`)
	ON DELETE CASCADE;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
',
);
	}

	/**
	 * Get the SQL statements for the Down migration
	 *
	 * @return array list of the SQL strings to execute for the Down migration
	 *               the keys being the datasources
	 */
	public function getDownSQL()
	{
		return array (
  'SiderInc' => '
# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

ALTER TABLE `Categoria` DROP FOREIGN KEY `MacroCategoriaCategoria`;

ALTER TABLE `DettaglioUtente` DROP FOREIGN KEY `UtenteDettaglioUtente`;

ALTER TABLE `Inserzione` DROP FOREIGN KEY `CategoriaInserzione`;

ALTER TABLE `livelloutente` ADD
(
	`idUtente` INTEGER NOT NULL
);

CREATE INDEX `FI_nteLivelloUtente` ON `livelloutente` (`idUtente`);

ALTER TABLE `MacroCategoria` DROP FOREIGN KEY `FamigliaMacroCategoria`;

ALTER TABLE `Utente` DROP FOREIGN KEY `UtenteLivelloUtente`;

DROP INDEX `FI_nteLivelloUtente` ON `Utente`;

ALTER TABLE `Utente` DROP `livello`;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
',
);
	}

}