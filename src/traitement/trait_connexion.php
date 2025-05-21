<?php
require_once '../bdd/Bdd.php';
require_once '../../vue/Connexion.php';
require_once '../modele/Utilisateurs.php';
require_once '../repository/UtilisateursRepository.php';

if (!isset($_POST["email"]) || !isset($_POST["mot_de_passe"]) || empty($_POST["email"]) || empty($_POST["mot_de_passe"])) {
    echo "C'est pas bien, vous avez laissé une case vide";
    header("Location: ../../vue/Connexion.php");
    exit();
} else {
    $utilisateurs = new Utilisateurs([
        'email' => $_POST["email"],
        'motDePasse' => $_POST["mot_de_passe"]
    ]);

    $utilisateursRepository = new UtilisateursRepository();
    $resultat = $utilisateursRepository->connexionUtilisateurs($utilisateurs);

    if ($resultat) {
        session_start();

        $_SESSION['id_utilisateur'] = $utilisateurs->getIdUtilisateur();
        $_SESSION['nom'] = $utilisateurs->getNom();
        $_SESSION['prenom'] = $utilisateurs->getPrenom();
        $_SESSION['email'] = $utilisateurs->getEmail();
        $_SESSION['motDePasse'] = $utilisateurs->getMotDePasse();
        $_SESSION['role'] = $utilisateurs->getRole();

        header("Location: ../../vue/Accueil.php");
        exit();
    } else {
        session_destroy();
        header("Location: ../../vue/Connexion.php");
        exit();
    }
}
?>
