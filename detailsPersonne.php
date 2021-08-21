<?php
include_once 'autoload.php';
$id = $_GET['id'];
if (!isset($id)) {
    header('location:incident.php');
}
$personneRepository = new PersonneRepository();
$personne = $personneRepository->findById($id);
if (!$personne) {
    header('location:incident.php');
}
include_once 'fragments/header.php';
?>

<table class="table">
    <tr>
        <th>Firstname</th>
        <th>Name</th>
        <th>Age</th>
        <th>Job</th>
    </tr>
    <tr>
        <td><?= $personne->firstname ?></td>
        <td><?= $personne->name ?></td>
        <td><?= $personne->age ?></td>
        <td><?= $personne->job ?></td>
    </tr>
</table>

</body>
</html>