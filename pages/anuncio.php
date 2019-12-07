
<?php
    include_once('../includes/list_places.php');

    
    if(!isset($_GET['id'])){
        die(header('Location: ../html/main.html'));
    }

    //info tem a informacao sobre o sitio
    $place = getPlace($_GET['id']);
    
   
    //contem imagens da moradia
    $imgs= getImagesPlaces($_GET['id']);    

   
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

    <h2> <?= $place['nome'];?></h2>

    <!--perguntar ao joao como fez para fazer Display das imagens-->

    
    <?php list_images($_GET['id']);?>
    
    <!-- lista as comodidades existentes -->
    <h3>Comodidades:</h3>
    <?php list_comodidades($_GET['id']);?>
    
    <!-- disponibilidades -->
    <form action= "../PHP/action_reserva.php" method="GET">

        <label for= "datIni">Data de Inicio</label>
        <input type= "date" name= "dataInicio" id= "datIni">

        <label for = "dataFim">Data de Fim</label>
        <input type= "date" name= "dataFim" id= "datFim" >
        
        
        
        <input type= "submit" value= "Book Now">
    </form>

    <!-- Preço (utilizar javascript) -->
    

    <p>Preco: </p>  
    

        
    </body>
</html>
