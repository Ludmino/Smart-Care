<?php
    require  'connexion.php';
    $passCheck = htmlspecialchars($_POST["password"], ENT_COMPAT,'ISO-8859-1', true);
    $mail = htmlspecialchars($_POST["mail"], ENT_COMPAT,'ISO-8859-1', true);

    $sql = $conn->prepare("SELECT Password,id,nom,numero_objet,prenom,score FROM utilisateur WHERE Mail=?;");
    $sql->bind_param("s", $mail);
    $sql->execute();
    $result = $sql->get_result();

    $redirectUrl = $_SERVER['HTTP_REFERER'];
    $matches= preg_match("/(error)/", $redirectUrl);
    if ($matches==1) {
        $redirectUrl = substr($redirectUrl, 0, -8);
    }

    if ($result->num_rows > 0) {
        $_passHash = mysqli_fetch_assoc($result);
        if (password_verify($passCheck,$_passHash['Password'])) {
            session_start();
            $_SESSION['connected']=TRUE;
            $_SESSION['mail'] = $mail;
            $_SESSION['id'] = $_passHash['id'];
            $_SESSION['nom'] = $_passHash['nom'];
            $_SESSION['score'] = $_passHash['score'];
            $_SESSION['nobjet'] = $_passHash['numero_objet'];
            $_SESSION['prenom'] = $_passHash['prenom'];
            $conn->close();
            header("Location: ../index.php");
        } else {
            $conn->close();
            header("Location:  $redirectUrl?error=3");
        }
    } else {
        $conn->close();
        header("Location:  $redirectUrl?error=4");
    }

?>