<?php
include_once('../database/db_places.php');
include_once('../database/db_user.php');
include_once('../PHP/moradiasinfo.php');
include_once('../includes/session.php');

function list_places($localidade,$checkin,$checkout,$preco,$types,$rating){
    
    $localidade=strtolower($localidade);

    
    if($checkin==""){
        $places=get_places($localidade);
    }else{

        $places=get_places($localidade, $checkin, $checkout,$preco,$types,$rating);
    }

    //Verifica se existem localidades com a especificacao pretendida
    if(empty($places)){
        echo "<p> There aren't places with that features! </p>";
        return;
    }
    
    
    foreach($places as $place){
        
        echo '<ul>';
            
            list_images($place['idMoradia']);
            
            
            
        echo '</ul>';
        echo "<a class='see' href=../pages/anuncio.php?id=". $place['idMoradia'] . '&ci=' . $checkin . '&co=' . $checkout .">Ver Casa</a>";
        
        
        echo '<br></br>';
      
    }
    

}

function list_place($id,$checkin,$checkout){
    
    $place = getPlace($id);  

    echo '<h2>' . $place['nome'] .'</h2>';

    //perguntar ao joao como fez para fazer Display das imagens

    list_images($id);

    echo '<br></br>';

    //lista as comodidades existentes

    echo '<h3>Comodidades:</h3>';

    list_comodidades($id);
    

    echo '<br></br>';
    // disponibilidades
    echo '<form id="Sform" action= "../actions/action_add_reser.php" method="POST">';
        
        // necessario para prevenir ataques csrf  
        echo '<input type="hidden" name="csrf" value="'. $_SESSION['csrf'] . '">';


        echo '<input id="idMor" type="text" name="idM" value="' . $id . '" hidden>';
        
        echo '<label for= "datIni">Data de Inicio</label>';
        echo '<input type= "date" name= "dataInicio" id= "datIni" value=' . $checkin . '>';

        echo '<br></br>';
        
        echo '<label for = "dataFim">Data de Fim</label>';
        echo '<input type= "date" name= "dataFim" id= "datFim" value=' . $checkout . '>';
        
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

    echo '<br></br>';
    echo '<a href= ../pages/search.php> Go to search </a>';

    
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

        echo ('<div class="slideshow-container">');

         //contem imagens da moradia
        $images = getImgsMoradia($id);     

        foreach ($images as $imagee) {
            $image = $imagee['caminho'];
            echo ("<div class='mySlides$id'>");
            echo ("<img src={$image}" . ' ' . 'width="100%" height="380px">');
            echo ('</div>');
            
        }

        // Next and previous buttons 
        echo ("<a class='prev' onclick='plusSlides(-1,$id)'>&#10094;</a>");
        echo ("<a class='next' onclick='plusSlides(1,$id)'>&#10095;</a>");

        // caption
        echo ('<div class="fundo"><br></div>');
        echo ('<div class="caption1"><a>');
        echo (getNameMoradia($id));
        echo ('</a></div>');
        echo ('<div class="forday"><br>&nbsp;/&nbsp;night</div>');
        echo ('<div class="price"><br>');
        echo (getPrice($id));
        echo ('</div>');

        $Rating = getRating($id);

        for ($i = 1; $i <= $Rating; $i++) {
            echo ("<div class='star{$i}'>");
            echo ('<img src="../icons/star.png" width="25px" height="25px" /> </div>');
        }
        echo ('</div>'); // end showslides
    
}
