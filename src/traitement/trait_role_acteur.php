<?php
require_once '../bdd/Bdd.php';
require_once '../modele/Films_acteurs.php';
require_once '../repository/FilmsActeursRepository.php';

$repo = new FilmsActeursRepository();

$ref_film = $_POST['ref_film'] ?? null;
$ref_acteur = $_POST['ref_acteur'] ?? null;
$action = $_POST['action'] ?? null;

if (!$ref_film || !$ref_acteur) {
    die("Paramètres manquants.");
}

if ($action === 'supprimer') {
    $repo->supprimerAssociation($ref_film, $ref_acteur);
    header("Location: ../../vue/DetailActeur.php?id=$ref_acteur");
    exit;
}

$role = trim($_POST['role'] ?? '');
$img_url = trim($_POST['img_acteur'] ?? '');

$filmsActeurs = new FilmsActeurs([
    'ref_film' => $ref_film,
    'ref_acteur' => $ref_acteur,
    'role' => $role,
    'img_acteur' => $img_url
]);

$repo->ajouterOuModifier($filmsActeurs);

header("Location: ../../vue/DetailActeur.php?id=$ref_acteur");
exit;

