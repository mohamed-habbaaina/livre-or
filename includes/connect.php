<!-- La connexion a la base de données -->
<?php
        $servername = 'localhost';
        $user_name = 'root';
        $password_b = '';
        $database = 'livreor';

        // Connexion plesk
        // $servername = 'localhost:3306';
        // $username = 'modul_connexion';
        // $password_b = 'Mmodul1234';
        // $database = 'mohamed-habbaaina_moduleconnexion';
        
        // Ce connecter a la base de données "utilisateurs"
        $connection = new mysqli($servername, $user_name, $password_b, $database) or die('Erreur');