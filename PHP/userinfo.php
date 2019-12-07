<?php
include_once('../includes/database.php');

function getName($email)
{
    //tenta ligar à base de dados
    try{
        $dbh= Database::instance()->db();
  
      }catch(Exception $e){
        return $e;
    }

    try {
      $stmt = $dbh->prepare('SELECT nomeCompleto FROM Utilizador WHERE email = :email');
      $stmt->bindParam(':email', $email);
      $stmt->execute();
      return $stmt->fetchColumn();
    
    }catch(PDOException $e) {
      return null;
    }
}

function getCard($email)
{
    //tenta ligar à base de dados
    try{
        $dbh= Database::instance()->db();
  
      }catch(Exception $e){
        return $e;
    }

    try {
      $stmt = $dbh->prepare('SELECT cartaoCred FROM Utilizador WHERE email = :email');
      $stmt->bindParam(':email', $email);
      $stmt->execute();
      return $stmt->fetchColumn();
    
    }catch(PDOException $e) {
      return -1;
    }
}

    function getProfliePic($email) {
    
    //tenta ligar à base de dados
    try{
      $dbh= Database::instance()->db();
  
    }catch(Exception $e){
      return $e;
    }
  
    try {
      $stmt = $dbh->prepare('SELECT caminho FROM Utilizador WHERE email = :email');
      $stmt->bindParam(':email', $email);
      $stmt->execute();
      return $stmt->fetchColumn();
    
    }catch(PDOException $e) {
      return -2;
    }
  }

?>

