<?php 
    include_once('../database/db_chat');

    function list_chat_people($id){

        $people = get_people_chat($id);

        foreach($people as $person){
            echo '<ul>';
            echo '<li> ' . $person['nomeRem']. '</li>';
            echo '<a href=../pages/chat_Pessoa.php?pessoa=' . $person['idRe']
        }
    }
?>


