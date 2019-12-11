<?php
    include_once('../includes/list_chat.php');
    include_once('../includes/session.php');

    if(!isset($_SESSION['id'])){
        die(header('Location: ../pages/register.html'));
    }

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Travel Crib</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
    </head>
    <body>

        <?=list_chat_people($_SESSION['id']); ?>

    </body>
</html>