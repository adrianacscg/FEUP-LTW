<?php
    include_once('../includes/database.php');

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

            $stmt = $dbh->prepare('SELECT caminho FROM ImagemMoradia WHERE idMoradia = ?');
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
            $stmt = $dbh->prepare('SELECT C.tipo FROM Moradia M, MoradiaComodidade A, Comodidade C WHERE M.idMoradia=A.idMoradia AND A.idComodidade=C.idComodidade AND M.idMoradia= ?');
            $stmt ->execute(array($id));

        }catch (PDOException $e){
            echo $e->getMessage();
            return array();
        }

        return $stmt->fetchAll();

    }

    function get_places($location){

        try{
            $dbh = Database::instance()->db();

        }catch (Exception $e){
            echo $e->getMessage();
            return array();
        }

        try
        {
            //if($checkin==0){
            $stmt = $dbh->prepare('SELECT * 
                                   FROM Moradia M, Reserva R
                                   WHERE M.idMoradia= R.idMoradia AND M.localizacao = ?');
                                   
            $stmt ->execute(array($location));
                
            /*}else {
                
                $stmt = $dbh->prepare('SELECT M.idMoradia, nome, rating, preco  
                                    FROM Moradia M, Reserva R 
                                    WHERE M.idMoradia= R.idMoradia AND M.localizacao = ? AND (? < dataInicio OR ? > dataFim)');
                $stmt-> execute(array($location,$checkout,$checkin));

            }*/
            $result= $stmt->fetchAll();
            return $result;

        }catch (PDOException $e){
            echo $e->getMessage();
            return array();
        }

    }

?>