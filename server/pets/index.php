<?php
include_once __DIR__ . '/../controllers/PetsController.php';
header('Content-Type: application/json; charset=utf-8');

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $petsController = new PetsController();
    $request = json_decode(file_get_contents('php://input'), true);
    $result = $petsController->getAll();
    if ($result == false) {
        http_response_code(400);
        echo "<img src = 'https://http.cat/400' />";
    } else {
        echo json_encode($result);
        http_response_code(200);
    }
} else {
    http_response_code(405);
}