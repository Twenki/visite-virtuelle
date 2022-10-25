<?php
session_start();
$bdd = new PDO('mysql:host=localhost;dbname=visitevirtuelle;', 'root', '');
if (!$_SESSION['password']) {
    header('Location: connexion.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Afficher les texte</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="style.css">
</head>

<body style="background-color: #c5d5cb;">
    <h1 style="text-align: center;">Batiment CEBD</h1>
    <?php
    $recupImg = $bdd->query('SELECT * FROM images INNER JOIN texten ON images.id = texten.id WHERE texten.id BETWEEN "1" AND "3"');

    while ($img = $recupImg->fetch()) {
    ?>
        <div style="border: solid 1px;background-color: white; ">
            <p style="text-align: center;">
                <?= $img['nom']; ?>
                <?= $img['contenu']; ?>
                <?= ('<img style="width:10%;" src ="../demonstrateur/' . $img['nom'] . '"/>'); ?>
                <a href="modifierImg.php?id=<?= $img['id']; ?>">Entrer le nom de la nouvelle image</a>
                <a href="modifierTextEn.php?id=<?= $img['id']; ?>">Modifier le texte</a></p>
                
            </p>
        </div>
    <?php
    }
    ?>

    <h1 style="text-align: center;">Batiment Abel de Pujol 1</h1>
    <?php
    $recupImg = $bdd->query('SELECT * FROM images INNER JOIN texten ON images.id = texten.id WHERE texten.id BETWEEN "4" AND "6"');
    while ($img = $recupImg->fetch()) {
    ?>
        <div style="border: solid 1px;background-color: white; ">
            <p style="text-align: center;">
                <?= $img['nom']; ?>
                <?= $img['contenu']; ?>
                <?= ('<img style="width:10%;" src ="../ap1/' . $img['nom'] . '"/>'); ?>
                <a href="modifierImg.php?id=<?= $img['id']; ?>">Entrer le nom de la nouvelle image</a>
                <a href="modifierTextEn.php?id=<?= $img['id']; ?>">Modifier le texte</a></p>
            </p>
        </div>
    <?php
    }
    ?>
</body>

</html>