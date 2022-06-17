<?php
    require '../php/connexion.php';
    if (isset($_POST['searchnom']) || isset($_POST['searchprenom']) ) {
        if ($_POST['searchnom']!='') {
            if ($_POST['searchprenom']!='') {
                $sql = "SELECT ROW_NUMBER() OVER() AS rank,nom,prenom,score FROM utilisateur WHERE nom='$_POST[searchnom]' AND prenom='$_POST[searchprenom]' ORDER BY score DESC LIMIT 10 ;";
                $resultuser = $conn->query($sql);
                if ($resultuser->num_rows > 0) {
                    while($row = mysqli_fetch_assoc($resultuser)) {
                        echo("<span class='center'><p>$row[rank] $row[nom] $row[prenom] $row[score]</p></span>"); 
                    }
                }
            } else {
                $sql = "SELECT ROW_NUMBER() OVER() AS rank,nom,prenom,score FROM utilisateur WHERE nom='$_POST[searchnom]' ORDER BY score DESC LIMIT 10 ;";
                $resultuser = $conn->query($sql);
                if ($resultuser->num_rows > 0) {
                    while($row = mysqli_fetch_assoc($resultuser)) {
                        echo("<span class='center'><p>$row[rank] $row[nom] $row[prenom] $row[score]</p></span>"); 
                    }
                }   
            }
        } else {
            if ($_POST['searchprenom']!='') {
                $sql = "SELECT ROW_NUMBER() OVER() AS rank,nom,prenom,score FROM utilisateur WHERE prenom='$_POST[searchprenom]' ORDER BY score DESC LIMIT 10 ;";
                $resultuser = $conn->query($sql);
                if ($resultuser->num_rows > 0) {
                    while($row = mysqli_fetch_assoc($resultuser)) {
                        echo("<span class='center'><p>$row[rank] $row[nom] $row[prenom] $row[score]</p></span>"); 
                    }
                }
            } else {
                echo("<span class='center'><p>Vous devez fournir au moins un nom ou un prénom.</p></span>");
            }
        }
    }
?>