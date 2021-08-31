<?php
include_once 'connection.php';

$id=$_GET['delete'];
$result=$conn->query("DELETE FROM utilisateur WHERE id_utilisateur='$id'");
if($result){

    header("location: utilisateur.php?success=2");
}else{

    header("location: utilisateur.php?error=2");
}

?>


