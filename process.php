<?php

include_once 'connection.php';
if(isset($conn)){

    if(isset($_GET['editfiliale'])){
        $id=$_GET['editfiliale'];
        $result = $conn->query("SELECT * FROM filiale WHERE id_filiale='$id'");

        if($result){

            $row = $result->fetch_array();
            $nom=$row['nom'];

        }
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
        $id_utilisateur=$row['id_utilisateur'];
        $commentaire=$row['commentaire'];
    }
}




}

