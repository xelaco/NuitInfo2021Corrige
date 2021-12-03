<?php
session_start();
if(!isset($_SESSION["pseudo"])){
	header("Location: connexion.php");
	exit(); 
}
$dossier = 'demandes';
$fichiers = array_diff(scandir($dossier), array('.', '..', '.gitignore'));
?>
<!DOCTYPE html>
<html>
	<body>
		<p>Affichage des demandes d'ajout non traitées</p>
<?php
  foreach($fichiers as $f)
	{
    $contenu = file_get_contents($dossier .'/' . $f);
		echo $contenu;
	}
?>
	<a href="deconnexion.php">Déconnexion</a>
	</body>
</html>

