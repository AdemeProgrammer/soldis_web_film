<?php
session_start();

require_once '../src/bdd/Bdd.php';
require_once '../src/modele/Films.php';
require_once '../src/repository/FilmsRepository.php';
require_once '../src/repository/FilmsActeursRepository.php';
require_once '../src/modele/Commentaires.php';
require_once '../src/repository/CommentairesRepository.php';

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    echo "Film non trouvé.";
    exit;
}
$id_film = (int) $_GET['id'];

$filmsRepo = new FilmsRepository();
$filmsActeursRepo = new FilmsActeursRepository();
$commentairesRepo = new CommentairesRepository();

$filmDetails = $filmsRepo->getFilmById($id_film);
if (!$filmDetails) {
    echo "Film non trouvé.";
    exit;
}

$acteursAssocies = $filmsActeursRepo->getActeursByFilm($id_film);

$commentaires = $commentairesRepo->getCommentairesByFilm($id_film);

$messageErreur = '';
$messageSucces = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['ajout_commentaire'])) {
    if (!isset($_SESSION['id_utilisateur'])) {
        $messageErreur = "Vous devez être connecté pour poster un commentaire.";
    } else {
        $note = filter_input(INPUT_POST, 'note', FILTER_VALIDATE_INT, ['options' => ['min_range' => 0, 'max_range' => 20]]);
        $libelle = trim($_POST['libelle'] ?? '');

        if ($note === false || $note === null) {
            $messageErreur = "La note doit être un nombre entier entre 0 et 20.";
        } elseif (empty($libelle)) {
            $messageErreur = "Le commentaire ne peut pas être vide.";
        } else {
            $commentaire = new Commentaires([
                'note' => $note,
                'libelle' => $libelle,
                'ref_film' => $id_film,
                'ref_utilisateur' => $_SESSION['id_utilisateur'],
                'date' => date('Y-m-d H:i:s'),
            ]);

            if ($commentairesRepo->ajouterCommentaire($commentaire)) {
                $messageSucces = "Commentaire ajouté avec succès.";
                $commentaires = $commentairesRepo->getCommentairesByFilm($id_film);
                $_POST = [];
            } else {
                $messageErreur = "Une erreur est survenue lors de l'ajout du commentaire.";
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Détails du Film - <?= htmlspecialchars($filmDetails['titre']) ?></title>
    <link rel="stylesheet" href="../assets/css/film_detail.css">
</head>
<body>

<header>
    <h1>Détails du Film</h1>
</header>

<main>
    <section class="film-details">
        <h2><?= htmlspecialchars($filmDetails['titre']) ?></h2>
        <img src="<?= htmlspecialchars($filmDetails['affiche_url']) ?>" alt="<?= htmlspecialchars($filmDetails['titre']) ?>" />
        <p><strong>Description:</strong> <?= nl2br(htmlspecialchars($filmDetails['description'])) ?></p>
        <p><strong>Genre:</strong> <?= htmlspecialchars($filmDetails['genre']) ?></p>
        <p><strong>Durée:</strong> <?= htmlspecialchars($filmDetails['duree']) ?> minutes</p>
        <p><strong>Trailer:</strong> <a href="<?= htmlspecialchars($filmDetails['trailer_url']) ?>" target="_blank" rel="noopener noreferrer">Voir le trailer</a></p>

        <h3>Acteurs principaux</h3>
        <div class="acteurs-list">
            <?php if (count($acteursAssocies) > 0): ?>
                <?php foreach ($acteursAssocies as $acteur): ?>
                    <div class="acteur-card">
                        <h4><?= htmlspecialchars($acteur['nom_complet']) ?></h4>
                        <p><strong>Rôle :</strong> <?= htmlspecialchars($acteur['role']) ?></p>
                        <img src="<?= htmlspecialchars($acteur['img_acteur']) ?>" alt="<?= htmlspecialchars($acteur['nom_complet']) ?>" class="acteur-img">
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p>Aucun acteur associé à ce film.</p>
            <?php endif; ?>
        </div>

        <?php if (isset($_SESSION['role']) && $_SESSION['role'] === 'Admin'): ?>
            <div class="btn-container">
                <a class="btn-action" href="ModifFilm.php?id=<?= $filmDetails['id_film'] ?>">Modifier ce film</a>
                <a class="btn-action" href="../src/traitement/trait_suppr_film.php?id=<?= $filmDetails['id_film'] ?>" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce film ?');">Supprimer ce film</a>
            </div>
        <?php endif; ?>
            <h3>Commentaires (<?= count($commentaires) ?>)</h3>

            <?php if ($messageErreur): ?>
                <div class="error-message"><?= htmlspecialchars($messageErreur) ?></div>
            <?php endif; ?>

            <?php if ($messageSucces): ?>
                <div class="success-message"><?= htmlspecialchars($messageSucces) ?></div>
            <?php endif; ?>

            <?php if (count($commentaires) > 0): ?>
                <ul class="commentaires-list">
                    <?php foreach ($commentaires as $com): ?>
                        <li>
                            <strong>Note : </strong><?= htmlspecialchars($com['note']) ?>/20<br>
                            <em><?= nl2br(htmlspecialchars($com['libelle'])) ?></em><br>
                            <small>Posté le <?= date('d/m/Y à H:i', strtotime($com['date'])) ?></small>
                        </li>
                    <?php endforeach; ?>
                </ul>
            <?php else: ?>
                <p>Aucun commentaire pour ce film.</p>
            <?php endif; ?>

            <?php if (isset($_SESSION['id_utilisateur'])): ?>
                <h4>Ajouter un commentaire</h4>
                <form method="POST" action="">
                    <label for="note">Note (0-20) :</label>
                    <input type="number" name="note" id="note" min="0" max="20" required value="<?= htmlspecialchars($_POST['note'] ?? '') ?>">

                    <label for="libelle">Commentaire :</label>
                    <textarea name="libelle" id="libelle" rows="4" required><?= htmlspecialchars($_POST['libelle'] ?? '') ?></textarea>

                    <button type="submit" name="ajout_commentaire">Envoyer</button>
                </form>
            <?php else: ?>
                <p>Vous devez être connecté pour ajouter un commentaire.</p>
            <?php endif; ?>
    </section>

    <a href="Catalogue.php">Retour au catalogue</a>
</main>

<footer>
    <p>&copy; 2025 Mon Site de Films</p>
</footer>

</body>
</html>

