
<?php
    include_once('../database/places.php');
    
    //info tem a informacao sobre o sitio
    $place = getPlace($_GET['id']);

        
    
    if($place==-1){
        die(header('Location: ../html/main.html'));
    }

    $imgs= getPlace($place['id']);
    if($imgs == -1){
        $imgs == [];
    }

    
        
?>

<!DOCTYPE html>
<html lang="en-US">
    <head>
        <title>Travel Crib</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/CSS" href="../CSS/anuncio.css">
    </head>
    <body>
        
    <header>
        <h1><a href="main.html">Travel Crib</a></h1>
    </header>

    <h2> <?= $info['nome']?></h2>

    <!--perguntar ao joao como fez para fazer Display das imagens-->




        
    </body>
</html>
