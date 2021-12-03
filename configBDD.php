<?php
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'crtv');
define('DB_PASSWORD', 'IstyN2I');
define('DB_NAME', 'crtv_registration');
 
$bdd = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
 
if($bdd === false){
    die("ERREUR : Impossible de se connecter. " . mysqli_connect_error());
}
?>

