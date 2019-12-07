<?php
include_once('../includes/database.php');

function getImgsMoradia($idMoradia){

    //tenta ligar à base de dados
    try{
        $dbh= Database::instance()->db();
  
      }catch(Exception $e){
        return $e;
    }

    try {
      $stmt = $dbh->prepare('SELECT caminho FROM ImagemMoradia WHERE idMoradia = :idMoradia');
      $stmt->bindParam(':idMoradia', $idMoradia);
      $stmt->execute();
      $images = $stmt->fetchAll();
      return $images;
    
    }catch(PDOException $e) {
      return -1;
    }

}

function getBookings($idUser) {

    //tenta ligar à base de dados
    try{
        $dbh= Database::instance()->db();
  
      }catch(Exception $e){
        return $e;
    }

    try {
      $stmt = $dbh->prepare('SELECT idMoradia FROM Reserva WHERE idUtilizador = :idUser');
      $stmt->bindParam(':idUser', $idUser);
      $stmt->execute();
      $bookings = $stmt->fetchAll();
      return $bookings;
    
    }catch(PDOException $e) {
      return -2;
    }

}

function getNameMoradia($idMoradia){

    //tenta ligar à base de dados
    try{
        $dbh= Database::instance()->db();
  
      }catch(Exception $e){
        return $e;
    }

    try {
      $stmt = $dbh->prepare('SELECT nome FROM Moradia WHERE idMoradia = :idMoradia');
      $stmt->bindParam(':idMoradia', $idMoradia);
      $stmt->execute();
      return $stmt->fetchColumn();
    
    }catch(PDOException $e) {
      return -3;
    }
}

function getRating($idMoradia){

    //tenta ligar à base de dados
    try{
        $dbh= Database::instance()->db();
  
      }catch(Exception $e){
        return $e;
    }

    try {
      $stmt = $dbh->prepare('SELECT rating FROM Moradia WHERE idMoradia = :idMoradia');
      $stmt->bindParam(':idMoradia', $idMoradia);
      $stmt->execute();
      return $stmt->fetchColumn();
    
    }catch(PDOException $e) {
      return -4;
    }
}

function getPrice($idMoradia){

    //tenta ligar à base de dados
    try{
        $dbh= Database::instance()->db();
  
      }catch(Exception $e){
        return $e;
    }

    try {
      $stmt = $dbh->prepare('SELECT preco FROM Moradia WHERE idMoradia = :idMoradia');
      $stmt->bindParam(':idMoradia', $idMoradia);
      $stmt->execute();
      return $stmt->fetchColumn();
    
    }catch(PDOException $e) {
      return -5;
    }
}

function getDateStart($idMoradia){
     
    //tenta ligar à base de dados
     try{
        $dbh= Database::instance()->db();
  
      }catch(Exception $e){
        return $e;
    }

    try {
      $stmt = $dbh->prepare('SELECT dataInicio FROM Reserva WHERE idMoradia = :idMoradia');
      $stmt->bindParam(':idMoradia', $idMoradia);
      $stmt->execute();
      return $stmt->fetchColumn();
    
    }catch(PDOException $e) {
      return null;
    }
}

function getDateFinish($idMoradia){
     
    //tenta ligar à base de dados
     try{
        $dbh= Database::instance()->db();
  
      }catch(Exception $e){
        return $e;
    }

    try {
      $stmt = $dbh->prepare('SELECT dataFim FROM Reserva WHERE idMoradia = :idMoradia');
      $stmt->bindParam(':idMoradia', $idMoradia);
      $stmt->execute();
      return $stmt->fetchColumn();
    
    }catch(PDOException $e) {
      return null;
    }
}

function getTotalPrice($idMoradia){
     
    //tenta ligar à base de dados
     try{
        $dbh= Database::instance()->db();
  
      }catch(Exception $e){
        return $e;
    }

    try {
      $stmt = $dbh->prepare('SELECT precoTotal FROM Reserva WHERE idMoradia = :idMoradia');
      $stmt->bindParam(':idMoradia', $idMoradia);
      $stmt->execute();
      return $stmt->fetchColumn();
    
    }catch(PDOException $e) {
      return null;
    }
}
 
?>