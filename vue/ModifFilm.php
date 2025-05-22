<?php
session_start();

require_once '../src/bdd/Bdd.php';
require_once '../src/modele/Films.php';
require_once '../src/repository/FilmsRepository.php';

if (isset($_GET['id'])) {
    $id_film = $_GET['id'];
} else {
    echo "Film non trouvé.";
    exit;
}

$filmsRepo = new FilmsRepository();
$filmDetails = $filmsRepo->getFilmById($id_film);

if (!$filmDetails) {
    echo "Film non trouvé.";
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $titre = $_POST['titre'];
    $description = $_POST['description'];
    $genre = $_POST['genre'];
    $duree = $_POST['duree'];
    $affiche_url = $_POST['affiche_url'];
    $trailer_url = $_POST['trailer_url'];

    $film = new Films([
        'id_film' => $id_film,
        'titre' => $titre,
        'description' => $description,
        'genre' => $genre,
        'duree' => $duree,
        'affiche_url' => $affiche_url,
        'trailer_url' => $trailer_url,
    ]);

    // On modifie le film dans la base de données
    $filmsRepo->modifFilms($film);
    header("Location: FilmsDetails.php?id=" . $id_film); // Redirection vers la page de détails après la modification
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier Film</title>
    <link rel="stylesheet" href="../assets/css/modif_film.css">
</head>
<body>
<header>
    <h1>Modifier le Film</h1>
</header>

<main>
    <form action="ModifFilm.php?id=<?= $filmDetails['id_film'] ?>" method="POST">
        <label for="titre">Titre:</label>
        <input type="text" name="titre" id="titre" value="<?= $filmDetails['titre'] ?>" required>

        <label for="description">Description:</label>
        <textarea name="description" id="description" required><?= $filmDetails['description'] ?></textarea>

        <label for="genre">Genre:</label>
        <input type="text" name="genre" id="genre" value="<?= $filmDetails['genre'] ?>" required>

        <label for="duree">Durée:</label>
        <input type="text" name="duree" id="duree" value="<?= $filmDetails['duree'] ?>" required>

        <label for="affiche_url">URL de l'Affiche:</label>
        <input type="url" name="affiche_url" id="affiche_url" value="<?= $filmDetails['affiche_url'] ?>" required>

        <label for="trailer_url">URL du Trailer:</label>
        <input type="url" name="trailer_url" id="trailer_url" value="<?= $filmDetails['trailer_url'] ?>">

        <button type="submit">Sauvegarder les modifications</button>
    </form>
    <a href="FilmsDetails.php?id=<?= $filmDetails['id_film'] ?>">Annuler</a>
</main>

<footer>
    <p>&copy; 2025 Mon Site de Films</p>
</footer>
</body>
</html>

