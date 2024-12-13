<?php
include "db.php";

if($_SERVER['REQUEST_METHOD'] == "POST"){
    $id_client = htmlspecialchars($_POST['clientSelect']);
    $id_activite = htmlspecialchars($_POST['activiteSelect']);
    $status = htmlspecialchars($_POST['status']);

    // INSERT INTO reservation (id_client, id_activite, date_reservation, status) VALUES (7, 3, '2025-07-18', 'Confirmée');

    $sql = "INSERT INTO `reservation`(`id_client`, `id_activite`, `status`)
            VALUES('$id_client', '$id_activite','$status')";
        // echo "done";
        $result = $conn -> query($sql);
        header("Location: index.php");
}

?>