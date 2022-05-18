<?php
    $servername = $_ENV['MYSQL_HOST'];
    $username = $_ENV['MYSQL_USER']; //Créer un nouvel utilisateur
    $password = $_ENV['MYSQL_PASSWORD']; // Mot de passe du nouvel utilisateur
    $dbname = $_ENV['MYSQL_DATABASE'];
    // Create connection
    global $conn;
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
?>