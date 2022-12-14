<?php
session_start();
include 'includes/connect.php';
// requette pour recupérer un tableau joiture id utilisateurs & id_utilisateur commentaire
$requ_comm_all = $connection->query("SELECT login, commentaire, date FROM utilisateurs INNER JOIN commentaires ON utilisateurs.id = commentaires.id_utilisateur  ORDER BY date DESC;");
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="style/livreor.css">
    <title>Le Livre d'Or</title>
</head>
<body>
    <?php require 'includes/header.php'; ?>
<main>
    <div class="livre_or">
         <h1>Le livre d'Or</h1>
          <table>    <!--  L'affichage du tableau  -->
            <thead>
                <th>Posté le</th>
                <th>Par l'Utilisateur</th>
                <th id="com">Commentaire</th>
            </thead>
            <tbody>
            <?php
            while ($comm_fetch = $requ_comm_all->fetch_assoc()){
                $date = date_create($comm_fetch['date']);
                $date = date_format($date,'d/m/Y');
                $utilisateur = $comm_fetch['login'];
                $comment = $comm_fetch['commentaire'];
            
            echo '<tr>';
            echo "<td>$date</td>";
            echo "<td>$utilisateur</td>";
            echo "<td>$comment</td>";
        }?>
            </tbody>
         </table>
    </div>


    <?php   // Si utilisateur connecté, possibilité de posté un commentaire.
    if (isset($_SESSION['login'])) { 
        $login = $_SESSION['login'];
        $id = $_SESSION['id'];

        if (isset($_GET['submit'])){

            //  connexion BD.
            require 'includes/connect.php';
        
            // le commentaire.
            $commentaire = addslashes(htmlspecialchars($_GET['commentaire']));
        
            $compt_len = strlen($commentaire);
            if ($compt_len > 6){
            
            //  recupirer la date du poste
            $requ_inser = $connection->query("INSERT INTO `commentaires`(`commentaire`, `id_utilisateur`, `date`) VALUES ('$commentaire','$id',NOW());");
            $mess_inser = 'Votre message est bien enregistré !';
        } else {
                $err_comm = 'Votre commentaire est trop court -Minimum 6 caractère!';
        }
        }
        ?>
         <div class=commen_or>

         <p><?php echo 'Bonjour ' . $login; ?></p>

            <form action="#" type="get" class="form_comme">
            <p class="mess_inser"><?php

            if (isset($mess_inser)) {
                echo $mess_inser;
            }
            if (isset($err_comm)) {
                echo $err_comm;
            } ?>

            
            <label for="commentaire">Votre Commentaire</label>
            <input type="textarea" name="commentaire" placeholder="Poster Votre Commentaire Ici">
            <input type="submit" name="submit" value="Envoyer" id="btn_com">
        </div>
    <?php }?>
</main>
<?php include 'includes/footer.php' ?>
</body>
</html>