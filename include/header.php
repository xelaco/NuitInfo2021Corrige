<div class="header-links">
    <a class="link-home font-title" href="index.php" title="Accueil">Sauveteurs du dunkerquois</a>
    <nav class="menu-header">
        <ul class="menu-social">
            <li class="menu-link"><a href="https://www.facebook.com/groups/938396409644949"><i class="fab fa-facebook"></i></a></li>
            <li class="menu-link"><a href="https://twitter.com/@boutelierphili1"><i class="fab fa-twitter"></i></a></li>
            <li class="menu-link"><a href="mailto:sauveteurdudunkerquois@gmail.com"><i class="fas fa-envelope"></i></a></li>
            <li class="menu-link"><a href="form.php"><i class="fas fa-toilet-paper"></i></a></li>
        </ul>
    </nav>
</div>
<div class="banner">
    <label for="search" class="label-search font-default">270 ans d'histoire</label>
</div>
<div class="search-section">
    <div class="search-box">
        <input type="text" id="search" class="search-bar font-default" placeholder="Personne, bateau, mission...">
        <button class="btn-search clickable"><i class="fas fa-search"></i></button>
    </div>
    <input type="checkbox" id="search-advanced" class="search-advanced-box display-none">
    <label for="search-advanced" class="label-advanced font-default clickable">Recherche avancée <i class="fas fa-chevron-down"></i></label>
    <form action="form.php" method="post" class="form-advanced">
        <div class="form-line">
            <label for="nom" class="label-form">Nom</label>
            <input type="text" name="nom" id="nom" class="input-form" autofocus>
        </div>
        <div class="form-line">
            <label for="prenom" class="label-form">Prénom</label>
            <input type="text" name="prenom" id="prenom" class="input-form">
        </div>
        <div class="form-line">
            <label for="estSauve" class="label-form">Sauveteur ? <span class="form-little-note">(si non coché, alors sauvé)</span></label>
            <input type="checkbox" name="estSauve" id="estSauve" class="checkbox-form"> 
        </div>
        <div class="form-line">
            <label for="date" class="label-form">Date</label>
            <input type="date" name="date" id="date" class="input-form">
        </div>
        <div class="form-line">
            <label for="bateau" class="label-form">Bateau</label>
            <input type="text" name="bateau" id="bateau" class="input-form">
        </div>
        <div class="form-column">
            <label for="informations" class="label-form">Informations complémentaires</label>
            <textarea name="informations" id="informations" class="text-area-form"></textarea>
        </div>
        <div class="submit-div">
            <label for="submit-new" class="submit-btn clickable font-default"><span class="submit-text">Envoyer</span><i class="fas fa-rocket"></i></label>
            <input type="submit" id="submit-new" class="display-none">
        </div>
    </form>
</div>