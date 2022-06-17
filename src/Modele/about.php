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
    <link rel='stylesheet' href='css/common.css'>
    <link rel="shortcut icon" href="../img/blank.png" type="image/x-icon">
    <link rel="shortcut icon" href="img/blank.png" type="image/x-icon">
    <style>
        @import url('https://fonts.googleapis.com/css?family=Poppins');
    </style>
    <title><?= _About ?></title>
</head>
<body>
    <?php
       include '../php/navbar.php';
    ?>

    <div class="sidePageDiv">
        <span class="bigTitle"><?= _About ?></span><br><br>

        
        <span class="sidePageQuestion"><?= _AboutTitle1 ?></span>
        <p class="sidePageText"><?= _AboutText1 ?><br/><br/></p>

        <span class="sidePageQuestion"><?= _AboutTitle2 ?></span>
        <p class="sidePageText"><?= _AboutText2 ?><br/><br/></p>

        <span class="sidePageQuestion"><?= _AboutTitle3 ?></span>
        <p class="sidePageText"><?= _AboutText3 ?><br/><br/></p>
            
    </div>

    <?php
      include 'footer.php';
    ?>
</body>
</html>