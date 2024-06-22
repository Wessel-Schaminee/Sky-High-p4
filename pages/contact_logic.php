<?php
require_once 'conn.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $subject = $_POST["subject"];
    $message = $_POST["message"];

    if (empty($name) || empty($email) || empty($subject) || empty($message)) {
        $error = "Please fill in all fields";
    } else {
        try {
            $stmt = $conn->prepare("INSERT INTO contact (name, email, subject, message) VALUES (:name, :email, :subject, :message)");
            $stmt->bindParam(":name", $name);
            $stmt->bindParam(":email", $email);
            $stmt->bindParam(":subject", $subject);
            $stmt->bindParam(":message", $message);
            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                $success = "Message sent successfully!";
                header("Location:../index.php?success=$success");
                exit;
            } else {
                $error = "Error sending message";
            }
        } catch (PDOException $e) {
            $error = "Error sending message: ". $e->getMessage();
        }
    }
}
?>