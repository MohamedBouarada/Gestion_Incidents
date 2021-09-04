<?php
include_once 'connection.php';

$id_filiale=$_POST['idfiliale'];
$nom=$_POST['nom'];
$result = $conn->query("INSERT INTO departement (nom,id_filiale) VALUES ('$nom','$id_filiale')");
//header("location: incident.php");
if($result){
    header('Location: ' . $_SERVER['HTTP_REFERER']."&&success=3");
}else{
    die(mysqli_error($conn));
    header("location: departementAdd.php?error=3");
}
