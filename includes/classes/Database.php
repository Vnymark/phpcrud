<?php
namespace classes;


class Database
{
    /**
     * Connection
     * @var type
     */
    private static $conn;

    /**
     * Connect to the database and return an instance of \PDO object
     * @return \PDO
     * @throws \Exception
     */
    public function connect() {

        // Read parameters in the ini configuration file
        $params = parse_ini_file('config/database.ini');
        if ($params === false) {
            throw new \Exception("Error reading database configuration file");
        }
        // Connect to the database
        $conStr = sprintf("mysql:host=%s;dbname=%s",
            $params['host'],
            $params['database']);

        $pdo = new \PDO($conStr, $params['user'], $params['password']);
        $pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);

        return $pdo;
    }

    /**
     * return an instance of the Connection object
     * @return type
     */
    public static function get() {
        if (null === static::$conn) {
            static::$conn = new static();
        }

        return static::$conn;
    }

    protected function __construct() {

    }

    private function __clone() {

    }

    private function __wakeup() {

    }


}