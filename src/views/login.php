<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Connectez-vous !</title>
    <!-- font ROBOTO CONDENSED -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:ital,wght@0,100..900;1,100..900&display=swap"
      rel="stylesheet"
    />
    <!----------------------------------- -->
    <link rel="stylesheet" href="/assets/css/login.css" />
  </head>
  <body>

    <div class="containerLogin">
      <div class="containerLogoLogin">
        <div class="logoLogin">
          <img
            src="/assets/img/General/gamingTournamentLoginReSize450x305.jpg"
            alt="Logo"
          />
        </div>
      </div>

      <div class="containerFormLogin">
        <form method="POST">
          <label for="email">Adresse E-mail :</label>
          <input
            type="text"
            name="email"
            id="email"
            placeholder="Adresse E-mail"
            required
          />
          <small><?php isset($error['global']) ? $error['global'] : ''; ?></small>
          <label for="password">Mot de passe :</label>
          <input
            type="password"
            name="password"
            id="password"
            placeholder="Mot de passe"
            required
          />
          
          <div class="containerButton">
              <input type="submit" value="Se connecter"/>
          </div>
              
          <p class="txtSignIn">
            Pas encore inscrit ?
            <a href="/SignUp.html"> Inscrivez-vous </a>
          </p>
        </form>
      </div>

    </div>
  </body>
</html>
