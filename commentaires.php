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
    $commentaire = htmlspecialchars(strip_tags(trim($_GET['commentaire'])));

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
    <link rel="stylesheet" href="commentair.css">
    <title>Commentaires</title>
</head>
<body>
    <header>
    <a href="index.php"><img src="" alt="logo" class="logo">LOGO</a>
    <nav>
        <ul class="nav_bar">
            <li><a href="index.php">Home</a></li>    
            <li><a href="livre-or.php"></a>Le Livre d'Or</li>    
            <li><button class="btn_comm"><a href="includes/decconect.php">Se Déconnecter</a></button></li>    
            <li><button class="btn_comm"><a href="includes/profil.php">Modifier Vous Information</a></button></li>    
        </ul>    
        <div class="burger">
            <div class="line1"></div>
            <div class="line2"></div>
            <div class="line3"></div>
            <div class="line4"></div>
        </div>
    </nav>
    </header>
    <main>
    <div class="bienv"><p><?php echo "Bienvenue $login";?></p></div>
    <form action="#" type="get" class="form_comme">
        <p class="mess_inser"><?php
            if (isset($mess_inser)){
            echo $mess_inser;
            }
            if (isset($err_comm)){
            echo $err_comm;
            }
            ?></p>

        <label for="commentaire">Votre Commentaire</label>
        <input type="textarea" name="commentaire" placeholder="Poster Votre Commentaire Ici">
        <input type="submit" name="submit" value="Envoyer">

    </form>
    </main>
</body>
</html>