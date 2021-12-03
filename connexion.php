<!DOCTYPE html>
<html>
<body>
<?php
require('configBDD.php');
session_start();
if (isset($_POST['pseudo'])){
	$requete = "SELECT * FROM `Users` WHERE username='$pseudo' and password='".hash('sha256', $mdp)."'";
	$resultat = mysqli_query($bdd, $requete) or die(mysqli_error($bdd));
	$occurrences = mysqli_num_rows($resultat);
	echo $_POST['$pseudo'];
	echo $_POST['$mdp'];
	if($occurrences == 1){
		$_SESSION['pseudo'] = $pseudo;
		header("Location: admin.php");
	}else{
		$erreur = 'Le nom d\'utilisateur ou le mot de passe est incorrect.' . '|'. $pseudo . '|' . '|' . $mdp . '|';
	}
}
?>
<form action="" method="post" name="connexion">
<h1>Connexion</h1>
<input type="text" name="pseudo" placeholder="Nom d'utilisateur">
<input type="password" name="mdp" placeholder="Mot de passe">
<input type="submit" value="Connexion " name="submit">
<?php if (! empty($erreur)) { ?>
		<p class="errorMessage"><?php echo $erreur; ?></p>
<?php } ?>
</form>
</body>
</html>

