
<?php
    include_once('../includes/session.php');
    include_once('../includes/list_places.php');

    
    if(!isset($_GET['id'])){
        die(header('Location: ../html/main.html'));
    }
    
    
?>

<!DOCTYPE html>
<html lang="en-US">
    <head>
        <title>Travel Crib</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/CSS" href="../CSS/anuncio.css">
        <script src="../JS/anuncio.js" defer></script>
 
    </head>
    <body>
        
    <header>
        <h1><a href="main.html">Travel Crib</a></h1>
    </header>

        <?php list_place($_GET['id'],$_GET['ci'],$_GET['co']);?>

        
    </body>
</html>
