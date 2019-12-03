<?php
include_once('../database/db_user.php');

header('Content-Type: application/json');

echo json_encode(user_exists($_POST['email']));

?>
