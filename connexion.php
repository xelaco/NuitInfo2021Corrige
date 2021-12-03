<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="css/global_style.css">
    <link rel="stylesheet" type="text/css" href="css/form_style.css">
	<link rel="icon" type="image/png" href="img/thomaspesquet.png">
	<script src="https://kit.fontawesome.com/798abe29a3.js" crossorigin="anonymous"></script>
	<title>Formulaire d'ajout</title>
</head>
<body>
	<?php
	require('configBDDAdmin.php');
	session_start();
	if (isset($_POST['pseudo'])){
		$pseudo = $_POST['pseudo'];
		$mdp = $_POST['mdp'];
		$requete = "SELECT * FROM `Users` WHERE username='$pseudo' and password='".hash('sha256', $mdp)."'";
		$resultat = mysqli_query($bdd, $requete) or die(mysqli_error($bdd));
		$occurrences = mysqli_num_rows($resultat);
		if($occurrences == 1){
			$_SESSION['pseudo'] = $pseudo;
			header("Location: admin.php");
		}else{
			$erreur = 'Le nom d\'utilisateur ou le mot de passe est incorrect.';
		}
	}
	?>

	<?php include('include/header.php')?>

	<main>
		<form action="" method="post" name="connexion" class="form-connexion">
			<h1 class="font-default">Connexion</h1>
			<div class="form-line">
				<label for="pseudo" class="label-form">Pseudo</label>
				<input type="text" name="pseudo" id="pseudo" class="input-form" placeholder="Nom d'utilisateur" autofocus>
			</div>
			<div class="form-line">
				<label for="mdp" class="label-form">Mot de passe</label>
				<input type="password" name="mdp" id="mdp" placeholder="Mot de passe" class="input-form">
			</div>
			<?php if (! empty($erreur)) { ?>
					<p class="errorMessage font-default"><?php echo $erreur; ?></p>
			<?php } ?>
			<div class="btn-div-connect">
				<a href="index.php" class="btn-annulate font-default"><i class="fas fa-times"></i></a>
				<div class="submit-div">
					<label for="submit-co" class="submit-btn btn-connect clickable font-default"><i class="fas fa-check"></i></label>
					<input type="submit" name="submit" id="submit-co" class="display-none">
				</div>
			</div>
		</form>
	</main>

	<?php include('include/footer.php')?>
</body>
</html>

