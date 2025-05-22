<?php
session_start();
require_once '../src/bdd/Bdd.php';
require_once '../src/modele/Films.php';
require_once '../src/repository/FilmsRepository.php';

$filmsRepo = new FilmsRepository();
$films = $filmsRepo->catalogueFilms();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Catalogue des Films</title>
    <link rel="stylesheet" href="../assets/css/catalogue.css">
</head>
<body>

<header>
    <div class="navbar">
        <h1>Catalogue de films</h1>
        <nav>
            <a href="Accueil.php">Accueil</a>
            <a href="#">Catalogue</a>
            <?php
            if (isset($_SESSION['role']) && $_SESSION['role'] === 'Admin') {
                echo '<a href="AjoutFilm.php" class="btn-ajouter-film">Ajouter un film</a>';
                echo '<a href="ModifFilm.php" class="btn-ajouter-film">Modifer un film</a>';
            }
            ?>
            <a href="Deconnexion.php">Déconnexion</a>
        </nav>
    </div>
</header>

<div class="catalogue-container">
    <?php foreach ($films as $film): ?>
        <div class="film-card">
            <a href="FilmsDetails.php?id=<?= $film['id_film'] ?>">
                <img src="<?= $film['affiche_url'] ?>" alt="<?= $film['titre'] ?>" />
                <h3><?= $film['titre'] ?></h3>
            </a>
        </div>
    <?php endforeach; ?>
</div>

</body>
</html>





