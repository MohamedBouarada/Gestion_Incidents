<?php
include_once 'connection.php';
include_once 'isAuthenticated.php';
$id=$_POST['idincid'];

if($_SESSION['user']=="employe") {

    $nom_état="en attente";

    $reference=$_POST['reference'];
    $titre=$_POST['titre'];
    $datecreation=date("Y-m-d H:i:s");
    $id_departement=$_POST['departements'];
    $description = $_POST['description'];
    $priority = $_POST['priority'];
    $resultat=$conn->query("UPDATE incident SET reference='$reference', titre='$titre',description='$description',datecreation='$datecreation',id_departement='$id_departement', nom_priority='$priority' WHERE id_incid='$id'");

}
else{
    $nom_état = $_POST['etat'];
    $commentaire=$_POST['commentaire'];
    $resultat=$conn->query("UPDATE incident SET nom_etat='$nom_état', commentaire='$commentaire' WHERE id_incid='$id'");
}


if($resultat){

    header("location: incident.php?success=3");
}else{
    die(mysqli_error($conn));
    header("location: incident.php?error=3");
}
//header("location: incident.php");



?>