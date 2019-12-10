<?php
    include_once("../includes/list_places.php");
?>

<!DOCTYPE html>
<html lang="en-US">
    <head>
        <title>RentAHouse</title>
        <link rel="stylesheet" type="text/CSS" href="../CSS/search.css">
        <meta charset="UTF-8">
    </head>
    <body>
        <form id= "Sform" method="GET" action= "search.php">
            <input type="text" id="loca" placeholder="where do you want to go?" name= "loc" required>
            <input type="date" id="datIni" placeholder="check-in" name="ci">
            <input type="date" id="datFim" placeholder="check-out" name="co">
        </form>

        <?php
            //filtra caracteres que nao sao letras
            list_places(preg_replace ("/[^a-zA-Z\s]/", '', $_GET['loc']),$_GET['ci'],$_GET['co']);

        ?>
        <aside>

        </aside>
        
    </body>
</html>