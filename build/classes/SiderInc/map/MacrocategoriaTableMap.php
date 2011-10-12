<?php



/**
 * This class defines the structure of the 'MacroCategoria' table.
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
class MacrocategoriaTableMap extends TableMap
{

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'SiderInc.map.MacrocategoriaTableMap';

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
		$this->setName('MacroCategoria');
		$this->setPhpName('Macrocategoria');
		$this->setClassname('Macrocategoria');
		$this->setPackage('SiderInc');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
		$this->addForeignKey('IDFAMIGLIA', 'Idfamiglia', 'INTEGER', 'Famiglia', 'ID', true, null, null);
		$this->addColumn('DESCRIZIONE', 'Descrizione', 'LONGVARCHAR', false, null, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
		$this->addRelation('Famiglia', 'Famiglia', RelationMap::MANY_TO_ONE, array('idFamiglia' => 'id', ), 'CASCADE', null);
		$this->addRelation('Categoria', 'Categoria', RelationMap::ONE_TO_MANY, array('id' => 'idMacroCategoria', ), 'CASCADE', null, 'Categorias');
	} // buildRelations()

} // MacrocategoriaTableMap
