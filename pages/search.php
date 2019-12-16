<?php
    include_once("../includes/list_places.php");
?>

<!DOCTYPE html>
<html lang="en-US">
    <head>
        <title>RentAHouse</title>
        <link rel="stylesheet" type="text/CSS" href="../CSS/search.css">
        <link rel="stylesheet" type="text/CSS" href="../CSS/showslides.css">
        <link rel="stylesheet" type="text/CSS" href="../CSS/footer.css">
        <script src="../JS/search.js" defer></script>
        <script src="../JS/showslides.js" async></script>
        <meta charset="UTF-8">
    </head>
    <body>
    
        <?php
            print_r($_SESSION);
            die;


            //filtra os caracteres que nao letras
            if (isset($_GET['loc']))
                $loc=preg_replace("/[^a-zA-Z\s]/",'',$_GET['loc']);
            else
                $loc="";

            if (isset($_GET['ci'])) 
                $ci=preg_replace('/[^0-9\-]/','',$_GET['ci']);
            
            if (isset($_GET['co']))
                $co=preg_replace('/[^0-9\-]/','',$_GET['co']);

            if (isset($_GET['rval']))
                $val=preg_replace('/[^0-9]/','',$_GET['rval']);
            else
                $val="";


            if(isset($_GET['loc']))
                list_places($loc,$ci,$co,$val);
            else
                echo '<p> Introduce a place to search </p>';

        ?>
        <aside>
            <form id= "Sform" method="GET" action= "search.php">
                <input type="text" id="loca" placeholder="where do you want to go?" name= "loc" value="<?=$loc;?>" required>
                <input type="date" id="datIni" placeholder="check-in" name="ci" value= "<?=$ci;?>">
                <input type="date" id="datFim" placeholder="check-out" name="co" value = "<?=$co;?>">
                
                <p>Filter</p>
                <br></br>
                <input type= "range" id="Ranger" name="range" value= "<?=$val;?>" min="0" max= "10000" step="10">
                <input type="text" id="RangeValue" name="rval" readonly value= "<?=$val;?>">
                <br></br>
                <input type="submit" id="submitFilter" value="Filtrar">
            </form>
        </aside>
        
    </body>
<footer>
    <h1> Travel Crib </h1>
    <a href="../html/index.html#slide3">About Us</a>
    <p> made with &#10084 2019 &#9400 Copyright </p>
</footer>
</html>