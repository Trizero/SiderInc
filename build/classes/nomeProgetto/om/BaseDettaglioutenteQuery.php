<?php


/**
 * Base class that represents a query for the 'DettaglioUtente' table.
 *
 * 
 *
 * @method     DettaglioutenteQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     DettaglioutenteQuery orderByIdutente($order = Criteria::ASC) Order by the idUtente column
 * @method     DettaglioutenteQuery orderByNome($order = Criteria::ASC) Order by the nome column
 * @method     DettaglioutenteQuery orderByCognome($order = Criteria::ASC) Order by the cognome column
 * @method     DettaglioutenteQuery orderByRagionesociale($order = Criteria::ASC) Order by the ragioneSociale column
 *
 * @method     DettaglioutenteQuery groupById() Group by the id column
 * @method     DettaglioutenteQuery groupByIdutente() Group by the idUtente column
 * @method     DettaglioutenteQuery groupByNome() Group by the nome column
 * @method     DettaglioutenteQuery groupByCognome() Group by the cognome column
 * @method     DettaglioutenteQuery groupByRagionesociale() Group by the ragioneSociale column
 *
 * @method     DettaglioutenteQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     DettaglioutenteQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     DettaglioutenteQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     DettaglioutenteQuery leftJoinUtente($relationAlias = null) Adds a LEFT JOIN clause to the query using the Utente relation
 * @method     DettaglioutenteQuery rightJoinUtente($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Utente relation
 * @method     DettaglioutenteQuery innerJoinUtente($relationAlias = null) Adds a INNER JOIN clause to the query using the Utente relation
 *
 * @method     Dettaglioutente findOne(PropelPDO $con = null) Return the first Dettaglioutente matching the query
 * @method     Dettaglioutente findOneOrCreate(PropelPDO $con = null) Return the first Dettaglioutente matching the query, or a new Dettaglioutente object populated from the query conditions when no match is found
 *
 * @method     Dettaglioutente findOneById(int $id) Return the first Dettaglioutente filtered by the id column
 * @method     Dettaglioutente findOneByIdutente(int $idUtente) Return the first Dettaglioutente filtered by the idUtente column
 * @method     Dettaglioutente findOneByNome(string $nome) Return the first Dettaglioutente filtered by the nome column
 * @method     Dettaglioutente findOneByCognome(string $cognome) Return the first Dettaglioutente filtered by the cognome column
 * @method     Dettaglioutente findOneByRagionesociale(string $ragioneSociale) Return the first Dettaglioutente filtered by the ragioneSociale column
 *
 * @method     array findById(int $id) Return Dettaglioutente objects filtered by the id column
 * @method     array findByIdutente(int $idUtente) Return Dettaglioutente objects filtered by the idUtente column
 * @method     array findByNome(string $nome) Return Dettaglioutente objects filtered by the nome column
 * @method     array findByCognome(string $cognome) Return Dettaglioutente objects filtered by the cognome column
 * @method     array findByRagionesociale(string $ragioneSociale) Return Dettaglioutente objects filtered by the ragioneSociale column
 *
 * @package    propel.generator.nomeProgetto.om
 */
abstract class BaseDettaglioutenteQuery extends ModelCriteria
{

	/**
	 * Initializes internal state of BaseDettaglioutenteQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'SiderInc', $modelName = 'Dettaglioutente', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new DettaglioutenteQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    DettaglioutenteQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof DettaglioutenteQuery) {
			return $criteria;
		}
		$query = new DettaglioutenteQuery();
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
	 * @return    Dettaglioutente|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ((null !== ($obj = DettaglioutentePeer::getInstanceFromPool((string) $key))) && $this->getFormatter()->isObjectFormatter()) {
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
	 * @return    DettaglioutenteQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(DettaglioutentePeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    DettaglioutenteQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(DettaglioutentePeer::ID, $keys, Criteria::IN);
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
	 * @return    DettaglioutenteQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(DettaglioutentePeer::ID, $id, $comparison);
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
	 * @return    DettaglioutenteQuery The current query, for fluid interface
	 */
	public function filterByIdutente($idutente = null, $comparison = null)
	{
		if (is_array($idutente)) {
			$useMinMax = false;
			if (isset($idutente['min'])) {
				$this->addUsingAlias(DettaglioutentePeer::IDUTENTE, $idutente['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($idutente['max'])) {
				$this->addUsingAlias(DettaglioutentePeer::IDUTENTE, $idutente['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(DettaglioutentePeer::IDUTENTE, $idutente, $comparison);
	}

	/**
	 * Filter the query on the nome column
	 * 
	 * Example usage:
	 * <code>
	 * $query->filterByNome('fooValue');   // WHERE nome = 'fooValue'
	 * $query->filterByNome('%fooValue%'); // WHERE nome LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $nome The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    DettaglioutenteQuery The current query, for fluid interface
	 */
	public function filterByNome($nome = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($nome)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $nome)) {
				$nome = str_replace('*', '%', $nome);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(DettaglioutentePeer::NOME, $nome, $comparison);
	}

	/**
	 * Filter the query on the cognome column
	 * 
	 * Example usage:
	 * <code>
	 * $query->filterByCognome('fooValue');   // WHERE cognome = 'fooValue'
	 * $query->filterByCognome('%fooValue%'); // WHERE cognome LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $cognome The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    DettaglioutenteQuery The current query, for fluid interface
	 */
	public function filterByCognome($cognome = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($cognome)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $cognome)) {
				$cognome = str_replace('*', '%', $cognome);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(DettaglioutentePeer::COGNOME, $cognome, $comparison);
	}

	/**
	 * Filter the query on the ragioneSociale column
	 * 
	 * Example usage:
	 * <code>
	 * $query->filterByRagionesociale('fooValue');   // WHERE ragioneSociale = 'fooValue'
	 * $query->filterByRagionesociale('%fooValue%'); // WHERE ragioneSociale LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $ragionesociale The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    DettaglioutenteQuery The current query, for fluid interface
	 */
	public function filterByRagionesociale($ragionesociale = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($ragionesociale)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $ragionesociale)) {
				$ragionesociale = str_replace('*', '%', $ragionesociale);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(DettaglioutentePeer::RAGIONESOCIALE, $ragionesociale, $comparison);
	}

	/**
	 * Filter the query by a related Utente object
	 *
	 * @param     Utente|PropelCollection $utente The related object(s) to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    DettaglioutenteQuery The current query, for fluid interface
	 */
	public function filterByUtente($utente, $comparison = null)
	{
		if ($utente instanceof Utente) {
			return $this
				->addUsingAlias(DettaglioutentePeer::IDUTENTE, $utente->getId(), $comparison);
		} elseif ($utente instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this
				->addUsingAlias(DettaglioutentePeer::IDUTENTE, $utente->toKeyValue('PrimaryKey', 'Id'), $comparison);
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
	 * @return    DettaglioutenteQuery The current query, for fluid interface
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
	 * @param     Dettaglioutente $dettaglioutente Object to remove from the list of results
	 *
	 * @return    DettaglioutenteQuery The current query, for fluid interface
	 */
	public function prune($dettaglioutente = null)
	{
		if ($dettaglioutente) {
			$this->addUsingAlias(DettaglioutentePeer::ID, $dettaglioutente->getId(), Criteria::NOT_EQUAL);
	  }
	  
		return $this;
	}

} // BaseDettaglioutenteQuery
