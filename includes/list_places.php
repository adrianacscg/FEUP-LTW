<?php
include_once('../database/db_places.php');

function list_places($localidade,$checkin,$checkout){

    $places=get_places($localidade,$checkin,$checkout);

    foreach($places as $place){
        echo '<ul>';
        echo '<li>' . '<a href=../pages/anuncio.php?>'
    }

}

?>