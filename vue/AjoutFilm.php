<?php
session_start();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Ajouter un Film</title>
    <link rel="stylesheet" href="../assets/css/ajout_film.css">
</head>
<body>

<header>
    <h1>Ajouter un Film</h1>
    <nav>
        <a href="Accueil.php">Accueil</a>
        <a href="Catalogue.php">Catalogue</a>
    </nav>
</header>

<main>
    <form method="POST" action="../src/traitement/trait_ajout_film.php">
        <label for="titre">Titre</label>
        <input type="text" name="titre" id="titre" required>

        <label for="description">Description</label>
        <textarea name="description" id="description" required></textarea>

        <label for="genre">Genre</label>
        <input type="text" name="genre" id="genre" required>

        <label for="duree">Durée</label>
        <input type="text" name="duree" id="duree" required>

        <label for="affiche_url">URL de l'Affiche</label>
        <input type="url" name="affiche_url" id="affiche_url" required>

        <label for="trailer_url">URL du Trailer (optionnel)</label>
        <input type="url" name="trailer_url" id="trailer_url">

        <button type="submit">Ajouter le Film</button>
    </form>
</main>

</body>
</html>
