<?php
session_start();
require ('conn.php');

if (!isset($_SESSION['user'])) {
    header("Location: inlog.php");
    exit();
}
$username = $_SESSION['user'];
$stmt = $conn->prepare("SELECT id FROM users WHERE username = :username");
$stmt->bindParam(':username', $username);
$stmt->execute();
$result2 = $stmt->fetch();

$userid = $result2['id'];

$stmt = $conn->prepare("
        SELECT *
        FROM placemeta
        INNER JOIN booking ON booking.placeid = placemeta.id
        WHERE booking.userid = :userid
    ");
    $stmt->bindParam(':userid', $userid);
    $stmt->execute();

    $result = $stmt->fetchAll();

?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../assets/css/style.css">
    <title>Dashboard</title>
</head>

<body>
<div class="header">
        <h1 class="logo">Sky-High</h1>
        <div class="quick-acctions">
            <nav>
                <a href="../index.php" id="home-link">Home</a>
                <a href="vakanties.php" title="Your in vacations" id="vacation-link">Vacations</a>
                <a href="">Deals</a>
                <a href="contact.php" id="contact-link">Contact</a>
            </nav>
        </div>
        <div class="search-container input-user ">
            <input name="search" type="text" class="userinput" id="search-input" placeholder="">
            <label for="name" class="userlabel">Search your vacation</label>
            <ul id="search-suggestions">
            </ul>
        </div>
        <div class="login-account">
            <a href="inlog.php"><button>login</button></a>
        </div>

    </div>
</div>
    <div class="dashboard-container">
        <div class="sidebar">
            <h1>Welkom <?php echo ($_SESSION['user']) ?></h1>
            <button class="btn-register">Aanmelden als aanbieder</button>
            <form action="logout.php" method="post">
                <input type="submit" class="button-24" value="Log Out">
                <button role="button"></button>
            </form>




        </div>
        <div class="maincontainer">
  <h1 class="title-list">Mijn Reizen</h1>
  <?php
    if (!empty($result)) {
      foreach ($result as $row) {
        echo '<p>----------------------</p>';
        echo '<div class="item">';
        echo '<span class="item-label">Name:</span> ' . htmlspecialchars($row["name"]) . '<br>';
        echo '<span class="item-label">Mensen:</span> ' . htmlspecialchars($row["ampeople"]) . '<br>';
        echo '<span class="item-label">Datum:</span> ' . htmlspecialchars($row["date"]) . '<br>';
        echo '<span class="item-label">Prijs:</span> ' . htmlspecialchars($row["price"]) . '<br>';
        echo '<form action="delete_booking.php" method="post">';
        echo '<input type="hidden" name="booking_id" value="' . ($row["bookingid"]) . '">';
        echo '<input title="Please dont cancel me..." class="cancel-trip" type="submit" value="Cancel This Trip">';
        echo '</form>';
       
        echo '</div>';
       
      }
    } else {
      echo '<p class="no-results">No results found</p>';
    }
  ?>
</div>


    <div class="modal" id="register-modal">
        <div class="modal-content">
                <h2>Aanmelden als Aanbieder</h2>
                <form action="aanbieder.php" method="post">
                    <label for="name">Naam:</label>
                    <input type="text" id="name" name="name"><br><br>
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email"><br><br>
                    <label for="password">Aanbieders naam:</label>
                    <input type="text" id="password" name="password"><br><br>
                    <input type="submit" value="Register">
                </form>
            </div>
        </div>
    </div>

    <div class="feedback-modal" id="feedback-modal">
    <div class="feedback-modal-content">
        <span class="closes" id="close-feedback">&times;</span>
        <h2>Geef ons feedback</h2>
        <form action="feedback_logic.php" method="post" class="feedback-form">
            <label for="feedback">Uw feedback:</label>
            <textarea id="feedback" name="feedback" rows="4" required></textarea><br><br>
            <input type="submit" value="Verstuur">
        </form>
    </div>
</div>

<script>
    const registerBtn = document.querySelector('.btn-register');
    const registerModal = document.querySelector('#register-modal');
    const feedbackModal = document.querySelector('#feedback-modal');
    const closeFeedback = document.querySelector('#close-feedback');

    registerBtn.addEventListener('click', () => {
        registerModal.style.display = 'block';
    });

    window.addEventListener('click', (e) => {
        if (e.target === registerModal) {
            registerModal.style.display = 'none';
        }
        if (e.target === feedbackModal) {
            feedbackModal.style.display = 'none';
        }
    });

    closeFeedback.addEventListener('click', () => {
        feedbackModal.style.display = 'none';
    });

    setTimeout(() => {
        feedbackModal.style.display = 'block';
    }, 60000); 
</script>
</body>

</html>