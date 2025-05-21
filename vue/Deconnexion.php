<?php
session_start();
session_destroy();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Déconnexion</title>
    <link rel="stylesheet" href="../assets/css/deconnexion.css"> <!-- Ou inline <style> -->
</head>
<body>

<div class="loading-screen">
    <h2>Déconnexion en cours...</h2>
</div>

<script>
    // Redirection après 2 secondes
    setTimeout(function () {
        window.location.href = "Connexion.php";
    }, 2000);
</script>

</body>
</html>

