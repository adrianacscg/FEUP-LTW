<?php
    include_once("../includes/list_places.php");
?>

<!DOCTYPE html>
<html lang="en-US">
    <head>
        <title>RentAHouse</title>
        <link rel="stylesheet" type="text/CSS" href="../CSS/search.css">
        <link rel="stylesheet" type="text/CSS" href="../CSS/showslides.css">
        <link rel="stylesheet" type="text/CSS" href="../CSS/footer.css">
        <script src="../JS/search.js" defer></script>
        <script src="../JS/showslides.js" async></script>
        <meta charset="UTF-8">
    </head>
    <body>
    
        <?php
            //filtra caracteres que nao sao letras
            if(isset($_GET['loc']))
                list_places(preg_replace ("/[^a-zA-Z\s]/", '', $_GET['loc']),$_GET['ci'],$_GET['co'],$_GET['rval']);
            else
                echo '<p> Introduza a localidade (obrigatório) </p>';

        ?>
        <aside>
            <form id= "Sform" method="GET" action= "search.php">
                <input type="text" id="loca" placeholder="where do you want to go?" name= "loc" value="<?php if(isset($_GET['loc'])) {echo $_GET['loc'];}?>" required>
                <input type="date" id="datIni" placeholder="check-in" name="ci" value= "<?php if(isset($_GET['ci'])) {echo $_GET['ci'];}?>">
                <input type="date" id="datFim" placeholder="check-out" name="co" value = "<?php if(isset($_GET['co'])) {echo $_GET['co'];}?>">
                
                <p>Filter</p>
                <br></br>
                <input type= "range" id="Ranger" name="range" value= "<?php if(isset($_GET['rval'])) {echo $_GET['rval'];}?>" min="0" max= "10000" step="10">
                <input type="text" id="RangeValue" name="rval" readonly value= "<?php if(isset($_GET['rval'])) {echo $_GET['rval'];}?>">
                <br></br>
                <input type="submit" id="submitFilter" value="Filtrar">
            </form>
        </aside>
        
    </body>
<footer>
    <h1> Travel Crib </h1>
    <a href="main.html#about">About Us</a>
    <p> made with &#10084 2019 &#9400 Copyright </p>
</footer>
</html>