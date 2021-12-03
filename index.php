<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/global_style.css">
    <link rel="stylesheet" type="text/css" href="css/form_style.css">
    <link rel="stylesheet" type="text/css" href="css/index_style.css">
    <link rel="icon" type="image/png" href="img/thomaspesquet.png">
    <script src="https://kit.fontawesome.com/798abe29a3.js" crossorigin="anonymous"></script>
    <title>Accueil - Sauveteurs du dunkerquois</title>
</head>
<body>
    <?php include('include/header_index.php');?>
    <main>

        <input type="checkbox" id="boat" class="input-boat display-none">
        <div class="boat-div">
            <img src="img/pesquet2.png" alt="Thomas Pesquet" class="pesquet-boat">
            <label for="boat" class="label-boat"><img src="img/boat.svg" alt="Bateau" class="boat-icon"></label>
        </div>
        <section id="contribute" class="bg-dark">
            <h2 class="font-title">Des infos qui manquent ?</h2>
            <p class="font-default">Contribuez à la base et aidez-nous à enrichir le site !</p>
            <a href="form.php" class="btn-link font-default">Formulaire d'ajout</a>
        </section>
    </main>
    <?php include('include/footer.php');?>
</body>
</html>

