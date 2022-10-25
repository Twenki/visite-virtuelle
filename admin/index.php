<?php
session_start();
?>
<html>

<head>
    <meta charset="utf-8">
    <!-- importer le fichier de style -->
    <link rel="stylesheet" href="style.css" media="screen" type="text/css" />
</head>

<body>
    <div id="container">

        <form>
            <h1>Connexion</h1>

            <a href="text.php"><label><b>Afficher les textes et images des points d'infos en français</b></label></a>
            <br>
            <a href="textEN.php"><label><b>Afficher les textes et images des points d'infos en Anglais</b></label></a>
            <br>
            <a href="logout.php">Se déconnecter</a>

        </form>
    </div>
</body>

</html>