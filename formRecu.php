<html>
<body>

<?php
if (!isset($_POST["estSauveteur"]))
{
	$_POST["estSauveteur"] = "FAUX";
}
?>

Nom : <?php echo htmlspecialchars($_POST["nom"]); ?><br>
Prénom : <?php echo htmlspecialchars($_POST["prenom"]); ?><br>
Est sauveteur : <?php echo htmlspecialchars($_POST["estSauveteur"]); ?><br>
Date : <?php echo htmlspecialchars($_POST["date"]); ?><br>
Bateau : <?php echo htmlspecialchars($_POST["bateau"]); ?><br>
Informations : <?php echo htmlspecialchars($_POST["informations"]); ?><br>

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

