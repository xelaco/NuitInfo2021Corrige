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
    <title>Résultats recherche</title>
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


   /* }else if($occurrencesB != 0){
        while ($row = mysqli_fetch_assoc($resultatB)){
        echo 'Nom du bateau : ' . $row['nom_bateau'] . ', Lien : ' . $row['lien_bateau'];
        }
    }else if($occurrencesM != 0){
        while ($row = mysqli_fetch_assoc($resultatM)){
            echo 'Date de la mission : ' . $row['date_mission'] . ', Lieu de la mission : ' . $row['lieu'] . 'Nom : ' . $row['nom'] . ', Prénom : ' . $row['prenom'] . ', Nom du bateau : ' . $row['nom_bateau'] . ', Lien : ' . $row['lien_personne'];
        }
    } */
    ?>

    <?php include('include/header.php')?>
    <main>
        <div class="resume-form">
            <h2 class="font-default">Résultats de recherche</h2>
            <?php if($occurrencesP == 0 && $occurrencesM == 0 && $occurrencesB == 0){ ?>
                <h3 class="font-default2">Aucun résultat trouvé :(</h3>
            <?php
            }else if($occurrencesP != 0){
                while ($row = mysqli_fetch_assoc($resultatP)){ ?>
                    <h3 class="font-default">Personnes</h3>
                    <ul class="resume-form-list">
                        <li>Nom : <?php echo $row['nom']; ?></li>
                        <li>Prénom : <?php echo $row['prenom']; ?></li>
                        <li>Lien de la personne : <a href=<?php echo $row['lien_personne']; ?>> <?php echo $row['lien_personne']; ?> </a> </li>
                    </ul>
                <?php }
            }else if($occurrencesB != 0){
                while ($row = mysqli_fetch_assoc($resultatB)){ ?>
                    <h3 class="font-default">Bateaux</h3>
                    <ul class="resume-form-list">
                        <li>Nom du bateau : <?php echo $row['nom_bateau']; ?></li>
                        <li>Lien du bateau : <a href=<?php echo $row['lien_bateau']; ?>> <?php echo $row['lien_bateau']; ?> </a> </li>
                    </ul>
                <?php }
            }else if($occurrencesM != 0){
                while ($row = mysqli_fetch_assoc($resultatM)){ ?>
                <h3 class="font-default">Personnes</h3>
                    <ul class="resume-form-list">
                        <li>Date de la mission : <?php echo $row['date_mission']; ?></li>
                        <li>Lieu de la mission : <?php echo $row['lieu']; ?></li>
                        <li>Nom du bateau : <?php echo $row['nom_bateau']; ?></li>
                        <li>Lien de la mission : <a href=<?php echo $row['lien_mission']; ?>> <?php echo $row['lien_mission']; ?> </a> </li>
                    </ul>
                <?php }
            }
            ?>
        </div>
        <a href="index.php" class="btn-back font-default">Retour</a>
    </main>

</body>
</html>