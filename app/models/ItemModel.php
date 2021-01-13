<?php

namespace App\Models;

use App\Core\App;
use App\Core\Database\QueryBuilder;
use PDO;

class ItemModel extends Model
{
    // Name of the table
    protected $model = "";

    // Max number of records when fetching all records from table
    protected $limit;

    // Non writable fields
    protected $protectedFields = [
        'id',
        'updated',
        'deleted',
        'updated_by',
        'deleted_by',
    ];

    public function __construct($model, $limit = null, $protectedFields = null)
    {
        self::$model = $model;
        self::$limit = $limit;
        self::$protectedFields = $protectedFields;
        
        parent::__construct(
            $this->model,
            $this->limit,
            $this->protectedFields
        );
    }

    public static function allUserItems($uid, array $selectedFields = null)
    {
        // $fields = "*";

        // if (count($selectedFields) > 0) {
        //     $fields = self::composeQuery($selectedFields);
        // }
        
        $sql = "SELECT * FROM" . self::$model . "WHERE user_id = $uid AND deleted IS NULL";
        
        return QueryBuilder::query($sql)->fetchAll(PDO::FETCH_CLASS);
    }
}
