<?php
    include_once('../database/db_reservation.php');
    
    if (!isset($_SESSION['id'])){
        die(header('Location: ../pages/register.html'));
    }

    //TESTAR
    addReservation($_POST['precoT'], $_POST['dataInicio'], $_POST['dataFim'], $_POST['idM'], $_SESSION['id']);

    header('Location: ../html/thankyou_page.html');

?>