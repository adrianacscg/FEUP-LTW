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
            
            try{
                
                createUser($_POST['password'], $name, $_POST['email'], NULL);

            }catch(PDOException $e){
                //do something  
                echo $e->getMessage();
                die(header('Location: ../html/main.html'));
                
            }catch(Exception $e){
                //do something
                echo $e->getMessage();
                die(header('Location: ../html/main.html'));
            }


            //Vai para a pagina inicial
            header('Location: ../html/main.html');
            
        ?>
    <body>
</html>

