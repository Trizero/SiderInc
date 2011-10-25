<?php


/**
 * Base class that represents a query for the 'Utente' table.
 *
 * 
 *
 * @method     UtenteQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     UtenteQuery orderByUsername($order = Criteria::ASC) Order by the username column
 * @method     UtenteQuery orderByPassword($order = Criteria::ASC) Order by the password column
 * @method     UtenteQuery orderByLivello($order = Criteria::ASC) Order by the livello column
 *
 * @method     UtenteQuery groupById() Group by the id column
 * @method     UtenteQuery groupByUsername() Group by the username column
 * @method     UtenteQuery groupByPassword() Group by the password column
 * @method     UtenteQuery groupByLivello() Group by the livello column
 *
 * @method     UtenteQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     UtenteQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     UtenteQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     UtenteQuery leftJoinLivelloutente($relationAlias = null) Adds a LEFT JOIN clause to the query using the Livelloutente relation
 * @method     UtenteQuery rightJoinLivelloutente($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Livelloutente relation
 * @method     UtenteQuery innerJoinLivelloutente($relationAlias = null) Adds a INNER JOIN clause to the query using the Livelloutente relation
 *
 * @method     UtenteQuery leftJoinDettaglioutente($relationAlias = null) Adds a LEFT JOIN clause to the query using the Dettaglioutente relation
 * @method     UtenteQuery rightJoinDettaglioutente($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Dettaglioutente relation
 * @method     UtenteQuery innerJoinDettaglioutente($relationAlias = null) Adds a INNER JOIN clause to the query using the Dettaglioutente relation
 *
 * @method     Utente findOne(PropelPDO $con = null) Return the first Utente matching the query
 * @method     Utente findOneOrCreate(PropelPDO $con = null) Return the first Utente matching the query, or a new Utente object populated from the query conditions when no match is found
 *
 * @method     Utente findOneById(int $id) Return the first Utente filtered by the id column
 * @method     Utente findOneByUsername(string $username) Return the first Utente filtered by the username column
 * @method     Utente findOneByPassword(string $password) Return the first Utente filtered by the password column
 * @method     Utente findOneByLivello(int $livello) Return the first Utente filtered by the livello column
 *
 * @method     array findById(int $id) Return Utente objects filtered by the id column
 * @method     array findByUsername(string $username) Return Utente objects filtered by the username column
 * @method     array findByPassword(string $password) Return Utente objects filtered by the password column
 * @method     array findByLivello(int $livello) Return Utente objects filtered by the livello column
 *
 * @package    propel.generator.SiderInc.om
 */
abstract class BaseUtenteQuery extends ModelCriteria
{
	
