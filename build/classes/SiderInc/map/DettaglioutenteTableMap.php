<?php



/**
 * This class defines the structure of the 'DettaglioUtente' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    propel.generator.SiderInc.map
 */
class DettaglioutenteTableMap extends TableMap
{

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'SiderInc.map.DettaglioutenteTableMap';

	/**
	 * Initialize the table attributes, columns and validators
	 * Relations are not initialized by this method since they are lazy loaded
	 *
	 * @return     void
	 * @throws     PropelException
	 */
	public function initialize()
	{
		// attributes
		$this->setName('DettaglioUtente');
		$this->setPhpName('Dettaglioutente');
		$this->setClassname('Dettaglioutente');
		$this->setPackage('SiderInc');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
		$this->addForeignKey('IDUTENTE', 'Idutente', 'INTEGER', 'Utente', 'ID', true, null, null);
		$this->addColumn('NOME', 'Nome', 'CHAR', false, 50, null);
		$this->addColumn('COGNOME', 'Cognome', 'CHAR', false, 50, null);
		$this->addColumn('RAGIONESOCIALE', 'Ragionesociale', 'CHAR', false, 50, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
		$this->addRelation('Utente', 'Utente', RelationMap::MANY_TO_ONE, array('idUtente' => 'id', ), 'CASCADE', null);
	} // buildRelations()

} // DettaglioutenteTableMap
