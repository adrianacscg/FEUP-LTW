<?php
include_once('../database/db_places.php');

function list_places($localidade,$checkin=0,$checkout=0){

    $places=get_places($localidade,$checkin,$checkout);
    
    echo '<ul>';
    foreach($places as $place){
        
        echo '<li>' . $place['nome'] . '</li>';
        echo '<li>' . "<a href=../pages/anuncio.php?id=". $place['idMoradia'] .">Ver Casa</a>" . '</li>';
        echo '<br></br>';
    }
    echo '</ul>';

}

?>