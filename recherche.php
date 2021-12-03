<!DOCTYPE html>
<html>
<body>
<?php
require('configBDD.php');
session_start();
$recherche = htmlspecialchars($_POST["recherche"]);
$requeteP = "SELECT nom, prenom, lien_personne FROM Personnes 
    WHERE prenom=$recherche OR nom=$recherche";
$requeteB = "SELECT nom_bateau, lien_bateau FROM Bateaux 
    WHERE nom_bateau=$recherche";
$requeteM = "SELECT lien_mission, date_mission, lieu, nom, prenom, nom_bateau
    FROM Missions INNER JOIN Infos_missions INNER JOIN Bateaux INNER JOIN Personnes
    ON Missions.id_mission = Infos_missions.id_mission 
        AND Missions.id_bateau = Bateaux.id_bateau
        AND Missions.id_personne = Personnes.id_personne
    WHERE lieu=$recherche";

$resultatP = mysqli_query($bdd, $requeteP) or die(mysqli_error($bdd));
$resultatB = mysqli_query($bdd, $requeteB) or die(mysqli_error($bdd));
$resultatM = mysqli_query($bdd, $requeteM) or die(mysqli_error($bdd));

$occurrencesP = mysqli_num_rows($resultatP);
$occurrencesB = mysqli_num_rows($resultatB);
$occurrencesM = mysqli_num_rows($resultatM);

if($occurrencesP == 0 && $occurrencesM == 0 && $occurrencesB == 0){
    $erreur = "Aucun résultat trouvé";
}else if($occurrencesP != 0){
    foreach ($occurrencesP as $occurenceP) {
        foreach ($occurenceP as $info) {
        ?>
            <p><?php echo $info; ?></p>
        <?php
        }
    }
}else if($occurrencesB != 0){
    foreach ($occurrencesB as $occurenceB) {
        foreach ($occurenceB as $info) {
        ?>
            <p><?php echo $info; ?></p>
        <?php
        }
    }
}else if($occurrencesM != 0){
    foreach ($occurrencesM as $occurenceM) {
        foreach ($occurenceM as $info) {
        ?>
            <p><?php echo $info; ?></p>
        <?php
        }
    }
}
?>
</body>
</html>