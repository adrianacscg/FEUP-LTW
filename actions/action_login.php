<?php

    include_once('../includes/session.php');
    include_once('../database/db_user.php');

    $email = $_POST['email'];
    $password = $_POST['password'];

    $id=isLoginCorrect($email, $password);
    
    
    if ($id!==false) {
        
        $_SESSION['email'] = $email;
        $_SESSION['messages'][] = array('type' => 'success', 'content' => 'Logged in successfully!');
        $_SESSION['id'] = $id;
        
        header('Location: ../pages/search.php');
    } else {
        
        $_SESSION['messages'][] = array('type' => 'error', 'content' => 'Login failed!');
        header('Location: ../html/index.php');
    }
?>