<?php
session_start();

if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'Admin') {
    header('Location: Accueil.php');
    exit;
}

require_once '../src/bdd/Bdd.php';
require_once '../src/modele/Films.php';
require_once '../src/repository/FilmsRepository.php';

$successMessage = '';
$errorMessage = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $titre = $_POST['titre'];
    $description = $_POST['description'];
    $genre = $_POST['genre'];
    $duree = $_POST['duree'];
    $affiche_url = $_POST['affiche_url'];
    $trailer_url = $_POST['trailer_url'] ?? '';

    if (!empty($titre) && !empty($description) && !empty($genre) && !empty($duree) && !empty($affiche_url)) {
        $film = new Films([
            'titre' => $titre,
            'description' => $description,
            'genre' => $genre,
            'duree' => $duree,
            'affiche_url' => $affiche_url,
            'trailer_url' => $trailer_url
        ]);

        $filmsRepo = new FilmsRepository();
        if ($filmsRepo->ajoutFilms($film)) {
            $successMessage = "Film ajouté avec succès!";
        } else {
            $errorMessage = "Une erreur est survenue. Le film n'a pas pu être ajouté.";
        }
    } else {
        $errorMessage = "Tous les champs doivent être remplis, y compris l'affiche.";
    }
}
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
    <form method="POST" action="ajouterFilm.php">
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

    <?php if ($successMessage): ?>
        <div class="success"><?= $successMessage ?></div>
    <?php endif; ?>

    <?php if ($errorMessage): ?>
        <div class="error"><?= $errorMessage ?></div>
    <?php endif; ?>
</main>

</body>
</html>
