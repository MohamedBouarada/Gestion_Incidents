<?php
include_once 'connection.php';

$id=$_GET['delete'];
$result=$conn->query("DELETE FROM departement WHERE id_departement='$id'  ");
if($result){

    header('Location: ' . $_SERVER['HTTP_REFERER']."&&success=2");
}else{
    header('Location: ' . $_SERVER['HTTP_REFERER']."&&error=2");
}

?>
