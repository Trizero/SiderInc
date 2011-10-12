<?php


/**
 * Base class that represents a query for the 'Inserzione' table.
 *
 * 
 *
 * @method     InserzioneQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     InserzioneQuery orderByIdcategoria($order = Criteria::ASC) Order by the idCategoria column
 * @method     InserzioneQuery orderByData($order = Criteria::ASC) Order by the data column
 *
 * @method     InserzioneQuery groupById() Group by the id column
 * @method     InserzioneQuery groupByIdcategoria() Group by the idCategoria column
 * @method     InserzioneQuery groupByData() Group by the data column
 *
 * @method     InserzioneQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     InserzioneQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     InserzioneQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     InserzioneQuery leftJoinCategoria($relationAlias = null) Adds a LEFT JOIN clause to the query using the Categoria relation
 * @method     InserzioneQuery rightJoinCategoria($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Categoria relation
 * @method     InserzioneQuery innerJoinCategoria($relationAlias = null) Adds a INNER JOIN clause to the query using the Categoria relation
 *
 * @method     Inserzione findOne(PropelPDO $con = null) Return the first Inserzione matching the query
 * @method     Inserzione findOneOrCreate(PropelPDO $con = null) Return the first Inserzione matching the query, or a new Inserzione object populated from the query conditions when no match is found
 *
 * @method     Inserzione findOneById(int $id) Return the first Inserzione filtered by the id column
 * @method     Inserzione findOneByIdcategoria(int $idCategoria) Return the first Inserzione filtered by the idCategoria column
 * @method     Inserzione findOneByData(string $data) Return the first Inserzione filtered by the data column
 *
 * @method     array findById(int $id) Return Inserzione objects filtered by the id column
 * @method     array findByIdcategoria(int $idCategoria) Return Inserzione objects filtered by the idCategoria column
 * @method     array findByData(string $data) Return Inserzione objects filtered by the data column
 *
 * @package    propel.generator.SiderInc.om
 */
abstract class BaseInserzioneQuery extends ModelCriteria
{
	
	/**
	 * Initializes internal state of BaseInserzioneQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'SiderInc', $modelName = 'Inserzione', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new InserzioneQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    InserzioneQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof InserzioneQuery) {
			return $criteria;
		}
		$query = new InserzioneQuery();
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
	 * @return    Inserzione|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ($key === null) {
			return null;
		}
		if ((null !== ($obj = InserzionePeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
			// the object is alredy in the instance pool
			return $obj;
		}
		if ($con === null) {
			$con = Propel::getConnection(InserzionePeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
	 * @return    Inserzione A model object, or null if the key is not found
	 */
	protected function findPkSimple($key, $con)
	{
		$sql = 'SELECT `ID`, `IDCATEGORIA`, `DATA` FROM `Inserzione` WHERE `ID` = :p0';
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
			$obj = new Inserzione();
			$obj->hydrate($row);
			InserzionePeer::addInstanceToPool($obj, (string) $row[0]);
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
	 * @return    Inserzione|array|mixed the result, formatted by the current formatter
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
	 * @return    InserzioneQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(InserzionePeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    InserzioneQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(InserzionePeer::ID, $keys, Criteria::IN);
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
	 * @return    InserzioneQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(InserzionePeer::ID, $id, $comparison);
	}

	/**
	 * Filter the query on the idCategoria column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByIdcategoria(1234); // WHERE idCategoria = 1234
	 * $query->filterByIdcategoria(array(12, 34)); // WHERE idCategoria IN (12, 34)
	 * $query->filterByIdcategoria(array('min' => 12)); // WHERE idCategoria > 12
	 * </code>
	 *
	 * @see       filterByCategoria()
	 *
	 * @param     mixed $idcategoria The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    InserzioneQuery The current query, for fluid interface
	 */
	public function filterByIdcategoria($idcategoria = null, $comparison = null)
	{
		if (is_array($idcategoria)) {
			$useMinMax = false;
			if (isset($idcategoria['min'])) {
				$this->addUsingAlias(InserzionePeer::IDCATEGORIA, $idcategoria['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($idcategoria['max'])) {
				$this->addUsingAlias(InserzionePeer::IDCATEGORIA, $idcategoria['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(InserzionePeer::IDCATEGORIA, $idcategoria, $comparison);
	}

	/**
	 * Filter the query on the data column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByData('2011-03-14'); // WHERE data = '2011-03-14'
	 * $query->filterByData('now'); // WHERE data = '2011-03-14'
	 * $query->filterByData(array('max' => 'yesterday')); // WHERE data > '2011-03-13'
	 * </code>
	 *
	 * @param     mixed $data The value to use as filter.
	 *              Values can be integers (unix timestamps), DateTime objects, or strings.
	 *              Empty strings are treated as NULL.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    InserzioneQuery The current query, for fluid interface
	 */
	public function filterByData($data = null, $comparison = null)
	{
		if (is_array($data)) {
			$useMinMax = false;
			if (isset($data['min'])) {
				$this->addUsingAlias(InserzionePeer::DATA, $data['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($data['max'])) {
				$this->addUsingAlias(InserzionePeer::DATA, $data['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(InserzionePeer::DATA, $data, $comparison);
	}

	/**
	 * Filter the query by a related Categoria object
	 *
	 * @param     Categoria|PropelCollection $categoria The related object(s) to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    InserzioneQuery The current query, for fluid interface
	 */
	public function filterByCategoria($categoria, $comparison = null)
	{
		if ($categoria instanceof Categoria) {
			return $this
				->addUsingAlias(InserzionePeer::IDCATEGORIA, $categoria->getId(), $comparison);
		} elseif ($categoria instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this
				->addUsingAlias(InserzionePeer::IDCATEGORIA, $categoria->toKeyValue('PrimaryKey', 'Id'), $comparison);
		} else {
			throw new PropelException('filterByCategoria() only accepts arguments of type Categoria or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the Categoria relation
	 *
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    InserzioneQuery The current query, for fluid interface
	 */
	public function joinCategoria($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('Categoria');

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
			$this->addJoinObject($join, 'Categoria');
		}

		return $this;
	}

	/**
	 * Use the Categoria relation Categoria object
	 *
	 * @see       useQuery()
	 *
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    CategoriaQuery A secondary query class using the current class as primary query
	 */
	public function useCategoriaQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinCategoria($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'Categoria', 'CategoriaQuery');
	}

	/**
	 * Exclude object from result
	 *
	 * @param     Inserzione $inserzione Object to remove from the list of results
	 *
	 * @return    InserzioneQuery The current query, for fluid interface
	 */
	public function prune($inserzione = null)
	{
		if ($inserzione) {
			$this->addUsingAlias(InserzionePeer::ID, $inserzione->getId(), Criteria::NOT_EQUAL);
		}

		return $this;
	}

} // BaseInserzioneQuery