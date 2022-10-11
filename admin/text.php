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
    $recupText = $bdd->query('SELECT * FROM text WHERE id BETWEEN "1" AND "6"');
    while ($text = $recupText->fetch()) {
    ?>
        <div style="border: solid 1px;background-color: white; ">
            <p style="text-align: center;">
                <?= $text['contenu']; ?><a href="modifier.php?id=<?= $text['id']; ?>">Modifier le texte</a>
            </p>
        </div>
    <?php
    }
    ?>
    <h1 style="text-align: center;">Batiment Abel de Pujol 1</h1>
    <?php
    $recupText = $bdd->query('SELECT * FROM text WHERE id BETWEEN "7" AND "12"');
    while ($text = $recupText->fetch()) {
    ?>
        <div style="border: solid 1px;background-color: white; ">
            <p style="text-align: center;"><?= $text['contenu']; ?><a href="modifier.php?id=<?= $text['id']; ?>">Modifier le texte</a></p>
        </div>
    <?php
    }
    ?>
</body>

</html>