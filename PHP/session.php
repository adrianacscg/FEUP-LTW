<?php
session_start();                         // starts the session
include_once('database/connection.php'); // connects to the database
include_once('database/users.php');      // loads the functions responsible for the users table

if (userExists($_POST['username'], $_POST['password']))  // test if user exists
    $_SESSION['username'] = $_POST['username'];            // store the username

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

header('Location: ' . $_SERVER['HTTP_REFERER']); 
?>
