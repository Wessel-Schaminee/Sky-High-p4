<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vacantion Uploader</title>
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
    <div class="inhetvakje">
        <form action="addvacation.php" method="post" enctype="multipart/form-data" class="vacation-form">
            <input type="text" name="name" id="name" placeholder="Name vacation" class="form-inputss">
            <input type="text" name="description" placeholder="description" id="description" class="form-inputss">
            <input type="number" name="price" id="price" placeholder="price" class="form-inputss">
            <label for="file" class="file-label">Select image</label>
            <input type="file" name="fileToUpload" id="fileToUpload" class="file-input">
            <input type="submit" value="Upload Image" name="submit" class="submit-btn">
        </form>
    </div>

</body>

</html>