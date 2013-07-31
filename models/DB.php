<?php

/**
 * DB class for connecting, executing queries, etc.
**/
class DB
{
    static $_connections = array();
    private $_dbName = null;

    /**
     * Function connects to DB
     *
     * @param $dbName - string, name of database
    **/
    public function __construct($dbName = 'default')
    {
        $this->_dbName = $dbName;
        if(!isset(self::$_connections[$dbName]))
        {
            $credentials = Config::get('db', array('dbName' => $dbName)); 
            self::$_connections[$dbName] = new PDO(
                "mysql:host={$credentials['host']};dbname={$credentials['dbname']}",
                $credentials['username'],
                $credentials['password'],
                array(PDO::ATTR_PERSISTENT => true)
            );
        }
    }

    /**
     * Function makes query with params and returns all results
     *
     * @param $sql      - string
     * @param $params   - array of binded params
     *
     * @return array, result of query
    **/
    public function query($sql, $params = array())
    {
        $stmt = $this->_prepareAndBindParams($sql, $params);
        $stmt->execute();
        $result = [];

        $res = $stmt->fetch(PDO::FETCH_ASSOC);
        if (!empty($res))
        {
            foreach($res as $row)
            {
                $result[] = $row;
            }
        }

        return $result;
    }

    /**
     * Function makes query with params and returns 1 row
     *
     * @param $sql      - string
     * @param $params   - array of binded params
     *
     * @return array, result of query
    **/
    public function queryRow($sql, $params = array())
    {
        $stmt = $this->_prepareAndBindParams($sql, $params);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    /**
     * Function makes query with params and returns 1 column
     *
     * @param $sql      - string
     * @param $params   - array of binded params
     *
     * @return array, result of query
    **/
    public function queryColumn($sql, $params = array())
    {
        $stmt = $this->_prepareAndBindParams($sql, $params);
        $stmt->execute();

        $result = [];
        foreach($stmt->fetchColumn() as $column)
        {
            $result[] = $column;
        }

        return $result;
    }

    /**
     * Function makes query with params and returns 1 scalar value
     *
     * @param $sql      - string
     * @param $params   - array of binded params
     *
     * @return scalar
    **/
    public function queryScalar($sql, $params = array())
    {
        $stmt = $this->_prepareAndBindParams($sql, $params);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    /**
     * Function makes query with params and returns count
     *
     * @param $sql      - string
     * @param $params   - array of binded params
     *
     * @return int
    **/
    public function execute($sql, $params = array())
    {
        $stmt = $this->_prepareAndBindParams($sql, $params);
        return $stmt->execute();
    }

    /**
     * Function prepares statement and binds params
     *
     * @param $sql      - string
     * @param $params   - array of binded params
     *
     * @return PDOStatement
    **/
    private function _prepareAndBindParams($sql, $params)
    {
        $stmt = self::$_connections[$this->_dbName]->prepare($sql);
        foreach($params as $key => $value)
        {
            if(is_int($value))
            {
                $stmt->bindValue($key, $value, PDO::PARAM_INT);
            }
            else
            {
                $stmt->bindValue($key, $value, PDO::PARAM_STR);
            }
        }

        return $stmt;
    }

    /**
     * Function returns last insert ID
     *
     * @return int
    **/
    public function lastInsertId()
    {
        return self::$_connections[$this->_dbName]->lastInsertId();
    }
}
