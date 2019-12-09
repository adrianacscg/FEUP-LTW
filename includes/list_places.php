<?php
include_once('../database/db_places.php');

function list_places($localidade,$checkin=0,$checkout=0){

    $places=get_places($localidade);
    
    echo '<ul>';
    foreach($places as $place){
        
        echo '<li>' . $place['nome'] . '</li>';
        echo '<li>' . "<a href=../pages/anuncio.php?id=". $place['idMoradia'] .">Ver Casa</a>" . '</li>';
        echo '<br></br>';
    }
    echo '</ul>';

}

function list_place($id){

    $place = getPlace($id);  

    echo '<h2>' . $place['nome'] .'</h2>';

    //perguntar ao joao como fez para fazer Display das imagens

    
    list_images($id);
    
    //lista as comodidades existentes

    echo '<h3>Comodidades:</h3>';

    list_comodidades($id);
    
    // disponibilidades
    echo '<form action= "../PHP/action_reserva.php" method="GET">';

        echo '<label for= "datIni">Data de Inicio</label>';
        echo '<input type= "date" name= "dataInicio" id= "datIni">';

        echo '<label for = "dataFim">Data de Fim</label>';
        echo '<input type= "date" name= "dataFim" id= "datFim" >';
        
        
        
        echo '<input type= "submit" value= "Book Now">';
    echo '</form>';

    //Preço (utilizar javascript)
    
    
    echo '<p>Preco por noite:</p> <p id="precoD">' . $place['preco'] . '</p>';
    echo '<p>Preco Total:</p>';
    echo '<input type="text" readonly id="precoT">';

        

}

function list_comodidades($id){

    $comodidades = getComodidades($id);

    if(empty($comodidades)){

        echo '<p> Nao existem comodidades para esta moradia!</p>';
    }else{

        echo '<ul>';
        
        foreach ($comodidades as $comod){
            echo '<li>'. $comod['tipo'] .'</li>';
        }

        echo '</ul>';
    }
}

function list_images($id){

    //contem imagens da moradia
    $imgs= getImagesPlaces($id);
    
    if(empty($imgs)){
        echo '<p> Esta moradia nao tem fotos!</p>';
    }else{
        
        foreach($imgs as $img){
            
            echo '<img src="'. $img['caminho'] . '" width="200" height= "200" >';  
        }
    }
}
?>