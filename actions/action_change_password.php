<?php

    include_once('../includes/session.php');
    include_once('../database/db_user.php');
       
    //busca na Session o email
    $email = $_SESSION['email'];

    //guarda a nova password
    $newpassword = $_POST['password'];

    //atualiza na base de dados
    updateUserPassword($email, $newpassword);

    //Redirect to profile page
    header('Location: ../pages/profile.php');

?>
