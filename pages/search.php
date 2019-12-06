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
        <form method="GET" action= "search.php">
            <input type="text" placeholder="where do you want to go?" name= "loc" required>
            <input type="date" placeholder="check-in" name="ci">
            <input type="date" placeholder="check-out" name="co">
        </form>

        <?php
        if(isset($_GET['loc'])){
            list_places($_GET['loc']);
        }else{
            echo '<p>Pesquisa alguma coisa oh banana de merda</p>';
        }
        ?>
        
    </body>
</html>