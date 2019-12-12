<?php
include_once('../includes/database.php');

$idbooking = $_GET['idbooking'];

if($idbooking != null)
{
  CancelReservation($idbooking);
  header('Location: ../pages/profile.php');
}

function CancelReservation($idbooking) {
    //tenta ligar à base de dados
    try{
        $dbh= Database::instance()->db();
  
      }catch(Exception $e){
        return $e;
    }

    try {
      $stmt = $dbh->prepare('DELETE FROM Reserva WHERE idMoradia = :idMoradia');
      $stmt->bindParam(':idMoradia', $idbooking);
      $stmt->execute();
      $stmt->fetchColumn();
      $msg = "Reservation Canceled Successfully!";
        return $msg;
    
    }catch(PDOException $e) {
      return -1;
    }
}
?>