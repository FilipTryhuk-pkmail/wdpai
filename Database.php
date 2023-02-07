<?php
require_once "config.php";
class Database
{
    private $username;
    private $password;
    private $host;
    private $database;
    private $url;

    public function __construct() {
        $this->username = USERNAME;
        $this->password = PASSWORD;
        $this->host = HOST;
        $this->database = DATABASE;
        $this->url = URL;
    }
    public function connect() {
        try {
            $con = new PDO(
                "mysql:host=localhost;dbname=library_e", $this->username, $this->password
            );
            $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $con;
        } catch (PDOException $e) {
            die("Connection failed with message: " .$e->getMessage());
        }
    }
}