<?php
class DB
{
    private static $instance;
    private $pdo;

    private function __construct($username, $password)
    {
        $this->connect($username, $password);
    }

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

    public function getPdo()
    {
        return $this->pdo;
    }
}

?>