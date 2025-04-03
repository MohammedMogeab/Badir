<?php

namespace core;

use PDO;

//يغلف اتصال قاعدة البينات بحيث يوفر مزايا جديده 

class Database
{
    private $conection;
    private $statement;

    public function __construct($config, $dbName = 'root', $dbPass = '')
    {

        $dsn = 'mysql:' . http_build_query($config, '', ';');
        $this->conection = new Pdo($dsn, $dbName, $dbPass, [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]);
    }

    public function query($query, $params = [])
    {

        $this->statement = $this->conection->prepare($query);
        $this->statement->execute($params);
        return  $this;
    }

    public function fetch()
    {
        return $this->statement->fetch();
    }

    public function findOrFail()
    {
        $result = $this->fetch();

        if (! $result) {
            abort(404);
        }
        return $result;
    }
    public function getGeneratedKey($id_name){
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result[$id_name];
    }

    public function fetchAll()
    {
        return $this->statement->fetchAll();
    }
}
