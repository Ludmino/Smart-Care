<?php
if(!isset($_SESSION)) 
{ 
    session_start(); 
}
// Include Language file
include_once "../php/translate.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/common.css">
    <title>Document</title>
</head>
<body>
    <footer>
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