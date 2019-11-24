<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en-US">

<head>
    <title>RentAHouse - Profile</title>
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
            <li><a href="#MyBooking">My Booking</a></li>
            <li><a href="#MyProperties">My Properties</a></li>
            <li><a href="#Logout">Logout</a></li>
        </ul>
    </nav>
    <section id="MyProfile">
        <h1><a> <?php echo htmlentities($_SESSION['userinfo']['nomeCompleto']) ?> </a></h1>
        <h2><a>Email: <?php echo htmlentities($_SESSION['userinfo']['email']) ?></a></h2>
        

    </section>
</body>

</html>
