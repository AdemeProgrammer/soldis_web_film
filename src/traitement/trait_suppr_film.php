<?php
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'Admin') {
    echo "Accès non autorisé.";
    exit;
}

if (!isset($_GET['id']) || empty($_GET['id'])) {
    echo "Film non trouvé.";
    exit;
}

require_once '../bdd/Bdd.php';
require_once '../modele/Films.php';
require_once '../repository/FilmsRepository.php';

$id_film = intval($_GET['id']); // Sécurisation

$film = new Films(['id_film' => $id_film]);

$repo = new FilmsRepository();
$success = $repo->suppFilms($film);

if ($success) {
    header('Location: ../../vue/Catalogue.php');
    exit;
} else {
    echo "Erreur lors de la suppression du film.";
}
