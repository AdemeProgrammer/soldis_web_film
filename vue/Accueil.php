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
</main>

<footer>
    <hr>
    <p>Connecté en tant que <?= $_SESSION['prenom'] ?> <?= $_SESSION['nom'] ?> | <a href="Deconnexion.php">Déconnexion</a></p>
</footer>
</body>
</html>
