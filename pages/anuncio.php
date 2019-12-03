
<?php
    include_once('../includes/session.php');
    include_once('../database/db_places.php');
    
    //info tem a informacao sobre o sitio
    $place = getPlace($_GET['id']);

        
    
    if($place==array()){
        die(header('Location: ../html/main.html'));
    }

    $imgs= getPlace($place['id']);


    $comodidades = getComodidades($id);

        
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

    <h2> <?= $info['nome'];?></h2>

    <!--perguntar ao joao como fez para fazer Display das imagens-->



    
    <!-- lista as comodidades existentes -->
    <ul>
        <?php 
            foreach ($comodidades as $comod){
                echo '<li>'.$comod.'</li>';
            }
        ?>
    </ul>
    
    <!-- disponibilidades -->
    <form action= "../PHP/action_reserva.php" method="GET">

        <label for="datIni">Data de Inicio</label>
        <input type="date" name="dataInicio" id="datIni">

        <label for = "dataFim">Data de Fim</label>
        <input type="date" name="dataFim" id= "datFim">
        
        
        
        <input type= "submit" value= "Book Now">
    </form>

    <!-- Preço -->
    
    

        
    </body>
</html>
