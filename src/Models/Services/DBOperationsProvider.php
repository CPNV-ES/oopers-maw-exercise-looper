<?php

namespace App\Models\Services;

use ORM\DatabaseOperations;
use ORM\SQLOperations;
use PDO;

class DBOperationsProvider
{
    private static ?DatabaseOperations $operator = null;

    /**
     * A dummy implementation providing one single database operator linked to PDO using .ENV
     * @return DatabaseOperations
     */
    static function GetUnique(): DatabaseOperations
    {
        if(DBOperationsProvider::$operator == null){
            DBOperationsProvider::$operator = new SQLOperations(new PDO($_ENV["PDO_DSN"],$_ENV["PDO_USERNAME"],$_ENV["PDO_PASSWORD"]));
        }
        return DBOperationsProvider::$operator;
    }
}