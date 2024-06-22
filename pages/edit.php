<?php
session_start();
require ('conn.php');

$targetid = $_GET['id'];

$stmt = $conn->prepare("SELECT * FROM users WHERE id=:userid");
$stmt->bindParam(':userid', $targetid);
$stmt->execute();
$user = $stmt->fetch();


$password = $user['password'];
$email = $user['email'];
$username = $user['username'];
$role = $user['rol'];



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>

<body class="Update-body">
    <div class="update-page">
        <a id="go-back" href="admindashboard.php">Go back</a>
        <h1><span id="username">User, <?php echo $user['username']; ?></span></h1>
        <form class="edit-form" action="edit_logic.php" method="post">
            <label for="username">Username:</label>
            <input required type="text" id="username" name="username" value="<?php echo $username ?>" placeholder="New Username">
            <label for="email">Email:</label>
            <input required type="email" id="email" name="email" value="<?php echo $email ?>" placeholder="New Email">
            <label for="password">Password:</label>
            <input required type="text" id="password" value="<?php echo $password ?>" placeholder="New Password" name="password">
            <label for="password">Role:</label>
            <input required type="text" id="password" value="<?php echo $role ?>" placeholder="role" name="role">
            <label for="userid">Id:</label>
            <input disabled required type="text" id="userid" name="userid" value="<?php echo $targetid ?>">
            <input type="submit" value="Update">
        </form>
    </div>
</body>

</html>