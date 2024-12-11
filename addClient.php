<?php
include "db.php";

  if($_SERVER['REQUEST_METHOD'] == "POST"){
    $name = htmlspecialchars($_POST['name']);
    $prenom = htmlspecialchars($_POST['prenom']);
    $phone = htmlspecialchars($_POST['phone']);
    $email = htmlspecialchars($_POST['email']);
    $date = htmlspecialchars($_POST['date']);
    $adresse = htmlspecialchars($_POST['adresse']);
    // echo $name . $prenom . $phone . $email . $date . $adresse;

    $sql = "INSERT INTO `client`(`nom`,`prenom`,`email`,`telephone`,`adresse`,`date_naissance`) 
            VALUES('$name', '$prenom', '$email', '$phone','$adresse', '$date')";

    $result = $conn->query($sql);
    header("Location: index.php");
  }
?>