<?php
function supprimer($f){
	echo 'SUPPRIMER' . $f;
}

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
<form action="" method="post" name="suppression">
<table>
    <?php foreach($fichiers as $f): ?>
    <tr>
				<? $contenu = file_get_contents($dossier .'/' . $f); ?>
				<td><?= $key; ?></td>
		    <input type="submit" name="supprimer" value="insert"/>
        <?if($_POST['supprimer'] and $_SERVER['REQUEST_METHOD'] == "POST"){supprimer($f);}?>
    </tr>
    <?php endforeach; ?>
</table>
</form>
	<a href="deconnexion.php">Déconnexion</a>
	</body>
</html>

