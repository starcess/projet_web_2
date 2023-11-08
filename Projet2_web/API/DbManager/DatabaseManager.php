<?php
class DB
{
    private static $instance; // The single instance of the class

    // Private constructor to prevent direct instantiation
    private function __construct($username, $password)
    {
        $this->connect($username,$password);
    }

    // Get the instance of the class
    public static function getInstance($username, $password)
    {
        if (self::$instance === null) {
            self::$instance = new self($username, $password);
        }
        return self::$instance;
    }

    public function connect($username_1, $password_1)
    {
        try {
            $username = $username_1;
            $password = $password_1;
            $pdo = new PDO(
                'mysql:host=localhost;dbname=projet2',
                $username,
                $password
            );
            return $pdo;
        } catch (PDOException $e) {
            $msg = "Error!: " . $e->getMessage() . "<br>";
            print $msg;
            exit($msg);
        }
    }
}

// Usage:
// $db = DB::getInstance();
// $pdo = $db->connect();

?>














