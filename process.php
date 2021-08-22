<?php

include_once 'connection.php';
$nom='';
$username='';
$id=0;
if(isset($_GET['delete'])){
    $id=$_GET['delete'];
    $conn->query("DELETE FROM utilisateur WHERE id_utilisateur='$id'");

    header("location: utilisateur.php");
}
if(isset($_GET['edit'])){
    $id=$_GET['edit'];
    $result = $conn->query("SELECT * FROM utilisateur WHERE id_utilisateur='$id'");

    if($result){

        $row = $result->fetch_array();
        $nom=$row['nom'];
        $username=$row['username'];
        $firstname=$row['prenom'];
        $phone=$row['phone'];
        $poste=$row['poste'];
        $password=$row['password'];
        $departement=$row['id_departement'];

    }
}
if(isset($_POST['update'])){
    $id=$_POST['id'];
    $nom=$_POST['nom'];
    var_dump($username);
    $username=$_POST['username'];
    $firstname=$_POST['firstname'];
    $phone=$_POST['phone'];
    $poste=$_POST['poste'];
    $password=$_POST['password'];
    //$departement=$_POST['departement'];
    //$id_departement = $conn->query("SELECT id_departement FROM departement WHERE nom=$departement");
    $conn->query("UPDATE utilisateur SET nom='$nom', prenom='$firstname',username='$username',password='$password',phone='$phone', poste='$poste' WHERE id_utilisateur='$id'");
    $_SESSION['message'] = "updated";

}
