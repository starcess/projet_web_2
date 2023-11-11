<?php
class DB
{
    private static $instance; // The single instance of the class
    private $pdo;

    // Private constructor to prevent direct instantiation
    private function __construct($username, $password)
    {
        $this->connect($username, $password);
    }

    // Get the instance of the class
    public static function getInstance($username, $password)
    {
        if (self::$instance === null) {
            self::$instance = new self($username, $password);
        }
        return self::$instance;
    }
    private function connect($username, $password)
    {
        try {
            $this->pdo = new PDO('mysql:host=localhost;dbname=projet2', $username, $password);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            $msg = "Error!: " . $e->getMessage() . "<br>";
            print $msg;
            exit($msg);
        }
    }

    // Get the PDO object
    public function getPdo()
    {
        return $this->pdo;
    }
}


// Usage:
// $db = DB::getInstance();
// $pdo = $db->connect();

?>