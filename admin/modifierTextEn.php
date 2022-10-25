<?php
session_start();
if (!$_SESSION['password']) {
    header('Location: connexion.php');
}
include 'database.php';
if (isset($_GET['id']) and !empty($_GET['id'])) {
    $getid = $_GET['id'];
    $recupText = $bdd->prepare('SELECT * FROM texten WHERE id = ? ');
    $recupText->execute(array($getid));
    if ($recupText->rowCount() > 0) {
        $contenuInfo = $recupText->fetch();
        $contenu = str_replace('<br />', '', $contenuInfo['contenu']);
        

        if (isset($_POST['valider'])) {
            $contenuSaisi = nl2br(htmlspecialchars($_POST['contenu']));
            $updateContenu = $bdd->prepare('UPDATE texten SET contenu = ? WHERE id = ?');
            $updateContenu->execute(array($contenuSaisi, $getid));

            header('Location: texten.php');
        }
    } else {
        echo "Aucun article trouvé";
    }
} else {
    echo "aucun id trouvé";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier le texte</title>
</head>

<body>
    <form method="POST" action="">
        <textarea name="contenu" rows="10" cols="200">
            <?= $contenu; ?>
        </textarea>
        <br><br>
        <input type="submit" name="valider">
    </form>
</body>

</html>