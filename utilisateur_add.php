<?php
include_once 'connection.php';


$nom=$_POST['nom'];
$prenom=$_POST['prenom'];
$username=$_POST['username'];


$departement=$_POST['departements'];
//$id_departement = $conn->query("SELECT id_departement FROM departement WHERE nom=$departement");

$phone=$_POST['phone'];
$poste=$_POST['poste'];
$password=$_POST['password'];
$type=$_POST['type'];
$result = $conn->query("INSERT INTO utilisateur (nom,prenom,username,password,phone,poste,id_departement,type) VALUES ('$nom','$prenom','$username','$password','$phone','$poste','$departement','$type')");
//header("location: incident.php");
if($result){
    header("location: utilisateur.php?success=3");
}else{
    die(mysqli_error($conn));
    header("location: userAdd.php?error=3");
}


?>