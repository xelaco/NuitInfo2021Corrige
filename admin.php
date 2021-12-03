<?php
session_start();
if(!isset($_SESSION["pseudo"])){
	header("Location: connexion.php");
	exit(); 
}
$fichiers = array_diff(scandir('demandes'), array('.', '..', '.gitignore'));
?>
<!DOCTYPE html>
<html>
	<body>
		<p>Affichage des demandes d'ajout non traitées</p>
<?php
  foreach($fichiers as $f)
	{
		echo f;
	}
?>
	<a href="deconnexion.php">Déconnexion</a>
	</body>
</html>

