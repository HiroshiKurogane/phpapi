<?
include_once __DIR__ . '/../db/conn.php';
class PetsController {
    public $conn;
    public function __construct() {
        $this->conn = $GLOBALS['conn'];
    }
    public function get($id)
    {
        $sql = "SELECT * FROM pets WHERE id = " . $id . ";";
        $result = $this->conn->query($sql);
        $pet = null;
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $pet = new Pet($row["id"], $row["name"], 
                    $row["cuteness"], $row["age"], 
                    $row["typeid"], $row["picture"]);
                break;
            }
        }
        return $pet;
    }
    public function getAll()
    {
        $sql = "SELECT * FROM pets;";
        $result = $this->conn->query($sql);
        $pets = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $pet = new Pet($row["id"], $row["name"], 
                    $row["cuteness"], $row["age"], 
                    $row["typeid"], $row["picture"]);
                array_push($pets, $pet);
            }
        }
        return $pets;
    }
    public function create($name, $cuteness, $age, $typeid, $picture = "")
    {
        $sql = "INSERT INTO pets (name, cuteness, age, typeid, picture) 
        VALUES ('" . $name . "', " . $cuteness . ", " . $age . ", " . $typeid .
         ", '" . $picture . "');";
        if ($this->conn->query($sql) === TRUE) {
            return true;
        } else {
            return false;
        }
    }
    public function update($id, $name, $cuteness, $age, $typeid, $picture = "")
    {
        $sql = "UPDATE pets SET name='" . $name . "', cuteness=" . $cuteness . 
        ", age=" . $age . ", typeid=" . $typeid . ", picture='" . $picture . 
        "' WHERE id=" . $id . ";";
        if ($this->conn->query($sql) === TRUE) {
            return true;
        } else {
            return false;
        }
    }
    public function delete($id)
    {
        $sql = "DELETE FROM pets WHERE id=" . $id . ";";
        if ($this->conn->query($sql) === TRUE) {
            return true;
        } else {
            return false;
        }
    }

}