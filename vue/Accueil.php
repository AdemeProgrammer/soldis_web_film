<?php
session_start();
if (!isset($_SESSION['email'])) {
    header('location: ../vue/ConnexionEM.php');
}
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <title>Soldis Web Film</title>

</head>

<body>
<header>
    <h1>Soldis Web Film : <?= $_SESSION['nom']?> <?= $_SESSION['prenom']?></h1>
    <nav>
        <a href="#">Accueil</a>
    </nav>
</header>

<section class="hero">
    <div>
        <h2>Bienvenue dans un monde cinématographique d'exception</h2>
        <button onclick="window.location.href='CatalogueEM.php'">Découvrez nos films</button>
    </div>
</section>

<section id="films" class="films-section">
    <h3>Nos films à l'affiche</h3>
    <div class="film-container">
        <div class="film">
            <a href="https://www.youtube.com/watch?v=0tC4k1BRJdY"><img src="../assets/img/F4.webp" alt="Film 1"></a>
        </div>
        <div class="film">
            <a href="https://www.youtube.com/watch?v=gKXFUSBBJL0"><img src="../assets/img/topgun.webp" alt="Film 2"></a>
        </div>
        <div class="film">
            <a href="https://www.youtube.com/watch?v=73_1biulkYk"><img src="../assets/img/deadpool3.webp" alt="Film 3"></a>
        </div>
        <div class="film">
            <a href="https://www.youtube.com/watch?v=-BLM1naCfME"><img src="../assets/img/Tetris.jpg" alt="Film 4"></a>
        </div>
        <div class="film">
            <a href="https://www.youtube.com/watch?v=zSWdZVtXT7E"><img src="../assets/img/Inter.jpg" alt="Film 5"></a>
        </div>
        <div class="film">
            <a href="https://www.youtube.com/watch?v=TQ-9We-lxiA"><img src="../assets/img/sonic3.jpg" alt="Film 6"></a>
        </div>
    </div>
</section>

<section id="contact" class="contact-section">
</section>

<footer>
    <hr>
    <h1>Paramètre de compte :</h1>
    <a href="Deconnexion.php"><p>Deconnexion du compte</p></a>
</footer>

</body>
</html>
