<?php
session_start();
require('conn.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['feedback'])) {
        $feedback = $_POST['feedback'];
        $user = $_SESSION['user'];

        try {
            $stmt = $conn->prepare("INSERT INTO feedback (user, feedback) VALUES (:user, :feedback)");
            $stmt->bindParam(':user', $user);
            $stmt->bindParam(':feedback', $feedback);
            $stmt->execute();
            
            header("Location: dashboard.php");
            exit();
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
}
?>
