<?php

  include_once('../includes/database.php');

  function isLoginCorrect($username, $password) {
    
    global $dbh;
    
    $passwordhashed = hash('sha256', $password);

    try {
      $stmt = $dbh->prepare('SELECT * FROM Utilizador WHERE username = ? AND password = ?');
      $stmt->execute(array($username, $passwordhashed));
      if($stmt->fetch() !== false) {
        return getID($username);
      }
      else return -1;
    } catch(PDOException $e) {
      return -1;
    }
  }

  //Função que adiciona um utilizador na base de dados
  function createUser($password, $name, $email) {
    
    $passwordhashed = hash('sha256', $password);

    //tenta ligar à base de dados
    try{
      $dbh= Database::instance()->db();

    }catch(Exception $e){
      return $e;
    }

    //tenta correr a query
    try {

      $stmt = $dbh->prepare('INSERT INTO Utilizador(nomeCompleto, email, password)
          VALUES (:Name,  :Email, :Password)');
        
      $stmt->bindParam(':Name', $name);
      $stmt->bindParam(':Email', $email);
      $stmt->bindParam(':Password', $passwordhashed);
      
      $stmt->execute();
      
  
    }catch(PDOException $e) {
      
      return $e;
    }

    //vai buscar o id 
    $id = $dbh->lastInsertId();
    return $id;
  }


  //Verifica se o utilizador existe
  function user_exists($email){

    //tenta ligar à base de dados
    try{
      $dbh= Database::instance()->db();

    }catch(Exception $e){
      return $e;
    }
    
    try{

      $stmt = $dbh->prepare('SELECT * FROM Utilizador WHERE email = ?');
      $stmt->execute(array($email));

      //fecth retorna falso se nao houver linhas a buscar
      if($stmt->fetch()){
        return 1;
      }else{
        return 0;
      }
    }catch(PDOException $e) {
      return $e;
    }

    
  }

  function updateUserPassword($email, $newpassword) {
    $passwordhashed = hash('sha256', $newpassword);
    
    //tenta ligar à base de dados
    try{
      $dbh= Database::instance()->db();

    }catch(Exception $e){
      return $e;
    }

    try {
      $stmt = $dbh->prepare('UPDATE Utilizador SET Password = ? WHERE email = ?');
      if($stmt->execute(array($passwordhashed, $email)))
          return true;
      else{
        return false;
      }   
    }catch(PDOException $e) {
      return false;
    }
}

function updateUserEmail($email, $newemail){
  //tenta ligar à base de dados
  try{
    $dbh= Database::instance()->db();

  }catch(Exception $e){
    return $e;
  }

  try {
    $stmt = $dbh->prepare('UPDATE Utilizador SET email = ? WHERE email = ?');
    if($stmt->execute(array($newemail, $email))){
      $_SESSION['email'] = $newemail; // atualiza na sessão atual
      return true;
    }
        
    else{
      return false;
    }  

  }catch(PDOException $e) {
    return false;
  }
}

function updateUserCard($email, $newcard){
  //tenta ligar à base de dados
  try{
    $dbh= Database::instance()->db();

  }catch(Exception $e){
    return $e;
  }

  try {
    $stmt = $dbh->prepare('UPDATE Utilizador SET cartaocred = ? WHERE email = ?');
    if($stmt->execute(array($newcard, $email))){
      return true;
    }
        
    else{
      return false;
    }  

  }catch(PDOException $e) {
    return false;
  }
}


  function getUser($username) {
    global $dbh;
    try {
      $stmt = $dbh->prepare('SELECT nomeCompleto, username, email , imagem FROM Utilizador WHERE username = ?');
      $stmt->execute(array($username));
      return $stmt->fetch();
    
    }catch(PDOException $e) {
      return null;
    }
  }

  function deleteUser($userID) {
    global $dbh;
    try {
      $stmt = $dbh->prepare('DELETE FROM Utilizador WHERE idUtilizador = ?');
      $stmt->execute(array($userID));
      return true;
    }
    catch(PDOException $e) {
      return false;
    }
  }

  function getID($email) {
    global $dbh;
    try {
      $stmt = $dbh->prepare('SELECT idUtilizador FROM Utilizador WHERE email = ?');
      $stmt->execute(array($email));
      if($row = $stmt->fetch()){
        return $row['ID'];
      }
    
    }catch(PDOException $e) {
      return -1;
    }
  }

  function updateUserPhoto($userID, $photoPath) {
    global $dbh;
    try {
      $stmt = $dbh->prepare('UPDATE Utilizador SET Photo = ? WHERE idUtilizador = ?');
      if($stmt->execute(array($photoPath, $userID)))
          return true;
      else
          return false;
    }catch(PDOException $e) {
      return false;
    }
  } 
  
  function getUserPhoto($userID) {
    global $dbh;
    try {
      $stmt = $dbh->prepare('SELECT imagem FROM Utilizador WHERE idUtilizador = ?');
      $stmt->execute(array($userID));
      return $stmt->fetch();
    
    }catch(PDOException $e) {
      return null;
    }
  }


?>