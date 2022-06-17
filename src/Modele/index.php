<?php
if(!isset($_SESSION)) 
{ 
    session_start(); 
}
echo("echec");
// Include Language file
include_once "../php/translate.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/index.css">
    <link rel="shortcut icon" href="../img/blank.png" type="image/x-icon">
    <style>
        @import url('https://fonts.googleapis.com/css?family=Poppins');
    </style>
    <title><?= _TitleIndex ?></title>
</head>
<body>

    <?php
        include '../php/navbar.php';
        ?>

    <div class="middlemainflex">
    <div class="leftflex">
        <div class="txt1"><?= _TITLE1_1 ?> </div></br>
        <div class="txt2"><?= _TITLE1_21 ?> <span class="spx"><?= _TITLE1_22 ?></span></div></br>
        <div class="txt3"><?= _TITLE1_3 ?></div></br>
        <button class="rect" href="#"><?= _joinButton ?></button>
     </div>
    <div class="rightflex">
        <img src="../img/watch1.svg" class="watch1">
        <img src="../img/watch2.svg" class="watch2">
    </div>
    </div>
     
    <div class="montre" id="discover">
        <div class="one"><img src="../img/montre_icon.png" class="montre_pic"></div>
        <div class="two"><h1><?= _Title2 ?></h1>
            <?= _Text1 ?>
        </div>
        <div class="three">
            <img src="../img/heart.svg" >
            <h3><?= _Title2_1 ?></h3>
            <?= _subTitle2_1 ?>  
        </div>
        <div class="four">
            <img src="../img/speaker.svg" >
            <h3><?= _Title2_2 ?></h3>
            <?= _subTitle2_2 ?>  
        </div>
        <div class="five">
            <img src="../img/heat.svg" >
            <h3><?= _Title2_3 ?></h3>
            <?= _subTitle2_3 ?>  
        </div>
        <div class="six">
            <img src="../img/gaz.svg" >
            <h3><?= _Title2_4 ?></h3>
            <?= _subTitle2_4 ?>  
        </div>
        <div class="sept"> 
        </div>
      </div>
      <footer class="footer">
        <div class="footerbox1">@2022 SmartCare</div>
        <div class="barre"></div>
        <div class="footerbox2">
            <a href="about.php" class="link1"><?= _About ?></a>
            <a href="help.php" class="link1"><?= _Help ?></a>
            <a href="contact.php" class="link1"><?= _Contact ?></a>
            <a href="confidentiality.php" class="link1"><?= _Confidentiality ?></a>
            <a href="#"><img src="../img/Instagram Copy 4.svg" class="Instagram Copy 4"></a>
            <a href="#"><img src="../img/Instagram Copy 3.svg" class="Instagram Copy 3"></a>
            <a href="#"><img src="../img/Instagram Copy 2.svg" class="Instagram Copy 2"></a>
            <a href="#"><img src="../img/Instagram Copy.svg" class="Instagram Copy"></a>
            <a href="#"><img src="../img/Instagram.svg" class="Instagram"></a>
    </footer>
</body>
</html>