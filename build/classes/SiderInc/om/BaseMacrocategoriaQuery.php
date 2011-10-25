<?php


/**
 * Base class that represents a query for the 'MacroCategoria' table.
 *
 * 
 *
 * @method     MacrocategoriaQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     MacrocategoriaQuery orderByIdfamiglia($order = Criteria::ASC) Order by the idFamiglia column
 * @method     MacrocategoriaQuery orderByDescrizione($order = Criteria::ASC) Order by the descrizione column
 *
 * @method     MacrocategoriaQuery groupById() Group by the id column
 * @method     MacrocategoriaQuery groupByIdfamiglia() Group by the idFamiglia column
 * @method     MacrocategoriaQuery groupByDescrizione() Group by the descrizione column
 *
 * @method     MacrocategoriaQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     MacrocategoriaQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     MacrocategoriaQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     MacrocategoriaQuery leftJoinFamiglia($relationAlias = null) Adds a LEFT JOIN clause to the query using the Famiglia relation
 * @method     MacrocategoriaQuery rightJoinFamiglia($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Famiglia relation
 * @method     MacrocategoriaQuery innerJoinFamiglia($relationAlias = null) Adds a INNER JOIN clause to the query using the Famiglia relation
 *
 * @method     MacrocategoriaQuery leftJoinCategoria($relationAlias = null) Adds a LEFT JOIN clause to the query using the Categoria relation
 * @method     MacrocategoriaQuery rightJoinCategoria($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Categoria relation
 * @method     MacrocategoriaQuery innerJoinCategoria($relationAlias = null) Adds a INNER JOIN clause to the query using the Categoria relation
 *
 * @method     Macrocategoria findOne(PropelPDO $con = null) Return the first Macrocategoria matching the query
 * @method     Macrocategoria findOneOrCreate(PropelPDO $con = null) Return the first Macrocategoria matching the query, or a new Macrocategoria object populated from the query conditions when no match is found
 *
 * @method     Macrocategoria findOneById(int $id) Return the first Macrocategoria filtered by the id column
 * @method     Macrocategoria findOneByIdfamiglia(int $idFamiglia) Return the first Macrocategoria filtered by the idFamiglia column
 * @method     Macrocategoria findOneByDescrizione(string $descrizione) Return the first Macrocategoria filtered by the descrizione column
 *
 * @method     array findById(int $id) Return Macrocategoria objects filtered by the id column
 * @method     array findByIdfamiglia(int $idFamiglia) Return Macrocategoria objects filtered by the idFamiglia column
 * @method     array findByDescrizione(string $descrizione) Return Macrocategoria objects filtered by the descrizione column
 *
 * @package    propel.generator.SiderInc.om
 */
abstract class BaseMacrocategoriaQuery extends ModelCriteria
{
	
