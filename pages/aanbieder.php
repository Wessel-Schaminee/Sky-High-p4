<?php
session_start();

require 'conn.php';
$name = $_SESSION['user'];
$stmt = $conn->prepare("UPDATE users SET rol=3 WHERE username = :name");
$stmt->bindParam(':name', $name);
$stmt->execute();

header("Location: login.php");
exit;
?>