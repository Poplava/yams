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
     * @param $params - array of binded params
     *
     * @return array, result of query
    **/
    public function query($sql, $params = array())
    {
        $statement = self::$_connections[$this->_dbName]->query($sql);
        $result = [];
        foreach($statement->fetch(PDO::FETCH_ASSOC) as $row)
        {
            $result[] = $row;
        }

        return $result;
    }

    /**
     * Function makes query with params and returns 1 row
     *
     * @param $params - array of binded params
     *
     * @return array, result of query
    **/
    public function queryRow($sql, $params = array())
    {
        $statement = self::$_connections[$this->_dbName]->query($sql);
        return $statement->fetch(PDO::FETCH_ASSOC);
    }

    /**
     * Function makes query with params and returns 1 column
     *
     * @param $params - array of binded params
     *
     * @return array, result of query
    **/
    public function queryColumn($sql, $params = array())
    {
        $statement = self::$_connections[$this->_dbName]->query($sql);
        $result = [];
        foreach($statement->fetchColumn() as $column)
        {
            $result[] = $column;
        }

        return $result;
    }

    /**
     * Function makes query with params and returns 1 scalar value
     *
     * @param $params - array of binded params
     *
     * @return scalar
    **/
    public function queryScalar($sql, $params = array())
    {
        $statement = self::$_connections[$this->_dbName]->query($sql);
        $result = [];
        return current($statement->fetch(PDO::FETCH_ASSOC));
    }

    /**
     * Function makes query with params and returns count
     *
     * @param $params - array of binded params
     *
     * @return int
    **/
    public function execute($sql, $params = array())
    {
        return self::$_connections[$this->_dbName]->exec($sql);
    }
}