	/**
	 * Initializes internal state of BaseMacrocategoriaQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'SiderInc', $modelName = 'Macrocategoria', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new MacrocategoriaQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    MacrocategoriaQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof MacrocategoriaQuery) {
			return $criteria;
		}
		$query = new MacrocategoriaQuery();
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
	 * @return    Macrocategoria|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ($key === null) {
			return null;
		}
		if ((null !== ($obj = MacrocategoriaPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
			// the object is alredy in the instance pool
			return $obj;
		}
		if ($con === null) {
			$con = Propel::getConnection(MacrocategoriaPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
	 * @return    Macrocategoria A model object, or null if the key is not found
	 */
	protected function findPkSimple($key, $con)
	{
		$sql = 'SELECT `ID`, `IDFAMIGLIA`, `DESCRIZIONE` FROM `MacroCategoria` WHERE `ID` = :p0';
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
			$obj = new Macrocategoria();
			$obj->hydrate($row);
			MacrocategoriaPeer::addInstanceToPool($obj, (string) $row[0]);
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
	 * @return    Macrocategoria|array|mixed the result, formatted by the current formatter
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
	 * @return    MacrocategoriaQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(MacrocategoriaPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    MacrocategoriaQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(MacrocategoriaPeer::ID, $keys, Criteria::IN);
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
	 * @return    MacrocategoriaQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(MacrocategoriaPeer::ID, $id, $comparison);
	}

	/**
	 * Filter the query on the idFamiglia column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByIdfamiglia(1234); // WHERE idFamiglia = 1234
	 * $query->filterByIdfamiglia(array(12, 34)); // WHERE idFamiglia IN (12, 34)
	 * $query->filterByIdfamiglia(array('min' => 12)); // WHERE idFamiglia > 12
	 * </code>
	 *
	 * @see       filterByFamiglia()
	 *
	 * @param     mixed $idfamiglia The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    MacrocategoriaQuery The current query, for fluid interface
	 */
	public function filterByIdfamiglia($idfamiglia = null, $comparison = null)
	{
		if (is_array($idfamiglia)) {
			$useMinMax = false;
			if (isset($idfamiglia['min'])) {
				$this->addUsingAlias(MacrocategoriaPeer::IDFAMIGLIA, $idfamiglia['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($idfamiglia['max'])) {
				$this->addUsingAlias(MacrocategoriaPeer::IDFAMIGLIA, $idfamiglia['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(MacrocategoriaPeer::IDFAMIGLIA, $idfamiglia, $comparison);
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
	 * @return    MacrocategoriaQuery The current query, for fluid interface
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
		return $this->addUsingAlias(MacrocategoriaPeer::DESCRIZIONE, $descrizione, $comparison);
	}

	/**
	 * Filter the query by a related Famiglia object
	 *
	 * @param     Famiglia|PropelCollection $famiglia The related object(s) to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    MacrocategoriaQuery The current query, for fluid interface
	 */
	public function filterByFamiglia($famiglia, $comparison = null)
	{
		if ($famiglia instanceof Famiglia) {
			return $this
				->addUsingAlias(MacrocategoriaPeer::IDFAMIGLIA, $famiglia->getId(), $comparison);
		} elseif ($famiglia instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this
				->addUsingAlias(MacrocategoriaPeer::IDFAMIGLIA, $famiglia->toKeyValue('PrimaryKey', 'Id'), $comparison);
		} else {
			throw new PropelException('filterByFamiglia() only accepts arguments of type Famiglia or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the Famiglia relation
	 *
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    MacrocategoriaQuery The current query, for fluid interface
	 */
	public function joinFamiglia($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('Famiglia');

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
			$this->addJoinObject($join, 'Famiglia');
		}

		return $this;
	}

	/**
	 * Use the Famiglia relation Famiglia object
	 *
	 * @see       useQuery()
	 *
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    FamigliaQuery A secondary query class using the current class as primary query
	 */
	public function useFamigliaQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinFamiglia($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'Famiglia', 'FamigliaQuery');
	}

	/**
	 * Filter the query by a related Categoria object
	 *
	 * @param     Categoria $categoria  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    MacrocategoriaQuery The current query, for fluid interface
	 */
	public function filterByCategoria($categoria, $comparison = null)
	{
		if ($categoria instanceof Categoria) {
			return $this
				->addUsingAlias(MacrocategoriaPeer::ID, $categoria->getIdmacrocategoria(), $comparison);
		} elseif ($categoria instanceof PropelCollection) {
			return $this
				->useCategoriaQuery()
				->filterByPrimaryKeys($categoria->getPrimaryKeys())
				->endUse();
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
	 * @return    MacrocategoriaQuery The current query, for fluid interface
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
	 * @param     Macrocategoria $macrocategoria Object to remove from the list of results
	 *
	 * @return    MacrocategoriaQuery The current query, for fluid interface
	 */
	public function prune($macrocategoria = null)
	{
		if ($macrocategoria) {
			$this->addUsingAlias(MacrocategoriaPeer::ID, $macrocategoria->getId(), Criteria::NOT_EQUAL);
		}

		return $this;
	}

} // BaseMacrocategoriaQuery