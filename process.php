<?php

include_once 'connection.php';
if(isset($conn)){
if(isset($_GET['delete'])){
    $id=$_GET['delete'];
    $conn->query("DELETE FROM utilisateur WHERE id_utilisateur='$id'");

    header("location: utilisateur.php");
}
   //lezem ykoun l'utilisateur houwa li 3mal creation mta3 l'incident bech ynajem yafs5ou
    if(isset($_GET['deleteincid'])){
        $id=$_GET['deleteincid'];
        $conn->query("DELETE FROM incident WHERE id_incid='$id'");

        header("location: incident.php");
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
if(isset($_GET['editincid'])){
    $id=$_GET['editincid'];
    $result = $conn->query("SELECT * FROM incident WHERE id_incid='$id'");

    if($result){

        $row = $result->fetch_array();
        $reference=$row['reference'];
        $titre=$row['titre'];
        $datecreation=$row['datecreation'];
        $id_departement=$row['id_departement'];
        $description = $row['description'];
        $priority = $row['nom_priority'];
        $nom_état = $row['nom_etat'];
    }
}

if(isset($_POST['updateincid'])){
    $id=$_POST['id_incid'];
    $etat=$_POST['etat'];

    $description=$_POST['description'];
    $conn->query("UPDATE incident SET description='$description', nom_etat='$etat' WHERE id_incid='$id'");
    $_SESSION['message'] = "updated";


}

if(isset($_POST['enregistrer'])&&($_SESSION['user']=="employe")&&(!empty($_POST['reference']))&&(!empty($_POST['titre']))&&(!empty($_POST['description']))&&(!empty($_POST['datecreation']))&&(!empty($_POST['departement']))&&(!empty($_POST['utilisateur']))){
        echo "<h1> Login failed. Invalid username or password.</h1>";
        $reference=$_POST['reference'];
        $titre=$_POST['titre'];
        $description=$_POST['description'];

        $date_création=$_POST['datecreation'];
        $departement=$_POST['departement'];
        $id_departement = $conn->query("SELECT id_departement FROM departement WHERE nom=$departement");
        $id_user=$_POST['utilisateur'];
        $conn->query("INSERT INTO incident (id_incid,reference,titre,description,etat,date_création,id_departement,id_utilisateur) VALUES ('','$reference','$titre','$description','en attente','date_création','id_département')");
        header("location: incident.php");


}
}