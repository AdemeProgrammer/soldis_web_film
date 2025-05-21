<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>

</head>
<body>
    <h2 class="form-title">Inscription</h2>
    <form method="POST" class="register-form" id="register-form" action="../src/traitement/trait_ajout.php">
        <div class="form-group">
            <label for="nom"><i class="zmdi zmdi-account "></i></label>
            <input type="text" name="nom" id="nom" placeholder="Votre nom" required/>
        </div>
        <div class="form-group">
            <label for="prenom"><i class="zmdi zmdi-account"></i></label>
            <input type="text" name="prenom" id="prenom" placeholder="Votre prenom" required/>
        </div>

        <div class="form-group">
            <label for="email"><i class="zmdi zmdi-email"></i></label>
            <input type="email" name="email" id="email" placeholder="Votre Email" required/>
        </div>
        <div class="form-group">
            <label for="mot_de_passe"><i class="zmdi zmdi-lock"></i></label>
            <input type="password" name="mot_de_passe" id="mot_de_passe" placeholder="Votre mot de passe" required/>
        </div>

        <div class="form-group">
            <input type="checkbox" name="agree-term" id="agree-term" class="agree-term" required />
            <label for="agree-term" class="label-agree-term"><span><span></span></span>J'accepte toutes les déclarations dans les  <a href="Conditions_d'utilisation.html" class="term-service">conditions d'utilisation</a></label>
        </div>
        <div class="form-group form-button">
            <input type="submit" name="signup" id="signup" class="form-submit" value="S'inscrire"/>
        </div>


    </form>
<a href="Connexion.php">Je suis déjà membre</a>
</body>
</html>