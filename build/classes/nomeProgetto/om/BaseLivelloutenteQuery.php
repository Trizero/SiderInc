<?php


/**
 * Base class that represents a query for the 'LivelloUtente' table.
 *
 * 
 *
 * @method     LivelloutenteQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     LivelloutenteQuery orderByIdutente($order = Criteria::ASC) Order by the idUtente column
 * @method     LivelloutenteQuery orderByLivello($order = Criteria::ASC) Order by the livello column
 *
 * @method     LivelloutenteQuery groupById() Group by the id column
 * @method     LivelloutenteQuery groupByIdutente() Group by the idUtente column
 * @method     LivelloutenteQuery groupByLivello() Group by the livello column
 *
 * @method     LivelloutenteQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     LivelloutenteQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     LivelloutenteQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     LivelloutenteQuery leftJoinUtente($relationAlias = null) Adds a LEFT JOIN clause to the query using the Utente relation
 * @method     LivelloutenteQuery rightJoinUtente($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Utente relation
 * @method     LivelloutenteQuery innerJoinUtente($relationAlias = null) Adds a INNER JOIN clause to the query using the Utente relation
 *
 * @method     Livelloutente findOne(PropelPDO $con = null) Return the first Livelloutente matching the query
 * @method     Livelloutente findOneOrCreate(PropelPDO $con = null) Return the first Livelloutente matching the query, or a new Livelloutente object populated from the query conditions when no match is found
 *
 * @method     Livelloutente findOneById(int $id) Return the first Livelloutente filtered by the id column
 * @method     Livelloutente findOneByIdutente(int $idUtente) Return the first Livelloutente filtered by the idUtente column
 * @method     Livelloutente findOneByLivello(string $livello) Return the first Livelloutente filtered by the livello column
 *
 * @method     array findById(int $id) Return Livelloutente objects filtered by the id column
 * @method     array findByIdutente(int $idUtente) Return Livelloutente objects filtered by the idUtente column
 * @method     array findByLivello(string $livello) Return Livelloutente objects filtered by the livello column
 *
 * @package    propel.generator.nomeProgetto.om
 */
abstract class BaseLivelloutenteQuery extends ModelCriteria
{

	/**
	 * Initializes internal state of BaseLivelloutenteQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'SiderInc', $modelName = 'Livelloutente', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new LivelloutenteQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    LivelloutenteQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof LivelloutenteQuery) {
			return $criteria;
		}
		$query = new LivelloutenteQuery();
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
	 * @return    Livelloutente|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ((null !== ($obj = LivelloutentePeer::getInstanceFromPool((string) $key))) && $this->getFormatter()->isObjectFormatter()) {
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
	 * @return    LivelloutenteQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(LivelloutentePeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    LivelloutenteQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(LivelloutentePeer::ID, $keys, Criteria::IN);
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
	 * @return    LivelloutenteQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(LivelloutentePeer::ID, $id, $comparison);
	}

	/**
	 * Filter the query on the idUtente column
	 * 
	 * Example usage:
	 * <code>
	 * $query->filterByIdutente(1234); // WHERE idUtente = 1234
	 * $query->filterByIdutente(array(12, 34)); // WHERE idUtente IN (12, 34)
	 * $query->filterByIdutente(array('min' => 12)); // WHERE idUtente > 12
	 * </code>
	 *
	 * @see       filterByUtente()
	 *
	 * @param     mixed $idutente The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    LivelloutenteQuery The current query, for fluid interface
	 */
	public function filterByIdutente($idutente = null, $comparison = null)
	{
		if (is_array($idutente)) {
			$useMinMax = false;
			if (isset($idutente['min'])) {
				$this->addUsingAlias(LivelloutentePeer::IDUTENTE, $idutente['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($idutente['max'])) {
				$this->addUsingAlias(LivelloutentePeer::IDUTENTE, $idutente['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(LivelloutentePeer::IDUTENTE, $idutente, $comparison);
	}

	/**
	 * Filter the query on the livello column
	 * 
	 * Example usage:
	 * <code>
	 * $query->filterByLivello('fooValue');   // WHERE livello = 'fooValue'
	 * $query->filterByLivello('%fooValue%'); // WHERE livello LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $livello The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    LivelloutenteQuery The current query, for fluid interface
	 */
	public function filterByLivello($livello = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($livello)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $livello)) {
				$livello = str_replace('*', '%', $livello);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(LivelloutentePeer::LIVELLO, $livello, $comparison);
	}

	/**
	 * Filter the query by a related Utente object
	 *
	 * @param     Utente|PropelCollection $utente The related object(s) to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    LivelloutenteQuery The current query, for fluid interface
	 */
	public function filterByUtente($utente, $comparison = null)
	{
		if ($utente instanceof Utente) {
			return $this
				->addUsingAlias(LivelloutentePeer::IDUTENTE, $utente->getId(), $comparison);
		} elseif ($utente instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this
				->addUsingAlias(LivelloutentePeer::IDUTENTE, $utente->toKeyValue('PrimaryKey', 'Id'), $comparison);
		} else {
			throw new PropelException('filterByUtente() only accepts arguments of type Utente or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the Utente relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    LivelloutenteQuery The current query, for fluid interface
	 */
	public function joinUtente($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('Utente');
		
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
			$this->addJoinObject($join, 'Utente');
		}
		
		return $this;
	}

	/**
	 * Use the Utente relation Utente object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    UtenteQuery A secondary query class using the current class as primary query
	 */
	public function useUtenteQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinUtente($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'Utente', 'UtenteQuery');
	}

	/**
	 * Exclude object from result
	 *
	 * @param     Livelloutente $livelloutente Object to remove from the list of results
	 *
	 * @return    LivelloutenteQuery The current query, for fluid interface
	 */
	public function prune($livelloutente = null)
	{
		if ($livelloutente) {
			$this->addUsingAlias(LivelloutentePeer::ID, $livelloutente->getId(), Criteria::NOT_EQUAL);
	  }
	  
		return $this;
	}

} // BaseLivelloutenteQuery
