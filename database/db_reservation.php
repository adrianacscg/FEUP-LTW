<?php
    include_once('../includes/database.php');

    function addReservation($precoTotal,$checkin,$checkout,$idM,$idU){

        //tenta ligar à base de dados
        try{
            $dbh = Database::instance()->db();

        }catch (Exception $e){
            echo $e->getMessage();
            return false;
        }

        //tenta fazer a query
        try{

            $stmt = $dbh->prepare('INSERT INTO Reserva(precoTotal,dataInicio,dataFim, idMoradia, idUtilizador) VALUES (? ,? ,? ,? ,?)');
            $stmt ->execute(array($precoTotal,$checkin,$checkout,$idM,$idU));
            return true;

        }catch (PDOException $e){
            echo $e->getMessage();
            return false;
        }
    }

?>