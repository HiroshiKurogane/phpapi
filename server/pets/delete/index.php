<?php
include_once("../controllers/PetsController.php");
header('Content-Type: application/json; charset=utf-8');

if ($_SERVER["REQUEST_METHOD"] == "DELETE") {
    $petsController = new PetsController();
    $result = $petsController->delete($_GET["id"]);
    if ($result == false) {
        http_response_code(400);
    } else {
        http_response_code(200);
    }
} else {
    http_response_code(405);
}
?>