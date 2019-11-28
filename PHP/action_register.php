<?php
session_start();
?>

<!DOCTYPE html>


<html lang="en-US">
    <head>
        <title>Travel Crib</title>
        <meta charset="UTF-8">
    </head>
    <body>
        <?php 
            
            include_once('../database/user.php');
            
            $name= $_POST['firstName'] . $_POST['lastName'];
            
           
                
            $info_user = createUser($_POST['password'], $name, $_POST['email'], NULL);

            if($info_user==-1){
                die(header('Location: ../html/main.html'));
            }


            //Vai para a pagina inicial
            header('Location: ../html/main.html');
            
        ?>
    <body>
</html>

