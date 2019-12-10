<?php
include_once('../database/db_places.php');

function list_places($localidade,$checkin,$checkout){
    
    if($checkin==""){
        $places=get_places($localidade);
    }else {
        
        $places=get_places($localidade, $checkin, $checkout);
    }
    
    echo '<ul>';
    foreach($places as $place){
        
        echo '<li>' . $place['nome'] . '</li>';
        list_images($place['idMoradia']);
        echo '<li>Preco/dia: ' . $place['preco'] .'</li>';
        echo '<li>' . "<a href=../pages/anuncio.php?id=". $place['idMoradia'] . '&ci=' . $checkin . '&co=' . $checkout .">Ver Casa</a>" . '</li>';
        
        echo '<br></br>';
    }
    echo '</ul>';

}

function list_place($id,$checkin,$checkout){
    
    $place = getPlace($id);  

    echo '<h2>' . $place['nome'] .'</h2>';

    //perguntar ao joao como fez para fazer Display das imagens

    
    list_images($id);
    
    //lista as comodidades existentes

    echo '<h3>Comodidades:</h3>';

    list_comodidades($id);
    
    echo '<br></br>';
    // disponibilidades
    echo '<form id="Sform" action= "../actions/action_add_reser.php" method="POST">';
        
        echo '<input type="text" name="idM" value="' . $id . '" hidden>';
        
        echo '<label for= "datIni">Data de Inicio</label>';
        echo '<input type= "text" name= "dataInicio" id= "datIni" readonly value=' . $checkin . '>';

        echo '<br></br>';
        
        echo '<label for = "dataFim">Data de Fim</label>';
        echo '<input type= "text" name= "dataFim" id= "datFim" readonly value=' . $checkout . '>';
        
        echo '<div id="preco">';
        echo '<p>Preco por noite:</p> <p id="precoD">' . $place['preco'] . '</p>';
        echo '</div>';

        echo '<div id="DPT">';
        echo '<p>Preco Total:</p>';
        echo '<input type="text" name= "precoT" id="precoT" readonly>';
        echo '</div>';

        echo '<br></br>';

        echo '<input id="btn" type= "submit" value= "Book Now">';
    echo '</form>';

    //Preço (utilizar javascript)
    
    
    

        

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

    