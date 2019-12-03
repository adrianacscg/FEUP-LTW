<?php
include_once('../database/db_user.php');

header('Content-Type: application/json');

$response =  user_exists($_POST['email']);


if(gettype($response) != "boolean")
    echo json_encode("error");
else {
    echo json_decode($response);
}
?>
