<?php
    include_once("../includes/list_places.php");
?>

<!DOCTYPE html>
<html lang="en-US">
    <head>
        <title>RentAHouse</title>
        
        <meta charset="UTF-8">
    </head>
    <body>
        <form id= "Sform" method="GET" action= "search.php">
            <input type="text" placeholder="where do you want to go?" name= "loc" required>
            <input type="date" id="datIni" placeholder="check-in" name="ci">
            <input type="date" id="datFim" placeholder="check-out" name="co">
        </form>

        <?php
        if(isset($_GET['loc']) && !isset($_GET['c1'])){

            //filtra caracteres que nao sao letras
            list_places(preg_replace ("/[^a-zA-Z\s]/", '', $_GET['loc']),$_GET['ci'],$_GET['co']);
            
        }else if (isset($_GET['c1']))
        {
        
        }else{
            echo '<p>Pesquisa alguma coisa oh banana de merda</p>';
        }
        ?>
        
    </body>
</html>