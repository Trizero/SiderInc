<?php


/**
 * Base class that represents a query for the 'Categoria' table.
 *
 * 
 *
 * @method     CategoriaQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     CategoriaQuery orderByIdmacrocategoria($order = Criteria::ASC) Order by the idMacroCategoria column
 * @method     CategoriaQuery orderByDescrizione($order = Criteria::ASC) Order by the descrizione column
 *
 * @method     CategoriaQuery groupById() Group by the id column
 * @method     CategoriaQuery groupByIdmacrocategoria() Group by the idMacroCategoria column
 * @method     CategoriaQuery groupByDescrizione() Group by the descrizione column
 *
 * @method     CategoriaQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     CategoriaQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     CategoriaQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     CategoriaQuery leftJoinMacrocategoria($relationAlias = null) Adds a LEFT JOIN clause to the query using the Macrocategoria relation
 * @method     CategoriaQuery rightJoinMacrocategoria($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Macrocategoria relation
 * @method     CategoriaQuery innerJoinMacrocategoria($relationAlias = null) Adds a INNER JOIN clause to the query using the Macrocategoria relation
 *
 * @method     CategoriaQuery leftJoinInserzione($relationAlias = null) Adds a LEFT JOIN clause to the query using the Inserzione relation
 * @method     CategoriaQuery rightJoinInserzione($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Inserzione relation
 * @method     CategoriaQuery innerJoinInserzione($relationAlias = null) Adds a INNER JOIN clause to the query using the Inserzione relation
 *
 * @method     Categoria findOne(PropelPDO $con = null) Return the first Categoria matching the query
 * @method     Categoria findOneOrCreate(PropelPDO $con = null) Return the first Categoria matching the query, or a new Categoria object populated from the query conditions when no match is found
 *
 * @method     Categoria findOneById(int $id) Return the first Categoria filtered by the id column
 * @method     Categoria findOneByIdmacrocategoria(int $idMacroCategoria) Return the first Categoria filtered by the idMacroCategoria column
 * @method     Categoria findOneByDescrizione(string $descrizione) Return the first Categoria filtered by the descrizione column
 *
 * @method     array findById(int $id) Return Categoria objects filtered by the id column
 * @method     array findByIdmacrocategoria(int $idMacroCategoria) Return Categoria objects filtered by the idMacroCategoria column
 * @method     array findByDescrizione(string $descrizione) Return Categoria objects filtered by the descrizione column
 *
 * @package    propel.generator.nomeProgetto.om
 */
abstract class BaseCategoriaQuery extends ModelCriteria
{

	/**
	 * Initializes internal state of BaseCategoriaQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'SiderInc', $modelName = 'Categoria', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new CategoriaQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    CategoriaQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof CategoriaQuery) {
			return $criteria;
		}
		$query = new CategoriaQuery();
		if (null !== $modelAlias) {
			$query->setModelAlias($modelAlias);
		}
		if ($criteria instanceof Criteria) {
			$query->mergeWith($criteria);
		}
		return $query;
	}

	/**
	 * Find object by primary key
	 * Use instance pooling to avoid a database query if the object exists
	 * <code>
	 * $obj  = $c->findPk(12, $con);
	 * </code>
	 * @param     mixed $key Primary key to use for the query
	 * @param     PropelPDO $con an optional connection object
	 *
	 * @return    Categoria|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ((null !== ($obj = CategoriaPeer::getInstanceFromPool((string) $key))) && $this->getFormatter()->isObjectFormatter()) {
			// the object is alredy in the instance pool
			return $obj;
		} else {
			// the object has not been requested yet, or the formatter is not an object formatter
			$criteria = $this->isKeepQuery() ? clone $this : $this;
			$stmt = $criteria
				->filterByPrimaryKey($key)
				->getSelectStatement($con);
			return $criteria->getFormatter()->init($criteria)->formatOne($stmt);
		}
	}

	/**
	 * Find objects by primary key
	 * <code>
	 * $objs = $c->findPks(array(12, 56, 832), $con);
	 * </code>
	 * @param     array $keys Primary keys to use for the query
	 * @param     PropelPDO $con an optional connection object
	 *
	 * @return    PropelObjectCollection|array|mixed the list of results, formatted by the current formatter
	 */
	public function findPks($keys, $con = null)
	{
		$criteria = $this->isKeepQuery() ? clone $this : $this;
		return $this
			->filterByPrimaryKeys($keys)
			->find($con);
	}

