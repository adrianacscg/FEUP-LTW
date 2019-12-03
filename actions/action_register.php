<?php
session_start();
?>




<?php 
    


    include_once('../database/user.php');
    
    $name= $_POST['firstName'] . $_POST['lastName'];
    
    
    //cria utilizador   
    $id_user = createUser($_POST['password'], $name, $_POST['email']);

    
    
    
    

    //guarda na Session o email
    $_SESSION['email'] = $_POST['email'];

    echo "UTILIZADOR CRIADO!";

?>

