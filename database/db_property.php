<?php
include_once('../includes/database.php');

function updateProperty($iduser, $newnome, $newpreco, $newlocalizacao, $newtipo, $newcancelamento, $newrating, $newdescription, $newaddress, $idproperty) 
{
    //tenta ligar à base de dados
    try {
        $dbh = Database::instance()->db();
    } catch (Exception $e) {
        return $e;
    }

    if($newnome != null) {
        try {

            $stmt = $dbh->prepare('UPDATE Moradia SET nome = ? WHERE idUtilizador = ? AND idMoradia = ?');            
    
            if($stmt->execute(array($newnome, $iduser, $idproperty)))
              echo("ok");
         
            $stmt->execute();
        } catch (PDOException $e) {
    
            return $e;
        }
    }

    if($newpreco != null) {
        try {

            $stmt = $dbh->prepare('UPDATE Moradia SET preco = ?, WHERE idUtilizador = ? AND idMoradia = ?');            
    
            if($stmt->execute(array($newpreco, $iduser, $idproperty)))
                echo("ok");
         
            $stmt->execute();
        } catch (PDOException $e) {
    
            return $e;
        }
    }

    if($newlocalizacao != null)
    {
        try {

            $stmt = $dbh->prepare('UPDATE Moradia SET localizacao = ? WHERE idUtilizador = ? AND idMoradia = ?');            
    
            if($stmt->execute(array($newlocalizacao, $iduser, $idproperty)))
                echo("ok");
    
            $stmt->execute();
        } catch (PDOException $e) {
    
            return $e;
        }
    }

    if($newtipo != null) {
        try {

            $stmt = $dbh->prepare('UPDATE Moradia SET tipo = ? WHERE idUtilizador = ? AND idMoradia = ?');            
    
            if($stmt->execute(array($newtipo, $iduser, $idproperty)))
                echo("ok");

            $stmt->execute();
        } catch (PDOException $e) {
    
            return $e;
        }
    }

    if($newcancelamento != null) {
        try {

            $stmt = $dbh->prepare('UPDATE Moradia SET cancelamento = ? WHERE idUtilizador = ? AND idMoradia = ?');            
    
            if($stmt->execute(array($newcancelamento, $iduser, $idproperty)))
               echo("ok");
    
            $stmt->execute();
        } catch (PDOException $e) {
    
            return $e;
        }
    }

    if($newrating != null)
    {
        try {

            $stmt = $dbh->prepare('UPDATE Moradia SET rating = ? WHERE idUtilizador = ? AND idMoradia = ?');            
    
            if($stmt->execute(array($newrating, $iduser, $idproperty)))
                echo("ok");
    
            $stmt->execute();
        } catch (PDOException $e) {
    
            return $e;
        }
    }

    if($newdescription != null) {
        try {

            $stmt = $dbh->prepare('UPDATE Moradia SET descricao = ? WHERE idUtilizador = ? AND idMoradia = ?');            
    
            if($stmt->execute(array($newdescription, $iduser, $idproperty)))
                echo("ok");
    
            $stmt->execute();
        } catch (PDOException $e) {
    
            return $e;
        }
    }

    if($newaddress != null) {
        try {

            $stmt = $dbh->prepare('UPDATE Moradia SET morada = ? WHERE idUtilizador = ? AND idMoradia = ?');            
    
            if($stmt->execute(array($newaddress, $iduser, $idproperty)))
                echo("ok");
    
            $stmt->execute();
        } catch (PDOException $e) {
    
            return $e;
        }
    }
}

function addProperty($iduser, $nome, $preco, $localizacao, $tipo, $cancelamento, $rating, $description, $address)
{
    //tenta ligar à base de dados
    try{
      $dbh= Database::instance()->db();

    }catch(Exception $e){
      return $e;
    }

    //tenta correr a query
    try {

      $stmt = $dbh->prepare('INSERT INTO Moradia(nome, preco, localizacao, tipo, cancelamento, rating, idUtilizador, descricao, morada)
          VALUES (:Nome,  :Preco, :Localizacao, :Tipo, :Cancelamento, :Rating, :IdUtilizador, :Descricao, :Morada)');
        
      $stmt->bindParam(':Nome', $nome);
      $stmt->bindParam(':Preco', $preco);
      $stmt->bindParam(':Localizacao', $localizacao);
      $stmt->bindParam(':Tipo', $tipo);
      $stmt->bindParam(':Cancelamento', $cancelamento);
      $stmt->bindParam(':Rating', $rating);
      $stmt->bindParam(':IdUtilizador', $iduser);
      $stmt->bindParam(':Descricao', $description);
      $stmt->bindParam(':Morada', $address);
      
      $stmt->execute();
      
  
    }catch(PDOException $e) {
      
      return $e;
    }

    //vai buscar o id 
    $id = $dbh->lastInsertId();
    return $id;
}

function addImagesProperty($idmoradia, $caminho)
{
    //tenta ligar à base de dados
    try{
      $dbh= Database::instance()->db();

    }catch(Exception $e){
      return $e;
    }

    //tenta correr a query
    try {

      $stmt = $dbh->prepare('INSERT INTO ImagemMoradia(caminho, idMoradia)
          VALUES (:Caminho, :IdMoradia)');
        
      $stmt->bindParam(':Caminho', $caminho);
      $stmt->bindParam(':IdMoradia', $idmoradia);
      return $stmt->execute(); 
  
    }catch(PDOException $e) {
      
      return $e;
    }
}