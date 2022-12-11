<!-- MOHAMED HABBAAINA Le 05/12/2022

-->
<?php
session_start();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <title>Home</title>
</head>
<body>
<?php include 'includes/header.php' ?>
<main>
    <div class="hom">
        <div class="hom_bnv">
            <h1>L'anniversaire De Raihana</h1>
            <p >Bienvenue <?php if (isset($_SESSION['login'])) {
                echo $_SESSION['login'];
            } else {
                echo 'Cher Invité, vous pouvez vous inscrire et laissé un commentaire dans le livre d\'or de l\'anniversaire <a href="inscription.php">ICI</a>';
            }?>
                .<br>Heureux de vous accueillir.<br>
                Je suis vraiment aux anges de tous vous avoir avec moi aujourd’hui pour souffler mes bougies. Et fêter cette année de plus que je prends ! Une année supplémentaire vers la maturité et la sagesse parait-il!!<br>
                Cela me tenait à cœur de pouvoir tous nous rassembler. Pour moi il n’y a pas de plus beau cadeau que de vous avoir tous ici réunis.</p>
        </div>
    </div>

</main>

<?php include 'includes/footer.php' ?>
</body>
</html>