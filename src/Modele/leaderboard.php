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
    <link rel="shortcut icon" href="../img/blank.png" type="image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= _Ranking ?></title>
    <style>
        @import url('https://fonts.googleapis.com/css?family=Poppins');
    </style>
    <link rel="stylesheet" href="../css/ranking.css">
    <link rel='stylesheet' href='../css/common.css'>
</head>
<body>
    <?php
        if (!isset($_SESSION['connected'])) {
            header('Location: login.php?error=5');
        }
        include '../php/navbar.php';
    ?>
    <div class='ranking'>
        <span class='center'><h2>TOP 10</h2></span>
        <?php
            include '../php/display/top10.php';
        ?>
        
        <span style="text-align : center"><h3><?= _You ?></h3></span>
        <?php
            include '../php/display/userscore.php';
        ?>
    </div>

    <span class='center'><h4><?= _SearchUser ?></h4></span>
    <form action="leaderboard.php" method ="post">
        <div class='center'>
            <label for="searchnom" class="pad1"><?= _LastName ?></label>
            <input type="text" id="searchnom" name="searchnom" placeholder="<?= _SearchName ?>" class="center2">
            
            <label for="searchprenom" class="pad1"><?= _FirstName ?></label>
            <input type="text" id="searchprenom" name="searchprenom" placeholder="<?= _SearchFirstName ?>" class="center2">
        </div>
        <div class='center3'><input type="submit" value="<?= _Search ?>"></div>
    </form>
    <?php
        include '../php/display/searchuserscore.php';
    ?>  
    

    <?php
        include 'footer.php';
    ?>
</body>
</html>