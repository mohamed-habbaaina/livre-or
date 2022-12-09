<?php
session_start();
//  redirection page HOME si pas connecter.
if (!isset($_SESSION['login'])) {
    echo 'Connexion Pas Autorisé !';
    header("location: ../index.php");
}
$login = $_SESSION['login'];

if (isset($_POST['submit'])){
    if (isset($_POST['nw_login']) && $_POST['password'] && $_POST['con_password']){
        if ($_POST['password'] === $_POST['con_password']){

            $nw_login = htmlspecialchars(strip_tags(trim($_POST['nw_login'])));
            $pasword = htmlspecialchars(strip_tags(trim($_POST['password'])));
            //hash password
            $password = password_hash($password, PASSWORD_DEFAULT, ['cost' => 12]);

            require 'connect.php';  // connexion BD.

            $requ_verif = $connection->query("SELECT * FROM `utilisateurs` WHERE (login='$nw_login') OR (login='$login');");

           $rows =mysqli_num_rows($requ_verif); //  check BD pour l'empêché de prendre un login existant 

           if ($rows === 1){

            // Requette update
            $requ_update = $connection->query("UPDATE `utilisateurs` SET `login`='$nw_login', `password`='$password' WHERE login='$login';");
            echo 'Vos Modifications Ont Bien été Enregistrées !';

                header("refresh:3; url='../commentaires.php'"); // redirection vers la page commentaires. 
            } else {
                $err_logi = 'Le login n\'est pas disponible, Veuillez le changer !';
            }



        } else {
            $err_pass = 'Veiller rentrer le meme password';
        }



    } else{
        $err_don = 'Veiller remplir tous les champs !';
    }
    
    
    
}


?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="style/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil</title>
</head>
<body>

<main>
    <p><?php if (isset($err_don)){
        echo $err_don;
    }
    if (isset($err_pass)){
        echo $err_pass;
    }
    if (isset($err_logi)){
        echo $err_logi;
    }
    ?></p>
    <h3>Modifier Vos Informations</h3>
    <form action="#" method="post">
    <label for="login">Login</label>
    <input type="text" name="nw_login" value="<?php echo $login ?>">

    <label for="password">Password</label>
    <input type="password" name="password" placeholder="Rentre Votre Password">

    <label for="con_password">Confermer Votre Password</label>
    <input type="password" name="con_password" placeholder="Cnfermer Votre Password">

    <input type="submit" name="submit" value="Valider">

    </form>
</main>
</body>
</html>