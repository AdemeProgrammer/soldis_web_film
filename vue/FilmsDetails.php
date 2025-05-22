<?php
session_start();
require_once '../src/bdd/Bdd.php';
require_once '../src/modele/Films.php';
require_once '../src/repository/FilmsRepository.php';

if (!isset($_GET['id'])) {
    echo "Film non trouvé.";
    exit;
}

$filmsRepo = new FilmsRepository();
$filmDetails = $filmsRepo->getFilmById($_GET['id']);

if (!$filmDetails) {
    echo "Film non trouvé.";
    exit;
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Détails du Film</title>
    <link rel="stylesheet" href="../assets/css/catalogue.css">
</head>
<body>
<header>
    <div class="navbar">
        <h1>Détails du Film</h1>
        <nav>
            <a href="Accueil.php">Accueil</a>
            <a href="Catalogue.php">Catalogue</a>
            <a href="Deconnexion.php">Déconnexion</a>
        </nav>
    </div>
</header>

<main>
    <div class="film-details" style="padding: 100px 20px 20px;">
        <h2><?= htmlspecialchars($filmDetails['titre']) ?></h2>
        <img src="<?= htmlspecialchars($filmDetails['affiche_url']) ?>" alt="<?= htmlspecialchars($filmDetails['titre']) ?>" />
        <p><strong>Description:</strong> <?= nl2br(htmlspecialchars($filmDetails['description'])) ?></p>
        <p><strong>Genre:</strong> <?= htmlspecialchars($filmDetails['genre']) ?></p>
        <p><strong>Durée:</strong> <?= htmlspecialchars($filmDetails['duree']) ?></p>
        <p><strong>Trailer:</strong> <a href="<?= htmlspecialchars($filmDetails['trailer_url']) ?>" target="_blank">Voir le trailer</a></p>

        <?php if (isset($_SESSION['role']) && $_SESSION['role'] === 'Admin'): ?>
            <a href="ModifFilm.php?id=<?= $filmDetails['id_film'] ?>" class="btn-modifier">Modifier le film</a>
        <?php endif; ?>
    </div>
</main>

<footer>
    <p>&copy; 2025 Mon Site de Films</p>
</footer>
</body>
</html>


