<?php
session_start();
include 'conn.php';

if (empty($_POST["username"]) || empty($_POST["password"])) {
    header("Location: login.php");
    exit();
}

$username = $_POST["username"];
$password = $_POST["password"];

$stmt = $conn->prepare("SELECT * FROM users WHERE username=:username AND password=:password");
$stmt->execute(['username' => $username, 'password' => $password]);
$user = $stmt->fetch();

$_SESSION['rol'] = $user['rol'];


if (!$user) {
    echo "<script language=\"JavaScript\">\n";
    echo "alert('Username or Password was incorrect!');\n";
    echo "window.location='inlog.php'";
    echo "</script>";
    exit();
} else {
    if ($user['rol'] == 2) {
        $_SESSION['user'] = $username;
        header("Location: admindashboard.php");
        exit();
    }
    if ($user['rol'] == 3) {
        $_SESSION['user'] = $username;
        header("Location: makevacions.php");
        exit();
    } else {
        $_SESSION['user'] = $username;
        header("Location: dashboard.php");
        exit();
    }
}

