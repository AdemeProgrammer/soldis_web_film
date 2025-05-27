<?php session_start(); ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Ajouter un Acteur</title>
    <link rel="stylesheet" href="../assets/css/ajout_acteur.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
</head>
<body>

<header class="site-header">
    <div class="header-inner">
        <h1 class="logo">Ajouter un Acteur</h1>
        <nav class="main-nav">
            <ul class="nav-links">
                <li><a href="Accueil.php" class="nav-item">Accueil</a></li>
                <li><a href="Catalogue.php" class="nav-item">Catalogue</a></li>
                <li><a href="ArchivesActeurs.php" class="nav-item active">Acteurs</a></li>
                <li><a href="Deconnexion.php" class="nav-item logout">Se déconnecter</a></li>
            </ul>
        </nav>
    </div>
</header>


<main>
    <section class="form-section">
        <form method="POST" action="../src/traitement/trait_ajout_acteur.php" autocomplete="on">
            <div class="form-group">
                <label for="nom_complet">Nom complet</label>
                <input type="text" id="nom_complet" name="nom_complet" required />
            </div>

            <button type="submit" class="submit-btn">Ajouter l'acteur</button>
        </form>
    </section>
</main>

<footer>
    <p>&copy; 2025 Soldis Web Film | L’univers des acteurs</p>
</footer>

</body>
</html>
