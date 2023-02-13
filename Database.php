<?php
//require_once "config.php";
class Database
{
    private $username;
    private $password;
    private $host;
    private $database;

    public function __construct() {
        $this->username = "lib";
        $this->password = "postgres_pass";
        $this->host = "db";
        $this->database = "library";
    }
    public function connect() {
        try {
            $con = new PDO(
                "pgsql:host=$this->host;port=5432;dbname=$this->database;", $this->username, $this->password
            );
            $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $con;
        } catch (PDOException $e) {
            die("Connection failed with message: " .$e->getMessage());
        }
    }
}