<?php
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'Admin') {
    header('Location: Connexion.php');
    exit;
}

require_once '../src/bdd/Bdd.php';
$bdd = new Bdd();
$conn = $bdd->getBdd();

$sql = "SELECT * FROM utilisateurs";
$stmt = $conn->prepare($sql);
$stmt->execute();
$utilisateurs = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Utilisateurs</title>
    <link href="../assets/css/accueil.css" rel="stylesheet">
</head>
<body>
<header>
    <h1>Liste des Utilisateurs</h1>
    <nav>
        <a href="Accueil.php">Accueil</a>
        <a href="Catalogue.php">Catalogue</a>
        <a href="Deconnexion.php">Déconnexion</a>
    </nav>
</header>

<main>
    <?php if (isset($_GET['msg'])): ?>
        <div class="alert">
            <?php
            switch ($_GET['msg']) {
                case 'success':
                    echo "Utilisateur supprimé avec succès.";
                    break;
                case 'error':
                    echo "Erreur lors de la suppression.";
                    break;
                case 'noid':
                    echo "Aucun utilisateur sélectionné.";
                    break;
            }
            ?>
        </div>
    <?php endif; ?>

    <table>
        <thead>
        <tr>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Email</th>
            <th>Rôle</th>
            <th>Modification</th>
            <th>Suppression</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($utilisateurs as $utilisateur): ?>
            <tr>
                <td><?= htmlspecialchars($utilisateur['nom']) ?></td>
                <td><?= htmlspecialchars($utilisateur['prenom']) ?></td>
                <td><?= htmlspecialchars($utilisateur['email']) ?></td>
                <td><?= htmlspecialchars($utilisateur['role']) ?></td>
                <td>
                    <a href="ModifAdmin.php?id_utilisateur=<?= $utilisateur['id_utilisateur'] ?>">Modifier</a>
                </td>
                <td>
                    <a href="SuppressionAdmin.php?id_utilisateur=<?= $utilisateur['id_utilisateur'] ?>" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet utilisateur ?')">Supprimer</a>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</main>
</body>
</html>
