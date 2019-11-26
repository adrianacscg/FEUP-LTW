<?php 
    echo "oi1";
    include_once('database/user.php')
    echo "oi2";
    $name= $_POST['firstName'] . $_POST['lastName'];
    echo "oi3";
    if(createUser($_POST['password'], $name, $_POST['email'], NULL, NULL) == -1){
        echo "ERRO!";
    }
    
    
    //Vai para a pagina inicial
    header('Location: ../html/main.html');

?>