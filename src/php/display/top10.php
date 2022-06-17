<?php
    require '../php/connexion.php';

    //On va prendre le nom, prénom et le score des 100 utilisateur qui ont le plus grand score et les afficher
    //Le calcul du score reste à définir
    $sql ='SELECT nom,prenom,score FROM utilisateur ORDER BY score DESC LIMIT 10;';
    $result = $conn->query($sql);
    $rank = 1;
    while($row = mysqli_fetch_assoc($result)) {
        echo("<div class='case'>$rank $row[nom] $row[prenom] <span class='alignedroite'>$row[score]</span></div>"); 
        $rank+=1;
    }
?>