<?php

class Database{

    private $host = "localhost";
    private $user = "root";
    private $pass = "";
    private $db   = "restapi";
    public $con;

    // get database connection
    public function getConnection()
    {
        $this->con = null;

        try {
            $this->con = new PDO("mysql:host=" . $this->host . "; dbname=".$this->db, $this->user, $this->pass);
            $this->con->exec("set names utf8");
        } catch (PDOException $exception) {
            echo "Connection Error: " . $exception->getMessage();
        }

        return $this->con;
    }

}


?>