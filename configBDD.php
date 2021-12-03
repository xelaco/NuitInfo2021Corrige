// Taken from the site : https://waytolearnx.com/2020/01/formulaire-dauthentification-login-mot-de-passe-avec-php-et-mysql.html

<?php
// Informations d'identification
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'crtv');
define('DB_PASSWORD', 'IstyN2I');
define('DB_NAME', 'crtv_registration');
 
// Connexion à la base de données MySQL 
$conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
 
// Vérifier la connexion
if($conn === false){
    die("ERREUR : Impossible de se connecter. " . mysqli_connect_error());
}
?>
