<?php
namespace classes;


class Model
{
    private $db_keys = array();
    private $db_fields = array();

    public function set($property, $value) {
        $this->$property = $value;

        if (!in_array($property, $this->db_keys)) {
            $this->db_keys[] = $property;
        }

        if (!in_array($property, $this->db_fields)) {
            $this->db_fields[] = $property;
        }
    }

    /**
     * @return array[]
     * @throws \Exception
     */
    public function fetchAll($table, $orderby = null) {
        $conn = Database::getInstance();

        //If there is a parameter sent for "ORDER BY", this will handle it.
        if ($orderby != null) {
            $orderby = sprintf(' ORDER BY %s', $orderby);
        }

        if ($conn) {
            $sql = "SELECT * FROM " . $table . $orderby;

            try {
                $stmt = $conn->prepare($sql);
                $stmt->execute();
                $result = $stmt->fetchAll(\PDO::FETCH_OBJ);
                return $result;
                printf('<p class="success">Profilen laddades in!</p>');
            } catch (\PDOException $e) {
                echo $e->getMessage();
            }
        }
    }

    /**
     * @throws \Exception
     */
    public function delete($table, $id) {
        $conn = Database::getInstance();

        if ($conn) {
            $sql = "DELETE FROM " . $table . " WHERE id=" . $id;

            try {
                $stmt = $conn->prepare($sql);
                $stmt->execute();
                printf('<p class="success">Profilen togs bort!</p>');
            } catch (\PDOException $e) {
                echo $sql . "<br>" . $e->getMessage();
            }
        }
    }

    /**
     * @throws \Exception
     * return array[]
     */
    public function fetch($table, $id) {
        $conn = Database::getInstance();

        if ($conn) {
            $sql = "SELECT * FROM " . $table . " WHERE `id` = " . $id;

            try {
                $stmt = $conn->prepare($sql);
                $stmt->execute();
                $result = $stmt->fetch(\PDO::FETCH_ASSOC);
                return $result;
            } catch (\PDOException $e) {
                echo $e->getMessage();
            }
        }
    }
}