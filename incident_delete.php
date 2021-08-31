<?php
include_once 'connection.php';

    $id=$_GET['deleteincid'];
    $result=$conn->query("DELETE FROM incident WHERE id_incid='$id'");
if($result){

    header("location: incident.php?success=2");
}else{
    die(mysqli_error($conn));
    header("location: incident.php?error=2");
}
    //header("location: incident.php");
?>