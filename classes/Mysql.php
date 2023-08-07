<?php

class Mysql {

    private $connection = null;

    public function __construct() {
        $config = new Config();
        $connectConfig = $config->get('connection');
        $connString = $connectConfig['type'].':host='.$connectConfig['host'].';dbname='.$connectConfig['dbname'];
        $this->connection = new PDO($connString, $connectConfig['dbuser'], $connectConfig['dbpass']);
    }

    public function query(string $query, array $params = []) {
        $sth = $this->connection->prepare($query);
        $sth->execute($params);
        return $sth;
    }

    public function insert(string $table, array $data) {
        $fieldArr = $fieldPrepare = $valArr = [];
        foreach ($data as $fieldName => $value) {
            $fieldArr[] = $fieldName;
            $fieldPrepare[] = ':'.$fieldName;
            $valArr[':'.$fieldName] = $value;
        }
        $sql = 'INSERT INTO '.$table.' ('.implode(', ', $fieldArr).') values ('.implode(', ',$fieldPrepare).')';

        $stmt = $this->connection->prepare($sql);

        $stmt->execute($valArr);
    }
}