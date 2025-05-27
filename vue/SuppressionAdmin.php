<?php
session_start();

// Vérification que l'utilisateur est admin
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'Admin') {
    header('Location: Connexion.php');
    exit;
}

require_once '../src/bdd/Bdd.php';
require_once '../src/repository/UtilisateursRepository.php';

if (isset($_GET['id_utilisateur'])) {
    $id_utilisateur = (int)$_GET['id_utilisateur'];

    $utilisateursRepo = new UtilisateursRepository();
    $resultat = $utilisateursRepo->suppUtilisateurs($id_utilisateur);

    if ($resultat) {
        header("Location: ../vue/AllUtilisateurs.php?msg=success");
    } else {
        header("Location: ../vue/AllUtilisateurs.php?msg=error");
    }
    exit;
} else {
    header("Location: ../vue/AllUtilisateurs.php?msg=noid");
    exit;
}
?>
