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
    <title>Formulaire envoyé</title>
</head>
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
}else if($occurrencesP != 0){
    while ($row = mysqli_fetch_assoc($resultatP)){
       echo 'Nom : ' . $row['nom'] . ', Prénom : ' . $row['prenom'] . ', Lien sur la personne : ' . $row['lien_personne'];
    }
}else if($occurrencesB != 0){
    while ($row = mysqli_fetch_assoc($resultatB)){
       echo 'Nom du bateau : ' . $row['nom_bateau'] . ', Lien : ' . $row['lien_bateau'];
    }
}else if($occurrencesM != 0){
    while ($row = mysqli_fetch_assoc($resultatM)){
        echo 'Date de la mission : ' . $row['date_mission'] . ', Lieu de la mission : ' . $row['lieu'] . 'Nom : ' . $row['nom'] . ', Prénom : ' . $row['prenom'] . ', Nom du bateau : ' . $row['nom_bateau'] . ', Lien : ' . $row['lien_personne'];
    }
}
?>
<main>
    <div class="resultats-recherche">
        <h2 class="font-default">Résultats de recherche</h2>
        <?php
        while ($row = mysqli_fetch_assoc($resultatP)){
        ?>
        <ul class="resume-form-list">
            <li>Nom : <?php echo htmlspecialchars($_POST[$row['nom']]); ?></li>
            <li>Prénom : <?php echo htmlspecialchars($_POST[$row['prenom']]); ?></li>
            <li>Lien sur la personne : <?php echo htmlspecialchars($_POST[$row['lien_personne']]); ?></li>
        </ul>
        <?php
        }
        ?>
    </div>
    <a href="index.php" class="btn-back font-default">Retour</a>
</main>

</body>
</html>