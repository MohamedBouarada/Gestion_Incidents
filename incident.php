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
if (isset($_SESSION['user'])) {
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
                <?php
                }
                else{
                ?>
                <div>
                    <small>EMPLOYE</small>
                </div>
                <?php
                }
                ?>
                <img src="public/assets/images/logo-admin.jpg" width="50" height="50" class="logo-admin">
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
                            <table>
                                <thead>
                                <tr class="table100-head">
                                    <th>réference</th>
                                    <th>titre</th>
                                    <th>date_création</th>
                                    <th>priorité</th>
                                    <th>état</th>
                                    <th>action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($incidents as $incident) {

                                    ?>
                                    <tr>
                                        <td><?= $incident->reference ?></td>
                                        <td><?= $incident->titre ?></td>
                                        <td><?= $incident->datecreation ?></td>
                                        <td><?= $incident->nom_priority ?></td>
                                        <td><?= $incident->nom_etat ?></td>
                                        <td>
                                            <a href="updateIncident.php?editincid=<?php echo $incident->id_incid; ?>"
                                               class="btn btn-info">Edit</a>

                                    </tr>
                                    <?php
                                }
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