<?php

namespace App\Models;

use App\Core\App;
use App\Core\Database\QueryBuilder;
use PDO;

class MusicModel extends ItemModel
{
    // Name of the table
    protected $model = "music";

    // Max number of records when fetching all records from table
    protected $limit;

    // Non writable fields
    protected $protectedFields = [
        'id',
        'collection_id',
        'updated',
        'deleted',
        'updated_by',
        'deleted_by',
    ];

    public function __construct()
    {
        parent::__construct(
            $this->model,
            $this->limit,
            $this->protectedFields
        );
    }
}

new MusicModel;
