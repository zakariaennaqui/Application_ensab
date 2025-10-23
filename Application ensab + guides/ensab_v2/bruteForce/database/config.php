<?php 

class Database {
    private static $host = "localhost";
    private static $dbname = "brute_force";
    private static $username = "root";
    private static $password = "";
    private static $connection = null;

    public static function connect() {
        if (self::$connection === null) {
            try {
                self::$connection = new PDO("mysql:host=" . self::$host . ";dbname=" . self::$dbname, self::$username, self::$password);
                self::$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                die("Database Error: " . $e->getMessage());
            }
        }
        return self::$connection;
    }

    public static function disconnect(){
        return self::$connection = null;
    }
}


?>