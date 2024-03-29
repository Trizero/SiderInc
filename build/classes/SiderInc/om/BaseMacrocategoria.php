<?php


/**
 * Base class that represents a row from the 'MacroCategoria' table.
 *
 * 
 *
 * @package    propel.generator.SiderInc.om
 */
abstract class BaseMacrocategoria extends BaseObject  implements Persistent
{

	/**
	 * Peer class name
	 */
	const PEER = 'MacrocategoriaPeer';

	/**
	 * The Peer class.
	 * Instance provides a convenient way of calling static methods on a class
	 * that calling code may not be able to identify.
	 * @var        MacrocategoriaPeer
	 */
	protected static $peer;

	/**
	 * The value for the id field.
	 * @var        int
	 */
	protected $id;

	/**
	 * The value for the idfamiglia field.
	 * @var        int
	 */
	protected $idfamiglia;

	/**
	 * The value for the descrizione field.
	 * @var        string
	 */
	protected $descrizione;

	/**
	 * @var        Famiglia
	 */
	protected $aFamiglia;

	/**
	 * @var        array Categoria[] Collection to store aggregation of Categoria objects.
	 */
	protected $collCategorias;

	/**
	 * Flag to prevent endless save loop, if this object is referenced
	 * by another object which falls in this transaction.
	 * @var        boolean
	 */
	protected $alreadyInSave = false;

	/**
	 * Flag to prevent endless validation loop, if this object is referenced
	 * by another object which falls in this transaction.
	 * @var        boolean
	 */
	protected $alreadyInValidation = false;

	/**
	 * An array of objects scheduled for deletion.
	 * @var		array
	 */
	protected $categoriasScheduledForDeletion = null;

	/**
	 * Get the [id] column value.
	 * 
	 * @return     int
	 */
	public function getId()
	{
		return $this->id;
	}

	/**
	 * Get the [idfamiglia] column value.
	 * 
	 * @return     int
	 */
	public function getIdfamiglia()
	{
		return $this->idfamiglia;
	}

	/**
	 * Get the [descrizione] column value.
	 * 
	 * @return     string
	 */
	public function getDescrizione()
	{
		return $this->descrizione;
	}

