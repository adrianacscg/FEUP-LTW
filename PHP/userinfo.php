<?php
include_once('../database/database.php');

function getName($email)
{
    global $db;
    try {
      $stmt = $db->prepare('SELECT nomeCompleto FROM Utilizador WHERE email = ?');
      $stmt->execute($email);
      return $stmt->fetch();
    
    }catch(PDOException $e) {
      return null;
    }
}



?>

