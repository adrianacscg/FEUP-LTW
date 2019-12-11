<?php
    include_once('../includes/database.php');
    
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

            $stmt = $dbh->prepare('SELECT * FROM Chat WHERE id = ? OR ');
            $stmt ->execute(array($id));

        }catch (PDOException $e){
            echo $e->getMessage();
            return array();
        }
        
        return $stmt->fetch();
    }

?>