	/**
	 * Set the value of [id] column.
	 * 
	 * @param      int $v new value
	 * @return     Macrocategoria The current object (for fluent API support)
	 */
	public function setId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = MacrocategoriaPeer::ID;
		}

		return $this;
	} // setId()

	/**
	 * Set the value of [idfamiglia] column.
	 * 
	 * @param      int $v new value
	 * @return     Macrocategoria The current object (for fluent API support)
	 */
	public function setIdfamiglia($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->idfamiglia !== $v) {
			$this->idfamiglia = $v;
			$this->modifiedColumns[] = MacrocategoriaPeer::IDFAMIGLIA;
		}

		if ($this->aFamiglia !== null && $this->aFamiglia->getId() !== $v) {
			$this->aFamiglia = null;
		}

		return $this;
	} // setIdfamiglia()

	/**
	 * Set the value of [descrizione] column.
	 * 
	 * @param      string $v new value
	 * @return     Macrocategoria The current object (for fluent API support)
	 */
	public function setDescrizione($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->descrizione !== $v) {
			$this->descrizione = $v;
			$this->modifiedColumns[] = MacrocategoriaPeer::DESCRIZIONE;
		}

		return $this;
	} // setDescrizione()

	/**
	 * Indicates whether the columns in this object are only set to default values.
	 *
	 * This method can be used in conjunction with isModified() to indicate whether an object is both
	 * modified _and_ has some values set which are non-default.
	 *
	 * @return     boolean Whether the columns in this object are only been set with default values.
	 */
	public function hasOnlyDefaultValues()
	{
		// otherwise, everything was equal, so return TRUE
		return true;
	} // hasOnlyDefaultValues()

	/**
	 * Hydrates (populates) the object variables with values from the database resultset.
	 *
	 * An offset (0-based "start column") is specified so that objects can be hydrated
	 * with a subset of the columns in the resultset rows.  This is needed, for example,
	 * for results of JOIN queries where the resultset row includes columns from two or
	 * more tables.
	 *
	 * @param      array $row The row returned by PDOStatement->fetch(PDO::FETCH_NUM)
	 * @param      int $startcol 0-based offset column which indicates which restultset column to start with.
	 * @param      boolean $rehydrate Whether this object is being re-hydrated from the database.
	 * @return     int next starting column
	 * @throws     PropelException  - Any caught Exception will be rewrapped as a PropelException.
	 */
	public function hydrate($row, $startcol = 0, $rehydrate = false)
	{
		try {

			$this->id = ($row[$startcol + 0] !== null) ? (int) $row[$startcol + 0] : null;
			$this->idfamiglia = ($row[$startcol + 1] !== null) ? (int) $row[$startcol + 1] : null;
			$this->descrizione = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
			$this->resetModified();

			$this->setNew(false);

			if ($rehydrate) {
				$this->ensureConsistency();
			}

			return $startcol + 3; // 3 = MacrocategoriaPeer::NUM_HYDRATE_COLUMNS.

		} catch (Exception $e) {
			throw new PropelException("Error populating Macrocategoria object", $e);
		}
	}

	/**
	 * Checks and repairs the internal consistency of the object.
	 *
	 * This method is executed after an already-instantiated object is re-hydrated
	 * from the database.  It exists to check any foreign keys to make sure that
	 * the objects related to the current object are correct based on foreign key.
	 *
	 * You can override this method in the stub class, but you should always invoke
	 * the base method from the overridden method (i.e. parent::ensureConsistency()),
	 * in case your model changes.
	 *
	 * @throws     PropelException
	 */
	public function ensureConsistency()
	{

		if ($this->aFamiglia !== null && $this->idfamiglia !== $this->aFamiglia->getId()) {
			$this->aFamiglia = null;
		}
	} // ensureConsistency

	/**
	 * Reloads this object from datastore based on primary key and (optionally) resets all associated objects.
	 *
	 * This will only work if the object has been saved and has a valid primary key set.
	 *
	 * @param      boolean $deep (optional) Whether to also de-associated any related objects.
	 * @param      PropelPDO $con (optional) The PropelPDO connection to use.
	 * @return     void
	 * @throws     PropelException - if this object is deleted, unsaved or doesn't have pk match in db
	 */
	public function reload($deep = false, PropelPDO $con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("Cannot reload a deleted object.");
		}

		if ($this->isNew()) {
			throw new PropelException("Cannot reload an unsaved object.");
		}

		if ($con === null) {
			$con = Propel::getConnection(MacrocategoriaPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		// We don't need to alter the object instance pool; we're just modifying this instance
		// already in the pool.

		$stmt = MacrocategoriaPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
		$row = $stmt->fetch(PDO::FETCH_NUM);
		$stmt->closeCursor();
		if (!$row) {
			throw new PropelException('Cannot find matching row in the database to reload object values.');
		}
		$this->hydrate($row, 0, true); // rehydrate

		if ($deep) {  // also de-associate any related objects?

			$this->aFamiglia = null;
			$this->collCategorias = null;

		} // if (deep)
	}

	/**
	 * Removes this object from datastore and sets delete attribute.
	 *
	 * @param      PropelPDO $con
	 * @return     void
	 * @throws     PropelException
	 * @see        BaseObject::setDeleted()
	 * @see        BaseObject::isDeleted()
	 */
	public function delete(PropelPDO $con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(MacrocategoriaPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		$con->beginTransaction();
		try {
			$deleteQuery = MacrocategoriaQuery::create()
				->filterByPrimaryKey($this->getPrimaryKey());
			$ret = $this->preDelete($con);
			if ($ret) {
				$deleteQuery->delete($con);
				$this->postDelete($con);
				$con->commit();
				$this->setDeleted(true);
			} else {
				$con->commit();
			}
		} catch (Exception $e) {
			$con->rollBack();
			throw $e;
		}
	}

	/**
	 * Persists this object to the database.
	 *
	 * If the object is new, it inserts it; otherwise an update is performed.
	 * All modified related objects will also be persisted in the doSave()
	 * method.  This method wraps all precipitate database operations in a
	 * single transaction.
	 *
	 * @param      PropelPDO $con
	 * @return     int The number of rows affected by this insert/update and any referring fk objects' save() operations.
	 * @throws     PropelException
	 * @see        doSave()
	 */
	public function save(PropelPDO $con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(MacrocategoriaPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		$con->beginTransaction();
		$isInsert = $this->isNew();
		try {
			$ret = $this->preSave($con);
			if ($isInsert) {
				$ret = $ret && $this->preInsert($con);
			} else {
				$ret = $ret && $this->preUpdate($con);
			}
			if ($ret) {
				$affectedRows = $this->doSave($con);
				if ($isInsert) {
					$this->postInsert($con);
				} else {
					$this->postUpdate($con);
				}
				$this->postSave($con);
				MacrocategoriaPeer::addInstanceToPool($this);
			} else {
				$affectedRows = 0;
			}
			$con->commit();
			return $affectedRows;
		} catch (Exception $e) {
			$con->rollBack();
			throw $e;
		}
	}

	/**
	 * Performs the work of inserting or updating the row in the database.
	 *
	 * If the object is new, it inserts it; otherwise an update is performed.
	 * All related objects are also updated in this method.
	 *
	 * @param      PropelPDO $con
	 * @return     int The number of rows affected by this insert/update and any referring fk objects' save() operations.
	 * @throws     PropelException
	 * @see        save()
	 */
	protected function doSave(PropelPDO $con)
	{
		$affectedRows = 0; // initialize var to track total num of affected rows
		if (!$this->alreadyInSave) {
			$this->alreadyInSave = true;

			// We call the save method on the following object(s) if they
			// were passed to this object by their coresponding set
			// method.  This object relates to these object(s) by a
			// foreign key reference.

			if ($this->aFamiglia !== null) {
				if ($this->aFamiglia->isModified() || $this->aFamiglia->isNew()) {
					$affectedRows += $this->aFamiglia->save($con);
				}
				$this->setFamiglia($this->aFamiglia);
			}

			if ($this->isNew() || $this->isModified()) {
				// persist changes
				if ($this->isNew()) {
					$this->doInsert($con);
				} else {
					$this->doUpdate($con);
				}
				$affectedRows += 1;
				$this->resetModified();
			}

			if ($this->categoriasScheduledForDeletion !== null) {
				if (!$this->categoriasScheduledForDeletion->isEmpty()) {
					CategoriaQuery::create()
						->filterByPrimaryKeys($this->categoriasScheduledForDeletion->getPrimaryKeys(false))
						->delete($con);
					$this->categoriasScheduledForDeletion = null;
				}
			}

			if ($this->collCategorias !== null) {
				foreach ($this->collCategorias as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			$this->alreadyInSave = false;

		}
		return $affectedRows;
	} // doSave()

	/**
	 * Insert the row in the database.
	 *
	 * @param      PropelPDO $con
	 *
	 * @throws     PropelException
	 * @see        doSave()
	 */
	protected function doInsert(PropelPDO $con)
	{
		$modifiedColumns = array();
		$index = 0;

		$this->modifiedColumns[] = MacrocategoriaPeer::ID;
		if (null !== $this->id) {
			throw new PropelException('Cannot insert a value for auto-increment primary key (' . MacrocategoriaPeer::ID . ')');
		}

		 // check the columns in natural order for more readable SQL queries
		if ($this->isColumnModified(MacrocategoriaPeer::ID)) {
			$modifiedColumns[':p' . $index++]  = '`ID`';
		}
		if ($this->isColumnModified(MacrocategoriaPeer::IDFAMIGLIA)) {
			$modifiedColumns[':p' . $index++]  = '`IDFAMIGLIA`';
		}
		if ($this->isColumnModified(MacrocategoriaPeer::DESCRIZIONE)) {
			$modifiedColumns[':p' . $index++]  = '`DESCRIZIONE`';
		}

		$sql = sprintf(
			'INSERT INTO `MacroCategoria` (%s) VALUES (%s)',
			implode(', ', $modifiedColumns),
			implode(', ', array_keys($modifiedColumns))
		);

		try {
			$stmt = $con->prepare($sql);
			foreach ($modifiedColumns as $identifier => $columnName) {
				switch ($columnName) {
					case '`ID`':						
						$stmt->bindValue($identifier, $this->id, PDO::PARAM_INT);
						break;
					case '`IDFAMIGLIA`':						
						$stmt->bindValue($identifier, $this->idfamiglia, PDO::PARAM_INT);
						break;
					case '`DESCRIZIONE`':						
						$stmt->bindValue($identifier, $this->descrizione, PDO::PARAM_STR);
						break;
				}
			}
			$stmt->execute();
		} catch (Exception $e) {
			Propel::log($e->getMessage(), Propel::LOG_ERR);
			throw new PropelException(sprintf('Unable to execute INSERT statement [%s]', $sql), $e);
		}

		try {
			$pk = $con->lastInsertId();
		} catch (Exception $e) {
			throw new PropelException('Unable to get autoincrement id.', $e);
		}
		$this->setId($pk);

		$this->setNew(false);
	}

	/**
	 * Update the row in the database.
	 *
	 * @param      PropelPDO $con
	 *
	 * @see        doSave()
	 */
	protected function doUpdate(PropelPDO $con)
	{
		$selectCriteria = $this->buildPkeyCriteria();
		$valuesCriteria = $this->buildCriteria();
		BasePeer::doUpdate($selectCriteria, $valuesCriteria, $con);
	}

	/**
	 * Array of ValidationFailed objects.
	 * @var        array ValidationFailed[]
	 */
	protected $validationFailures = array();

	/**
	 * Gets any ValidationFailed objects that resulted from last call to validate().
	 *
	 *
	 * @return     array ValidationFailed[]
	 * @see        validate()
	 */
	public function getValidationFailures()
	{
		return $this->validationFailures;
	}

	/**
	 * Validates the objects modified field values and all objects related to this table.
	 *
	 * If $columns is either a column name or an array of column names
	 * only those columns are validated.
	 *
	 * @param      mixed $columns Column name or an array of column names.
	 * @return     boolean Whether all columns pass validation.
	 * @see        doValidate()
	 * @see        getValidationFailures()
	 */
	public function validate($columns = null)
	{
		$res = $this->doValidate($columns);
		if ($res === true) {
			$this->validationFailures = array();
			return true;
		} else {
			$this->validationFailures = $res;
			return false;
		}
	}

	/**
	 * This function performs the validation work for complex object models.
	 *
	 * In addition to checking the current object, all related objects will
	 * also be validated.  If all pass then <code>true</code> is returned; otherwise
	 * an aggreagated array of ValidationFailed objects will be returned.
	 *
	 * @param      array $columns Array of column names to validate.
	 * @return     mixed <code>true</code> if all validations pass; array of <code>ValidationFailed</code> objets otherwise.
	 */
	protected function doValidate($columns = null)
	{
		if (!$this->alreadyInValidation) {
			$this->alreadyInValidation = true;
			$retval = null;

			$failureMap = array();


			// We call the validate method on the following object(s) if they
			// were passed to this object by their coresponding set
			// method.  This object relates to these object(s) by a
			// foreign key reference.

			if ($this->aFamiglia !== null) {
				if (!$this->aFamiglia->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aFamiglia->getValidationFailures());
				}
			}


			if (($retval = MacrocategoriaPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collCategorias !== null) {
					foreach ($this->collCategorias as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}


			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	/**
	 * Retrieves a field from the object by name passed in as a string.
	 *
	 * @param      string $name name
	 * @param      string $type The type of fieldname the $name is of:
	 *                     one of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME
	 *                     BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM
	 * @return     mixed Value of field.
	 */
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = MacrocategoriaPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		$field = $this->getByPosition($pos);
		return $field;
	}

	/**
	 * Retrieves a field from the object by Position as specified in the xml schema.
	 * Zero-based.
	 *
	 * @param      int $pos position in xml schema
	 * @return     mixed Value of field at $pos
	 */
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getIdfamiglia();
				break;
			case 2:
				return $this->getDescrizione();
				break;
			default:
				return null;
				break;
		} // switch()
	}

	/**
	 * Exports the object as an array.
	 *
	 * You can specify the key type of the array by passing one of the class
	 * type constants.
	 *
	 * @param     string  $keyType (optional) One of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME,
	 *                    BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM.
	 *                    Defaults to BasePeer::TYPE_PHPNAME.
	 * @param     boolean $includeLazyLoadColumns (optional) Whether to include lazy loaded columns. Defaults to TRUE.
	 * @param     array $alreadyDumpedObjects List of objects to skip to avoid recursion
	 * @param     boolean $includeForeignObjects (optional) Whether to include hydrated related objects. Default to FALSE.
	 *
	 * @return    array an associative array containing the field names (as keys) and field values
	 */
	public function toArray($keyType = BasePeer::TYPE_PHPNAME, $includeLazyLoadColumns = true, $alreadyDumpedObjects = array(), $includeForeignObjects = false)
	{
		if (isset($alreadyDumpedObjects['Macrocategoria'][$this->getPrimaryKey()])) {
			return '*RECURSION*';
		}
		$alreadyDumpedObjects['Macrocategoria'][$this->getPrimaryKey()] = true;
		$keys = MacrocategoriaPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getIdfamiglia(),
			$keys[2] => $this->getDescrizione(),
		);
		if ($includeForeignObjects) {
			if (null !== $this->aFamiglia) {
				$result['Famiglia'] = $this->aFamiglia->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
			}
			if (null !== $this->collCategorias) {
				$result['Categorias'] = $this->collCategorias->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
			}
		}
		return $result;
	}

	/**
	 * Sets a field from the object by name passed in as a string.
	 *
	 * @param      string $name peer name
	 * @param      mixed $value field value
	 * @param      string $type The type of fieldname the $name is of:
	 *                     one of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME
	 *                     BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM
	 * @return     void
	 */
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = MacrocategoriaPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	/**
	 * Sets a field from the object by Position as specified in the xml schema.
	 * Zero-based.
	 *
	 * @param      int $pos position in xml schema
	 * @param      mixed $value field value
	 * @return     void
	 */
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setIdfamiglia($value);
				break;
			case 2:
				$this->setDescrizione($value);
				break;
		} // switch()
	}

	/**
	 * Populates the object using an array.
	 *
	 * This is particularly useful when populating an object from one of the
	 * request arrays (e.g. $_POST).  This method goes through the column
	 * names, checking to see whether a matching key exists in populated
	 * array. If so the setByName() method is called for that column.
	 *
	 * You can specify the key type of the array by additionally passing one
	 * of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME,
	 * BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM.
	 * The default key type is the column's phpname (e.g. 'AuthorId')
	 *
	 * @param      array  $arr     An array to populate the object from.
	 * @param      string $keyType The type of keys the array uses.
	 * @return     void
	 */
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = MacrocategoriaPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setIdfamiglia($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setDescrizione($arr[$keys[2]]);
	}

	/**
	 * Build a Criteria object containing the values of all modified columns in this object.
	 *
	 * @return     Criteria The Criteria object containing all modified values.
	 */
	public function buildCriteria()
	{
		$criteria = new Criteria(MacrocategoriaPeer::DATABASE_NAME);

		if ($this->isColumnModified(MacrocategoriaPeer::ID)) $criteria->add(MacrocategoriaPeer::ID, $this->id);
		if ($this->isColumnModified(MacrocategoriaPeer::IDFAMIGLIA)) $criteria->add(MacrocategoriaPeer::IDFAMIGLIA, $this->idfamiglia);
		if ($this->isColumnModified(MacrocategoriaPeer::DESCRIZIONE)) $criteria->add(MacrocategoriaPeer::DESCRIZIONE, $this->descrizione);

		return $criteria;
	}

	/**
	 * Builds a Criteria object containing the primary key for this object.
	 *
	 * Unlike buildCriteria() this method includes the primary key values regardless
	 * of whether or not they have been modified.
	 *
	 * @return     Criteria The Criteria object containing value(s) for primary key(s).
	 */
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(MacrocategoriaPeer::DATABASE_NAME);
		$criteria->add(MacrocategoriaPeer::ID, $this->id);

		return $criteria;
	}

	/**
	 * Returns the primary key for this object (row).
	 * @return     int
	 */
	public function getPrimaryKey()
	{
		return $this->getId();
	}

	/**
	 * Generic method to set the primary key (id column).
	 *
	 * @param      int $key Primary key.
	 * @return     void
	 */
	public function setPrimaryKey($key)
	{
		$this->setId($key);
	}

	/**
	 * Returns true if the primary key for this object is null.
	 * @return     boolean
	 */
	public function isPrimaryKeyNull()
	{
		return null === $this->getId();
	}

	/**
	 * Sets contents of passed object to values from current object.
	 *
	 * If desired, this method can also make copies of all associated (fkey referrers)
	 * objects.
	 *
	 * @param      object $copyObj An object of Macrocategoria (or compatible) type.
	 * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
	 * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
	 * @throws     PropelException
	 */
	public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
	{
		$copyObj->setIdfamiglia($this->getIdfamiglia());
		$copyObj->setDescrizione($this->getDescrizione());

		if ($deepCopy) {
			// important: temporarily setNew(false) because this affects the behavior of
			// the getter/setter methods for fkey referrer objects.
			$copyObj->setNew(false);

			foreach ($this->getCategorias() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addCategoria($relObj->copy($deepCopy));
				}
			}

		} // if ($deepCopy)

		if ($makeNew) {
			$copyObj->setNew(true);
			$copyObj->setId(NULL); // this is a auto-increment column, so set to default value
		}
	}

	/**
	 * Makes a copy of this object that will be inserted as a new row in table when saved.
	 * It creates a new object filling in the simple attributes, but skipping any primary
	 * keys that are defined for the table.
	 *
	 * If desired, this method can also make copies of all associated (fkey referrers)
	 * objects.
	 *
	 * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
	 * @return     Macrocategoria Clone of current object.
	 * @throws     PropelException
	 */
	public function copy($deepCopy = false)
	{
		// we use get_class(), because this might be a subclass
		$clazz = get_class($this);
		$copyObj = new $clazz();
		$this->copyInto($copyObj, $deepCopy);
		return $copyObj;
	}

	/**
	 * Returns a peer instance associated with this om.
	 *
	 * Since Peer classes are not to have any instance attributes, this method returns the
	 * same instance for all member of this class. The method could therefore
	 * be static, but this would prevent one from overriding the behavior.
	 *
	 * @return     MacrocategoriaPeer
	 */
	public function getPeer()
	{
		if (self::$peer === null) {
			self::$peer = new MacrocategoriaPeer();
		}
		return self::$peer;
	}

	/**
	 * Declares an association between this object and a Famiglia object.
	 *
	 * @param      Famiglia $v
	 * @return     Macrocategoria The current object (for fluent API support)
	 * @throws     PropelException
	 */
	public function setFamiglia(Famiglia $v = null)
	{
		if ($v === null) {
			$this->setIdfamiglia(NULL);
		} else {
			$this->setIdfamiglia($v->getId());
		}

		$this->aFamiglia = $v;

		// Add binding for other direction of this n:n relationship.
		// If this object has already been added to the Famiglia object, it will not be re-added.
		if ($v !== null) {
			$v->addMacrocategoria($this);
		}

		return $this;
	}


	/**
	 * Get the associated Famiglia object
	 *
	 * @param      PropelPDO Optional Connection object.
	 * @return     Famiglia The associated Famiglia object.
	 * @throws     PropelException
	 */
	public function getFamiglia(PropelPDO $con = null)
	{
		if ($this->aFamiglia === null && ($this->idfamiglia !== null)) {
			$this->aFamiglia = FamigliaQuery::create()->findPk($this->idfamiglia, $con);
			/* The following can be used additionally to
				guarantee the related object contains a reference
				to this object.  This level of coupling may, however, be
				undesirable since it could result in an only partially populated collection
				in the referenced object.
				$this->aFamiglia->addMacrocategorias($this);
			 */
		}
		return $this->aFamiglia;
	}


	/**
	 * Initializes a collection based on the name of a relation.
	 * Avoids crafting an 'init[$relationName]s' method name
	 * that wouldn't work when StandardEnglishPluralizer is used.
	 *
	 * @param      string $relationName The name of the relation to initialize
	 * @return     void
	 */
	public function initRelation($relationName)
	{
		if ('Categoria' == $relationName) {
			return $this->initCategorias();
		}
	}

	/**
	 * Clears out the collCategorias collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addCategorias()
	 */
	public function clearCategorias()
	{
		$this->collCategorias = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collCategorias collection.
	 *
	 * By default this just sets the collCategorias collection to an empty array (like clearcollCategorias());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @param      boolean $overrideExisting If set to true, the method call initializes
	 *                                        the collection even if it is not empty
	 *
	 * @return     void
	 */
	public function initCategorias($overrideExisting = true)
	{
		if (null !== $this->collCategorias && !$overrideExisting) {
			return;
		}
		$this->collCategorias = new PropelObjectCollection();
		$this->collCategorias->setModel('Categoria');
	}

	/**
	 * Gets an array of Categoria objects which contain a foreign key that references this object.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this Macrocategoria is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @return     PropelCollection|array Categoria[] List of Categoria objects
	 * @throws     PropelException
	 */
	public function getCategorias($criteria = null, PropelPDO $con = null)
	{
		if(null === $this->collCategorias || null !== $criteria) {
			if ($this->isNew() && null === $this->collCategorias) {
				// return empty collection
				$this->initCategorias();
			} else {
				$collCategorias = CategoriaQuery::create(null, $criteria)
					->filterByMacrocategoria($this)
					->find($con);
				if (null !== $criteria) {
					return $collCategorias;
				}
				$this->collCategorias = $collCategorias;
			}
		}
		return $this->collCategorias;
	}

	/**
	 * Sets a collection of Categoria objects related by a one-to-many relationship
	 * to the current object.
	 * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
	 * and new objects from the given Propel collection.
	 *
	 * @param      PropelCollection $categorias A Propel collection.
	 * @param      PropelPDO $con Optional connection object
	 */
	public function setCategorias(PropelCollection $categorias, PropelPDO $con = null)
	{
		$this->categoriasScheduledForDeletion = $this->getCategorias(new Criteria(), $con)->diff($categorias);

		foreach ($categorias as $categoria) {
			// Fix issue with collection modified by reference
			if ($categoria->isNew()) {
				$categoria->setMacrocategoria($this);
			}
			$this->addCategoria($categoria);
		}

		$this->collCategorias = $categorias;
	}

	/**
	 * Returns the number of related Categoria objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related Categoria objects.
	 * @throws     PropelException
	 */
	public function countCategorias(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if(null === $this->collCategorias || null !== $criteria) {
			if ($this->isNew() && null === $this->collCategorias) {
				return 0;
			} else {
				$query = CategoriaQuery::create(null, $criteria);
				if($distinct) {
					$query->distinct();
				}
				return $query
					->filterByMacrocategoria($this)
					->count($con);
			}
		} else {
			return count($this->collCategorias);
		}
	}

	/**
	 * Method called to associate a Categoria object to this object
	 * through the Categoria foreign key attribute.
	 *
	 * @param      Categoria $l Categoria
	 * @return     Macrocategoria The current object (for fluent API support)
	 */
	public function addCategoria(Categoria $l)
	{
		if ($this->collCategorias === null) {
			$this->initCategorias();
		}
		if (!$this->collCategorias->contains($l)) { // only add it if the **same** object is not already associated
			$this->doAddCategoria($l);
		}

		return $this;
	}

	/**
	 * @param	Categoria $categoria The categoria object to add.
	 */
	protected function doAddCategoria($categoria)
	{
		$this->collCategorias[]= $categoria;
		$categoria->setMacrocategoria($this);
	}

	/**
	 * Clears the current object and sets all attributes to their default values
	 */
	public function clear()
	{
		$this->id = null;
		$this->idfamiglia = null;
		$this->descrizione = null;
		$this->alreadyInSave = false;
		$this->alreadyInValidation = false;
		$this->clearAllReferences();
		$this->resetModified();
		$this->setNew(true);
		$this->setDeleted(false);
	}

	/**
	 * Resets all references to other model objects or collections of model objects.
	 *
	 * This method is a user-space workaround for PHP's inability to garbage collect
	 * objects with circular references (even in PHP 5.3). This is currently necessary
	 * when using Propel in certain daemon or large-volumne/high-memory operations.
	 *
	 * @param      boolean $deep Whether to also clear the references on all referrer objects.
	 */
	public function clearAllReferences($deep = false)
	{
		if ($deep) {
			if ($this->collCategorias) {
				foreach ($this->collCategorias as $o) {
					$o->clearAllReferences($deep);
				}
			}
		} // if ($deep)

		if ($this->collCategorias instanceof PropelCollection) {
			$this->collCategorias->clearIterator();
		}
		$this->collCategorias = null;
		$this->aFamiglia = null;
	}

	/**
	 * Return the string representation of this object
	 *
	 * @return string
	 */
	public function __toString()
	{
		return (string) $this->exportTo(MacrocategoriaPeer::DEFAULT_STRING_FORMAT);
	}

} // BaseMacrocategoria
