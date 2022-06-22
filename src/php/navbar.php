<?php
        if(!isset($_SESSION)) 
            { 
                session_start(); 
            } 
        if (isset($_SESSION['connected']) && $_SESSION['connected']==true ) {
            include '../Modele/navbarconnected.php';
        } else {
            include '../Modele/navbardisconnected.php';}
?>