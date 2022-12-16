<!-- La connexion a la base de données -->
<?php
        $servername = 'localhost';
        $user_name = 'root';
        $password_b = '';
        $database = 'livreor';

        // Connexion plesk
        // $servername = 'localhost:3306';
        // $username = 'livre_or';
        // $password_b = 'd920?kkG5';
        // $database = 'mohamed-habbaaina_livreor';
        
        // Ce connecter a la base de données "utilisateurs"
        $connection = new mysqli($servername, $user_name, $password_b, $database) ; //or die('Erreur');