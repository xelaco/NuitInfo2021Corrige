<html>
<body>

<?php
$nomFichier = "demandes/" . date("Y_m_d_H_i_s") . ".txt";
$fichier = fopen($nomFichier, "w") or die("Erreur, veuillez recommencer s'il vous plait.");
$texte = 'Nom :' . htmlspecialchars($_POST["nom"]) . PHP_EOL
	. 'Prénom :' . htmlspecialchars($_POST["prenom"]) . PHP_EOL
	. 'Est sauveteur :' . htmlspecialchars($_POST["estSauveteur"]) . PHP_EOL
	. 'Date :' . htmlspecialchars($_POST["date"]) . PHP_EOL
	. 'Bateau :' . htmlspecialchars($_POST["bateau"]) . PHP_EOL
	. 'Informations complémentaires :' . htmlspecialchars($_POST["informations"]) . PHP_EOL;
fwrite($fichier, $txt);
fclose($fichier);
?>

<?php echo $texte; ?><br>

</body>
</html>

