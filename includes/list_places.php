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

function list_comodidades($id){

    $comodidades = getComodidades($_GET['id']);
    echo '<ul>';
    
    foreach ($comodidades as $comod){
        echo '<li>'. $comod['tipo'] .'</li>';
    }

    echo '</ul>';
}

function list_images($id){

    //contem imagens da moradia
    $imgs= getImagesPlaces($_GET['id']);   
    
    foreach($imgs as $img){
        
        echo '<img src="'. $img['caminho'] . '" width="200" height= "200" >';  
    }
}
?>