<?php
session_start();
include_once('../PHP/userinfo.php');
include_once('../PHP/moradiasinfo.php');
include_once('../database/db_user.php');

?>
<!DOCTYPE html>
<html lang="en-US">

<head>
    <title>Tavel Crib - Profile</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/CSS" href="../CSS/profile.css">
    <script src="../JS/changesuser.js" defer></script>
    <script src="../JS/changecard.js" defer></script>
    <script src="../JS/showslides.js" async></script>
</head>

<body>
    <header>
        <h1><a href="../html/index.html">Travel Crib</a></h1>
    </header>
    <nav id="menu">
        <input type="checkbox" id="hamburger">
        <label class="hamburger" for="hamburger"></label>
        <ul>
            <li><a href="#MyProfile">My Profile</a></li>
            <li><a href="#MyBookings">My Bookings</a></li>
            <li><a href="#MyProperties">My Properties</a></li>
            <li><a href="main.html">Logout</a></li>
        </ul>
    </nav>
    <section id="MyProfile">
        <img src="<?php
                    if (strlen(getProfliePic($_SESSION['email'])) != 0)
                        echo htmlentities(getProfliePic($_SESSION['email']));
                    else echo htmlentities("../img/ProfilePictures/perfilPadrao.jpg");
                    ?>" alt="ProfilePic">
        <h1><a> <?php echo htmlentities(getName($_SESSION['email'])) ?> </a></h1>
        <h3><a href="#changemail">Change Email |&nbsp; </a></h3>
        <div id="changemail" class="modalmail">
            <a href="#close" title="Close" class="close">X</a>
            <form id="formchangemail" method="POST" action="../actions/action_change_mail.php">
                <label for="idEmail">Email</label>
                <input id="idEmail" type="email" name="email" autocomplete="off" required>
                <p id="checked">Email já registrado!</p>
                <input id="updatemail" type="submit" value="Update">
            </form>
        </div>
        <h3><a href="#changeprofilepic">Change Profile Picture </a></h3>
        <div id="changeprofilepic" class="modalpic">
            <a href="#close" title="Close" class="close">X</a>
            <form action="../actions/action_change_pic.php" method="post" enctype="multipart/form-data">
                <input type="file" name="image">
                <input type="submit" value="Upload">
            </form>
        </div>
        <h3><a>Email: </a></h3>
        <p class="mail"><?php echo htmlentities($_SESSION['email']) ?></p>
        <h3><a href="#changepass">Change Password</a></h3>
        <div id="changepass" class="modal">
            <a href="#close" title="Close" class="close">X</a>
            <form id="formchangepass" method="POST" action="../actions/action_change_password.php">
                <label for="idPassword">Password</label>
                <input id="idPassword" type="password" name="password" autocomplete="off" required>
                <br><br>
                <label for="idPasswordR">Repeat Password</label>
                <input id="idPasswordR" type="password" name="Rpassword" autocomplete="off" required>
                <p id="match">As palavras-passe devem ser identicas!</p>
                <input id="updatepass" type="submit" value="Update">
            </form>
        </div>
        <h2><a>Payment Methods</a></h2>
        <h3><a><?php
                if (getCard($_SESSION['email']) != null) {

                    $card = str_replace(substr(getCard($_SESSION['email']), 0, -4), '************', getCard($_SESSION['email']));
                    echo htmlentities('Card:' . ' ' . $card);
                } else echo 'No credit cards';
                ?></a></h3>
        <a href="#changecard"> <img src="../icons/lapis.png" alt="Symbol More"> </a>
        <h3><a href="#changecard">Edit Card</a></h3>
        <div id="changecard" class="modalcard">
            <a href="#close" title="Close" class="close">X</a>
            <form id="formchangecard" method="POST" action="../actions/action_change_card.php">
                <label for="idcard">Card</label>
                <input id="idcard" type="number" name="card" autocomplete="off" required>
                <p id="message">Introduza um cartão valido!</p>
                <input id="updatecard" type="submit" value="Update">
            </form>
        </div>
    </section>
    <section id="MyBookings">
        <h2><a>My Bookings</a></h2>
    
        <!-- Full-width images with number and caption text -->
        <?php
        $iduser = getID($_SESSION['email']);
        $bookings = getBookings($iduser);
        $counterbookings = -1;

        if($bookings == null) {
            echo("<p style='font-weight: bold'>No Bookings!</p>");
        } 

        foreach ($bookings as $idBooking) {
            foreach ($idBooking as $booking)
                $idBooking = $booking;

            echo ('<div class="slideshow-container">');
            $images = getImgsMoradia($idBooking);
            $counterimg = 0;
            $counterbookings++;

            foreach ($images as $image) {
                foreach ($image as $pathimage)
                    $image = $pathimage;

                echo ("<div class='mySlides$counterbookings'>");
                echo ("<img src={$image}" . ' ' . 'width="100%" height="380px">');
                echo ('</div>');
                $counterimg++;
            }

            // Next and previous buttons 
            echo ("<a class='prev' onclick='plusSlides(-1,$counterbookings)'>&#10094;</a>");
            echo ("<a class='next' onclick='plusSlides(1,$counterbookings)''>&#10095;</a>");

            // caption
            echo ('<div class="fundo"><br></div>');
            echo ('<div class="caption1"><a>');
            echo (getNameMoradia($idBooking));
            echo ('</a></div>');
            echo ('<div class="forday"><br>&nbsp;/&nbsp;night</div>');
            echo ('<div class="price"><br>');
            echo (getPrice($idBooking));
            echo ('</div>');

            $Rating = getRating($idBooking);

            for($i=1; $i <= $Rating; $i++)
            {
                echo("<div class='star{$i}'>");
                echo('<img src="../icons/star.png" width="25px" height="25px" /> </div>');
            }
            echo('</div>');

            //Dates and Total Amount Paid
            echo('<h3> Dates: ');
            echo(getDateStart($idBooking));
            echo(" to ");
            echo(getDateFinish($idBooking));
            echo('</h3>');

            echo('<h3>Total Amount paid: ');
            echo(getTotalPrice($idBooking));
            echo('</h3>');

            echo('</div>');
        }
        ?>
    </section>

    <section id="MyProperties">
        <h2>My Properties</h2>
        <h3><a href="addproperty.php">Add Property </a></h3>
        <h3><a href="editproperty.php">Edit Existing Property </a></h3>
        <a href="moreprop.php"><img src="../icons/+.png" alt="Symbol More"> </a>
        <a href="edit.php"> <img src="../icons/lapis.png" alt="Pencil"> </a>
    </section>
</body>
<footer>
    <h1> Travel Crib </h1>
    <a href="main.html#about">About Us</a>
    <p> made with &#10084 2019 &#9400 Copyright </p>
</footer>

</html>