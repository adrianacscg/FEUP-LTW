<?php
    include_once('../database/db_user.php');
    include_once('../includes/session.php');
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Travel Crib</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="chat_person.js" defer></script>
  </head>
  <body>

    <div id="chat"></div>

    <form>
        <input id=idRec value= "<?=$_GET['pessoa']?>" readonly hidden>
        <input type="text" name="Recetor" placeholder="username" value= "<?php $name=getUserName($_GET['pessoa']); echo $name['nomeCompleto'];?>" readonly>
        <input type="text" name="message" placeholder="message">
        <input type="submit" value="Send">
    </form>

  </body>
</html>