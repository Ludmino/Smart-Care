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
    <link rel="stylesheet" href="../css/register.css">
    <link rel='stylesheet' href='../css/common.css'>
    <link rel="shortcut icon" href="../img/blank.png" type="image/x-icon">
    <style>
        @import url('https://fonts.googleapis.com/css?family=Poppins');
    </style>
    <title><?= _TitleRegister ?></title>
</head>
<body>
    
    <?php
        include '../php/navbar.php';
        
        if (isset($_GET['error']) && $_GET['error']==10){
            echo(''._RegisterError10);
        }
    ?>
    <h2><?= _Register ?></h2>
    <div class="formulaire">
        <form action="../php/registerfull.php" method ="post">
        <div class="login">
            
                <label for="prenom"><?= _FirstName ?></label>
                <input type="text" id="prenom" name="prenom" placeholder="<?= _FirstNameHolder ?>" required="required"><br>
                
            
                <label for="password"><?= _Pass1 ?></label>
                <input type="password" id="password" name="password" placeholder="<?= _Pass1Holder ?>" required="required" pattern="(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" title="Votre mot de passe doit contenir 8 caractères dont au moins une majuscule, un caractère spécial et un chiffre"><br>

                <label for="usermail"><?= _Mail ?></label>
                <span class="error">
                <?php
                if (isset($_GET["error"])) {
                    if ($_GET["error"] == 1) {
                        echo('<br> '._RegisterError1);
                    }
                }
                ?>
                </span>
                <input type="text" id="usermail" name="mail" placeholder="<?= _MailHolder ?>" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" required="required"><br>
                
          </div>

          <div class="login">
                
                <label for="nom"><?= _LastName ?></label>

                <input type="text" id="nom" name="nom" placeholder="<?= _LastNameHolder ?>" required="required"><br>

                <label for="password2"><?= _Pass2 ?></label>
                <span class="error">
                <?php
                if (isset($_GET["error"])) {
                   if ($_GET["error"] == 2) {
                        echo('<br> '._RegisterError2);
                    }
                }
                ?>
                </span>
                <input type="password" id="password2" name="password2" placeholder="<?= _Pass2Holder ?>" required="required"><br>
                
                
                <label for="nobjet"><?= _Nobject ?></label>
                <input type="text" id="nobjet" name="nobjet" placeholder="<?= _NobjectHolder ?>" required="required"><br>
            
          </div>
          <input type="submit" value="<?= _Register2 ?>">
        </form>
    </div>
    


    <?php
        include 'footer.php';
    ?>
</body>
</html>