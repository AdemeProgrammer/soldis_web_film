<?php
require_once '../bdd/Bdd.php';
require_once  '../../vue/ModifFilm.php';
require_once '../modele/Films.php';
require_once '../repository/FilmsRepository.php';

if (isset($_GET['id'])) {
    $id_film = $_GET['id'];

    $FilmsRepository = new FilmsRepository();
    $film = $FilmsRepository->getFilmById($id_film);
} else {
    echo "Film introuvable";
    exit();
}

if (empty($_POST["titre"]) || empty($_POST["description"]) || empty($_POST["genre"]) || empty($_POST["duree"]) || empty($_POST["affiche_url"])) {
    echo "Veuillez remplir tous les champs";
} else {
    $films = new Films([
        'id_film' => $_POST['id_film'],
        'titre' => $_POST['titre'],
        'description' => $_POST["description"],
        'genre' => $_POST["genre"],
        'duree' => $_POST["duree"],
        'affiche_url' => $_POST["affiche_url"],
        'trailer_url' => $_POST["trailer_url"]
    ]);

    $FilmsRepository = new FilmsRepository();
    $resultat = $FilmsRepository->modifFilms($films);

    if ($resultat) {
        header("Location: ../../vue/Accueil.php");
    } else {
        echo "Erreur lors de la modification";
    }
}
