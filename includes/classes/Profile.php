<?php
namespace classes;

class Profile extends Database
{
    private $conn;
    public $firstname;
    public $lastname;
    public $email;
    public $phone;
    public $ssn;

    public function set($property, $value) {
        parent::set($property, $value);
    }

    public function save() {
        $this->conn = $this->connect();
        $fname = $this->conn->quote($this->firstname);
        $lname = $this->conn->quote($this->lastname);
        $email = $this->conn->quote($this->email);
        $phone = $this->conn->quote($this->phone);
        $ssn = $this->conn->quote($this->ssn);


        $sql = "INSERT INTO profiles (firstname, lastname, email, phone, ssn, created_time) VALUES
				(" . $fname . ",
				" . $lname . ",
				" . $email . ",
				" . $phone . ",
				" . $ssn . ",
				'" . date('Y-m-d H:i:s') . "')";
        try{
            $this->conn->exec($sql);
            echo 'Profile saved successfully';
        } catch (\PDOException $e) {
            echo $e->getMessage();
        }
    }

}