<?php

namespace App\Core\Database;

use App\Core\App;
use PDO;

class QueryBuilder
{
    protected $pdo;

    public function __construct(PDO $pdo)
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
        $statement = $this->pdo->prepare("SELECT * FROM {$table} WHERE deleted IS NULL");
        $statement->execute();
    
        return $statement->fetchAll(PDO::FETCH_CLASS);
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
    
        return $statement->fetchAll(PDO::FETCH_CLASS)[0];
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

    /**
     * Create an update query to update a record in the database
     * @param $data array: associative array with columns and values
     * @param $table string: the table to update
     * @param $id int: the id of the record to update
     */
    public static function update($data, $table, $id)
    {
        $setStr = "";
        $params = array();

        foreach ($data as $col => $val) {
            if (trim(strtolower($col)) === 'id') {
                continue;
            }
            
            $setStr .= "`$col` = :$col,";
            $params[$col] = $val;
        }

        $setStr = rtrim($setStr, ",");

        $params['id'] = $id;
        $query = "UPDATE {$table} SET {$setStr} WHERE id = :id";
        self::query($query, $params);
    }

    public static function delete($id, $table)
    {
        $query = "SELECT deleted FROM $table WHERE id= $id AND deleted IS NULL";
        $data = self::query($query)->fetch(PDO::FETCH_ASSOC);

        if ($data !== false) {
            $data['deleted'] = date('Y-m-d H:i:s');
            self::update($data, $table, $id);
        }
    }
}
