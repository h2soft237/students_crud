<?php

require_once "connect.php";
if (isset($_GET["id"])) {

    $id = $_GET["id"];

    $req = mysqli_query($con, "DELETE FROM students WHERE id=$id");
    if ($req) {
        header("Location: index.php");
    } else {
        echo "Echec de la suppression";
    }
}
