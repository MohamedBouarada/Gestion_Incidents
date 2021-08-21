<?php
$chaine = "Bonjour GL2 on est entrain de faire du PHP et c'est cool :)";

$stats = count_chars($chaine,1);
include 'testFunctions.php';
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="node_modules/bootswatch/dist/lux/bootstrap.css">
    <title>Document</title>
</head>
<body>
<div class="aler alert-info">
    <?= somme(1,2,3,4,5) ?>
</div>
<table class="table">
    <tr>
        <th>Caractère</th>
        <th>Nombre d'occurrence</th>
    </tr>
    <?php
    foreach($stats as $car => $nbOcc) {?>
        <tr>
            <td><?= chr($car) ?></td>
            <td><?= $nbOcc ?></td>
        </tr>
        <?php
    }
    ?>
</table>
</body>
</html>