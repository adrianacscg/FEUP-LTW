<?php

include_once('../includes/session.php');
include_once('../database/db_user.php');

//busca na Session o email
$email = $_SESSION['email'];
$iduser = getID($email);

// Generate filenames for original, small and medium files
$mediumFileName = "../img/ProfilePictures/$iduser.jpg";

// Move the uploaded file to its final destination
move_uploaded_file($_FILES['image']['tmp_name'], $mediumFileName);

// Crete an image representation of the original image
$original = imagecreatefromjpeg($mediumFileName);

$width = imagesx($original);     // width of the original image
$height = imagesy($original);    // height of the original image
$square = min($width, $height);  // size length of the maximum square

// Calculate width and height of medium sized image (max width: 400)
$mediumwidth = $width;
$mediumheight = $height;
if ($mediumwidth > 400) {
$mediumwidth = 400;
$mediumheight = $mediumheight * ( $mediumwidth / $width );
}

// Create and save a medium image
$medium = imagecreatetruecolor($mediumwidth, $mediumheight);
imagecopyresized($medium, $original, 0, 0, 0, 0, $mediumwidth, $mediumheight, $width, $height);
imagejpeg($medium, $mediumFileName);

updateUserPhoto($iduser,$mediumFileName);

//Redirect to profile page
header('Location: ../pages/profile.php');

?>
