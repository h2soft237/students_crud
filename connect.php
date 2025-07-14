<?php
    require_once "config.php";

    $con=mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_NAME);

    if($con===false){
        die("Erreur : La connexion au serveur a rchoue".mysqli_connect_error());
    }
?>