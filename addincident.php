<?php
include_once 'isAuthenticated.php';
$pageTitle = 'addincident';
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
    <link rel="stylesheet" type="text/css" href="public/formulaireStyle.scss">
    <link rel="stylesheet" type="text/css" href="public/CSS/ButtonStyle.css">
    <link rel="stylesheet" type="text/css" href="public/CSS/TextStyle.css">
</head>
<body>
<?php
if ((isset($_SESSION['user']))&&($_SESSION['user']=="employe")) {
    ?>
    <input type="checkbox" id="menu" name="">
    <div class="sidebar">
        <div class="sidebar-brand">
            <h2><span class="fa fa-user-o"></span>Gestion Des Incidents</h2>
        </div>

        <div class="sidebar-menu">
            <ul>
                <li>
                    <a href="employehome.php" ><span class="fa fa-home"></span><span>Accueil</span></a>
                </li>
                <li>
                    <a href="incident.php"><span class="fa fa-exclamation-circle"></span><span>Incidents</span></a>
                </li>
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
            <div class="form-style-5">

                <div id="demoFont">creation d'un nouveau incident</div>

                    <fieldset>
                        <?php
                        if((isset($_GET['error'])) && $_GET['error']==1){
                            ?>
                            <p style="color:#721c24 ">vérifiez vos données</p>
                            <?php
                        }
                        ?>
                        <form action="incident_add.php" method="POST">
                            <div class="form-group">
                                <label>Réference</label>
                                <input type="text" name="reference" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Titre</label>
                                <input type="text" name="titre" class="form-control" required >
                            </div>
                            <div class="form-group">
                                <label>Description</label>
                                <input type="text" name="description" class="form-control"
                                       required >
                            </div>
                            <div class="form-group">
                                <label>Prioritè</label>
                                <select id="prio" name="priority" required>
                                    <option value="haute">haute</option>
                                    <option value="moyenne">moyenne</option>
                                    <option value="faible">faible</option>
                                </select>

                            </div>

                                <input type="hidden" name="utilisateur" class="form-control"
                                       value="<?php echo $_SESSION['id']; ?>" >



                            <div class="form-group">
                                <label>Filiale</label>

                                <select id="filial" name="filiale" >
                                    <?php
                                    $filialeRepository = new FilialeRepository();
                                    $filiales = $filialeRepository->findAll();


                                    foreach ($filiales as $filiale){

                                    ?>
                                        <option value="<?= $filiale->id_filiale ?>" ><?= $filiale->nom ?> </option>

                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>


                            <div class="form-group">
                                <label>Département</label>
                                <select id="depart" name="departements">
                                    <?php
                                    $departementRepository = new DepartementRepository();
                                    $departementss = $departementRepository->findAll();
                                    foreach ($departementss as $departements){
                                    if($departements->id_filiale=="1"){
                                        ?>
                                            <option value="<?= $departements->id_departement ?>" ><?= $departements->nom ?> </option>

                                        <?php
                                    }
                                    }



                                    ?>
                                </select>
                            </div>

                                    <input type="submit" value="ajouter incident" class="myButton">
                                    <input type="reset" value="annuler" class="muButton2">



                        </form>


                    </fieldset>




            </div>
        </main>


    </div>
    <?php
}
?>
</body>
</html>