<?php

    include_once('../includes/session.php');
    include_once('../database/db_user.php');
       
    //busca na Session o email
    $email = $_SESSION['email'];

    //guarda a nova password
    $newemail = $_POST['email'];

    //atualiza na base de dados
    updateUserEmail($email, $newemail);

    //Redirect to profile page
    header('Location: ../pages/profile.php');

?>
