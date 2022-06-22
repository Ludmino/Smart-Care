<?php
    $servername = "herogu.garageisep.com";
    $username = "lSexcXMy03_app_g3d";
    $password = "uMWyer4Yak9fClUk";
    $dbname = "b8F6e3Zn63_app_g3d";
    // Create connection
    global $conn;
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
?>
