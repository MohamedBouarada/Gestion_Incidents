<?php
include_once 'isAuthenticated.php';
$pageTitle = 'user';
include_once 'autoload.php';
include_once 'process.php';
$personneRepository = new PersonneRepository();
$personnes = $personneRepository->findAll();
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
</head>
<body>
<?php
if (isset($_SESSION['user'])) {
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
                <li>
                    <a href=""><span class="fa fa-address-book"></span><span>A-propos</span></a>
                </li>
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
                    <div class="wrap-table100">
                        <div class="table100">
                            <table>
                                <thead>
                                <tr class="table100-head">
                                    <th class="column1">Username</th>
                                    <th class="column2">Name</th>
                                    <th class="column3">First Name</th>
                                    <th class="column4">Poste</th>
                                    <th class="column5">Phone</th>
                                    <th class="column6">Type</th>
                                    <th colspan="2">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($personnes as $personne) {
                                    if($personne->type=="employe"){
                                        ?>
                                        <tr>
                                            <td><?= $personne->username ?></td>
                                            <td><?= $personne->nom ?></td>
                                            <td><?= $personne->prenom ?></td>
                                            <td><?= $personne->poste ?></td>
                                            <td><?= $personne->phone ?></td>
                                            <td><?= $personne->type ?></td>
                                            <td>
                                                <a href="userUpdate.php?edit=<?php echo $personne->id_utilisateur; ?>"
                                                   class="btn btn-info">Edit</a>
                                                <a href="utilisateur.php?delete=<?php echo $personne->id_utilisateur; ?>"
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
                <form action="process.php" method="POST">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="nom" class="form-control" value="<?php echo $nom; ?>" >
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="text" name="username" class="form-control"
                               value="<?php echo $username; ?>" >
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