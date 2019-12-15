<?php
    include_once('../database/db_reservation.php');
    include_once('../includes/session.php');
    
    
    if (!isset($_SESSION['id'])){
        $_SESSION['lastPage']= '../pages/anuncio.php?id='. $_POST['idM'] ;
        die(header('Location: ../pages/register.html'));
    }

    if ($_SESSION['csrf'] !== $_POST['csrf']) {
        die(header('Location: ../pages/error.html'));
      }
    
    //TESTAR
    $res=addReservation($_POST['precoT'], $_POST['dataInicio'], $_POST['dataFim'], $_POST['idM'], $_SESSION['id']);

    if($res==true)
        header('Location: ../html/thankyou_page.html');
    else
        die(header('Location: ../pages/error.html'));

?>