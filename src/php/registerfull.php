<?php
require  'connexion.php';
$_mail = htmlspecialchars($_POST["mail"], ENT_COMPAT,'ISO-8859-1', true);
$_pass1 = password_hash(htmlspecialchars($_POST["password"], ENT_COMPAT,'ISO-8859-1', true),PASSWORD_DEFAULT);
$_pass2 = htmlspecialchars($_POST["password2"], ENT_COMPAT,'ISO-8859-1', true);
$_nom = htmlspecialchars($_POST["nom"], ENT_COMPAT,'ISO-8859-1', true);
$_prenom = htmlspecialchars($_POST["prenom"], ENT_COMPAT,'ISO-8859-1', true);
$_nobjet =  htmlspecialchars($_POST["nobjet"], ENT_COMPAT,'ISO-8859-1', true);

$sql = $conn->prepare("SELECT Mail FROM utilisateur WHERE MAIL = ?;");
$sql->bind_param("s", $_mail);
$sql->execute();
$result = $sql->get_result();

$redirectUrl = $_SERVER['HTTP_REFERER'];
$matches= preg_match("/(error)/", $redirectUrl);
if ($matches==1) {
    $redirectUrl = substr($redirectUrl, 0, -8);
}


if ($result->num_rows > 0) {
    echo("<p>L'adresse mail existe déjà</p>");
    header("Location:  $_SERVER[HTTP_REFERER]?error=1");
} else {
    echo("<p>L'adresse mail n'existe pas</p>");
    if (password_verify($_pass2,$_pass1)){
        $sql = "INSERT INTO utilisateur(Nom,Prenom,Mail,Password,numero_objet) VALUES ('$_nom', '$_prenom', '$_mail','$_pass1',$_nobjet)";
        $sql = $conn->prepare("INSERT INTO utilisateur(Nom,Prenom,Mail,Password,numero_objet) VALUES (?,?,?,?,?);");
        $sql->bind_param("ssssi", $_nom, $_prenom, $_mail,$_pass1,$_nobjet);
                    if ($sql->execute()) {
                    } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                    }
                    $conn->close();
        header("Location:  ../Modele/login.php?success=1");
    } else {
        header("Location:  $redirectUrl?error=2");
    }
}
?>