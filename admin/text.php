<?php
session_start();
$bdd = new PDO('mysql:host=visitexcominsa.mysql.db;dbname=visitexcominsa; charset=utf8', 'visitexcominsa', 'Ophelie59leo');
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
    <h1 style="text-align: center;">Panneau AB1</h1>
    <?php
    $recupText = $bdd->query('SELECT * FROM text WHERE id = "7"');

    while ($text = $recupText->fetch()) {
    ?>
        <div style="border: solid 1px;background-color: white; display: flex; ">
            <p style="text-align: center; display: flex;">
                <?= $text['contenu']; ?>
                <a href="modifierText.php?id=<?= $text['id']; ?>">Modifier le texte</a>
            </p>

            </p>
        </div>
    <?php
    }
    ?>
    <h1 style="text-align: center;">Panneau AB3</h1>
    <?php
    $recupText = $bdd->query('SELECT * FROM text WHERE id = "11"');

    while ($text = $recupText->fetch()) {
    ?>
        <div style="border: solid 1px;background-color: white; display: flex; ">
            <p style="text-align: center; display: flex;">
                <?= $text['contenu']; ?>
                <a href="modifierText.php?id=<?= $text['id']; ?>">Modifier le texte</a>
            </p>

            </p>
        </div>
    <?php
    }
    ?>
    <h1 style="text-align: center;">Panneau Claudin LeJeune 1</h1>
    <?php
    $recupText = $bdd->query('SELECT * FROM text WHERE id = "8"');

    while ($text = $recupText->fetch()) {
    ?>
        <div style="border: solid 1px;background-color: white; display: flex; ">
            <p style="text-align: center; display: flex;">
                <?= $text['contenu']; ?>
                <a href="modifierText.php?id=<?= $text['id']; ?>">Modifier le texte</a>
            </p>

            </p>
        </div>
    <?php
    }
    ?>
    <h1 style="text-align: center;">Panneau Claudin LeJeune 3</h1>
    <?php
    $recupText = $bdd->query('SELECT * FROM text WHERE id = "9"');

    while ($text = $recupText->fetch()) {
    ?>
        <div style="border: solid 1px;background-color: white; display: flex; ">
            <p style="text-align: center; display: flex;">
                <?= $text['contenu']; ?>
                <a href="modifierText.php?id=<?= $text['id']; ?>">Modifier le texte</a>
            </p>

            </p>
        </div>
    <?php
    }
    ?>
    <h1 style="text-align: center;">Panneau Carpeaux</h1>
    <?php
    $recupText = $bdd->query('SELECT * FROM text WHERE id = "10"');

    while ($text = $recupText->fetch()) {
    ?>
        <div style="border: solid 1px;background-color: white; display: flex; ">
            <p style="text-align: center; display: flex;">
                <?= $text['contenu']; ?>
                <a href="modifierText.php?id=<?= $text['id']; ?>">Modifier le texte</a>
            </p>

            </p>
        </div>
    <?php
    }
    ?>
    <h1 style="text-align: center;">Batiment CEBD</h1>
    <?php
    $recupImg = $bdd->query('SELECT * FROM images INNER JOIN text ON images.id = text.id WHERE text.id BETWEEN "1" AND "3"');

    while ($img = $recupImg->fetch()) {
    ?>
        <div style="border: solid 1px;background-color: white; display: flex; ">
            <p style="text-align: center; display: flex;">
                <?= $img['nom']; ?>
                <?= $img['contenu']; ?>
                <?= ('<img style="width:10%;" src ="../demonstrateur/' . $img['nom'] . '"/>'); ?>
                <a href="modifierImg.php?id=<?= $img['id']; ?>">Entrer le nom de la nouvelle image</a>
                <a href="modifierText.php?id=<?= $img['id']; ?>">Modifier le texte</a>
            </p>

            </p>
        </div>
    <?php
    }
    ?>

    <h1 style="text-align: center;">Batiment Abel de Pujol 1</h1>
    <?php
    $recupImg = $bdd->query('SELECT * FROM images INNER JOIN text ON images.id = text.id WHERE text.id BETWEEN "4" AND "6"');
    while ($img = $recupImg->fetch()) {
    ?>
        <div style="border: solid 1px;background-color: white; display: flex; ">
            <p style="text-align: center; display: flex;">
                <?= $img['nom']; ?>
                <?= $img['contenu']; ?>
                <?= ('<img style="width:10%;" src ="../ap1/' . $img['nom'] . '"/>'); ?>
                <a href="modifierImg.php?id=<?= $img['id']; ?>">Entrer le nom de la nouvelle image</a>
                <a href="modifierText.php?id=<?= $img['id']; ?>">Modifier le texte</a>
            </p>

            </p>
        </div>
    <?php
    }
    ?>

    <h1 style="text-align: center;">Carpeaux (dream)</h1>
    <?php
    $recupTxt = $bdd->query('SELECT * FROM text WHERE id BETWEEN "12" AND "15"');
    while ($txt = $recupTxt->fetch()) {
    ?>
        <div style="border: solid 1px;background-color: white; display: flex; ">
            <p style="text-align: center; display: flex;">
                <?= $txt['contenu']; ?>
                <a href="modifierText.php?id=<?= $txt['id']; ?>">Modifier le texte</a>
            </p>

            </p>
        </div>
    <?php
    }
    ?>
</body>

</html>