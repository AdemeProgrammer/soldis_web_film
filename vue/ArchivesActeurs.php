<?php
session_start();
require_once '../src/bdd/Bdd.php';
require_once '../src/modele/Acteurs.php';
require_once '../src/repository/ActeursRepository.php';

$acteurRepo = new ActeursRepository();
$acteurs = $acteurRepo->getAllActeurs();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Archives des Acteurs</title>
    <link rel="stylesheet" href="../assets/css/archives_acteurs.css">
</head>
<body>

<header>
    <div class="navbar">
        <h1>Archives des Acteurs</h1>
        <nav>
            <a href="Accueil.php">Accueil</a>
            <a href="Catalogue.php">Catalogue</a>
            <?php
            if (isset($_SESSION['role']) && $_SESSION['role'] === 'Admin') {
                echo '<a href="AjoutActeurs.php" class="btn-ajouter-film">Ajouter un acteur</a>';
            }
            ?>
            <a href="Deconnexion.php">Déconnexion</a>
        </nav>
    </div>
</header>

<main>
    <section class="acteur-list">
        <?php foreach ($acteurs as $acteur): ?>
            <div class="acteur-card">
                <h3><?= htmlspecialchars($acteur['nom_complet']) ?></h3>
                <a href="DetailActeur.php?id=<?= $acteur['id_acteur'] ?>&nom=<?= urlencode($acteur['nom_complet']) ?>">
                    Voir Détails
                </a>

            </div>
        <?php endforeach; ?>
    </section>
</main>

<footer>
    <p>&copy; 2025 Mon Site de Films</p>
</footer>

</body>
</html>

