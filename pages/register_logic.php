<?php
session_start();
include 'conn.php';

if (empty($_POST["username"]) || empty($_POST["password"])) {
    header("Location: login.php");
    exit();
}

$username = $_POST["username"];
$password = $_POST["password"];
$email = $_POST['email'];
$rol = 1;

if (isset($_POST['confirm-password'])) {
    $repeatPassword = $_POST['confirm-password'];

    if ($password == $repeatPassword) {
        $stmt = $conn->prepare("INSERT INTO users (username, password, email, rol) VALUES(:user, :pass, :email, :rol)");
        $stmt->bindParam(":user", $username);
        $stmt->bindParam(":pass", $password);
        $stmt->bindParam(":email", $email);
        $stmt->bindParam(":rol", $rol);
        $stmt->execute();

        echo "<script language=\"JavaScript\">\n";
        echo "alert('Account has been made you will be redirected to the login!');\n";
        echo "window.location='inlog.php'";
        echo "</script>";
    } else {
        echo "<script language=\"JavaScript\">\n";
        echo "document.getElementById('perror')?.style.display = 'block';";
        echo "</script>";
    }
} else {

    header("Location: login.php");
    exit();
}