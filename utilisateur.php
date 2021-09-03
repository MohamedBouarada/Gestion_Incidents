<?php
include_once 'isAuthenticated.php';
$pageTitle = 'user';
include_once 'autoload.php';
include_once 'process.php';
include_once 'connection.php';
$personneRepository = new PersonneRepository();


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
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.0/css/jquery.dataTables.min.css">

</head>
<body>
<?php
if (isset($_SESSION['user'])&&($_SESSION['user']=="admin")) {
    ?>
    <input type="checkbox" id="menu" name="">
    <div class="sidebar">
        <div class="sidebar-brand">
            <h2><span class="fa fa-user-o"></span>Gestion Des Incidents</h2>
        </div>

        <div class="sidebar-menu">
            <ul>
                <li>
                    <a href="home.php" ><span class="fa fa-home"></span><span>Accueil</span></a>
                </li>
                <li>
                    <a href="" class="active"><span class="fa fa-user"></span><span>Utilisateurs</span></a>
                </li>
                <li>
                    <a href="incident.php"><span class="fa fa-exclamation-circle"></span><span>Incidents</span></a>
                </li>
                <li>
                    <a href=""><span class="fa fa-line-chart"></span><span>Statistique</span></a>
                </li>
                <img src="public/assets/images/mèdina%20logo.png" alt="avatar" style="width:100%">
            </ul>
        </div>
    </div>



    <div class="content">

        <header>
            <p><label for="menu"><span class="fa fa-bars"></span></label><span class="accueil">Accueil</span></p>


            <div class="user-wrapper" id="dropdown">
                <div>
                    <small>ADMIN</small>
                </div>

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
                    <div>
                        <a href="/userAdd.php" class="myButton">Ajouter un utilisateur</a>
                    </div>

                    <div class="wrap-table100">


                        <div class="table100">
                            <?php
                            if((isset($_GET['success'])) && $_GET['success']==1){
                                ?>
                                <p style="color: #00bf00">incident modifié avec succes</p>
                                <?php
                            }else if((isset($_GET['error'])) && $_GET['error']==1){
                                ?>
                                <p style="color: #bf0000">error</p>
                                <?php
                            }

                            else if((isset($_GET['success'])) && $_GET['success']==2){
                                ?>
                                <p style="color: #00bf00">incident supprimé avec succes</p>
                                <?php
                            }else if((isset($_GET['error'])) && $_GET['error']==2){
                                ?>
                                <p style="color: #bf0000">on ne peut pas supprimer cet utilisateur</p>
                                <?php
                            }
                            ?>
                            <?php
                            if((isset($_GET['success'])) && $_GET['success']==3){
                                ?>
                                <p style="color: #00bf00">utilisateur ajouté avec succes</p>
                                <?php
                            }
                            ?>
                            <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
                            <script src="https://cdn.datatables.net/1.11.0/js/jquery.dataTables.min.js"></script>
                            <script>
                                $(document).ready(function() {
                                    $('#example').DataTable();
                                } );
                            </script>


                            <table id="example" class="display" width="100%">

                                <thead>
                                <tr class="table100-head">
                                    <th class="column1">Nom</th>
                                    <th class="column2">Prenom</th>
                                    <th class="column3">Login</th>
                                    <th class="column4">Poste</th>
                                    <th class="column5">Telephone</th>
                                    <th class="column7">Département</th>
                                    <th class="column6">Type</th>
                                    <th >Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $personnes = $personneRepository->findAll();

                                foreach ($personnes as $personne) {

                                        ?>
                                        <tr>

                                            <td><?= $personne->nom ?></td>
                                            <td><?= $personne->prenom ?></td>
                                            <td><?= $personne->username ?></td>
                                            <td><?= $personne->poste ?></td>
                                            <td><?= $personne->phone ?></td>
                                            <?php

                                            $departementRepository = new DepartementRepository();
                                            $departements = $departementRepository->findAll();

                                            foreach ($departements as $departement){
                                                if ($departement->id_departement == $personne->id_departement){

                                                    ?>
                                                    <td><?= $departement->nom ?>

                                                    </td>
                                                    <?php
                                                }}
                                            ?>
                                            <td><?= $personne->type ?></td>
                                            <td>
                                                <a href="userUpdate.php?edit=<?php echo $personne->id_utilisateur; ?>"
                                                   class="btn btn-info">Edit</a>
                                                <a href="utilisateur_delete.php?delete=<?php echo $personne->id_utilisateur; ?>"
                                                   class="btn btn-danger">Delete</a>

                                            </td>
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


    </div>
    <?php
}
?>
</body>
</html>