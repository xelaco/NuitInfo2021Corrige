<html>
<body>

<?php
$nomFichier = "demandes/" . date("Y_m_d_H_i_s") . ".txt";
$fichier = fopen($nomFichier, "w") or die("Erreur, veuillez recommencer s'il vous plait.");
$texte = "Nom :" . htmlspecialchars($_POST["nom"]) . "\n"
	. "Prénom :" . htmlspecialchars($_POST["prenom"]) . "\n"
	. "Est sauveteur :" . htmlspecialchars($_POST["estSauveteur"]) . "\n"
	. "Date :" . htmlspecialchars($_POST["date"]) . "\n"
	. "Bateau :" . htmlspecialchars($_POST["bateau"]) . "\n"
	. "Informations complémentaires :" . htmlspecialchars($_POST["informations"]) . "\n";
fwrite($fichier, $txt);
fclose($fichier);
?>

<?php echo $texte; ?><br>

</body>
</html>

