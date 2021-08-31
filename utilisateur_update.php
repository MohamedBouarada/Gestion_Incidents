<?php
include_once 'connection.php';
    $id=$_POST['id'];
    $nom=$_POST['nom'];
    $username=$_POST['username'];
    $firstname=$_POST['firstname'];
    $phone=$_POST['phone'];
    $poste=$_POST['poste'];
    $password=$_POST['password'];
    $departement=$_POST['departements'];
    //$id_departement = $conn->query("SELECT id_departement FROM departement WHERE nom=$departement");
    $result=$conn->query("UPDATE utilisateur SET nom='$nom', prenom='$firstname',username='$username',password='$password',phone='$phone', poste='$poste', id_departement='$departement' WHERE id_utilisateur='$id'");


if($result){
    header("location: utilisateur.php?success=1");
}else{
    die(mysqli_error($conn));
    header("location: utilisateur.php?error=1");
}
    ?>

