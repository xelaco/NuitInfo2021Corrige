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
    <title>Accueil - Sauveteurs du dunkerquois</title>
</head>
<body>

	<?php
	if (!isset($_POST["estSauveteur"]))
	{
		$_POST["estSauveteur"] = "FAUX";
	}
	?>

	<?php include('include/header.php')?>

	<main>
		<h1 class="validate-color font-default">Votre demande a bien été envoyée</h1>
		<div class="resume-form">
			<h2 class="font-default">Résumé de votre demande</h2>
			<ul class="resume-form-list">
				<li>Nom : <?php echo htmlspecialchars($_POST["nom"]); ?></li>
				<li>Prénom : <?php echo htmlspecialchars($_POST["prenom"]); ?></li>
				<li>Est sauveteur : <?php echo htmlspecialchars($_POST["estSauveteur"]); ?></li>
				<li>Date : <?php echo htmlspecialchars($_POST["date"]); ?></li>
				<li>Bateau : <?php echo htmlspecialchars($_POST["bateau"]); ?></li>
				<li>Informations : <?php echo htmlspecialchars($_POST["informations"]); ?></li>
			</ul>
		</div>
		<a href="form.php" class="btn-back font-default">Retour</a>
	</main>

	<?php include('include/footer.php')?>

	<?php
	$nomFichier = "demandes/" . date("Y_m_d_H_i_s") . ".txt";
	$texte = 'Nom : ' . htmlspecialchars($_POST["nom"]) . PHP_EOL
		. 'Prénom : ' . htmlspecialchars($_POST["prenom"]) . PHP_EOL
		. 'Est sauveteur : ' . htmlspecialchars($_POST["estSauveteur"]) . PHP_EOL
		. 'Date : ' . htmlspecialchars($_POST["date"]) . PHP_EOL
		. 'Bateau : ' . htmlspecialchars($_POST["bateau"]) . PHP_EOL
		. 'Informations complémentaires : ' . htmlspecialchars($_POST["informations"]) . PHP_EOL;
	$fichier = fopen($nomFichier, "w") or die("Erreur, veuillez recommencer s'il vous plait.");
	fwrite($fichier, $texte);
	fclose($fichier);
	?>
</body>
</html>

