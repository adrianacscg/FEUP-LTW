<?php
session_start();
include_once('../PHP/userinfo.php');
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
        if(strlen(getProfliePic($_SESSION['email'])) != 0)
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
        <p id="nobookgs"> No Bookings!</p>
        <!-- <img src="<?php echo  htmlentities('../bookingsPictures/' . $_SESSION['reserva']['mybooking']) ?>" alt="Booking Picture"> -->
        <div class="slideshow-container">
            <!-- Full-width images with number and caption text -->
            <div class="mySlides fade">
                <img src="../img/Bookings/booking1.jpg" width="100%" height="380px">
            </div>
            <div class="mySlides fade">
                <img src="../img/Bookings/booking2.jpg" width="100%" height="380px">
            </div>
            <div class="mySlides fade">
                <img src="../img/Bookings/booking3.jpg" width="100%" height="380px">
            </div>
            <div class="text"><?php echo htmlentities($_SESSION['email']) ?></div>

            <!-- Next and previous buttons -->
            <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
            <a class="next" onclick="plusSlides(1)">&#10095;</a>

            <!-- caption -->
            <div class="fundo"><br></div>
            <div class="caption1"><a>Suite Star</a></div>
            <div class="forday"><br>&nbsp;/&nbsp;day</div>
            <div class="price"><br>850€</div>
            <div class="star1"> <img src="../icons/star.png" width="25px" height="25px" /> </div>
            <div class="star2"> <img src="../icons/star.png" width="25px" height="25px" /> </div>
            <div class="star3"> <img src="../icons/star.png" width="25px" height="25px" /> </div>
            <div class="star4"> <img src="../icons/star.png" width="25px" height="25px" /> </div>
            <div class="star5"> <img src="../icons/star.png" width="25px" height="25px" /> </div>
        </div>
        <!-- The dots/circles -->
        <div class="circle">
            <span class="dot" onclick="currentSlide(1)"></span>
            <span class="dot" onclick="currentSlide(2)"></span>
            <span class="dot" onclick="currentSlide(3)"></span>
        </div>

        <h3> Dates:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;to</h3>
        <h3>Total Amount paid:</h3>
        </div>
        <br>
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