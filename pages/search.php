<?php
    include_once("../includes/list_places.php");
    include_once('../includes/components/footer.php');
    include_once('../includes/components/header.php');
?>

<!DOCTYPE html>
<html lang="en-US">
    <head>
        <title>Travel Crib</title>
        <link rel="stylesheet" type="text/CSS" href="../CSS/search.css">
        <link rel="stylesheet" type="text/CSS" href="../CSS/showslides.css">
        <link rel="stylesheet" type="text/CSS" href="../CSS/footer.css">
        <link rel="stylesheet" type="text/CSS" href="../includes/components/footer.css">
        <link rel="stylesheet" type="text/CSS" href="../includes/components/header.css">

        <script src="../JS/search.js" defer></script>
        <script src="../JS/showslides.js" async></script>
        <meta charset="UTF-8">
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
                <li><a href="../actions/action_logout.php">Logout</a></li>
            </ul>
        </nav>
    
        <?php

            //filtra os caracteres que nao letras
            if (isset($_GET['loc']))
                $loc=preg_replace("/[^a-zA-Z\s]/",'',$_GET['loc']);
            else
                $loc="";

            if (isset($_GET['ci'])) 
                $ci=preg_replace('/[^0-9\-]/','',$_GET['ci']);
            
            if (isset($_GET['co']))
                $co=preg_replace('/[^0-9\-]/','',$_GET['co']);

            if (isset($_GET['rval']))
                $val=preg_replace('/[^0-9]/','',$_GET['rval']);
            else
                $val="";


            if(isset($_GET['loc']))
                list_places($loc,$ci,$co,$val);
            else
                echo '<p> Introduce a place to search </p>';

        ?>
        <aside>
            <form id= "Sform" method="GET" action= "search.php">
                <input type="text" id="loca" placeholder="where do you want to go?" name= "loc" value="<?=$loc;?>" required>
                <input type="date" id="datIni" placeholder="check-in" name="ci" value= "<?=$ci;?>">
                <input type="date" id="datFim" placeholder="check-out" name="co" value = "<?=$co;?>">
                
                <h3>Filter</h3>
                <br></br>
                <label for="Ranger">Price: </label>
                <input type= "range" id="Ranger" name="range" value= "<?=$val;?>" min="0" max= "10000" step="10">
                <input type="text" id="RangeValue" name="rval" readonly value= "<?=$val;?>">
                <br></br>
                <p>Type</p>
                <label for="apartment">Apartment</label>
                <input type="checkbox" id="apartment" name="apartment">
                <label for="house">House</label>
                <input type="checkbox" id="house" name="house">
                <label for="hotel">Hotel</label>
                <input type="checkbox" id="hotel" name="hotel">
                <label for="hostel">Hostel</label>
                <input type="checkbox" id="hostel" name="hostel">
                <br></br>
                <p>Comodities</p>
                <label for="pets">Pets allowed</label>
                <input type="checkbox" id="pets" name="pets">
                <label for="pool">Pool</label>
                <input type="checkbox" id="pool" name="pool">
                <label for="ac">AC</label>
                <input type="checkbox" id="ac" name="ac">
                <label for="wifi">Wi-fi</label>
                <input type="checkbox" id="wifi" name="wifi">
                <br></br>
                <input type="submit" id="submitFilter" value="Filtrar">
            </form>
        </aside>
        
    </body>
    <?php
        draw_footer();
    ?>
</html>