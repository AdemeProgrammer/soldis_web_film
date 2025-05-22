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
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détails du Film</title>
    <link rel="stylesheet" href="../assets/css/film_detail.css">
</head>
<body>
<header>
    <h1>Détails du Film</h1>
</header>

<main>
    <div class="film-details">
        <h2><?= htmlspecialchars($filmDetails['titre']) ?></h2>
        <img src="<?= htmlspecialchars($filmDetails['affiche_url']) ?>" alt="<?= htmlspecialchars($filmDetails['titre']) ?>" />
        <p><strong>Description:</strong> <?= nl2br(htmlspecialchars($filmDetails['description'])) ?></p>
        <p><strong>Genre:</strong> <?= htmlspecialchars($filmDetails['genre']) ?></p>
        <p><strong>Durée:</strong> <?= htmlspecialchars($filmDetails['duree']) ?></p>
        <p><strong>Trailer:</strong> <a href="<?= htmlspecialchars($filmDetails['trailer_url']) ?>" target="_blank">Voir le trailer</a></p>

        <?php if (isset($_SESSION['role']) && $_SESSION['role'] === 'Admin'): ?>
            <div class="btn-container">
                <a class="btn-action" href="ModifFilm.php?id=<?= $filmDetails['id_film'] ?>">Modifier ce film</a>
                <a class="btn-action" href="../src/traitement/trait_suppr_film.php?id=<?= $filmDetails['id_film'] ?>" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce film ?');">Supprimer ce film</a>
            </div>
        <?php endif; ?>

    </div>
    <a href="Catalogue.php">Retour au catalogue</a>
</main>

<footer>
    <p>&copy; 2025 Mon Site de Films</p>
</footer>
</body>
</html>
