<?php
session_start();
?>




<?php 
    
    include_once('../database/user.php');
    
    $name= $_POST['firstName'] . $_POST['lastName'];
    
    
    //cria utilizador   
    $id_user = createUser($_POST['password'], $name, $_POST['email'], NULL);

    if($id_user==-1){
        die(header('Location: ../html/main.html'));
    }

    //guarda na Session o email
    $_SESSION['email'] = $_POST['email'];


    //Vai para a pagina inicial
    header('Location: ../html/main.html');
    
?>

