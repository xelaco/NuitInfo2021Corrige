<!DOCTYPE html>
<html>
<body>
<?php
require('configBDDRecherche.php');
session_start();
$recherche = htmlspecialchars($_POST["recherche"]);
$requeteP = "SELECT nom, prenom, lien_personne FROM Personnes WHERE prenom='" . $recherche . "' OR nom='" . $recherche . "'";
$requeteB = "SELECT nom_bateau, lien_bateau FROM Bateaux WHERE nom_bateau='" . $recherche . "'";
$requeteM = "SELECT lien_mission, date_mission, lieu, nom, prenom, nom_bateau FROM Missions INNER JOIN Infos_missions INNER JOIN Bateaux INNER JOIN Personnes ON Missions.id_mission = Infos_missions.id_mission AND Missions.id_bateau = Bateaux.id_bateau AND Missions.id_personne = Personnes.id_personne WHERE lieu='" . $recherche . "'";

$resultatP = mysqli_query($bdd, $requeteP) or die(mysqli_error($bdd));
$resultatB = mysqli_query($bdd, $requeteB) or die(mysqli_error($bdd));
$resultatM = mysqli_query($bdd, $requeteM) or die(mysqli_error($bdd));

$occurrencesP = mysqli_num_rows($resultatP);
$occurrencesB = mysqli_num_rows($resultatB);
$occurrencesM = mysqli_num_rows($resultatM);

if($occurrencesP == 0 && $occurrencesM == 0 && $occurrencesB == 0){
    ?>
    <p><?php echo "Aucun résultat trouvé"; ?></p>
    <?php
}else if($occurrencesP != 0){
    ?>
    <p><?php echo "Coucou 1"; ?></p>
    <?php
    while ($row = mysqli_fetch_assoc($resultatP)){
       echo 'Nom : ' . $row['nom'] . ', Prénom : ' . $row['prenom'] . ', Lien sur la personne : ' . $row['lien_personne'];
    }
}else if($occurrencesB != 0){
    ?>
    <p><?php echo "Coucou 2"; ?></p>
    <?php
    while ($row = mysqli_fetch_assoc($resultatP)){
       echo 'Nom du bateau : ' . $row['nom_bateau'] . ', Lien : ' . $row['lien_bateau'];
    }
}else if($occurrencesM != 0){
    ?>
    <p><?php echo "Coucou 3"; ?></p>
    <?php
    while ($row = mysqli_fetch_assoc($resultatP)){
        echo 'Date de la mission : ' . $row['date_mission'] . ', Lieu de la mission : ' . $row['lieu'] . 'Nom : ' . $row['nom'] . ', Prénom : ' . $row['prenom'] . ', Nom du bateau : ' . $row['nom_bateau'] . ', Lien : ' . $row['lien_personne'];
     }
}
?>
</body>
</html>