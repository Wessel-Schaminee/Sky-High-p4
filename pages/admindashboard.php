<?php
session_start();
require('conn.php');

if (!isset($_SESSION['user'])) {
    redirect('inlog.php');
} elseif ($_SESSION['rol'] < 2) {
    redirect('inlog.php');
}

function redirect($url) {
    header("Location: $url");
    exit();
}

$stmt = $conn->query("SELECT * FROM feedback ORDER BY created_at DESC");
$feedbacks = $stmt->fetchAll(PDO::FETCH_ASSOC);

$stmt = $conn->query("SELECT * FROM contact ORDER BY created_at DESC");
$contacts = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../assets/css/style.css">
    <title>admin dashboard</title>
</head>
<body>
<div class="header">
    <span href="../index.php"><h1 class="logo">Sky-High</h1></span>
    <div class="quick-acctions">
    </div>
    <div class="search-container input-user ">
    </div>
</div>
<div  class="feedback-container text">
    <h1>Feedback</h1>
    <?php foreach ($feedbacks as $feedback): ?>
        <div class="feedback-item">
            <h3>From: <?php echo $feedback['user']; ?></h3>
            <p><?php echo $feedback['feedback']; ?></p>
            <small>Submitted: <?php echo date('F j, Y, g:i a', strtotime($feedback['created_at'])); ?></small>
        </div>
    <?php endforeach; ?>
</div>

<div class="feedback-container">
    <h1>Contact Messages</h1>
    <?php foreach ($contacts as $contact): ?>
        <div class="feedback-item">
            <h3>From: <?php echo $contact['name']; ?></h3>
            <h4>Subject: <?php echo $contact['subject']; ?></h4>
            <br>
            <p><?php echo $contact['message']; ?></p>
            <small>Submitted: <?php echo date('F j, Y, g:i a', strtotime($contact['created_at'])); ?></small>
        </div>
    <?php endforeach; ?>
</div>

<div class="user-row-holder">
    <h1>Users</h1>
    <?php
    $stmt = $conn->query("SELECT * FROM users");
    while ($row = $stmt->fetch()) {
       echo "<div class='user-row'>";
        echo "<div class='user-info'>";
        echo "<div class='userid'>";
        echo "<h1>" . $row['id'] . "</h1>";
        echo "</div>";
        echo "<div class='username'>";
        echo "<p>" . $row['username'] . "</p>";
        echo "</div>";
        echo "<div class='email'>";
        echo "<p>" . $row['email'] . "</p>";
        echo "</div>";
        echo "</div>";
        echo "<div class='user-actions'>";
        echo "<button class='view-btn' onclick=\"alert('Username: ". $row['username']. "\\nEmail: ". $row['email']. "\\nRole: ". $row['rol']. "\\nPassword: ". $row['password']. "');\"> View</button>";
        echo "<button class='edit-btn'><a href='edit.php?id=". $row['id']. "'>Edit</a></button>";
        echo "<button class='delete-btn'><a href='delete.php?id=". $row['id']. "'>Delete</a></button>";
        echo "</div>";
        echo "</div>";
    }
    ?>
</div>
</body>
</html>