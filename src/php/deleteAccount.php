<?php
session_start();
require  'connexion.php';
$sql = $conn->prepare("DELETE FROM `utilisateur` WHERE id=?;");
$sql->bind_param("i", $_SESSION['id']);
$sql->execute();
session_unset(); //or unset($_SESSION);
session_destroy();
session_commit(); // or session_write_close();
header("location: ../Modele/register.php?error=10");
?>