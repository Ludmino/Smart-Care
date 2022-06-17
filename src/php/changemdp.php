<?php
    require  'connexion.php';
    session_start();
    $_pass1 = password_hash(htmlspecialchars($_POST["password"], ENT_COMPAT,'ISO-8859-1', true),PASSWORD_DEFAULT);
    $_pass2 = htmlspecialchars($_POST["password2"], ENT_COMPAT,'ISO-8859-1', true);

    $redirectUrl = $_SERVER['HTTP_REFERER'];
    $matches= preg_match("/(result)/", $redirectUrl);
    if ($matches==1) {
        $redirectUrl = substr($redirectUrl, 0, -9);
    }

    if (password_verify($_pass2,$_pass1)){

        $sql = $conn->prepare("UPDATE utilisateur SET Password = ? WHERE id = ?");
        $sql->bind_param("si", $_pass1, $_SESSION['id']);

        if ($sql->execute()) {
            $result = $sql->get_result();
            header("Location: $redirectUrl?result=1");
        } 
    } else {
        header("Location: $redirectUrl?result=0");
    }
?>