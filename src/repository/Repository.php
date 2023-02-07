<?php

require_once __DIR__."/../../Database.php";

class Repository
{
    protected static $database;
    private static $instances = [];
    protected function __construct() {}
    protected function __clone() {}

    public static function getInstance(): Repository {
        $cls = static::class;
        if (!isset(self::$instances[$cls])) {
            self::$instances[$cls] = new static();
            self::$database = new Database();
        }
        return self::$instances[$cls];
    }



}