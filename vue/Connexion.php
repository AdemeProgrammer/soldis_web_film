<?php
session_start();
session_destroy();
session_start();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Connexion</title>
    <link rel="stylesheet" href="../assets/css/login.css">
</head>

<body>
<div class="container">
    <h2>Connexion</h2>
    <form action ="../src/traitement/trait_connexion.php" method="post">
        <div class="form-group">
            <label for="email"><i class="zmdi zmdi-email"></i></label>
            <input type="email" name="email" id="email" placeholder="Votre Email" required/>
        </div>
        <div class="form-group">
            <label for="mot_de_passe"><i class="zmdi zmdi-lock"></i></label>
            <input type="password" name="mot_de_passe" id="mot_de_passe" placeholder="Votre mot de passe" required/>
        </div>
        <input type="submit" name="validation" value="Se connecter">
    </form>
    <a href="Inscription.php"><p>Vous n'êtes pas un membre majestueux ?</p></a>
</div>
</body>
</html>
