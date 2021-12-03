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
<?php if(isset($_POST['remove'])) $animals=unlink('demandes' . '/' .$f);
	foreach($fichiers as $f)
	{
			echo'<form method="post" action="">';
			echo'<? $contenu = file_get_contents($dossier .'/' . $f); ?>';
			echo'<pre><?= $contenu; ?></pre>';
			echo $f.'<input type="submit" name="supprimer" value="supprimer"/><br/>';
			echo '<input type="hidden" name="fichier" value="'.$f.'"/>';
			echo '</form>';
	}?>
	<a href="deconnexion.php">Déconnexion</a>
	</body>
</html>

