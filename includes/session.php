
<?php
session_start();

function generate_random_token() {
  return bin2hex(openssl_random_pseudo_bytes(32));
}

if (!isset($_SESSION['csrf'])) {
  $_SESSION['csrf'] = generate_random_token();
}



/*
session_start();                         // starts the session
include_once('../database/connection.php'); // connects to the database
include_once('../database/user.php');      // loads the functions responsible for the users table



function setCurrentUser($userID, $email)
{
    $_SESSION['email'] = $email;
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

function getEmail()
{
    if (isset($_SESSION['email'])) {
        return $_SESSION['email'];
    } else {
        return null;
    }
}
*/
?>

