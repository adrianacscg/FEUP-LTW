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
</head>

<body>
    <header>
        <h1><a href="main.html">Travel Crib</a></h1>
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
        <img src="../img/ProfilePictures/perfilPadrao.jpg" alt=" ">
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
        <a href="#addnewcard"> <img src="../icons/+.png" alt="Symbol More"> </a>
        <h3><a href="#addnewcard.php">Add New Card</a></h3>
    </section>
    <section id="MyBookings">
        <h2><a>My Bookings</a></h2>
        <!-- <img src="<?php echo  htmlentities('../bookingsPictures/' . $_SESSION['reserva']['mybooking']) ?>" alt="Booking Picture"> -->
        <div class="imageHolder">
            <ul class="slider">
                <li>
                    <input type="radio" id="slide1" name="slide" checked>
                    <label for="slide1"></label>
                    <img src="../img/Bookings/booking1.jpg" />
                </li>
                <li>
                    <input type="radio" id="slide2" name="slide">
                    <label for="slide2"></label>
                    <img src="../img/Bookings/booking2.jpg" />
                </li>
                <li>
                    <input type="radio" id="slide3" name="slide">
                    <label for="slide3"></label>
                    <img src="../img/Bookings/booking3.jpg" />
                </li>
            </ul>
            <div class="fundo"><br></div>
            <div class="caption1"><a>Suite Star</a></div>
            <div class="forday"><br>&nbsp;/&nbsp;day</div>
            <div class="price"><br>850€</div>
            <div class="star1"> <img src="../icons/star.png" width="15px" height="15px" /> </div>
            <div class="star2"> <img src="../icons/star.png" width="15px" height="15px" /> </div>
            <div class="star3"> <img src="../icons/star.png" width="15px" height="15px" /> </div>
            <div class="star4"> <img src="../icons/star.png" width="15px" height="15px" /> </div>
            <div class="star5"> <img src="../icons/star.png" width="15px" height="15px" /> </div>
        </div>
        <h3> Dates:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;to</h3>
        <div class="dateInitial"><a>15/3/2019</a> </div>
        <div class="dateFinal"><br>21/3/2019</div>
        <h3>Total Amount paid:</h3>
        <div class="total"><br>5100€</div>
        <!-- <img src="<?php echo  htmlentities('../bookingsPictures/' . $_SESSION['reserva']['mybooking']) ?>" alt="Booking Picture"> -->
        <div class="imageHolder">
            <ul class="slider">
                <li>
                    <input type="radio" id="slide1" name="slide" checked>
                    <label for="slide1"></label>
                    <img src="../img/Bookings/booking1.jpg" />
                </li>
                <li>
                    <input type="radio" id="slide2" name="slide">
                    <label for="slide2"></label>
                    <img src="../img/Bookings/booking2.jpg" />
                </li>
                <li>
                    <input type="radio" id="slide3" name="slide">
                    <label for="slide3"></label>
                    <img src="../img/Bookings/booking3.jpg" />
                </li>
            </ul>
            <div class="fundo"><br></div>
            <div class="caption1"><a>Suite Star</a></div>
            <div class="forday"><br>&nbsp;/&nbsp;day</div>
            <div class="price"><br>850€</div>
            <div class="star1"> <img src="../icons/star.png" width="15px" height="15px" /> </div>
            <div class="star2"> <img src="../icons/star.png" width="15px" height="15px" /> </div>
            <div class="star3"> <img src="../icons/star.png" width="15px" height="15px" /> </div>
            <div class="star4"> <img src="../icons/star.png" width="15px" height="15px" /> </div>
            <div class="star5"> <img src="../icons/star.png" width="15px" height="15px" /> </div>
        </div>
        <h3> Dates:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;to</h3>
        <div class="dateInitial"><a>15/3/2019</a> </div>
        <div class="dateFinal"><br>21/3/2019</div>
        <h3>Total Amount paid:</h3>
        <div class="total"><br>5100€</div>
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