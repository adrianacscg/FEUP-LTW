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

?>