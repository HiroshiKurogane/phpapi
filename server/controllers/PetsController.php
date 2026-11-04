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

}