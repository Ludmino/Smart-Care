<?php
if(!isset($_SESSION)) 
{ 
    session_start(); 
}
// Include Language file
include_once "../php/translate.php";
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../img/blank.png" type="image/x-icon">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <title><?= _Dashboard ?></title>
    <style>
        @import url('https://fonts.googleapis.com/css?family=Poppins');
    </style>
    <link rel="stylesheet" href="../css/dashboard.css">
    <link rel='stylesheet' href='../css/common.css'>
</head>
<body>
    <?php
        if(!isset($_SESSION)) 
        { 
            session_start(); 
        }
        if (!isset($_SESSION['connected'])) {
            header('Location: login.php?error=6');
        }
        include '../php/navbar.php';
    ?>

    <div class="boite">
    <div id="RC" class="tabcontent">
        <div class="Canvas">
            <canvas id="myChartrc"></canvas>
            <?php
                $table="rc";
                $titregraphe="Mon rythme cardiaque";
                include '../php/chart.php';
             ?>
        </div>
    </div>

    <div id="Temperature" class="tabcontent">
        <div  class="Canvas">
            <canvas id="myCharttemperature_corps"></canvas>
            <?php
                $table="temperature_corps";
                $titregraphe="Temperature";
                include '../php/chart.php';
             ?>
        </div>
    </div>

    <div id="Db" class="tabcontent">
    <div  class="Canvas">
            <canvas id="myChartvolume"></canvas>
            <?php
                $table="volume";
                $titregraphe="Volume sonore";
                include '../php/chart.php';
             ?>
        </div>
    </div>

    <div id="Gaz" class="tabcontent">
        <div  class="Canvas">
            <canvas id="myChartgaz"></canvas>
            <?php
                $table="gaz";
                $titregraphe="Volume de gaz";
                include '../php/chart.php';
             ?>
        </div>
    </div>
    
    <div class="tab">
        <button class="tablinks" onclick="openTabs(event, 'RC')" id="defaultOpen"><span class="tabTitle"><?= _Heart ?></span><img class="logoDash" src="../img/heartbeat.svg"></button>
        <button class="tablinks" onclick="openTabs(event, 'Temperature')"><span class="tabTitle"><?= _Tempeature ?></span><img class="logoDash" src="../img/thermos.svg"></button>
        <button class="tablinks" onclick="openTabs(event, 'Db')"><span class="tabTitle"><?= _Sound ?><img class="logoDash" src="../img/sound.svg"></span></button>
        <button class="tablinks" onclick="openTabs(event, 'Gaz')"><span class="tabTitle"><?= _Gaz ?></span><img class="logoDash" src="../img/co2.svg"></button>
    </div>
    </div>
    
    <script src=../javascript/Tabs.js></script>
    <script src=../javascript/chart.js></script>

    <?php
        include 'footer.php';
    ?>

</body>
</html>