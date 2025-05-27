<?php
session_start();
require_once '../bdd/Bdd.php';
require_once '../modele/Acteurs.php';
require_once '../repository/ActeursRepository.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom_complet = isset($_POST['nom_complet']) ? trim($_POST['nom_complet']) : '';

    if (!empty($nom_complet)) {
        $acteur = new Acteurs([
            'nom_complet' => $nom_complet
        ]);

        $acteurRepo = new ActeursRepository();

        if ($acteurRepo->ajoutActeur($acteur)) {
            header('Location: ../../vue/ArchivesActeurs.php');
            exit();
        } else {
            echo "Erreur lors de l'ajout de l'acteur.";
        }
    } else {
        echo "Le champ 'Nom complet' ne peut pas être vide.";
    }
}
?>

