<?php
$server = "127.0.0.1:3306";
$username = "root";
$password = "";
$dbname = "bestbooking";

try {
    $conn = new PDO(
        "mysql:host=$server; dbname=$dbname",
        $username,
        $password
    );

    $conn->setAttribute(
        PDO::ATTR_ERRMODE,
        PDO::ERRMODE_EXCEPTION
    );
} catch (PDOException $e) {
    die('Unable to connect with the database: ' . $e->getMessage());
}
