<?php
include_once 'isAuthenticated.php';
$pageTitle = 'incident';
include_once 'autoload.php';
include_once 'process.php';
$incidentRepository = new IncidentRepository();
$incidents = $incidentRepository->findAll();


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title><?php echo isset($pageTitle)? $pageTitle: 'projet' ?></title>
    <meta charset="UTF-8">
    <meta name=viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="public/style.css">
    <link rel="stylesheet" type="text/css" href="public/CSS/ButtonStyle.css">
</head>
<body>
<?php
if (isset($_SESSION['user'])&&(isset($_SESSION['id']))) {
    ?>

    <div class="sidebar">
        <div class="sidebar-brand">
            <h2><span class="fa fa-user-o"></span>Gestion Des Incidents</h2>
        </div>

        <div class="sidebar-menu">
            <ul>
                <?php
                if ($_SESSION['user']=="admin") {
                ?>
                <li>
                    <a href="home.php" ><span class="fa fa-home"></span><span>Accueil</span></a>
                </li>
                <li>
                    <a href="utilisateur.php"><span class="fa fa-user"></span><span>Utilisateurs</span></a>
                </li>
                <li>
                    <a href="" class="active"><span class="fa fa-exclamation-circle"></span><span>Incidents</span></a>
                </li>
                <li>
                    <a href=""><span class="fa fa-line-chart"></span><span>Statistique</span></a>
                </li>
                <?php
                }

                else{
                ?>
                <li>
                    <a href="home.php" ><span class="fa fa-home"></span><span>Accueil</span></a>
                </li>
                <li>
                    <a href="" class="active"><span class="fa fa-exclamation-circle"></span><span>Incidents</span></a>
                </li>
                <?php
                }
                ?>
                <img src="public/assets/images/mèdina%20logo.png" alt="avatar" style="width:100%">
            </ul>
        </div>
    </div>



    <div class="content">

        <header>
            <p><label for="menu"><span class="fa fa-bars"></span></label><span class="accueil">Accueil</span></p>
            <?php
            if ($_SESSION['user']=="employe") {
            ?>
                <div>
                <a href="/addincident.php" class="myButton">créer un incident</a>
                </div>
                <?php
            }
            ?>
            <div class="user-wrapper" id="dropdown">
                <?php
                if ($_SESSION['user']=="admin") {
                    ?>
                    <div>
                        <small>ADMIN</small>
                    </div>

                    <img src="public/assets/images/logo-admin.jpg" width="50" height="50" class="logo-admin">
                    <?php
                }
                else{
                    ?>
                    <div>
                        <small>EMPLOYE</small>
                    </div>
                    <img src="public/assets/images/icon-user.png" width="50" height="50" class="logo-admin">
                    <?php
                }
                ?>
                <div class="dropdown-content">
                    <p>Profile</p>
                    <a class="dropdown-item" href="logout.php">Logout</a>
                </div>

            </div>

        </header>
        <main>
            <div class="limiter">

                <div class="container-table100">
                    <div class="wrap-table100">
                        <div class="table100">
                            <?php
                            if((isset($_GET['success'])) && $_GET['success']==1){
                            ?>
                            <p style="color: #00bf00">incident ajouté avec succes</p>
                            <?php
                            }
                            ?>
                            <?php
                            if((isset($_GET['success'])) && $_GET['success']==2){
                                ?>
                                <p style="color: #bf0000">incident supprimé</p>
                                <?php
                            }
                            else if((isset($_GET['error'])) && $_GET['error']==2){
                            ?>
                            <p style="color: #bf0000">can't delete incident</p>
                            <?php
                            }
                            ?>
                            <?php
                            if((isset($_GET['success'])) && $_GET['success']==3){
                                ?>
                                <p style="color: #00bf00">incident modifié avec succes</p>
                                <?php
                            }else if((isset($_GET['error'])) && $_GET['error']==3){
                                ?>
                                <p style="color: #bf0000">error</p>
                                <?php
                            }
                            ?>
                            <table>
                                <thead>
                                <tr class="table100-head">
                                    <th class="column1">réference</th>
                                    <th class="column2">titre</th>
                                    <th class="column3">date_création</th>
                                    <th class="column4">priorité</th>
                                    <th class="column7">departement</th>
                                    <th class="column8">filiale</th>
                                    <th class="column5">état</th>
                                    <?php
                                    if($_SESSION['user']=="admin"){
                                    ?>
                                    <th  class="column6" colspan="1">demandeur</th>
                                    <?php
                                    }
                                    ?>
                                    <th colspan="2">action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($incidents as $incident) {
                                if(($_SESSION['id']==$incident->id_utilisateur)||($_SESSION['user']=="admin")){

                                    ?>
                                    <tr>
                                        <td><?= $incident->reference ?></td>
                                        <td><?= $incident->titre ?></td>
                                        <td><?= $incident->datecreation ?></td>
                                        <td><?= $incident->nom_priority ?></td>
                                        <?php

                                        $departementRepository = new DepartementRepository();
                                        $departements = $departementRepository->findAll();
                                        $filialeRepository = new FilialeRepository();
                                        $filiales = $filialeRepository->findAll();

                                        foreach ($departements as $departement){
                                        if ($departement->id_departement == $incident->id_departement){

                                        ?>
                                            <td><?= $departement->nom ?>

                                                 </td>
                                        <?php
                                        foreach($filiales as $filiale){
                                            if($departement->id_filiale == $filiale->id_filiale){
                                                ?>
                                        <td><?= $filiale->nom ?>

                                        </td>
                                            <?php }
                                        }

                                        }


                                        }
                                        ?>


                                        <td><?= $incident->nom_etat ?></td>
                                        <?php
                                            if($_SESSION['user']=="admin"){
                                            $personneRepository = new PersonneRepository();
                                            $personnes = $personneRepository->findAll();
                                            foreach ($personnes as $personne){
                                            if ($personne->id_utilisateur == $incident->id_utilisateur){

                                            ?>
                                        <td><?= $personne->id_utilisateur ?>

                                            <?= $personne->nom ?> </td>
                                                <?php    } ?>

                                        <?php
                                            }}
                                        ?>
                                        <td>

                                            <a href="updateIncident.php?editincid=<?php echo $incident->id_incid; ?>"
                                               class="btn btn-info">Edit</a>
                                            <a href="incident_delete.php?deleteincid=<?php echo $incident->id_incid; ?>"
                                               class="btn btn-danger">Delete</a>

                                        </td>

                                    </tr>
                                    <?php
                                }}
                                ?>


                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>






        </main>
        <!--===============================================================================================-->
        <script src="Tab_Utulisateurs/vendor/jquery/jquery-3.2.1.min.js"></script>
        <!--===============================================================================================-->
        <script src="Tab_Utulisateurs/vendor/bootstrap/js/popper.js"></script>
        <script src="Tab_Utulisateurs/vendor/bootstrap/js/bootstrap.min.js"></script>
        <!--===============================================================================================-->
        <script src="Tab_Utulisateurs/vendor/select2/select2.min.js"></script>
        <!--===============================================================================================-->
        <script src="Tab_Utulisateurs/js/main.js"></script>

    </div>
<?php
}
?>
</body>
</html>