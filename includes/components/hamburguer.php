<?php
    include_once('../includes/session.php');

    function draw_hamburguer(){

        if(!isset($_SESSION['email'])){
            echo '<div>';
                echo '<button class= "login_button">Login |</button>';
                            
                echo '<a id="register" href="../pages/register.html">Register</a>';

            echo '</div>';
        }else {
            echo '<a href= "../pages/profile.php">Go to Perfil</a>';
        }
    }

?>