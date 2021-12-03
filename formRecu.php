<html>
<body>

Nom : <?php echo htmlspecialchars($_POST["nom"]); ?><br>
Prénom : <?php echo htmlspecialchars($_POST["prenom"]); ?><br>
Est sauveteur : <?php echo htmlspecialchars($_POST["estSauveteur"]); ?><br>
Date : <?php echo htmlspecialchars($_POST["date"]); ?><br>
Bateau : <?php echo htmlspecialchars($_POST["bateau"]); ?><br>
Informations : <?php echo htmlspecialchars($_POST["informations"]); ?><br>

<?php
$nomFichier = date("Y_m_d_H_i_s") . "txt";
$fichier = fopen($nomFichier, "w") or die("Erreur, veuillez recommencer s'il vous plait.");
$txt = "Minnie Mouse\n";
fwrite($fichier, $txt);
fclose($fichier);
?>

</body>
</html>

