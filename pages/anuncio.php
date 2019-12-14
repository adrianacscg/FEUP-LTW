
<?php
    include_once('../includes/session.php');
    include_once('../includes/list_places.php');

    
    if(!isset($_GET['id'])){
        die(header('Location: ../pages/search.php'));
    }
    
    
?>

<!DOCTYPE html>
<html lang="en-US">
    <head>
        <title>Travel Crib</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/CSS" href="../CSS/anuncio.css">
        <link rel="stylesheet" type="text/CSS" href="../CSS/showslides.css">
        <script src="../JS/showslides.js" async></script>
        <script src="../JS/anuncio.js" defer></script>
 
    </head>
    <body>
        
    <header>
        <h1><a href="main.html">Travel Crib</a></h1>
    </header>

        <?php 
        
        $id= preg_replace("/[^0-9]/",'',$_GET['id']);

        if (isset($_GET['ci'])) 
            $ci=preg_replace('/[^0-9\-]/','',$_GET['ci']);
        else
            $ci="";
        
        if (isset($_GET['co']))
            $co=preg_replace('/[^0-9\-]/','',$_GET['co']);
        else
            $co="";

        list_place($id,$ci,$co);
        
        
        ?>


        
    </body>
</html>
