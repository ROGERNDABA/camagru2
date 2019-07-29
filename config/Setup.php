<?php
class Init {
    private $conn;
    private $servername = "localhost";
    private $username = "root";
    private $password = "Rootroot3%";
    function __construct($db) {
        try {
            $this->conn = new PDO("mysql:host=$this->servername;dbname=$db", $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e) {
            echo $e."<br>";
            echo "Something went teribbly wrong -->";
            exit;
        }
    }
    public function getDB() {
        if ($this->conn instanceof PDO) {
            return $this->conn;
        }
    }
}
