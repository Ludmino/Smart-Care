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

    <?php
        $ch = curl_init();
        curl_setopt(
        $ch,
        CURLOPT_URL,
        "http://projets-tomcat.isep.fr:8080/appService/?ACTION=GETLOG&TEAM=1338");
        curl_setopt($ch, CURLOPT_HEADER, FALSE);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        $data = curl_exec($ch);
        curl_close($ch);
        //echo "Raw Data:<br />";
        //echo("$data");

        require  '../php/connexion.php';
        $sql =  "SELECT `id_trame` FROM `temperature_corps` WHERE id_user = 2 ORDER BY id_trame DESC LIMIT 1;";
        foreach  ($conn->query($sql) as $row) {
            $idtrame=0;
            $idtrame = $row['id_trame'];
        }

        $data_tab = str_split($data,33);
        $trame = $data_tab[0];
        for($i=$idtrame, $size=count($data_tab); $i<$size-1; $i++){
            $trame = $data_tab[$i];
            list($t, $o, $r, $c, $n, $v, $a, $x, $year, $month, $day, $hour, $min, $sec) =
            sscanf($trame,"%1s%4s%1s%1s%2s%4x%4s%2s%4s%2s%2s%2s%2s%2s");
            $stmt = $conn->prepare("INSERT INTO temperature_corps(Date, id_user, Valeur,id_trame)  VALUES  (?, ?, ?, ?)");
            $idTrameInsert = intval($i+1);
            $stmt->bind_param("sidi", $trameDate, $id_user, $valeurTrame,$idTrameInsert);
            $trameDate = "$year-$month-$day $hour:$min:$sec";
            $id_user = $_SESSION['id'];
            $valeurTrame = intval($v)*3.3/4096*100;
            $stmt->execute();
        }   
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
    
    <script src=../javascript/tabs.js></script>
    <script src=../javascript/chart.js></script>

    <?php
        include 'footer.php';
    ?>

</body>
</html>
