<?php
        if(!isset($_SESSION)) 
            { 
                session_start(); 
            } 
        if (isset($_SESSION['connected']) && $_SESSION['connected']==true ) {
            include '../modele/navbarconnected.php';
        } else {
            include '../modele/navbardisconnected.php';}
?>