<?php

    include_once('../includes/session.php');
    include_once('../database/db_property.php');
    include_once('../database/db_user.php');
    
       
    //busca na Session o email e obtem o id
    $email = $_SESSION['email'];
    $iduser = getID($email); 

    //guarda as informações novas da propriedade
    $newnome = $_POST['nome'];
    $newpreco = $_POST['preco'];
    $newlocalizacao = $_POST['localizacao'];
    $newtipo = $_POST['tipo'];
    $newcancelamento = $_POST['cancelamento'];
    $newrating = $_POST['rating'];

    $idproperty = $_POST['propertyId'];

    updateProperty($iduser, $newnome, $newpreco, $newlocalizacao, $newtipo, $newcancelamento, $newrating, $idproperty); 

    $diretorio = "../img/Bookings";

    if(!is_dir($diretorio)){ 
	   echo "Pasta $diretorio nao existe";
      }else
      {   
        $arquivo = isset($_FILES['foto']) ? $_FILES['foto'] : FALSE;
        
	    for ($controle = 0; $controle < count($arquivo['name']); $controle++){
            
            $destino = $diretorio."/".$arquivo['name'][$controle];
		        if(move_uploaded_file($arquivo['tmp_name'][$controle], $destino)){
                     echo("Upload realizado com sucesso<br>"); 
                     // Insere na base de dados
                     addImagesProperty($idproperty, $destino);
	    	        }else{
			            echo "Erro ao realizar upload";
                    }   
                }    
    }

 //Redirect to profile page
 header('Location: ../pages/profile.php');

?>