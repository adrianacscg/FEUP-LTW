<?php 
    include_once('../database/db_chat.php');

    function list_chat_people($id){

        $people = get_people_chat($id);

        if(empty($people)){
            echo '<p> Ainda nao tem mensagens! </p>';
            return;
        }
        
        foreach($people as $person){
            echo '<ul>';
                echo '<li> ' . $person['nomeRec']. '</li>';
            echo '</ul>';
            echo '<a href=../pages/chat_Pessoa.php?pessoa=' . $person['idRecetor'] . '> Go to conversation </a>';
        }
        
        
    }
?>


