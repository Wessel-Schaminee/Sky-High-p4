<?php
session_start();
require ('conn.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vacations</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>

<body>
    <div class="header">
        <h1 class="logo">Sky-High</h1>
        <div class="quick-acctions">
            <nav>
                <a href="../index.php" id="home-link">Home</a>
                <a href="#" title="Your in vacations" id="vacation-link">Vacations</a>
                <a href="">Deals</a>
                <a href="contact.php" id="contact-link">Contact</a>
            </nav>
        </div>
        <div class="search-container input-user ">
            <form action="result.php" method="post">
                <input name="search" type="text" class="userinput" id="search-input" placeholder="">
                <label for="name" class="userlabel">Search your vacation</label>
                <input type="submit" id="search-suggestions">
                </input>
            </form>
        </div>
        <div class="login-account">
            <a href="inlog.php"><button>login</button></a>
        </div>

    </div>
    <div class="vaction-page">
        <div class="container">
            <?php
            $stmt = $conn->query("SELECT * FROM placemeta");



            while ($row = $stmt->fetch()) {
                echo  "<div class='box'>";
                  echo "<div class='box-img'><img src='../assets/img/" . $row['imgname'] . "'></div>";
                  echo "<div class='informatie'>";
                   echo   "<div class='name-vacation'>";
                   echo       "<h1 >" . $row['name'] . "</h1 >";
                   echo   "</div >";
                   echo   "<div class='description-vacation' >";
                    echo      "<p >" . $row['description'] . "</p >";
                    echo  "</div >";
                    echo   "<div class='description-price'>";
                    echo      "<button class='button-price'><a href='vakantie.php?id=". $row['id']. "'>Info/Boeken</a></button>";
                    echo  "</div>";
                echo  "</div >";
             echo "</div >";
              }
              ?>
        </div>
    </div>
    <div class="modal" id="booking-modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Book Your Vacation</h4>

                </div>
                <div class="modal-body">

                    <form id="booking-form">
                        <label for="date">Select Date:</label>
                        <input type="date" id="date" name="date">
                        <br><br>
                        <label for="people">Number of People:</label>
                        <select id="people" name="people" onchange="changetext()">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="contact">More? Contact us!</option>
                        </select>
                        <br><br>
                        <button type="submit" id="book-button">Book Now</button>
                    </form>
                </div>
                <button type="button" class="close" id="close-modal">x</button>
            </div>
        </div>
    </div>

    <script src="../assets/js/main.jsx"></script>
</body>

</html>