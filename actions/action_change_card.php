<?php

    include_once('../includes/session.php');
    include_once('../database/db_user.php');
       
    //busca na Session o email
    $email = $_SESSION['email'];

    //guarda o new card
    $newcard = $_POST['card'];

    //atualiza na base de dados
    updateUserCard($email, $newcard);

    //Redirect to profile page
    header('Location: ../pages/profile.php');

?>
