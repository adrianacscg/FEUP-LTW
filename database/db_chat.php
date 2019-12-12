<?php
    include_once('../includes/database.php');
    
    //função que retorna o nome das pessoas que a pessoa com id=$id mandou mensagem
    function get_people_chat($id){

        //tenta ligar à base de dados
        try{
            $dbh = Database::instance()->db();

        }catch (Exception $e){
            echo $e->getMessage();
            return array();
        }

        //tenta fazer a query
        try{

            $stmt = $dbh->prepare('SELECT idRecetor FROM Chat WHERE idRemetente = ? GROUP BY idRecetor');
            $stmt ->execute(array($id));    

        }catch (PDOException $e){
            echo $e->getMessage();
            return array();
        }
        
        return $stmt->fetchAll();
    }
    function sendMessage($recetor,$remetente, $date,$texto){
        //tenta ligar à base de dados
        try{
            $dbh = Database::instance()->db();

        }catch (Exception $e){
            echo $e->getMessage();
            return false;
        }

        //tenta fazer a query
        try{

            $stmt = $dbh->prepare('INSERT INTO Chat VALUES (?,?,?,?)');
            $stmt ->execute(array($remetente,$recetor,$date,$texto));    
            return true;
        }catch (PDOException $e){
            echo $e->getMessage();
            return false;
        }
        
        
    }

    function getNewMessages($last_id,$remetente,$recetor){
        //tenta ligar à base de dados
        try{
            $dbh = Database::instance()->db();

        }catch (Exception $e){
            echo $e->getMessage();
            return array();
        }

        //tenta fazer a query
        try{

            $stmt = $dbh->prepare("SELECT * FROM chat WHERE idMensagem > ? AND (idRemetente= ? OR idRecetor = ?) ORDER BY date DESC LIMIT 10");
            $stmt->execute(array($last_id));
            return $stmt->fetchAll();

        }catch (PDOException $e){
            echo $e->getMessage();
            return array();
        }
    }

?>