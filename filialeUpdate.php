<?php
include_once 'connection.php';
$id=$_POST['id'];
$nom=$_POST['nom'];
$result=$conn->query("UPDATE filiale SET nom='$nom' WHERE id_filiale='$id'");


if($result){
    header("location: filiale.php?success=1");
}else{
    die(mysqli_error($conn));
    header("location: filiale.php?error=1");
}