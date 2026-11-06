<?php

$host = "localhost";
$user = "root";
$password = "";
$dbname = "petsdb";

// Create connection
$conn = new mysqli($host, $user, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>