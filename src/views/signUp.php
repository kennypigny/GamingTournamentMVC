<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Inscrivez-vous ! 1 / 2</title>
    <!-- font ROBOTO CONDENSED -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet" />
    <!----------------------------------- -->
    <link rel="stylesheet" href="./assets/css/SignUp.css" />
</head>

<body>
    <div class="containerSignUp">
        <img src="./assets/img/General/gamingTournamentSignUp450x305.webp" alt="Logo" />

        <form method="POST">

            <div class="formSignUpTop">

                <label for="nickname">Pseudo :<span class="infoPseudo">*Sera visible par les autres utilisateur</span>
                </label>
                <input type="text" name="nickname" id="nickname" placeholder="Pseudo" required />
                <p class="message-error-hide letter-error-nickname">
                    Uniquement les caractères a-z et A-Z
                </p>

                <label for="firstname">Nom :</label>
                <input type="text" name="firstname" id="firstname" placeholder="Nom" required />
                <p class="message-error-hide letter-error-firstname">
                    Uniquement les caractères a-z et A-Z
                </p>

                <label for="lastname">Prénom :</label>
                <input type="text" name="lastname" id="lastname" placeholder="Prénom" required />
                <p class="message-error-hide letter-error-secondname">
                    Uniquement les caractères a-z et A-Z
                </p>

                <label for="password">Mot de passe :</label>
                <input class="password-character-requiered" type="password" name="password" id="password"
                    placeholder="**********" minlength="8" maxlength="24" required />
                <p class="message-error-hide password-error">
                    Le mot de passe doit contenir au moins 8 caractères, une
                    majuscule, une minuscule, un chiffre et un caractère spécial.
                </p>

                <label for="confirmPassword">Confirmez mot de passe :</label>
                <input type="password" name="confirmPassword" id="confirmPassword" placeholder="**********" required />
                <p class="message-error-hide password-error-confirm">
                    Le mot de passe ne correspond pas.
                </p>

                <label for="email">Adresse Email :</label>
                <input type="email" name="email" id="email" placeholder="ex : Adresse-Email@gmail.com" required />
                <p class="message-error-hide email-error">
                    Entrer une adresse email valide.
                </p>

            </div>

            <div class="containerButton">
                <input type="submit" value="S'inscrire" id="submit" />
            </div>

        </form>
    </div>

    <script src="../assets/js/signUp.js"></script>
</body>

</html>