<?php
session_start();
if (!isset($_SESSION['email'])) {
    header('location: ../vue/Connexion.php');
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Soldis Web Film</title>
    <link rel="stylesheet" href="../assets/css/accueil.css">
</head>
<body>
<header>
    <h1>Soldis Web Film : <?= $_SESSION['nom'] ?> <?= $_SESSION['prenom'] ?></h1>
    <nav>
        <a href="#">Accueil</a>
        <a href="Catalogue.php">Catalogue</a>
        <a href="Deconnexion.php">Déconnexion</a>
    </nav>
</header>

<main>
    <section class="hero">
        <h2>Bienvenue dans un monde cinématographique d'exception</h2>
    </section>

    <section id="films" class="films-section">
        <h3>Nos meilleurs films :</h3>
        <div class="film-container">
            <div class="film"><a href="https://youtu.be/5UnjrG_N8hU?si=JIiruE9KN76fipfx"><img src="https://wallpapercave.com/wp/wp3054783.jpg" alt="Film 1"></a></div>
            <div class="film"><a href="https://youtu.be/_OUWtPhDQpk?si=IVc-BFN8veLsMim2"><img src="https://image.api.playstation.com/vulcan/ap/rnd/202308/1103/8c3ce3611a4bb187418bb5e24924a055ba33d3046a7aaacb.png" alt="Film 2"></a></div>
            <div class="film"><a href="https://youtu.be/1NJO0jxBtMo?si=Q35NgK6qolASYsHd"><img src="https://th.bing.com/th/id/R.fefad836928e4f750f07c96434b5f608?rik=I8vIKOw4%2fWzXHw&riu=http%3a%2f%2fwww.simbasible.com%2fwp-content%2fuploads%2f2015%2f08%2fBraveheart3.jpg&ehk=aUOV4pdyDjPWu1sbvdgEe9T1XZEiOb4qZqRykjKPDNg%3d&risl=&pid=ImgRaw&r=0" alt="Film 3"></a></div>
            <div class="film"><a href="https://youtu.be/iAjn_UViuE0?si=l1RFxTxSg8dSyCo1"><img src="https://fusion.molotov.tv/arts/i/446x588/Ch8SHQoUZRkyDnEpTtRW_McDabK2WPPb6Y0SA2pwZxgBCh8IARIbChTSu6PF61HREVgWD30NwZHPO7lyDRIDcG5n/jpg" alt="Film 4"></a></div>
            <div class="film"><a href="https://youtu.be/EXeTwQWrcwY?si=0Hkc5aeIQgLrNxVm"><img src="https://th.bing.com/th/id/R.7dbd4025fc6c8439d07709fcee217edb?rik=pB523TybeWhTGw&pid=ImgRaw&r=0" alt="Film 5"></a></div>
            <div class="film"><a href="https://youtu.be/Eam4YDTTkdI?si=Jd6qzMeRMn6F-PwC"><img src="https://th.bing.com/th/id/R.4dd98a3696c8fbbf7f5a13aa119cfc8c?rik=E%2bALJGXfVBe%2bCg&riu=http%3a%2f%2ffr.web.img5.acsta.net%2fpictures%2f20%2f08%2f03%2f10%2f14%2f5958342.jpg&ehk=g491iFVicGFwZiU5KX9kRqf%2fqcKB%2fqyzrvC63GPLASk%3d&risl=&pid=ImgRaw&r=0" alt="Film 6"></a></div>
        </div>
    </section>
</main>

<footer>
    <hr>
    <p>Connecté en tant que <?= $_SESSION['prenom'] ?> <?= $_SESSION['nom'] ?> | <a href="Deconnexion.php">Déconnexion</a></p>
</footer>
</body>
</html>

