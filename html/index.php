<?php
    include_once('../includes/components/hamburguer.php');
    include_once('../includes/session.php');
?>

<!DOCTYPE html>
<html>

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <title>Travel Crib</title>

        <link rel="stylesheet" href="../CSS/v-slider.css">
        <link rel="stylesheet" href="../CSS/index.css">

        <script src="https://use.fontawesome.com/326caf9766.js"></script>
    </head>

    <body>
        <div class="slides">
            <section id="slide1">

                <?php
                    draw_hamburguer();
                    
                    if(isset($_SESSION['messages'])){
                        $message=end($_SESSION['messages']);
                        $message=$message['content'];
                    }else{
                        $message="";
                    }
                ?>
                <input id="message" type="text" value="<?=$message;?>" hidden readonly >
                
                <span id="main_title" style="display:block">Travel Crib</span>

                <div class="search-container" >
                    <i class="fa fa-search search-icon"></i>
                    <form method="GET" action="../pages/search.php">
                        <input class="search-box" name="loc" type="text" placeholder="Search Location">
                    </form>
                    
                </div>
            </section>

            <section id="slide2">
                <span>Why book with us?</span>
                <div id="icons">
                    <div>
                        <img src="../icons/icon3.png">
                        <p>Best Housing Variety</p>
                    </div>
                    <div>
                        <img src="../icons/icon1.png">
                        <p>Safe Payments</p>
                    </div>
                    <div>
                        <img src="../icons/icon2.png">
                        <p>Safe Stay</p>
                    </div>

                </div>
            </section>

            <section id="slide3">
                <span>How does it work?</span>
                
            </section>

            <section id="slide4">
                <span id="title_slide4">Find your crib or rent on our platform</span>
                <button type="button" id="register_button"><a href="../pages/register.html">Register</a></button>
            </section>

        </div>

        
        <script type="text/javascript" src="../JS/login-box.js" ></script>
        <script type="text/javascript" src="../JS/v-slider.js"></script>
        
        <script>
            slider('.slides');
        </script>
        
    </body>

</html>
