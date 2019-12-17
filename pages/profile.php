<?php
include_once('../includes/session.php');
include_once('../PHP/userinfo.php');
include_once('../PHP/moradiasinfo.php');
include_once('../PHP/propertiesinfo.php');
include_once('../PHP/getCancel.php');
include_once('../database/db_user.php');
include_once('../includes/components/footer.php');

//Redirect to profile page
if ($_SESSION['email'] == null)
    header('Location: ../html/index.php');
?>


<!DOCTYPE html>
<html lang="en-US">

<head>
    <title>Travel Crib - Profile</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/CSS" href="../CSS/profile.css">
    <link rel="stylesheet" type="text/CSS" href="../CSS/showslides.css">
    <link rel="stylesheet" type="text/CSS" href="../CSS/footer.css">
    <script src="../JS/property.js" defer></script>
    <script src="../JS/changesuser.js" defer></script>
    <script src="../JS/changecard.js" defer></script>
    <script src="../JS/showslides.js" async></script>
</head>

<body>
    <header>
        <h1><a href="../html/index.php">Travel Crib</a></h1>
    </header>
    <nav id="menu">
        <input type="checkbox" id="hamburger">
        <label class="hamburger" for="hamburger"></label>
        <ul>
            <li><a href="#MyProfile">My Profile</a></li>
            <li><a href="#MyBookings">My Bookings</a></li>
            <li><a href="#MyProperties">My Properties</a></li>
            <li><a href="../actions/action_logout.php">Logout</a></li>
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
                } else echo ("No credit cards!");
                ?></a></h3>
        <a href="#changecard"> <img src="../icons/lapis.PNG" alt="Symbol More"> </a>
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

        if ($bookings == null) {
            echo ("<a style='font-weight:bold'>No Bookings!</a>");
            echo ("<br><br>");
        }

        foreach ($bookings as $booking) {
            $idBooking = $booking['idMoradia'];

            echo ('<div class="slideshow-container">');
            $images = getImgsMoradia($idBooking);
            $counterimg = 0;
            $counterbookings++;

            foreach ($images as $imagee) {
                $image = $imagee['caminho'];
                echo ("<div class='mySlides$counterbookings'>");
                echo ("<img src={$image}" . ' ' . 'width="100%" height="380px">');
                echo ('</div>');
                $counterimg++;
            }

            // Next and previous buttons 
            echo ("<a class='prev' onclick='plusSlides(-1,$counterbookings)'>&#10094;</a>");
            echo ("<a class='next' onclick='plusSlides(1,$counterbookings)'>&#10095;</a>");

            // caption
            echo ('<div class="fundo"><br></div>');
            echo ("<div class='caption1'><a href='../pages/anuncio.php?id=$idBooking&ci=");
            echo(getDateStart($idBooking));
            echo('&co=');
            echo(getDateFinish($idBooking));
            echo(" '> ");
            echo (getNameMoradia($idBooking));
            echo ('</a></div>');
            echo ('<div class="forday"><br>&nbsp;/&nbsp;night</div>');
            echo ('<div class="price"><br>');
            echo (getPrice($idBooking));
            echo ('</div>');

            $Rating = getRating($idBooking);

            for ($i = 1; $i <= $Rating; $i++) {
                echo ("<div class='star{$i}'>");
                echo ('<img src="../icons/star.PNG" width="25px" height="25px" /> </div>');
            }
            echo ('</div>'); // end showslides

            //Dates and Total Amount Paid
            echo ('<h3> Dates: ');
            echo (getDateStart($idBooking));
            echo (" to ");
            echo (getDateFinish($idBooking));
            echo ('</h3>');

            echo ('<h3>Total Amount paid: ');
            echo (getTotalPrice($idBooking));
            echo ('€');
            echo ('</h3>');

            //Cancellation booking

            $cancellationfree = getCancellation($idBooking);
            $dtstartbooking = getDateStart($idBooking);

            $dtstart = date("Y-m-d", strtotime($dtstartbooking));
            $today = date("Y-m-d"); 

            if ($today < $dtstart) {
                echo("<h3><a href='../PHP/cancellation_booking.php?idbooking=$idBooking'>Cancel Reservation</a></h3>");
                echo("<a href='../PHP/cancellation_booking.php?idbooking=$idBooking'> <img src='../icons/cross.png' alt='cross'> </a>");
            }
        }
        ?>
            

    </section>

    <section id="MyProperties">
        <h2>My Properties</h2>

        <?php

        $iduser = getID($_SESSION['email']);
        $properties = getProperties($iduser);
        $bookings = getBookings($iduser);
        $counterproperties = -1;

        if ($properties == null) {
            echo ("<a style='font-weight:bold'>No Properties!</a>");
            echo ("<br><br>");
            if ($bookings == null) {
                echo ("<br>");
                echo ("<style> #MyProperties h2 { position: absolute; bottom:55px; padding: 0em 0.5em; left:50px;}
            </style>");
            }
        }

        foreach ($properties as $property) {
            $idproperty = $property['idMoradia'];


            echo ('<div class="slideshow-container">');
            $images = getImgsMoradia($idproperty);
            $counterimg = 0;
            $counterproperties++;

            foreach ($images as $imagee) {
                $image = $imagee['caminho'];

                echo ("<div class='PmySlides$counterproperties'>");
                echo ("<img src={$image}" . ' ' . 'width="100%" height="380px">');
                echo ('</div>');
                $counterimg++;
            }

            // Next and previous buttons 
            echo ("<a class='prev' onclick='plusSlidesP(-1,$counterproperties)'>&#10094;</a>");
            echo ("<a class='next' onclick='plusSlidesP(1,$counterproperties)'>&#10095;</a>");

            // caption
            echo ('<div class="fundo"><br></div>');
            echo ("<div class='caption1'><a href='../pages/anuncio.php?id=$idproperty&ci=");
            echo('&co=');
            echo(" '> ");
            echo (getNameMoradia($idproperty));
            echo ('</a></div>');
            echo ('<div class="forday"><br>&nbsp;/&nbsp;night</div>');
            echo ('<div class="price"><br>');
            echo (getPrice($idproperty));
            echo ('</div>');

            $Rating = getRating($idproperty);

            for ($i = 1; $i <= $Rating; $i++) {
                echo ("<div class='star{$i}'>");
                echo ('<img src="../icons/star.PNG" width="25px" height="25px" /> </div>');
            }
            echo ('</div>');
            echo ('<br>');
            echo ("<div id='changeproperty$idproperty' class='modalproperty'>");
            echo ('
            <a href="#close" title="Close" class="close">X</a>
            <form action="../actions/action_change_property.php" method="POST" enctype="multipart/form-data">
                <a>Preencha só o que quer alterar!! </a> 
                <br><br>');
            echo ("<input type='hidden' id='propertyId' name='propertyId' value='$idproperty'>");
            echo ('
                <label for="idNome">Property Name</label>
                <input id="idNome" type="text" name="nome" autocomplete="on" >
                <br><br>
                <label for="idPreco2">Price</label>
                <input id="idPreco2" type="number" name="preco" autocomplete="on" >
                <br><br>
                <label for="idLocalizacao">Location</label>
                <input id="idLocalizacao" type="text" name="localizacao" autocomplete="on" >
                <br><br>
                <label for="idTipo">Type</label>
                <input id="idTipo" type="text" name="tipo" autocomplete="on" >
                <br><br>
                <label for="idcancelamento">Free Cancellation ?</label>
                <input id="idcancelamento" type="text" name="cancelamento" autocomplete="on" >
                <br><br>
                <label for="idrating2">Rating</label>
                <input id="idrating2" type="number" name="rating" autocomplete="on" >
                <a>1 a 5</a> 
                <br><br>
                <label for="iddescription">Description</label>
                <input id="iddescription" type="text" name="description" size= "50" autocomplete="on" >
                <br><br>    
                <label for="idaddress">Address</label>
                <input id="idaddress" type="text" name="address" autocomplete="on" >
                <br><br>
                <label for="fotos">Add Photos to Property</label>
                <input type="file" name="foto[]" multiple="multiple" >
                <br>
                <label class="bt-file">You can select more than one!</label>
                <br><br>');

            echo ('<input id="updateproperty" type="submit" name="update_p" value="Update Property">
                <br><br>
            </form>
        </div>');

            // edit property
            echo ("<h3><a href='#changeproperty$idproperty'>Edit Existing Property</a></h3>");
            echo ("<a href='#changeproperty$idproperty'> <img src='../icons/lapis.PNG' alt='Pencil'> </a>");
        }
        ?>

        <div id="addproperty" class="modalproperty">
            <a href="#close" title="Close" class="close">X</a>
            <form action="../actions/action_add_property.php" method="POST" enctype="multipart/form-data">
                <label for="idNome">Property Name</label>
                <input id="idNome" type="text" name="nome" autocomplete="on" required>
                <br><br>
                <label for="idPreco">Price</label>
                <input id="idPreco" type="number" name="preco" autocomplete="on" required>
                <br><br>
                <label for="idLocalizacao">Location</label>
                <input id="idLocalizacao" type="text" name="localizacao" autocomplete="on" required>
                <br><br>
                <label for="idTipo">Type</label>
                <input id="idTipo" type="text" name="tipo" autocomplete="on" required>
                <br><br>
                <label for="idcancelamento">Free Cancellation ?</label>
                <input id="idcancelamento" type="text" name="cancelamento" autocomplete="on" required>
                <br><br>
                <label for="idrating">Rating</label>
                <input id="idrating" type="number" name="rating" autocomplete="on" required>
                <a>1 a 5</a>
                <br><br>
                <label for="iddescription">Description</label>
                <input id="iddescription" type="text" name="description" size="50" autocomplete="on" required>
                <br><br>
                <label for="idaddress">Address</label>
                <input id="idaddress" type="text" name="address" autocomplete="on" required>
                <br><br>
                <label for="fotos">Photos</label>
                <input type="file" name="foto[]" multiple="multiple" required />
                <br>
                <label class="bt-file">You can select more than one!</label>
                <br><br>
                <input id="addproperty1" type="submit" name="adicionar" value="Add">
                <br><br>
            </form>
        </div>
        <h3><a href="#addproperty">Add Property </a></h3>
        <a href="#addproperty"><img src="../icons/+.PNG" alt="Symbol More"> </a>
    </section>
</body>
<?php
        draw_footer();
    ?>
</html>