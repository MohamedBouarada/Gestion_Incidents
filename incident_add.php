<?php
include_once 'connection.php';


    $reference=$_POST['reference'];
    $titre=$_POST['titre'];
    $description=$_POST['description'];

    $date_création=date("Y-m-d H:i:s");
    $departement=$_POST['departements'];
    //$id_departement = $conn->query("SELECT id_departement FROM departement WHERE nom=$departement");
    $id_user=$_POST['utilisateur'];
    $etat="en attente";
    $priority=$_POST['priority'];
    $result = $conn->query("INSERT INTO incident (reference,titre,description,datecreation,id_departement,nom_etat,nom_priority,id_utilisateur) VALUES ('$reference','$titre','$description','$date_création','$departement','en attente','$priority','$id_user')");
    //header("location: incident.php");
    if($result){
    header("location: incident.php?success=1");
    }else{
    die(mysqli_error($conn));
    header("location: incident.php?error=1");
    }


    ?>