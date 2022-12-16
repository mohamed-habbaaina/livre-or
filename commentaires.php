<?PHP
session_start();

//  Verifier que l'utilisateur est connecter, sinon redirection vers 'home'.
if (!isset($_SESSION['login'])){
    header("location: index.php");
}
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
    $mess_inser = 'Votre message est bien enregistré <a href="livre-or.php">"Livre d\'Or"</a> !';
} else {
        $err_comm = 'Votre commentaire est trop court -Minimum 6 caractère!';
}
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="style/commentair.css">
    <title>Commentaires</title>
</head>
<body>
<?php require 'includes/header.php'; ?>
    <main>
        <div class="bienv">
            <h3><?php echo "Bienvenue $login";?></h3>
            <form action="#" type="get" class="form_comme">
            <p class="mess_inser"><?php
                if (isset($mess_inser)){
                echo $mess_inser;
                }
                if (isset($err_comm)){
                echo $err_comm;
                }
                if (isset($_SESSION['change'])){
                $mes_ch = $_SESSION['change'];
                echo $mes_ch;
                }
                ?></p>

            <label for="commentaire">Laisser Un Commentaire !</label>
            <input type="textarea" name="commentaire" placeholder="Poster Votre Commentaire Ici">
            <input type="submit" name="submit" id="btn_c_v" value="Envoyer">

            </form>
        </div>
    </main>
    <?php require 'includes/footer.php'; ?>
</body>
</html>
