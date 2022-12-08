<?php
include 'includes/connect.php';
// requette pour recupérer un tableau joiture id utilisateurs & id_utilisateur commentaire
$requ_comm_all = $connection->query("SELECT login, commentaire, date FROM utilisateurs INNER JOIN commentaires ON utilisateurs.id = commentaires.id_utilisateur  ORDER BY date DESC;");
while ($comm_fetch = $requ_comm_all->fetch_assoc()){
    $date = date_create($comm_fetch['date']);
    $date = date_format($date,'d/m/Y');
    $utilisateur = $comm_fetch['login'];
    $comment = $comm_fetch['commentaire'];
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
      <table>    <!--  L'affichage du tableau  -->
        <thead>
            <th>Posté le</th>
            <th>Par l'Utilisateur</th>
            <th>Commentaire</th>
        </thead>
        <tbody>
        <?php
        echo '<tr>';
        echo "<td>$date</td>";
        echo "<td>$utilisateur</td>";
        echo "<td>$comment</td>";
    }?>
        </tbody>
     </table>
</body>
</html>