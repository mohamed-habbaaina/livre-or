<?php
session_start();
include 'includes/connect.php';

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <title>Le Livre d'Or</title>
</head>
<body>
     <p>bonjour <?php if (isset($_SESSION['login'])) {
         echo $_SESSION['login'];
     }?></p>
     <h3>Le livre d'Or</h3>
     <table>
        <thead>
            <th>Posté le</th>
            <th>Par l'Utilisateur</th>
            <th>Commentaire</th>
        </thead>
        <tbody>
            <?php  ?>
        </tbody>
     </table>
</body>
</html>