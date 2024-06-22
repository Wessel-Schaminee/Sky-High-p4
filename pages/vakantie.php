<?php
require('conn.php');

$_vakantieid = $_GET['id'];
$_SESSION['placeid'] = $_vakantieid;

$stmt = $conn->query("SELECT * FROM placemeta WHERE id = '$_vakantieid'");
$row = $stmt->fetch();
$stmt->execute();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" href="../assets/css/style.css">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Vakantie</title>
</head>
<body>
<div class="container">
        <?php
        echo "<img src='../assets/img/" . $row['imgname'] . "'>";
        echo "<div class='title'>" . $row['name'] . "</div>";
        echo "<div class='subtitle'>" . $row['description'] . "</div>";
        echo "<div class='price'>" . $row['price'] . " Euro</div>";
        echo "<button id='book-now' class='button book-now'>Boek nu</button>";
        ?>
    </div>

<div class="modal" id="booking-modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Book Your Vacation</h4>

            </div>
            <div class="modal-body">
                <form id="booking-form" action="booking_logic.php" method="post" >
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
                    <input type="hidden" id="placeid" name="placeid" value="<?php echo $_SESSION['placeid'];?>">
                    <br><br>
                    <button type="submit" id="book-button">Book Now</button>
                </form>
            </div>
            <button type="button" class="close" id="close-modal">x</button>
        </div>
    </div>
</div>
<script>
    const bookNowButton = document.getElementById('book-now');
    const closeModalButton = document.getElementById('close-modal');
    const bookingModal = document.getElementById('booking-modal');
    const bookingForm = document.getElementById('booking-form');

    bookNowButton.addEventListener('click', () => {
        bookingModal.style.display = 'block';
    });

    closeModalButton.addEventListener('click', () => {
        bookingModal.style.display = 'none';
    });
</script>
</body>
</html>
