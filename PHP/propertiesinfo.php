<?php
include_once('../includes/database.php');

function getProperties($iduser) {
    
    //tenta ligar à base de dados
    try{
        $dbh= Database::instance()->db();
  
      }catch(Exception $e){
        return $e;
    }

    try {
      $stmt = $dbh->prepare('SELECT idMoradia FROM Moradia WHERE idUtilizador = :iduser');
      $stmt->bindParam(':iduser', $iduser);
      $stmt->execute();
      $properties = $stmt->fetchAll();
      return $properties;
    
    }catch(PDOException $e) {
      return -1;
    }
}

?>