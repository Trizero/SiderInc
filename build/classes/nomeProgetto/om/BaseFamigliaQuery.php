<?php


/**
 * Base class that represents a query for the 'Famiglia' table.
 *
 * 
 *
 * @method     FamigliaQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     FamigliaQuery orderByDescrizione($order = Criteria::ASC) Order by the descrizione column
 *
 * @method     FamigliaQuery groupById() Group by the id column
 * @method     FamigliaQuery groupByDescrizione() Group by the descrizione column
 *
 * @method     FamigliaQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     FamigliaQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     FamigliaQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     FamigliaQuery leftJoinMacrocategoria($relationAlias = null) Adds a LEFT JOIN clause to the query using the Macrocategoria relation
 * @method     FamigliaQuery rightJoinMacrocategoria($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Macrocategoria relation
 * @method     FamigliaQuery innerJoinMacrocategoria($relationAlias = null) Adds a INNER JOIN clause to the query using the Macrocategoria relation
 *
 * @method     Famiglia findOne(PropelPDO $con = null) Return the first Famiglia matching the query
 * @method     Famiglia findOneOrCreate(PropelPDO $con = null) Return the first Famiglia matching the query, or a new Famiglia object populated from the query conditions when no match is found
 *
 * @method     Famiglia findOneById(int $id) Return the first Famiglia filtered by the id column
 * @method     Famiglia findOneByDescrizione(string $descrizione) Return the first Famiglia filtered by the descrizione column
 *
 * @method     array findById(int $id) Return Famiglia objects filtered by the id column
 * @method     array findByDescrizione(string $descrizione) Return Famiglia objects filtered by the descrizione column
 *
 * @package    propel.generator.nomeProgetto.om
 */
abstract class BaseFamigliaQuery extends ModelCriteria
{

	/**
	 * Initializes internal state of BaseFamigliaQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'SiderInc', $modelName = 'Famiglia', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new FamigliaQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    FamigliaQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof FamigliaQuery) {
			return $criteria;
		}
		$query = new FamigliaQuery();
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
	 * @return    Famiglia|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ((null !== ($obj = FamigliaPeer::getInstanceFromPool((string) $key))) && $this->getFormatter()->isObjectFormatter()) {
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
	 * @return    FamigliaQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(FamigliaPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    FamigliaQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(FamigliaPeer::ID, $keys, Criteria::IN);
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
	 * @return    FamigliaQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(FamigliaPeer::ID, $id, $comparison);
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
	 * @return    FamigliaQuery The current query, for fluid interface
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
		return $this->addUsingAlias(FamigliaPeer::DESCRIZIONE, $descrizione, $comparison);
	}

	/**
	 * Filter the query by a related Macrocategoria object
	 *
	 * @param     Macrocategoria $macrocategoria  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    FamigliaQuery The current query, for fluid interface
	 */
	public function filterByMacrocategoria($macrocategoria, $comparison = null)
	{
		if ($macrocategoria instanceof Macrocategoria) {
			return $this
				->addUsingAlias(FamigliaPeer::ID, $macrocategoria->getIdfamiglia(), $comparison);
		} elseif ($macrocategoria instanceof PropelCollection) {
			return $this
				->useMacrocategoriaQuery()
					->filterByPrimaryKeys($macrocategoria->getPrimaryKeys())
				->endUse();
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
	 * @return    FamigliaQuery The current query, for fluid interface
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
	 * Exclude object from result
	 *
	 * @param     Famiglia $famiglia Object to remove from the list of results
	 *
	 * @return    FamigliaQuery The current query, for fluid interface
	 */
	public function prune($famiglia = null)
	{
		if ($famiglia) {
			$this->addUsingAlias(FamigliaPeer::ID, $famiglia->getId(), Criteria::NOT_EQUAL);
	  }
	  
		return $this;
	}

} // BaseFamigliaQuery
