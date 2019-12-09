<?php
    include_once('../includes/database.php');

    function addReservation($precoTotal,$checkin,$checkout,$idM,$idU){

        //tenta ligar à base de dados
        try{
            $dbh = Database::instance()->db();

        }catch (Exception $e){
            echo $e->getMessage();
            return array();
        }

        //tenta fazer a query
        try{

            $stmt = $dbh->prepare('INSERT INTO Reserva VALUES (? ,? ,? ,? ,?)');
            $stmt ->execute(array($precoTotal,$checkin,$checkout,$idM,$idU));

        }catch (PDOException $e){
            echo $e->getMessage();
            return array();
        }
    }

?>