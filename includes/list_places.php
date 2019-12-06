<?php
include_once('../database/db_places.php');

function list_places($localidade,$checkin=0,$checkout=0){

    $places=get_places($localidade,$checkin,$checkout);

    foreach($places as $place){
        echo '<ul>';
        echo '<li>' . $place['nome'] . '</li>';
        echo '<li>' . "<a href=../pages/anuncio.php?id=". $place['idMoradia'] .">Ver Casa</a>";
    }
    

}

?>