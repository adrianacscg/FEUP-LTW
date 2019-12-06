<?php
    include_once('../database/database.php');

    function getPlace( $id){

        //tenta ligar à base de dados
        try{
            $dbh = Database::instance()->db();

        }catch (Exception $e){
            echo $e->getMessage();
            return array();
        }

        //tenta fazer a query
        try{

            $stmt = $dbh->prepare('SELECT * FROM Moradia WHERE idMoradia = ?');
            $stmt ->execute(array($id));

        }catch (PDOException $e){
            echo $e->getMessage();
            return array();
        }
        
        return $stmt->fetch();
    }

    function getImagesPlaces($id){

         //tenta ligar à base de dados
        try{
            $dbh = Database::instance()->db();

        }catch (Exception $e){
            echo $e->getMessage();
            return array();
        }

        //tenta fazer a query
        try{

            $stmt = $dbh->prepare('SELECT * FROM ImagemMoradia WHERE idMoradia = ?');
            $stmt ->execute(array($id));

        }catch (PDOException $e){
            echo $e->getMessage();
            return array();
        }

        return $stmt->fetchAll();

    }


    function getComodidades($id){

        try{
            $dbh = Database::instance()->db();

        }catch (Exception $e){
            echo $e->getMessage();
            return array();
        }

        try{

            //verificar se query funciona
            $stmt = $dbh->prepare('SELECT C.tipo FROM Moradia M, MoradiaComodidade A, Comodidade C WHERE idMoradia = ? AND M.idMoradia=A.idMoadia AND A.idComodidade=C.idComodidade');
            $stmt ->execute(array($id));

        }catch (PDOException $e){
            echo $e->getMessage();
            return array();
        }

        return $stmt->fetchAll();

    }

    function get_places($location, $checkin=0, $checkout=0){

        try{
            $dbh = Database::instance()->db();

        }catch (Exception $e){
            echo $e->getMessage();
            return array();
        }

        try
        {
            if($checkin===0){
                $stmt = $dbh->prepare('SELECT M.idMoradia, nome, rating, preco FROM Moradia M, Reserva R WHERE M.idMoradia= R.idMoradia AND M.localizacao = ?');
                $stmt ->execute(array($location));

            }else {
                $stmt = $dbh->prepare('SELECT * 
                                    FROM Moradia M, Reserva R 
                                    WHERE M.idMoradia= R.idMoradia AND M.localizacao = ? AND (? < dataInicio OR ? > dataFim)');
                $stmt-> execute(array($location,$checkout,$checkin));

            }
            return $stmt->fetchAll();

        }catch (PDOException $e){
            echo $e->getMessage();
            return array();
        }

    }

?>