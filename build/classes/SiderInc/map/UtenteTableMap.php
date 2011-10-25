<?php



/**
 * This class defines the structure of the 'Utente' table.
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
class UtenteTableMap extends TableMap
{

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'SiderInc.map.UtenteTableMap';

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
		$this->setName('Utente');
		$this->setPhpName('Utente');
		$this->setClassname('Utente');
		$this->setPackage('SiderInc');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
		$this->addColumn('USERNAME', 'Username', 'CHAR', false, 50, null);
		$this->addColumn('PASSWORD', 'Password', 'CHAR', false, 50, null);
		$this->addForeignKey('LIVELLO', 'Livello', 'INTEGER', 'LivelloUtente', 'ID', false, 50, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
		$this->addRelation('Livelloutente', 'Livelloutente', RelationMap::MANY_TO_ONE, array('livello' => 'id', ), 'CASCADE', null);
		$this->addRelation('Dettaglioutente', 'Dettaglioutente', RelationMap::ONE_TO_MANY, array('id' => 'idUtente', ), 'CASCADE', null, 'Dettaglioutentes');
	} // buildRelations()

} // UtenteTableMap
