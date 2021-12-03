<html>
<body>

<?php
$nomFichier = "demandes/" . date("Y_m_d_H_i_s") . ".txt";
$fichier = fopen($nomFichier, "w") or die("Erreur, veuillez recommencer s'il vous plait.");
$texte = 'Nom :' . $_POST["nom"] . PHP_EOL
	. 'Prénom :' . htmlspecialchars($_POST["prenom"]) . PHP_EOL
	. 'Est sauveteur :' . htmlspecialchars($_POST["estSauveteur"]) . PHP_EOL
	. 'Date :' . htmlspecialchars($_POST["date"]) . PHP_EOL
	. 'Bateau :' . htmlspecialchars($_POST["bateau"]) . PHP_EOL
	. 'Informations complémentaires :' . htmlspecialchars($_POST["informations"]) . PHP_EOL;
fwrite($fichier, $texte);
fclose($fichier);
?>

Nom : <?php echo htmlspecialchars($_POST["nom"]); ?><br>
Prénom : <?php echo htmlspecialchars($_POST["prenom"]); ?><br>
Est sauveteur : <?php echo htmlspecialchars($_POST["estSauveteur"]); ?><br>
Date : <?php echo htmlspecialchars($_POST["date"]); ?><br>
Bateau : <?php echo htmlspecialchars($_POST["bateau"]); ?><br>
Informations : <?php echo htmlspecialchars($_POST["informations"]); ?><br>

</body>
</html>

