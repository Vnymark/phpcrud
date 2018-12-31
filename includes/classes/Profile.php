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
                $stmt = $this->conn->prepare($sql);
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

        if ($this->conn) {
            $id =  $this->conn->quote($this->id);
            $fname = $this->conn->quote($this->firstname);
            $lname = $this->conn->quote($this->lastname);
            $email = $this->conn->quote($this->email);
            $phone = $this->conn->quote($this->phone);
            $ssn = $this->conn->quote($this->ssn);
            $date = $this->conn->quote(date('Y-m-d'));
            $time = $this->conn->quote(date('H:i:s'));


            $sql = "UPDATE profiles SET 
                firstname = " . $fname . ",
                lastname = " . $lname . ",
                email = " . $email . ",
                phone = " . $phone . ",
                ssn = " . $ssn . ",
                edited_date = " . $date . ",
                edited_time = " . $time . "
			    WHERE `id` = " . $id;

            try {
                $stmt = $this->conn->prepare($sql);
                $stmt->execute();
                printf('<p class="success">Profilen ändrades!</p>');
            } catch (\PDOException $e) {
                echo $e->getMessage();
            }
        }
    }
}