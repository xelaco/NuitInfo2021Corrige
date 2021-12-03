<!DOCTYPE html>
<html>
<body>
<?php
require('configBDD.php');
session_start();
if (isset($_POST['pseudo'])){
	$pseudo = stripslashes($_REQUEST['pseudo']);
	$pseudo = mysqli_real_escape_string($conn, $pseudo);
	$mdp = stripslashes($_REQUEST['mdp']);
	$mpd = mysqli_real_escape_string($conn, $mdp);
	$requete = "SELECT * FROM `admins` WHERE pseudo='$pseudo' and mdp='".hash('sha256', $mdp)."'";
	$resultat = mysqli_query($bdd, $requete) or die(mysql_error());
	$occurrences = mysqli_num_rows($resultat);
	if($occurrences == 1){
		$_SESSION['pseudo'] = $pseudo;
		header("Location: admin.php");
	}else{
		$message = "Le nom d'utilisateur ou le mot de passe est incorrect.";
	}
}
?>
<form action="" method="post" name="login">
<h1>Connexion</h1>
<input type="text" name="username" placeholder="Nom d'utilisateur">
<input type="password" name="mdp" placeholder="Mot de passe">
<input type="submit" value="Connexion " name="submit">
<?php if (! empty($message)) { ?>
		<p class="errorMessage"><?php echo $message; ?></p>
<?php } ?>
</form>
</body>
</html>

