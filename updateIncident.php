<?php
include_once 'isAuthenticated.php';
$pageTitle = 'updateIncident';
include_once 'autoload.php';
include_once 'process.php';

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
if (isset($_SESSION['user'])&&(isset($_SESSION['id']))) {

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
            <div id="demoFont">editer un incident</div>
            <div class="form-style-5">

                    <fieldset>
                        <form action="incident_update.php" method="POST">
                            <input type="hidden" name="idincid" value="<?php if(isset($id)){echo $id; }?>">
                            <?php
                            if ($_SESSION['user']=="employe"){
                            ?>
                                <div class="form-group">
                                    <label>Réference</label>
                                    <input type="text" name="reference" class="form-control"
                                           value="<?php if(isset($reference)){echo $reference; }?>" >
                                </div>


                                <div class="form-group">
                                    <label>titre</label>
                                    <input type="text" name="titre" class="form-control"
                                           value="<?php if(isset($titre)){echo $titre; }?>" >
                                </div>
                                <div class="form-group">
                                    <label>description</label>
                                    <input type="text" name="description" class="form-control"
                                           value="<?php if(isset($description)){echo $description; }?>" >
                                </div>
                                <div class="form-group">
                                    <label>Date De Création</label>
                                    <input type="datetime-local" name="datecreation" class="form-control"
                                           value="<?php if(isset($datecreation)){echo $datecreation; }?>" >
                                </div>
                                <div class="form-group">
                                    <label>Département</label>
                                    <select id="depart" name="departements">
                                        <?php
                                        $departementRepository = new DepartementRepository();
                                        $departementss = $departementRepository->findAll();
                                        foreach ($departementss as $departements){

                                            ?>
                                            <option value="<?=$departements->id_departement ?>" ><?= $departements->nom ?> </option>



                                            <?php
                                        }
                                        ?>
                                    </select>
                                </div>

                                <label>Prioritè</label>
                                <select id="prio" name="priority">
                                    <?php if(isset($priority)&&($priority=="haute")){?>
                                    <option value="haute" selected>haute</option>
                                    <option value="moyenne">moyenne</option>
                                    <option value="faible">faible</option>
                                    <?php
                                    }
                                    elseif(isset($priority)&&($priority=="moyenne")){?>
                                    <option value="haute" >haute</option>
                                    <option value="moyenne" selected>moyenne</option>
                                    <option value="faible">faible</option>
                                    <?php
                                    }
                                    else
                                    {
                                        ?>
                                    <option value="haute" >haute</option>
                                    <option value="moyenne" >moyenne</option>
                                    <option value="faible" selected>faible</option>
                                    <?php
                                    }
                                    ?>

                                </select>
                                <div class="form-group">
                                    <label>commentaire</label>
                                    <input type="text" name="commentaire" class="form-control"
                                           value="<?php if(isset($commentaire)){echo $commentaire; }?>" >
                                </div>


                                <?php
                            }
                            else {
                            ?>
                                <div class="form-group">
                                    <label>description</label>
                                    <input type="text" name="description" class="form-control"
                                           value="<?php if(isset($description)){echo $description; }?>" >
                                </div>
                                <div class="form-group">
                                    <label>Etat</label>
                                    <select id="et" name="etat">
                                        <?php if(isset($nom_etat)&&($nom_etat=="en attente")){?>
                                            <option value="en attente" selected>en attente</option>
                                            <option value="corrige">corrige</option>
                                            <option value="non-traite">non-traite</option>
                                            <?php
                                        }
                                        elseif(isset($nom_etat)&&($nom_etat=="corrige")){?>
                                            <option value="en attente" >en attente</option>
                                            <option value="corrige" selected>corrige</option>
                                            <option value="non-traite">non-traite</option>
                                            <?php
                                        }
                                        else
                                        {
                                            ?>
                                            <option value="en attente" >en attente</option>
                                            <option value="corrige" >corrige</option>
                                            <option value="non-traite" selected>non-traite</option>
                                            <?php
                                        }
                                        ?>

                                    </select>
                                    <div class="form-group">
                                        <label>commentaire</label>
                                        <input type="text" name="commentaire" class="form-control"
                                               value="<?php if(isset($commentaire)){echo $commentaire; }?>">
                                    </div>

                                </div>

                            <?php
                            }
                            ?>
                            <input type="submit" value="modifier" class="myButton">


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