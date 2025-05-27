<?php
session_start();
require_once '../src/bdd/Bdd.php';
require_once '../src/repository/FilmsRepository.php';

if (!isset($_SESSION['email'])) {
    header('location: ../vue/Connexion.php');
    exit;
}

$filmsRepo = new FilmsRepository();
$randomFilms = $filmsRepo->getRandomFilms(6);
$animeFilms = $filmsRepo->getFilmsByGenre('Anime', 4);
$actionFilms = $filmsRepo->getFilmsByGenre('Action', 4);
$comedieFilms = $filmsRepo->getFilmsByGenre('Comédie', 4);
$historyFilms = $filmsRepo->getFilmsByGenre('Historique', 4);
$fantasyFilms = $filmsRepo->getFilmsByGenre('Fantaisie', 4);
$musicFilms = $filmsRepo->getFilmsByGenre('Musique', 4);
?>
<!DOCTYPE html>
<html lang="fr" data-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Soldis Web Film</title>
    <link rel="stylesheet" href="../assets/css/accueil.css">
</head>
<body>
<header>
    <h1>Soldis Web Film : <?= $_SESSION['nom'] ?> <?= $_SESSION['prenom'] ?></h1>
    <nav class="fade-in">
        <a href="#">Accueil</a>
        <a href="Catalogue.php">Catalogue</a>
        <a href="ArchivesActeurs.php">Acteurs</a>
        <?php if ($_SESSION['role'] === 'Admin'): ?>
            <a href="AllUtilisateurs.php">Voir les utilisateurs</a>
        <?php endif; ?>
        <a href="Deconnexion.php">Déconnexion</a>
    </nav>
</header>

<main>
    <section class="hero">
        <h2>Bienvenue dans un monde cinématographique d'exception</h2>
    </section>

    <section class="films-section" id="random-films">
        <h3>Films disponibles (voir plus dans le catalogue) :</h3>
        <div class="film-container">
            <?php foreach ($randomFilms as $film): ?>
                <div class="film">
                    <a href="FilmsDetails.php?id=<?= $film['id_film'] ?>">
                        <img src="<?= htmlspecialchars($film['affiche_url']) ?>" alt="<?= htmlspecialchars($film['titre']) ?>">
                    </a>
                </div>
            <?php endforeach; ?>
        </div>
    </section>

    <?php
    $sections = [
        'anime-films' => ['title' => 'Films d\'animation japonaise (Anime)', 'data' => $animeFilms],
        'action-films' => ['title' => 'Films d\'action', 'data' => $actionFilms],
        'comedie-films' => ['title' => 'Films de comédie', 'data' => $comedieFilms],
        'history-films' => ['title' => 'Films historique', 'data' => $historyFilms],
        'fantasy-films' => ['title' => 'Films fantaisie', 'data' => $fantasyFilms],
        'music-films' => ['title' => 'Films musicaux', 'data' => $musicFilms],
    ];

    foreach ($sections as $id => $section): ?>
        <section class="films-section" id="<?= $id ?>">
            <h3><?= $section['title'] ?> :</h3>
            <div class="film-container">
                <?php foreach ($section['data'] as $film): ?>
                    <div class="film">
                        <a href="FilmsDetails.php?id=<?= $film['id_film'] ?>">
                            <img src="<?= htmlspecialchars($film['affiche_url']) ?>" alt="<?= htmlspecialchars($film['titre']) ?>">
                        </a>
                    </div>
                <?php endforeach; ?>
            </div>
        </section>
    <?php endforeach; ?>
</main>

<footer>
    <hr>
    <p>Connecté en tant que <?= $_SESSION['prenom'] ?> <?= $_SESSION['nom'] ?> | <a href="Deconnexion.php">Déconnexion</a></p>
</footer>
</body>
</html>
