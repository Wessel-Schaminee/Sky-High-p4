<?php
session_start();
include 'conn.php';

$targetid = $_GET['id'];

$stmt = $conn->prepare("DELETE FROM users WHERE id=:userid");
$stmt->bindParam(':userid', $targetid);
$stmt->execute();

header('Location: admindashboard.php');
?>