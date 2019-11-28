

<?php 
    
    include_once('../database/user.php');
    
    $name= $_POST['firstName'] . $_POST['lastName'];
    
    try{
        
        createUser($_POST['password'], $name, $_POST['email'], NULL);

    }catch(PDOException $e){
        //do something
        echo $e->getMessage();
        
    }catch(Exception $e){
        //do something
        echo $e->getMessage();
    }

    //Vai para a pagina inicial
    header('Location: ../html/main.html');
    
?>

