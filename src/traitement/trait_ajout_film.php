<?php
require_once '../bdd/Bdd.php';
require_once  '../../vue/AjoutFilm.php';
require_once '../modele/Films.php';
require_once '../repository/FilmsRepository.php';




if(empty($_POST["titre"]) ||
    empty($_POST["description"]) ||
    empty($_POST["genre"]) ||
    empty($_POST["duree"]) ||
    empty($_POST["affiche_url"]) ||
    empty($_POST["trailer_url"])){

    echo "C'est pas bien ...";
    header("Location: ../../vue/AjoutFilm.php");
}else{
    $films = new Films([
        'titre' => $_POST['titre'],
        'description' => $_POST["description"],
        'genre' =>$_POST["genre"],
        'duree' => $_POST["duree"],
        'affiche_url' => $_POST["affiche_url"],
        'trailer_url' => $_POST["trailer_url"]
    ]);
    $FilmsRepository = new FilmsRepository();
    $resultat = $FilmsRepository->ajoutFilms($films);

    if($resultat == true){
        header("Location: ../../vue/Accueil.php");
    }else{
        header("Location: ../../vue/AjoutFilm.php");
    }

}