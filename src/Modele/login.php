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
    <link rel="stylesheet" href="../css/login.css">
    <link rel='stylesheet' href='../css/common.css'>
    <link rel="shortcut icon" href="../img/blank.png" type="image/x-icon">
    <style>
        @import url('https://fonts.googleapis.com/css?family=Poppins');
    </style>
    <title><?= _Connexion ?></title>
</head>
<body>
    
    <?php
        include '../php/navbar.php';
        
        if (isset($_GET['error']) && $_GET['error']==5){
            echo(''._LoginError5);
        }
        if (isset($_GET['error']) && $_GET['error']==6){
            echo(''._LoginError6);
        }
        if (isset($_GET['error']) && $_GET['error']==7){
            echo(''._LoginError7);
        }
    ?>
    <span class="success">
        <?php
        if (isset($_GET['success']) && $_GET['success']==1){
            echo(''._AccountCreated);
        }
        ?>
    </span>
    <div class="form">
        <div class="login">
            <h2><?= _Connect ?></h2>
            <form action="../php/loginform.php" method ="post">
                <label for="usermail"><?= _Mail ?></label>
                <input type="text" id="usermail" name="mail" placeholder="<?= _MailHolder ?>" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" required="required"><br>
          
                <label for="password"><?= _Pass1 ?></label>
                <input type="password" id="password" name="password" placeholder="<?= _Pass1Holder ?>">
                <span class="error">
                <?php
                if (isset($_GET["error"])) {
                    if ($_GET["error"] == 3) {
                        echo(''._LoginError3);
                    }
                    if ($_GET["error"] == 4) {
                        echo(''._LoginError4);
                    }
                }
                ?>
                </span>
                <input type="submit" value="<?= _Connexion ?>">
            </form>
            <p><br><a href='../register.php'><?= _CreateAccount ?></a></p>
          </div>
    </div>
    


    <?php
        include 'footer.php';
    ?>
</body>
</html>