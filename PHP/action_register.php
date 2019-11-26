<?php 
    include_once('database/user.php')
    $name= $_POST['firstName'] . $_POST['lastName'];
    createUser($_POST['password'], $name, $_POST['email'], NULL, NULL);
    

?>