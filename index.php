<?php

require_once "autoloader.php";
$connection = new Connection();
$conn = $connection->getConn();
$lighting = new Lighting();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<script src="ev3.js"></script>
<body>
    <table class="redTable">
        <tbody>
            <h1>FUCK VICENT</h1>
            <h2>BIG STADIUM - LIGHTING CONTROL PANEL</h2>
        <form action="" method="post">
            <select name="filter">
                <option value='all'>All</option>
                <option value='1'>Fondo Norte</option>
                <option value='2'>Fondo Sur</option>
                <option value='3'>Grada Este</option>
                <option value='4'>Grada Oeste</option>
            </select>
            <input type="submit" value="Filter by zone">
        </form>
            <?

            $lighting->drawLampsList();


            ?>

</body>



</html>