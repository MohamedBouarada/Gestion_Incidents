<?php
include_once 'isAuthenticated.php';
$pageTitle = 'home';
include_once 'process.php';
include_once 'autoload.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title><?php echo isset($pageTitle)? $pageTitle: 'projet' ?></title>
    <meta charset="UTF-8">
    <meta name=viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="public/style.css">
</head>
<body>
<?php
if (isset($_SESSION['id'])&&isset($_SESSION['user'])) {
    ?>
    <input type="checkbox" id="menu" name="">
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
                        <a href="home.php" class="active"><span class="fa fa-home"></span><span>Accueil</span></a>
                    </li>
                    <li>
                        <a href="utilisateur.php"><span class="fa fa-user"></span><span>Utilisateurs</span></a>
                    </li>
                    <li>
                        <a href="incident.php" ><span class="fa fa-exclamation-circle"></span><span>Incidents</span></a>
                    </li>
                    <li>
                        <a href=""><span class="fa fa-line-chart"></span><span>Statistique</span></a>
                    </li>
                    <img src="public/assets/images/mèdina%20logo.png" alt="avatar" style="width:100%">
                    <?php
                }

                else{
                    ?>
                    <li>
                        <a href="home.php" class="active" ><span class="fa fa-home"></span><span>Accueil</span></a>
                    </li>
                    <li>
                        <a href="incident.php" ><span class="fa fa-exclamation-circle"></span><span>Incidents</span></a>
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

                    <a href="home.php" >Profile</a>
                    <br>
                    <a  href="logout.php">Logout</a>
                </div>

            </div>
        </header>

        <main>

            <style>
                .card {
                    /* Add shadows to create the "card" effect */
                    box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
                    transition: 0.3s;
                    border-radius: 30px; /* 5px rounded corners */

                    margin-left: auto;
                    margin-right: auto;
                    margin-top: inherit;
                    width: 15em
                }
                /* On mouse-over, add a deeper shadow */
                .card:hover {
                    box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
                }

                /* Add some padding inside the card container */
                .container {
                    font-family: "Times New Roman", Times, serif;
                    font-size: 15px;
                    letter-spacing: 2px;
                    word-spacing: 2px;
                    color: #141949;
                    font-weight: 700;
                    text-decoration: none;
                    font-style: italic;
                    font-variant: normal;
                    text-transform: none;

                    padding: 5px 16px;
                }

                /* Add rounded corners to the top left and the top right corner of the image */
                img {
                    border-radius: 5px 5px 0 0;
                }

            </style>

            <div class="card">
                <img src="public/assets/images/user-icon.png" alt="Avatar" style="width:100%" >
                <div class="container">
                    <?php

                    $personneRepository = new PersonneRepository();
                    $personnes = $personneRepository->findById($_SESSION['id']);


                    ?>
                    <h4><i class="fa fa-address-card-o" aria-hidden="true"></i><b><?php echo" ";echo $personnes->username; ?></b></h4>
                    <h4><i class="fa fa-user-o" aria-hidden="true"></i><b>
                            <?=$personnes->nom;
                            echo " ";
                            echo $personnes->prenom; ?>
                    </b></h4>

                    <h4><i class="fa fa-desktop" aria-hidden="true"></i><b><?php echo " "; echo $personnes->poste; ?></b></h4>
                    <h4><i class="fa fa-mobile" aria-hidden="true"></i><b><?php echo " "; echo $personnes->phone; ?></b></h4>
                    <?php
                    $departementRepository = new DepartementRepository();
                    $departementss = $departementRepository->findAll();
                    foreach ($departementss as $departements){
                                        if($departements->id_departement==$personnes->id_departement){
                                    ?>
                                            <h4><i class="fa fa-building-o" aria-hidden="true"></i><b><?=$departements->nom; ?></b></h4>
                                    <?php
                                        }}
                                        ?>


                </div>
            </div>
        </main>
    </div>
    <?php
}
?>
</body>
</html>