<?php 
$host = "localhost";
$use = "root";
$pass = "";
$db = "reservation_voyage";

$conn = new mysqli($host,$use,$pass,$db);

if(!$conn){
    echo "not connected" . $conn->erorr;
};

$sql = "SELECT * FROM `client`";
$result = $conn -> query($sql);

if ($result-> num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo $row["id_client"]. 
        $row["nom"]. 
        $row["prenom"]. 
        $row["email"]. 
        $row["telephone"]. 
        $row["adresse"]  ;
    } 
}