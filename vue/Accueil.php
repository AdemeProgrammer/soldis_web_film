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
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Soldis Web Film</title>
    <link rel="stylesheet" href="../assets/css/accueil.css">
</head>
<body>
<header>
    <h1>Soldis Web Film : <?= $_SESSION['nom'] ?> <?= $_SESSION['prenom'] ?></h1>
    <nav>
        <a href="#">Accueil</a>
        <a href="Catalogue.php">Catalogue</a>
        <a href="ArchivesActeurs.php">Archives des acteurs</a>
        <a href="Deconnexion.php">Déconnexion</a>
    </nav>
</header>

<main>
    <section class="hero">
        <h2>Bienvenue dans un monde cinématographique d'exception</h2>
    </section>

    <section id="films" class="films-section">
        <h3>Les films disponibles (voir plus dans le catalogue) :</h3>
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
    <br>
    <hr>
    <br>
    <section id="anime-films" class="films-section">
        <h3>Films d'animation japonaise (Anime) :</h3>
        <div class="film-container">
            <?php foreach ($animeFilms as $film): ?>
                <div class="film">
                    <a href="FilmsDetails.php?id=<?= $film['id_film'] ?>">
                        <img src="<?= htmlspecialchars($film['affiche_url']) ?>" alt="<?= htmlspecialchars($film['titre']) ?>">
                    </a>
                </div>
            <?php endforeach; ?>
        </div>
    </section>
    <br>
    <hr>
    <br>
    <section id="anime-films" class="films-section">
        <h3>Films d'action :</h3>
        <div class="film-container">
            <?php foreach ($actionFilms as $film): ?>
                <div class="film">
                    <a href="FilmsDetails.php?id=<?= $film['id_film'] ?>">
                        <img src="<?= htmlspecialchars($film['affiche_url']) ?>" alt="<?= htmlspecialchars($film['titre']) ?>">
                    </a>
                </div>
            <?php endforeach; ?>
        </div>
    </section>
    <br>
    <hr>
    <br>
    <section id="anime-films" class="films-section">
        <h3>Films de comédie :</h3>
        <div class="film-container">
            <?php foreach ($comedieFilms as $film): ?>
                <div class="film">
                    <a href="FilmsDetails.php?id=<?= $film['id_film'] ?>">
                        <img src="<?= htmlspecialchars($film['affiche_url']) ?>" alt="<?= htmlspecialchars($film['titre']) ?>">
                    </a>
                </div>
            <?php endforeach; ?>
        </div>
    </section>
    <br>
    <hr>
    <br>
    <section id="anime-films" class="films-section">
        <h3>Films historique :</h3>
        <div class="film-container">
            <?php foreach ($historyFilms as $film): ?>
                <div class="film">
                    <a href="FilmsDetails.php?id=<?= $film['id_film'] ?>">
                        <img src="<?= htmlspecialchars($film['affiche_url']) ?>" alt="<?= htmlspecialchars($film['titre']) ?>">
                    </a>
                </div>
            <?php endforeach; ?>
        </div>
    </section>
    <br>
    <hr>
    <br>
    <section id="anime-films" class="films-section">
        <h3>Films fantaisie :</h3>
        <div class="film-container">
            <?php foreach ($fantasyFilms as $film): ?>
                <div class="film">
                    <a href="FilmsDetails.php?id=<?= $film['id_film'] ?>">
                        <img src="<?= htmlspecialchars($film['affiche_url']) ?>" alt="<?= htmlspecialchars($film['titre']) ?>">
                    </a>
                </div>
            <?php endforeach; ?>
        </div>
    </section>
    <br>
    <hr>
    <br>
    <section id="anime-films" class="films-section">
        <h3>musiques :</h3>
        <div class="film-container">
            <?php foreach ($musicFilms as $film): ?>
                <div class="film">
                    <a href="FilmsDetails.php?id=<?= $film['id_film'] ?>">
                        <img src="<?= htmlspecialchars($film['affiche_url']) ?>" alt="<?= htmlspecialchars($film['titre']) ?>">
                    </a>
                </div>
            <?php endforeach; ?>
        </div>
    </section>

</main>

<footer>
    <hr>
    <p>Connecté en tant que <?= $_SESSION['prenom'] ?> <?= $_SESSION['nom'] ?> | <a href="Deconnexion.php">Déconnexion</a></p>
</footer>
</body>
</html>
