<?php
session_start();
require('conn.php');

if(!isset($_SESSION['user'])) {
    header("Location: inlog.php");
    exit();
}

$username = $_SESSION['user'];
$placeid = $_POST['placeid'];
$pplamount = $_POST['people'];
$date = $_POST['date'];
$stmt = $conn->prepare("SELECT id FROM users WHERE username = :username");
$stmt->bindParam(':username', $username);
$stmt->execute();
$result = $stmt->fetch();
$userid = $result['id'];

$stmt = $conn->prepare("INSERT INTO booking  (userid, placeid, date, ampeople) VALUES (:userid, :placeid, :date, :ampeople)");
$stmt->bindParam(':ampeople', $pplamount);
$stmt->bindParam(':userid', $userid);
$stmt->bindParam(':date', $date);
$stmt->bindParam(':placeid', $placeid);
$stmt->execute();

header("LOCATION: dashboard.php");