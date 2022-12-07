<?PHP
session_start();

//  Verifier que l'utilisateur est connecter, sinon redirection vers 'home'.
if (!isset($_SESSION['login'])){
    header("location: index.php");
}
$login = $_SESSION['login'];
$id = $_SESSION['id'];

?>