<?php
namespace classes;

class Profile extends Database
{
    private $conn;
    public $id;
    public $firstname;
    public $lastname;
    public $email;
    public $phone;
    public $ssn;

    public function set($property, $value) {
        parent::set($property, $value);
    }

    /**
     * @throws \Exception
     */
    public function save() {
        $this->conn = $this->connect();
        $dt = new \DateTime("now", new \DateTimeZone("Europe/Stockholm"));

        if ($this->conn) {
            $sql = "INSERT INTO profiles (firstname, lastname, email, phone, ssn, created_date, created_time) VALUES
				(?, ?, ?, ?, ?, ?, ?)";

            try {
                $stmt = $this->conn->prepare($sql);
                $stmt->bindParam(1, $this->firstname, \PDO::PARAM_STR);
                $stmt->bindParam(2, $this->lastname, \PDO::PARAM_STR);
                $stmt->bindParam(3, $this->email, \PDO::PARAM_STR);
                $stmt->bindParam(4, $this->phone, \PDO::PARAM_STR);
                $stmt->bindParam(5, $this->ssn, \PDO::PARAM_STR);
                $stmt->bindParam(6, $dt->format('Y-m-d'), \PDO::PARAM_STR);
                $stmt->bindParam(7, $dt->format('H:i:s'), \PDO::PARAM_STR);
                $stmt->execute();
                printf('<p class="success">Profilen sparades!</p>');
            } catch (\PDOException $e) {
                echo $e->getMessage();
            }
        }
    }

    /**
     * @throws \Exception
     */
    public function edit() {
        $this->conn = $this->connect();
        $dt = new \DateTime("now", new \DateTimeZone("Europe/Stockholm"));

        if ($this->conn) {

            $sql = "UPDATE profiles SET 
                firstname = ?,
                lastname = ?,
                email = ?,
                phone = ?,
                ssn = ?,
                edited_date = ?,
                edited_time = ?
			    WHERE `id` = ?";

            try {
                $stmt = $this->conn->prepare($sql);
                $stmt->bindParam(1, $this->firstname, \PDO::PARAM_STR);
                $stmt->bindParam(2, $this->lastname, \PDO::PARAM_STR);
                $stmt->bindParam(3, $this->email, \PDO::PARAM_STR);
                $stmt->bindParam(4, $this->phone, \PDO::PARAM_STR);
                $stmt->bindParam(5, $this->ssn, \PDO::PARAM_STR);
                $stmt->bindParam(6, $dt->format('Y-m-d'), \PDO::PARAM_STR);
                $stmt->bindParam(7, $dt->format('H:i:s'), \PDO::PARAM_STR);
                $stmt->bindParam(8, $this->id, \PDO::PARAM_INT);
                $stmt->execute();
                printf('<p class="success">Profilen ändrades!</p>');
            } catch (\PDOException $e) {
                echo $e->getMessage();
            }
        }
    }
}