	/**
	 * Filter the query by primary key
	 *
	 * @param     mixed $key Primary key to use for the query
	 *
	 * @return    CategoriaQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(CategoriaPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    CategoriaQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(CategoriaPeer::ID, $keys, Criteria::IN);
	}

	/**
	 * Filter the query on the id column
	 * 
	 * Example usage:
	 * <code>
	 * $query->filterById(1234); // WHERE id = 1234
	 * $query->filterById(array(12, 34)); // WHERE id IN (12, 34)
	 * $query->filterById(array('min' => 12)); // WHERE id > 12
	 * </code>
	 *
	 * @param     mixed $id The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    CategoriaQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(CategoriaPeer::ID, $id, $comparison);
	}

	/**
	 * Filter the query on the idMacroCategoria column
	 * 
	 * Example usage:
	 * <code>
	 * $query->filterByIdmacrocategoria(1234); // WHERE idMacroCategoria = 1234
	 * $query->filterByIdmacrocategoria(array(12, 34)); // WHERE idMacroCategoria IN (12, 34)
	 * $query->filterByIdmacrocategoria(array('min' => 12)); // WHERE idMacroCategoria > 12
	 * </code>
	 *
	 * @see       filterByMacrocategoria()
	 *
	 * @param     mixed $idmacrocategoria The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    CategoriaQuery The current query, for fluid interface
	 */
	public function filterByIdmacrocategoria($idmacrocategoria = null, $comparison = null)
	{
		if (is_array($idmacrocategoria)) {
			$useMinMax = false;
			if (isset($idmacrocategoria['min'])) {
				$this->addUsingAlias(CategoriaPeer::IDMACROCATEGORIA, $idmacrocategoria['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($idmacrocategoria['max'])) {
				$this->addUsingAlias(CategoriaPeer::IDMACROCATEGORIA, $idmacrocategoria['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(CategoriaPeer::IDMACROCATEGORIA, $idmacrocategoria, $comparison);
	}

	/**
	 * Filter the query on the descrizione column
	 * 
	 * Example usage:
	 * <code>
	 * $query->filterByDescrizione('fooValue');   // WHERE descrizione = 'fooValue'
	 * $query->filterByDescrizione('%fooValue%'); // WHERE descrizione LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $descrizione The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    CategoriaQuery The current query, for fluid interface
	 */
	public function filterByDescrizione($descrizione = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($descrizione)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $descrizione)) {
				$descrizione = str_replace('*', '%', $descrizione);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(CategoriaPeer::DESCRIZIONE, $descrizione, $comparison);
	}

	/**
	 * Filter the query by a related Macrocategoria object
	 *
	 * @param     Macrocategoria|PropelCollection $macrocategoria The related object(s) to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    CategoriaQuery The current query, for fluid interface
	 */
	public function filterByMacrocategoria($macrocategoria, $comparison = null)
	{
		if ($macrocategoria instanceof Macrocategoria) {
			return $this
				->addUsingAlias(CategoriaPeer::IDMACROCATEGORIA, $macrocategoria->getId(), $comparison);
		} elseif ($macrocategoria instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this
				->addUsingAlias(CategoriaPeer::IDMACROCATEGORIA, $macrocategoria->toKeyValue('PrimaryKey', 'Id'), $comparison);
		} else {
			throw new PropelException('filterByMacrocategoria() only accepts arguments of type Macrocategoria or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the Macrocategoria relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    CategoriaQuery The current query, for fluid interface
	 */
	public function joinMacrocategoria($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('Macrocategoria');
		
		// create a ModelJoin object for this join
		$join = new ModelJoin();
		$join->setJoinType($joinType);
		$join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
		if ($previousJoin = $this->getPreviousJoin()) {
			$join->setPreviousJoin($previousJoin);
		}
		
		// add the ModelJoin to the current object
		if($relationAlias) {
			$this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
			$this->addJoinObject($join, $relationAlias);
		} else {
			$this->addJoinObject($join, 'Macrocategoria');
		}
		
		return $this;
	}

	/**
	 * Use the Macrocategoria relation Macrocategoria object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    MacrocategoriaQuery A secondary query class using the current class as primary query
	 */
	public function useMacrocategoriaQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinMacrocategoria($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'Macrocategoria', 'MacrocategoriaQuery');
	}

	/**
	 * Filter the query by a related Inserzione object
	 *
	 * @param     Inserzione $inserzione  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    CategoriaQuery The current query, for fluid interface
	 */
	public function filterByInserzione($inserzione, $comparison = null)
	{
		if ($inserzione instanceof Inserzione) {
			return $this
				->addUsingAlias(CategoriaPeer::ID, $inserzione->getIdcategoria(), $comparison);
		} elseif ($inserzione instanceof PropelCollection) {
			return $this
				->useInserzioneQuery()
					->filterByPrimaryKeys($inserzione->getPrimaryKeys())
				->endUse();
		} else {
			throw new PropelException('filterByInserzione() only accepts arguments of type Inserzione or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the Inserzione relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    CategoriaQuery The current query, for fluid interface
	 */
	public function joinInserzione($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('Inserzione');
		
		// create a ModelJoin object for this join
		$join = new ModelJoin();
		$join->setJoinType($joinType);
		$join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
		if ($previousJoin = $this->getPreviousJoin()) {
			$join->setPreviousJoin($previousJoin);
		}
		
		// add the ModelJoin to the current object
		if($relationAlias) {
			$this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
			$this->addJoinObject($join, $relationAlias);
		} else {
			$this->addJoinObject($join, 'Inserzione');
		}
		
		return $this;
	}

	/**
	 * Use the Inserzione relation Inserzione object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    InserzioneQuery A secondary query class using the current class as primary query
	 */
	public function useInserzioneQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinInserzione($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'Inserzione', 'InserzioneQuery');
	}

	/**
	 * Exclude object from result
	 *
	 * @param     Categoria $categoria Object to remove from the list of results
	 *
	 * @return    CategoriaQuery The current query, for fluid interface
	 */
	public function prune($categoria = null)
	{
		if ($categoria) {
			$this->addUsingAlias(CategoriaPeer::ID, $categoria->getId(), Criteria::NOT_EQUAL);
	  }
	  
		return $this;
	}

} // BaseCategoriaQuery
