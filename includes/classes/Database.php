<?php
namespace classes;

class Database
{
    private $db_keys = array();
    private $db_fields = array();

    /**
     * Connect to the database and return an instance of \PDO object
     * @return \PDO
     * @throws \Exception
     */
    public function connect()
    {
        // Read parameters in the ini configuration file
        $params = parse_ini_file('config/database.ini');
        if ($params === false) {
            throw new \Exception("Error reading database configuration file");
        }
        try{
            // Connect to the database
            $conStr = sprintf("mysql:host=%s;dbname=%s;charset=%s",
                $params['host'],
                $params['database'],
                $params['charset']);

            $pdo = new \PDO($conStr, $params['user'], $params['password']);
            $pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            return $pdo;
        } catch (\PDOException $e){
            echo 'Connection failed in the Database class: '.$e->getMessage();
        }
    }

    public function set($property, $value) {
        $this->$property = $value;

        if (!in_array($property, $this->db_keys)) {
            $this->db_keys[] = $property;
        }

        if (!in_array($property, $this->db_fields)) {
            $this->db_fields[] = $property;
        }
    }
}