	/**
	 * Initializes internal state of BaseUtenteQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'SiderInc', $modelName = 'Utente', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new UtenteQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    UtenteQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof UtenteQuery) {
			return $criteria;
		}
		$query = new UtenteQuery();
		if (null !== $modelAlias) {
			$query->setModelAlias($modelAlias);
		}
		if ($criteria instanceof Criteria) {
			$query->mergeWith($criteria);
		}
		return $query;
	}

	/**
	 * Find object by primary key.
	 * Propel uses the instance pool to skip the database if the object exists.
	 * Go fast if the query is untouched.
	 *
	 * <code>
	 * $obj  = $c->findPk(12, $con);
	 * </code>
	 *
	 * @param     mixed $key Primary key to use for the query
	 * @param     PropelPDO $con an optional connection object
	 *
	 * @return    Utente|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ($key === null) {
			return null;
		}
		if ((null !== ($obj = UtentePeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
			// the object is alredy in the instance pool
			return $obj;
		}
		if ($con === null) {
			$con = Propel::getConnection(UtentePeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}
		$this->basePreSelect($con);
		if ($this->formatter || $this->modelAlias || $this->with || $this->select
		 || $this->selectColumns || $this->asColumns || $this->selectModifiers
		 || $this->map || $this->having || $this->joins) {
			return $this->findPkComplex($key, $con);
		} else {
			return $this->findPkSimple($key, $con);
		}
	}

	/**
	 * Find object by primary key using raw SQL to go fast.
	 * Bypass doSelect() and the object formatter by using generated code.
	 *
	 * @param     mixed $key Primary key to use for the query
	 * @param     PropelPDO $con A connection object
	 *
	 * @return    Utente A model object, or null if the key is not found
	 */
	protected function findPkSimple($key, $con)
	{
		$sql = 'SELECT `ID`, `USERNAME`, `PASSWORD`, `LIVELLO` FROM `Utente` WHERE `ID` = :p0';
		try {
			$stmt = $con->prepare($sql);			
			$stmt->bindValue(':p0', $key, PDO::PARAM_INT);
			$stmt->execute();
		} catch (Exception $e) {
			Propel::log($e->getMessage(), Propel::LOG_ERR);
			throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), $e);
		}
		$obj = null;
		if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$obj = new Utente();
			$obj->hydrate($row);
			UtentePeer::addInstanceToPool($obj, (string) $row[0]);
		}
		$stmt->closeCursor();

		return $obj;
	}

	/**
	 * Find object by primary key.
	 *
	 * @param     mixed $key Primary key to use for the query
	 * @param     PropelPDO $con A connection object
	 *
	 * @return    Utente|array|mixed the result, formatted by the current formatter
	 */
	protected function findPkComplex($key, $con)
	{
		// As the query uses a PK condition, no limit(1) is necessary.
		$criteria = $this->isKeepQuery() ? clone $this : $this;
		$stmt = $criteria
			->filterByPrimaryKey($key)
			->doSelect($con);
		return $criteria->getFormatter()->init($criteria)->formatOne($stmt);
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
		if ($con === null) {
			$con = Propel::getConnection($this->getDbName(), Propel::CONNECTION_READ);
		}
		$this->basePreSelect($con);
		$criteria = $this->isKeepQuery() ? clone $this : $this;
		$stmt = $criteria
			->filterByPrimaryKeys($keys)
			->doSelect($con);
		return $criteria->getFormatter()->init($criteria)->format($stmt);
	}

	/**
	 * Filter the query by primary key
	 *
	 * @param     mixed $key Primary key to use for the query
	 *
	 * @return    UtenteQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(UtentePeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    UtenteQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(UtentePeer::ID, $keys, Criteria::IN);
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
	 * @return    UtenteQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(UtentePeer::ID, $id, $comparison);
	}

	/**
	 * Filter the query on the username column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByUsername('fooValue');   // WHERE username = 'fooValue'
	 * $query->filterByUsername('%fooValue%'); // WHERE username LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $username The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    UtenteQuery The current query, for fluid interface
	 */
	public function filterByUsername($username = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($username)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $username)) {
				$username = str_replace('*', '%', $username);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(UtentePeer::USERNAME, $username, $comparison);
	}

	/**
	 * Filter the query on the password column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByPassword('fooValue');   // WHERE password = 'fooValue'
	 * $query->filterByPassword('%fooValue%'); // WHERE password LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $password The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    UtenteQuery The current query, for fluid interface
	 */
	public function filterByPassword($password = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($password)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $password)) {
				$password = str_replace('*', '%', $password);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(UtentePeer::PASSWORD, $password, $comparison);
	}

	/**
	 * Filter the query on the livello column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByLivello(1234); // WHERE livello = 1234
	 * $query->filterByLivello(array(12, 34)); // WHERE livello IN (12, 34)
	 * $query->filterByLivello(array('min' => 12)); // WHERE livello > 12
	 * </code>
	 *
	 * @see       filterByLivelloutente()
	 *
	 * @param     mixed $livello The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    UtenteQuery The current query, for fluid interface
	 */
	public function filterByLivello($livello = null, $comparison = null)
	{
		if (is_array($livello)) {
			$useMinMax = false;
			if (isset($livello['min'])) {
				$this->addUsingAlias(UtentePeer::LIVELLO, $livello['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($livello['max'])) {
				$this->addUsingAlias(UtentePeer::LIVELLO, $livello['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(UtentePeer::LIVELLO, $livello, $comparison);
	}

	/**
	 * Filter the query by a related Livelloutente object
	 *
	 * @param     Livelloutente|PropelCollection $livelloutente The related object(s) to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    UtenteQuery The current query, for fluid interface
	 */
	public function filterByLivelloutente($livelloutente, $comparison = null)
	{
		if ($livelloutente instanceof Livelloutente) {
			return $this
				->addUsingAlias(UtentePeer::LIVELLO, $livelloutente->getId(), $comparison);
		} elseif ($livelloutente instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this
				->addUsingAlias(UtentePeer::LIVELLO, $livelloutente->toKeyValue('PrimaryKey', 'Id'), $comparison);
		} else {
			throw new PropelException('filterByLivelloutente() only accepts arguments of type Livelloutente or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the Livelloutente relation
	 *
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    UtenteQuery The current query, for fluid interface
	 */
	public function joinLivelloutente($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('Livelloutente');

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
			$this->addJoinObject($join, 'Livelloutente');
		}

		return $this;
	}

	/**
	 * Use the Livelloutente relation Livelloutente object
	 *
	 * @see       useQuery()
	 *
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    LivelloutenteQuery A secondary query class using the current class as primary query
	 */
	public function useLivelloutenteQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		return $this
			->joinLivelloutente($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'Livelloutente', 'LivelloutenteQuery');
	}

	/**
	 * Filter the query by a related Dettaglioutente object
	 *
	 * @param     Dettaglioutente $dettaglioutente  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    UtenteQuery The current query, for fluid interface
	 */
	public function filterByDettaglioutente($dettaglioutente, $comparison = null)
	{
		if ($dettaglioutente instanceof Dettaglioutente) {
			return $this
				->addUsingAlias(UtentePeer::ID, $dettaglioutente->getIdutente(), $comparison);
		} elseif ($dettaglioutente instanceof PropelCollection) {
			return $this
				->useDettaglioutenteQuery()
				->filterByPrimaryKeys($dettaglioutente->getPrimaryKeys())
				->endUse();
		} else {
			throw new PropelException('filterByDettaglioutente() only accepts arguments of type Dettaglioutente or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the Dettaglioutente relation
	 *
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    UtenteQuery The current query, for fluid interface
	 */
	public function joinDettaglioutente($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('Dettaglioutente');

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
			$this->addJoinObject($join, 'Dettaglioutente');
		}

		return $this;
	}

	/**
	 * Use the Dettaglioutente relation Dettaglioutente object
	 *
	 * @see       useQuery()
	 *
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    DettaglioutenteQuery A secondary query class using the current class as primary query
	 */
	public function useDettaglioutenteQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinDettaglioutente($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'Dettaglioutente', 'DettaglioutenteQuery');
	}

	/**
	 * Exclude object from result
	 *
	 * @param     Utente $utente Object to remove from the list of results
	 *
	 * @return    UtenteQuery The current query, for fluid interface
	 */
	public function prune($utente = null)
	{
		if ($utente) {
			$this->addUsingAlias(UtentePeer::ID, $utente->getId(), Criteria::NOT_EQUAL);
		}

		return $this;
	}

} // BaseUtenteQuery