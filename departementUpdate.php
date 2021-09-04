<?php
include_once 'connection.php';
$id=$_POST['id'];
$nom=$_POST['nom'];
$result=$conn->query("UPDATE departement SET nom='$nom' WHERE id_departement='$id'");
$id_filiale=$conn->query("SELECT * FROM departement WHERE id_departement='$id'");
$row=$id_filiale->fetch_array();
$idf=$row['id_filiale'];
if($result){

header('location: departement.php?idfiliale='.$idf );

}else{
    die(mysqli_error($conn));
   // header('Location: departement_update?error=1"');
}