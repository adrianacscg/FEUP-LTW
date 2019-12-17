<?php

include_once('../includes/session.php');
include_once('../database/db_property.php');
include_once('../database/db_user.php');  
       
//busca na Session o email e obtem o id
$email = $_SESSION['email'];
$iduser = getID($email); 

//guarda as novas informacoes da propriedade
$newnome = preg_replace("/[^a-zA-z]/",'',$_POST['nome']);
$newpreco = preg_replace("/[^0-9]/",'',$_POST['preco']);
$newlocalizacao = preg_replace("/[^a-zA-z]/",'',$_POST['localizacao']);
$newlocalizacao = strtolower($newlocalizacao);
$newtipo = preg_replace("/[^a-zA-z]/",'',$_POST['tipo']);
$newcancelamento = preg_replace("/[^a-zA-z]/",'',$_POST['cancelamento']);
$newrating = preg_replace("/[^0-9]/",'',$_POST['rating']);

$newdescription = $_POST['description'];
$newaddress = $_POST['address'];


$idProperty = addProperty($iduser, $newnome, $newpreco, $newlocalizacao, $newtipo, $newcancelamento, $newrating, $newdescription, $newaddress); 
         
$diretorio = "../img/Bookings";

if(!is_dir($diretorio)){ 
	echo "Pasta $diretorio nao existe";
}else{
	$arquivo = isset($_FILES['foto']) ? $_FILES['foto'] : FALSE;
	for ($controle = 0; $controle < count($arquivo['name']); $controle++){
		
		$destino = $diretorio."/".$arquivo['name'][$controle];
		if(move_uploaded_file($arquivo['tmp_name'][$controle], $destino)){
            echo "Upload realizado com sucesso<br>"; 
             // Insere na base de dados
            addImagesProperty($idProperty, $destino);
		}else{
			echo "Erro ao realizar upload";
        }  
	}
}

 //Redirect to profile page
 header('Location: ../pages/profile.php');

?>
