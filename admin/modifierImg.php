<?php
session_start();
if (!$_SESSION['password']) {
    header('Location: connexion.php');
}
include 'database.php';
if (isset($_GET['id']) and !empty($_GET['id'])) {
    $getid = $_GET['id'];
    $recupText = $bdd->prepare('SELECT * FROM images WHERE id = ? ');
    $recupText->execute(array($getid));
    if ($recupText->rowCount() > 0) {
        $contenuInfo = $recupText->fetch();
        $contenu = str_replace('<br />', '', $contenuInfo['nom']);


        if (isset($_POST['valider'])) {
            $contenuSaisi = nl2br(htmlspecialchars($_POST['nom']));
            $updateContenu = $bdd->prepare('UPDATE images SET nom = ? WHERE id = ?');
            $updateContenu->execute(array($contenuSaisi, $getid));

            header('Location: textEN.php');
        }
    } else {
        echo "Aucun article trouvé";
    }
} else {
    echo "aucun id trouvé";
}
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier le texte</title>
</head>

<body>
    <form method="POST" action="">
        <input type="text" name="nom" rows="10" cols="200" value="<?= $contenu; ?>">
        <?= $contenu; ?>
        </textarea>
        <br><br>
        <input type="submit" name="valider">
    </form>
</body>

</html>