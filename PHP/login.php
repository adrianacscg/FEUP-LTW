<?php

include_once("../includes/init.php");
include_once("../database/user.php");

if(($userID = isLoginCorrect($_POST['username'], $_POST['password'])) != -1){
	setCurrentUser($userID, $_POST['username']);
	header("Location:../pages/lists.php");
} else {
	$_SESSION['ERROR'] = 'Incorrect username or password';
	header("Location:".$_SERVER['HTTP_REFERER']."");
}
?>