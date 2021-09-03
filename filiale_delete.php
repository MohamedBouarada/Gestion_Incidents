<?php
include_once 'connection.php';

$id=$_GET['delete'];
$result=$conn->query("DELETE FROM filiale WHERE id_filiale='$id'  ");
if($result){

    header("location: filiale.php?success=2");
}else{
    header("location: filiale.php?error=2");
}

?>
