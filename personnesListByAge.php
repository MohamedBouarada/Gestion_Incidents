<?php
include_once 'autoload.php';
$type = $_GET['type'];
if (!isset($type)) {
    header('location:incident.php');
}
$bdd = ConnexionBD::getInstance();
$query = "select * from personne where type = ?";

$response = $bdd->prepare($query);
$response->execute([$type]);
$personnes = $response->fetchAll(PDO::FETCH_OBJ);

include_once 'fragments/header.php';
?>

<table class="table">
    <tr>
        <th>Firstname</th>
        <th>Name</th>
        <th>phone</th>
        <th>type</th>
    </tr>
    <?php foreach ($personnes as $personne) {
    ?>
    <tr>
        <td><?= $personne->login ?></td>
        <td><?= $personne->prénom ?></td>
        <td><?= $personne->phone ?></td>
        <td><?= $personne->type ?></td>
    </tr>
    <?php
    }
    ?>
</table>

</body>
</html>