<?php
session_start();
require ('conn.php');

if (!isset($_SESSION['user'])) {
    header("Location: inlog.php");
    exit();
} else {
    session_destroy();
    header("Location: inlog.php");
}

?>