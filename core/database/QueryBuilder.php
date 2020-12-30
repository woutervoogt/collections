<?php

namespace App\Core\Database;

use App\Core\App;

class QueryBuilder
{
    protected $pdo;

    public function __construct(\PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public static function query($query, $executeString = array())
    {
        $dbh = App::get('database')->pdo;

        try {
            $stmt = $dbh->prepare($query);
            $stmt->execute($executeString);
        } catch (\PDOException $e) {
            var_dump($e->getMessage());
        }

        return $stmt;
    }

    public function selectAll($table)
    {
        $statement = $this->pdo->prepare("select * from {$table}");
        $statement->execute();
    
        return $statement->fetchAll(\PDO::FETCH_CLASS);
    }

    public function selectOne($table, $key, $value)
    {
        $sql = sprintf(
            'select * from %s where %s = %s',
            $table,
            $key,
            $value
        );

        $statement = $this->pdo->prepare($sql);
        $statement->execute();
    
        return $statement->fetchAll(\PDO::FETCH_CLASS)[0];
    }

    /**
     * Insert data into the database
     * @param $table string: the table to insert into
     * @param $data array: a associative array with columns and values
     */
    public function insert($table, $data)
    {
        $sql = sprintf(
            'insert into %s (%s) values (%s)',
            $table,
            implode(', ', array_keys($data)),
            ':' . implode(', :', array_keys($data))
        );

        try {
            $statement = $this->pdo->prepare($sql);
            $statement->execute($data);
        } catch (\Exception $e) {
            die($e->getMessage());
        }
    }
}
