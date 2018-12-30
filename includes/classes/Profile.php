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
        try{
            $this->conn = $this->connect();
        } catch (\PDOException $e){
            echo 'Connection failed in the Profile class: ' . $e->getMessage();
        }
        if ($this->conn){
            $fname = $this->conn->quote($this->firstname);
            $lname = $this->conn->quote($this->lastname);
            $email = $this->conn->quote($this->email);
            $phone = $this->conn->quote($this->phone);
            $ssn = $this->conn->quote($this->ssn);
            $date = $this->conn->quote(date('Y-m-d'));
            $time = $this->conn->quote(date('H:i:s'));


            $sql = "INSERT INTO profiles (firstname, lastname, email, phone, ssn, created_date, created_time) VALUES
				(" . $fname . ",
				" . $lname . ",
				" . $email . ",
				" . $phone . ",
				" . $ssn . ",
				" . $date . ",
				" . $time . ")";

            try{
                $this->conn->exec($sql);
                echo 'Profile saved successfully';
            } catch (\PDOException $e) {
                echo $e->getMessage();
            }
        }
    }

}