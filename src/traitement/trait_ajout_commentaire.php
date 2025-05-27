<?php
session_start();
require_once '../bdd/Bdd.php';
require_once '../modele/Commentaires.php';
require_once '../repository/CommentairesRepository.php';

if (!isset($_SESSION['id_utilisateur'])) {
    header("Location: ../../vue/Login.php");
    exit;
}

if (
    isset($_POST['note'], $_POST['commentaire'], $_POST['ref_film']) &&
    is_numeric($_POST['note']) &&
    $_POST['note'] >= 0 && $_POST['note'] <= 20
) {
    $commentaire = new Commentaires([
        'note' => $_POST['note'],
        'commentaire' => $_POST['commentaire'],
        'date' => date('Y-m-d'),
        'ref_film' => $_POST['ref_film'],
        'ref_utilisateur' => $_SESSION['id_utilisateur']
    ]);

    $repo = new CommentairesRepository();
    $repo->ajouterCommentaire($commentaire);

    header("Location: ../../vue/FilmsDetails.php?id=" . $_POST['ref_film']);
    exit;
} else {
    echo "Erreur dans le formulaire.";
}

