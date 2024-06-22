<?php
session_start();
include 'conn.php';

$userid = $_POST['userid'];
$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];

$stmt = $conn->prepare("UPDATE users SET username=:username, email=:email, password=:password WHERE id=:id");
$stmt->bindParam(':id', $userid);
$stmt->bindParam(':username', $username);
$stmt->bindParam(':email', $email);
$stmt->bindParam(':password', $password);
$stmt->execute();

header("location: admindashboard.php");
?>