<?php
include_once('../database/db_places.php');

header('Content-Type: application/json');

$response =  user_exists($_POST['idM'],$_POST['ci'],$_POST['co']);



echo json_decode($response);

?>