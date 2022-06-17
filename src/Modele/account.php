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
    <link rel="shortcut icon" href="../img/blank.png" type="image/x-icon">
    <title><?= _TitleAccount ?></title>
    <style>
        @import url('https://fonts.googleapis.com/css?family=Poppins');
    </style>
    <link rel="stylesheet" href="../css/account.css">
    <link rel='stylesheet' href='../css/common.css'>
</head>
<body>
    <?php
        if(!isset($_SESSION)) 
        { 
            session_start(); 
        }
        if (!isset($_SESSION['connected'])) {
            header('Location: login.php?error=7');
        }
        include '../php/navbar.php';
    ?>

    <br>
    <?php
     include '../php/display/errorAccount.php';
    ?>

<div class="tab">
  <button class="tablinks" onclick="openTabs(event, 'general')" id="defaultOpen"><?= _Information ?></button>
  <button class="tablinks" onclick="openTabs(event, 'changemdp')"><?= _ChangePsswd ?></button>
  <button class="tablinks" onclick="openTabs(event, 'changemail')"><?= _ChangeMail ?></button>
  <button class="tablinks" onclick="openTabs(event, 'delAccount')"><span class='error'><?= _DeleteAccount ?></span></button>
</div>

<div id="general" class="tabcontent">
  <h3><?= _Information ?></h3>
    <?= _LastName ?> <?php echo $_SESSION['nom']; ?> <br>
    <?= _FirstName ?> <?php echo $_SESSION['prenom']; ?> <br><br>
    <?= _Nobject ?> <?php echo $_SESSION['nobjet']; ?> <br><br>
    <?= _ActualMail ?>  <?php echo $_SESSION['mail']; ?>
</div>

<div id="changemdp" class="tabcontent">
  <h3><?= _ChangePsswd ?></h3>
  <form action="../php/changemdp.php" method ="post">
    <label for="password"><?= _NewPsswd ?></label>
    <input type="password" id="password" name="password" placeholder="<?= _NewPsswdHolder ?>" required="required" pattern="(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" title="Votre mot de passe doit contenir 8 caractères dont au moins une majuscule, un caractère spécial et un chiffre"><br>

    <label for="password2"><?= _Pass2 ?></label>
    <input type="password" id="password2" name="password2" placeholder="<?= _Pass2Holder ?>" required="required" pattern="(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" title="Votre mot de passe doit contenir 8 caractères dont au moins une majuscule, un caractère spécial et un chiffre"><br>

    <input type="submit" value="<?= _ChangePsswd ?>">
  </form>
</div>

<div id="changemail" class="tabcontent">
  <h3><?= _ChangeMail ?></h3>
  <form action="../php/changemail.php" method ="post">
  <label for="usermail"><?= _NewMail ?></label>
  <input type="text" id="usermail" name="mail" placeholder="<?= _NewMailHolder ?>" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" required="required"><br>
  <label for="password"><?= _Pass1 ?></label>
  <input type="password" id="password" name="password" placeholder="<?= _Pass1Holder ?>"><br/>
  <input type="submit" value="<?= _ChangeMail ?>">
  </form>
</div>

<div id="delAccount" class="tabcontent">
  <h3><span class='error'><?= _DeleteAccount ?></span></h3>
    <button onclick="deleteaccount()"><?= _DeleteAccount ?></button>

    <script>
        function deleteaccount() {
            result = confirm('<?= _DeleteAccountConfirm ?>');
            if (result==1) {
              location.replace("../php/deleteAccount.php")
            }
        }
    </script>
</div>

<script src=../javascript/tabs.js></script>

    <?php
        include 'footer.php';
    ?>
    <a href='../php/disconnect.php' class="disconnect"><div class='write'><?= _Disconnect ?></div></a>
</body>

</body>
</html>