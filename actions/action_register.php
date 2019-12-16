<?php

    include_once('../includes/session.php');
    include_once('../database/db_user.php');
    
    //nome completo
    $name= trim($_POST['firstName']) .' '. trim($_POST['lastName']);

    $name= preg_replace("/[^a-zA-z]/",'',$name);
    
    //cria utilizador   
    $id_user = createUser($_POST['password'], $name, $_POST['email']);
    
    //guarda na Session o email
    $_SESSION['email'] = $_POST['email'];
    $_SESSION['id'] = $id_user;

    //Redirect to main page
    if(isset($_SESSION['lastPage']))
        die(header('Location: ' . $_SESSION['lastPage']));
    else 
        die(header('Location: ../html/index.php'));
    

?>

