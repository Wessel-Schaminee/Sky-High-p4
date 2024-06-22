<?php
session_start();
require ('conn.php');

if (!isset($_SESSION['user'])) {
    header("Location: inlog.php");
    exit();
}

$booking_id = $_POST['booking_id'];

$stmt = $conn->prepare("DELETE FROM booking WHERE bookingid = :booking_id");
$stmt->bindParam(':booking_id', $booking_id);
$stmt->execute();

header("Location: dashboard.php");
exit();
?>