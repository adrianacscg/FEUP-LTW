<?php
session_start();                         // starts the session
include_once('database/connection.php'); // connects to the database
include_once('database/user.php');      // loads the functions responsible for the users table

if(($userID = isLoginCorrect($_POST['username'], $_POST['password'])) != -1){  // test if user exists
    setCurrentUser($userID, $_POST['username']);            // store the username
    header("Location:../pages/lists.php");
} else {
	$_SESSION['ERROR'] = 'Incorrect username or password';
	header("Location:".$_SERVER['HTTP_REFERER']."");
}

function setCurrentUser($userID, $username)
{
    $_SESSION['username'] = $username;
    $_SESSION['userID'] = $userID;
}

function getUserID()
{
    if (isset($_SESSION['userID'])) {
        return $_SESSION['userID'];
    } else {
        return null;
    }
}

function getUsername()
{
    if (isset($_SESSION['username'])) {
        return $_SESSION['username'];
    } else {
        return null;
    }
}

?>
