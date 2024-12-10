<?php
include "db.php";

if($_SERVER['REQUEST_METHOD'] == "POST"){
    $titre = htmlspecialchars($_POST['title']);
    $destination = htmlspecialchars($_POST['dest']);
    $description = htmlspecialchars($_POST['desc']);
    $date_debut = htmlspecialchars($_POST['dateDebut']);
    $date_fin = htmlspecialchars($_POST['dateFin']);
    $prix = htmlspecialchars($_POST['price']);
    $places_disponible = htmlspecialchars($_POST['places']);

    // echo $titre . $description . $destination . $date_debut . $date_fin . $prix . $places_disponible;
    $sql = "INSERT INTO `activite`(`titre`, `description`, `destination`, `prix`, `date_debut`, `date_fin`, `places_disponible`)
            VALUES('$titre', '$description', '$destination', '$prix', '$date_debut', '$date_fin',  '$places_disponible')";
        // echo "done";
        $result = $conn -> query($sql);
        header("Location: index.php");
}

?>