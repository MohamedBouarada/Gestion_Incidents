<?php
include_once 'isAuthenticated.php';
$pageTitle = 'updateUser';
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
    <link rel="stylesheet" type="text/css" href="public/CSS/TextStyle.css">
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
            <div id="demoFont">modifier utilisateur</div>
            <div class="form-style-5">
                <form>
                    <fieldset>
                        <form action="process.php" method="POST">
                            <input type="hidden" name="id" value="<?php echo $id; ?>">
                            <div class="form-group">
                                <label>Username</label>
                                <input type="text" name="username" class="form-control"
                                       value="<?php echo $username; ?>" >
                            </div>
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" name="nom" class="form-control" value="<?php echo $nom; ?>" >
                            </div>
                            <div class="form-group">
                                <label>First Name</label>
                                <input type="text" name="firstname" class="form-control"
                                       value="<?php echo $firstname; ?>" >
                            </div>
                            <div class="form-group">
                                <label>Poste</label>
                                <input type="text" name="poste" class="form-control"
                                       value="<?php echo $poste; ?>" >
                            </div>
                            <div class="form-group">
                                <label>Phone</label>
                                <input type="text" name="phone" class="form-control"
                                       value="<?php echo $phone; ?>" >
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="text" name="password" class="form-control"
                                       value="<?php echo $password; ?>" >
                            </div>
                            <div class="form-group">
                                <label>Département</label>
                                <select id="depart" name="departements">
                                    <?php
                                    $departementRepository = new DepartementRepository();
                                    $departementss = $departementRepository->findAll();
                                    foreach ($departementss as $departements){
                                        if($departements->id_departement==$departement){
                                    ?>
                                            <option value="departement1" selected><?= $departements->nom ?> </option>
                                    <?php
                                        }
                                        else{
                                            ?>
                                            <option value="departement1" ><?= $departements->nom ?> </option>
                                        <?php
                                        }
                                        ?>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                            <form method="get" action="/utilisateur.php">
                                <button type="submit" name="update">UPDATE</button>
                            </form>
                        </form>


                    </fieldset>



                </form>
            </div>
        </main>


    </div>
    <?php
}
?>
</body>
</html>