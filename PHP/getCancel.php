<?php
include_once('../includes/database.php');

function getCancellation($idbooking) {
    
    //tenta ligar à base de dados
    try{
        $dbh= Database::instance()->db();
  
      }catch(Exception $e){
        return $e;
    }

    try {
      $stmt = $dbh->prepare('SELECT cancelamento FROM Moradia WHERE idMoradia = :idMoradia');
      $stmt->bindParam(':idMoradia', $idbooking);
      $stmt->execute();
      $cancellation_y_n = $stmt->fetchColumn();
      
      if(strcasecmp($cancellation_y_n, "Sim") == 0)
        return true;
        else return false;
    
    }catch(PDOException $e) {
      return -1;
    }
}

?>