<?php
include_once 'connection.php';


$nom=$_POST['nom'];
$result = $conn->query("INSERT INTO filiale (nom) VALUES ('$nom')");
//header("location: incident.php");
if($result){
    header("location: filiale.php?success=3");
}else{
    die(mysqli_error($conn));
    header("location: filialeAdd.php?error=3");
}
