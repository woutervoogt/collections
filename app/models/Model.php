<?php

namespace App\Models;

use App\Core\App;
use App\Core\Database\QueryBuilder;
use PDO;

class Model
{
    // Name of the model (table)
    private static $model;

    // Max. records when fetching all records
    private static $limit;

    private static $protectedFields;

    /**
     * Constructor
     * Set $model and $limit from child Model
     */
    public function __construct($model, $plural = null, $limit = null, $protectedFields = null)
    {
        self::$model = pluralize(4, $model, $plural);
        self::$limit = $limit;
        self::$protectedFields = $protectedFields;
    }
    
    /**
     * Fetching all records from table
     * @return array of objects
     */
    public static function all(array $selectedFields = null)
    {
        $fields = "*";

        if (count($selectedFields) > 0) {
            $fields = self::composeQuery($selectedFields);
        }

        $sql = "SELECT $fields FROM " . self::$model . " WHERE deleted IS NULL" . (!empty(self::$limit) ? " LIMIT " . self::$limit : "");

        return QueryBuilder::query($sql)->fetchAll(PDO::FETCH_CLASS);
    }

    /**
     * Fetching one record based on the id
     * @return object
     */
    public static function getOneById(int $id, array $selectedFields = null)
    {
        if ($id === 0) {
            return null;
        }

        $fields = "*";

        if (!empty($selectedFields) && count($selectedFields) > 0) {
            $fields = self::composeQuery($selectedFields);
        }

        $sql = "SELECT {$fields} FROM ". self::$model . " WHERE id = {$id} AND deleted IS NULL";
 
        $res = QueryBuilder::query($sql)->fetchAll(PDO::FETCH_CLASS);

        return count($res) > 0 ? $res[0] : null;
    }

    /**
     * Saves a record to the model
     * @param $data array
     * @return the ID of the new record
     */
    public static function store(array $data)
    {
        return App::get('database')->insert(self::$model, self::removeIllegalFields($data));
    }

    /**
     * Updates a record to the model
     * @param $data array
     */
    public static function update(array $data, int $id)
    {
        if ($id === 0) {
            return;
        }

        QueryBuilder::update(self::removeIllegalFields($data), self::$model, $id);
    }

    /**
     * Archives a record to the model
     * @param $data array
     */
    public static function destroy(int $id)
    {
        QueryBuilder::delete($id, self::$model);
    }

    private static function removeIllegalFields(array $data)
    {
        foreach (@$data as $key => $val) {
            if (in_array($key, self::$protectedFields)) {
                unset($data[$key]);
            }
        }

        return $data;
    }

    private static function composeQuery(array $fields)
    {
        $getFields = '';

        foreach ($fields as $field) {
            $getFields .= $field . ',';
        }

        return rtrim($getFields, ',');
    }
}
