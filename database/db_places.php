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

    function get_places($location,$checkin=0,$checkout=0, $preco=1000000, $types=array(),$rating=0){

        try{
            $dbh = Database::instance()->db();

        }catch (Exception $e){
            echo $e->getMessage();
            return array();
        }

        try
        {
            if($checkin==0){
                $stmt = $dbh->prepare('SELECT * 
                                   FROM Moradia M
                                   WHERE M.localizacao = ?');
                                   
                $stmt ->execute(array($location));
                
            }else {
                
                $stmt = $dbh->prepare('SELECT * FROM Moradia M WHERE M.localizacao = ? AND preco <= ? AND rating >= ? AND idMoradia NOT IN ( SELECT idMoradia FROM Reserva WHERE (strftime("%s", dataInicio) BETWEEN strftime("%s", ?) AND strftime("%s", ?)  OR strftime("%s", dataFim) BETWEEN strftime("%s", ?) AND strftime("%s", ?)) )');
                      
                $stmt ->execute(array($location,$preco,$rating,$checkin,$checkout,$checkin,$checkout));
            }
            
            $moradias = $stmt->fetchAll();



            if(empty($types)){
                return $moradias;
            }else {

                $result=array();
                foreach($moradias as $moradia){

                    if(in_array($moradia['tipo'],$types)==true){
                        
                        $result[]=$moradia;
                    }
                }
                return $result;
            }
            

        }catch (PDOException $e){
            echo $e->getMessage();
            return array();
        }

    }

    function check_dates($idM, $ci, $co){

        try{
            $dbh = Database::instance()->db();

        }catch (Exception $e){

            echo $e->getMessage();
            return array();
        }

        try
        {
           
                
            $stmt = $dbh->prepare('SELECT idMoradia
                                     FROM Reserva WHERE idMoradia = ? AND 
                                     ( strftime("%s", dataInicio) BETWEEN strftime("%s", ?) AND strftime("%s", ?)  OR strftime("%s", dataFim) BETWEEN strftime("%s", ?) AND strftime("%s", ?))');
                    
            $stmt ->execute(array($idM,$ci,$co,$ci,$co));
            
            $result=$stmt->fetchAll();
            
            //se estiver vazio significa que nao existem reservas, logo pode reservar
            if( empty($result)){
                return "1";
            }else{
                return "0";
            }
            

        }catch (PDOException $e){
            echo $e->getMessage();
            return array();
        }
        
    }

?>