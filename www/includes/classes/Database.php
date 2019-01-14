<?php
namespace classes;

class Database extends \PDO
{
    private static $instance = null;

    /**
     * Connect to the database and return an instance of \PDO object
     * @throws \Exception
     */
    private function __construct() {
        // Read parameters in the ini configuration file
        $params = parse_ini_file(CONFIG_DIR . 'database.ini');
        if ($params === false) {
            throw new \Exception("Error reading database configuration file");
        }
        try {
            // Connect to the database
            $conStr = sprintf("mysql:host=%s;dbname=%s;charset=%s",
                $params['host'],
                $params['database'],
                $params['charset']);

            parent::__construct($conStr, $params['user'], $params['password']);

        } catch (\PDOException $e) {
            echo 'Connection to the Database failed: '.$e->getMessage();
        }
    }

    /**
     * If a connection to the database is available return that, else create a new connection.
     * @throws \Exception
     */
    public static function getInstance() {
        if (self::$instance == null) {
            self::$instance = new Database();
        }

        return self::$instance;
    }


}