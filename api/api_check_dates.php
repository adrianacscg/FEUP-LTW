<?php
include_once('../database/db_places.php');

header('Content-Type: application/json');

//retorna false ou true 
$response =  check_dates($_POST['idM'],$_POST['ci'],$_POST['co']);

echo json_decode($response);


?>