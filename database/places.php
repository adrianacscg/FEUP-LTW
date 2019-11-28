<?php
    include_once('../database/database.php');

    function getPlace( $id){

        //tenta ligar à base de dados
        try{
            $dbh = Database::instance()->db();

        }catch (Exception $e){
            echo $e->getMessage();
            return -1;
        }

        //tenta fazer a query
        try{

            $stmt = $dbh->prepare('SELECT * FROM Moradia WHERE idMoradia = ?');
            $stmt ->execute(array($id));

        }catch (PDOException $e){
            echo $e->getMessage();
            return -1;
        }
        
        return $stmt->fetch();
    }

    function getImagesPlaces($id){
        
    }

?>