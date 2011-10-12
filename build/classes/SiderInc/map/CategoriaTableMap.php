<?php



/**
 * This class defines the structure of the 'Categoria' table.
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
class CategoriaTableMap extends TableMap
{

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'SiderInc.map.CategoriaTableMap';

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
		$this->setName('Categoria');
		$this->setPhpName('Categoria');
		$this->setClassname('Categoria');
		$this->setPackage('SiderInc');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
		$this->addForeignKey('IDMACROCATEGORIA', 'Idmacrocategoria', 'INTEGER', 'MacroCategoria', 'ID', true, null, null);
		$this->addColumn('DESCRIZIONE', 'Descrizione', 'LONGVARCHAR', false, null, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
		$this->addRelation('Macrocategoria', 'Macrocategoria', RelationMap::MANY_TO_ONE, array('idMacroCategoria' => 'id', ), 'CASCADE', null);
		$this->addRelation('Inserzione', 'Inserzione', RelationMap::ONE_TO_MANY, array('id' => 'idCategoria', ), 'CASCADE', null, 'Inserziones');
	} // buildRelations()

} // CategoriaTableMap
