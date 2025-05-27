<?php
session_start();
require_once '../src/bdd/Bdd.php';
require_once '../src/modele/Acteurs.php';
require_once '../src/repository/ActeursRepository.php';
require_once '../src/repository/FilmsActeursRepository.php';

// Récupérer l'ID de l'acteur depuis l'URL
if (isset($_GET['id'])) {
    $id_acteur = $_GET['id'];
} else {
    echo "Acteur non trouvé.";
    exit;
}

// Instancier les repositories
$acteurRepo = new ActeursRepository();
$filmsActeursRepo = new FilmsActeursRepository();

// Récupérer les informations de l'acteur
$acteurDetails = $acteurRepo->getActeurById($id_acteur);
if (!$acteurDetails) {
    echo "Acteur non trouvé.";
    exit;
}

// Récupérer les films associés à cet acteur
$filmsAssocies = $filmsActeursRepo->getFilmsByActeur($id_acteur);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détails de l'Acteur</title>
    <link rel="stylesheet" href="../assets/css/acteur_detail.css">
</head>
<body>

<header>
    <div class="navbar">
        <h1>Détails de l'Acteur</h1>
        <nav>
            <a href="Accueil.php">Accueil</a>
            <a href="Catalogue.php">Catalogue</a>
            <a href="ArchivesActeurs.php">Acteurs</a>
            <a href="Deconnexion.php">Déconnexion</a>
        </nav>
    </div>
</header>

<main>
    <section class="acteur-details">
        <h2><?= htmlspecialchars($acteurDetails['nom_complet']) ?></h2>

        <h3>Films associés à cet acteur</h3>
        <div class="film-list">
            <?php if (count($filmsAssocies) > 0): ?>
                <?php foreach ($filmsAssocies as $film): ?>
                    <div class="film-card">
                        <a href="FilmsDetails.php?id=<?= $film['id_film'] ?>">
                            <img src="<?= htmlspecialchars($film['affiche_url']) ?>" alt="<?= htmlspecialchars($film['titre']) ?>" />
                            <h4><?= htmlspecialchars($film['titre']) ?></h4>
                        </a>
                        <p><strong>Rôle :</strong> <?= htmlspecialchars($film['role']) ?></p>
                        <img src="<?= htmlspecialchars($film['img_acteur']) ?>" alt="<?= htmlspecialchars($acteurDetails['nom_complet']) ?>" class="img-acteur-film" />
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p>Aucun film associé à cet acteur.</p>
            <?php endif; ?>
        </div>
        <h3>Ajouter / Modifier un rôle pour un film</h3>
        <form action="../src/traitement/trait_role_acteur.php" method="POST">
            <input type="hidden" name="ref_acteur" value="<?= $id_acteur ?>">

            <label for="ref_film">Film :</label>
            <select name="ref_film" required>
                <?php
                require_once '../src/repository/FilmsRepository.php';
                $filmsRepo = new FilmsRepository();
                $tousLesFilms = $filmsRepo->getAllFilms(); // méthode à ajouter si pas encore faite
                foreach ($tousLesFilms as $film) {
                    echo "<option value=\"{$film['id_film']}\">" . htmlspecialchars($film['titre']) . "</option>";
                }
                ?>
            </select>

            <label for="role">Rôle :</label>
            <input type="text" name="role" required>

            <label for="img_acteur">Lien image de l’acteur :</label>
            <input type="url" name="img_acteur" placeholder="https://...">

            <button type="submit" name="action" value="ajouter">Ajouter / Modifier</button>
        </form>

    </section>
</main>

<footer>
    <p>&copy; 2025 Mon Site de Films</p>
</footer>

</body>
</html>

